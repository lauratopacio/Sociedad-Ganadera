<?php 
 
  include_once"../conexion/conexion.php";



require_once('class_gastos.php');

$pk = $_REQUEST['pk_gasto'];
$folio_factura= $_REQUEST['folio_factura'];
$empresa = $_REQUEST['empresa'];
$concepto = $_REQUEST['concepto'];
$total = $_REQUEST['total'];
$observaciones = $_REQUEST['observaciones'];
$status = $_REQUEST['status'];
$fecha_gasto = $_REQUEST['fecha_gasto'];


$edit_gastos = array('pk_gasto'=> $pk,
 'folio_factura' => $folio_factura,
          'empresa' => $empresa,
			'concepto' => $concepto,
           'total' => $total,
           'observaciones' => $observaciones,
           'status' => $status,
           'fecha_gasto' => $fecha_gasto);

$gastos= new gastos();
$gastos ->get($edit_gastos['pk_gasto']);
$gastos ->edit($edit_gastos);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=mostrar_gastos.php'>
	<script>
		alert('Registro actualizado');
	</script>
	";

 ?>