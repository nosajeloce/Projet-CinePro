<?php
	/* ==================================================================================
     * Description : DAO pour la classe Reservation de la BD cinepro
	   Auteur: Jason
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe Reservation
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Reservation.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/HoraireDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/FilmDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/SiegeDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");

	// ============================== CLASSE ============================================
	class ReservationDAO implements DAO {	
        
        /*Méthode qui extrait toutes les informations d'une réservation avec une clé primaire (id de la réservation)*/
        /*Paramètres: $id_reservation est un int. */
        /*Retourne un objet de type Reservation */
        public static function chercher($id_reservation){
            try {
              $connexion=ConnexionBD::getInstance();
            } catch (Exception $e) {
              throw new Exception("Impossible d’obtenir la connexion à la BD."); 
            }

            $reservation=null;

            $PDOStmt=$connexion->prepare("SELECT * FROM reservation WHERE id_reservation = ?");
            $PDOStmt->execute(array($id_reservation));

            if ($PDOStmt->rowCount()>0){
                $enregistrement=$PDOStmt->fetch();
                $reservation=new Reservation($enregistrement["id_reservation"],HoraireDAO::chercher($enregistrement["id_horaire"]),FilmDAO::chercher($enregistrement["id_film"]),CinemaDAO::chercher($enregistrement["id_cinema"]),SiegeDAO::chercher($enregistrement["id_siege"]),ClientDAO::chercher($enregistrement["id_compte_client"]),$enregistrement["reserve"]);                
            }

            $PDOStmt->closeCursor();
            ConnexionBD::close();	
            return $reservation;
        }


        /*Méthode qui modifie une réservation */      
        /*Paramètre: $reservation est de type Reservation */
        /*Retourne void  (rien) */
        //Utilisation:
        //  Pour annuler une réservation:
        //      1. Avoir utilisé la méthode setClient pour changer le client à null.
        //      2. Avoir utilisé la méthode commuterEtatReservation   
        //      3. Utiliser la méthode modifier en passant en paramètre la réservation
        //  Pour ajouter une réservation:
        //      1. Avoir utilisé la méthode setClient pour changer la valeur null à un objet Client.
        //      2. Avoir utilisé la méthode commuterEtatReservation 
        //      3. Utiliser la méthode modifier en passant en paramètre la réservation
        //  Pour modifier une réservation ("Ajout" d'une nouvelle réservation ensuite une "annulation" de l'ancienne réservation choisie)  
        //      1. Avoir utilisé la méthode setClient pour changer la valeur null à un objet Client à partir
        //      de l'objet Client de la réservation à annuler.
        //      2. Avoir utilisé la méthode commuterEtatReservation sur cette réservation pour que 
        //      la réservation soit marquée comme réservée (reserve=true).
        //      3. Utiliser la méthode modifier sur l'objet réservation à "ajouter" dont l'attribut reserve a été nouvellement 
        //      changé à true.
        //      4. Avoir utilisé la méthode setClient pour changer d'un objet Client à null de la réservation à annuler.
        //      5. Avoir utilisé la méthode commuterEtatReservation sur cette réservation pour que 
        //      la réservation soit marquée comme non réservée (reserve=false).
        //      6. Utiliser la méthode modifier sur l'objet réservation à "annuler" dont l'attribut reserve a été nouvellement 
        //      changé à false.
        //Note: Des guillemets ont été ajoutées autour de "Ajouter" et "Annuler" parce qu'en réalité, on ne fait que modifier
        //      l'état de la réservation et le client qui occupe la réservation.
        public static function modifier($reservation){
            try {
              $connexion=ConnexionBD::getInstance();
            } catch (Exception $e) {
              throw new Exception("Impossible d'obtenir la connexion à la BD."); 
            }

            $PDOStmt=$connexion->prepare("UPDATE reservation SET reserve=?,id_compte_client=? WHERE id_reservation=?");
            $PDOStmt->execute(array($reservation->getEtatReservation(),$reservation->getClient()->getId(),$reservation->getId()));

            ConnexionBD::close();

        }

        /*Méthode qui ajoute un réservation dans la BD avec l'objet Reservation passé en paramètre. */
        /*Méthode qui sert seulement À l'insertion des données dans la BD */
        /**$reserve est soit 0 soit 1 (false ou true) */
        /*Retourne void  (rien) */
        public static function inserer($reserve,$id_film,$id_cinema,$id_siege,$id_horaire){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          //Préparer la requête
          $PDOStmt=$connexion->prepare("INSERT INTO reservation (reserve,id_film,id_cinema,id_siege,id_horaire) VALUES (?,?,?,?,?)");

          //Exécuter la requête
          $PDOStmt->execute(array($reserve,$id_film,$id_cinema,$id_siege,$id_horaire));

          //Fermer la connexion à la BD
          ConnexionBD::close();

        }

        /*Méthode qui extrait toutes les informations d'une ou plusieurs réservation.s à partir du filtre*/
        /*Le filtre commence par la clause WHERE */
        /*Paramètres: $filtre est un string. */
        /*Retourne un ou des objet.s de type Reservation */
        public static function chercherAvecFiltre($filtre){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }
          $reservations=[];

          $PDOStmt = $connexion->prepare("SELECT * FROM reservation ".$filtre);
          $PDOStmt->execute(array());
          foreach ($PDOStmt as $enregistrement) {
            $reservation=new Reservation($enregistrement["id_reservation"],HoraireDAO::chercher($enregistrement["id_horaire"]),FilmDAO::chercher($enregistrement["id_film"]),CinemaDAO::chercher($enregistrement["id_cinema"]),SiegeDAO::chercher($enregistrement["id_siege"]),ClientDAO::chercher($enregistrement["id_compte_client"]),$enregistrement["reserve"]);                
            array_push($reservations, $reservation);
          }

          $PDOStmt->closeCurosr();
          ConnexionBD::close();
          return $reservations;
        }
    }
?>
