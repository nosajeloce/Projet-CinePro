<?php

// Le fichier ConfigBD.interface.php contient le mot de passe, le nom d’utilisateur 
// avec les constantes BD_HOTE, BD_NOM, BD_UTILISATEUR et BD_MOT_PASSE 
$dossierBase = $_SERVER['DOCUMENT_ROOT']."/modele/";  
require_once($dossierBase.'DAO/configs/ConfigBD.interface.php'); 
 
// Classe englobante de PDO 
class ConnexionBD {  
  // Attribut représentant la connexion à la BD (de type PDO) 
  private static $instance = null; 
 
  // Constructeur de ConnexionBD inutilisable de l’extérieur 
  private function __construct() {} 
  
  // Fonction statique qui gère la création de l’instance PDO et la retourne. 
  // Note : self:: représente le nom de classe courante ConnexionBD   
  public static function getInstance() { 
    // Si l’instance de PDO n’exsite pas on la crée  
    if(self::$instance == null) { 
       $configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM; 
       self::$instance = new PDO($configuration, ConfigBD::BD_UTILISATEUR,  
       ConfigBD::BD_MOT_PASSE); 
  // S’assurer que les transactions se font avec les caractères UTF8 
  self::$instance->exec("SET character_set_results = 'utf8'");  
  self::$instance->exec("SET character_set_client = 'utf8'");  
  self::$instance->exec("SET character_set_connection = 'utf8'");                                                
    } 
    // Maintenant qu’on est certain qu’elle existe on la retourne 
    return self::$instance; 
  } 
 
  
  // Fonction qui libère la connexion PDO (pour le garbage collector) 
  public static function close() { 
    self::$instance = null; 
  } 
} 

?>