<?php

	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/SalleDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Salle.class.php");

    define("NOMBRE_CINEMAS",20);
    define("NOMBRE_SALLES_PAR_CINEMA",5);

    for ($i=1; $i <= NOMBRE_CINEMAS; $i++) { 
        for ($j=1; $j <= NOMBRE_SALLES_PAR_CINEMA; $j++) {
            //0 sert à prévenir des erreurs d'exécution 
            $salle = new Salle(0,$j);
            SalleDAO::inserer($salle,$i);
        }
    }

?>