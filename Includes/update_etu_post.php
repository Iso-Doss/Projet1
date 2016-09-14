<?php
if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['jour']) AND !empty($_POST['mois']) AND !empty($_POST['annee']) AND !empty($_POST['idfiliere']) AND !empty($_POST['pass1']) AND !empty($_POST['pass2']))
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
		
		$date = $_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
		
		while($donnee= $verf->fetch())
		{
			if($donnee['nom'] == $_POST['nom'] or $donnee['prenom'] == $_POST['prenom'] or $date == $donnee['datenaissance'] or $donnee['idfiliere'] == $_POST['idfiliere'] or $donnee['pass1'] == $_POST['pass1'] or $donnee['pass2'] == $_POST['pass2'])
			{
				$existe = true;
			}
		}
				
		if ($existe==true)
		{
			if (($_POST['pass1']) == ($_POST['pass2']))
			{
				$pass = sha1(($_POST['pass1']));
				
				$id = $_GET['id'];
											
				$req = $bdd->prepare('UPDATE etudiant SET nom=:nom, prenom=:prenom, datenaissance=:datenaissance, idfiliere=:idfiliere, pass=:pass WHERE id=:id');
				// $req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['datenaissance'], $_POST['idfiliere'], $pass, $_GET['id']);
				$req->execute(array(
					'nom'=> $_POST['nom'], 
					'prenom' => $_POST['prenom'], 
					'datenaissance' => $date, 
					'idfiliere' => $_POST['idfiliere'],
					'pass' => $pass, 
					'id' => $id));

				echo "enregistrement valide";
				include('includes/connexion.php');

			}
			else
			{
				echo "Les mot de pas ne sont pas identique. Veuillez réesayer.";
				include('includes/update_etu.php');
			}
		}
		else
		{
			echo "Désolé mais ce pseudo existe deja. Veuillez réesayer un autre.";
			include('includes/update_etu.php');
		}
	}
	else
	{
		echo "les champs sont vide";
		include('includes/update_etu.php');
	}
}
else
{
	echo "echec de l'enregistrement </Br>";
	include('includes/update_etu.php');
}
?>