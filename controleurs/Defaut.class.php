<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

class Defaut extends  Controleur {
    //Attributs
    private $tabContenusHypermedias;

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    //Accesseur
    public function getTabContenusHypermedias(){
        return $this->tabContenusHypermedias;
    }
    

    // ******************* Méthode exécuter action
    public function executerAction() {
        /*****************************************Aller chercher les films pour la page d'accueil */
        //Avec FilmDAO::chercherAvecFiltre et affecter résultat à l'attribut privé $tabContenusHypermedias
        $this->tabContenusHypermedias=FilmDAO::chercherAvecFiltre("");

        //Retourner la vue (accueil)
        
    }


    
}	

?>