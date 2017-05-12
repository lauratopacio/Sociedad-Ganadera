<?php 
 
  include_once"../../conexion.php";
 

require_once('class_tipo_proveedor.php');
class TiposProveedores
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
class tipoproveedorModelo extends TiposProveedores
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_tipoproveedor()
	{
		$pk = $_REQUEST['pk_tipo_proveedor'];
		$result = $this->_db->query("SELECT pk_tipo_proveedor, tipo_proveedor from tipo_proveedor where pk_tipo_proveedor='$pk' ");
		$TiposProveedores =$result->fetch_all(MYSQLI_ASSOC);
		return $TiposProveedores;
	}
}
$tipoproveedorModelo = new tipoproveedorModelo();
$a_tipoproveedor = $tipoproveedorModelo->get_tipoproveedor();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Tipo de Proveedor</title>
	   <link rel="stylesheet" href="../Bootstrap-3.3.4-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../Bootstrap-3.3.4-dist/css/estilo.css">
<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
<script src="../Bootstrap-3.3.4-dist/js/jquery.js"></script>
<script src="../Bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

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
		<h1>Modificar Tipo de Proveedor</h1>
	</center>
	<?php foreach($a_tipoproveedor as $row): ?>
	

<div class="container" align="center">	
  
    <!-- Primera Ventana -->
        <div class="col-md-12" bcolor="red" >
            <div class="panel with-nav-tabs panel-danger" bcolor="red">
                <div class="panel-heading" bcolor="red">
                        <ul class="nav nav-tabs">
                          
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <!-- Form Name -->
                            <legend>Registrar Tipo de Proveedor</legend>

				    	<div>        

				    		<form class="form-horizontal" action="update_tipo_proveedor.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
							<input hidden type="int" name="pk_tipo_proveedor" value="<?php echo $row['pk_tipo_proveedor']; ?>">

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Tipo de Proveedor:</label>  
								  <div class="col-md-4">
									  <input type="text" name="tipo_proveedor" value="<?php echo $row['tipo_proveedor']; ?>" class="form-control input-md" required>    
								  </div>
								</div>


								

								<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-danger">
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