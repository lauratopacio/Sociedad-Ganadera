<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}
	require('../conexion/conec.php');
$nombre=$_SESSION['nombre'];
//BUSCA EL PK DEL USUARIO PARA PODER BUSCAR  LA MAXIMA COMPRA POR USUARIO

$buscar_usuario="SELECT pk_usuario as pk from usuario where nombre='$nombre'";
$resultado_buscar=$con->query($buscar_usuario);

while($row2=$resultado_buscar->fetch_array())
{
 $pk_usu=$row2['pk'];
}

//BUSCAR LA MAXIMA COMPRA DE ESE USUARIO
$busca_maxima_compra_usuario="SELECT MAX(folio) as maximus, status from entrega where fk_usuario='$pk_usu'";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
 $pk_com=$row3['maximus'];
$status=$row3['status'];
}

    $cantidad=$_POST['cantidad'];
	

$fk_nombre_producto=$_POST['pk_nombre_producto'];
$costo_sugerido=$_POST['costo_venta'];
$subtotal=$cantidad*$costo_sugerido;

//seleccionar la cantidad de productos  del almacen

$cantidad_producto="SELECT x.cantidad_existencia, y.status from almacen x, catalogo y where x.fk_nombre_producto=y.pk_nombre_producto AND x.fk_nombre_producto='$fk_nombre_producto'";
$total_cantidad_producto_almacen=$con->query($cantidad_producto);

while($row5=$total_cantidad_producto_almacen->fetch_array())
{
 $cantidad_producto=$row5['cantidad_existencia'];
 $status=$row5['status'];
}

 $cantidad_nueva=$cantidad_producto-$cantidad;
if ($status=='no activo') {
	echo "
				<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=../catalogo/catalogo.php'>
         <script>
             alert('Lo sentimos, producto no activo');
         </script> 
    </body>
    </html>
				" ;

}
else{


if ($cantidad>$cantidad_producto) {
echo "
				<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=entregas_carrito.php'>
         <script>
             alert('Error! productos insuficientes');
         </script> 
    </body>
    </html>
				" ;

}
else{
	//
	
if ($cantidad==$cantidad_producto) {
//significa que modificara la cantidad del almacen
	$modificar_almacen="UPDATE almacen SET cantidad_existencia='$cantidad_nueva' 
			 where fk_nombre_producto = '$fk_nombre_producto' ";
	
	$resultado_modificar_cant_almacen=$con->query($modificar_almacen);
//modificara el status del producto a no activo
	$status="no activo";
		$modificar_status="UPDATE catalogo SET status='no activo' 
			 where pk_nombre_producto = '$fk_nombre_producto' ";
	
	$resultado_modificar_status=$con->query($modificar_status);
}
else if($cantidad<$cantidad_producto){


//modificar del almacen la cantidad del producto añadido
	$modificar_almacen="UPDATE almacen SET cantidad_existencia='$cantidad_nueva'
			 where fk_nombre_producto = '$fk_nombre_producto' ";
	
	$resultado_modificar_cant_almacen=$con->query($modificar_almacen);

//fin modificar
}
	//insertar al carrito de entregas 
	$query="INSERT INTO carrito(pk_carrito,fk_venta,fk_nombre_producto,cantidad,costo_sugerido,subtotal) VALUES (NULL,'$pk_com','$fk_nombre_producto','$cantidad','$costo_sugerido','$subtotal')";
	
	$resultado=$con->query($query);
	
?>

<html>
	<head>
		<title>Modificar Producto</title>
	</head>
	
	<body>
		<center>
<?php 
				if($resultado>0){
				?>
				<?php echo "
				<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=entregas_carrito.php'>
         <script>
             alert('Producto añadido');
         </script> 
    </body>
    </html>
				" ?>
				
					<?php 	}else{ ?>
				
				<?php echo 
				"
				<html>
    <head>
    </head>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
         <meta http-equiv= 'REFRESH' content= '0 ; url=productos.php'>
         <script>
             alert('Datos Modificados con exito');
         </script> 
    </body>
    </html>
				"
				 ?>
				
			<?php	} } }
?>
			
		
		
		</center>
	</body>
</html>
				
					