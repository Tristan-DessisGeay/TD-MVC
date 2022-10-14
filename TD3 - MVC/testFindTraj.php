<?php
    if(count($_GET)>0){
        require_once "Utilisateur.php";
        $trajets = Utilisateur::findTrajets($_GET['user_id']);
        foreach($trajets as $t){
            $t->afficher();
        }
    }
?>