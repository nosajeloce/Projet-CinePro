<?php

include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/Client.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/ItemPanier.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ClientDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ReservationDAO.class.php");

class PayerAvecBilletsGratuits extends Controleur {
    
    //Attributs
    private $client;
    private $tabItemsPanier=[];
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
        /******************Modifier l'attribut nombreBilletsGratuits de l'objet Client et dans la BD*/
        //Vérifier que le formulaire d'utilisation de billets gratuits a été soumise
        if (ISSET($_GET["saisie-billets"])){
            //Créer une variable de session $_SESSION["nb_billets_gratuits_utilisés"] qui prend la valeur
            //saisie dans le formulaire. L'idée d'utiliser cette variable de session est de 
            //pouvoir voir les rabais dans la facture de l'étape suivante (page de paiement monétaire) au niveau du
            //HTML. 
            $nb_billets_gratuits_utilises=transforme_HTML($_GET["saisie-billets"]);
            $_SESSION["nb_billets_gratuits_utilises"]=$nb_billets_gratuits_utilises;
            //Mettre à jour le nombre de billets gratuits du client dans la BD et dans l'objet Client dans<
            //l'attribut $client de ce controleur.
            $this->client=ClientDAO::chercher($_SESSION["id_compte"]);
            $this->client->depenserBilletsGratuits($_SESSION["nb_billets_gratuits_utilises"]);
            ClientDAO::modifier($this->client);
        }

        /*******************Récupérer les items panier du client pour les afficher dans la facture de la prochaine page*/
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
            //Préparer les informations sur le.s séance.s de visionnement
            $itemPanier=new ItemPanier($reservations[$i]->getId(),$reservations[$i]);
            array_push($this->tabItemsPanier,$itemPanier);            
        }
        $total=$sous_total+$taxes-$rabais;
        array_push($this->montants,$sous_total,$taxes,$rabais,$total);
        
        
        
        //Retourner la vue (page de paiement par billets gratuits)
        return "paiement_billets_gratuits";
    }
}
?>