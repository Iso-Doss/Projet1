<?php
session_destroy();

$_session['pseudo'] = "";
$_session['id'] = "";

header('location:index.php?pg=connexion');

?>