<?php 
 
  include_once"../conexion/conexion.php";

require_once('class_almacen.php');

$elim =$_REQUEST['pk_almacen'];

$us = new Almacen();
	$us->get('pk');
	$us->delete($elim);
echo "  <meta http-equiv='REFRESH' content='0; url=mostrar_almacen.php'>
	    	<script>
	    	    alert('Datos Eliminados');
	    	 </script>"; 
?>