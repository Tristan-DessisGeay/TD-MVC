<?php
    require_once File::build_path(array(
        "controller",
        "ControllerVoiture.php"
    ));
    require_once File::build_path(array(
        "controller",
        "ControllerUtilisateur.php"
    ));

    public function myGet($nomvar) {
        if(!is_null($_GET[$nomvar])) {
            return $_GET[$nomvar];
        }else if(!is_null($_POST[$nomvar])) {
            return $_POST[$nomvar];
        }else{
            return null
        }
    }

    if(!is_null($_COOKIE['preference'])) {
        $controller_default = $_COOKIE['preference'];
    }else {
        $controller_default = "voiture";
    }
    if(!is_null(myGet('controller'))&&(myGet('controller')=='voiture'||myGet('controller')=='utilisateur'||myGet('controller')=='trajet')) {
        $controller = myGet('controller');
    }else{
        $controller = $controller_default;
    }
    $controller_class = 'Controller'.ucfirst($controller);
    if(!is_null(myGet('action'))) {
        $action = myGet('action');
        $methodes = get_class_methods($controller_class);
        if(!in_array($action, $methodes)) {
            $controller_class::error();
        }
    }else {
        $action = 'readAll';
    }
    if(class_exists($controller_class)) {
        $controller_class::$action($_GET, $_POST);
    }else{
        ControllerVoiture::error();
    }
?>