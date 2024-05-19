<?php
	/* ==================================================================================
     * Description : DAO pour la classe Client de la BD cinepro
       Auteur: Akram
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe client
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");

	// ============================== CLASSE ============================================
	class ClientDAO implements DAO {	
        
        /*Méthode qui extrait toutes les informations d'un client avec une clé primaire (id du client)*/
        /*Paramètres: $id_client est un int. */
        /*Retourne un objet de type Client */
        public static function chercher($id_client){

        }

        /*Méthode qui modifie un client de la BD à partir de l'objet Client passé en paramètre. */
        /*Paramètre: $client est de type Client */
        /*Retourne void  (rien) */
        public static function modifier($client){

        }

    }
?>
