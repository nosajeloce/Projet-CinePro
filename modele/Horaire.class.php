<?php
	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
		
    class Horaire {
        //Attributs privés
        private $id;
        private $dateHeure;

        //Constructeur
        public function __construct($id,$dateHeure){
            $this->id=$id;
            $this->dateHeure=new DateTime($dateHeure);
        }

        //Getters
        public function getId(){return $this->id;}
        public function getDateHeure(){return $this->dateHeure;}



    }

?>