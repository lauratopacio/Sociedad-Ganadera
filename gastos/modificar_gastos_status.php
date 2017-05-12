<?php 
 
  include_once"../conexion/conexion.php";
 

require_once('class_gastos.php');
class gasto
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
class gastoModelo extends Gasto
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_gasto()
	{
		$pk = $_REQUEST['pk_gasto'];
		$result = $this->_db->query("SELECT pk_gasto, folio_factura, empresa, concepto, total, observaciones, status, fecha_gasto FROM gastos WHERE pk_gasto='$pk' ");
		$gasto =$result->fetch_all(MYSQLI_ASSOC);
		return $gasto;
	}
}
$gastoModelo = new gastoModelo();
$a_gasto = $gastoModelo->get_gasto();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Status</title>
	   <link rel="stylesheet" href="../Bootstrap-3.3.4-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../Bootstrap-3.3.4-dist/css/estilo.css">
<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
<script src="../Bootstrap-3.3.4-dist/js/jquery.js"></script>
<script src="../Bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

<style type="text/css">
nav.navbar ul.nav li {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color:
}
	/* cambiar el color de fondo a la barra */
nav.navbar {
    background-color: #fff;
    color: #d9534f;
}
</style>
</head>
<body>
	
	<center>
		<h1>Modificar Status</h1>
	</center>
	<?php foreach($a_gasto as $row): ?>
	

<div class="container" align="center">	
  
    <!-- Primera Ventana -->
        <div class="col-md-12" bcolor="red" >
            <div class="panel with-nav-tabs panel-danger" bcolor="red">
                <div class="panel-heading" bcolor="red">
                        <ul class="nav nav-tabs">
                         
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">
                           
                            <!-- Form Name -->
                            <legend>Cambiar el Status</legend>

				    	<div>        

				    		<form class="form-horizontal" action="update_status_gastos.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
							<input hidden type="int" name="pk_gasto" value="<?php echo $row['pk_gasto']; ?>">

							<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Folio Factura:</label>  
								  <div class="col-md-4">
									  <input type="text" autofocus="autofocus" name="folio_factura" value="<?php echo $row['folio_factura']; ?>" class="form-control input-md">    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Empresa:</label>  
								  <div class="col-md-4">
									  <input type="text" name="empresa" value="<?php echo $row['empresa']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Concepto:</label>  
								  <div class="col-md-4">
									  <input type="text" name="concepto" value="<?php echo $row['concepto']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Total:</label>  
								  <div class="col-md-4">
									  <input type="number" name="total" value="<?php echo $row['total']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Observaciones:</label>  
								  <div class="col-md-4">
									  <input type="text" name="observaciones" value="<?php echo $row['observaciones']; ?>" class="form-control input-md">    
								  </div>
								</div>

									<div class="form-group">
  								<label class="col-md-4 control-label" for="nom">Status:</label>
  									<div class="col-md-4">
    							<select id="selectbasic"  class="form-control" value="<?php echo $row['status']; ?>" name="status" required>
      								<option value="Pagado">Pagado</option>
      								<option value="Pendiente">Pendiente</option>
      								<option value="No Pagado">No Pagado</option>
    								</select>
  										</div>
										</div>

										<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Fecha del Gasto:</label>  
								  <div class="col-md-4">
									  <input type="date" name="fecha_gasto" value="<?php echo $row['fecha_gasto']; ?>" class="form-control input-md" readonly>    
								  </div>
								</div>








								<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-danger">
							</form>

						</div>
						    
						</div>
               
            
  				 </div>
				</div>
				</div>
		</div>
</div>


<?php endforeach; ?>
</body>
</html>