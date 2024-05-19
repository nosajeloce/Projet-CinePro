<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePro - Choix de siège</title>
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <script defer src="js/page_siege.js"></script>
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/page_siege.css">
    <link rel="stylesheet" href="CSS/barre_progres.css">

</head>
<body>
    <div class="d-flex flex-column justify-content-between">
        <!--Entête-->
        <?php include_once("vues/inclusions/entete_client.inc.php"); ?>

        <!--Contenu principal-->
        <div class="p-5 d-flex flex-column align-items-center">
            <?php include_once("vues/inclusions/barre_progres_transaction.inc.php"); ?>
            <h1 class="align-self-start pb-5">Sièges - Choisissez votre siège</h1>
            <form action="" class="formulaire-siege">
                <table class="container-fluid ">
                    <tr class="fs-3 text-center">
                        <td></td><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th><th>I</th><th>J</th>
                    </tr>
                    <?php
                        include_once("vues/inclusions/fonctions_affichage.inc.php");
                        afficherSieges($controleur->getTabReservations());
                    ?>

                </table>
                <div class="p-3">
                    <i class="bi bi-square fs-3 ps-5"> Disponible</i> 
                    <i class="bi bi-person-square fs-3 ps-5"> Occupé</i> 
                </div>
                <div class="boutons d-flex pt-5">
                    <div class="vide-boutons"></div>
                    <div class="container-fluid d-flex justify-content-between ">
                        <a href="?action=voirAccueil">
                            <div class="btn btn-dark btn-lg">
                                Annuler
                            </div>
                        </a>
                        <input id="ajout-panier" type="button" value="Ajouter réservation au panier" class="btn btn-dark btn-lg">
                        <input id="proceder-paiement" type="button" value="Procéder au paiement" class="btn btn-dark btn-lg">
                    </div>
                </div>
            </form>

        </div>

        <!--Pied de page-->
        <?php  include_once("vues/inclusions/pied_page.inc.php"); ?>
    </div>
</body>
</html>