<?php
  include_once"../conexion/conexion.php";
 

class Productor extends DBAbstractModel
{
	
	private $fecha_entrada;
	private $fk_proveedor;
	private $cantidad_existencia;
	private $fk_nombre_producto;
	private $fk_sucursal;

	protected $pk_almacen;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($almacen='')
	{
		if($almacen !=''):
			$this -> query="SELECT pk_alamacen, fk_sucursal, fk_nombre_producto, cantidad_existencia, fk_proveedor, fecha_entrada from almacen where fk_sucursal = '$almacen' ";
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
		if(array_key_exists('rfc',$user_data)):
			$this -> get($user_data['rfc']);
			if($user_data['rfc'] != $this ->rfc):
				foreach($user_data as $campo => $valor):
					$$campo  = $valor;
				endforeach;
				$this -> query= "INSERT INTO productor(null) VALUES (null)";
				$this -> execute_single_query();
			endif;
		endif;
	}

	public function edit($pk_productor = array())
	{
		foreach($pk_productor as $campo => $valor):
			$$campo = $valor;
		endforeach;
		$this -> query = "UPDATE almacen SET rfc='$rfc', nombre='$nombre', apellidop='$apellidop', apellidom='$apellidom', calle='$calle', numero='$numero', colonia='$colonia', localidad='$localidad', telefono='$telefono' where pk_productor = '$pk_productor' ";
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from almacen where pk_productor= '$pk' ";
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