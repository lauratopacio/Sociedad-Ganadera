<?php 

include('conexion_combo.php');

class comboProveedores
{
	public $pk_tipo_proveedor;
	public $tipo_proveedor;

	function __construct($pk_tipo_proveedor, $tipo_proveedor)
	{
		$this->pk_tipo_proveedor=$pk_tipo_proveedor;
		$this->tipo_proveedor=$tipo_proveedor;
	}
}

function obtenerProveedores()
{
	$arreglo_proveedores = array();
	$sql = "SELECT pk_tipo_proveedor, tipo_proveedor from tipo_proveedor";

	$db = obtenerConexion();
	$result = ejecutarQuery($db, $sql);

	while($row=$result->fetch_assoc())
	{
		$row['tipo_proveedor'] = mb_convert_encoding($row['tipo_proveedor'], 'utf-8', mysqli_character_set_name($db));
		$proveedor = new comboProveedores($row['pk_tipo_proveedor'], $row['tipo_proveedor']);
		array_push($arreglo_proveedores, $proveedor);
	}

	cerrarConexion($db, $result);
	return $arreglo_proveedores;
}

 ?>