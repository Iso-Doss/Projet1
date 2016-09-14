<?php
if (!empty($_POST['nom']) AND !empty($_POST['prenom'])AND !empty($_POST['jour']) AND !empty($_POST['mois']) AND !empty($_POST['annee']) AND !empty($_POST['idfiliere']) AND !empty($_POST['pass1']) AND !empty($_POST['pass2']))
{
	if (isset($_POST['nom']) AND isset($_POST['prenom']) AND !empty($_POST['jour']) AND !empty($_POST['mois']) AND !empty($_POST['annee']) AND isset($_POST['idfiliere']) AND isset($_POST['pass1']) AND isset($_POST['pass2']))
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
		
		$verf = $bdd->query('SELECT * FROM etudiant ');
		
		while($donnee= $verf->fetch())
		{
			if($donnee['nom'] == $_POST['nom'] AND $donnee['prenom'] == $_POST['prenom'])
			{
				$existe = true;
			}
		}
				
		if ($existe==false)
		{
			if (($_POST['pass1']) == ($_POST['pass2']))
			{
				$pass = sha1(($_POST['pass1']));
				
				$date = $_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
							
				$req = $bdd->prepare('INSERT INTO etudiant (nom, prenom, datenaissance, idfiliere, pass) VALUES(?, ?, ?, ?, ?)');
				$req->execute(array($_POST['nom'], $_POST['prenom'], $date, $_POST['idfiliere'], $pass));

				echo "enregistrement valide";
				include('includes/connexion.php');

			}
			else
			{
				echo "Les mot de pas ne sont pas identique. Veuillez réesayer.";
				include('includes/inscription.php');
			}
		}
		else
		{
			echo "Désolé mais ce pseudo existe deja. Veuillez réesayer un autre.";
			include('includes/inscription.php');
		}
	}
	else
	{
		echo "les champs sont vide";
		include('includes/inscription.php');
	}
}
else
{
	echo "echec de l'enregistrement </Br>";
	include('includes/inscription.php');
}
?>