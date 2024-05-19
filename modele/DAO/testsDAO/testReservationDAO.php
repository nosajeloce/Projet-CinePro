<?php
    //En attente après les tables film, cinema, horaire, siege et compte, les classes DAO associées à ces tables et les classes logicielles
    //utilisées par ces classes DAO pour commencer à tester ReservationDAO.
	/* ==================================================================================
     * Description : Test de la classe ReservationDAO
	   Auteur: Jason
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Reservation.class.php");

    //Test de la méthode chercher
    //Réservation à ajouter
    $reservation=ReservationDAO::chercher(102);
    echo "ID de la réservation:".$reservation->getId(); 
    echo "<br>";
    echo "Réservé:".$reservation->getEtatReservation();    
    echo "<br>";
    echo "Client #".$reservation->getClient()->getId().":".$reservation->getClient()->getPrenom()." ".$reservation->getClient()->getNom();
    echo "<br>";
    echo "Film #".$reservation->getFilm()->getId().":".$reservation->getFilm()->getTitre();
    echo "<br>";
    echo "Cinéma #".$reservation->getCinema()->getId().":".$reservation->getCinema()->getNom();
    echo "<br>";
    echo "Horaire #".$reservation->getHoraire()->getId().":".$reservation->getHoraire()->getDateHeure();
    echo "<br>";
    echo "Siège #".$reservation->getSiege()->getId().":".$reservation->getSiege()->getCodeSiege()." dans la salle #".$reservation->getSiege()->getIdSalle();

    //Réservation à annuler
    $reservation2=ReservationDAO::chercher(1006);
    echo "ID de la réservation:".$reservation2->getId(); 
    echo "<br>";
    echo "Réservé:".$reservation2->getEtatReservation();    
    echo "<br>";
    echo "Client #".$reservation2->getClient()->getId().":".$reservation2->getClient()->getPrenom()." ".$reservation2->getClient()->getNom();
    echo "<br>";
    echo "Film #".$reservation2->getFilm()->getId().":".$reservation2->getFilm()->getTitre();
    echo "<br>";
    echo "Cinéma #".$reservation2->getCinema()->getId().":".$reservation2->getCinema()->getNom();
    echo "<br>";
    echo "Horaire #".$reservation2->getHoraire()->getId().":".$reservation2->getHoraire()->getDateHeure();
    echo "<br>";
    echo "Siège #".$reservation2->getSiege()->getId().":".$reservation2->getSiege()->getCodeSiege()." dans la salle #".$reservation2->getSiege()->getIdSalle();
    echo "<br>";
    echo "<br>";
    echo "<br>";

    //Tester la méthode modifier
    //Ajout de réservation
    //En réalité, le paramètre sera un objet Client obtenu du formulaire d'"ajout" de réservation étant soumise par l'administrateur ou l'agent ou lorsque
    //le client effectue une réservation. Supposons que le client dont l'ID est 20 a effectué une réservation. On a donc:
    $reservation->setClient(ClientDAO::chercher(20));
    $reservation->commuterEtatReservation(); //L'attribut reserve de l'objet Reservation devient true après cette opération
    ReservationDAO::modifier($reservation);
    echo "La réservation".$reservation->getId()."a été ajoutée";
    echo "ID de la réservation:".$reservation->getId(); 
    echo "<br>";
    echo "Réservé:".$reservation->getEtatReservation();    
    echo "<br>";
    echo "Client #".$reservation->getClient()->getId().":".$reservation->getClient()->getPrenom()." ".$reservation->getClient()->getNom();
    echo "<br>";


    //Annulation de réservation du même client (ID=20)
    $reservation2->setClient(null);
    $reservation2->commuterEtatReservation(); //L'attribut reserve de l'objet Reservation devient false après cette opération
    ReservationDAO::modifier($reservation2);
    echo "La réservation".$reservation2->getId()."a été annulée";
    echo "ID de la réservation:".$reservation2->getId(); 
    echo "<br>";
    echo "Réservé:".$reservation2->getEtatReservation();    
    echo "<br>";
    echo "Client #".$reservation2->getClient()->getId().":".$reservation2->getClient()->getPrenom()." ".$reservation2->getClient()->getNom();
    echo "<br>";
    echo "<br>";
    echo "<br>";


    //Supposons que le client veut modifier sa réservation: il veut rétablir son ancien choix par exemple. 
    //La réservation que le client ne veut plus est désormais $reservation et celle qu'il veut est $reservation2.    
    //Cet exemple s'applique à tous les cas de modifications de réservation
    //Dans ce cas, il faut utiliser la méthode modifier 2 fois. (1 pour rendre la réservation à annuler disponible et 1 pour rendre la nouvelle réservation choisie non disponible)
    //Rendre indisponible $reservation2. La réservation $reservation2 sera réservée.
    $reservation2->setClient($reservation->getClient());
    $reservation2->commuterEtatReservation();
    ReservationDAO::modifier($reservation2);
    echo "ID de la réservation:".$reservation2->getId(); 
    echo "<br>";
    echo "Réservé:".$reservation2->getEtatReservation();    
    echo "<br>";
    echo "Client #".$reservation2->getClient()->getId().":".$reservation2->getClient()->getPrenom()." ".$reservation2->getClient()->getNom();
    echo "<br>";


    //Rendre disponible $reservation: la réservation a été annulée
    $reservation->setClient(null);
    $reservation->commuterEtatReservation();
    ReservationDAO::modifier($reservation);
    echo "ID de la réservation:".$reservation->getId(); 
    echo "<br>";
    echo "Réservé:".$reservation->getEtatReservation();    
    echo "<br>";
    echo "Client #".$reservation->getClient()->getId().":".$reservation->getClient()->getPrenom()." ".$reservation->getClient()->getNom();


    //Test de la méthode chercherAvecFiltre
    $reservations=ReservationDAO::chercherAvecFiltre("WHERE id_film=1");
    foreach ($reservations as $reservation) {
        echo "ID de la réservation:".$reservation->getId(); 
        echo "<br>";
        echo "Réservé:".$reservation->getEtatReservation();    
        echo "<br>";
        echo "Client #".$reservation->getClient()->getId().":".$reservation->getClient()->getPrenom()." ".$reservation->getClient()->getNom();
        echo "<br>";
        echo "Film #".$reservation->getFilm()->getId().":".$reservation->getFilm()->getTitre();
        echo "<br>";
        echo "Cinéma #".$reservation->getCinema()->getId().":".$reservation->getCinema()->getNom();
        echo "<br>";
        echo "Horaire #".$reservation->getHoraire()->getId().":".$reservation->getHoraire()->getDateHeure();
        echo "<br>";
        echo "Siège #".$reservation->getSiege()->getId().":".$reservation->getSiege()->getCodeSiege()." dans la salle #".$reservation->getSiege()->getIdSalle();
    }

?>