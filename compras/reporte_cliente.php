<?php
require_once ("../clases/cls_cliente.php");
$obj_cliente = new asignatura();
$resultcli= $obj_cliente->reportePDF($_GET['id_cli'],$_GET['id_ped']);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<div>
		<center>
			<IMG src="../images/fon2.jpg" align="center" width="50%" height="90%">
		</center>
		<br>
	</div>

	<div>
		<center><h4>Comprobante</h4></center>
	</div>
		<br>
<div>
	<?php
	require_once ("../clases/cls_cliente.php");
	$obj_cliente = new asignatura ();
	$resultcli= $obj_cliente->consult($_GET['id_cli']);
	?>
<!-- 	Textos completos	
id_cli
nombre_cli
apellido_cli
usuario_cli
contrasenia_cli
telefono_cli
 -->
	<?php
	while($row= mysql_fetch_array($resultcli))
	{
		?> 
		<div>
			<label><span class="text-black"> Nombre del cliente: </span> </label>
			<input name="" style="text-transform: uppercase;"> <?php echo($row['nombre_cli']); ?> <?php echo($row['apellido_cli']); ?>
		</div>
		<div>
			<label><span class="text-black"> Dirrecion: </span> </label>
			<input name="" style="text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo($row['direccion_cli']); ?>

		</div>
		<div>
			<label><span class="text-black"> Telefono: </span> </label>
			<input name="" style="text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0<?php echo($row['telefono_cli']); ?>
		</div>

		<?php 
	}
	?>
	<?php
require_once("../clases/cls_pedido.php");
$obj_pedido= new pedido();
$row=$obj_pedido->consultarid_ped($_GET['id_ped']);
?>
<div>
	<label><span class="text-black"> Fecha del pedido: </span> </label>
	<input name="" style="text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($row['fecha_ped']); ?>
</div>
</div>

	<div>



<!-- <table  style="margin-left: 50px; background: #F5F3EE; border: solid 0.5px #F4F4F4 ;"border="1">  -->
<br><br><br>
<table border="0"style="height:8%;width:50%;" align="center">
	<?php                           
	require_once ("../clases/cls_detalle.php");
	$obj_detalle = new detalle ();
	$resultdeta= $obj_detalle->consulte($_GET['id_ped']);
	?>
	<tr style="background: #F4511E  ; color:#fff;">
		<td style="padding: 15px;">Nombre del producto </td>
		<td style="padding: 15px;">Cantidad</td>
		<td style="padding: 15px;">Total unitario</td>
	</tr>
	<?php
	while($row= mysql_fetch_array($resultdeta))
	{
		?>  
		<tr style=" text-align: center;">
			<td style="padding: 5px;"><?php echo($row['nombre_pro']); ?></td>
			<td style="padding: 5px;"><?php echo($row['cantidad_depe']); ?></td>
			<td style="padding: 5px;"><?php echo($row['sub_total_depe']); ?></td>
		</tr>
		<?php 

	}
	?> 
</table>
<br><br><br>
<?php
require_once("../clases/cls_pedido.php");
$obj_pedido= new pedido();
$row=$obj_pedido->consultarid_ped($_GET['id_ped']);
?>
<div>
	<label><span class="text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total: </span> </label>
	<input style="text-transform: uppercase;"> <?php echo($row['total_ped']); ?>
</div>
</div>




<?php
require_once '../pdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "comprobante.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
</body>


</html>


