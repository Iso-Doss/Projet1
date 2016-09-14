<?php
session_start();
if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['pass']))
{
	if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['pass']))
	{
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '');
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
		
		$existe = false;
		
		$verf = $bdd->query('SELECT * FROM etudiant');
		
		$pass = sha1(($_POST['pass']));
		
		while($donnee = $verf->fetch())
		{
			if($donnee['nom'] == $_POST['nom'] AND $donnee['prenom'] == $_POST['prenom'] AND $donnee['pass']==$pass)
			{
				$_session['nom']= $donnee['nom'];
				$_session['prenom']= $donnee['prenom'];
				$_session['id']= $donnee['id'];
				$existe = true;
				break;
			}
		}
				
		if ($existe)
		{
			include ('includes/liste_etu.php');
		}
		else
		{
			echo "Désolé mais ce etudiant n'existe pas. Veuillez réesayer un autre.";
			include('includes/connexion.php');
		}
	}
	else
	{
		echo "les champs sont vides";
		include('includes/connexion.php');
	}
}
else
{
	echo "echec de l'envoi";
	include('includes/connexion.php');
}
?>