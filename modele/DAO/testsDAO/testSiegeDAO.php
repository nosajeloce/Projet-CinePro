<?php
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/SiegeDAO.class.php");
	require_once(DOSSIER_BASE_INCLUDE."modele/Siege.class.php");


    echo "<h1>Test de la méthode insérer et chercher de la classe SiegeDAO</h1>";
    $siege=new Siege(10001,"J5",5);
    SiegeDAO::inserer($siege);

    $objet_siege=SiegeDAO::chercher(10001);

    echo "ID du siège: ".$objet_siege->getId();
    echo "<br>";
    echo "Code du siège: ".$objet_siege->getCodeSiege();
    echo "<br>";
    echo "ID de la salle dans laquelle le siège se trouve: ".$objet_siege->getIdSalle();
    echo "<br>";

?>