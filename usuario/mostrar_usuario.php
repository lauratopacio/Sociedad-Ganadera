<?php 

  include_once"../conexion/conexion.php";
  

class Usuarios
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

class usuarioModelo extends usuarios
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_usuario()
	{
		$result = $this->_db->query('SELECT pk_usuario, nombre, apellidop, apellidom, user, pass,
		 y.tipo, z.sucursal FROM usuario x, tipo_usuario y, sucursal z WHERE y.pk_tipo_usuario = x.fk_tipo_usuario and z.pk_sucursal = x.fk_sucursal');
		$gasto =$result->fetch_all(MYSQLI_ASSOC);
		return $gasto;
	}
}
$usuarioModelo = new usuarioModelo();
$a_usuario = $usuarioModelo->get_usuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mostrar Productor</title>
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
            <h3 align="center">Visualización de Usuario</h3>
            <center>
            <h2><a href="formulario_usuario.php">Nuevo Usuario </a></h2>
        </center>
        </div>
    <div class="row">
        <div class="col-lg-12" id="formProdu">
            <table class="table table-responsive" id="table" >
                <thead>
                	 <tr>

			<th><strong>Nombre</strong>  /  <strong>Apellido Paterno</strong></th>
			<th><strong>Usuario</strong></th>
	
			<th><strong>Tipo de Usuario</strong></th>
			<th><strong>Sucursal</strong> 
				</tr>


	
	
	 </thead>

	<?php 
		foreach($a_usuario as $row):
	 ?>
	<tr>
	<?php $PK = $row['pk_usuario']; ?>
		<td><?php echo $row['nombre'];?>
		<?php echo $row['apellidop'];?></td>
		<td><?php echo $row['user']; ?></td>
		
		<td><?php echo $row['tipo']; ?></td>
		<td><?php echo $row['sucursal']; ?></td>

			<td><a href='modificar_usuario.php?pk_usuario=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Usuario?','Confirmar')"><span class="glyphicon glyphicon-edit"> Modificar</span></a></td>
		<td><a href='eliminar_usuario.php?pk_usuario=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Eliminar?','Confirmar')"><span class="glyphicon glyphicon-edit"> Eliminar</span></a></td>
		

			</tr>
	<?php 
	endforeach;
	 ?>
</table>
</div>
</div>

</body>
</html>