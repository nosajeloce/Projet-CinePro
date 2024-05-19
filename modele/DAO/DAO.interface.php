<?php
	/* Description : interface à implémenter pour tous les DAO
	
	*/

	// ****** INLCUSIONS *******
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	// Importe l'interface DAO et la classe Produit
	// Donne accès à la classe de connexion à la BD
	// Pas besoin de la réimporter dans les classes implémente l'interface
	require_once(DOSSIER_BASE_INCLUDE.'modele/DAO/ConnexionBD.class.php');

	// ****** INTERFACE *******
	interface DAO {	

    }
?>