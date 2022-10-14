<?php
    session_start();
    $_SESSION['prenom'] = 'Tristan';
    $_SESSION['age'] = 18;
    $_SESSION['activites'] = [
        'Muscu',
        'Cardistry',
        'Programmation',
        'Russe'
    ];
    if(isset($_SESSION['activites'])) {
        echo '<ul>';
        foreach($_SESSION['activites'] as $activite) {
            echo '<li>'.$activite.'</li>';
        }
        echo '</ul>';
    }
    session_unset();
    session_destroy();
?>