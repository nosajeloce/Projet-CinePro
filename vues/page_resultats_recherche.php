<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cinepro - Résultats de recherche</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="CSS/general.css">    
    <link rel="stylesheet" href="CSS/resultats_recherche.css">
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="js/page_resultats_recherche.js"></script>

</head>
<body>
    <div class="d-flex flex-column justify-content-between">
        
        <!--Entête-->
        <?php include_once("vues/inclusions/entete_client.inc.php") ?>

        <!--Contenu principal (Formulaire de connexion)-->
        <div class="bg-light p-5">
            <h2>Résultats pour <?=$_POST["recherche"]?></h2><br>
            <form id="choix-film" action="?action=voirInfosFilm">
                <input id="id-film" type="text" name="id-film" hidden>
                <?php 
                    include_once("vues/inclusions/fonctions_affichage.inc.php");
                    //Afficher les résultats de recherhce
                    afficherResultats($controleur->getTabContenusHypermedias());
                ?>
                
            </form>
        </div>
        
        <!--Pied de page-->
        <?php include_once("vues/inclusions/pied_page.inc.php") ?>

    </div>
</body>
</html>