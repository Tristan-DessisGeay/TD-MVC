<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(count($_POST)>0){
            require_once("Voiture.php");
            $voiture=new Voiture($_POST['immatriculation'],$_POST['marque'],$_POST['couleur']);
            $voiture->afficher();
            $voiture->save();
        }
    ?>
</body>
</html>