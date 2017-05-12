<?php 
 
  include_once"../../conexion.php";



require_once('class_tipo_proveedor.php');

$pk = $_REQUEST['pk_tipo_proveedor'];
$tipo_proveedor = $_REQUEST['tipo_proveedor'];


$edit_tipoproveedor = array('pk_tipo_proveedor'=>$pk ,'tipo_proveedor'=>$tipo_proveedor);

$tipoproveedor= new tipoproveedor();
$tipoproveedor ->get($edit_tipoproveedor['pk_tipo_proveedor']);
$tipoproveedor ->edit($edit_tipoproveedor);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=mostrar_tipo_proveedor.php'>
	<script>
		alert('Registro actualizado');
	</script>
	";

 ?>