<?php
    class Utilisateur {
        private $login;
        private $nom;
        private $prenom;

        public function __construct($donnee) {
            $this->login = $donnee['login'];
            $this->nom = $donnee['nom'];
            $this->prenom = $donnee['prenom'];
        }

        public function get($attribut) {
            return $this->attribut;
        }

        public function set($attribut, $valeur) {
            $this->$attribut = $valeur;
        }
    }
?>