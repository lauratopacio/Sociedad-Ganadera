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


  $borrar_carito="DELETE FROM carrito where fk_venta='$pk_com'";
                 $borrar=$con->query($borrar_carito);

$borrar_entrega="DELETE FROM entrega where folio='$pk_com'";
                 $borrar_e=$con->query($borrar_entrega);




$fk_productor=1;
$total_vendido=0;
$status="en proceso";
$query_buscar="SELECT pk_usuario as pk from usuario where nombre='$nombre'";
$resultado_buscar=$con->query($query_buscar);

while($row2=$resultado_buscar->fetch_array())
{
 $pk_usu=$row2['pk'];
}

$query="INSERT INTO entrega(folio,fk_usuario,fk_productor,total_vendido,fecha_venta,status) VALUES (NULL,'$pk_usu',NULL,'$total_vendido',NOW(),'$status')";
  
  $resultado=$con->query($query);


        if($borrar_e==true)
        {

echo"<html>
  <head>
  </head>
  <body>
  <br>
    <meta http-equiv='REFRESH' content='0 ; url=../vistas/admin.php'> 
    <script> 
      alert('entrega cancelada');
    </script>
  </body>
  </html>"; 
}else {
  echo"<html>
  <head>
  </head>
  <body>
    <meta http-equiv='REFRESH' content='0 ; url=entrega.php'>
    <script> 
      alert('Error al entregar los datos');
    </script>
  </body>
  </html>";
  }
?>