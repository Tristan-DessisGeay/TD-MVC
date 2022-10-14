<?php
    class Model {
        public static $pdo;

        public static function Init() {
            require_once File::build_path(array(
                "config",
                "Conf.php"
            ));
            $hostname = Conf::getHostname();
            $database_name = Conf::getDatabase();
            $login = Conf::getLogin();
            $password = Conf::getPassword();

            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public static function selectAll(){
            require_once File::build_path(array(
                "model",
                "Model.php"
            ));
            $table_name = static::$object;
            $class_name = "Model".ucfirst($table_name);
            $rep = Model::$pdo->query("SELECT * FROM ".$table_name);
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name); 
            return($rep->fetchAll());
        }

        public static function select($primary_value) {
            $table_name = static::$object;
            $class_name = "Model".ucfirst($table_name);
            $primary_key = static::$primary;
            $sql = "SELECT * from ".$table_name." WHERE ".$primary_key."=:primary_value";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "primary_value" => $primary_value,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab = $req_prep->fetchAll();
            if (empty($tab))
            return false;
            return $tab[0];
        }

        public static function delete($primary_value) {
            require_once File::build_path(array(
                "model",
                "Model.php"
            ));
            $table_name = static::$object;
            $class_name = "Model".ucfirst($table_name);
            $primary_key = static::$primary;
            $sql = "DELETE FROM ".$table_name." WHERE ".$primary_key."=:primary_value";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "primary_value" => $primary_value
            );
            $req_prep->execute($values);
        }

        public static function update($data) {
            $table_name = static::$object;
            $primary_key = static::$primary;
            $sql = "UPDATE ".$table_name." SET ";
            $set = "";
            foreach($data as $cle => $valeur) {
                if($cle!=$primary_key) {
                    $set .= $cle."=:".$cle.", ";
                }
            }
            $sql .= rtrim($set, ", ");
            $sql .= " WHERE ".$primary_key."=:".$primary_key;
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
        }

        public static function save($data){
            $table_name = static::$object;
            $sql = "INSERT INTO ".$table_name." VALUES (";
            $values = "";
            foreach($data as $cle => $valeur) {
                $values .= ":".$cle.", ";
            }
            $sql .= rtrim($values, ", ").")";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
        }
    }

    Model::Init();
?>