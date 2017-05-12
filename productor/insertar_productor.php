<?php 

  include_once"../conexion/conexion.php";
  

require_once('class_productor.php');

$rf = $_REQUEST['rfc'];
$rfc = strtoupper($rf);

$nom = $_REQUEST['nombre'];
$nombre = strtolower($nom);


$ap = $_REQUEST['apellidop'];
$apellidop = strtolower($ap);


$am = $_REQUEST['apellidom'];
$apellidom = strtolower($am);


$ca = $_REQUEST['calle'];
$calle = strtolower($ca);

$numero = $_REQUEST['numero'];

$col = $_REQUEST['colonia'];
$colonia = strtolower($col);

$loca = $_REQUEST['localidad'];
$localidad = strtolower($loca);


$telefono = $_REQUEST['telefono'];

//Crear un nuevo cargo
$nuevo_cargo = array('rfc' => $rfc,
          'nombre' => $nombre,
					 'apellidop' => $apellidop,
           'apellidom' => $apellidom,
           'calle' => $calle,
           'numero' => $numero,
           'colonia' => $colonia,
           'localidad' => $localidad,
           'telefono' => $telefono);

$cargo1 = new Productor();
$cargo1 ->set($nuevo_cargo);
$cargo1 ->get($nuevo_cargo['rfc']);
echo "
	<meta charset='utf-8' http-equiv='refresh' content = '0 ; url=formulario_productor.php'>
	<script>
		alert('Registro Guardado con Éxito');
	</script>
";

 ?>