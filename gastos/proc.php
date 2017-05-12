<?php  

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

class gastoModelo extends gasto
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_gasto()
	{

		$q = $_POST['q'];
		$q=str_replace(" ","%","$q"); // retorna juanito%lopez%soto  

if(isset($_GET[$q]) and !preg_match_all('^ *$',$_GET[$q])){
		
		$result = $this->_db->query("SELECT * from gastos where empresa LIKE '%$q%' ");
	
		
		$gasto =$result->fetch_all(MYSQLI_ASSOC);
		return $gasto;
		
	}else	{

				$result = $this->_db->query("SELECT	 pk_gasto, folio_gastos, folio_factura, empresa, concepto, total, observaciones, status, fecha_gasto from gastos HAVING empresa like '%$q%' ");


		$gasto =$result->fetch_all(MYSQLI_ASSOC);
		return $gasto;
	
}


		

		


	}
}
$gastoModelo = new gastoModelo();
$a_gasto = $gastoModelo->get_gasto();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Agregar Gasto</title>
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
                        <th>Folio</th>

                        <th>Empresa</th>
                        <th>Concepto</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody>

                    <tr>
                      <?php	foreach($a_gasto as $row):?>
	<tr>
	<?php $PK = $row['pk_gasto']; ?>
		<td><?php echo $row['folio_factura']; ?></td>
		<td><?php echo $row['empresa']; ?></td>
		<td><?php echo $row['concepto']; ?></td>
		<td><?php echo $row['total']; ?></td>
				<td>
			
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


