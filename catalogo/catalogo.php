<?php 
//sesion
session_start();
if(!isset($_SESSION["nombre"])){
  header("location:../index.php");
}



  include_once"../conexion/conexion.php";
  include ("class_combo_categoria.php");
include("class_catal.php");

$catalogoModelo = new catalogoModelo();
$a_catalogo = $catalogoModelo->get_catalogo();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mostrar Productor</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
   
     <link rel="stylesheet" type="text/css" href="../bootstrap/css/menuPaginas.css" media="screen" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<style>

  body{   
    background: url('../img/campo.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}
</style><body>
	
          
	<div class="container">
		<div class="row">
			<div class="col-12">
      <?php require('../menu/menu.php'); ?>
			</div>
		</div>
				
			
      
      <div class="jumbotron">

   <h1 align="center">Cat&aacutelogo</h1>
       </div>
  <?php require('menu_categoria.php') ?>


</body>
</html>




