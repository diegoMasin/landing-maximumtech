[1mdiff --git a/assets/php/classes/connection.class.php b/assets/php/classes/connection.class.php[m
[1mindex e189a8e..ab5a4e9 100644[m
[1m--- a/assets/php/classes/connection.class.php[m
[1m+++ b/assets/php/classes/connection.class.php[m
[36m@@ -1,7 +1,16 @@[m
 <?php[m
 [m
[31m-class Connection extends PDO[m
[31m-{[m
[32m+[m[32mclass Connection extends PDO {[m
[32m+[m
[32m+[m[32m//              CONFIGURAÇÃO DE PRODUÇÃO[m
[32m+[m[32m//    private $host   = "localhost";[m
[32m+[m[32m//    private $port   = 5432;[m
[32m+[m[32m//    private $dbname = "postgres";[m
[32m+[m[32m//    private $user   = "postgres";[m
[32m+[m[32m//    private $pass   = "postgres";[m
[32m+[m
[32m+[m
[32m+[m[32m//              COMENTAR EM PRODUÇÃO[m
     private $host   = "localhost";[m
     private $port   = 5432;[m
     private $dbname = "postgres";[m
