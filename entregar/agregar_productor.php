<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}
    require('../conexion/conec.php');

$pk=$_GET['pk_productor'];

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

//BUSCAR LA MAXIMA COMPRA DE ESE USUARIO
$modificar_al_produc="SELECT MAX(folio) as maximus from entrega where fk_usuario='$pk_usu'";
$productor_mod=$con->query($modificar_al_produc);

while($row4=$productor_mod->fetch_array())
{
 $pk_com=$row4['maximus'];
}

  $buscar_total="SELECT SUM(x.subtotal) as total from carrito x, entrega y where x.fk_venta=y.folio and x.fk_venta='$pk_com'";
                 $resultado_total=$con->query($buscar_total);
while($row5=$resultado_total->fetch_array())
{
 $total=$row5['total'];
}

//total maximo por productor es de 15000;
$total_maximo=15000; 

//haremos una consulta para calcular cuanto se le ha dado a ese productor  y hacemos la resta completa.
$total_completo_productor="SELECT SUM(total_vendido) as total_entregado FROM entrega WHERE fk_productor='$pk'";
                 $rver_total=$con->query($total_completo_productor);
while($row6=$rver_total->fetch_array())
{
 $total_entregado=$row6['total_entregado'];
}
//este es el total entregado + el total a entregar 
$totals=$total_entregado+$total;

//si el totals se pasa total maximo que es 15000, entonces que te diga un mensaje//de lo contrario que te permita crear esa entrega
if ($total_maximo<=$totals) {
echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=entregas_carrito.php'> 
		<script> 
			alert('La cantidad a entregar, sobrepasa el limite, favor de disminuir el limite o cancelar la entrega');
		</script>
	</body>
	</html>";	
}

else{


if ($total>0) {
$status="entregado";

	$query="UPDATE  entrega
    SET fk_productor='$pk',total_vendido='$total'
	,status='$status' WHERE folio='$pk_com'";
	
	
 $resultado_total=$con->query($query);

				if($resultado_total>0)
				{

echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=entrega.php'> 
		<script> 
			alert('entrega realizada con exito');
		</script>
	</body>
	</html>";	
}else {
	echo"<html>
	<head>
	</head>
	<body>
		<meta http-equiv='REFRESH' content='0 ; url=entrega.php'>
		<script> 
			alert('Error al entregar los datos');
		</script>
	</body>
	</html>";
	}
	}

else{
	echo"<html>
	<head>
	</head>
	<body>
	<br>
		<meta http-equiv='REFRESH' content='0 ; url=entregas_carrito.php'> 
		<script> 
			alert('No puedes entregar porque no has agregado productos');
		</script>
	</body>
	</html>";	
}

}
				?>
				
				
