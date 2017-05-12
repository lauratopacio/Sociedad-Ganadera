<?php 
 
  include_once"../conexion/conexion.php";

require_once('class_usuario.php');

$elim =$_REQUEST['pk_usuario'];

$us = new Usuario();
	$us->get('pk');
	$us->delete($elim);
echo "  <meta http-equiv='REFRESH' content='0; url=mostrar_usuario.php'>
	    	<script>
	    	    alert('Datos Eliminados');
	    	 </script>"; 
?>