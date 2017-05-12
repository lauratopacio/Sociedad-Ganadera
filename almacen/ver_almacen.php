<?php 

  include_once"../conexion/conexion.php";
  

class almacen
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

class productoAlmacen extends almacen
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_productor()
	{
		$pk = $_REQUEST['pk_sucursal'];
		$result = $this->_db->query("SELECT x.pk_almacen, x.fk_sucursal, x.fk_nombre_producto, x.cantidad_existencia,y.sucursal FROM almacen x, sucursal y WHERE x.fk_sucursal = y.pk_sucursal AND x.fk_sucursal = $pk ");
		$almacen =$result->fetch_all(MYSQLI_ASSOC);
		return $almacen;

	}
}
$productoAlmacen = new productoAlmacen();
$a_almacen = $productoAlmacen->get_productor();
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
	<title>Productos Almacen</title>
		<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/menuPaginas.css" media="screen" charset="utf-8">
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
            <h3 align="center">Visualización de Almacen</h3>
        </div>
    <div class="row">
        <div class="col-lg-12 table-responsive" id="formProdu">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th>Nombre Producto</th>
                        <th>Cantidad Existencia</th>
                
                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<?php foreach($a_almacen as $row): ?>
							<tr>
							<?php $PK = $row['pk_almacen']; ?>
								<td><?php echo $row['fk_nombre_producto']; ?></td>
								<td><?php echo $row['cantidad_existencia']; ?></td>
							
							
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


























