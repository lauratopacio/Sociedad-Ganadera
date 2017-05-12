<?php
  include_once"../conexion/conexion.php";
 

class Proveedor extends DBAbstractModel
{
	
	public $rfc;
	public $nombre;
	public $apellidop;
	public $apellidom;
	public $calle;
	public $numero;
	public $colonia;

	public $localidad;
	public $municipio;
	public $telefono;
	public $fecha_registro;
	public $correo_electronico;
	public $fk_tipo_proveedor;
	public $status;
	protected $pk_proveedor;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($proveedor='')
	{
		if($proveedor !=''):
			$this -> query="SELECT pk_proveedor, rfc, nombre, apellidop, apellidom, calle, numero, colonia, localidad, municipio, telefono, fecha_registro, correo_electronico, fk_tipo_proveedor, status from proveedor where nombre = '$proveedor' ";
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
				$this -> query= "INSERT INTO proveedor(pk_proveedor, rfc, nombre, apellidop, apellidom, calle, numero, colonia, localidad, municipio, telefono, fecha_registro, correo_electronico, fk_tipo_proveedor, status) VALUES (null, '$rfc', '$nombre', '$apellidop', '$apellidom', '$calle', '$numero', '$colonia', '$localidad', '$municipio', '$telefono', '$fecha_registro', '$correo_electronico', '$fk_tipo_proveedor', '$status')";
				$this -> execute_single_query();
			endif;
		endif;
	}

	public function edit($pk_proveedor = array())
	{
		foreach($pk_proveedor as $campo => $valor):
			$$campo = $valor;
		endforeach;
		$this -> query = "UPDATE proveedor SET rfc='$rfc', nombre='$nombre', apellidop='$apellidop', apellidom='$apellidom', calle='$calle', numero='$numero', colonia='$colonia', localidad='$localidad', municipio='$municipio',telefono='$telefono', fecha_registro='$fecha_registro', correo_electronico='$correo_electronico', fk_tipo_proveedor='$fk_tipo_proveedor' status='$status' where pk_proveedor = '$pk_proveedor' ";
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from proveedor where pk_proveedor= '$pk' ";
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