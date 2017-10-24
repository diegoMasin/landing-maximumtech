<?php

class Connection extends PDO
{
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    static $db;
    private $ini;

    public function __construct()
    {
        $this->readIniConfig();
        $this->setAtributesConnection();

        try
        {
            $pdo = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};",
                "{$this->user}",
                "{$this->pass}",
                array(
                    PDO::ATTR_PERSISTENT => true
                )
            );

            $this->db = $pdo;
        } catch (PDOException $e) {
            print "Falha na conexão!";
        }
    }

    private function setAtributesConnection()
    {
        $ini = $this->ini;
        $server = $ini['CONFIG']['server'];
        
        $this->host   = $ini[$server]['host'];
        $this->port   = $ini[$server]['port'];
        $this->dbname = $ini[$server]['dbname'];
        $this->user   = $ini[$server]['user'];
        $this->pass   = $ini[$server]['pass'];
    }

    private function readIniConfig()
    {
        $path = ROOT_DIR . "config.ini";

        try {
            if (file_exists($path) === false)
            {
                throw new Exception();
            }

            $parse = parse_ini_file($path, true);

            $this->ini = $parse;
        } catch (Exception $e) {
            print "Erro ao acessar o arquivo de configuração!";
        }
    }

    public function getNextId($table, $column)
    {
        try
        {
            $stmt = $this->db->query("SELECT MAX({$column}) AS nextid FROM {$table}", PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row['nextid'] + 1;
        } catch (PDOException $e) {
            print "Erro na geração do id!";
        }
    }
}