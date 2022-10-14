<?php
    echo "<ul>";
    echo "<li>Login : {$u->get('login')}</li>";
    echo "<li>Prénom : {$u->get('prenom')}</li>";
    echo "<li>Nom : {$u->get('nom')}</li>";
    echo "</ul>";
    echo "<p><a href='index.php?controller=utilisateur&action=delete&login={$u->get('login')}'>Supprimer</a></p>";
    echo "<p><a href='index.php?controller=utilisateur&action=update&login={$u->get('login')}'>Modifier</a></p>";
?>