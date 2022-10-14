<?php
    if(count($_GET)>0) {
        require_once 'Voiture.php';
        $voiture = new Voiture($_GET['marque'], $_GET['couleur'], $_GET['immatriculation']);
        $voiture->afficher();
    }
?>