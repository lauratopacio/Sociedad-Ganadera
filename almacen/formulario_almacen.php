<?php 

  include_once"../conexion/conexion.php";
  

class almacen
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

class productoAlmacen extends almacen
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_productor()
	{
		$result = $this->_db->query("SELECT x.pk_almacen, x.fk_sucursal, y.sucursal FROM almacen x, sucursal y WHERE x.fk_sucursal = y.pk_sucursal");
		$almacen =$result->fetch_all(MYSQLI_ASSOC);
		return $almacen;

	}
}
$productoAlmacen = new productoAlmacen();
$a_almacen = $productoAlmacen->get_productor();
?>
<?php

session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Almacen</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/menuPaginas.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php require('../menu/menuGeneral.php') ?>
			</div>
		</div>
	</div>
<br><br><br>
		
	<div class="container-fluid">
    <section class="container">

		<div class="container-page">				
			<div class="col-md-5" id="formProdu">
				<h4 align="center">Visualización de Almacenes</h4>
        <table class="table" id="table" align="center">

                <thead>
                    <tr>
                        <th>Almacen</th>
                        <th>Funcionalidad</th>                    
                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<?php foreach($a_almacen as $row): ?>
							<tr>
							<?php $PK = $row['fk_sucursal']; ?>
								<td><?php echo $row['sucursal']; ?></td>
							
								
								<td>
						           <a class="btn btn-success" href='ver_almacen.php?pk_sucursal=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea Ver el Almacen?','Confirmar')"><span class="glyphicon glyphicon-hand-right"></span> Acceder</span></a>
								</td>
								
							</tr>
							<?php 
							endforeach;
							 ?>

                    </tr>
                </tbody>
            </table>


                    
			</div>


		</div>

			<div class="container-page">				
			<div class="col-md-6" id="formProdu">
			<legend align="center">Añadir Nuevo Producto al almacen</legend>

    <form class="form-horizontal" action="insertar_gastos.php"  method="POST" enctype="multipart/form-data" accept-charset="utf-8"><fieldset>
								
				    			

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Nombre del Producto:</label>  
								  <div class="col-md-4">
									  <input type="text" autofocus="autofocus" name="folio_factura" value="" class="form-control input-md">    
								  </div>
								</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Empresa:</label>  
								  <div class="col-md-4">
									  <input type="text" name="empresa" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Concepto:</label>  
								  <div class="col-md-4">
									  <input type="text" name="concepto" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Total:</label>  
								  <div class="col-md-4">
									  <input type="float" maxlength="20" minlength="0" onkeypress="return aceptNum(event)" name="total" value="" class="form-control input-md" required>    
								  </div>
								</div>

									<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Observaciones:</label>  
								  <div class="col-md-4">
									  <input type="text" name="observaciones" value="" class="form-control input-md" >    
								  </div>
								</div>

									

									<div class="form-group">
  								<label class="col-md-4 control-label" for="nom">Status:</label>
  									<div class="col-md-4">
    							<select id="selectbasic"  class="form-control" value="" name="status" required>
    							      								<option value="Pagado">Pagado</option>
      								<option value="Pendiente">Pendiente</option>
      								<option value="No Pagado">No Pagado</option>
    								</select>
  										</div>
										</div>

												<br>

									

								<div class="form-group">
									  <label class="col-md-4 control-label" for="nom">Fecha del Gasto:</label>  
								  <div class="col-md-4">
									  <input type="date" name="fecha_gasto" value="" class="form-control input-md" required>    
								  </div>
								</div>
			
                    

								<input type="submit" name="btn-modificar" value="Guardar" class="btn btn-success" align="center"><br><br>
							</form>


                    
			</div>


		</div>
	</section>
</div>



</body>

</html>

