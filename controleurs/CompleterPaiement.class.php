<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");

class CompleterPaiement extends Controleur {
    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    // ******************* Méthode exécuter action
    public function executerAction() {
        /*******************Modifier l'état des réservations dans le panier (reserve = 1, soit true) et suppression des items dans le panier*/
        //Extraire tous les items dans le panier et les affecter dans une variable avec
        //ItemPanierDAO::chercherAvecFiltre 

        //Pour chaque ItemPanier dans la variable contenant le tableau d'ItemPanier,
        //changer l'attribut reserve à 1 avec commuterEtatReservation. Passer la réservation associée à l'ItemPanier
        //dans la méthode ReservationDAO::modifier


        //Supprimer les items dans le panier avec ItemPanierDAO::supprimer($_SESSION["id_compte"])
               
        
        /************************Retour de la vue (page d'accueil) + points de retour d'achat*/
        //Ajouter 10 points pour chaque items dans le panier payés avec une carte débit/crédit ([nb d'items panier]-$_SESSION["nb_billets_gratuits_utilisés"]) 
        //avec ClientDAO::chercher et le setter setNombrePoints de la classe Client
        
        //Supprimer toutes les variables de session sauf $_SESSION["id_compte"] avec unset():
        //-$_SESSION["id_film"]
        //-$_SESSION["id_cinema"]
        //-$_SESSION["id_horaire"]
        //-$_SESSION["id_siege"]        
        //-$_SESSION["nb_billets_gratuits_utilisés"]


        //Retour de la vue (accueil)

    }
}
?>