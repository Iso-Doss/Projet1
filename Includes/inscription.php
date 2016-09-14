<table>
	<caption>
		<h1>Inscription Etudiant</h1>
	</caption>

	<form method="post" action="index.php?pg=inscription_post">
		<tr>
			<td><label  for="Nom" > Nom : </label> </td>
			<td><input type="text" name="nom" required /></td>
		</tr>
	
		<tr>
			<td><label  for="Prénom" > Prénom: </label> </td>
			<td><input type="text" name="prenom" required /></td>
		</tr>
		
		<!--tr>
			<td><label  for="Date_de_Naissance" > Date de Naissance : </label> </td>
			<td><input type="date" name="datenaissance"  required /></td>
		</tr-->
		
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
		
		<?php
		$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
		$reponse = $bdd->query('SELECT * FROM filiere');
		?>
		
		<tr>
			<td><label  for="filiere" > Filière : </label> </td>
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
			<td><label  for="mot_de_pass" > Mot de Passe : </label> </td>
			<td><input type="password" name="pass1"  required /></td>
		</tr>
		
		<tr>
			<td><label  for="mot_de_pass" > Retaper le Mot de Passe : </label> </td>
			<td><input type="password" name="pass2"  required /></td>
		</tr>
		
		<!--tr>
			<td><label  for="Mot_de_Passe" > Type : </label> </td>
			<td>
				<select name="type">
					<option value="admin">Administrateur</option>
					<option value="user">Utlisateur</option>
				</select>
			</td>
		</tr-->
		
		<tr>
			<td><input  type="submit"  value="valider" /> </td>
		    <td><input  type="reset"  value="Annuler" /> </td>
		</tr>
	</form>
</table>
