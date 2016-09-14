<?php 
// session_start();
if (empty($_session['nom']) &&  empty($_session['prenom']) && empty($_session['id']))
	{
		header('Location:index.php?pg=connexion');
	}
?>

<form method="post" action="index.php?pg=liste_etu_post&id=<?php echo $_session['id'] ?>">
<table >
	<caption>
		<h1>Sélèctionner une filiere</h1>
	</caption>
	<?php 
	
		echo  "Bonjour " . $_session['nom'] . " " . $_session['prenom'];
		$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
		$reponse = $bdd->query('SELECT * FROM filiere');
	?> 		
	<tr>
		<td><label  for="Numat" > Filière : </label> </td>
		<td>
			<select name="idfiliere">
				<?php while($donnee= $reponse->fetch())
					{?>		
						<option value="<?php echo $donnee['id']; ?>"><?php echo $donnee['libelle']; ?></option>
					<?php } ?> 
			</select>
		</td>
	</tr>
	
	<tr>
		<td><input  type="submit"  value="valider" /> </td>
		<td><input  type="reset"  value="Annuler" /> </td>
		<td><input  type="hidden"  name="pg" value="<?php echo  $_session['id']; ?>" /> </td>
	</tr>
	
	<tr>
		<?php $id = $_session['id']; ?>
		<td><a href="index.php?pg=parametre&id=<?php echo $id ?>">Paramétrer son Compte</a></td>
		<td><a href="index.php?pg=deconnection">Deconnection</a></td>
	</tr>
	
</table>
</form>