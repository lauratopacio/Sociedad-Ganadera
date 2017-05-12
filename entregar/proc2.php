<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	


</head>



<body>
<h5>Verificar alumno</h5>

<?php
include '../conexion/conec.php';

 $id=$_POST['vcod'];

$sql = "SELECT * from productor where pk_productor='$id'";
 $r=$con->query($sql);
 while($row=$r->fetch_assoc()){ 
  echo $nombre_completo = $row['nombre'].' '.$row['apellidop'].' '.$row['apellidom'].' /  rfc: '.$row['rfc'];
}




?>
<br>
<br>

 <form method="post" class="form-horizontal" action="recibe.php">


            <fieldset>



<?php
require_once("select.php");
?>

                    <center>
                    <div class="form-group"  align="left" id="alm">
                        <label>&nbsp;&nbsp;&nbsp;Productor:</label>

                        <select id="pk_salon" name="salon" class="form-control input-sm">
                            <option value="0">Seleccione el salon</option>

                            <?php
                                $sal = obtenerSalon();
                                foreach ($sal as $salon) {
                                    echo '<option value="'.$salon->rfc.'">'.$salon->nombre.'</option>';
                                }
                            ?>
                        </select>


                    </div>
                    </center>

                    <legend align="center">Registrar el incidente   </legend>



                    <center>

         <div  class="form-group" align="center" id="mostrarnomb">
         <div class="col-md-4" align="center">
     <input name="alumno" type="hidden" value="<?php echo $id;  ?>">
		 
          </div>
        </div>
        </center>

<center>
<div class="form-group">
                  <label class="col-md-4 control-label" for="incidente">Incidente:</label>
                  <div class="col-md-4">
                    <select id="incidente" name="incidente" class="form-control">
                     
                      <option value="Falto a clases">1.Falto a clases</option>
                      <option value="No trajo la tarea">2. No trajo la tarea</option>
                      <option value="Se peleo">3. Se peleo</option>
                      <option value="No trajo uniforme">4. No trae Uniforme</option>
                      <option value="Fumo en clases">5. Fumo en clases</option>
                      <option value="Insulto al profesor">6. Insulto al profesor</option>
            
                    </select>
                  </div>
                </div> 
                </center>
<br>

<div  class="form-group" align="left">
            <label class="col-md-4 control-label" for="fecha">Fecha:</label>
            <div class="col-md-4">
            <input type="date" name="fecha" id="fecha" width="1000"  class="form-control input-md" >

          </div>
        </div>
        <br>
        <div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" type="submit"  value="Guardar"class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true"> Guardar</button>
    <a href="../index4.php" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"> Cancelar </span> </a>
   
  </div>

</div>
        
        </form>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

