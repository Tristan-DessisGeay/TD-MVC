<?php
    foreach($tab_v as $v) {
        $path = "index.php?action=read&immat=".rawurlencode($v->getImmatriculation());
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        echo '<p>Voiture d\'immatriculation <a href="'.$path.'">'.$vImmatriculation.'</a></p>';
    }
?>