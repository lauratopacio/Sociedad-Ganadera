<?php 

  include_once"../conexion/conexion.php";
  

class productor
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

class productorModelo extends productor
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_productor()
	{
		$pk = $_REQUEST['pk_productor'];
		$result = $this->_db->query("SELECT pk_productor, rfc, nombre, apellidop, apellidom, calle, numero, colonia, localidad, telefono from productor where pk_productor='$pk' ");
		$productor =$result->fetch_all(MYSQLI_ASSOC);
		return $productor;

	}
}
$productorModelo = new productorModelo();
$a_productor = $productorModelo->get_productor();
?>
<?php

session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mostrar Productor</title>
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
				
			<div class="row">
        <div class="col-lg-12" id="cabezera">
            <h3 align="center">Visualización de Productor</h3>
        </div>
    <div class="row">
        <div class="col-lg-12 table-responsive" id="formProdu">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th>RFC</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Calle</th>
                        <th>Numero(#)</th>
                        <th>Colonia</th>
                        <th>Localidad</th>
                        <th>Telefono</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<?php foreach($a_productor as $row): ?>
							<tr>
							<?php $PK = $row['pk_productor']; ?>
								<td><?php echo $row['rfc']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['apellidop']; ?></td>
								<td><?php echo $row['apellidom']; ?></td>
								<td><?php echo $row['calle']; ?></td>
								<td><?php echo $row['numero']; ?></td>
								<td><?php echo $row['colonia']; ?></td>
								<td><?php echo $row['localidad']; ?></td>
								<td><?php echo $row['telefono']; ?></td>
								<td>
						           <a href='modificar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Productor?','Confirmar')"><span class="glyphicon glyphicon-edit"></span></a>
								</td>
								<td>
									<a href='eliminar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea eliminar este Productor Definitivamente?','Confirmar')"><span class="glyphicon glyphicon-remove"></span></a>
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
	</div>
	</div>
	<br>
	<footer>
		<div class="container">
			<span align="center"> Helllo ! @ 2016</span>
		</div>
	</footer>



</body>
</html>


























