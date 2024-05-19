<?php
	/* ==================================================================================
       Auteur: Youcef
	 * ==================================================================================
	*/
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

	require_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Horaire.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Siege.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Cinema.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Film.class.php");
	
    class Reservation {
        //Attributs privés 
		private $id;
		private $reserve;
		private $film;
		private $cinema;
		private $siege;
		private $horaire;
		private $client;

        //Constructeur 
		public function __construct($id, $horaire, $film, $cinema, $siege, $client=null, $etatReservation=0){
			$this->id=$id;
			$this->reserve=$etatReservation;
			$this->film=$film;
			$this->cinema=$cinema;
			$this->siege=$siege;
			$this->horaire=$horaire;
			$this->client=$client;
		}


        //Getters
		public function getId(){return $this->id;}
		public function getEtatReservation(){return $this->reserve;}
		public function getFilm(){return $this->film;}
		public function getCinema(){return $this->cinema;}
		public function getSiege(){return $this->siege;}
		public function getHoraire(){return $this->horaire;}
		public function getClient(){return $this->client;}


        //Setters
		public function setClient($client){$this->client=$client;}


        //Autre Méthodes

        //Méthode qui commute l'état d'une réservation (la valeur de l'attribut "reserve" 1 (true) devient 0 (false) ou 0 (false) devient 1 (true))
        //Retourne rien.
        public function commuterEtatReservation(){
            switch ($this->reserve) {
				case 0:
					$this->reserve=1;
					break;
				
				case 1:
					$this->reserve=0;
					break;
			}
        }

        
    }

?>