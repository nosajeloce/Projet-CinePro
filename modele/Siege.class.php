<?php
	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
		
    class Siege {
        //Attributs privés
        private $id;
        private $codeSiege;
        private $idSalle;

        //Constructeur
        public function __construct($id,$codeSiege,$idSalle){
            $this->id=$id;
            $this->codeSiege=$codeSiege;
            $this->idSalle=$idSalle;
        }


        //Getters
        public function getId(){return $this->id;}
        public function getCodeSiege(){return $this->codeSiege;}
        public function getIdSalle(){return $this->idSalle;}



    }

?>