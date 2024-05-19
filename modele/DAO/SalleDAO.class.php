<?php
	/* ==================================================================================
     * Description : DAO pour la classe Compte de la BD cinepro
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe compte
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Salle.class.php");

	// ============================== CLASSE ============================================
	class SalleDAO implements DAO {	
        /*Méthode qui ajoute une salle dans la BD avec l'objet Salle passé en paramètre. */
        /*Paramètre: $salle est de type Salle. $id_cinema est de type int*/
        /*Retourne void  (rien) */
        public static function inserer($salle,$id_cinema){
            // on essaie d’établir la connexion
            try {
              $connexion=ConnexionBD::getInstance();
            } catch (Exception $e) {
              throw new Exception("Impossible d’obtenir la connexion à la BD."); 
            }
  
            //Préparer la requête
            $PDOStmt=$connexion->prepare("INSERT INTO salle (numero_salle, id_cinema) VALUES (?,?)");
  
            //Exécuter la requête
            $PDOStmt->execute(array($salle->getNumeroSalle(),$id_cinema));
  
            //Fermer la connexion à la BD
            ConnexionBD::close();
  
          }
  
          

    }
?>
