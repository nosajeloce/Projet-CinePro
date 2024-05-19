<?php
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/CompteDAO.class.php");
        

    $compte=new Compte(-1,"Pierre","Luc","pluc9876@outlook.com",md5("abcde123"),"client");
    //Décommenter pour tester
    //CompteDAO::inserer($compte); //Vérifier dans la BD si ça été inséré

    $compte->setPrenom("Bernard");
    //Décommenter pour tester
    //CompteDAO::modifier($compte); //Vérifier que le prénom est maintenant Bernard

    //Commenter pour tester 
    CompteDAO::supprimer(CompteDAO::chercherId($compte->getCourriel())); 



?>