<?php

	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Reservation.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");

    //Changer le temps d'exécution maximal pour l'insertion des données. Par
    //défaut, le temps d'exécution maximal est de 30 secondes.
    set_time_limit(18000); 

    //Insérer seulement des réservations disponibles et modifier leurs statuts de manière aléatoire (reservé=1 ou reservé=0)
    //On devrait avoir 200 000 réservations disponibles
    //Définition de constantes
    define("NOMBRE_FILMS",5); //à renettre à 30
    define("NOMBRE_HORAIRES",2); //à remettre à 20
    define("NOMBRE_CINEMAS",4); //à remettre à 20
    define("NOMBRE_SALLES",5); //à remettre à 5
    define("NOMBRE_SIEGES",10); //à remettre à 100
    
    //Mettre les ID des 30 films dans un tableau.
    //Tableau sera utilisé pour inclure tous les films au moins une fois
    $ids_film=[];
    for ($i=1; $i <= NOMBRE_FILMS; $i++) { 
        array_push($ids_film,$i);
    }
    $id_siege=0;
    $id_salle=0;
    for ($i=1; $i <= NOMBRE_HORAIRES; $i++) { //20 séances de visionnement possibles au total
        for ($j=1; $j <= NOMBRE_CINEMAS ; $j++) {  //20 cinémas
            for ($k=1; $k <= NOMBRE_SALLES; $k++) {  //5 salles/cinéma       
                $id_film_choisi;
                //S'assurer que tous les films sont diffusés au moins une fois
                //Supprimer un ID de film et le lire         
                $id_film=array_pop($ids_film);
                
                //Vérifier s'il reste des ID de film qui n'ont pas été sollicités dans la BD
                //Lorsque le tableau $ids_film est vide, $id_film a la valeur NULL, ce qui va choisir
                //aléatoirement un film sachant que tous les films  ont été choisis au moins une fois.
                //Décision que chaque film soit diffusé au moins une fois est basée sur le désir de tirer profit de chaque
                //donnée de la table film.
                if ($id_film){
                    $id_film_choisi=$id_film;
                } else {
                    // rand(1,30) = générer un nombre aléatoire entre 1 et 30 inclus. Il y aura 30 films dans la BD. À voir avec Akram
                    $id_film_choisi=rand(1,NOMBRE_FILMS);
                }

                $id_salle++;
                for ($l=1; $l <= NOMBRE_SIEGES; $l++) { //100 sièges par salle 
                    $id_siege++;      
                    // 0 = pas réservé
                    ReservationDAO::inserer(0, $id_film_choisi, $j, $id_siege, $i);
                    //Décider si une réservation sera allouée à un client. Comme nous avons 200 000 réservations, il serait bien
                    //d'ajouter des facteurs de probabilité liés à l'assignation des réservations au client pour qu'un client n'ait pas des milliers de réservations.
                    //Constantes arbitraires servant à tester quand une réservation devrait être associée à un client ou non
                    define("MAX_NOMBRE_GENERE",10000);
                    define("MIN_NOMBRE_GENERE",1);
                    //Comme il y a beaucoup de réservations, on se fixera arbitrairement que la probabilité qu'un client est associé à une réservation est de 0.2%.
                    define("PROBABILITE_ASSIGNATION_RESERVATION",0.002);

                    //Générer un nombre aléatoirement
                    $tirage_aleatoire_nombre=rand(MIN_NOMBRE_GENERE,MAX_NOMBRE_GENERE);
                    
                    //Récupérer toutes les réservations et parcourir chacune des réservationss pour possiblement les assigner
                    //à un client
                    $reservations=ReservationDAO::chercherAvecFiltre("");
                    for ($i=0; $i < count($reservations); $i++) { 
                        //Si le nombre généré est au plus de 200 (0.02% de 100 000), alors associer la réservation créée à un client
                        //Sinon, la réservation reste disponible (reserve = false et client = null)
                        if ($tirage_aleatoire_nombre <= MAX_NOMBRE_GENERE * PROBABILITE_ASSIGNATION_RESERVATION){
                            $reservations[$i]->commuterEtatReservation();
                            //rand(1,24) = générer un nombre aléatoire entre 1 et 24 inclus. Au départ, il y aura 25 clients dans la BD.
                            //Le client avec ID 25 n'aura aucune réservation pour des raisons de tests.
                            $reservation[$i]->setClient(ClientDAO::chercher(rand(1,24)));
                            ReservationDAO::modifier($reservation);
                        }
                    }

                    
                }
            }
        }
        //Comme il y a seulement 10 000 sièges, id_siege doit être réinitialisé
        //Dans la table Siege, il y aura 10 000 sièges avec des ID partant de 1 à 10 000.
        //Si on ne réinitialise pas, il y aura erreur d'exécution: le siège 10 001 ne sera pas trouvé. 
        $id_siege=0;
        //Comme il y a seulement 100 salles, id_salle doit être réinitialisé
        //Dans la table salle, il y aura 100 entrées avec des ID partant de 1 à 100.
        //Si on ne réinitialise pas, il y aura erreur d'exécution: la salle 101 ne sera pas trouvé. 
        $id_salle=0;
    }

    echo "<h1>Insertion des données 'réservation' terminée!</h1>";

    

?>