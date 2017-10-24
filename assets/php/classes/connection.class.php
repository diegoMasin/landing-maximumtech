<?php

class Connection extends PDO
{
    private $host   = "localhost";
    private $port   = 5432;
    private $dbname = "postgres";
    private $user   = "postgres";
    private $pass   = "postgres";

    public function __construct()
    {
        try
        {
            $db = parent::__construct(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};",
                "{$this->user}",
                "{$this->pass}",
                array(
                    PDO::ATTR_PERSISTENT => true
                )
            );
            return $db;
        } catch (PDOException $e) {
            print "Falha na conexão!";
        }
    }

    public function getNextId($db, $table, $column)
    {
        try
        {
            $stmt = $db->query("SELECT MAX({$column}) AS nextid FROM {$table}", PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row['nextid'] + 1;
        } catch (PDOException $e) {
            print "Erro na geração do id!";
        }
    }
}