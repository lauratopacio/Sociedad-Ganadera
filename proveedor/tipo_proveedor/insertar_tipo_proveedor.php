<?php 

  include_once"../../conexion.php";
  

require_once('class_tipo_proveedor.php');

$tipo_proveedor = $_REQUEST['tipo_proveedor'];


//Crear un nuevo cargo
$nuevo_tipoproveedor = array('tipo_proveedor' => $tipo_proveedor);

$cargo1 = new tipoProveedor();
$cargo1 ->set($nuevo_tipoproveedor);
$cargo1 ->get($nuevo_tipoproveedor['tipo_proveedor']);
echo "
	<meta charset='utf-8' http-equiv='refresh' content = '0 ; url=mostrar_tipo_proveedor.php'>
	<script>
		alert('Registro exitoso');
	</script>
";

 ?>