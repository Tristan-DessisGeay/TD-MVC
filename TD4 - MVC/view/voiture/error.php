<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Immatriculation non reconnue</title>
    </head>
    <body>
        <?php
            echo "<p>L'immatriculation : $immat n'a pas été reconnue</p>";
            echo "<a href='../controller/routeur.php?action=readAll'>Revenir à la liste des voitures</a>";
        ?>
    </body>
</html>