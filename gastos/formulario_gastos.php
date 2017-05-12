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
	<title>Agregar Gastos</title>
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
				<?php require('../menu/menuGeneral.php') ?>
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
                            <li class="active"><a href="#tab1danger" data-toggle="tab">Agregar gastos</a></li>  
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <!-- Form Name -->

				    	<div>        

				    		<form class="form-horizontal" action="insertar_gastos.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
				    			

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Folio Factura:</label>  
								  <div class="col-md-4">
									  <input type="text" maxlength="18	"autofocus="autofocus" name="folio_factura" value="" class="form-control input-md">    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Empresa:</label>  
								  <div class="col-md-4">
									  <input type="text" name="empresa" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Concepto:</label>  
								  <div class="col-md-4">
									  <input type="text" name="concepto" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Total:</label>  
								  <div class="col-md-4">
									  <input type="float" maxlength="20" minlength="0" onkeypress="return aceptNum(event)" name="total" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Observaciones:</label>  
								  <div class="col-md-4">
									  <input type="text" name="observaciones" value="" class="form-control input-md" >    
								  </div>
								</div>

									

									<div class="form-group">
  								<label class="col-md-4 control-label" for="nom">Status:</label>
  									<div class="col-md-4">
    							<select id="selectbasic"  class="form-control" value="" name="status" required>
    							      								<option value="Pagado">Pagado</option>
      								<option value="Pendiente">Pendiente</option>
      								<option value="No Pagado">No Pagado</option>
    								</select>
  										</div>
										</div>

												<br>

									

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Fecha del Gasto:</label>  
								  <div class="col-md-4">
									  <input type="date" name="fecha_gasto" value="" class="form-control input-md" required>    
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
</body>
</html>

