<?php 


require('../conexion/conec.php');
$pk = $_REQUEST['pk_nombre_producto'];

$busca_maxima_compra_usuario="SELECT status from catalogo where pk_nombre_producto='$pk'";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
$status1=$row3['status'];

}


if ($status1=='activo') {
 $status='no activo';
}
else if($status1=='no activo'){
$status='activo';
}
require_once('class_catalogo.php');
//if (sizeof($archivo) == 0 ) {
	//$edit_catalogo = array('pk_nombre_producto'=>$pk ,'descripcion'=>$descripcion, 'costo_compra'=>$costo_compra, 'costo_venta'=>$costo_venta,'fk_categoria'=>$categoria);
//}
//else{
	$edit_status = array('pk_nombre_producto'=>$pk , 'status'=>$status);
//}

$catalogo_status = new Catalogo();
$catalogo_status ->get($edit_status['pk_nombre_producto']);
$catalogo_status ->edit_2($edit_status);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=catalogo.php'>
	<script>
		alert('Registro actualizado');
	</script>
	";

 ?>