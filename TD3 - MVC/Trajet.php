<?php
class Trajet {
    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    public function __construct($i=NULL, $de=NULL, $a=NULL, $da=NULL, $n=NULL, $p=NULL, $c=NULL){
        if(!is_null($i)&&!is_null($de)&&!is_null($a)&&!is_null($da)&&!is_null($n)&&!is_null($p)&&!is_null($c)){
            $this->id = $i;
            $this->depart = $de;
            $this->arrivee = $a;
            $this->date = $da;
            $this->nbplaces = $n;
            $this->prix = $p;
            $this->conducteur_login = $c;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }

    public function set($attribut, $valeur){
        $this->$attribut = $valeur;
    }

    public static function findPassagers($id){
        require_once "Model.php";
        require_once "Utilisateur.php";
        $sql = "select * from utilisateur, passager where passager.utilisateur_login=utilisateur.login and passager.trajet_id=:trajet_id";
        $rep = Model::$pdo->prepare($sql);
        $values = array(
            "trajet_id" => $id,
        );
        $rep->execute($values);
        $rep->setFetchMode(PDO::FETCH_CLASS, "Utilisateur"); 
        return($rep->fetchAll());
    }

    public function afficher(){
        echo "<ul>";
        echo "<li>".$this->get('id')."</li>";
        echo "<li>".$this->get('depart')."</li>";
        echo "<li>".$this->get('arrivee')."</li>";
        echo "<li>".$this->get('date')."</li>";
        echo "<li>".$this->get('nbplaces')."</li>";
        echo "<li>".$this->get('prix')."</li>";
        echo "<li>".$this->get('conducteur_login')."</li>";
        echo "</ul>";
    }

    public static function deletePassager($data){
        require_once "Model.php";
        $sql = "delete from passager where utilisateur_login=:utilisateur_login and trajet_id=:trajet_id;";
        $rep = Model::$pdo->prepare($sql);
        $values = array(
            "utilisateur_login" => $data['utilisateur_login'],
            "trajet_id" => $data['trajet_id'],
        );
        $rep->execute($values);
    }
}
?>