<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gestionetudiant', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$id = $_GET['id'];
$reponse = $bdd->query("DELETE FROM etudiant WHERE id=$id");
include('includes/deconnection.php');

?>