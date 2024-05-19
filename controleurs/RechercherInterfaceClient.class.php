<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/FilmDAO.class.php");
class RechercherInterfaceClient extends Controleur {
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
        //Récupérer le type de recherche (name="categorie") et la recherche (name="recherche")
        $type_recherche=ISSET($_GET["categorie"])?transforme_HTML($_GET["categorie"]):"";
        $recherche=(!empty($_GET["recherche"]))?transforme_HTML($_GET["recherche"]):"";
        
        //Traiter quatre cas:
        switch ($type_recherche) {
            //Premier cas ($_GET["categorie"]=="tout"): Ajouter à l'attribut privé  $tabContenusHypermedias tous les films
            //de la BD correspondant à la recherche. $tabContenusHypermedias ne contient que des objets de type Film dans ce cas
            case 'tout':
                $this->tabContenusHypermedias=FilmDAO::chercherAvecFiltre("WHERE titre LIKE %'".$recherche."'%");
                break;
            //Deuxième cas ($_GET["categorie"]=="film") + considérer ($_GET["recherche"]): Ajouter à l'attribut privé  
            //$tabContenusHypermedias les films dans la BD qui correspondent à la recherche. 
            case 'film':
                $this->tabContenusHypermedias=FilmDAO::chercherAvecFiltre("WHERE titre LIKE %'".$recherche."'%");
                break;
            //Troisième cas et quatrième cas seront traités plus tard: pas assez de temps     
            case 'categorie-film':
                # code...
                break;
            
            case 'promotion':
                # code...
                break;

        }
        
        //Retourner la vue (Page de résultats de recherche)
        return "page_resultats_recherche";
    }
}
?>