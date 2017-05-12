<?php 

  include_once"../conexion/conexion.php";
  

require_once('class_gastos.php');

$folio_gasto=rand(1,50);


$folio_f = $_REQUEST['folio_factura'];
$folio_factura = strtoupper($folio_f);

$folio_gastos = $folio_gasto;

$emp = $_REQUEST['empresa'];
$empresa = strtolower($emp);

$concep = $_REQUEST['concepto'];
$concepto = strtolower($concep);

$total = $_REQUEST['total'];

$ob = $_REQUEST['observaciones'];
$observaciones = strtolower($ob);

$status = $_REQUEST['status'];
$fecha_gasto = $_REQUEST['fecha_gasto'];
//Crear un nuevo cargo
$nuevo_gasto = array(
          'folio_gastos' => $folio_gastos,
          'folio_factura' => $folio_factura,
          'empresa' => $empresa,
					 'concepto' => $concepto,
           'total' => $total,
           'observaciones' => $observaciones,
           'status' => $status,
           'fecha_gasto' => $fecha_gasto);

$cargo1 = new Gastos();
$cargo1 ->set($nuevo_gasto);
$cargo1 ->get($nuevo_gasto['folio_gastos']);
echo "
	<meta charset='utf-8' http-equiv='refresh' content = '0 ; url=mostrar_gastos.php'>
	<script>
		alert('Registro exitoso');
	</script>
";

 ?>