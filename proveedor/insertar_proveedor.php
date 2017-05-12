<?php 

  include_once"../conexion/conexion.php";
  
$fecha=date("Y-m-d");
require_once('class_proveedor.php');

$rfc = $_REQUEST['rfc'];
$rf = strtoupper($rfc);

$nombre = $_REQUEST['nombre'];
$nombre_min = strtolower($nombre);

$app = $_REQUEST['apellidop'];
$apellidop = strtolower($app);

$apm = $_REQUEST['apellidom'];
$apellidom = strtolower($apm);

$ca = $_REQUEST['calle'];
$calle = strtolower($ca);

$num = $_REQUEST['numero'];
$numero = strtolower($num);

$col = $_REQUEST['colonia'];
$colonia = strtolower($col);

$loca = $_REQUEST['localidad'];
$localidad = strtolower($loca);

$mun = $_REQUEST['municipio'];
$municipio = strtolower($mun);

$tel = $_REQUEST['telefono'];
$telefono = strtolower($tel);

$fecha_registro = $fecha;

$cor = $_REQUEST['correo_electronico'];
$correo_electronico = strtolower($cor);

$fk_tipo_proveedor = $_REQUEST['fk_tipo_proveedor'];


$status = 'activo';

//Crear un nuevo cargo
$nuevo_proveedor = array('rfc' => $rf,
          'nombre' => $nombre_min,
           'apellidop' => $apellidop,
           'apellidom' => $apellidom,
           'calle' => $calle,
           'numero' => $numero,
           'colonia' => $colonia,
           'localidad' => $localidad,
            'municipio' => $municipio,
           'telefono' => $telefono,
            'fecha_registro' => $fecha_registro,
             'correo_electronico' => $correo_electronico,
              'fk_tipo_proveedor' => $fk_tipo_proveedor,
              'status' => $status);


$cargo1 = new Proveedor();
$cargo1 ->set($nuevo_proveedor);
$cargo1 ->get($nuevo_proveedor['rfc']);
echo "
  <meta charset='utf-8' http-equiv='refresh' content = '0 ; url=mostrar_proveedor.php'>
  <script>
    alert('Registro exitoso');
  </script>
";

 ?>