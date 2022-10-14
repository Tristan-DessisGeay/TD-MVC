<?php
require_once File::build_path(array(
    "model",
    "Model.php"
));
class ModelVoiture extends Model{

    private $marque;
    private $couleur;
    private $immatriculation;

    protected static $object = "voiture";
    protected static $primary = "immatriculation";


    // un getter      
    public function getMarque() {
        return $this->marque;
    }

    // un setter 
    public function setMarque($m) {
        $this->marque = $m;
    }

    // un getter      
    public function getCouleur() {
        return $this->couleur;
    }

    // un setter 
    public function setCouleur($c) {
        $this->couleur = $c;
    }

    // un getter      
    public function getImmatriculation() {
        return $this->immatriculation;
    }

    // un setter 
    public function setImmatriculation($i) {
        if(strlen($i)<=8){
            $this->immatriculation = $i;
        }
    }

    // un constructeur
    public function __construct($i = NULL, $m = NULL, $c = NULL) {
        if(!is_null($m)&&!is_null($c)&&!is_null($i)){
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    } 
}
?>