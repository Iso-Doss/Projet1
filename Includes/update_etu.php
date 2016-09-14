					
<table>
	<caption>
		<h1>Modifier Compte Etudiant</h1>
	</caption>

	<form method="post" action="index.php?pg=Update_etu_post&id=<?php echo $_GET['id']; ?>">
		
		<?php
		$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
		$reponse = $bdd->prepare('SELECT * FROM etudiant WHERE id = ?');
		$reponse->execute(array($_GET['id']));
		$donnee = $reponse->fetch();
		?>
		
		<tr>
			<td><label  for="Nom" > Nom : </label> </td>
			<td><input type="text" name="nom" value = "<?php if (!empty($donnee['nom'])) {echo $donnee['nom'];}else {echo "desole";} ?>" required /></td>
		</tr>
	
		<tr>
			<td><label  for="Prénom" > Prénom: </label> </td>
			<td><input type="text" name="prenom" value = "<?php if (!empty($donnee['prenom'])) {echo $donnee['prenom'];}else {echo "desole";} ?>"  required /></td>
		</tr>
		
		<tr>
			<td><label  for="Date_de_Naissance" > Date de Naissance : </label> </td>
			<td>
				<select name="jour">	
					<?php 
					for($i=1; $i<=31 ; $i++)
					{?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
				</select>
				
				<select name="mois">	
					<?php 
					$mois = array ('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre',);
					for($i=0; $i<12 ; $i++)
					{?>
						<option value="<?php echo $i+1; ?>"><?php echo $mois[$i]; ?></option>
					<?php } ?>
				</select>
				
				<select name="annee">	
					<?php 
					for($i=1970; $i<=2030 ; $i++)
					{?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		
		<?php 		$fil = $bdd->query('SELECT * FROM filiere');  ?>

		
		<tr>
			<td><label  for="filiere" > Filière : </label> </td>
			<td>
				<select name="idfiliere">
					<?php while($donnee= $fil->fetch())
						{?>		
							<option value="<?php echo $donnee['id']; ?>"><?php echo $donnee['libelle']; ?></option>
						<?php } ?> 
				</select>
			</td>
		</tr>
		
		<tr>
			<td><label  for="mot_de_pass" > Mot de Passe : </label> </td>
			<td><input type="password" name="pass1" value = "<?php //echo $donnee['']; ?>" required /></td>
		</tr>
		
		<tr>
			<td><label  for="mot_de_pass" > Retaper le Mot de Passe : </label> </td>
			<td><input type="password" name="pass2" value = "<?php //echo $donnee['']; ?>" required /></td>
		</tr>
		
		<tr>
			<td><input  type="submit"  value="valider" /> </td>
		    <td><input  type="reset"  value="Annuler" /> </td>
		</tr>
	</form>
</table>
