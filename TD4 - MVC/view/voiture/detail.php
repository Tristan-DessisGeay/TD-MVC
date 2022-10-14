<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Immatriculation non reconnue</title>
    </head>
    <body>
        <?php
            echo "<ul>";
            echo "<li>Marque : {$v->getMarque()}</li>";
            echo "<li>Immatriculation : {$v->getImmatriculation()}</li>";
            echo "<li>Couleur : {$v->getCouleur()}</li>";
            echo "</ul>";
        ?>
    </body>
</html>