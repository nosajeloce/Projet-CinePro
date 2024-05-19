<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Utilisez vos billets gratuits ici - Cinepro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <script defer src="js/paiement_billets_gratuits.js"></script>
    <link rel="stylesheet" href="CSS/paiement_billets_gratuits.css">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/barre_progres.css">

</head>
<body>
    <div class="d-flex flex-column justify-content-between">
        
        <!--Entête-->
        <?php include_once("vues/inclusions/entete_client.inc.php") ?>

        <!--Contenu principal-->
        <div class="bg-light p-5">
            <!--Barre de progrès-->
            <?php include_once("vues/inclusions/barre_progres_transaction.inc.php") ?>

            <!--Facture-->
            <div class="border border-dark p-3 rounded">
                <h2 class="text-center fw-bold">Facture</h2><br><br>
                <?php
                    include_once("vues/inclusions/fonctions_affichage.inc.php");
                    afficherFacture($controleur->getTabItemsPanier());
                ?>
            </div>
            <!--Formulaire d'utilisation de billets + informations sur la facture-->
            <div class="d-flex justify-content-between container-fluid p-5">
                <!--section de saisie de billets gratuits-->
                <div class="section-billets p-5 border border-dark rounded">
                    <h2>Utilisez vos billets gratuits ici:</h2>
                    <div>
                        <div class="fs-2"><i class="bi bi-ticket-perforated"></i> <?=$controleur->getClient()->getNombreBilletsGratuits()?></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!--Div pour centrer le formulaire avec d-flex-->
                        <div class="d-flex justify-content-center container-fluid">
                            <!--Formulaire-->
                            <form class="d-flex flex-column align-items-center container-fluid" action="?action=appliquerRabais">
                                <!--billets et boutons + et - -->
                                <div class="d-flex justify-content-evenly formulaire-billets">
                                    <div class="fs-3 moins rounded text-center align-middle btn btn-light border border-dark">
                                        -
                                    </div>
                                    <div>
                                        <i class="bi bi-ticket-perforated fs-1"></i>
                                    </div>
                                    <div class="fs-3 plus rounded text-center align-middle btn btn-light border border-dark">
                                        +
                                    </div>                                
                                    
                                </div>
                                <div>
                                <input type="text" class="saisie-billet-texte text-center" name="saisie-billets" value="0">
                                </div><br>
                                <div>                        
                                    <input type="submit" value="Appliquer Rabais" class="btn btn-dark">
                                </div>
                            </form>

                            
                        </div>

                    </div>
                </div>
                <!--Suite de la facture-->
                <div class="infos-facture fs-3">
                    <div class="p-2 d-flex justify-content-between">
                        <div>Sous-total</div>
                        <div class="pe-3"><?=$controleur->getMontants()[0]?></div>
                    </div>
                    <div class="p-2 d-flex justify-content-between">
                        <div>Taxes</div>
                        <div class="pe-3"><?=$controleur->getMontants()[1]?></div>
                    </div>
                    <div class="p-2 d-flex justify-content-between">
                        <div>Rabais</div>
                        <div class="pe-3"><?=$controleur->getMontants()[2]?></div>
                    </div>
                    <div class="p-2 d-flex justify-content-between">
                        <div>Total</div>
                        <div class="pe-3"><?=$controleur->getMontants()[3]?></div>
                    </div>
                </div>
            </div>
            <!--Boutons suivants et annuler-->
            <div class="d-flex justify-content-end container-fluid">
                <div class="d-flex justify-content-evenly boutons-decision">
                    <a href="?action=voirAccueil"><div class="btn btn-light btn-lg border border-dark">Annuler</div></a>
                    <a href="?action=redirigerVersPaiementOuAccueil"><div class="btn btn-dark btn-lg">Suivant</div></a>
                </div>
            </div>            
        </div>

    </div>
        <!--Pied de page-->
        <?php include_once("vues/inclusions/pied_page.inc.php") ?>

    </div>
</body>
</html>