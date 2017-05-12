<?php
  include_once"../conexion/conexion.php";
 

class Usuario extends DBAbstractModel
{
	

	public $nombre;
	public $apellidop;
	public $apellidom;
	public $user;
	public $pass;
	public $fk_tipo_usuario;
	public $fk_sucursal;
	protected $pk_usuario;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($usuario='')
	{
		if($usuario !=''):
			$this -> query="SELECT pk_usuario, nombre, apellidop, apellidom, user, pass, fk_tipo_usuario, fk_sucursal FROM usuario where nombre = '$usuario' ";
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
		if(array_key_exists('nombre',$user_data)):
			$this -> get($user_data['nombre']);
			if($user_data['nombre'] != $this ->nombre):
				foreach($user_data as $campo => $valor):
					$$campo  = $valor;
				endforeach;
				$this -> query= "INSERT INTO usuario(pk_usuario, nombre, apellidop, apellidom, user, pass, fk_tipo_usuario, fk_sucursal) VALUES (null, '$nombre', '$apellidop', '$apellidom', '$user', MD5('$pass'), '$fk_tipo_usuario', '$fk_sucursal')";
				$this -> execute_single_query();
			endif;
		endif;
	}

	public function edit($pk_usuario = array())
	{
		foreach($pk_usuario as $campo => $valor):
			$$campo = $valor;
		endforeach;
		$this -> query = "UPDATE usuario SET  nombre='$nombre', apellidop='$apellidop', apellidom='$apellidom', user ='$user', fk_tipo_usuario='$fk_tipo_usuario', fk_sucursal='$fk_sucursal' where pk_usuario = '$pk_usuario' ";
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from usuario where pk_usuario= '$pk' ";
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