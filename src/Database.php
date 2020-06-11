<?php namespace Blog; class Database { function connect() { /* DATABASE CONFIGURATION */define('DB_SERVER', '172.18.0.1');define('DB_USERNAME', 'root');define('DB_PASSWORD', 'admin');define('DB_DATABASE', 'upgrade');
       $dbhost = DB_SERVER;
       $dbuser = DB_USERNAME;
       $dbpass = DB_PASSWORD;
       $dbname = DB_DATABASE;
       try {
            $dbConnection = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $dbConnection->exec("set names utf8");
            $dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}