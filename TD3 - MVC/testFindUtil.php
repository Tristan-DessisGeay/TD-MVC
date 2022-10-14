<?php
    if(count($_GET)>0){
        require_once "Trajet.php";
        $passagers = Trajet::findPassagers($_GET['trajet_id']);
        foreach($passagers as $p){
            $p->afficher();
        }
    }
?>