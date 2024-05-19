<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cinepro - Contact</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='bootstrap/css/bootstrap.css'>
    <link rel="stylesheet" href="bootstrap/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <script src='bootstrap/js/bootstrap.bundle.js'></script>
    <script defer src="jquery/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="CSS/general.css">
</head>
<body>
        <?php include_once("vues/inclusions/entete_client.inc.php"); ?>
        
        <div class="bg-light p-5 d-flex flex-wrap ">
            <!--Formulaire de contact-->
            <div class="formulaire-contact p-3">
                <h1 class="fs-1 ps-4 text-dark">Contact</h1>
                <!--Action TBD-->
                <form action="" method="post" class="p-4">
                    <div class="d-flex justify-content-start">
                        <div>
                            <label for="prenom" class="text-dark fw-bold form-label fs-5">Votre Prénom:</label>
                            <input type="text" name="prenom" id="prenom" required="required" class="border border-secondary form-control">
                        </div>
                        <div class="ps-5">
                            <label for="nom" class="text-dark fw-bold form-label fs-5">Votre Nom:</label>
                            <input type="text" name="nom" id="nom" required="required" class="form-control border border-secondary ">
                        </div>
                    </div>
                    <div class="pt-4">
                        <div>
                            <label for="courriel" class="text-dark fw-bold form-label fs-5">Votre Courriel:</label>
                            <input type="email" name="courriel" id="courriel" required="required" class="form-control border border-secondary ">
                        </div>
                    </div>
                    <div>
                        <label for="sujet" class="fw-bold form-label pt-5 fs-5 text-dark">Vos Questions ou Commentaires:</label> <br>
                        <input type="text" name="sujet" id="sujet" required="required" class="border border-secondary form-control-lg container-fluid" placeholder="Sujet">
                    </div>
                    <div class="pt-4">
                        <textarea class="border border-secondary form-control" name="questions-commentaires" cols="30" rows="10" placeholder="Saisir vos questions ou vos commentaires ici" required="required"></textarea>
                    </div>
                    <div class="pt-4">
                        <input value="Soumettre" type="submit" class="btn btn-dark form-control">
                    </div>
                </form>
            </div>
            <!--Informations sur le contact en personne ou à distance-->
            <div class="infos-contact d-flex flex-column align-items-start border-start border-secondary p-5">
                <div class="ps-4 pt-2 fs-4">
                    <i class="bi bi-telephone text-dark"></i> <span class="text-dark">(514) 246-3776</span>                
                </div>
                <div class="ps-4 pt-2 fs-4">
                    <i class="bi bi-envelope text-dark"></i> <a href="mailto:info@cinepro.ca" class="text-dark text-decoration-none">info@cinepro.ca</a>
                </div>
                <div class="ps-4 pt-2 text-dark fs-4">
                    <i class="bi bi-tree-fill text-success "></i> 
                     <span>
                        Horaire des fêtes pour nous contacter: <br>
                    </span>
                    <span class="fs-6">
                        Pâques: Fermé entre 6h pm - 11h pm <br>
                        Noël: Fermé <br>
                    </span>
                </div>
            </div>
        </div>
        <!--Pied de page-->
        <?php  include_once("vues/inclusions/pied_page.inc.php"); ?>
    </div>
</body>
</html>