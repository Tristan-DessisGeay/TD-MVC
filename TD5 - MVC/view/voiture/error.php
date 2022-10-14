<?php
    echo "<p>L'immatriculation : $immat n'a pas été reconnue</p>";
    $path = File::build_path(array(
        "index.php?action=readAll"
    ))
    echo "<a href='$path'>Revenir à la liste des voitures</a>";
?>