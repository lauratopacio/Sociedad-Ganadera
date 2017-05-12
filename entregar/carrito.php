<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}
    require('../conexion/conec.php');


    



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

//buscar carrito de esa venta maxima por ese usuario
$query="SELECT pk_carrito,fk_venta,fk_nombre_producto, SUM(cantidad) as canti, costo_sugerido,SUM(subtotal) as sub FROM carrito where fk_venta='$pk_com' group by fk_nombre_producto";
    
    $resultado=$con->query($query); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entregados</title>
 <meta charset="utf-8">
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
    

<table class="table table-striped table-inverse">
            <thead>
         
                <tr>
                
                 
                          
                <td width="3%" class="a"><strong>Nom. producto</strong></td>            
                <td width="3%" class="a"><strong>Cantidad</strong></td>
                <td width="5%" class="a"><strong>Costo_sugerido</strong></td>
                <td width="4%" class="a"><strong>subtotal</strong></td>
                <td width="4%" class="a"><strong>Eliminar</strong></td>
                </tr>

                <tbody>
                    <?php

                     
                      while($row=$resultado->fetch_assoc()){ 
                        ?>

                        <tr>
                        
                            
                            <td>
                            <?php echo $row['pk_carrito'];?>
                            </td>
                            

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
                                 echo "<td> <center> <a href=elim_carrito.php?pk_carrito=".$row['pk_carrito']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar Información"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    
                         
                    <?php } ?>


                </tbody>

               

                </table>
             
                </body>
                </html>