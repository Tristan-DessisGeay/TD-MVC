<?php
    class Model {
        public static $pdo;

        public static function Init() {
            require_once 'Conf.php';

            $hostname = Conf::getHostname();
            $database_name = Conf::getDatabase();
            $login = Conf::getLogin();
            $password = Conf::getPassword();
            
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    Model::Init();
?>