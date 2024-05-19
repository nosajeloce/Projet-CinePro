<?php
	/* ==================================================================================
     * Description : DAO pour la classe Film de la BD cinepro
       Auteur: Akram
	 * ==================================================================================
	*/
		
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe Film
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Film.class.php");

	// ============================== CLASSE ============================================
	class FilmDAO implements DAO {	
        
        /*Méthode qui extrait toutes les informations d'un film avec une clé primaire (id du film)*/
        /*Paramètres: $id_film est un int. */
        /*Retourne un objet de type Film */
        public static function chercher($id_film){

        }

        /*Méthode qui extrait toutes les informations d'un ou plusieurs film.s à partir du filtre*/
        /*Le filtre commence par la clause WHERE */
        /*Paramètres: $filtre est un string. */
        /*Retourne un ou des objet.s de type Film */
        public static function chercherAvecFiltre($filtre){

        }

        /*Méthode qui ajoute un film de la BD avec l'objet Film passé en paramètre. */
        /*Paramètre: $film est de type Film */
        /*Retourne void  (rien) */
        public static function inserer($film){

        }

        /*Méthode qui modifie un film de la BD à partir de l'objet Film passé en paramètre. */
        /*Paramètre: $film est de type Film */
        /*Retourne void  (rien) */
        public static function modifier($film){

        }

        /*Méthode qui supprime un film de la BD avec sa clé primaire */
        /*Paramètres: $id_film est un int. */
        /*Retourne void  (rien) */
        public static function supprimer($id_film){

        }

    }
?>
