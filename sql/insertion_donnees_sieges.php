<?php 

	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/SiegeDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Siege.class.php");

    //Changer le temps d'exécution maximal pour l'insertion des données. Par
    //défaut, le temps d'exécution maximal est de 30 secondes.
    set_time_limit(300); //Ça devrait prendre 2 minutes environ pour insérer les données


    //Générer les 100 sièges possibles dans une salle
    //Les colonnes vont de A à J et les lignes vont de 1 à 10.    
    //Colonnes
    $colonnes=["A","B","C","D","E","F","G","H","I","J"];

    //Lignes
    $lignes=array();
    for ($i=1; $i <= 10; $i++) { 
        array_push($lignes, $i);
    }

    //Test si le tableau $lignes contient les chiffres entre 1 et 10 inclus
    // foreach ($lignes as $ligne) {
    //     echo $ligne;
    // }

    //Créer l'ensemble des 100 codes de sièges disponibles dans une salle 
    $toutes_codes_sieges_possibles=[];
    foreach ($colonnes as $colonne) {
        foreach ($lignes as $ligne) {
            array_push($toutes_codes_sieges_possibles,$colonne.$ligne);
        }
    }

    //Test si tous les combinaisons de sièges ont été créés
    // foreach ($toutes_codes_sieges_possibles as $siege) {
    //     echo "$siege<br>";
    // }

    define("NOMBRE_SALLES",100);
    for ($i=1; $i <= NOMBRE_SALLES; $i++) { 
        foreach ($toutes_codes_sieges_possibles as $code) {
            //0 sert à prévenir les erreurs d'exécution
            $siege=new Siege (0,$code,$i);
            SiegeDAO::inserer($siege);
        }
    }

    echo "<h1>Insertion des données 'siège' terminée!</h1>";
?>