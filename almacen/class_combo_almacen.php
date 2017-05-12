<?php 

include('../proveedor/conexion_combo.php');

class Sucursales
{
	public $pk_sucursal;
	public $sucursal;

	function __construct($pk_sucursal, $sucursal)
	{
		$this->pk_sucursal=$pk_sucursal;
		$this->sucursal=$sucursal;
	}
}

class Productos
{
	public $pk_nombre_producto;

	function __construct($pk_nombre_producto)
	{
		$this->pk_nombre_producto=$pk_nombre_producto;
	}
	
}

class Proveedores
{
	public $pk_proveedor;
	public $nombre;

	function __construct($pk_proveedor, $nombre)
	{
		$this->pk_proveedor=$pk_proveedor;
		$this->nombre=$nombre;
	}
}


function obtenerSucursales()
{
	$arreglo_sucursal = array();
	$sql = "SELECT pk_sucursal, sucursal from sucursal order by sucursal ASC";

	$db = obtenerConexion();
	$result = ejecutarQuery($db, $sql);

	while($row=$result->fetch_assoc())
	{
		$row['sucursal'] = mb_convert_encoding($row['sucursal'], 'utf-8', mysqli_character_set_name($db));
		$sucu = new Sucursales($row['pk_sucursal'], $row['sucursal']);
		array_push($arreglo_sucursal, $sucu);
	}

	cerrarConexion($db, $result);
	return $arreglo_sucursal;
}

function obtenerProductos()
{
	$arreglo_producto = array();
	$sql = "SELECT pk_nombre_producto FROM catalogo";

	$db = obtenerConexion();
	$result = ejecutarQuery($db, $sql);

	while ($row=$result->fetch_assoc())
	{
		$row['pk_nombre_producto'] = mb_convert_encoding($row['pk_nombre_producto'], 'utf-8', mysqli_character_set_name($db));
		$pro = new Productos($row['pk_nombre_producto']);
		array_push($arreglo_producto, $pro);
	}
	cerrarConexion($db, $result);
	return $arreglo_producto;
}

function obtenerProveedores()
{
	$arreglo_proveedor = array();
	$sql = "SELECT pk_proveedor, nombre from proveedor order by nombre ASC";

	$db = obtenerConexion();
	$result = ejecutarQuery($db, $sql);

	while($row=$result->fetch_assoc())
	{
		$row['nombre'] = mb_convert_encoding($row['nombre'], 'utf-8', mysqli_character_set_name($db));
		$prov = new Proveedores($row['pk_proveedor'], $row['nombre']);
		array_push($arreglo_proveedor, $prov);
	}

	cerrarConexion($db, $result);
	return $arreglo_proveedor;
}

 ?>