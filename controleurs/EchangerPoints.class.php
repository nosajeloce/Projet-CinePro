<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");

class EchangerPoints extends Controleur {
    
    //Attributs
    private $client;
    private $tabItemsPanier;
    private $montants;

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }
    
    //Accesseur
    public function getClient(){
        return $this->client;
    }
    
    public function getTabItemsPanier(){
        return $this->tabItemsPanier;
    }

    public function getMontants(){
        return $this->montants;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        /*******************Récupérer les items panier du client pour les afficher dans la facture de la prochaine page*/
        //Récupérer les réservations ajoutées au panier du client
        $reservations=ReservationDAO::chercherAvecFiltre("WHERE id_client=".$_SESSION["id_compte"]." AND reserve=0");

        $sous_total=0;
        $taxes=0;
        $total=0;
        $rabais=0;
        //Stocker les items panier dans $tabItemsPanier
        for ($i=0; $i < count($reservations); $i++) {
            //Préparer les montants de la facture
            $sous_total+=$reservations[$i]->getFilm()->getPrix();
            $taxes+=$reservations[$i]->getFilm()->getPrix()*0.15;
            //Préparer les informations sur la facture
            $itemPanier=new ItemPanier($reservations[$i]->getId(),$reservations[$i]);
            array_push($this->tabItemsPanier,$itemPanier);            
        }
        $total=$sous_total+$taxes-$rabais;
        array_push($this->montants,$sous_total,$taxes,$rabais,$total);



        /*******************Changer les informations du client dans la BD après transaction billets-points */

        //Récupérer le nombre de points saisi dans la page d'échange de points
        $nb_points_echanges=ISSET($_GET[""])?transforme_HTML($_GET[""]):"";

        //Chercher l'objet Client courant pour effectuer des opérations sur le client
        $this->client=ClientDAO::chercher($_SESSION["id_compte"]);

        //Utiliser la méthode echangerPointsContreBillets sur l'objet Client en passnt en paramètre 
        //le nombre de points saisi au fomulaire
        $this->client->echangerPointsContreBillets($nb_points_echanges);

        //Modifier le nombre de points et le nombre de billets gratuits en possession du client dans la BD
        ClientDAO::modifier($this->client);

        
        
        //Retourner la vue (page de paiement par billets gratuits)
        return "paiement_billets_gratuits";
    }
}
?>