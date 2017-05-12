<?php 
 
  include_once"../conexion/conexion.php";

require_once('class_productor.php');
class productores
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
class productorModelo extends Productores
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
	<title>Modificar Productor</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
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
	</div>
<br><br><br>

	<?php foreach($a_productor as $row): ?>
	

<div class="container" align="center">	
  
    <!-- Primera Ventana -->
        <div class="col-md-12" bcolor="red" >
            <div class="panel with-nav-tabs panel-default" bcolor="red">
                <div class="panel-heading" bcolor="red">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1danger" data-toggle="tab">Modificar</a></li>  
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <!-- Form Name -->

				    	<div>        

				    		<form class="form-horizontal" action="update_productor.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
							<input hidden type="int" name="pk_productor" value="<?php echo $row['pk_productor']; ?>">

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">RFC:</label>  
								  <div class="col-md-4">
									  <input type="varchar" name="rfc" value="<?php echo $row['rfc']; ?>" class="form-control input-md" required>    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre:</label>  
								  <div class="col-md-4">
									  <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Paterno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidop" value="<?php echo $row['apellidop']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Materno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidom" value="<?php echo $row['apellidom']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Calle:</label>  
								  <div class="col-md-4">
									  <input type="varchar" pattern="[a-zA-Z ]*" name="calle" value="<?php echo $row['calle']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Número Exterior:</label>  
								  <div class="col-md-4">
									  <input type="number" name="numero" value="<?php echo $row['numero']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Colonia:</label>  
								  <div class="col-md-4">
									  <input type="text" name="colonia" value="<?php echo $row['colonia']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Localidad:</label>  
								  <div class="col-md-4">
									  <input type="text" name="localidad" value="<?php echo $row['localidad']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Télefono:</label>  
								  <div class="col-md-4">
									  <input type="int" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-success">
							</form>

						</div>
						    
						</div>
               
            
  				 </div>
				</div>
				</div>
		</div>
</div>


<?php endforeach; ?>


</body>
</html>
