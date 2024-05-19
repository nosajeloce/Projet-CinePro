<?php
	/* ==================================================================================
     * Description : DAO pour la classe ItemPanier de la BD cinepro
       Auteur: Akram
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe ItemPanier
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/ItemPanier.class.php");

	// ============================== CLASSE ============================================
	class ItemPanierDAO implements DAO {	

        /*Méthode qui ajoute un item panier de la BD avec l'objet ItemPanier passé en paramètre. */
        /*Paramètre: $ItemPanier est de type ItemPanier */
        /*Retourne void  (rien) */
        public static function inserer($itemPanier){

        }

        /*Méthode qui supprime un item panier de la BD avec sa clé primaire */
        /*Paramètres: $id_ItemPanier est un int. */
        /*Retourne void  (rien) */
        public static function supprimer($id_itemPanier){

        }

        /*Méthode qui extrait toutes les informations d'un ou plusieurs item.s panier à partir du filtre*/
        /*Le filtre commence par la clause WHERE */
        /*Paramètres: $filtre est un string. */
        /*Retourne un tableau d'objet.s ItemPanier */
        public static function chercherAvecFiltre($filtre){

        }

    }
?>
