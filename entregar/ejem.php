 <html>
    <head>
    <title>Productos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
    </head>
   
    <body> 

     <div class="container">
  <center>
   <div class="jumbotron">

    <h1>Registro y control de Almac&eacuten</h1>
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
   <div style="vertical-align: 50%">
     <div class="row">  

        <div class="col-md-4 col-md-offset-4">
          <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Nombre del productos" required=""><br>
        </div>
                    <div class="col-md-1">
              <button name="buscador" class="btn btn-primary"> Buscar</button>
              </div>        
              <div class="col-md-1">
                <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
                 Alta de Productos
                </a> </div>
              <div class="col-md-1">
                 </div>
                

     </div>
    </div>
</form>    

</div>

              <table class="table-striped table-condensed table-hover table-bordered">
              <tr class="header">
                   <td width="2%" class="a"><strong>No.</strong></td>  
                <td width="2%" class="a"><strong>Foto</strong></td>              
                <td width="10%" class="a"><strong>C&oacutedigo</strong></td>            
                <td width="3%" class="a"><strong>Marca del Vehiculo</strong></td>
                       
              <thead>
        <tbody>
<?php

include_once"../conexion/conexion.php";

class modelo
{
  protected $_db;

  public function __construct()
  {
    $this ->_db = new mysqli("localhost", "root", "", "cosecha");
    if($this ->_db->connect_errno)
    {
      echo "Error en la conexión:". $this->_db->connect_errno;
      return;
    }
    $this->_db->set_charset("utf-8");
  }
}
class ventaModelo extends modelo
{
  public function __construct()
  {
    parent::__construct();
  }


}
$ventaModelo = new ventaModelo();

 $texto = ''; //Variable que contendrá el número de resgistros encontrados
  $registros = '';
  $pk_catalogo=''; 
  $marca_carro='';
  $cantidad='';
  $stock='';
  $costo='';
  $estatus='';
 
 if($_POST){ 
 $busqueda = trim($_POST['buscar']);  
 $entero = 0; 
 if (empty($busqueda)){ $texto = 'Búsqueda sin resultados'; 
 }else{ // Si hay información para buscar, abrimos la conexión 
 conectar(); mysqli_set_charset('utf8'); // para indicar a la bbdd que vamos a mostrar la info en utf  //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
  $sql = "SELECT y.pk_nombre_producto,y.descripcion, y.costo_venta, x.categoria FROM catalogo y,categoria x WHERE x.pk_categoria=y.fk_categoria and y.pk_nombre_producto LIKE '%$busqueda%'";  $resultado = mysql_query($sql); //Ejecución de la consulta //Si hay 

if (mysql_num_rows($resultado) > 0){  // Se recoge el número de resultados 
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; // Se almacenan las cadenas de resultado
while($fila = mysql_fetch_assoc($resultado)){ 
  ?>  <tr>

  <td><?php   echo $fila['pk_nombre_producto'] . '<br />'; ?></td>
  <td><?php   echo $fila['descripcion'] . '<br />'; ?></td>
<td><?php   echo  $fila['costo_venta'] . '<br />'; ?></td>
<td><?php echo  $fila['categoria'] . '<br />'; ?></td>

                            <?php 
                                 echo "<td> <center> <a href=eliminar.php?pk_producto=".$fila['pk_producto']." "; 
                                 ?>onclick="return confirm('¿En verdad deseas eliminar este registro?','Confirma')" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar registro"<?php echo"><span class='glyphicon glyphicon-trash'></span></a></center> </td>";
                            ?>    

                          <td> <center>                 
                                <a data-toggle="modal" href="#actualizar2<?php echo $fila['pk_producto']; ?>" role="button" class="btn btn-mini" title="Actualizar Informacion">
                                   <span class='glyphicon glyphicon-edit'></span>
                                </a></center>  
                            </td> 
                           
                            </tr>  


<?php  
      } 
    }else{ 
  ?> 
<div class="alert alert-danger">
  <strong>Advertencia!</strong> el producto que est&aacute buscando no se encuentra registrado en el sistema.
</div>
<?php   
 }}} 
?> 

    </tbody>
     </table>
      

</center>

</div>



                     


    </body>
  </html> 
  
