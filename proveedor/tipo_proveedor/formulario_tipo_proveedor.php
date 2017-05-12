
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Proveedor</title>
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

				    		<form class="form-horizontal" action="insertar_tipo_proveedor.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Tipo de Proveedor:</label>  
								  <div class="col-md-4">
									  <input type="text"  autofocus="autofocus" name="tipo_proveedor" value="" class="form-control input-md" required>    
								  </div>
								</div>
								
				
                    <br>

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