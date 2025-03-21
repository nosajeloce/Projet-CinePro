<?php

 // Inclusions … 
 $dossierBase = $_SERVER['DOCUMENT_ROOT']."/modele/";  
 require_once($dossierBase."DAO/ConnexionBD.class.php");    
 require_once($dossierBase."categorie.class.php"); 

class CategorieDAO {
    static function inserer($categorie){  
        // on essaie d’établir la connexion 
        try { 
       $connexion=ConnexionBD::getInstance(); 
        } catch (Exception $e) { 
      throw new Exception("Impossible d'obtenir la connexion à la BD.");  
        } 
        // On prépare la commande insert 
        $commandeSQL  = "INSERT INTO categorie (url_image, titre) VALUES (?,?)";   

        $tab=array($categorie->get_url_image(),$categorie->get_titre()); 
        $requete = $connexion->prepare($commandeSQL); 
        // On l’exécute, et on retourne l’état de réussite (true/false) 
        return $requete->execute($tab); 
      }
      
}

?>