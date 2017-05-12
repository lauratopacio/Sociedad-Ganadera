<?php
  include_once"../conexion/conexion.php";
 

class Gastos extends DBAbstractModel
{
	
	public $folio_factura;
	public $folio_gastos;
	public $empresa;
	public $concepto;
	public $total;
	public $observaciones;
	public $status;
	public $fecha_gasto;
	
	protected $pk_gasto;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($gasto='')
	{
		if($gasto !=''):
			$this -> query="SELECT pk_gasto, folio_gastos, folio_factura, empresa, concepto, total, observaciones, status, fecha_gasto from gastos where folio_gastos = '$gasto' ";
			$this -> get_result_from_query();
		endif;

		if(count($this ->rows)==1):
			foreach($this ->rows[0] as $propiedad => $valor):
				$this -> $propiedad = $valor;
			endforeach;
		endif;			
	}

	public function set($user_data = array())
	{
		if(array_key_exists('folio_gastos',$user_data)):
			$this -> get($user_data['folio_gastos']);
			if($user_data['folio_gastos'] != $this ->folio_factura):
				foreach($user_data as $campo => $valor):
					$$campo  = $valor;
				endforeach;
				$this -> query= "INSERT INTO gastos(pk_gasto, folio_gastos, folio_factura, empresa, concepto, total, observaciones, status, fecha_gasto) VALUES (null, '$folio_gastos', '$folio_factura', '$empresa', '$concepto', '$total', '$observaciones', '$status','$fecha_gasto')";
				$this -> execute_single_query();
			endif;
		endif;
	}

	public function edit($pk_gasto = array())
	{
		foreach($pk_gasto as $campo => $valor):
			$$campo = $valor;
		endforeach;
		$this -> query = "UPDATE gastos SET  folio_factura='$folio_factura', empresa='$empresa', concepto='$concepto', total='$total', observaciones='$observaciones', status='$status', fecha_gasto='$fecha_gasto' where pk_gasto = '$pk_gasto'";
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from gastos where pk_gasto= '$pk' ";
		$this -> execute_single_query();		
	}
	public function update_estado()
	{

	}
	
	function __destruct()
	{
		unset($this);
	}

}


 ?>