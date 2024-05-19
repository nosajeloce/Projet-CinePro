<?php

	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");

    echo "<h1>Test de CinemaDAO::chercher</h1>";
    $cinema=CinemaDAO::chercher(15);
    echo "ID du cinéma: ".$cinema->getId();
    echo "<br>";
    echo "Nom du cinéma: ".$cinema->getNom();
    echo "<br>";
    echo "Adresse du cinéma: ".$cinema->getAdresse();
    echo "<br>";
    echo "Ville du cinéma: ".$cinema->getVille();
    echo "<br>";
    echo "Province: ".$cinema->getProvince();
    echo "<br>";
    echo "Code postal: ".$cinema->getCodePostal();
    echo "<br>";
    
    
    echo "<h1>Test de CinemaDAO::inserer</h1>";
    $cinema_a_inserer=new Cinema(21,"Alice Theater","6400 16e avenue","Montréal","QC","H1X 2S9");
    CinemaDAO::inserer($cinema_a_inserer);
    $cinema_21=CinemaDAO::chercher(21);
    echo "ID du cinéma inséré: ".$cinema->getId();
    echo "<br>";
    echo "Nom du cinéma inséré: ".$cinema->getNom();
    echo "<br>";
    echo "Adresse du cinéma inséré: ".$cinema->getAdresse();
    echo "<br>";
    echo "Ville du cinéma inséré: ".$cinema->getVille();
    echo "<br>";
    echo "Province du cinéma inséré: ".$cinema->getProvince();
    echo "<br>";
    echo "Code postal du cinéma inséré: ".$cinema->getCodePostal();
    echo "<br>";
    
    
    echo "<h1>Test de CinemaDAO::modifier</h1>";
    $cinema21_different=new Cinema(21, "Bob's Theater", "3800 Sherbrooke St E", "Montreal", "Quebec", "H1X 2A2");
    CinemaDAO::modifier($cinema21_different);
    echo "ID du cinéma modifié: ".$cinema->getId();
    echo "<br>";
    echo "Nom du cinéma modifié: ".$cinema->getNom();
    echo "<br>";
    echo "Adresse du cinéma modifié: ".$cinema->getAdresse();
    echo "<br>";
    echo "Ville du cinéma modifié: ".$cinema->getVille();
    echo "<br>";
    echo "Province du cinéma modifié: ".$cinema->getProvince();
    echo "<br>";
    echo "Code postal du cinéma modifié: ".$cinema->getCodePostal();
    echo "<br>";

    //Suppression du cinéma avec ID 21
    CinemaDAO::supprimer(21);


?>