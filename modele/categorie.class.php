<?php

class Categorie {
    //Attributs
    private $id;
    private $url_image;
    private $titre;

    //Constructeur
    public function __construct($url_image,$titre){
        $this->url_image = $url_image;
        $this->titre = $titre;
    }

    //Getters et setters
    public function get_url_image(){
        return $this->url_image;
    }
    
    public function get_titre(){
        return $this->titre;
    }

    public function set_url_image($url_image){
        $this->url_image = $url_image;
    }

    public function set_titre($titre){
        $this->titre= $titre;
    }

}

?>