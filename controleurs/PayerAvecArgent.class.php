<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/FilmDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/ItemPanier.class.php");

class PayerAvecArgent extends Controleur {
    //Attributs
    private $tabItemsPanier;
    private $tabContenusHypermedias;

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    //Accesseur
    public function getTabContenusHypermedias(){
        return $this->tabContenusHypermedias;
    }
    
    public function getTabItemsPanier(){
        return $this->tabItemsPanier;
    }
    
    // ******************* Méthode exécuter action
    public function executerAction() {
        /*******************Récupérer les items panier du client pour les afficher dans la facture */
        //Récupérer les réservations ajoutées au panier du client
        $reservations=ReservationDAO::chercherAvecFiltre("WHERE id_client=".$_SESSION["id_compte"]." AND reserve=0");

        $sous_total=0;
        $taxes=0;
        $total=0;
        $rabais=0;
        //Stocker les items panier dans $tabItemsPanier et préparer les montants de la facture
        for ($i=0; $i < count($reservations); $i++) {
            //Préparer les montants de la facture
            $sous_total+=$reservations[$i]->getFilm()->getPrix();
            $taxes+=$reservations[$i]->getFilm()->getPrix()*0.15;
            //Appliquer les rabais sur les premiers items du panier (les films ont tous le même prix)
            if ($i < $_SESSION["nb_billets_gratuits_utilises"]){
                //Réduire sous-total + taxes associées
                $rabais+=1.15*$reservations[$i]->getFilm()->getPrix();
            }
            //Préparer les informations sur la facture
            $itemPanier=new ItemPanier($reservations[$i]->getId(),$reservations[$i]);
            array_push($this->tabItemsPanier,$itemPanier);            
        }
        $total=$sous_total+$taxes-$rabais;
        array_push($this->montants,$sous_total,$taxes,$rabais,$total);
        
        
        /************************Préparer la page d'accueil dans le cas où tout a déjà été payé avec des billets gratuits*/
        $this->tabContenusHypermedias=FilmDAO::chercherAvecFiltre("");

        
        /************************Retour de la vue */
        if ($_SESSION["nb_billets_gratuits_utilises"] < count($this->tabItemsPanier)){
            return "page_paiement_monetaire";
        } else {

        }
    }
}
?>