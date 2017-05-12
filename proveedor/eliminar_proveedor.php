<?php 
 
  include_once"../conexion/conexion.php";

require_once('class_proveedor.php');

$elim =$_REQUEST['pk_proveedor'];

$prov = new Proveedor();
	$prov->get('pk');
	$prov->delete($elim);
echo "  <meta http-equiv='REFRESH' content='0; url=mostrar_proveedor.php'>
	    	<script>
	    	    alert('Datos Eliminados');
	    	 </script>"; 
?>