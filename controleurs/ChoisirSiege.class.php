<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ItemPanierDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");

class ChoisirSìege extends Controleur {
    //Attributs
    private $client;

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    //Accesseur
    public function getClient(){
        return $this->client;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        /************************************INsérer une réservation disponible dans son panier/dans la table item_panier */
        //Créer une variable de session $_SESSION["id_siege"] à partir du choix de siège soumis au formulaire

        //Chercher la réservation associée aux quatre choix (film, cinéma, horaire, siège) avec ReservationDAO::chercherAvecFiltre
        //et l'affecter à une variable

        //Créer une instance de ItemPanier avec la variable qui contient la réservation
        
        //Changer l'attribut client de la réservation contenue dans l'ItemPanier pour associer la réservation de l'item panier au client courant

        
        //Utiliser la méthode ItemPanierDAO::inserer

        
        /************************************Préparer les informations d'affichage sur le client (nombrePoints et nombreBilletsGratuits) */
        //Affecter à l'attribut privé de ce controleur $client avec ClientDAO::chercher avec comme paramètre $_SESSION["id_compte"].


        //Retourner la vue (page d'échange de points)

    }
}
?>