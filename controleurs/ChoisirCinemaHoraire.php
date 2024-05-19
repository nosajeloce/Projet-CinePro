<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");

class ChoisirCinemaHoraire extends Controleur {
    //Attributs
    private $tabReservations;

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    //Accesseur
    public function getTabReservations(){
        return $this->tabReservations;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {       
        //Créer les variables de session correspondant aux ID du cinéma choisi, ID de l'horaire choisi ($_SESSION["id_cinema"] et $_SESSION["id_horaire"])        

        //Chercher l'ensemble des réservations disponibles ou non en utilisant les ID des variables de session recueillies jusqu'à maintenant.
        //Pour ce faire, utiliser ReservationDAO::chercherAvecFiltre($filtre) où filtre ressemble (pas exactement) à ceci:
        //WHERE id_film=$_SESSION["id_film"] AND id_cinema=$_SESSION["id_cinema"] AND id_horaire=$_SESSION["id_horaire"]  ORDER BY id_siege      

    
        //Retourner la vue (pages des sièges)
        

    } 
}	

?>