<?php 
 
  include_once"../conexion/conexion.php";

$pk = $_REQUEST['pk_productor'];


require_once('class_productor.php');

$pk = $_REQUEST['pk_productor'];
$rfc = $_REQUEST['rfc'];
$nombre = $_REQUEST['nombre'];
$apellidop = $_REQUEST['apellidop'];
$apellidom = $_REQUEST['apellidom'];
$calle = $_REQUEST['calle'];
$numero = $_REQUEST['numero'];
$colonia = $_REQUEST['colonia'];
$localidad = $_REQUEST['localidad'];
$telefono = $_REQUEST['telefono'];

$edit_productor = array('pk_productor'=>$pk ,'rfc'=>$rfc, 'nombre'=>$nombre, 'apellidop'=>$apellidop, 'apellidom'=>$apellidom, 'calle'=>$calle, 'numero'=>$numero, 'colonia'=>$colonia, 'localidad'=>$localidad, 'telefono'=>$telefono);

$productor= new productor();
$productor ->get($edit_productor['pk_productor']);
$productor ->edit($edit_productor);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=formulario_productor.php'>
	<script>
		alert('Registro Actualizado con Éxito');
	</script>
	";

 ?>