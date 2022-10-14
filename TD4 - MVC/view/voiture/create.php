<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/routeur.php?action=created" method="post">
        <fieldset>
            <legend>
                Mon formulaire :
            </legend>
            <p>
                <label for="immat_id">Immatriculation</label>
                <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required>
            </p>
            <p>
                <label for="marque_id">Marque</label>
                <input type="text" placeholder="Porsche" name="marque" id="marque_id" required>
            </p>
            <p>
                <label for="couleur_id">Immatriculation</label>
                <input type="text" placeholder="Blanche" name="couleur" id="couleur_id" required>
            </p>
            <p>
                <input type="submit" value="Envoyer">
            </p>
        </fieldset>
    </form>
</body>
</html>