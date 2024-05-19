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

    require_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");

    //Générer valeur deltaDistance par défaut
    // $largeur_canada=7560; //km
    // $liste_delta_distances;
    // for ($i=1; $i <= 20; $i++) { 
    //     $liste_delta_distances[$i]=rand(1,$largeur_canada);
    // }

    //Test du constructeur
    $compte=new Client(1,"Jean","Tremblay", "jtremblay305@hotmail.com", md5("banane!123"), "client",170,5);
    
    //Test des accesseurs ¸

    echo "<h1>Test des accesseurs</h1>";    
    echo "Compte client";
    echo "ID:".$compte->getId();
    echo "<br>";
    echo "Prénom: ".$compte->getPrenom()." Nom: ".$compte->getNom();
    echo "<br>";
    echo "Courriel: ".$compte->getCourriel();
    echo "<br>";
    echo "MDP crypté: ".$compte->getPwd();
    echo "<br>";
    echo "Type de compte: ".$compte->getTypeCompte();
    echo "<br>";
    // echo "Distances entre le client et les cinémas (ID): ";
    // foreach ($compte->getDeltaDistance() as $id => $distance) {
    //     echo "<br>Cinéma avec ID $id est à $distance km de distance par rapport au client";
    // }
    // echo "<br>";
    echo "Nombre de points cumulés: ".$compte->getNombrePoints();
    echo "<br>";
    echo "Nombre de billets gratuits: ".$compte->getNombreBilletsGratuits();
    echo "<br>";
    // echo "Emplacement du client: Latitude = ".$compte->getEmplacement()->getLatitude()." Longitude = ".$compte->getEmplacement()->getLatitude();
    // echo "<br>";
    
    echo "<br>";
    //Test des mutateurs
    echo "<h1>Test des mutateurs</h1>";
    echo "Modification du compte client";
    $compte->setPrenom("Jeanne");
    $compte->setNom("Légué");
    $compte->setcourriel("jleg@gmail.com");
    $compte->setPwd(md5("championdumonde54"));
    // $compte->setDeltaDistance([1 => 5012, 2 => 5, 3 => 1, 4 => 5500, 5 => 10, 6 => 3695, 7 => 3202, 8 => 2808, 9 => 152, 10 => 4056, 11 => 3509, 12 => 452, 13 => 2180, 14 => 4088, 15 => 1706, 16 => 6968, 17 => 572, 18 => 3474, 19 => 4521, 20 => 2682]);
    echo "<br>";
    echo "Prénom: ".$compte->getPrenom()." Nom: ".$compte->getNom();
    echo "<br>";
    echo "Courriel: ".$compte->getCourriel();
    echo "<br>";
    echo "MDP crypté: ".$compte->getPwd();
    echo "<br>";
    // foreach ($compte->getDeltaDistance() as $id => $distance) {
    //     echo "<br>Cinéma avec ID $id est à $distance km de distance par rapport au client";
    // }
    // echo "<br>";
    echo "Nombre de points cumulés: ".$compte->getNombrePoints();
    echo "<br>";
    echo "Nombre de billets gratuits: ".$compte->getNombreBilletsGratuits();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    
    //Test des autres méthodes de la classe Client

    echo "<h1>Test des autres méthodes</h1>";    
    echo "<h2>Test de la méthode echangerPointsContreBillets</h2>";
    echo "Cas: Dépenser plus que 70 points";
    echo "<br>";


    $compte->echangerPointsContreBillets(90);
    echo "Nombre de points restants: ".$compte->getNombrePoints()."<br>";
    echo "Nombre de billets total: ".$compte->getNombreBilletsGratuits();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    
    echo "Cas: Dépenser moins que 70 points (n'effectue pas la transaction)";
    echo "<br>";
    $compte->echangerPointsContreBillets(60);
    echo "Nombre de points restants: ".$compte->getNombrePoints()."<br>";
    echo "Nombre de billets total: ".$compte->getNombreBilletsGratuits();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    
    echo "Cas: Dépenser exactement 70 points";
    echo "<br>";
    $compte->echangerPointsContreBillets(70);
    echo "Nombre de points restants: ".$compte->getNombrePoints()."<br>";
    echo "Nombre de billets total: ".$compte->getNombreBilletsGratuits();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    echo "<h2>Test de la méthode depenserBilletsGratuits</h2>";

    echo "Nombre de billets total avant transaction : ".$compte->getNombreBilletsGratuits();
    $compte->depenserBilletsGratuits(2);
    echo "<br>";
    echo "<br>";

    echo "Nombre de billets total après transactio (2 billets utilisés) n: ".$compte->getNombreBilletsGratuits();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    // echo "<h2>Test de la méthode calculerDeltaDistance (véfifier quelques cas avec cette calculatrice: https://www.nhc.noaa.gov/gccalc.shtml)</h2>";
    // $tableau_assoc_emplacements_cinema=array();
    // //2 emplacements de chaque province: NL, NS, NB, PE, QC, ON, MB, SK ,AB, BC
    // $latitudes_cinemas=[48.31261,48.14356,44.38538,46.10314,47.613897,47.365090,46.259795,46.355633,45.532990,46.850003,43.692311,45.328657,49.835005,49.856483,52.110578,50.455068,51.020918,53.493891, 49.14377, 49.154641];
    // $longitudes_cinemas=[-55.29444,-57.12467,-63.35426,-61.02252,-65.61896,-68.333900,-63.124221,-62.252448,-73.595712,-71.261939,-79.419272,-75.762989,-99.972715, -97.181932,-106.639477,-104.635756,-114.030784,-113.51075, -123.05027,-122.819593];

    // for ($i=1; $i <= 20; $i++) { 
    //     $tableau_assoc_emplacements_cinema[$i]=new Emplacement($i,$latitudes_cinemas[$i-1],$longitudes_cinemas[$i-1]);
    // }

    // $compte->calculerDeltaDistance($tableau_assoc_emplacements_cinema);
    // foreach ($compte->getDeltaDistance() as $id => $distance) {
    //     echo "<br>Cinéma avec ID $id est à $distance km de distance par rapport au client";
    // }
    // echo "<br>";
    // echo "<br>";
    // echo "<h2>Test de la méthode trierDeltaDistance</h2>";
    // $compte->trierDeltaDistance();
    // foreach ($compte->getDeltaDistance() as $id => $distance) {
    //     echo "<br>Cinéma avec ID $id est à $distance km de distance par rapport au client";
    // }
    // echo "<br>";
    // echo "<br>";
?>