<?php 


include ("class_combo_categoria.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Catalogo</title>
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

	<div class="container" id="formProdu">
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

<br><br><br>
<div class="col-md-12" id="myDiv"></div>

			</div>

		<form action="insertar_catalogo.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8">
	
			<div class="col-md-6">

			<legend>Agregar Producto</legend>
			<legend><h5>Generales </h5></legend>
				<div class="form-group col-lg-12">
					<label>Nombre Producto:</label>
				  <input type="text"  name="pk_nombre_producto" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Descripción:</label>
					 <input type="text"  min="10" onkeypress="return soloLetras(event)" name="descripcion" value="" class="form-control input-md" required>    
				</div>
				
				<div class="form-group col-lg-4">
					<label>Costo Compra:</label>
				  <input type="float" name="costo_compra" value="" class="form-control input-md" required>    
				</div>

				<div class="form-group col-lg-4">
					<label>Costo Venta:</label>
					<input type="float" name="costo_venta" value="" class="form-control input-md" required>    
				</div>	

							<div class="form-group">
							<label class="col-md-4 control-label" for="nom">Categoria:</label>  
							 <div class="col-md-4">
	    						<select id="fk_categoria" name="fk_categoria" class="form-control" Required>
	    						<option value="">Seleccione la categoria</option>
					                <?php
					                    $proveedor = obtenerProveedores();
					                    foreach ($proveedor as $proveedor) { 
					                        echo '<option value="'.$proveedor->pk_categoria.'">'.$proveedor->categoria.'</option>';        
					                    }
					                ?>
	   								 </select>
						 
								  </div>
								</div>


				<div class="form-group col-lg-4">
          <label class="col-md-4 control-label" for="imagen">Ingresar Imagen:</label>  
         
          <input id="imagen" name="imagen" type="file"  class="form-control input-md" required="" accept="image/gif, image/jpeg, image/png, image/jpg"/>
          <span class="help-block">Eliga imagen</span>  
          </div>
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

