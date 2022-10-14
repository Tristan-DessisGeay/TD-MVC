<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $dependencies[0][2]; ?></title>
    </head>
    <body>
        <header style="display: grid; justify-content: space-between; grid-template-columns: repeat(3, 33.3%);">
            <a style="text-align: center" href="index.php?action=readAll">Voitures</a>
            <a style="text-align: center" href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a>
            <a style="text-align: center" href="index.php?action=readAll&controller=trajet">Trajets</a>
        </header>
        <main>
            <?php
                foreach($dependencies as $d) {
                    $filepath = File::build_path(array("view", $d[0], $d[1].".php"));
                    require $filepath;
                }
            ?>
        </main>
        <footer>
            <p style="border: 1px solid black;text-align:right;padding-right:1em;">
                Site de covoiturage de ...
            </p>
        </footer>
    </body>
</html>