<?php 
 
  include_once"../conexion.php";

require_once('class_productor.php');

$elim =$_REQUEST['pk_productor'];

$prod = new Productor();
	$prod->get('pk');
	$prod->delete($elim);
echo "  <meta http-equiv='REFRESH' content='0; url=mostrar_productor.php'>
	    	<script>
	    	    alert('Datos Eliminados');
	    	 </script>"; 
?>