<?php
    require_once 'DotEnv.php';

    use DevCoder\DotEnv;

    (new DotEnv(__DIR__ . '/.env'))->load();


    class DataBase{
        private PDO $pdo;

        public function __construct(){
            $this->connect();
        }

        private function connect() {
            $dbhost = getenv('DBHOST');
            $dbuser = getenv('DBUSER');
            $dbpass = getenv('DBPASS');
            $dbname = getenv('DBNAME');
            $dbdriver = getenv('DBDRIVER');

            $dsn = "$dbdriver:host=$dbhost;dbname=$dbname";

            try {
                $this->pdo = new PDO($dsn, $dbuser, $dbpass);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8mb4");

                return $this->pdo;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
?>