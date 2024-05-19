<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/FilmDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/HoraireDAO.class.php");

class VoirInfosFilm extends Controleur {
    //Attributs
    private $film;
    private $tabCinemas;
    private $tabHoraires;

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    //Accesseurs
    public function getFilm(){
        return $this->film;
    }

    public function getTabCinemas(){
        return $this->tabCinemas;
    }

    public function getTabHoraires(){
        return $this->tabHoraires;
    }

    

    // ******************* Méthode exécuter action
    public function executerAction() {    
        //Récupérer l'ID du film choisi dans une variable de session ($_SESSION["id_film"])
        $id_film=ISSET($_GET["id-film"])?transforme_HTML($_GET["id-film"]):"";
        $_SESSION["id_film"]=$id_film;

        //Chercher les informations du film choisi par le client avec FilmDAO::chercher($id_film) 
        $this->film=FilmDAO::chercher($_SESSION["id_film"]);

        //Chercher les informations liées aux cinémas du film choisi par le client avec CinemaDAO::chercherAvecFiltre($filtre) 
        $this->tabCinemas=CinemaDAO::chercherAvecFiltre("WHERE cinema.id_cinema=reservation.id_cinema AND id_film=".$_SESSION["id_film"]." AND reserve=0");

        //Chercher les informations liées aux horaires du film choisi par le client avec HoraireDAO::chercherAvecFiltre($filtre) 
        $this->tabHoraires=HoraireDAO::chercherAvecFiltre("WHERE horaire.id_horaire=reservation.id_horaire AND id_film=".$_SESSION["id_film"]." AND reserve=0");

        //Retourner la vue
        return "page_film";

    } 
}	

?>