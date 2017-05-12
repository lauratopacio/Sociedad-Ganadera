<?php
include ("class_combo_usuario.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Usuario</title>
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

<div class="container" align="center" >	
  
    <!-- Primera Ventana -->
        <div class="col-md-12" bcolor="red" >
            <div class="panel with-nav-tabs panel-default" bcolor="red"  id="formProdu">
                <div class="panel-heading" bcolor="red">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1danger" data-toggle="tab">Nuevo Usuario</a></li>  
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <!-- Form Name -->

				    	<div>        

				    		<form class="form-horizontal" action="insertar_usuario.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
				    			

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre:</label>  
								  <div class="col-md-4">
									  <input type="text" onkeypress="return soloLetras(event)" autofocus="autofocus" name="nombre" value="" class="form-control input-md" required>    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Paterno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidop" onkeypress="return soloLetras(event)" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Materno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidom" onkeypress="return soloLetras(event)" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Usuario:</label>  
								  <div class="col-md-4">
									  <input type="text"  name="user" maxlength="22" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Password:</label>  
								  <div class="col-md-4">
									  <input type="password" name="pass" value="" class="form-control input-md" required>    
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

												<br>
			
                    

								<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-success">
								<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-danger">
							</form>

						</div>
						    
						</div>
               
            
  				 </div>
				</div>
				</div>
		</div>
</div>
</body>
</html>

