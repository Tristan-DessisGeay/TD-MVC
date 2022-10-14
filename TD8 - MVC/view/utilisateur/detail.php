<?php
    echo "<ul>";
    echo "<li>Login : {$u->get('login')}</li>";
    echo "<li>MDP : {$u->get('mdp')}</li>";
    echo "<li>Admin : {$u->get('admin')}</li>";
    echo "<li>Prénom : {$u->get('prenom')}</li>";
    echo "<li>Nom : {$u->get('nom')}</li>";
    echo "</ul>";
    if(Session::is_user($u->get('login'))) {
        echo "<p><a href='index.php?controller=utilisateur&action=delete&login={$u->get('login')}'>Supprimer</a></p>";
        echo "<p><a href='index.php?controller=utilisateur&action=update&login={$u->get('login')}'>Modifier</a></p>";
    }
?>