<?php
    // *****************************************************************************************
	// Description   : Classe abstraite parente de toutes les contrôleurs spécifiques
	// 
    // Auteur: Jason Nguyen (Copié de l'examen sommatif 2)
    // *****************************************************************************************
	abstract class Controleur {
		// ******************* Attributs 
		protected $messagesErreur = array();
		
		// ******************* Constructeur vide
		public function __construct() {}
		
		// ******************* Accesseurs 
		public function getMessagesErreur() { return $this->messagesErreur; }

		// ******************* Méthode abstraite executer action
		// Cette méthode :
		//  - gère la session (s'il y en a une)
		//  - valide les données reçues en POST (s'il y en a)
		//  - effectue le travail requis par l'action (interactions avec les DAO, ...)
		//  - retourne le nom de la vue à appliquer (en format string, sans le chemin(path))
		abstract public function executerAction();

		function transforme_HTML($chaine, $longueur = null) {
			// Aide à empêcher les attaques XSS
			// Supression des espaces inutiles.
			$chaine = trim($chaine);
			// Empêche des problèmes potentiels avec le codec Unicode.
			$chaine = utf8_decode($chaine);
			// HTMLise les caractères spécifiques à HTML.
			$chaine = htmlentities($chaine, ENT_NOQUOTES);
			$chaine = str_replace("#", "&#35;", $chaine);
			$chaine = str_replace("%", "&#37;", $chaine);
			$longueur = intval($longueur);
			if ($longueur > 0) {
				$chaine = substr($chaine, 0, $longueur);
			}
			return $chaine;
		}
			
	}
	
?>