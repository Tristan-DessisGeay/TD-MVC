<?php
    echo '<form action="index.php?action='.$action.'" method="post">';
?>
<fieldset>
    <legend>Modifications :</legend>
    <p>
        <label for="immat">Immatriculation</label>
        <?php
            $immat = htmlspecialchars($immat);
            echo '<input type="text" name="immat" id="immat" value="'.$immat.'" '.$immatType.'>';
        ?>
    </p>
    <p>
        <label for="marque">Marque</label>
        <?php
            $marque = htmlspecialchars($marque);
            echo '<input type="text" name="marque" id="marque" value="'.$marque.'" required>';
        ?>
    </p>
    <p>
        <label for="couleur">Couleur</label>
        <?php
        $couleur = htmlspecialchars($couleur);
            echo '<input type="text" name="couleur" id="couleur" value="'.$couleur.'" required>';
        ?>
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