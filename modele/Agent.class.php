<?php
	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

    require_once(DOSSIER_BASE_INCLUDE."modele/Compte.class.php");
	
    class Agent extends Compte {
        //constructeur
		public function __construct($id,$prenom,$nom,$courriel,$pwd,$typeCompte="agent"){
			parent::__construct($id,$prenom,$nom,$courriel,$pwd,$typeCompte);
		}
    }

?>