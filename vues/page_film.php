<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cinepro - <?=$controleur->getFilm()->getTitre()?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <script defer src="js/page_film.js"></script>
    <link rel="stylesheet" href="CSS/general.css">    
    <link rel="stylesheet" href="CSS/page_film.css">
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <div class="d-flex flex-column justify-content-between">
        
        <!--Entête-->
        <?php include_once("vues/inclusions/entete_client.inc.php"); ?>
        <!--Contenu principal-->
        <div class="p-5 d-flex flex-column">
            <h1><?=$controleur->getFilm()->getTitre()?></h1>
            <div class="d-flex align-items-center">
                <div class="image-film d-flex align-items-center justify-content-center ">
                    <img src="images/<?=$controleur->getFilm()->getImage()?>" alt="<?=$controleur->getFilm()->getTitre()?>">
                </div>
                <div class="ms-3 bg-dark container-fluid d-flex align-items-center justify-content-center border border-dark">
                    <?=$controleur->getFilm()->getBandeAnnonce()?>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div class="infos-film d-flex flex-column align-items-center justify-content-evenly">
                    <div>Genre: <?=$controleur->getFilm()->getCategorie()?></div>
                    <div>Durée: <?=$controleur->getFilm()->getDuree()?></div>
                    <div class="d-flex justify-content-center align-items-center image-classement"><img src="images/<?=$controleur->getFilm()->getClassement()?>" alt="<?=$controleur->getFilm()->getClassement()?>"></div>
                </div>
                <div>
                    <h2>Description du film</h2>
                    <?=$controleur->getFilm()->getDescription()?>
                </div>
            </div>
            <!--Cinémas-->
            <form action="?action=choisirCinemaHoraire" class="cinemas align-self-center">
                <input type="text" id="id-cinema" name="id-cinema" hidden>
                <?php

                    include_once("vues/inclusions/fonctions_affichage.inc.php");
                    //Générer les cinémas et les horaires
                    afficherCinemasHoraires($controleur->getTabCinemas(),$controleur->getTabHoraires());

                ?>
            </form>

        </div>

        <!--Pied de page-->
        <?php include_once("vues/inclusions/pied_page.inc.php") ?>


    </div>
</body>
</html>