<?php
    require_once File::build_path(array(
        "model",
        "ModelUtilisateur.php"
    ));
    require_once File::build_path(array(
        "lib",
        "Security.php"
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
            if(Session::is_user($login)) {
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
            }else{
                static::connect();
            }
        }
        public static function create() {
            $login = "";
            $prenom = "";
            $nom = "";
            $mdp1 = "";
            $mdp2 = "";
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
            $mdp1 = htmlspecialchars($post['mdp1']);
            $mdp2 = htmlspecialchars($post['mdp2']);
            $email = htmlspecialchars($post['email']);
            if($mdp1==$mdp2) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $randomId = Security::generateRandomHex();
                    $mail = "Veillez confirmer votre adresse mail en cliquant sur ce lien : http://127.0.0.1:8080/TD-MVC/index.php?controller=utilisateur&action=validate&login=".$login."&nonce=".$randomId;
                    mail(
                        $email,
                        "Confirmation d'adresse mail",
                        $mail
                    );
                    $data = array(
                        "login" => $login,
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "mdp" => Security::chiffrer($mdp1),
                        "admin" => 0,
                        "email" => "",
                        "nonce" => $randomId
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
            }
        }
        public static function update($get) {
            $login = $get['login'];
            if(Session::is_user($login)||Session::is_admin()) {
                $u = ModelUtilisateur::select($login);
                $prenom = $u->get('prenom');
                $nom = $u->get('nom');
                $mdp1 = $u->get('mdp');
                $mdp2 = $mdp1;
                $is_admin = Session::is_admin()?true:false;
                $admin = $u->get('admin')==1?"checked":"";
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
            }else{
                static::connect();
            }
        }
        public static function updated($get, $post) {
            $login = htmlspecialchars($post['login']);
            if(Session::is_user($login)||Session::is_admin()) {
                $mdp1 = htmlspecialchars($post['mdp1']);
                $mdp2 = htmlspecialchars($post['mdp2']);
                if($mdp1==$mdp2) {
                    if(filter_var(htmlspecialchars($post['email']), FILTER_VALIDATE_EMAIL)) {
                        
                    }
                    $data = array(
                        "login" => $login,
                        "nom" => htmlspecialchars($post['nom']),
                        "prenom" => htmlspecialchars($post['prenom']),
                        "mdp" => Security::chiffrer($mdp1),
                        "admin" => (Session::is_admin()&&isset($post['admin'])&&$post['admin']=="on")?1:0,
                        "email" => ""
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
            }else{
                static::connect();
            }
        }
        public static function connect() {
            $dependencies = [
                [static::$object,
                'connect',
                'Connexion utilisateur']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function connected($get, $post) {
            $login = htmlspecialchars($post["login"]);
            $mdp = htmlspecialchars($post["mdp"]);
            $u = ModelUtilisateur::checkPassword($login, Security::chiffrer($mdp));
            if($u!=false&&$u->get('nonce')==null) {
                $_SESSION['login'] = $login;
                $_SESSION['admin'] = $u->get('admin');
                $dependencies = [
                    [static::$object,
                    "bienvenue",
                    "Bienvenue !"],
                    [static::$object,
                    "detail",
                    ]
                ];
                require_once File::build_path(array(
                    "view",
                    "view.php",
                ));
            }
        }
        public static function deconnect() {
            session_destroy();
            header("Location: index.php");
        }
        public static function validate($get) {
            $data = [
                "login" => $get['login'],
                "nonce" => $get['nonce']
            ];
            ModelUtilisateur::validate($data);
        }
    }
?>