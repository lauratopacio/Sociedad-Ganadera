<?php 

include('conexion_combo.php');

class Proveedores
{
	public $pk_categoria;
	public $categoria;

	function __construct($pk_categoria, $categoria)
	{
		$this->pk_categoria=$pk_categoria;
		$this->categoria=$categoria;
	}
}

function obtenerProveedores()
{
	$arreglo_proveedores = array();
	$sql = "SELECT pk_sucursal, sucursal from sucursal";

	$db = obtenerConexion();
	$result = ejecutarQuery($db, $sql);

	while($row=$result->fetch_assoc())
	{
		$row['pk_sucursal'] = mb_convert_encoding($row['pk_sucursal'], 'utf-8', mysqli_character_set_name($db));
		$proveedor = new Proveedores($row['pk_sucursal'], $row['sucursal']);
		array_push($arreglo_proveedores, $proveedor);
	}

	cerrarConexion($db, $result);
	return $arreglo_proveedores;
}

 ?>