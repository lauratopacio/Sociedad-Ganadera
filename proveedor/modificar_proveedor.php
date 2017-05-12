<?php 
  include_once"../conexion/conexion.php";
  require_once('class_proveedor.php');
include ("Class_combo_proveedor.php");



session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}


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
		$result = $this->_db->query("SELECT x.pk_proveedor, x.rfc, x.nombre, x.apellidop, x.apellidom, x.calle, x.numero, x.localidad, x.municipio, x.telefono, x.fecha_registro, x.correo_electronico, y.tipo_proveedor FROM proveedor x, tipo_proveedor y WHERE x.fk_tipo_proveedor = y.pk_tipo_proveedor and pk_proveedor='$pk' ");
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
	<title>Modificar Proveedor</title>
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

	<?php foreach($a_proveedor as $row): ?>
	

	 <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
      </script>

      <script>
var nav4 = window.Event ? true : false;
function aceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key>= 48 && key <= 57));
}
</script>



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

				    		<form class="form-horizontal" action="update_p.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
							<input hidden type="int" name="pk_productor" value="<?php echo $row['pk_proveedor']; ?>">

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">RFC:</label>  
								  <div class="col-md-4">
									  <input type="text"  maxlength="13" minlength="13" min="13" max="13" value="<?php echo $row['rfc']; ?>" class="form-control input-md" required>    
								  </div>
								</div>




								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre:</label>  
								  <div class="col-md-4">
									  <input type="text" name="nombre" min="3" onkeypress="return soloLetras(event)" maxlength="38" value="<?php echo $row['nombre']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Paterno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidop" min="3" onkeypress="return soloLetras(event)" maxlength="38"  value="<?php echo $row['apellidop']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Materno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidom" min="3" onkeypress="return soloLetras(event)" maxlength="38"  value="<?php echo $row['apellidom']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Calle:</label>  
								  <div class="col-md-4">
									  <input type="text" min="3" onkeypress="return soloLetras(event)" maxlength="38" name="calle" value="<?php echo $row['calle']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Número Exterior:</label>  
								  <div class="col-md-4">
									  <input type="int"  name="numero" maxlength="10" minlength="1" onkeypress="return aceptNum(event)" value="<?php echo $row['numero']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

				
									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Localidad:</label>  
								  <div class="col-md-4">
									  <input type="text" name="localidad" value="<?php echo $row['localidad']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Municipio:</label>  
								  <div class="col-md-4">
									  <input type="text" name="municipio" value="<?php echo $row['municipio']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Télefono:</label>  
								  <div class="col-md-4">
									  <input type="int" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Fecha Registro:</label>  
								  <div class="col-md-4">
									  <input type="date" name="fecha_registro" value="<?php echo $row['fecha_registro']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">É-Mail:</label>  
								  <div class="col-md-4">
									  <input type="text" name="correo_electronico" value="<?php echo $row['correo_electronico']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Cargo Anterior:</label>  
								  <div class="col-md-4">
									  <input  value="<?php echo $row['tipo_proveedor']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>

									<div class="form-group">
										<label class="col-md-4 control-label" for="nom">Cargo:</label>  
										 <div class="col-md-4">
				    						<select id="proveedores" name="fk_tipo_proveedor" class="form-control" Required>
				    						<option value="">Seleccione un Cargo</option>
								                <?php
								                    $proveedor = obtenerProveedores();
								                    foreach ($proveedor as $proveedor) { 
								                        echo '<option value="'.$proveedor->pk_tipo_proveedor.'">'.$proveedor->tipo_proveedor.'</option>';        
								                    }
								                ?>
				   								 </select>
									 
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