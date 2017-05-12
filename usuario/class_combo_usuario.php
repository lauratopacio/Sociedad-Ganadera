<?php 

include('../proveedor/conexion_combo.php');

class tipoUsuario
{
	public $pk_tipo_usuario;
	public $tipo;

	function __construct($pk_tipo_usuario, $tipo)
	{
		$this->pk_tipo_usuario=$pk_tipo_usuario;
		$this->tipo=$tipo;
	}
}

class Sucursal
{
	public $pk_sucursal;

	function __construct($pk_sucursal, $sucursal)
	{
		$this->pk_sucursal=$pk_sucursal;
		$this->sucursal=$sucursal;

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
		$sucu = new Sucursal($row['pk_sucursal'], $row['sucursal']);
		array_push($arreglo_sucursal, $sucu);
	}

	cerrarConexion($db, $result);
	return $arreglo_sucursal;
}


function obtenerTipoUsuario()
{
	$arreglo_usuario = array();
	$sql = "SELECT pk_tipo_usuario, tipo from tipo_usuario";

	$db = obtenerConexion();
	$result = ejecutarQuery($db, $sql);

	while($row=$result->fetch_assoc())
	{
		$row['tipo'] = mb_convert_encoding($row['tipo'], 'utf-8', mysqli_character_set_name($db));
		$usu = new tipoUsuario($row['pk_tipo_usuario'], $row['tipo']);
		array_push($arreglo_usuario, $usu);
	}

	cerrarConexion($db, $result);
	return $arreglo_usuario;
}

 ?>