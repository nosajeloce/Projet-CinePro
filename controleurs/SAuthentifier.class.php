<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CompteDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");

class SAuthentifier extends Controleur {
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
        /******************************Préparer les films de la page d'accueil */
        $this->tabContenusHypermedias=FilmDAO::chercherAvecFiltre("");


        //Aller chercher l'ID de compte associé
        $courriel="";
        $id_compte; 
        if (!empty($_POST["courriel"])){
            $courriel=transforme_HTML($_POST["courriel"]);
            $id_compte=CompteDAO::chercherId($courriel);
        }

        //Vérifier le mot de passe et créer la variable de session $_SESSION["id_compte"] si les MDP correspondent
        $compte_avec_courriel_correspondant=ClientDAO::chercher($id_compte);
        if (!empty($_POST["password"])){
            $password=transforme_HTML($_POST["password"]);
            if ($compte_avec_courriel_correspondant->getPwd()===md5($password)){
                $_SESSION["id_compte"]=$id_compte;
            }
        }

        
        //Retourner la vue (accueil)


    } 
}	

?>