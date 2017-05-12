<?php
  include_once"../conexion/conexion.php";
 

class Productor extends DBAbstractModel
{
	
	public $rfc;
	public $nombre;
	public $apellidop;
	public $apellidom;
	public $calle;
	public $numero;
	public $colonia;
	public $localidad;
	public $telefono;
	protected $pk_productor;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($productor='')
	{
		if($productor !=''):
			$this -> query="SELECT pk_productor, rfc, nombre, apellidop, apellidom, calle, numero, colonia, localidad, telefono from productor where nombre = '$productor' ";
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
				$this -> query= "INSERT INTO productor(pk_productor, rfc, nombre, apellidop, apellidom, calle, numero, colonia, localidad, telefono) VALUES (null, '$rfc', '$nombre', '$apellidop', '$apellidom', '$calle', '$numero','$colonia', '$localidad', '$telefono')";
				$this -> execute_single_query();
			endif;
		endif;
	}

	public function edit($pk_productor = array())
	{
		foreach($pk_productor as $campo => $valor):
			$$campo = $valor;
		endforeach;
		$this -> query = "UPDATE productor SET rfc='$rfc', nombre='$nombre', apellidop='$apellidop', apellidom='$apellidom', calle='$calle', numero='$numero', colonia='$colonia', localidad='$localidad', telefono='$telefono' where pk_productor = '$pk_productor' ";
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from productor where pk_productor= '$pk' ";
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