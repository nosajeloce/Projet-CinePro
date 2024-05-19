<?php
	/* ==================================================================================
     * Description : DAO pour la classe Compte de la BD cinepro
       Auteur: Jason
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe compte
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Compte.class.php");

	// ============================== CLASSE ============================================
	class CompteDAO implements DAO {	
        /*Méthode qui extrait l'ID d'un compte de la BD à partir de son courriel. */
        /*Paramètre: $courriel est de type string */
        /*Retourne un int */
        public static function chercherId($courriel){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          //Préparer la requête
          $PDOStmt=$connexion->prepare("SELECT id_compte FROM compte WHERE courriel=?");          

          //Exécuter la requête
          $PDOStmt->execute(array($courriel));

          //Récupérer l'enregistrement
          $enregistrement=$PDOStmt->fetch();
          

          //Fermer la connexion à la BD
          $PDOStmt->closeCursor();
          ConnexionBD::close();
          
          //Retour
          return $enregistrement["id_compte"];

        }

        /*Méthode qui ajoute un compte de la BD avec l'objet Compte passé en paramètre. */
        /*Paramètre: $compte est de type Compte */
        /*Retourne void  (rien) */
        public static function inserer($compte){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          //Préparer la requête
          $PDOStmt=$connexion->prepare("INSERT INTO compte (prenom,nom,courriel,pwd,type_compte) VALUES (?,?,?,?,?)");

          //Exécuter la requête
          $PDOStmt->execute(array($compte->getPrenom(),$compte->getNom(), $compte->getCourriel(), $compte->getPwd(), $compte->getTypeCompte()));

          //Fermer la connexion à la BD
          ConnexionBD::close();

        }

        /*Méthode qui modifie un compte de la BD à partir de l'objet Compte passé en paramètre. */
        /*Paramètre: $compte est de type Compte */
        /*Retourne void  (rien) */
        public static function modifier($compte){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          //Préparer la requête
          $PDOStmt=$connexion->prepare("UPDATE compte SET prenom=?,nom=?,courriel=?,pwd=?,type_compte=? WHERE courriel=?");

          //Exécuter la requête
          $PDOStmt->execute(array($compte->getPrenom(),$compte->getNom(), $compte->getCourriel(), $compte->getPwd(), $compte->getTypeCompte(),$compte->getCourriel()));
          
          //Fermer la connexion à la BD
          ConnexionBD::close();

        }

        /*Méthode qui supprime un compte de la BD avec sa clé primaire */
        /*Paramètres: $id_compte est un int. */
        /*Retourne void  (rien) */
        public static function supprimer($id_compte){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir la connexion à la BD."); 
          }
          // On prépare la commande delete
          $requete=$connexion->prepare("DELETE FROM compte WHERE id_compte=?");
          
          // On l’exécute
          $requete->execute(array($id_compte));

          // fermer la connexion à la BD
          ConnexionBD::close();	
        }

    }
?>
