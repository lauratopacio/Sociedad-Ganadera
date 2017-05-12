<?php 

require_once('class_catalogo.php');

$pk = $_POST['pk_nombre_producto'];
$descripcion = $_POST['descripcion'];
$costo_compra= $_POST['costo_compra'];
$costo_venta=$_POST['costo_venta'];
$categoria=$_POST['categoria'];


	$edit_catalogo = array('pk_nombre_producto'=>$pk ,'descripcion'=>$descripcion, 'costo_compra'=>$costo_compra, 'costo_venta'=>$costo_venta,'fk_categoria'=>$categoria);


$catalogo_mod = new Catalogo();
$catalogo_mod ->get($edit_catalogo['pk_nombre_producto']);
$catalogo_mod ->edit($edit_catalogo);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=catalogo.php'>
	<script>
		alert('Datos modificados con éxito');
	</script>
	";

 ?>