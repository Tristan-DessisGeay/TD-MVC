<?php
    echo "<ul>";
    echo "<li>Marque : {$v->getMarque()}</li>";
    echo "<li>Immatriculation : {$v->getImmatriculation()}</li>";
    echo "<li>Couleur : {$v->getCouleur()}</li>";
    echo "</ul>";
    echo "<p><a href='index.php?action=delete&immat={$v->getImmatriculation()}'>Supprimer</a></p>";
    echo "<p><a href='index.php?action=update&immat={$v->getImmatriculation()}'>Modifier</a></p>";
?>