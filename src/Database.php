<?php namespace Blog; class Database { function connect() { /* DATABASE CONFIGURATION */define('DB_SERVER', 'mysql:3306');define('DB_USERNAME', 'root');define('DB_PASSWORD', 'demo');define('DB_DATABASE', 'admin');
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