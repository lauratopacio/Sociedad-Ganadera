<?php 

  include_once"../conexion/conexion.php";
  

class Gasto
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
		$result = $this->_db->query('SELECT pk_gasto, folio_factura, empresa, concepto, total, observaciones, status, fecha_gasto FROM gastos');
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
	<title>Gastos</title>
		<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">   

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/styleMenu.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				
			</div>
		</div>
				
			<div class="row">
        <div class="col-lg-12" id="cabezera">
            <h3 align="center">Visualización de Gastos</h3>
        </div>
    <div class="row">
        <div class="col-lg-12 table-responsive" id="formProdu">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th>Folio Factura</th>
                        <th>Empresa</th>
                        <th>Concepto</th>
                        <th>Total</th>
                        <th>Observaciones</th>
                        <th>Status</th>
               
                    </tr>
           
                  
						<?php foreach($a_gasto as $row): ?>
							<tr>
							<?php $PK = $row['pk_gasto']; ?>
								<td><?php echo $row['folio_factura']; ?></td>
								<td><?php echo $row['empresa']; ?></td>
								<td><?php echo $row['concepto']; ?></td>
								<td><?php echo $row['total']; ?></td>
								<td><?php echo $row['observaciones']; ?></td>
								<td><?php echo $row['status']; ?></td>
					
						
							</tr>
							<?php 
							endforeach;
							 ?>

                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </div>
	</div>
	</div>
	<br>
	<footer>
		<div class="container">
			<span align="center"> Helllo ! @ 2016</span>
		</div>
	</footer>



</body>
</html>
