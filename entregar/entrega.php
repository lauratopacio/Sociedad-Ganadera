<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}

include_once"../conexion/conec.php";

$nombre=$_SESSION['nombre'];
//BUSCA EL PK DEL USUARIO PARA PODER BUSCAR  LA MAXIMA COMPRA POR USUARIO

$buscar_usuario="SELECT pk_usuario as pk from usuario where nombre='$nombre'";
$resultado_buscar=$con->query($buscar_usuario);

while($row2=$resultado_buscar->fetch_array())
{
 $pk_usu=$row2['pk'];
}

//BUSCAR LA MAXIMA COMPRA DE ESE USUARIO
$busca_maxima_compra_usuario="SELECT MAX(x.folio) as maximus, x.fecha_venta, y.nombre, y.apellidop, y.apellidom, y.rfc from entrega x, productor y where x.fk_productor=y.pk_productor and x.fk_usuario='$pk_usu'";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
 $pk_com=$row3['maximus'];
 $nombre2=$row3['nombre'];
 $apellidop=$row3['apellidop'];
 $apellidom=$row3['apellidom'];
 $rfc=$row3['rfc'];
 $fecha=$row3['fecha_venta'];
}

$query="SELECT pk_carrito,fk_venta,fk_nombre_producto, SUM(cantidad) as canti, costo_sugerido,SUM(subtotal) as sub FROM carrito where fk_venta='$pk_com' group by fk_nombre_producto";
    
    $resultado=$con->query($query); 


$querys="SELECT total_vendido FROM entrega where folio='$pk_com'";
    
    $resultado2=$con->query($querys); 
    while($row4=$resultado2->fetch_array())
{
 $tot=$row4['total_vendido'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entregados</title>
 <meta charset="utf-8">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
     <script src="../bootstrap/jquery/jquery.js"></script> 
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="../bootstrap/jquery/bootstrap.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">v
  
<style>
.button {
  padding: 8px 25px;
  font-size: 20px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 10px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
  .button2 {
  padding: 8px 25px;
  font-size: 20px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #D68910;
  border: none;
  border-radius: 10px;
  box-shadow: 0 9px #999;
}

.button2:hover {background-color: #F7DC6F}

.button2:active {
  background-color: #F7DC6F;
  box-shadow: 0 5px #666;
  transform: translateY(4px);


}
body{
background-color: #A9DFBF;

}
</style>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php require('../menu/menu.php') ?>
			</div>
		</div>
<div class="container">	
<center><div class="jumbotron">
	<h1>Entrega realizada</h1></div>
</center>	
<!--Buscador -->
<div class="row">
<div class="col-md-8"> 
<h3>Productor: <?php echo $nombre2; echo " "; echo $apellidop; echo " "; echo $apellidom; ?></h3>
<h3>Quien entreg&oacute: <?php echo $nombre;?></h3>
</div>
<div class="col-md-4"><h3>Fecha:  <?php echo $fecha;?> </h3></div>
</div>

<div class="table-responsive">



<!-- crear venta   -->
<center>
<h2>PRODUCTOS <div id="div1" class="fa"></div>
<style>
#div1 {
  font-size:48px;
}
</style>

<script>
function openfolder() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "&#xf114;";
  setTimeout(function () {
      a.innerHTML = "&#xf115;";
    }, 1000);
}
openfolder();
setInterval(openfolder, 2000);
</script>
</h2></center>

 	


<table class="table"  border="2">
	<tr class="success">
		<th  style="font-size: 18px;" bgcolor="#27AE60"><strong>Nombre producto</strong></th>
		<th  style="font-size: 18px;" bgcolor="#27AE60"><strong>Cantidad</strong></th>
		<th  style="font-size: 18px;" bgcolor="#27AE60"><strong>Costo Sugerido</strong></th>
		<th  style="font-size: 18px;" bgcolor="#27AE60"><strong>Subtotal</strong></th>
	</tr>
	<?php 
		  while($row=$resultado->fetch_assoc()){ 
                        ?>

	<tr class="warning">
		<td><?php echo $PK = $row['fk_nombre_producto']; ?></td>
		<td><?php echo $row['canti']; ?></td>
		<td><?php echo $row['costo_sugerido']; ?></td>
		<td><?php echo $row['sub']; ?></td>
		
		
	</tr>
	<?php 
	}
	 ?>
</table>
<h2>Total: <?php echo $tot; ?></h2>
</div>
<a href="../reportes/r_libros.php"><button class="button">Imprimir Reporte</button></a>
<a href="crear_entrega.php"><button class="button2">FINALIZAR</button></a>

</div>

</body>
</html>