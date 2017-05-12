<?php
  include_once"../conexion/conexion.php";
 

class Catalogo extends DBAbstractModel
{
	
	public $descripcion;
	public $costo_compra;
	public $costo_venta;
	public $fk_categoria;
	public $imagen;
	public $status;
	protected $pk_nombre_producto;

	function __construct()
	{
		$this -> DATABASE = 'cosecha';
	}

	public function get($catalogo=array())
	{
		if($catalogo !=''):
			$this -> query="SELECT pk_nombre_producto, descripcion, costo_compra, costo_venta, fk_categoria, imagen, status FROM catalogo WHERE pk_nombre_producto = '$catalogo' ";
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
		if(array_key_exists('pk_nombre_producto',$user_data)):
			$this -> get($user_data['pk_nombre_producto']);
			if($user_data['pk_nombre_producto'] != $this ->pk_nombre_producto):
				foreach($user_data as $campo => $valor):
					$$campo  = $valor;
				endforeach;
				$this -> query= "INSERT INTO catalogo(pk_nombre_producto, descripcion, costo_compra, costo_venta, fk_categoria, imagen,status) VALUES ('$pk_nombre_producto', '$descripcion', '$costo_compra', '$costo_venta', '$fk_categoria', '$imagen', '$status')";
				$this -> execute_single_query();
			endif;
		endif;
	}
	public function get_categoria($fk_categoria = "1")
	{
		
		//if (sizeof(array()) == "false" ) {
		//$this -> query = "UPDATE catalogo SET descripcion='$descripcion', costo_compra='$costo_compra', costo_venta='$costo_venta', fk_categoria='$fk_categoria' where fk_categoria = '$fk_categoria' ";}
          //  else{
			$this -> query = "SELECT pk_nombre_producto, descripcion, costo_compra, costo_venta, fk_categoria, imagen, status FROM catalogo WHERE fk_categoria= '$fk_categoria' ";//}
		
		$this -> execute_single_query();
	}


	public function edit($pk_nombre_producto = array())
	{
		foreach($pk_nombre_producto as $campo => $valor):
			$$campo = $valor;
		endforeach;
		//if (sizeof(array()) == "false" ) {
		//$this -> query = "UPDATE catalogo SET descripcion='$descripcion', costo_compra='$costo_compra', costo_venta='$costo_venta', fk_categoria='$fk_categoria' where pk_nombre_producto = '$pk_nombre_producto' ";}
          //  else{
			$this -> query = "UPDATE catalogo SET descripcion='$descripcion', costo_compra='$costo_compra', costo_venta='$costo_venta', fk_categoria='$fk_categoria' where pk_nombre_producto = '$pk_nombre_producto' ";//}
		
		$this -> execute_single_query();
	}

	public function edit_2($pk_nombre_producto = array())
	{
		foreach($pk_nombre_producto as $campo => $valor):
			$$campo = $valor;
		endforeach;
		
			$this -> query = "UPDATE catalogo SET status='$status' where pk_nombre_producto = '$pk_nombre_producto' ";//}
		
		$this -> execute_single_query();
	}

	public function edit_3($pk_nombre_producto = array())
	{
		foreach($pk_nombre_producto as $campo => $valor):
			$$campo = $valor;
		endforeach;
	
			$this -> query = "UPDATE catalogo SET imagen='$imagen' where pk_nombre_producto = '$pk_nombre_producto' ";//}
		
		$this -> execute_single_query();
	}

	public function delete($pk='')
	{
		$this -> query= "DELETE from catalogo where pk_nombre_producto= '$pk' ";
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