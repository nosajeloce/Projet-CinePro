<?php

require_once(DOSSIER_BASE_INCLUDE."modele/Film.class.php");
require_once(DOSSIER_BASE_INCLUDE."modele/Cinema.class.php");
require_once(DOSSIER_BASE_INCLUDE."modele/Reservation.class.php");
require_once(DOSSIER_BASE_INCLUDE."modele/Siege.class.php");
require_once(DOSSIER_BASE_INCLUDE."modele/ItemPanier.class.php");
require_once(DOSSIER_BASE_INCLUDE."modele/Horaire.class.php");

function afficherResultats($tabFilms){
    foreach ($tabFilms as $film) {
        echo '<a href="" id='.$film->getId().' class="text-decoration-none text-dark d-block mt-3">';
            echo '<div class="container-fluid film border border-dark d-flex align-items-center">';
                echo '<div class="d-flex align-items-center">';
                    echo '<img src="images/'.$film->getImage().'" alt="'.$film->getTitre().'">';
                echo "</div>";
                echo '<div class="p-3">';
                    echo "<h3>".$film->getTitre()."</h3>";
                    echo "<div>";
                        echo "Genre du film: ".$film->getCategorie();
                    echo "</div>";
                    echo "<div>Durée du film: ".$film->getDuree()."</div>";
                echo "</div>";
            echo "</div>";                
        echo "</a>";
    }
}

function afficherCinemasHoraires($tabCinemas,$tabHoraires){
    foreach ($tabCinemas as $cinema) {
        echo "<div>";
            echo '<a href="" class="text-decoration-none text-dark" id="'.$cinema->getId().'">';
                echo '<div class="fs-2 p-3 mt-5 d-flex justify-content-between border border-dark rounded">';
                    echo "<div>";
                        $cinema->getNom();
                    echo "</div>";
                    echo "<div>V</div>";
                echo "</div>";
            echo "</a>";
            echo '<div class="border border-dark p-2 rounded horaires" id="'.$cinema->getId().'-horaire">';

                echo '<div class="ps-4 pt-2 pb-4 fw-bold">'.$cinema->getAdresse().' '.$cinema->getVille().' '.$cinema->getProvince().' '.$cinema->getCodePostal().'</div>';
                echo '<div class="d-flex justify-content-start ps-4 pe-4">';
                    echo "<div>";
                        echo '<label for="date">Date de réservation: </label>';
                        echo '<select name="date" id="date" class="form-select d-inline">';
                            foreach ($tabHoraires as $horaire) {
                                echo '<option value="'.$horaire->getDateHeure()->format("Y-m-d").'">'.$horaire->getDateHeure()->format("d M").'</option>';
                            }
                        echo "</select>";

                    echo "</div>";
                    echo '<div class="ms-3">';
                        echo '<label for="heure">Heure de réservation: </label>';
                        echo '<select name="heure" id="heure" class="form-select d-inline">';
                            foreach ($tabHoraires as $horaire) {
                                echo '<option value="'.$horaire->getDateHeure()->format("H:i").'">'.$horaire->getDateHeure()->format("H\hi").'</option>';
                            }
                        echo "</select>";
                    echo "</div>";
                echo "</div>";
                echo '<div class="d-flex justify-content-end">';
                    echo '<input type="submit" value="Choisir horaire" class="btn-lg btn-dark">';
                echo "</div>";
            echo "</div>";
        echo "</div>";

    }
}

function afficherSieges($tabReservations){
    $i=1;
    foreach ($tabReservations as $reservation) {
        $siege=$reservation->getSiege();
        echo "<tr>";
            echo '<th class="fs-3">'.$i.'</th>';

            if (defined("NOMBRE_COLONNES")==false){
                define("NOMBRE_COLONNES",10);
            }
            //Générer les sièges visuellement
            for ($j=0; $j < NOMBRE_COLONNES; $j++) { 
                //Tester si la réservation/siège est occupé ou disponible et ajouter l'icône correspondant
                switch ($reservation->getEtatReservation()) {
                    case '0':
                        echo '<td class="text-center"><input type="radio" id="'.$siege->getId().'" name="choixSiege" hidden value='.$siege->getId().'><label for="'.$siege->getId().'"><i class="bi bi-square fs-1"></i></label></td>';
                        break;
                    
                    case '1':
                        echo '<td class="text-center"><input type="radio" id="'.$siege->getId().'" name="choixSiege" hidden value='.$siege->getId().'><label for="'.$siege->getId().'"><i class="bi bi-person-square fs-1"></i></label></td>';
                        break;
                }
            }
        echo "</tr>";
        $i+=1;
    }
}

function afficherFacture($tabItemsPanier){
    foreach ($tabItemsPanier as $itemPanier) {
        $reservation=$itemPanier->getReservation();
        echo '<div class="item-panier p-2 border border-dark d-flex justify-content-between align-items-center rounded mb-3">';
            echo '<div class="infos-item-panier d-flex">';
                echo '<div class="image-film ">';
                    echo '<img src="images/'.$reservation->getFilm()->getImage().'" alt="'.$reservation->getFilm()->getTitre().'">';
                echo '</div>';
                echo '<div class="container-fluid">';
                    echo '<h3 class="ps-3 pt-1">'.$reservation->getFilm()->getTitre().'</h3>';
                    echo '<div class="d-flex">';
                        echo '<div id="infos-pt1" class="ps-4">';
                            echo '<div>Cinéma: '.$reservation->getCinema()->getNom().'</div>';
                            echo '<div>Date: '.$reservation->getHoraire()->getDateHeure()->format("d M Y").'</div>';
                            echo '<div>Heure: '.$reservation->getHoraire()->getDateHeure()->format("H\hi").'</div>';
                        echo '</div>';
                        echo '<div>';
                            $id_salle=$reservation->getSiege()->getIdSalle();
                            //Numéro de la salle doit être entre 1 et 5
                            $numero_salle=$id_salle%5; //affecter 1,2,3,4 ou 0.
                            $numero_salle=($numero_salle==0)?5:$numero_salle; //Si c'est 0, le numéro est divisible par 5. Remplacer 0 par 5.
                            echo '<div>Salle: '.$numero_salle.'</div>';
                            echo '<div>Code de votre siège: '.$reservation->getSiege()->getCodeSiege().'</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="fs-3 pe-5">'.$reservation->getFilm()->getPrix().'</div>';
        echo '</div>';

    }

}

?>