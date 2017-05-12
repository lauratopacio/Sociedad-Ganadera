<?php 
 
  include_once"../conexion/conexion.php";
include ("class_combo_usuario.php");
require_once('class_usuario.php');
class usuarios
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
class usuarioModelo extends Usuarios
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_usuario()
	{
		$pk = $_REQUEST['pk_usuario'];
		$result = $this->_db->query("SELECT pk_usuario, nombre, apellidop, apellidom, user,
		 pass, y.tipo, z.sucursal from usuario x, tipo_usuario y, sucursal z WHERE y.pk_tipo_usuario = x.fk_tipo_usuario and z.pk_sucursal = x.fk_sucursal and pk_usuario='$pk' ");
		$usuario =$result->fetch_all(MYSQLI_ASSOC);
		return $usuario;
	}
}
$usuarioModelo = new usuarioModelo();
$a_usuario = $usuarioModelo->get_usuario();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Usuario</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
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
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				
			</div>
		</div>
	</div>
<br><br><br>

	<?php foreach($a_usuario as $row): ?>
	

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

				    		<form class="form-horizontal" action="update_usuario.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
							<input hidden type="int" name="pk_usuario" value="<?php echo $row['pk_usuario']; ?>">

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre:</label>  
								  <div class="col-md-4">
									  <input type="text" onkeypress="return soloLetras(event)" autofocus="autofocus" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control input-md" required>    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Paterno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidop" onkeypress="return soloLetras(event)" value="<?php echo $row['apellidop']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Materno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidom" onkeypress="return soloLetras(event)" value="<?php echo $row['apellidom']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Usuario:</label>  
								  <div class="col-md-4">
									  <input type="text"  name="user" maxlength="22" value="<?php echo $row['user']; ?>" class="form-control input-md" required>    
								  </div>
								</div>

									

								
								

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Tipo Usuario Actual:</label>  
								  <div class="col-md-4">
									  <input type="text" name="fk_tipo_usuario" value="<?php echo $row['tipo']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>

										<div class="form-group">
							<label class="col-md-4 control-label" for="nom">Tipo Usuario:</label>  
							 <div class="col-md-4">
	    						<select id="tipo_usuario" name="fk_tipo_usuario" class="form-control" Required>
	    						<option value="">Seleccione un Usuario</option>
					                <?php
					                    $prove = obtenerTipoUsuario();
					                    foreach ($prove as $prove) { 
					                        echo '<option value="'.$prove->pk_tipo_usuario.'">'.$prove->tipo.'</option>';        
					                    }
					                ?>
	   								 </select>
						 
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Sucursal Anterior:</label>  
								  <div class="col-md-4">
									  <input type="text" name="fk_sucursal" value="<?php echo $row['sucursal']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>

										<div class="form-group">
							<label class="col-md-4 control-label" for="nom">Sucursal:</label>  
							 <div class="col-md-4">
	    						<select id="sucursal" name="fk_sucursal" class="form-control" Required>
	    						<option value="">Seleccione la Sucursal</option>
					                <?php
					                    $proveedor = obtenerSucursales();
					                    foreach ($proveedor as $proveedor) { 
					                        echo '<option value="'.$proveedor->pk_sucursal.'">'.$proveedor->sucursal.'</option>';        
					                    }
					                ?>
	   								 </select>
						 
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
