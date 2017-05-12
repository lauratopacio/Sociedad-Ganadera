<?php  

class productor
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

class productorModelo extends productor
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_productor()
	{

		$q = $_POST['q'];
		$q=str_replace(" ","%","$q"); // retorna juanito%lopez%soto  

if(isset($_GET[$q]) and !preg_match_all('^ *$',$_GET[$q])){
		
		$result = $this->_db->query("SELECT * from productor where nombre LIKE '%$q%' ");
	
		
		$productor =$result->fetch_all(MYSQLI_ASSOC);
		return $productor;
		
	}else	{

				$result = $this->_db->query("SELECT	 pk_productor, rfc, nombre, apellidop, apellidom, calle, numero, colonia, localidad, telefono, concat(nombre,'',apellidom,'',apellidop,'') AS nombres from productor HAVING nombres like '%$q%' ");


		$productor =$result->fetch_all(MYSQLI_ASSOC);
		return $productor;
	
}


		

		


	}
}
$productorModelo = new productorModelo();
$a_productor = $productorModelo->get_productor();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Agregar Productor</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   
	<link rel="shortcut icon" href="../img/sim.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>


    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th>RFC</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                      <?php	foreach($a_productor as $row):?>
	<tr>
	<?php $PK = $row['pk_productor']; ?>
		<td><?php echo $row['rfc']; ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['apellidop']; ?></td>
		<td><?php echo $row['apellidom']; ?></td>
				<td>
			<a href='mostrar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea ver este Productor ?','Confirmar')"><span class="glyphicon glyphicon-eye-open"></span></a>
		</td>
		<td>
           <a href='modificar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Productor?','Confirmar')"><span class="glyphicon glyphicon-edit"></span></a>
		</td>
		<td>
			<a href='eliminar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea eliminar este Productor Definitivamente?','Confirmar')"><span class="glyphicon glyphicon-remove"></span></a>
		</td>

		
	</tr>
	<?php   endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </div>

</body>
</html>





<!--



<div class="container" >	
<center>
	<br>
</center>	
<div class="table-responsive col-md-6">

<table class="venta_producto">
	<tr align="left">
		<th>RFC</th>
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		
		<th><strong>Télefono</strong></th>
		<th></th>
		<th></th>
	</tr>
	<?php 
	//	foreach($a_productor as $row):
	 ?>
	<tr>
	<?php $PK = $row['pk_productor']; ?>
		<td><?php echo $row['rfc']; ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['apellidop']; ?></td>
		<td><?php echo $row['apellidom']; ?></td>
		<td><?php echo $row['telefono']; ?></td>
		<td>
           <a href='modificar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea modificar el Productor?','Confirmar')"><span class="glyphicon glyphicon-edit"> Modificar</span></a>
		</td>
		<td>
			<a href='eliminar_productor.php?pk_productor=<?php echo $PK; ?>' onclick="return confirm('Aviso: \n¿Desea eliminar este Productor Definitivamente?','Confirmar')"><span class="glyphicon glyphicon-remove"> Eliminar</span></a>
		</td>
	</tr>
	<?php 
	// endforeach;
	 ?>
</table>
</div>
</div>

