<?php
	if(isset($_REQUEST['pg']))
		{
			switch($_REQUEST['pg'])
			{
				case'presente':include ('includes/presentation.php');
					break;
					
				case'liste':include ('includes/liste.php');
					break;
				
				case'ajout':include ('includes/ajout.php');
					break;
					
				case'contact':include ('includes/contact.php');
					break;
									
				case'liste_etudiant':include ('includes/liste_etudiant.php');
					break;
				
				case'liste_filiere':include ('includes/liste_filiere.php');
					break;
					
				case'inscription':include ('includes/inscription.php');
					break;
					
				case'connexion':include ('includes/connexion.php');
					break;
					
				case'inscription_post':include ('includes/inscription_post.php');
					break;
					
				case'liste_etu_post':include ('includes/liste_etu.filiere.php');
					break;
					
				case'connexion_post':include ('includes/connexion_post.php');
					break;
				
				case'deconnection':include ('includes/deconnection.php');
					break;
				
				case'parametre':include ('includes/parametre.php');
					break;
				
				case'Supprime_etu':include ('includes/supprime_etu.php');
					break;
					
				case'Update_etu':include ('includes/update_etu.php');
					break;
					
				case'Update_etu_post':include ('includes/update_etu_post.php');
					break;	
				
				case'rech':include ('includes/recherche.php');
					break;	
				
				default : include ('includes/accueil.php');
			}
		}
		else
		{
			include ('includes/accueil.php');
		}
?>
