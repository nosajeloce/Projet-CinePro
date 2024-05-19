<?php

	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

    require_once(DOSSIER_BASE_INCLUDE."modele/Admin.class.php");

    //Test du constructeur 
    $compte=new Admin(1,"Samira","Eloy", "eloy1234@hotmail.com", md5("dududusandstorm12345"));
    
    //Test des accesseurs ¸
    echo "Compte administrateur";
    echo "<br>";
    echo "ID:".$compte->getId();
    echo "<br>";
    echo "Prénom: ".$compte->getPrenom()." Nom: ".$compte->getNom();
    echo "<br>";
    echo "Courriel: ".$compte->getCourriel();
    echo "<br>";
    echo "MDP crypté: ".$compte->getPwd();
    echo "<br>";
    echo "Type de compte: ".$compte->getTypeCompte();
    echo "<br>";
    echo "<br>";
    //Test des mutateurs
    echo "Modification du compte administrateur";
    $compte->setPrenom("Jeanne");
    $compte->setNom("Légué");
    $compte->setcourriel("jleg@gmail.com");
    $compte->setPwd(md5("championdumonde54"));
    echo "<br>";
    echo "Prénom: ".$compte->getPrenom()." Nom: ".$compte->getNom();
    echo "<br>";
    echo "Courriel: ".$compte->getCourriel();
    echo "<br>";
    echo "MDP crypté: ".$compte->getPwd();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

?>