<?php 

  include_once"../conexion/conexion.php";
  
require_once('class_usuario.php');


$nom = $_REQUEST['nombre'];
$nombre =  strtolower($nom);

$ap = $_REQUEST['apellidop'];
$apellidop = strtolower($ap);

$am = $_REQUEST['apellidom'];
$apellidom = strtolower($am);

$us = $_REQUEST['user'];
$user = strtolower($us);

$ps = $_REQUEST['pass'];
$pass = strtolower($ps);

$fk_tipo_usuario = $_REQUEST['fk_tipo_usuario'];
$fk_sucursal = $_REQUEST['fk_sucursal'];


//Crear un nuevo cargo
$nuevo_usuario = array(
          'nombre' => $nombre,
					 'apellidop' => $apellidop,
           'apellidom' => $apellidom,
           'user' => $user,
           'pass' => $pass,
            'fk_tipo_usuario' => $fk_tipo_usuario,
           'fk_sucursal' => $fk_sucursal
           );


$cargo1 = new Usuario();
$cargo1 ->set($nuevo_usuario);
$cargo1 ->get($nuevo_usuario['nombre']);
echo "
	<meta charset='utf-8' http-equiv='refresh' content = '0 ; url=mostrar_usuario.php'>
	<script>
		alert('Registro exitoso');
	</script>
";

 ?>