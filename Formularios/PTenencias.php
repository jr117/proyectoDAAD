<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	$folio = $_POST['folio'];
	$vehiculo = $_POST['vehiculo'];
	$periodo = $_POST['periodo'];
	$fechaPago = $_POST['fechaPago'];
	$monto = $_POST['monto'];
	$antiguedad = $_POST['antiguedad'];
	$descuento = $_POST['descuento'];

	print("Folio: " . $folio . "<br>");
	print("Vehiculo: " . $vehiculo . "<br>");
	print("Periodo: " . $periodo . "<br>");
	print("Fecha Pago: " . $fechaPago . "<br>");
	print("Monto: " . $monto . "<br>");
	print("Antiguedad: " . $antiguedad . "<br>");
	print("Descuento: " . $descuento . "<br>");	


	include("conexion.php");
	$Con= Conectar();
	//explicito
	$SQL= "INSERT INTO tenencias (descuento,antiguedad,monto,fechaPago,periodo,vehiculo,folio) VALUES('$descuento','$antiguedad','$monto','$fechaPago','$periodo','$vehiculo','$folio');";
	$Query = EjecutarConsulta($Con,$SQL);
	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	if($Query == 1){
		print("Registro insertado");
	}else{
		print("Pruebe de nuevo, error");
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>