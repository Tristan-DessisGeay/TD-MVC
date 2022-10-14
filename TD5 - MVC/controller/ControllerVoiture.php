<?php
    require_once File::build_path(array(
        "model",
        "ModelVoiture.php"
    ));
    class ControllerVoiture {
        public static function readAll() {
            $tab_v = ModelVoiture::getAllVoitures();
            $dependencies = [
                ['voiture',
                'list',
                'Liste des voitures']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function read($i) {
            $v = ModelVoiture::getVoitureByImmat($i);
            $dependencies = [
                ['voiture']
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
            $dependencies = [
                ['voiture',
                'create',
                'Création voiture']
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
        public static function created($immat, $marque, $couleur) {
            $v = new ModelVoiture($immat, $marque, $couleur);
            $v->save();
            $tab_v = ModelVoiture::getAllVoitures();
            $dependencies = [
                ['voiture',
                'created',
                'Voiture créée !'],
                ['voiture',
                'list'],
            ];
            require_once File::build_path(array(
                "view",
                "view.php",
            ));
        }
    }
?>