<?php
	/* ==================================================================================
     * Description : DAO pour la classe Siege de la BD cinepro
       Auteur: Jason
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe Siege
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Siege.class.php");

	// ============================== CLASSE ============================================
	class SiegeDAO implements DAO {	
        
        /*Méthode qui extrait toutes les informations d'un siege avec une clé primaire (id du siege)*/
        /*Paramètres: $id_siege est un int. */
        /*Retourne un objet de type Siege */
        public static function chercher($id_siege){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }
          $siege=null;

          $PDOStmt = $connexion->prepare("SELECT * FROM siege WHERE id_siege=?");

          $PDOStmt->execute(array($id_siege));
          
          $enregistrement;
          if ($PDOStmt->rowCount()>0){
            $enregistrement=$PDOStmt->fetch();
          }

          $siege=new Siege($enregistrement["id_siege"], $enregistrement["code_siege"], $enregistrement["id_salle"]);

          $PDOStmt->closeCursor();
          ConnexionBD::close();
          return $siege;
        }

        /*Méthode qui ajoute un siège dans la BD avec l'objet Siege passé en paramètre. */
        /*Paramètre: $siege est de type Siege */
        /*Retourne void  (rien) */
        //Méthode principalement utilisé pour l'insertion de données.
        public static function inserer($siege){
          // on essaie d’établir la connexion
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          //Préparer la requête
          $PDOStmt=$connexion->prepare("INSERT INTO siege (code_siege,id_salle) VALUES (?,?)");

          //Exécuter la requête
          $PDOStmt->execute(array($siege->getCodeSiege(),$siege->getIdSalle()));

          //Fermer la connexion à la BD
          ConnexionBD::close();

        }

    }
?>
