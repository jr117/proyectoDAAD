<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	$idReporte = $_POST['idReporte'];
	$vehiculo = $_POST['vehiculo'];
	$lugar = $_POST['lugar'];
	$fecha = $_POST['fecha'];
	$estado = $_POST['estado'];
	 
	print("Num Reporte: " . $idReporte . "<br>");
	print("Vehiculo: " . $vehiculo . "<br>");
	print("Lugar: " . $lugar . "<br>");
	print("Fecha: " . $fecha . "<br>");
	print("Status: " . $estado . "<br>");

	include("conexion.php");
	$Con= Conectar();
	//explicito
	$SQL= "INSERT INTO robos (estado,fecha,lugar,vehiculo,idReporte) VALUES('$estado','$fecha','$lugar','$vehiculo','$idReporte');";
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