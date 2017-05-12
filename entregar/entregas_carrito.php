<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}
include("../conexion/conec.php");
//suma total del carrito de compra


$nombre=$_SESSION['nombre'];
//BUSCA EL PK DEL USUARIO PARA PODER BUSCAR  LA MAXIMA COMPRA POR USUARIO

$buscar_usuario="SELECT pk_usuario as pk from usuario where nombre='$nombre'";
$resultado_buscar=$con->query($buscar_usuario);

while($row2=$resultado_buscar->fetch_array())
{
 $pk_usu=$row2['pk'];
}

//BUSCAR LA MAXIMA COMPRA DE ESE USUARIO
$busca_maxima_compra_usuario="SELECT MAX(folio) as maximus from entrega where fk_usuario='$pk_usu'";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
 $pk_com=$row3['maximus'];
}


  $buscar_total="SELECT SUM(x.subtotal) as total from carrito x, entrega y where x.fk_venta=y.folio and x.fk_venta='$pk_com'";
                 $resultado_total=$con->query($buscar_total);
while($row4=$resultado_total->fetch_array())
{
 $total=$row4['total'];
}


$buscar_usuario="SELECT pk_usuario as pk from usuario where nombre='$nombre'";
$resultado_buscar=$con->query($buscar_usuario);

while($row2=$resultado_buscar->fetch_array())
{
 $pk_usu=$row2['pk'];
}

//BUSCAR LA MAXIMA COMPRA DE ESE USUARIO
$busca_maxima_compra_usuario="SELECT MAX(folio) as maximus from entrega where fk_usuario='$pk_usu'";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
 $pk_com=$row3['maximus'];
}

//buscar carrito de esa venta maxima por ese usuario
$query="SELECT pk_carrito,fk_venta,fk_nombre_producto, SUM(cantidad) as canti, costo_sugerido,SUM(subtotal) as sub FROM carrito where fk_venta='$pk_com' group by fk_nombre_producto";
    
    $resultado=$con->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entregados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
     <script src="../bootstrap/jquery/jquery.js"></script> 
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
                   
                  
                        <?php require('../menu/menu.php') ?>
                   


      <div class="jumbotron">
        <center>
        <h1>Carrito de entregas</h1>
          <div style="vertical-align: 2%">

                <div class="col-md-1">
                  <a href="../catalogo/catalogo.php"><button name="buscador" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Añadir m&aacutes productos</button></a>
                </div> 
               
            </div>
        </center>
      </div>



  <center><h2>Carrito<img src="../img/carro.png" width="30px"></h2></center>


<table class="table table-striped table-inverse">
            <thead>
         
                <tr>
                
                 
                          
                <td><strong>Nom. producto</strong></td>            
                <td ><strong>Cantidad</strong></td>
                <td><strong>Costo_sugerido</strong></td>
                <td ><strong>subtotal</strong></td>
                <td><strong>Eliminar</strong></td>
                </tr>

                <tbody>
                    <?php

                     
                      while($row=$resultado->fetch_assoc()){ 
                        ?>

                        <tr>
                        
                            
                          
                            

                              <td>
                             <?php echo $row['fk_nombre_producto'];?>
                             </td>
                             
                            <td>
                            <?php echo $row['canti'];?>
                            </td>

                            <td>
                            <?php echo $row['costo_sugerido'];?>
                            </td>
                        <td>
                            <?php echo $row['sub'];?>
                            </td>

                            <?php 
                                 echo "<td> <center> <a href=elim_carrito.php?fk_nombre_producto=".$row['fk_nombre_producto']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar Información"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    
                         
                    <?php } ?>


                </tbody>

               

 </table>
             

      <table class="table-striped table-inverse">
       <thead>
   <tr>
      <th scope="row"><h2>TOTAL:</h2></th>
      <th scope="row"><h2><?php echo $total; ?></h2></th>
  </tr>
    </thead>
      </table>
      <p>
<a data-toggle="modal" href="#myModal"><button type="button" class="btn btn-success btn-lg btn-block">ENTREGAR</button></a>
<a href="cancelar.php"><button type="button" class="btn btn-danger btn-lg btn-block" >CANCELAR</button></a>
</p>



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

                    <legend align="center">Búsqueda de productores</legend>

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




</body>

</html>