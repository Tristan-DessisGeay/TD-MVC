<?php
require_once File::build_path(array(
    "model",
    "Model.php"
));
class ModelUtilisateur extends Model{
    private $login;
    private $nom;
    private $prenom;

    protected static $object = "utilisateur";
    protected static $primary = "login";

    public function __construct($donnee = NULL) {
        if(!is_null($donnee)){
            $this->login = $donnee['login'];
            $this->nom = $donnee['nom'];
            $this->prenom = $donnee['prenom'];
        }
    }

    public function get($attribut) {
        return $this->$attribut;
    }

    public function set($attribut,$valeur) {
        $this->$attribut=$valeur;
    }
}
?>