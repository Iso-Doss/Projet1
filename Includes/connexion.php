<table>
	<caption>
		<h1>Connexion</h1>
	</caption>

	<form method="post" action="index.php?pg=connexion_post">
		<tr>
			<td><label  for="nom" > Nom : </label> </td>
			<td><input type="text" name="nom" required /></td>
		</tr>
		
		<tr>
			<td><label  for="prenom" > Prénom : </label> </td>
			<td><input type="text" name="prenom" required /></td>
		</tr>
	
		<tr>
			<td><label  for="Mot_de_Passe" > Mot de Passe : </label> </td>
			<td><input type="password" name="pass" required /></td>
		</tr>
		
		<tr>
			<td><input  type="submit"  value="valider" /> </td>
		    <td><input  type="reset"  value="Annuler" /> </td>
		</tr>
	</form>
</table>
