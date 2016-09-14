<?php 

if (!empty($_POST['searchZ']))
{
	if (isset($_POST['searchZ']))
	{
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '');
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
		
		$nbr = false;
		
		//echo $_POST['searchZ'];
		
		$verf = $bdd->prepare('SELECT * FROM filiere WHERE libelle = ? ');
		$verf->execute(array($_POST['searchZ']));
		while ($donnee = $verf->fetch())
		{
			$nbr = true;
			break;
		}
		
		if ($nbr==true)
		{
			while ($donnee = $verf->fetch())
			{
				echo "Bingo cette filière est diponible. Si vous desirez vous inscrire fait un tour dans la l'onglet Inscription.";
				include('includes/inscription.php');
			}
		}
		else
		{
			echo "Désolé cette filiere n'existe pas pour l'instant. Veuillez fait un autre choix. Merci.";
			header('location: index.php');
		}
	}
	else
	{
		echo " Désolé le champs est vide.";
		header('location: index.php');
	}
}
else
{
	echo " Désolé le champs est vide.";
	header('location: index.php');
}
		


?>