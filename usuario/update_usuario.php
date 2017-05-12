<?php 
 
  include_once"../conexion/conexion.php";



require_once('class_usuario.php');

$pk = $_REQUEST['pk_usuario'];
$nombre = $_REQUEST['nombre'];
$apellidop = $_REQUEST['apellidop'];
$apellidom = $_REQUEST['apellidom'];
$user = $_REQUEST['user'];

$fk_tipo_usuario = $_REQUEST['fk_tipo_usuario'];
$fk_sucursal = $_REQUEST['fk_sucursal'];


$edit_usuario = array('pk_usuario'=>$pk , 'nombre'=>$nombre, 'apellidop'=>$apellidop,
 'apellidom'=>$apellidom, 'user'=>$user, 'fk_tipo_usuario'=>$fk_tipo_usuario,
  'fk_sucursal'=>$fk_sucursal);

$productor= new usuario();
$productor ->get($edit_usuario['pk_usuario']);
$productor ->edit($edit_usuario);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=mostrar_usuario.php'>
	<script>
		alert('Registro Actualizado con Éxito');
	</script>
	";

 ?>