<?php
require_once("../dompdf/dompdf_config.inc.php");
include_once"../conexion/conec.php";


//BUSCAR LA MAXIMA COMPRA DE ESE USUARIO
$busca_maxima_compra_usuario="SELECT MAX(x.folio) as maximus, x.fecha_venta, y.nombre, y.apellidop, y.apellidom, y.rfc from entrega x, productor y where x.fk_productor=y.pk_productor";
$buscar_compra_maxi=$con->query($busca_maxima_compra_usuario);

while($row3=$buscar_compra_maxi->fetch_array())
{
 $pk_com=$row3['maximus'];
 $nombre2=$row3['nombre'];
 $apellidop=$row3['apellidop'];
 $apellidom=$row3['apellidom'];
 $rfc=$row3['rfc'];
 $fecha=$row3['fecha_venta'];
}

$query="SELECT pk_carrito,fk_venta,fk_nombre_producto, SUM(cantidad) as canti, costo_sugerido,SUM(subtotal) as sub FROM carrito where fk_venta='$pk_com' group by fk_nombre_producto";
    
    $resultado=$con->query($query); 


$querys="SELECT total_vendido FROM entrega where folio='$pk_com'";
    
    $resultado2=$con->query($querys); 
    while($row4=$resultado2->fetch_array())
{
 $tot=$row4['total_vendido'];

}

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Reporte de entrega</title>
</head>
<body>
	<table border="0" align="right">
		<tr>
			<th>Fecha: '.date('d-m-Y').'</th>
		</tr>
	</table>
	
	
	<table border="0" align="center">
		<tr>
			<th><img src="../imagenes/logo.jpg" width="130px"></th>
			<th  style="color:#fff;">esp</th>
			<th width="150" style=" color:#000;  font-size: 20px;"><b>Sociedad Ganadera</b>
				<br>
				el 20 S.P.R DE R.L
				<br>
			</th>

				<th   style="color:#fff;">esp</th>

			</tr>
		</table>
		

		<table align="center">
			<tr>
				<th style=" color:#0a6d13;  font-size: 22px;">Reporte De Entrega de Productos</th>
			</tr>
			<tr>';

			

				$codigoHTML.='
<th> Productor: '.$nombre2.' '.$apellidop.' '.$apellidop.'</th></tr> 
<tr><th> RFC: '.$rfc.' </th></tr>
';

			
			$codigoHTML.='
				</table>
		<br>
		<br>
		<table align="center" width="95%" border="0">
			<tr>
				<th  style="font-size: 18px;" bgcolor="#27AE60" width="50">Producto</th>
				<th  style="font-size: 18px;" bgcolor="#27AE60" width="1">Cantidad</th>
				<th  style="font-size: 18px;" bgcolor="#27AE60" width="1">Costo</th>
				<th  style="font-size: 18px;" bgcolor="#27AE60" width="1">Subtotal</th>
				
			</tr>';

			while($row=$resultado->fetch_assoc()){ 

				$codigoHTML.='
				<tr>
					
					<td style="font-size: 18px;" bgcolor="#D5F5E3">'.$row['fk_nombre_producto'].'</td>
					<td style="font-size: 18px;" bgcolor="#D5F5E3">'.$row['canti'].'</td>
					<td style="font-size: 18px;" bgcolor="#D5F5E3">'.$row['costo_sugerido'].'</td>
					<td style="font-size: 18px;" bgcolor="#D5F5E3">'.$row['sub'].'</td>
					
					
				</tr>';

			}

			$codigoHTML.='

<tr><th></th><th></th>
<th style="font-size: 18px;" bgcolor="#DC7633">TOTAL:</th>
<th style="font-size: 18px;" bgcolor="#DC7633">'.$tot.'</th>
</tr>
<tr>
<th style="font-size: 18px;" bgcolor="#CACFD2">FIRMA:</th>
<th style="font-size: 18px;" bgcolor="#D7DBDD" colspan="3"> </th> </th>
</tr>
';

			
			$codigoHTML.='
		</table>

	</body>
	</html>';


$codigoHTML=utf8_decode($codigoHTML); //formato de caracter utf-8
	$dompdf=new DOMPDF(); // se declara que sera un dompdf
	$dompdf->load_html($codigoHTML);
	$dompdf->set_paper ('a4','landscape'); 

	ini_set("memory_limit","128M");
	$dompdf->render();
	$dompdf->stream("Reporte_entregas.pdf");

	?>