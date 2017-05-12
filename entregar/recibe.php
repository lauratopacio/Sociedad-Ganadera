<?php
	require_once("combo.php");
	$nuevo=new Inciden();
	$nuevo->agregar_inciden($_POST["nombre"],$_POST["apellidop"],$_POST["apellidom"],$_POST["rfc"]);
?>