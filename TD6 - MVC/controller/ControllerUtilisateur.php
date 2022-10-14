<?php
    require_once File::build_path(array(
        "model",
        "ModelUtilisateur.php"
    ));
    class ControllerUtilisateur {
        protected static $object = 'utilisateur';
        public static function readAll() {
            $tab_u = ModelUtilisateur::selectAll();
            $dependencies = [
                [static::$object,
                'list',
                'Liste des utilisateurs']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function read($get) {
            $l = $get['login'];
            $u = ModelUtilisateur::select($l);
            $dependencies = [
                [static::$object]
            ];
            if(!$u) {
                array_push($dependencies[0], 'error', 'Page non trouvée');
            }else{
                array_push($dependencies[0], 'detail', 'Détail d un utilisateur');
            }
            require_once File::build_path(array(
                "view",
                "view.php"
            ));
        }
        public static function delete($get) {
            $login = $get['login'];
            ModelUtilisateur::delete($login);
            $tab_u = ModelUtilisateur::selectAll();
            $dependencies = [
                [static::$object,
                'deleted',
                'Utilisateur supprimé'],
                [static::$object,
                'list']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function create() {
            $login = "";
            $prenom = "";
            $nom = "";
            $loginType = "required";
            $action = "created";
            $dependencies = [
                [static::$object,
                'update',
                'Création utilisateur']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function created($get, $post) {
            $login = htmlspecialchars($post['login']);
            $prenom = htmlspecialchars($post['prenom']);
            $nom = htmlspecialchars($post['nom']);
            $data = array(
                "login" => $login,
                "nom" => $nom,
                "prenom" => $prenom
            );
            $u = new ModelUtilisateur($data);
            $u::save($data);
            $tab_u = ModelUtilisateur::selectAll();
            $dependencies = [
                [static::$object,
                'created',
                'Utilisateur créé !'],
                [static::$object,
                'list'],
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function update($get) {
            $login = $get['login'];
            $u = ModelUtilisateur::select($login);
            $prenom = $u->get('prenom');
            $nom = $u->get('nom');
            $loginType = "readonly";
            $action = "updated";
            $dependencies = [
                [static::$object,
                'update',
                'Modifications utilisateur']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function updated($get, $post) {
            $data = array(
                "login" => htmlspecialchars($post['login']),
                "nom" => htmlspecialchars($post['nom']),
                "prenom" => htmlspecialchars($post['prenom'])
            );
            ModelUtilisateur::update($data);
            $login = $data['login'];
            $tab_u = ModelUtilisateur::selectAll();
            $dependencies = [
                [static::$object,
                'updated',
                'Utilisateur mis à jour'],
                [static::$object,
                'list']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
    }
?>