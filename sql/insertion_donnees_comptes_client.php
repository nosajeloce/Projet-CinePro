<?php
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/CompteDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Compte.class.php");

    //Tableau de prénoms et de noms
    $tab_prenoms=array("Jason","Moubarak", "Akram", "Youcef", "Pierre", "Alex", "Alexandre", "Chantal", "Samantha", "Sabrina", "Catherine", "Mathieu", "Henrik", "Francois", "Wilson", "Henry", "Anne", "An", "Pierre", "Walther", "Jordane", "Luc", "Francis", "Jacob", "Lleyton");
    $tab_noms=array("Nguyen","Bouh", "Zerhouni", "Djebarra", "Luc", "Leger", "Rondeau", "Landry", "Lopez", "Carvalho", "Vigor", "Tremblay", "LePage", "Carrier", "Tran", "Le", "Falardeau", "West", "Wesner Rabel", "Guillaume", "Ulrich", "Lac", "Bacon", "Boucle", "Ashe");
    
    //Générer des courriels arbitrairement
    $tab_courriels=array();
    for ($i=0; $i < count($tab_noms); $i++) { 
        $nombre_genere_aleatoirement=rand(0,9999);
        $domaines=array("gmail.com", "outlook.com", "yahoo.ca", "hotmail.com");
        //array_rand retourne l'index du choix aléatoire, donc $domaines[array_rand($domaines)] correspond à la valeur associée à l'index choisi aléatoirement par l'ordinateur
        $courriel=strtolower($tab_prenoms[$i][0]).strtolower($tab_noms[$i]).$nombre_genere_aleatoirement."@".$domaines[array_rand($domaines)];
        array_push($tab_courriels,$courriel);
    }

    
    //Mots de passe (ne pas oublier d'utiliser fonction MD5)
    $tab_pwds=array(md5("oVaP9q72"),md5("13kaF6Ii"),md5("z5Qi1d6K"),md5("6u01MlHh"),md5("K093h3Hq"),md5("12z8FgDK"),md5("bw346QI9"),md5("vEY46jK5"),md5("0M81TNne"),md5("0LFr2659"),md5("8PFXuC24"),md5("ZqO966vp"),md5("9hnk0U8g"),md5("37fEqh9k"),md5("38X8vSBe"),md5("1K7JIz2c"),md5("7Psp27Kk"),md5("eFY2662v"),md5("dLC5g054"),md5("ceGT820e"),md5("XmUE085f"),md5("6Ish511O"),md5("436OO6bH"),md5("6QC88iKV"),md5("34r04Q91"));

    //Type de compte: tous des comptes clients (pour l'instant)
    $type_compte="client";
    
    //Créer les objets et les insérer dans la BD
    $objet_compte=null;
    for ($i=0; $i < count($tab_noms); $i++) { 
        //Le 0 est ajouté comme ID temporaire. C'est pour qu'il n'il n'y a pas d'erreurs d'exécution.
        $objet_compte=new Compte(0,$tab_prenoms[$i],$tab_noms[$i],$tab_courriels[$i],$tab_pwds[$i],$type_compte);
        CompteDAO::inserer($objet_compte);
    }



    //But du code qui suit:
    //Les prochaines lignes traitent les attributs particuliers de la classe Client (nombrePoints et nombreBilletsGratuits)
    //Modifier le pointage de visionnement des utilisateurs client de façon arbitraire et 
    //modifier le nombre de billets gratuits qu'ils possèdent.
    //Ces modifications sont arbitraires. Le pointage pourrait rester NULL ou 0, mais pour tester les cas
    //où l'utilisateur a des points ou des billets gratuits, il faut des utilisateurs avec ces choses en possession.
    //Comment sera assigné les pointages et les quantités de billets gratuits:
    //Aléatoirement avec array_rand et par des choix arbitraires.
   
    //Générer pointages arbitraires pour des utilisateurs tests
    //Tableau $pointages_generes utilisé pour tirer au hasard le nombre de points des clients
    $pointages_generes=array();
    define("RECOMPENSE_VISIONNEMENT", 10); //10 points gagnés par réservation
    for ($i=0; $i < 21; $i++) { 
        array_push($pointages_generes,$i * RECOMPENSE_VISIONNEMENT);
    }
   

    //Test si les quanitités de points (pointages) ont bien été mis dans le tableau $pointages_generes. Décommenter pour tester
    // foreach ($pointages_generes as $pointage) {
    //     echo $pointage."<br>";
    // }


    //Choisir un nombre billets gratuits de façon arbitraire pour chaque compte client. 
    //Tableau $tab_nombre_billets utilisé pour tirer au hasard le nombre de billets gratuits des clients
    $tab_nombre_billets=array(0,1,3,7,2,4);
    
    //Création des objets Client et les modifier
    for ($i=1; $i <= 25; $i++) { 
        $compte=ClientDAO::chercher($i); //À décommenter quand Akram a terminé ClientDAO
        $compte_client=new Client($i,$compte->getPrenom(),$compte->getNom(),$compte->getCourriel(),$compte->getPwd(),"client",[],$tab_nombre_billets[array_rand($pointages_generes)],$tab_nombre_billets[array_rand($tab_nombre_billets)]);

        // Donner les points et les billets gratuits
        ClientDAO::modifier($compte_client); //À décommenter quand Akram a terminé ClientDAO
    }

    echo "<h1>Insertion des données 'compte' terminée!</h1>";

?>