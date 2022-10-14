<?php
    require_once File::build_path(array(
        "controller",
        "ControllerVoiture.php"
    ));
    require_once File::build_path(array(
        "controller",
        "ControllerUtilisateur.php"
    ));
    if(isset($_COOKIE['preference'])) {
        $controller_default = $_COOKIE['preference'];
    }else {
        $controller_default = "voiture";
    }
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $methodes = get_class_methods('ControllerVoiture');
        if(!in_array($action, $methodes)) {
            ControllerVoiture::error();
        }
    }else {
        $action = 'readAll';
    }
    if(isset($_GET['controller'])&&($_GET['controller']=='voiture'||$_GET['controller']=='utilisateur'||$_GET['controller']=='trajet')) {
        $controller = $_GET['controller'];
    }else{
        $controller = $controller_default;
    }
    $controller_class = 'Controller'.ucfirst($controller);
    if(class_exists($controller_class)) {
        $controller_class::$action($_GET, $_POST);
    }else{
        ControllerVoiture::error();
    }
?>