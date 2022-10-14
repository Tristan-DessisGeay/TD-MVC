<?php
    require_once '../model/ModelVoiture.php';
    class ControllerVoiture {
        public static function readAll() {
            $tab_v = ModelVoiture::getAllVoitures();
            require '../view/voiture/list.php';
        }

        public static function read() {
            $v = ModelVoiture::getVoitureByImmat($immat);
            if(!$v) {
                require '../view/voiture/error.php';
            }else {
                require '../view/voiture/detail.php';
            }
        }

        public static function create() {
            require '../view/voiture/create.php';
        }

        public static function created($immat, $marque, $couleur) {
            $v = new ModelVoiture($immat, $marque, $couleur);
            $v->save();
            ControllerVoiture::readAll();
        }
    }
?>