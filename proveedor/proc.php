<?php 
  

class proveedor
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

class proveedorModelo extends proveedor
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_proveedor()
	{
		$q = $_POST['q'];
		$q=str_replace(" ","%","$q"); // retorna juanito%lopez%soto  


		$result = $this->_db->query("SELECT x.pk_proveedor, x.rfc, x.nombre, x.apellidop, x.apellidom, x.calle, x.numero, x.localidad, x.municipio, x.telefono, x.fecha_registro, x.correo_electronico, y.tipo_proveedor, concat(x.nombre,'',x.apellidom,'',x.apellidop) AS nombres FROM proveedor x, tipo_proveedor y WHERE x.fk_tipo_proveedor = y.pk_tipo_proveedor  HAVING nombres like '%$q%'");
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
	<title>Agregar Proveedor</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
	<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>


    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th>RFC</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                      <?php	foreach($a_proveedor as $row):?>
	<tr>
	<?php $PK = $row['pk_proveedor']; ?>
		<td><?php echo $row['rfc']; ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['apellidop']; ?></td>
		<td><?php echo $row['apellidom']; ?></td>
				<td>
			<a href='mostrar_proveedor.php?pk_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea ver este proveedor ?','Confirmar')"><span class="glyphicon glyphicon-eye-open"></span></a>
		</td>
		<td>
           <a href='modificar_proveedor.php?pk_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el proveedor?','Confirmar')"><span class="glyphicon glyphicon-edit"></span></a>
		</td>
		<td>
			<a href='eliminar_proveedor.php?pk_proveedor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea eliminar este proveedor Definitivamente?','Confirmar')"><span class="glyphicon glyphicon-remove"></span></a>
		</td>

		
	</tr>
	<?php   endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </div>


</body>
</html>