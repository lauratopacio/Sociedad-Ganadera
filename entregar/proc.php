<?php

include '../conexion/conec.php';


$q=$_POST['q'];







$sql="SELECT CONCAT(nombre, ' ', apellidop, ' ', apellidom) as Productor, pk_productor, nombre, apellidop, apellidom, rfc
from productor
where nombre like '%$q%'";
 $res=$con->query($sql);

if(mysqli_num_rows($res)==0){

 echo '<b>No hay sugerencias</b>';

}else{


   while($fila=$res->fetch_assoc()){ 

?>
 <a href="agregar_productor.php?pk_productor=<?php echo $fila['pk_productor']; ?>" role="button" class="btn btn-mini"><button class="btn btn-primary"><?php echo '<div class="cell" onclick="myFunction2('.$fila['pk_productor'].')">'.$fila['nombre'].' '.$fila['apellidop'].' '.$fila['apellidom'].' / '.$fila['rfc'].'</div>' ?>

 </button>
                                </a>
                              
  <?php

 }


}

?>