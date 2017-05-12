<?php 

  include_once"../../conexion.php";
  

class tipoproveedor
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

class tipoproveedorModelo extends tipoproveedor
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_tipoproveedor()
	{
		$result = $this->_db->query('SELECT pk_tipo_proveedor, tipo_proveedor FROM tipo_proveedor');
		$tipoproveedor =$result->fetch_all(MYSQLI_ASSOC);
		return $tipoproveedor;
	}
}
$tipoproveedorModelo = new tipoproveedorModelo();
$a_tipoproveedor = $tipoproveedorModelo->get_tipoproveedor();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Tipo de Proveedor</title>
	   <link rel="stylesheet" href="../Bootstrap-3.3.4-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../Bootstrap-3.3.4-dist/css/estilo.css">
<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
<script src="../Bootstrap-3.3.4-dist/js/jquery.js"></script>
<script src="../Bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<!--Enlaces para el diseño de la tabla -->
<link rel="shortcut icon" href="../../diseno_contenedor/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../diseno_contenedor/css/tabs.css" />
		<link rel="stylesheet" type="text/css" href="../diseno_contenedor/css/tabstyles.css" />
  		<script src="../diseno_contenedor/js/modernizr.custom.js"></script>


<style type="text/css">
nav.navbar ul.nav li {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color:
}
	/* cambiar el color de fondo a la barra */
nav.navbar {
    background-color: #fff;
    color: #d9534f;
}
</style>
</head>
<body>
<div class="container" align="center">	
<center>
	<h1 class="well well-lg">Registro Tipo de Proveedor</h1>
	<a href="formulario_tipo_proveedor.php">Nuevo</a><br>
	<br>
</center>	
<div class="table-responsive">
<table class="venta_producto">
	<tr align="center">
		<th><strong>ID</strong></th>
		<th><strong>Tipo Proveedor</strong></th>
		<th><strong>Modificar</strong></th>

		
		<th><strong>Eliminar</strong></th>
	</tr>
	<?php 
		foreach($a_tipoproveedor as $row):
	 ?>
	<tr>
	<?php $PK = $row['pk_tipo_proveedor']; ?>
		<td><?php echo $row['pk_tipo_proveedor']; ?></td>
		<td><?php echo $row['tipo_proveedor']; ?></td>
	<td>
           <a href='modificar_tipo_proveedor.php?pk_tipo_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Productor?','Confirmar')"><span class="glyphicon glyphicon-edit"> Modificar</span></a>
		</td>

		
		<td>
			<a href='eliminar_tipo_proveedor.php?pk_tipo_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea eliminar este Proveedor Definitivamente?','Confirmar')"><span class="glyphicon glyphicon-remove"> Eliminar</span></a>
		</td>
	</tr>
	<?php 
	endforeach;
	 ?>
</table>
</div>
</div>

</body>
</html>