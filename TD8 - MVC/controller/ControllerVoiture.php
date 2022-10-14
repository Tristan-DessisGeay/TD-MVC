<?php
    require_once File::build_path(array(
        "model",
        "ModelVoiture.php"
    ));
    class ControllerVoiture {
        protected static $object = 'voiture';
        public static function readAll() {
            $tab_v = ModelVoiture::selectAll();
            $dependencies = [
                [static::$object,
                'list',
                'Liste des voitures']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function read($get) {
            $i = $get['immat'];
            $v = ModelVoiture::select($i);
            $dependencies = [
                [static::$object]
            ];
            if(!$v) {
                array_push($dependencies[0], 'error', 'Page non trouvée');
            }else{
                array_push($dependencies[0], 'detail', 'Détail d une voiture');
            }
            require_once File::build_path(array(
                "view",
                "view.php"
            ));
        }
        public static function create() {
            $immat = "";
            $couleur = "";
            $marque = "";
            $immatType = "required";
            $action = "created";
            $dependencies = [
                [static::$object,
                'update',
                'Création voiture']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function created($get, $post) {
            $immat = htmlspecialchars($post['immat']);
            $marque = htmlspecialchars($post['marque']);
            $couleur = htmlspecialchars($post['couleur']);
            $v = new ModelVoiture($immat, $marque, $couleur);
            $v::save(array(
                "immatriculation" => $immat,
                "marque" => $marque,
                "couleur" => $couleur
            ));
            $tab_v = ModelVoiture::selectAll();
            $dependencies = [
                [static::$object,
                'created',
                'Voiture créée !'],
                [static::$object,
                'list'],
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function error() {
            $dependencies = [
                [static::$object,
                'error',
                'Page non trouvée']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function delete($get) {
            $immat = $get['immat'];
            ModelVoiture::delete($immat);
            $tab_v = ModelVoiture::selectAll();
            $dependencies = [
                [static::$object,
                'deleted',
                'Voiture supprimée'],
                [static::$object,
                'list']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function update($get) {
            $immat = $get['immat'];
            $v = ModelVoiture::select($immat);
            $marque = $v->getMarque();
            $couleur = $v->getCouleur();
            $immatType = "readonly";
            $action = "updated";
            $dependencies = [
                [static::$object,
                'update',
                'Modifications voiture']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function updated($get, $post) {
            $data = array(
                "immatriculation" => htmlspecialchars($post['immat']),
                "marque" => htmlspecialchars($post['marque']),
                "couleur" => htmlspecialchars($post['couleur'])
            );
            ModelVoiture::update($data);
            $immat = $data['immatriculation'];
            $tab_v = ModelVoiture::selectAll();
            $dependencies = [
                [static::$object,
                'updated',
                'Voiture mise à jour'],
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