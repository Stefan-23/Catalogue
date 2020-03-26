<?php

    //PDO Database class

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbhandler;
        private $stmt;
        private $error;

        public function __construct(){
            //Set DSN

            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION     //There are 3 types of pdo errmode(silent,warning,exception)
            );

            //PDO instance with try and catch

            try{
                
                $this->dba_handler = new PDO($dsn,$this->user,$this->pass, $options);

            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
    }