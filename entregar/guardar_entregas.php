<!DOCTYPE html>
<html lang="en">
<head>
  <title>INICIO DE SESION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">




    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
     <script src="../bootstrap/jquery/jquery.js"></script> 
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="../bootstrap/jquery/bootstrap.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pavi Materiales</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#" data-toggle="modal" data-target="#myModal">Buscar</a></li>

    </ul>
  </div>
</nav>

<body>

<div class="container">


  <!-- Modal -->
  <div class="modal dialog" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BUSCADOR</h4>
        </div>

       
      <div class="panel panel-success" id="pan">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Búsqueda de productores
          
            
          </div>
          <div class="panel-body">

            <form method="post" class="form-horizontal" action="combos.php">


            <fieldset>

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

    }else{ document.getElementById("myDiv").innerHTML='<img src="../buscador/load.gif" width="50" height="50" />'; }

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

                    <legend align="center">Búsqueda de alumnosss.   </legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombre"></label>  
  <div class="col-md-4">
<input type="text" id="bus" onkeyup="myFunction()" class="form-control input-md" required="required" autofocus="autofocus" placeholder="Buscar Alumnoss" />
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



