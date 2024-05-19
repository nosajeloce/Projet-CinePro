<?php
	/* ==================================================================================
     * Description : DAO pour la classe Cinema de la BD cinepro
       Auteur: Youcef
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe Cinema
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Cinema.class.php");

	// ============================== CLASSE ============================================
	class CinemaDAO implements DAO {	
        
        /*Méthode qui extrait toutes les informations d'un cinéma avec sa clé primaire (id du cinéma)*/
        /*Paramètres: $id_cinema est un int. */
        /*Retourne un objet de type Cinema */
        public static function chercher($id_cinema){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          $cinema=null;

          $PDOStmt=$connexion->prepare("SELECT * FROM cinema WHERE id_cinema = ?");
          $PDOStmt->execute(array($id_cinema));

          if ($PDOStmt->rowCount()>0){
              $enregistrement=$PDOStmt->fetch();
              $cinema=new Cinema($id_cinema,$enregistrement["nom"],$enregistrement["adresse"],$enregistrement["ville"],$enregistrement["province"],$enregistrement["code_postal"]);                
          }

          $PDOStmt->closeCursor();
          ConnexionBD::close();	
          return $cinema;
        }

        
        /*Méthode qui ajoute un cinéma dans la BD avec l'objet Cinema passé en paramètre. */
        /*Paramètre: $cinema est de type Cinema */
        /*Retourne void  (rien) */
        public static function inserer($cinema){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          //Préparer la requête
          $PDOStmt=$connexion->prepare("INSERT INTO cinema (nom,adresse,ville,province,code_postal) VALUES (?,?,?,?,?)");

          //Exécuter la requête
          $PDOStmt->execute(array($cinema->getNom(),$cinema->getAdresse(), $cinema->getVille(), $cinema->getProvince(), $cinema->getCodePostal()));

          //Fermer la connexion à la BD
          ConnexionBD::close();

        }

        /*Méthode qui modifie un cinéma dans la BD à partir de l'objet Cinema passé en paramètre. */
        /*Paramètre: $cinema est de type Cinema */
        /*Retourne void  (rien) */
        public static function modifier($cinema){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD."); 
          }

          $PDOStmt=$connexion->prepare("UPDATE cinema SET nom=?,adresse=?,ville=?,province=?,code_postal=? WHERE id_cinema=?");
          $PDOStmt->execute(array($cinema->getNom(),$cinema->getAdresse(),$cinema->getVille(),$cinema->getProvince(),$cinema->getCodePostal(),$cinema->getId()));

          ConnexionBD::close();
        }

        /*Méthode qui supprime un cinema de la BD avec sa clé primaire */
        /*Paramètres: $id_cinema est un int. */
        /*Retourne void  (rien) */
        public static function supprimer($id_cinema){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD."); 
          }

          $PDOStmt=$connexion->prepare("DELETE FROM cinema WHERE id_cinema=?");
          $PDOStmt->execute(array($id_cinema));

          ConnexionBD::close();
        }

    }
?>
