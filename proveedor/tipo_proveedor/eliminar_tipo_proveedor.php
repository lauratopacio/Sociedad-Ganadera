<?php 
 
  include_once"../../conexion.php";

require_once('class_tipo_proveedor.php');

$elim =$_REQUEST['pk_tipo_proveedor'];

$prove = new tipoProveedor();
	$prove->get('pk');
	$prove->delete($elim);
echo "  <meta http-equiv='REFRESH' content='0; url=mostrar_tipo_proveedor.php'>
	    	<script>
	    	    alert('Datos Eliminados');
	    	 </script>"; 
?>