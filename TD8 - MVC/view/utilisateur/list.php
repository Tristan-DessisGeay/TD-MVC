<?php
    foreach($tab_u as $u) {
        $uLogin = htmlspecialchars($u->get("login"));
        $path = "index.php?controller=utilisateur&action=read&login=".urlencode($u->get("login"));
        echo '<p>Utilisateur de login <a href="'.$path.'">'.$uLogin.'</a></p>';
    }
?>