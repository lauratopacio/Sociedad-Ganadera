<?php 
 
include ("class_combo_categoria.php");
class modelo
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
class cargoModelo extends modelo
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_cargos()
	{
		$pk = $_REQUEST['pk_nombre_producto'];
		$result = $this->_db->query("SELECT pk_nombre_producto, imagen from catalogo where pk_nombre_producto='$pk' ");
		$cargo =$result->fetch_all(MYSQLI_ASSOC);
		return $cargo;
	}
}


$cargoModelo = new cargoModelo();
$a_cargos = $cargoModelo->get_cargos();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar cargos</title>
<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
    <script src="../bootstrap/jquery/jquery.js"></script> 
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
   
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="../bootstrap/jquery/bootstrap.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

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
	
	<center>
		<h1>Modificar producto</h1>
	</center>
	

	<?php foreach($a_cargos as $row): ?>
<div class="container" align="center">	
  
    <!-- Primera Ventana -->
        <div class="col-md-12" bcolor="red" >
            <div class="panel with-nav-tabs panel-danger" bcolor="red">
                <div class="panel-heading" bcolor="red">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1danger" data-toggle="tab">Modificar</a></li>  
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <!-- Form Name -->
                            <legend>MODIFICAR CATALOGO</legend>

				    	<div>        

<form class="form-horizontal" action="update_foto.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8">
<fieldset>

			<input hidden type="text" name="pk_nombre_producto" id="pk_nombre_producto" value="<?php $row['pk_nombre_producto']; ?>">
	 		<?php $img =$row['imagen']; ?>
							<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre del producto:</label>  
								  <div class="col-md-4">
									  <input type="text" name="pk_nombre_producto" id="pk_nombre_producto" value="<?php echo $row['pk_nombre_producto']; ?>" readonly='readonly' class="form-control input-md" required>    
								  </div>
								</div>

				<!--Fotografia actual -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="nom">Fotorafía actual:</label>  
			<div class="col-md-4">
				<img width="300px" heigth="300px" src="<?php echo $img; ?> ">	
			</div>
			</div>

				<!--NUEVA IMAGEN -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="nom">Nueva imagen</label>  
			<div class="col-md-4">
				<input id="imagen" name="imagen" type="file"  class="form-control input-md" required="" accept="image/gif, image/jpeg, image/png, image/jpg"/> <span class="help-block">Eliga imagen</span>  
			</div>
			</div>

				<!--BOTON MODIFICAR -->            	 
				<input type="submit"  name="btn-modificar" value="Modificar" class="btn btn-danger">
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