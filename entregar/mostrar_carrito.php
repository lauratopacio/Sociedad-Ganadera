<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}
 require('../conexion/conec.php');
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
  

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php require('../menu/menu.php') ?>
			</div>
		</div>

	
<div class="container" align="center">	
<div class="table-responsive">

<!--Buscador -->


<!-- crear venta   -->


<style>
	.table{
  background: white;
}
body{
background-color:#ABEBC6 ;
 margin: 0;
  min-width: 250px;
}


/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Style the header */
.header {
  background-color: #C0392B  ;
  padding: 30px 40px;
  color: white;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
input {
  border: none;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
}

.addBtn:hover {
  background-color: #bbb;
}



</style>



<div id="myDIV" class="header">
  <h1>Control de entregas</h1>
  <div style="vertical-align: 1%">
          <form action="mostrar_carrito.php" method="POST" name="form">
                <div class="col-md-3">
                  <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Nombre del productos" required=""><br>
                </div>
                <div class="col-md-3">
                  <input id="fecha_ini" name="fecha_ini" type="date" class="form-control" placeholder="FECHA INICIAL" required=""><br>
                </div>
                <div class="col-md-3">
                  <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" required="" ><br>
                </div>
                <div class="col-md-1">
                  <button name="buscador" type="submit" class="btn btn-primary"> Buscar</button>  
                 </div> 
                </form>  
                 
            </div>
</div>

<table class="table"  border="2">
	<tr class="success">
		<th style="font-size: 18px;" bgcolor="#27AE60"><strong>Usuario</strong></th>
		<th  style="font-size: 18px;" bgcolor="#27AE60"><strong>Productor</strong></th>
		<th style="font-size: 18px;" bgcolor="#27AE60"><strong>Total</strong></th>
		<th style="font-size: 18px;" bgcolor="#27AE60"><strong>Fecha</strong></th>
		<th style="font-size: 18px;" bgcolor="#27AE60"><strong>Status</strong></th>
		<th style="font-size: 18px;" bgcolor="#27AE60"><strong>Ver</strong></th>
	</tr>
	<?php 
		 if($_POST){ 
                 $busqueda = trim($_POST['buscar']);  
                 

                 if (empty($busqueda)){ 

               ?>  <tr>   <td width="5%" class="color" colspan="6">  <?php echo $texto = 'Búsqueda sin resultados';  ?> 
                  </td></tr>
                <?php 
                 }

                 else{ 
                 
                  $busqed=$_POST['buscar'];
                  $fecha_ini=$_POST['fecha_ini'];
                  $fecha_fin=$_POST['fecha_fin'];

                $buscar_usuario="SELECT t.folio, x.nombre  as nom_usuario, y.nombre as nom_productor, t.total_vendido, t.fecha_venta, t.status FROM usuario x, productor y, entrega t WHERE t.fk_usuario=x.pk_usuario and t.fk_productor=y.pk_productor and y.nombre like '%$busqed%' AND t.fecha_venta BETWEEN '$fecha_ini' AND '$fecha_fin'";
                 $resultado_buscar=$con->query($buscar_usuario);
                 }}
                 else{
                   $buscar_usuario="SELECT t.folio, x.nombre  as nom_usuario, y.nombre as nom_productor, t.total_vendido, t.fecha_venta, t.status FROM usuario x, productor y, entrega t WHERE t.fk_usuario=x.pk_usuario and t.fk_productor=y.pk_productor and DATE(t.fecha_venta) = DATE(NOW())";
                 $resultado_buscar=$con->query($buscar_usuario);

                 }
                while($row=$resultado_buscar->fetch_assoc()){ 
	 ?>
  
	<tr class="warning">
		<td><?php echo $row['nom_usuario']; ?></td>
		<td><?php echo $row['nom_productor']; ?></td>
		<td><?php echo $row['total_vendido']; ?></td>
		<td><?php echo $row['fecha_venta']; ?></td>
		<td><?php echo $row['status']; ?></td>



                                  <?php 
                                 echo "<td> <center> <a href=ver.php?folio=".$row['folio']." "; 
                                 echo"><button>VER</button></a></center> </td>";
                            ?>   

	</tr>
                 
	<?php 
}
	 ?>
</table>

</div>
</div>

</body>
</html>