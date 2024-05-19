<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ItemPanierDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/ItemPanier.class.php");

class AjouterPanier extends Controleur {
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
        /*******************************************Client veut ajouter un film au panier mais veut continuer de magasiner */
        //Créer une variable de session $_SESSION["id_siege"] à partir du formulaire de la page de siège

        //Chercher la réservation associée aux quatre choix (film, cinéma, horaire, siège) avec ReservationDAO::chercherAvecFiltre
        //où le filtre ~ WHERE id_film=$_SESSION["id_film"] AND id_cinema=$_SESSION["id_cinema"] AND id_horaire=$_SESSION["id_horaire"] AND id_siege=$_SESSION["id_siege"]
        //et l'affecter à une variable
        
        //Créer une instance de ItemPanier avec la variable qui contient la réservation
        
        
        //Passer en paramètre l'objet ItemPanier dans la méthode ItemPanierDAO::inserer

        /************************Préparer la page d'accueil dans le cas où tout a déjà été payé avec des billets gratuits*/
        
        //Retourner la vue (page d'accueil)



    } 
}	

?>