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

    require_once(DOSSIER_BASE_INCLUDE."modele/Horaire.class.php");

    $horaire=new Horaire(1,"2024-05-26 16:00");
    echo "ID de l'horaire est ".$horaire->getId();
    echo "<br>";
    echo "Date et heure de l'horaire: ".$horaire->getDateHeure()->format("Y-m-d")." ".$horaire->getDateHeure()->format("H:i");
?>