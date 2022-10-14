<?php
	class Trajet {
		private $id;
		private $depart;
		private $arrivee;
		private $date;
		private $nbplaces;
		private $prix;
		private $conducteur_login;

		public function __construct($donnee) {
			$this->id = $donnee['id'];
			$this->depart = $donnee['depart'];
			$this->arrivee = $donnee['arrivee'];
			$this->date = $donnee['date'];
			$this->nbplaces = $donnee['nbplaces'];
			$this->prix = $donnee['prix'];
			$this->conducteur_login = $donnee['conducteur_login'];
		}

		public function get($attribut) {
			return $this->$attribut;
		}

		public function set($attribut, $valeur) {
			$this->$attribut = $valeur;
		}
	}
?>