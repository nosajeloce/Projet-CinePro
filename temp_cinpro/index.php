<?php
    // *****************************************************************************************
	// Description : Contrôleur frontal du site
	// Date        :
	// Auteur      : Jason Nguyen (Pris de l'examen sommatif 2 avec l'ajout de sessions)
    // *****************************************************************************************

    // Définition d'une constante pour les inclusions en PHP
	$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
	define("DOSSIER_BASE_INCLUDE", $chemin."cinepro-moub-jas-you-akr/");
		
	//Inclusion de la manufacture de controleur (qui importe déjà tous les contrôleur)
	include_once DOSSIER_BASE_INCLUDE."controleurs/ManufactureControleur.class.php";
	
	//Initier une session ou la rafraîchir
	session_start();

	// Vérfiez et récupérez l'action dans la variable $action 
	$action = (ISSET($_GET["action"])) ? $_GET["action"] : "";

	// Récupérez le contrôleur à partir de la manufacture et placez-le dans la variable $controleur 
	$controleur = ManufactureControleur::creerControleur($action);
	
	// Executez l'action et récupérez le nom de la vue dans la variable $vue
	$vue=$controleur->executerAction();

	// Faites l'inclusion de la vue spécifiée par la variable $vue, en prenant 
	// soin de spécifier le chemin et l'extension
	include_once("vues/$vue.php");
	
?>