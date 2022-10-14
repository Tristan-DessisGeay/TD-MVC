<?php
    require_once 'ControllerVoiture.php';
    $action = $_GET['action'];
    if($action=='readAll') {
        ControllerVoiture::readAll();
    }else if($action=='read') {
        $immat = $_GET['immat'];
        ControllerVoiture::read($immat);
    }else if($action=='create') {
        ControllerVoiture::create();
    }else if($action='created') {
        $iimat = $_POST['immatriculation'];
        $marque = $_POST['marque'];
        $couleur = $_POST['couleur'];
        ControllerVoiture::created($immat, $marque, $couleur);
    }
?>