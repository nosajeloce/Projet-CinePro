<?php
	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
		
    class Salle {
        //Attributs 
        private $id;
        private $numeroSalle;

        //Constructeur
        public function __construct($id,$numeroSalle){
            $this->id=$id;
            $this->numeroSalle=$numeroSalle;
        }

        //Getters
        public function getId(){return $this->id;}
        public function getNumeroSalle(){return $this->numeroSalle;}

    }

?>