<?php
    echo '<form action="index.php?controller=utilisateur&action='.$action.'" method="post">';
?>
<fieldset>
    <legend>Modifications :</legend>
    <p>
        <label for="login">Login</label>
        <?php
            $login = htmlspecialchars($login);
            echo '<input type="text" name="login" id="login" value="'.$login.'" '.$loginType.'>';
        ?>
    </p>
    <p>
        <label for="mdp1">Password</label>
        <?php
            $mdp1 = htmlspecialchars($mdp1);
            echo '<input type="password" id="mdp1" name="mdp1" value="'.$mdp1.'">';
        ?>
    </p>
    <p>
        <label for="mdp2">Confirm Password</label>
        <?php
            $mdp2 = htmlspecialchars($mdp2);
            echo '<input type="password" id="mdp2" name="mdp2" value="'.$mdp2.'">';
        ?>
    </p>
    <?php
        if($is_admin) {
            echo '<p><label for="admin">Admin</label><input type="checkbox" id="admin" name="admin" '.$admin.'></p>';
        }
    ?>
    <p>
        <label for="prenom">Prénom</label>
        <?php
            $prenom = htmlspecialchars($prenom);
            echo '<input type="text" name="prenom" id="prenom" value="'.$prenom.'" required>';
        ?>
    </p>
    <p>
        <label for="nom">Nom</label>
        <?php
        $couleur = htmlspecialchars($nom);
            echo '<input type="text" name="nom" id="nom" value="'.$nom.'" required>';
        ?>
    </p>
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="controller">Controller</label>
        <?php
            echo '<input type="text" name="controller" id="controller" value="'.static::$object.'" required>';
        ?>
    </p>
    <p>
        <input type="submit" value="Envoyer">
    </p>
</fieldset>
</form>