<?php
class Utilisateur{
    private $login;
    private $nom;
    private $prenom;

    public function __construct($l = NULL, $n = NULL, $p = NULL){
        if(!is_null($l)&&!is_null($n)&&!is_null($p)){
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }

    public function set($attribut, $valeur){
        $this->$attribut = $valeur;
    }

    public function afficher(){
        $l = $this->get('login');
        $n = $this->get('nom');
        $p = $this->get('prenom');
        echo "<ul>";
        echo "<li>$l</li>";
        echo "<li>$n</li>";
        echo "<li>$p</li>";
        echo "</ul>";
    }

    public static function findTrajets($login){
        require_once "Model.php";
        require_once "Trajet.php";
        $sql = "select * from trajet, passager where passager.trajet_id=trajet.id and passager.utilisateur_login=:utilisateur_login";
        $rep = Model::$pdo->prepare($sql);
        $values = array(
            "utilisateur_login" => $login,
        );
        $rep->execute($values);
        $rep->setFetchMode(PDO::FETCH_CLASS, "Trajet"); 
        return($rep->fetchAll());
    }
}
?>