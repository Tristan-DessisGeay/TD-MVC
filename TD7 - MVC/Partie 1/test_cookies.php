<?php
    setcookie("Liste", serialize([
        "Pomme",
        "Poire",
        "Orange",
        "Citron",
        "Pêche"
    ]), time()+3600);
    $liste = unserialize($_COOKIE['Liste']);
    echo "<ul>";
    foreach($liste as $fruit) {
        echo "<li>".$fruit."</li>";
    }
    echo "</ul>";
?>