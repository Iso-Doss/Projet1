
<table border="3">
	<caption>
		<h1>Liste Filières</h1>
	</caption>
			
	<tr>
		<td>Code</td>
		<td>Libellé</td>
	</tr>
			
	<?php
		$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
		$reponse = $bdd->query('SELECT * FROM filiere');
		while($donnee= $reponse->fetch())
		{
	?>
	<tr>
		<td><?php echo$donnee['code'] ?></td>
		<td><?php echo$donnee['libelle'] ?></td>
	</tr>
				
	<?php
		}
		$reponse->closeCursor();
	?>
		
</table>
