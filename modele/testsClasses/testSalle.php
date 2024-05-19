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

    require_once(DOSSIER_BASE_INCLUDE."modele/Salle.class.php");

    $salle=new Salle(1, 3);
    echo "ID de la salle est : ".$salle->getId();
    echo "<br>";
    echo "Numero de la salle est: ".$salle->getNumeroSalle();

?>
