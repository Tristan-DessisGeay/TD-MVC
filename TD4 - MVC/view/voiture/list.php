<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Immatriculation non reconnue</title>
    </head>
    <body>
        <?php
            foreach($tab_v as $v) {
                echo '<p>Voiture d\'immatriculation <a href="../controller/routeur.php?action=read&immat='.$v->getImmatriculation().'">'.$v->getImmatriculation().'</a></p>';
            }
        ?>
    </body>
</html>