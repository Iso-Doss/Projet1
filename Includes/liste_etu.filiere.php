<?php 
// session_start();
if (empty($_session['nom']) &&  empty($_session['prenom']) && empty($_session['id']))
	{
		header('Location:index.php?pg=connexion');
	}
?>


<form method="post" action="">
<table border="3">
	<caption>
		<h1>Liste Etudiants de 
			<?php 
			
				echo  "Bonjour " . $_SESSION['nom'] . " " . $_SESSION['prenom'];
				echo $_SESSION['id'];
				$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
				$fil = $bdd->query('SELECT * FROM filiere');
				while($don= $fil->fetch())
					{
						if ($don['id']==$_POST['idfiliere'])
						{
							echo $don['libelle'];
						}
					} 
			?>
		</h1>
	</caption>
			
	<tr>
		<td>Filière</td>
		<td>Nom</td>
		<td>Prénom</td>
		<td>Date de Naissance</td>
	</tr>
			
	<?php
	
		$filiere = $_POST['idfiliere'];
		$reponse = $bdd->prepare('SELECT * FROM etudiant WHERE idfiliere = ?');
		$reponse->execute(array($_POST['idfiliere']));
		while($donnee= $reponse->fetch())
		{
			?>
			<tr>
				<td>
					<?php 
					
					$fil = $bdd->query('SELECT * FROM filiere');
						while($don= $fil->fetch())
							{
								if ($don['id']==$donnee['idfiliere'])
								{
									echo $don['libelle'];
								}
							}
					?>
				</td>
				<td><?php echo $donnee['nom'] ?></td>
				<td><?php echo $donnee['prenom'] ?></td>
				<td><?php echo $donnee['datenaissance'] ?></td>
			</tr>
						
			<?php
		}
		// echo  $_session['id'];
		$reponse->closeCursor();
	?>
		
		
	<tr>
		<td colspan="2"><a href="index.php?pg=parametre&id=<?php echo $_GET['id']; ?>">Paramétrer son Compte</a></td>
		<td colspan="2"><a href="index.php?pg=deconnection">Deconnection</a></td>
	</tr>
	
</table>
</form>