<?php
    if(isset($_POST['preference'])) {
        setcookie('preference', $_POST['preference'], time()+3600);
    }
?>