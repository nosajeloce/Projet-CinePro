<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cinepro - Page de paiement</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <script defer src="js/page_paiement_monetaire.js"></script>
    <link rel="stylesheet" href="CSS/paiement_monetaire.css">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/barre_progres.css">
</head>
<body>
    <div class="d-flex flex-column justify-content-between">
        <!--Entête-->
        <?php include_once("vues/inclusions/entete_client.inc.php"); ?>
        <!--Contenu principal-->
        <div class="bg-light p-5">
            <!--Barre de progrès-->
            <?php include_once("vues/inclusions/barre_progres_transaction.inc.php") ?>
            <!--Facture-->
            <div class="p-3 ">
                <h2 class="text-center fw-bold">Facture</h2><br><br>
                <?php
                    include_once("vues/inclusions/fonctions_affichage.inc.php");
                    afficherFacture($controleur->getTabItemsPanier());
                ?>
            </div>
            <!--Formulaire de paiement + informations sur la facture-->
                <form class="container-fluid pe-5" action="payer" method="post">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-center container-fluid pt-5">
                            <div class="border border-dark p-3 rounded">
                                <h2>Saisissez vos informations bancaires</h2><br>
                                <label for="numero-carte" class="fs-5">Numéro de carte:</label><br>
                                <input type="text" id="numero-carte" class="form-control border border-dark" placeholder="1234567890123456"><br>
                                <label for="nom" class="fs-5">Nom du détenteur de la carte:</label><br>
                                <input type="text" id="nom" class="form-control border border-dark" placeholder="Adam Smith"><br>
                                <div class="d-flex justify-content-evenly">
                                    <div class="p-2">
                                        <label for="mois-exp" class="fs-5">Mois d'expiration</label><br>
                                        <input type="text" id="mois-exp" placeholder="MM" class="form-control border border-dark">
                                    </div>
                                    <div class="p-2">
                                        <label for="annee-exp" class="fs-5">Année d'expiration</label><br>
                                        <input type="text" id="annee-exp" placeholder="AA" class="form-control border border-dark">
                                    </div>
                                    <div class="p-2">
                                        <label for="cvv" class="fs-5">CVV</label><br>
                                        <input type="text" id="cvv" class="form-control border border-dark" placeholder="123">
                                    </div>
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
                            <div class="btn btn-dark btn-lg">Payer</div>
                        </div>
                    </div> 
                </form>           
        </div>
    </div>
        <!--Pied de page-->
        <?php include_once("vues/inclusions/pied_page.inc.php") ?>

    </div>
</body>
</html>