<?php
   // *****************************************************************************************
	// Description   : classe contenant la fonction statqieu qui géère les contrôleurs spécifiques
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/Defaut.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/VoirPageConnexion.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/SAuthentifier.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/RechercherInterfaceClient.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/VoirInfosFilm.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/ChoisirCinemaHoraire.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/ChoisirSiege.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/AjouterPanier.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/EchangerPoints.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/PayerAvecBilletsGratuits.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/PayerAvecArgent.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/CompleterPaiement.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/VoirPageContact.class.php");
	
	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;

			switch ($action) {
				case 'voirAccueil':
					$controleur=new Defaut();
					break;
				
				case 'voirPageConnexion':
					$controleur=new VoirPageConnexion();
					break;
				
				case 'sAuthentifier':
					$controleur=new SAuthentifier();
					break;
				
				case 'rechercherContenuHypermedia':
					$controleur=new RechercherInterfaceClient();
					break;
				
				case 'voirInfosFilm':
					$controleur=new VoirInfosFilm();
					break;
				
				case 'choisirCinemaHoraire':
					$controleur=new ChoisirCinemaHoraire();
					break;
				
				case 'choisirSiege':
					$controleur=new ChoisirSiege();
					break;
					
				case 'ajouterPanier':
					$controleur=new AjouterPanier();
					break;
				
				case 'echangerPoints':
					$controleur=new EchangerPoints();
				break;
				
				case 'appliquerRabais':
					$controleur=new PayerAvecBilletsGratuits();
					break;
					
				case 'redirigerVersPaiementOuAccueil':
					$controleur=new PayerAvecArgent();
					break;

				case 'payer':
					$controleur=new CompleterPaiement();
					break;					
				
				case 'voirPageContact':
					$controleur=new VoirPageContact();
					break;																																																						

				default:
					$controleur=new Defaut();
					break;
			}


			return $controleur;
		}
	}
	
?>