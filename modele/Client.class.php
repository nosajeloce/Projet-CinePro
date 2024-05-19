<?php
	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."cinepro-moub-jas-you-akr/");
	}

    require_once(DOSSIER_BASE_INCLUDE."modele/Compte.class.php");
    
    class Client extends Compte {
        //Attributs privés propres à la classe Client
        //private $deltaDistance;
        private $nombrePoints;
        private $nombreBilletsGratuits;
        //private $emplacement;


        //Constructeur (utiliser la classe parent avec parent::)
        public function __construct($id=0,$prenom,$nom,$courriel,$pwd,$typeCompte="client",$nombrePoints,$nombreBilletsGratuits){
            parent::__construct($id,$prenom,$nom,$courriel,$pwd, $typeCompte);
            //$this->deltaDistance=$deltaDistance;
            $this->nombrePoints=$nombrePoints;
            $this->nombreBilletsGratuits=$nombreBilletsGratuits;
            //$this->emplacement=$emplacement;
        }


        //Getters
        public function getDeltaDistance(){
            return $this->deltaDistance;
        }
        public function getNombrePoints(){
            return $this->nombrePoints;
        }
        public function getNombreBilletsGratuits(){
            return $this->nombreBilletsGratuits;
        }
        // public function getEmplacement(){
        //     return $this->emplacement;
        // }


        //Setters
        // public function setDeltaDistance($nouveau_delta_distance){
        //     $this->deltaDistance=$nouveau_delta_distance;
        // }



        //Autre Méthodes

        //Méthode qui change les deux attributs nombrePoints et nombreBilletsGratuits si ce qui est passé en
        //paramètre est supérieur à 70.
        //1 billet gratuit coûte 70 points. Nombre de billets gratuits réclamé = nombrePoints // 70
        //Soustraire de nombrePoints le nombre de points saisis arrondi au plus grand à multiple de 70 inférieur ou égal
        //au paramètre passé.
        //Additionner à nombreBilletsGratuits le résultat du calcul de la division entière.
        //$nombrePointsSaisis est un int
        //Retourne rien
        public function echangerPointsContreBillets($nombrePointsSaisis){
            if (defined("COUT_BILLET_GRATUIT") == false) {
                define("COUT_BILLET_GRATUIT",70);
            }
            //intdiv = division entière (PHP 7, 8)
            $nombreBilletsSaisis = intdiv($nombrePointsSaisis,COUT_BILLET_GRATUIT);
            $this->nombreBilletsGratuits += $nombreBilletsSaisis;
            $this->nombrePoints -= $nombreBilletsSaisis * COUT_BILLET_GRATUIT;
        }

        //Méthode qui diminue le nombre de billets gratuits de $nombreBilletsGratuits billets.
        //$nombreBilletsGratuitsSaisis est de type int
        //retourne void (rien)
        public function depenserBilletsGratuits($nombreBilletsGratuitsSaisis){
            $this->nombreBilletsGratuits -= $nombreBilletsGratuitsSaisis;
        }

        //Méthode qui calcule la distance entre les coordonnées du client et celles de tous les cinémas.
        //Formule à utiliser: https://stackoverflow.com/questions/27928/calculate-distance-between-two-latitude-longitude-points-haversine-formula 
        //Le paramètre est un tableau dont les éléments sont de type Emplacement correspondant aux emplacements de cinéma.
        //Le tableau du paramètre est de type aassociatif dont les clés sont les ID des cinémas et les valeurs sont les objets Emplacement
        //corrrespondant au cinéma.
        //Retourne rien
        // public function calculerDeltaDistance($tabAssocIdEmplacementsCinema){
        //     //Réinitialiser deltaDistance dans le cas où le client se déplacerait
        //     $this->deltaDistance=[];
        //     foreach ($tabAssocIdEmplacementsCinema as $id => $emplacement) {
        //         //Calcul de la distance entre deux coordonnées latitude-longitude
        //         //Préparation des informations
        //         $lat1=$this->emplacement->getLatitude();
        //         $long1=$this->emplacement->getLongitude();
        //         $lat2=$emplacement->getLatitude();
        //         $long2=$emplacement->getLongitude();                
        //         $rayon_terre = 6371;
        //         $lat1_rad = deg2rad($lat1);
        //         $lat2_rad = deg2rad($lat2);
        //         $diff_lat_rad = deg2rad($lat2 - $lat1);
        //         $diff_long_rad = deg2rad($long2 - $long1);

        //         //Application de la formule Haversine
        //         $a = pow(sin($diff_lat_rad/2),2) + cos($lat1_rad) * cos($lat2_rad) * pow(sin($diff_long_rad/2),2);
        //         $c = 2 * atan2(sqrt($a),sqrt(1 - $a));
        //         $distance = round($rayon_terre * $c);

        //         //Ajout d'un élément associatif au tableu $deltaDistance
        //         $this->deltaDistance["$id"]=$distance;
        //     }
        // }

        //Méthode qui trie les cinémas selon leur distance par rapport au client
        //Met à jour l'attribut deltaDistance de l'objet Client
        //Retourne rien
        //Trié avec asort: https://www.w3schools.com/php/func_array_arsort.asp 
        // public function trierDeltaDistance(){
        //     //1 = Trier selon les valeurs numériques
        //     asort($this->deltaDistance,1);
        // }

        //Destructeur
        public function __destruct(){
            //echo "Objet Client détruit";
        }
    }

?>