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

    require_once(DOSSIER_BASE_INCLUDE."modele/Reservation.class.php");

    class ItemPanier {
        //Attributs privés 
        private $id;
        private $reservation;

        //Constructeur 
        public function __construct($id, $reservation){
            $this->id=$id;
            $this->reservation=$reservation;
        }


        //Getters
        public function getId(){return $this->id;}
        public function getReservation(){return $this->reservation;}


        //Destructeur
        public function __destruct(){
            echo "Objet ItemPanier détruit";
        }
     
    }

?>