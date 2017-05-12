<?php 

  include_once"../conexion/conexion.php";
  

require_once('class_catalogo.php');

$pk_nombre_producto = $_REQUEST['pk_nombre_producto'];
$descripcion = $_REQUEST['descripcion'];
$costo_compra = $_REQUEST['costo_compra'];
$costo_venta = $_REQUEST['costo_venta'];
$fk_categoria = $_REQUEST['fk_categoria'];
$status="activo";

$ruta = "../img";
$archivo = $_FILES['imagen']['tmp_name'];
$nombreArchivo = $_FILES['imagen']['name'];
move_uploaded_file($archivo, $ruta."/".$nombreArchivo);
$ruta = $ruta."/".$nombreArchivo;

//Crear un nuevo cargo
$nuevo_catalogo = array('pk_nombre_producto' => $pk_nombre_producto,
          'descripcion' => $descripcion,
					 'costo_compra' => $costo_compra,
           'costo_venta' => $costo_venta,
           'imagen' => $ruta,
           'fk_categoria'=> $fk_categoria,
           'status' =>$status

           );

$cargo1 = new Catalogo();
$cargo1 ->set($nuevo_catalogo);
$cargo1 ->get($nuevo_catalogo['pk_nombre_producto']);
echo "
	<meta charset='utf-8' http-equiv='refresh' content = '0 ; url=mostrar_catalogo.php'>
	<script>
		alert('Registro exitoso');
	</script>
";

 ?>