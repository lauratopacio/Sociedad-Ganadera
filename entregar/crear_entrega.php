<?php 
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}

$nombre=$_SESSION["nombre"];

$fk_productor=1;
$total_vendido=0;
$status="en proceso";

include("../conexion/conec.php");
$query_buscar="SELECT pk_usuario as pk from usuario where nombre='$nombre'";
$resultado_buscar=$con->query($query_buscar);

while($row2=$resultado_buscar->fetch_array())
{
 $pk_usu=$row2['pk'];
}

$query="INSERT INTO entrega(folio,fk_usuario,fk_productor,total_vendido,fecha_venta,status) VALUES (NULL,'$pk_usu',NULL,'$total_vendido',NOW(),'$status')";
  
  $resultado=$con->query($query);

            if ($resultado=true) {
    echo "
        <meta charset='UTF-8' http-equiv='REFRESH' content='0 ; url=../vistas/admin.php'>
    <script>
        alert('Entrega realizada con exito!');
    </script>";
}else
{
    echo "
    <script>
        alert('ERROR!');
    </script>"; 
}

 ?>