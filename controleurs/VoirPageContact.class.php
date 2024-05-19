<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

class VoirPageContact extends Controleur {
    
    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    

    // ******************* Méthode exécuter action
    public function executerAction() {
        //Retourner la vue
        return "contact";
    }


    
}	


?>