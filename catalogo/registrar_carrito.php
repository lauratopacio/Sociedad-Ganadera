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
$busca_maxima_compra_usuario="SELECT MAX(folio) as maximus from entrega where fk_usuario='$pk_usu'";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
 $pk_com=$row3['maximus'];
}


    $cantidad=$_POST['cantidad'];
	
	$fk_nombre_producto=$_POST['pk_nombre_producto'];
$costo_sugerido=$_POST['costo_venta'];
$subtotal=$cantidad*$costo_sugerido;




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
             alert('Dato insertado con exito');
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
				
			<?php	} ?>
			
		
		
		</center>
	</body>
</html>
				
					