

<!DOCTYPE html>
<html lang="en">
<head>
  <title>INICIO DE SESION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>



<body>

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

    }else{ document.getElementById("myDiv").innerHTML='<img src="load.gif" width="50" height="50" />'; }

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

                    <legend align="center">Búsqueda de Proveedores   </legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombre"></label>  
  <div class="col-md-4">
<input type="text" id="bus" onkeyup="myFunction()" class="form-control input-md" required="required" autofocus="autofocus" placeholder="Buscar Alumno" />
  <span class="help-block"></span>  
  </div>
</div>
<br><br><br>
<div align="center"  id="myDiv"></div>

  
<script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>











 
</div>
 <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
       
      </div>
    </div>
  </div>
</div>

</body>
</html>


