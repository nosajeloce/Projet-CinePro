<?php
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}
	require_once(DOSSIER_BASE_INCLUDE."modele/DAO/HoraireDAO.class.php");
        

    $horaire=HoraireDAO::chercher(20);
    echo "<h1>Test de HoraireDAO::chercher</h1>";
    echo "ID de l'horaire est ".$horaire->getId();
    echo "<br>";
    echo "Date et heure de l'horaire: ".$horaire->getDateHeure()->format("Y-m-d")." ".$horaire->getDateHeure()->format("H:i");
    echo "<h1>Test de HoraireDAO::chercherAvecFiltre</h1>";
    $horaires=HoraireDAO::chercherAvecFiltre("WHERE DATE(date_heure)='2024-05-26'");
    foreach ($horaires as $horaire) {
        echo "Date et heure de l'horaire: ".$horaire->getDateHeure()->format("Y-m-d")." ".$horaire->getDateHeure()->format("H:i")."<br>";
    }

?>