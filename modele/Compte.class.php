<?php
	/* ==================================================================================
       Auteur: Jason
	 * ==================================================================================
	*/
		
    class Compte {
        //Attributs protégés
        protected $id;
        protected $prenom;
        protected $nom;
        protected $courriel;
        protected $pwd;
        protected $typeCompte;

        //Constructeur
        public function __construct($id=0,$prenom,$nom,$courriel,$pwd,$typeCompte){
            $this->id=$id;
            $this->prenom=$prenom;
            $this->nom=$nom;
            $this->courriel=$courriel;
            $this->pwd=$pwd;
            $this->typeCompte=$typeCompte;
        }

        //Getters
        public function getId(){
            return $this->id;
        }

        public function getPrenom(){
            return $this->prenom;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getCourriel(){
            return $this->courriel;
        }

        public function getPwd(){
            return $this->pwd;
        }

        public function getTypeCompte(){
            return $this->typeCompte;
        }

        //Setters
        public function setId($nouveau_id){
            $this->id=$nouveau_id;
        }

        public function setPrenom($nouveau_prenom){
            $this->prenom=$nouveau_prenom;
        }

        public function setNom($nouveau_nom){
            $this->nom=$nouveau_nom;
        }

        public function setCourriel($nouveau_courriel){
            $this->courriel=$nouveau_courriel;
        }

        public function setPwd($nouveau_pwd){
            $this->pwd=$nouveau_pwd;
        }

        //Destructeur
        public function __destruct(){
            //Mis en commentaire parce que la méthode destructeur est fonctionnelle
            //echo "Objet Compte détruit";
        }

    }

?>