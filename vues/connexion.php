<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cinepro - Connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <script src="js/validation_formulaire_connexion.js"></script>
    <link rel="stylesheet" href="CSS/general.css">

</head>
<body>
    <div class="d-flex flex-column justify-content-between">
        
        <?php include_once("vues/inclusions/entete_client.inc.php"); ?>

            <!--Contenu principal (Formulaire de connexion)-->
        <div class="bg-light p-5 d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center">
                <h1 class="text-dark">Connexion</h1>
                <form action="sAuthentifier" method="post" class="d-flex flex-column align-items-center p-5"  onsubmit="return fonctionValidation()">
                    <div class="pb-4">
                        <label for="courriel" class="text-dark fw-bold form-label pb">Courriel:</label>
                        <input type="text" name="courriel" class="form-control border border-secondary" id="courriel">
                    </div>
                    <div class="pb-4">
                        <label for="pwd" class="form-label fw-bold text-dark">Mot de passe:</label>
                        <input type="password" name="password" class="form-control border border-secondary" id="pwd">
                    </div>
                    <div class="pb-4">
                        <input type="checkbox" name="garder-session-ouverte" id="session">
                        <label for="session" class="form-label text-dark">Garder ma session ouverte</label>
                    </div>
                    <div class="pb-4">
                        <input type="submit" value="Se connecter" class="btn btn-dark">
                    </div>
                    <div class="text-dark">
                        Besoin d'un compte? <a href="#" class="text-dark">Inscription</a>
                    </div>
    
                </form>
            </div>
        </div>
        <!--Pied de page-->
        <?php include_once("vues/inclusions/pied_page.inc.php"); ?>

    </div>
</body>
</html>