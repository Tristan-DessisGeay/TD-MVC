<?php
    if(count($_GET)>0){
        require_once "Trajet.php";
        Trajet::deletePassager([
            "utilisateur_login" => $_GET['user_id'], 
            "trajet_id" => $_GET['trajet_id'], 
        ]);
        echo "L'utilisateur : ".$_GET['user_id']." a été désinscrit du trajet : ".$_GET['trajet_id'];
    }
?>