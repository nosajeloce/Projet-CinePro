<?php

    // Inclusions … 
    $dossierBase = $_SERVER['DOCUMENT_ROOT']."/modele/";
    require_once($dossierBase."DAO/CategorieDAO.class.php");    

    $categorie_action = new Categorie("action.png", "Action");

    CategorieDAO::inserer($categorie_action);

?>