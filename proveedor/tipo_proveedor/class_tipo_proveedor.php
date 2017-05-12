<?php
  include_once"../../conexion.php";
 

class TipoProveedor extends DBAbstractModel
{
	
	public $tipo_proveedor;
	protected $pk_tipo_proveedor;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($tipoproveedor='')
	{
		if($tipoproveedor !=''):
			$this -> query="SELECT pk_tipo_proveedor, tipo_proveedor from tipo_proveedor where tipo_proveedor = '$tipoproveedor' ";
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
		if(array_key_exists('tipo_proveedor',$user_data)):
			$this -> get($user_data['tipo_proveedor']);
			if($user_data['tipo_proveedor'] != $this ->tipo_proveedor):
				foreach($user_data as $campo => $valor):
					$$campo  = $valor;
				endforeach;
				$this -> query= "INSERT INTO tipo_proveedor(pk_tipo_proveedor, tipo_proveedor) VALUES (null, '$tipo_proveedor')";
				$this -> execute_single_query();
			endif;
		endif;
	}

	public function edit($pk_tipo_proveedor = array())
	{
		foreach($pk_tipo_proveedor as $campo => $valor):
			$$campo = $valor;
		endforeach;
		$this -> query = "UPDATE tipo_proveedor SET tipo_proveedor='$tipo_proveedor' where pk_tipo_proveedor = '$pk_tipo_proveedor' ";
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from tipo_proveedor where pk_tipo_proveedor= '$pk' ";
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