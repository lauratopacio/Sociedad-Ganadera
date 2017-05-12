<?php 


session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}



  include_once"../conexion/conexion.php";
  


class proveedores
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
class proveedorModelo extends Proveedores
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_proveedor()
	{
		$pk = $_REQUEST['pk_proveedor'];
		$result = $this->_db->query("SELECT x.pk_proveedor, x.rfc, x.nombre, x.apellidop, x.apellidom, x.calle, x.numero,x.colonia, x.localidad, x.municipio, x.telefono, x.fecha_registro, x.correo_electronico, y.tipo_proveedor FROM proveedor x, tipo_proveedor y WHERE x.fk_tipo_proveedor = y.pk_tipo_proveedor and pk_proveedor='$pk' ");
		$proveedor =$result->fetch_all(MYSQLI_ASSOC);
		return $proveedor;
	}
}
$proveedorModelo = new proveedorModelo();
$a_proveedor = $proveedorModelo->get_proveedor();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proveedor</title>
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php require('../menu/menuGeneral.php') ?>
			</div>
		</div>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 table-responsive" id="formProdu">
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th>RFC:</th>
                        <th>Nombre:</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                   		<th>Calle</th>
                        <th>#</th>
						<th>Colonia</th>
                        <th>Localidad</th>
						<th>Municipio</th>
                        <th>Telefono</th>
                        <th>Fecha de Registro</th>
                        <th>Correo</th>
                        <th>Tipo de Proveedor</th>
                        
                        
						                        


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
		foreach($a_proveedor as $row):
	 ?>
	<tr>
	<?php $PK = $row['pk_proveedor']; ?>
		<td><?php echo $row['rfc']; ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['apellidop']; ?></td>
		<td><?php echo $row['apellidom']; ?></td>
		<td><?php echo $row['calle']; ?></td>
		<td><?php echo $row['numero']; ?></td>
		<td><?php echo $row['colonia']; ?></td>
		<td><?php echo $row['localidad']; ?></td>
		<td><?php echo $row['municipio']; ?></td>
		<td><?php echo $row['telefono']; ?></td>
		<td><?php echo $row['fecha_registro']; ?></td>
		<td><?php echo $row['correo_electronico']; ?></td>
		<td><?php echo $row['tipo_proveedor']; ?></td>

		<td>
			<a href='modificar_proveedor.php?pk_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar este Proveedor ?','Confirmar')"><span class="glyphicon glyphicon-edit"></span></a>
		</td>
		<td>
			<a href='eliminar_proveedor.php?pk_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea eliminar este Proveedor Definitivamente?','Confirmar')"><span class="glyphicon glyphicon-remove"></span></a>
		</td>
	</tr>
	<?php 
	endforeach;
	 ?>
                    </tr>
                    
                </tbody>
            </table>
            <hr>
        </div>
    </div>
  

</body>
</html>