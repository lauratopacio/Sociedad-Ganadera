<?php  

require_once('class_foto.php');

$pk_nombre_producto = $_POST['pk_nombre_producto'];
$ruta = "../img";
$archivo = $_FILES['imagen']['tmp_name'];
$nombreArchivo = $_FILES['imagen']['name'];
move_uploaded_file($archivo, $ruta."/".$nombreArchivo);
 $ruta = $ruta."/".$nombreArchivo;

//Crear un nuevo cargo
$edit_catalogo = array('pk_nombre_producto' => $pk_nombre_producto,
           'imagen' => $ruta
           );

$catalogo_mod = new Catalogo();
$catalogo_mod ->edit($edit_catalogo);

echo "
	<meta charset='utf-8' http-equiv='refresh' content='0 ; url=catalogo.php'>
	<script>
		alert('imagen actualizada con éxito');
	</script>
	";

?>
