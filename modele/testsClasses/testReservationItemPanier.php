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

    require_once(DOSSIER_BASE_INCLUDE."modele/ItemPanier.class.php");
    require_once(DOSSIER_BASE_INCLUDE."modele/Reservation.class.php");
    require_once(DOSSIER_BASE_INCLUDE."modele/Horaire.class.php");
    require_once(DOSSIER_BASE_INCLUDE."modele/Film.class.php");
    require_once(DOSSIER_BASE_INCLUDE."modele/Cinema.class.php");
    require_once(DOSSIER_BASE_INCLUDE."modele/Siege.class.php");
    require_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");

    //Créer une réservation pour pouvoir créer un ItemPanier
    $horaire=new Horaire(1, "2024-05-06 14:00");
    $film=new Film(1,"The Matrix","matrix","1h30","Description XYZ", '<iframe width="560" height="315" src="https://www.youtube.com/embed/vKQi3bBA1y8?si=Tb6GluvYoZ5tbYe-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',"action","adulte",10);
    $cinema=new Cinema(1,"6400 16e Avenue","Montréal","QC","H1X 2S9");
    $siege=new Siege("A10",5);
    $client=new Client(1, "Alex","Landry", "alandry97@outlook.fr",md5("widxducas123"),"client", 30, 2);
    $reservation=new Reservation(1,$horaire, $film, $cinema, $siege,$client,0);
    
    //Créer l'item panier et tester le constructeur
    $itemPanier= new ItemPanier(1,$reservation);

    //Tester les accesseurs
    echo "ID de l'item panier est: ".$itemPanier->getId();
    echo "Les informations sur la réservation associée :";
    //Tester l'accesseur de ItemPanier
    $reservation_associee=$itemPanier->getReservation(); 
    
    //Afficher tout ceci pour tester les accesseurs de la classe Reservation
    // ID de la réservation associée: 1
    // Nom: Alex Landry
    // Film: The Matrix
    // Adresse du cinéma: 6400 16e Avenue Montréal QC H1X 2S9
    // Salle: 5
    // Siège: A10
    // Date: 2024-05-06
    // Heure: 14:00 
    // État de la réservaiton: 0
    echo "ID de la réservation associée: ".$reservation_associee->getId();
    echo "<br>";
    echo "Nom: ".$reservation_associee->getClient()->getPrenom()." ".$reservation_associee->getClient()->getNom();
    echo "<br>";
    echo "Film: ".$reservation_associee->getFilm()->getTitre();
    echo "<br>";
    echo "Adresse du cinéma: ".$reservation_associee->getCinema()->getAdresse()." ".$reservation_associee->getCinema()->getVille()." ".$reservation_associee->getCinema()->getProvince()." ".$reservation_associee->getCinema()->getCodePostal();
    echo "<br>";
    echo "Salle: ".$reservation_associee->getSiege()->getNumeroSalle();
    echo "<br>";
    echo "Siège: ".$reservation_associee->getSiege()->getCodeSiege();
    echo "<br>";
    echo "Date: ".$reservation_associee->getHoraire()->getDateHeure()->format("Y-m-d");
    echo "<br>";
    echo "Heure: ".$reservation_associee->getHoraire()->getDateHeure()->format("H:i");
    echo "<br>";
    echo "État de la réservation: ".$reservation_associee->getEtatReservation();
    echo "<br>";
    
    //Test de setClient
    echo "<h1>Test de setClient de la classe Reservation</h1>";
    $client2=new Client(2, "Chantal","Carrier", "ccarrier25@outlook.fr",md5("wqerty12345"), "client", 0, 0);
    echo "<h2>Avant</h2>";
    echo "ID:".$client->getId();
    echo "<br>";
    echo "Prénom: ".$client->getPrenom()." Nom: ".$client->getNom();
    echo "<br>";
    echo "Courriel: ".$client->getCourriel();
    echo "<br>";
    echo "MDP crypté: ".$client->getPwd();
    echo "<br>";
    echo "Type de compte: ".$client->getTypeCompte();
    echo "<br>";
    echo "Nombre de points cumulés: ".$client->getNombrePoints();
    echo "<br>";
    echo "Nombre de billets gratuits: ".$client->getNombreBilletsGratuits();
    echo "<br>";

    echo "<h2>Après</h2>";
    echo "ID:".$client2->getId();
    echo "<br>";
    echo "Prénom: ".$client2->getPrenom()." Nom: ".$client2->getNom();
    echo "<br>";
    echo "Courriel: ".$client2->getCourriel();
    echo "<br>";
    echo "MDP crypté: ".$client2->getPwd();
    echo "<br>";
    echo "Type de compte: ".$client2->getTypeCompte();
    echo "<br>";
    echo "Nombre de points cumulés: ".$client2->getNombrePoints();
    echo "<br>";
    echo "Nombre de billets gratuits: ".$client2->getNombreBilletsGratuits();
    echo "<br>";

    echo "<h1>Test de commuterEtatReservation de la classe Reservation</h1>";
    echo "<h2>Avant</h2>";
    echo "État de la réservation: ".$reservation_associee->getEtatReservation();
    //Changer l'état de la réservation à 1 (true).
    $reservation_associee->commuterEtatReservation();
    echo "<br>";
    echo "<h2>Après le changement</h2>";
    echo "État de la réservation: ".$reservation_associee->getEtatReservation();


?>