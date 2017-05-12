<?php 

  include_once"../conexion/conexion.php";
  

class Almacenes
{
	protected $_db;

	public function __construct()
	{
		$this ->_db = new mysqli("localhost", "root", "", "cosecha");
		if($this ->_db->connect_errno)
		{
			echo "Error en la conexión:". $this->_db->connect_errno;
			return;
		}
		$this->_db->set_charset("utf-8");
	}
}

class almacenModelo extends almacenes
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_almacen()
	{
		$result = $this->_db->query('SELECT pk_almacen, y.sucursal, fk_nombre_producto, cantidad_existencia, w.nombre, fecha_entrada FROM almacen x, sucursal y,  proveedor w WHERE y.pk_sucursal = x.fk_sucursal  and w.pk_proveedor = x.fk_proveedor');
		$almacen =$result->fetch_all(MYSQLI_ASSOC);
		return $almacen;
	}
}
$almacenModelo = new almacenModelo();
$a_almacen = $almacenModelo->get_almacen();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mostrar Productos en Almacen</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>


<div class="container">
		<div class="row">
			<div class="col-12">
				
			</div>
		</div>
				
			<div class="row">
        <div class="col-lg-12" id="cabezera">
            <h3 align="center">Visualización de productos en almacen</h3>
            <center>
            <h2><a href="formulario_almacen.php">Nuevo Producto </a></h2>
        </center>
        </div>
    <div class="row">
        <div class="col-lg-12" id="formProdu">
            <table class="table table-responsive" id="table" >
                <thead>
                	 <tr>

			<th><strong>Sucursal</strong></th> 
			 <th><strong>Producto</strong></th>
			<th><strong>Cantidad Existencia</strong></th>
	
			<th><strong>Proveedor</strong></th>
			<th><strong>Fecha de Regitro</strong> 
				</tr>


	
	
	 </thead>

	<?php 
		foreach($a_almacen as $row):
	 ?>
	<tr>
	<?php $PK = $row['pk_almacen']; ?>
		<td><?php echo $row['sucursal'];?></td>
		<td><?php echo $row['fk_nombre_producto'];?></td>
		<td><?php echo $row['cantidad_existencia']; ?></td>
		
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['fecha_entrada']; ?></td>

			<td><a href='modificar_almacen.php?pk_almacen=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el producto?','Confirmar')"><span class="glyphicon glyphicon-edit"> Modificar</span></a></td>
		<td><a href='eliminar_almacen.php?pk_almacen=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea Eliminar el Producto?','Confirmar')"><span class="glyphicon glyphicon-edit"> Eliminar</span></a></td>
		

			</tr>
	<?php 
	endforeach;
	 ?>
</table>
</div>
</div>

</body>
</html>