<?php
	/* ==================================================================================
     * Description : DAO pour la classe Horaire de la BD cinepro
       Auteur: Jason
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe Horaire
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Horaire.class.php");

	// ============================== CLASSE ============================================
	class HoraireDAO implements DAO {	
        
        /*Méthode qui extrait toutes les informations d'un horaire avec une clé primaire (id du horaire)*/
        /*Paramètres: $id_horaire est un int. */
        /*Retourne un objet de type Horaire */
        public static function chercher($id_horaire){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          $horaire=null;

          $PDOStmt=$connexion->prepare("SELECT * FROM horaire WHERE id_horaire = ?");
          $PDOStmt->execute(array($id_horaire));
          if ($PDOStmt->rowCount()>0){
              $enregistrement=$PDOStmt->fetch();
              $horaire=new Horaire($id_horaire,$enregistrement["date_heure"]);
          }

          $PDOStmt->closeCursor();
          ConnexionBD::close();	
          return $horaire;
        }

        /*Méthode qui extrait toutes les informations d'un ou plusieurs horaire.s à partir du filtre*/
        /*Le filtre commence par la clause WHERE */
        /*Paramètres: $filtre est un string. */
        /*Retourne un ou des objet.s de type Horaire */
        public static function chercherAvecFiltre($filtre){
          try {
            $connexion=ConnexionBD::getInstance();
          } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
          }

          $horaires=[];

          $PDOStmt=$connexion->prepare("SELECT DISTINCT horaire.id_horaire AS id, date_heure FROM horaire,reservation ".$filtre);
          $PDOStmt->execute(array());
          
          foreach ($PDOStmt as $enregistrement) {
            $horaire=new Horaire($enregistrement["id"],$enregistrement["date_heure"]);                
            array_push($horaires, $horaire);
          }

          $PDOStmt->closeCursor();
          ConnexionBD::close();	
          return $horaires;
        }		
    }
?>
