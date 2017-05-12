<?php 


include ("Class_combo_proveedor.php");
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
	<title>Proveedor</title>
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
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
<br>

  <div class="container" align="center">
                    	<div class="row">
                    		
                    	</div>
                    </div><br>

<div class="container" id="addProve">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
		<div class="container">


  <script src="ajax.js"></script>

	<script>

function myFunction(){
	var n=document.getElementById('bus').value;

	if(n==''){

 document.getElementById("myDiv").innerHTML="";
 document.getElementById("myDiv").style.border="0px";

 document.getElementById("pers").innerHTML="";

 return;
}

loadDoc("q="+n,"proc.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    document.getElementById("myDiv").style.border="1px solid #A5ACB2";

    }else{   
    	document.getElementById("myDiv").innerHTML='<img src="load.gif" width="50" height="50" />'; }

  });
}

//-------------------------------

function myFunction2(cod){

document.getElementById("myDiv").innerHTML="";
document.getElementById("myDiv").style.border="0px";

loadDoc("vcod="+cod,"proc2.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("pers").innerHTML=xmlhttp.responseText;
    
    }else{ document.getElementById("pers").innerHTML='<img src="load.gif" width="50" height="50" />'; }

  });
}

</script>


                    </div>

                  

                    <legend align="center">Búsqueda de Proveedores</legend>

<div class="form-group">

 		 <label class="col-md-3" for="nombre"></label>  
  			<div class="col-md-8">
					<input type="text" id="bus" onkeyup="myFunction()" class="form-control" required="required" autofocus="autofocus" placeholder="Introduce el Nombre del proveedor" />
					
  </div>
</div>
<br><br><br>
<div class="col-md-12" id="myDiv"></div>	
				



			</div>

		<form action="insertar_proveedor.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8">
	
			<div class="col-md-6">

			<legend>Agregar Proveedor</legend>
			<legend><h5>Generales </h5></legend>
				<div class="form-group col-lg-12">
					<label>RFC:</label>
				  <input type="text"  maxlength="13" minlength="13" min="13" max="13" name="rfc" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Nombre:</label>
				  <input type="text" name="nombre" min="3" onkeypress="return soloLetras(event)" maxlength="38" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
				<label>Apellido Paterno:</label>
									  <input type="text" name="apellidop" min="3" onkeypress="return soloLetras(event)" maxlength="38" value="" class="form-control input-md" required>    
				</div>

				<div class="form-group col-lg-4">
					<label>Apellido Materno:</label>
									  <input type="text" name="apellidom" min="3" onkeypress="return soloLetras(event)" maxlength="38" value="" class="form-control input-md" required>    
				</div>		
				<legend><h5>Domicilio</h5></legend>
				
				<div class="form-group col-lg-4">
					<label>Calle:</label>
									  <input type="text" min="3" onkeypress="return soloLetras(event)" maxlength="38" name="calle" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Numero(#):</label>
									  <input type="int"  name="numero" maxlength="10" minlength="1" onkeypress="return aceptNum(event)" value="" class="form-control input-md" required>    
				</div>

				<div class="form-group col-lg-4">
					<label>Colonia:</label>
									  <input type="text"  min="3" onkeypress="return soloLetras(event)" maxlength="38" name="colonia" value="" class="form-control input-md" required>    
				</div>

					<div class="form-group col-lg-4">
					<label>Localidad:</label>
									  <input type="text" min="3" onkeypress="return soloLetras(event)" maxlength="38" name="localidad" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Municipio:</label>
									  <input type="text" min="3" onkeypress="return soloLetras(event)" maxlength="38" name="municipio" value="" class="form-control input-md" required>    
				</div>

				<div class="form-group col-lg-4">
					<label>Telefono:</label>
									  <input type="text"  maxlength="10" minlength="10" onkeypress="return aceptNum(event)" name="telefono" value="" class="form-control input-md" >    
				</div>
				<legend><h5>Complementos</h5></legend>

				<div class="form-group col-lg-4">
					<label>Correo:</label>
									  <input type="email"  name="correo_electronico" value="" class="form-control input-md" >    
				</div>

				<div class="form-group col-lg-4">
					<label>Tipo de Proveedor</label>
						<select id="proveedores" name="fk_tipo_proveedor" class="form-control" Required>
	    						<option value="">Seleccione:</option>
					                <?php
					                    $proveedor = obtenerProveedores();
					                    foreach ($proveedor as $proveedor) { 
					                        echo '<option value="'.$proveedor->pk_tipo_proveedor.'">'.$proveedor->tipo_proveedor.'</option>';        
					                    }
					                ?>
	   								 </select>				</div>

			<legend></legend>
					<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-success btn-block">
				<br><br>

			</div>

		</form>

		</div>
	</section>
</div>

</body>
</html>

<!--


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
  
    <!- Primera Ventana 
        <div class="col-md-12" bcolor="red" >
            <div class="panel with-nav-tabs panel-danger" bcolor="red">
                <div class="panel-heading" bcolor="red">
                        <ul class="nav nav-tabs">
                             
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <legend>Registrar Proveedor</legend>

				    	<div>        

				    		<form class="form-horizontal" action="insertar_proveedor.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">RFC:</label>  
								  <div class="col-md-4">
									  <input type="varchar" pattern="[a-zA-Z ]*" autofocus="autofocus" name="rfc" value="" class="form-control input-md" required>    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre:</label>  
								  <div class="col-md-4">
									  <input type="text" name="nombre" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Paterno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidop" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Apellido Materno:</label>  
								  <div class="col-md-4">
									  <input type="text" name="apellidom" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Calle:</label>  
								  <div class="col-md-4">
									  <input type="varchar" pattern="[a-zA-Z ]*" name="calle" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Número Exterior:</label>  
								  <div class="col-md-4">
									  <input type="int"  name="numero" value="" class="form-control input-md" required>    
								  </div>
								</div>

									

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Localidad:</label>  
								  <div class="col-md-4">
									  <input type="varchar" pattern="[a-zA-Z ]*" name="localidad" value="" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Municipio:</label>  
								  <div class="col-md-4">
									  <input type="varchar" pattern="[a-zA-Z ]*" name="municipio" value="" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Télefono:</label>  
								  <div class="col-md-4">
									  <input type="number"  name="telefono" value="" class="form-control input-md" required>    
								  </div>
								</div>

								

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Fecha Registro:</label>  
								  <div class="col-md-4">
									  <input type="date" name="fecha_registro" value="" class="form-control input-md" required>    
								  </div>
								</div>

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">É-Mail:</label>  
								  <div class="col-md-4">
									  <input type="text"  name="correo_electronico" value="" class="form-control input-md" required>    
								  </div>
								</div>
								
								<div class="form-group">
							<label class="col-md-4 control-label" for="nom">Tipo Proveedor:</label>  
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

-->