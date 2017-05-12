<?php session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
} 
include ("class_combo_sucursal.php");

$fk_categoria = $_REQUEST['fk_categoria'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	   <meta charset="UTF-8">
	   <title>Catálogo</title>
	   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
     <link rel="stylesheet" type="text/css" href="../bootstrap/css/menuPaginas.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="disen.css" type="text/css">
</head>

<style>
  body{   
    background: url('../img/img8.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.acomodo{
  margin-top: -50px;
}
</style>
<body>
<br>


	<div class="container">
	
	
			<div class="row">
        <div class="col-lg-12" id="cabezera">
<div class="col-12">
      </div>
       
        <div class="acomodo">
     <div class="jumbotron">

        <h1 align="center">Cat&aacutelogo </h1>



<div style="vertical-align: 1%">
          <form action="mostrar_catalogo.php?fk_categoria=<?php echo $fk_categoria;?>" method="POST" name="form">
                <div class="col-md-1">
                 <label for="">Nombre:</label>
                </div>
                <div class="col-md-3">
                  <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Nombre del productos" required="">
                </div>
                <div class="col-md-1">
                 <label for="">Almacen:</label>
                </div>
              
               <div class="col-md-3">
                  <select id="sucursal" name="sucursal" class="form-control" Required>
                  <option value="">Seleccione la sucursal</option>
                          <?php
                              $proveedor = obtenerProveedores();
                              foreach ($proveedor as $proveedor) { 
                                  echo '<option value="'.$proveedor->pk_categoria.'">'.$proveedor->categoria.'</option>';        
                              }
                          ?>
                     </select>
             
                  </div>
             

                <div class="col-md-3">
                  <button name="buscador" type="submit"  class="btn btn-primary"> Buscar</button>  
              
                </form>  
             
                    
           </div>
              <div class="col-md-1">
             <a href="../entregar/entregas_carrito.php"><img src="../img/carro.png" width="45px" alt=""></a>
             </div>
              
</div>
</div>
</div>
<?php 

include_once"../conexion/conec.php";
 require('../menu/menu.php'); 

if($_POST){ 
 $busqueda = trim($_POST['buscar']); 
$sucursal=trim($_POST['sucursal']); 
 $entero = 0; }
else{
$busqueda=0;

}
 $entero = 0; 
 if (empty($busqueda)){ 

$buscar_catalogo="SELECT x.imagen, x.pk_nombre_producto,x.descripcion,x.costo_compra,x.costo_venta,x.status, t.sucursal, t.pk_sucursal FROM almacen y, sucursal t, catalogo x WHERE  y.fk_nombre_producto=x.pk_nombre_producto AND y.fk_sucursal=t.pk_sucursal and x.fk_categoria='$fk_categoria'";
$resultado_buscar=$con->query($buscar_catalogo);


$buscar_Categoria="SELECT categoria from categoria where  pk_categoria='$fk_categoria'";
$resultado_categoria=$con->query($buscar_Categoria);
if (mysqli_num_rows($resultado_buscar) >0){
 
  }
  else{
    ?> 
    <br>
    <br>
 <div class="alert alert-danger">
  <strong>Advertencia!</strong> el producto que est&aacute buscando no se encuentra registrado en el sistema.
</div>
<?php 
  }
 }else{

 
$fk_categoria = $_REQUEST['fk_categoria'];

  $buscar_catalogo="SELECT x.imagen, x.pk_nombre_producto,x.descripcion,x.costo_compra,x.costo_venta,x.status, t.sucursal, t.pk_sucursal FROM almacen y, sucursal t, catalogo x WHERE  y.fk_nombre_producto=x.pk_nombre_producto AND y.fk_sucursal=t.pk_sucursal and  y.fk_nombre_producto like '%$busqueda%' and y.fk_sucursal='$sucursal' and x.fk_categoria='$fk_categoria'";
$resultado_buscar=$con->query($buscar_catalogo);


$buscar_Categoria="SELECT categoria from categoria where  pk_categoria='$fk_categoria'";
$resultado_categoria=$con->query($buscar_Categoria);

        if (mysqli_num_rows($resultado_buscar) >0){ }
          else{
            ?> 
         <div class="alert alert-danger">
          <strong>Advertencia!</strong> el producto que est&aacute buscando no se encuentra registrado o no se encuentra en la categoría de
           <?php while($row7=$resultado_categoria->fetch_array())
                          { 
                           echo $nombre_categoria= $row7['categoria'];
                            }?> o es posible que no este en esa sucursal, le sugerimos que revise nuevamente su búsqueda.
        </div>
        <?php 
             }
          }
              ?>

 <div class="row destacados">

               <?php while($row=$resultado_buscar->fetch_array())
                  { ?>

              <?php $img =$row['imagen']; ?>
                  <div class="col-md-4">
                      <div>
                      <h2>
              <?php echo $row['pk_nombre_producto']; ?></h2>
                        <img src="<?php echo $img ?>"  height="100px"  width="100px"alt="Texto Alternativo" class="img-circle img-thumbnail">
                        <div class="title"></div>



<form action="../entregar/registrar_carrito.php" method="POST" id="form"> 
                            
        <input hidden type="text" name="pk_nombre_producto" value="<?php echo $row['pk_nombre_producto']; ?>">
        <input hidden type="text" name="costo_venta" value="<?php echo $row['costo_venta']; ?>">
        <input hidden type="text" name="status" value="<?php echo $row['status']; ?>">
                         
              <label for="">Descripci&oacuten:</label>
                  <?php echo $row['descripcion']; ?>
              <br>
              <label for="">Status: </label>
                  <?php if ($row['status']=='no activo') { ?>
                         <style>                                
                           .insuficiente {
                                    color : red;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                          }
                                   </style> 
                                   <b class="insuficiente"><?php echo $row['status'];  ?></b>  <?php } 
                         else{ ?> 
                         <style>                                
                            .estatus {
                                    color : green;
                                    background-color: #fff;
                                    box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
                                    transition : all .4s;
                                      }
                        </style> 
                            <b class="estatus">
                            <?php echo $row['status'];?></b>
                             <?php } ?>
                       <a href='eliminar_producto.php?pk_nombre_producto=<?php echo $row['pk_nombre_producto']; ?>'><span class="glyphicon glyphicon-edit"></span></a>
                          <br>
                       <label for=""> Costo de venta:</label>
                              <?php echo $row['costo_venta']; ?>
                          <br>
                           
                       <label for="">Cantidad:</label>   
            <input type="number" name="cantidad" class="form-control" autocomplete="off" placeholder="1"  required>
  
            <input type="submit"  value="agregar" class="btn btn-success btn-block"> 
   </form>
         <a href='modificar_catalogo.php?pk_nombre_producto=<?php echo $row['pk_nombre_producto']; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Productor?','Confirmar')"><span class="glyphicon glyphicon-edit"></span></a>
                    
      </div>
    </div>
       
    <?php } ?>
  </div>
</body>
</html>




