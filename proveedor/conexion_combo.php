<?php 

function obtenerConexion()
{
	$db = new mysqli('localhost','root','','cosecha');

	if($db->connect_errno > 0 )
	{
		die('No es posible establecer la conexión con la base de datos ['.$db->connect_error.']');
	}
	return $db;
}

function cerrarConexion($db, $query)
{
	$query->free();
	$db->close();
}
function ejecutarQuery($db, $sql)
{
	if(!$resultado = $db->query($sql))
	{
		die('Error al ejecutar la consulta ['.$db->error.']');
	}
	return $resultado;
}

 ?>