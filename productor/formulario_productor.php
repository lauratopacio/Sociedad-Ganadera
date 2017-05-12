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
	<title>Productor</title>
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

	<div class="container" id="formProdu">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
				
	<div class="container">


  <script src="ajax.js"></script>


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

                    <legend align="center">Búsqueda de Productores </legend>

<div class="form-group">

 		 <label class="col-md-3" for="nombre"></label>  
  			<div class="col-md-8">
					<input type="text" id="bus" onkeyup="myFunction()" class="form-control" required="required" autofocus="autofocus" placeholder="Introduce el Nombre del productor" />
					
  </div>
</div>
<br><br><br>
<div class="col-md-12" id="myDiv"></div>

			</div>

		<form action="insertar_productor.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8">
	
			<div class="col-md-6">

			<legend>Agregar Productor</legend>
			<legend><h5>Generales </h5></legend>
				<div class="form-group col-lg-12">
					<label>RFC:</label>
				  <input type="varchar" autofocus="autofocus" maxlength="13" minlength="13" min="13" max="13" name="rfc" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Nombre:</label>
					 <input type="text" name="nombre" min="3" onkeypress="return soloLetras(event)" maxlength="38" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Apellido Paterno:</label>
				  <input type="text" name="apellidop" min="3" onkeypress="return soloLetras(event)" maxlength="38"  value="" class="form-control input-md" required>    
				</div>

				<div class="form-group col-lg-4">
					<label>Apellido Materno:</label>
					<input type="text" name="apellidom" min="3" onkeypress="return soloLetras(event)" maxlength="38" value="" class="form-control input-md" required>    
				</div>		
				<legend><h5>Domicilio</h5></legend>
				
				<div class="form-group col-lg-4">
					<label>Calle:</label>
				  <input type="varchar" pattern="[a-zA-Z ]*" name="calle" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Numero(#)</label>
				  <input type="text"  name="numero" value="" maxlength="8" onkeypress="return aceptNum(event)" class="form-control input-md" required>    
				</div>

				<div class="form-group col-lg-4">
					<label>Colonia:</label>
				  <input type="varchar" pattern="[a-zA-Z ]*" name="colonia" value="" class="form-control input-md" required>    
				</div>

					<div class="form-group col-lg-4">
					<label>Localidad:</label>
					<input type="varchar" pattern="[a-zA-Z ]*" name="localidad" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>telefono</label>
				  <input type="text" name="telefono" onkeypress="return aceptNum(event)" minlength="10" maxlength="10" value="" class="form-control input-md" required>    
				</div>

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

