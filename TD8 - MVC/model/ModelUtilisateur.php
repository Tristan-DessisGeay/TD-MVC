<?php
require_once File::build_path(array(
    "model",
    "Model.php"
));
class ModelUtilisateur extends Model{
    private $login;
    private $mdp;
    private $admin;
    private $nom;
    private $prenom;
    private $email;
    private $nonce;

    protected static $object = "utilisateur";
    protected static $primary = "login";

    public function __construct($donnee = NULL) {
        if(!is_null($donnee)){
            $this->login = $donnee['login'];
            $this->nom = $donnee['nom'];
            $this->prenom = $donnee['prenom'];
            $this->mdp = $donnee['mdp'];
            $this->admin = $donnee['admin'];
            $this->email = $donnee['email'];
            $this->nonce = $donnee['nonce'];
        }
    }

    public function get($attribut) {
        return $this->$attribut;
    }

    public function set($attribut,$valeur) {
        $this->$attribut=$valeur;
    }

    public static function validate($data) {
        $sql = "SELECT * FROM utilisateur WHERE login=:login AND nonce=:nonce";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($data);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelUtilisateur");
        $tab = $req_prep->fetchAll();
        if(!empty($tab)) {
            $sql = "UPDATE utilisateur SET nonce=null WHERE login=:login";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
        }
    }    

    public static function checkPassword($login, $mot_de_passe_chiffre) {
        $sql = "SELECT * FROM utilisateur WHERE login=:login AND mdp=:mdp";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "login" => $login,
            "mdp" => $mot_de_passe_chiffre
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelUtilisateur");
        $tab = $req_prep->fetchAll();
        if (empty($tab)) {
            return false;
        }else {
            return $tab[0];
        }
    }
}
?>