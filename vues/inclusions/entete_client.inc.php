        <div class="bg-dark">
            <!--Barre en haut-->
            <div class="px-4 py-1 container-fluid d-flex justify-content-between">
                <div class="fs-1 d-flex justify-content-between align-items-center">                    
                    <a href="?action=voirAccueil" class="text-decoration-none"><i class="bi bi-film text-warning d-block"></i></a>                    
                    <a href="?action=voirAccueil" class="text-decoration-none"><span class="text-white d-block">Cinepro</span></a>

                </div>
                <div class="d-flex justify-content-between align-items-center recherche-connexion-panier">
                    <form class="container-fluid p-1 d-flex justify-content-evenly bg-light" action="?action=rechercherContenuHypermedia" method="get">
                            <select name="categorie">
                                <option selected name="tout">Tout</option>
                                <option value="film">Film</option>
                                <option value="categorie-film">Catégorie</option>
                                <option value="promotion">Promotion</option>
                            </select>
                            <input class="barre-recherche form-control-lg ms-1" type="search" placeholder="Rechercher film, catégorie, etc." name="recherche" >
                            <button type="submit" class="bg-dark"><i class="bi bi-search text-white bg-dark fs-3 p-2"></i></button>
                    </form>
                    <div class="haut-droit-header">
                        <div class="d-flex align-items-center justify-content-end ">
                            <a href="?action=voirPageConnexion" class="text-decoration-none ">
                                <div class="fs-5 fw-bold text-wrap text-dark bg-light border p-2 rounded">
                                    <?php
                                        if (ISSET($_SESSION["id_compte"])){
                                            echo '<i class="bi bi-person-circle"></i>';
                                        } else {
                                            echo "Se Connecter";
                                        }
                                    ?>
                                </div>
                            </a>
                            <div>
                                <i class="bi bi-cart2 text-white fs-1 ps-2 ms-3"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--Le bas du header-->
            <div class="container-fluid d-flex">
                <div class="container">
                    <ul class="nav nav-fill nav-pills">
                        <li class="nav-item fs-5">
                        <a class="nav-link text-white" href="?action=voirAccueil"><i class="bi bi-house-door-fill"></i> Accueil</a>
                        </li>
                        <li class="nav-item fs-5">
                        <a class="nav-link text-white" href="#"><i class="bi bi-tv"></i> Cinémas</a>
                        </li>
                                            
                        <li class="nav-item fs-5">
                        <a class="nav-link text-white" href="?action=voirPageContact"><i class="bi bi-telephone"></i> Contact</a>
                        </li>
    
                    </ul> 
                </div>
                <div class="container-fluid d-flex justify-content-end align-items-center">

                    <div class="fs-5 text-white ps-5">
                        <a href="" class="text-decoration-none text-light"><i class="bi bi-ticket-perforated text-"></i> Mes Réservations</a>                    
                    </div>

                </div>
            </div>
        </div>
