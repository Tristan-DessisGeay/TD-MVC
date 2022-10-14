<?php
    $path = "index.php?action=created";
    echo '<form action="'.$path.'" method="post">';
?>
<fieldset>
    <legend>Mon formulaire :</legend>
    <p>
        <label for="immatriculation">Immatriculation</label>
        <input type="text" placeholder="256AB34" name="immatriculation" id="immatriculation" required>
    </p>
    <p>
        <label for="marque">Marque</label>
        <input type="text" placeholder="Porsche" name="marque" id="marque" required>
    </p>
    <p>
        <label for="couleur">Couleur</label>
        <input type="text" placeholder="Blanche" name="couleur" id="couleur" required>
    </p>
    <p>
        <input type="submit" value="Envoyer">
    </p>
</fieldset>
</form>