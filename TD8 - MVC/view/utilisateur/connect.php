<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion utilisateur</title>
</head>
<body>
    <form method="post" action="index.php?controller=utilisateur&action=connected">
        <fieldset>
            <p>
                <label for="login">Login</label>
                <input type="text" id="login" name="login">
            </p>
            <p>
                <label for="mdp">Password</label>
                <input type="password" id="mdp" name="mdp">
            </p>
            <p>
                <input type="submit" value="Connexion">
            </p>
        </fieldset>
    </form>
</body>
</html>