<?php 

require_once('class_catalogo.php');

$fk_categoria=$_REQUEST['pk_categoria'];


	$edit_catalogo = array('fk_categoria'=>$fk_categoria);


$catalogo_mod = new Catalogo();
$catalogo_mod ->get_categoria($edit_catalogo['pk_categoria']);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=mostrar_catalogo.php'>
	<script>
		alert('Registro actualizado');
	</script>
	";

 ?>