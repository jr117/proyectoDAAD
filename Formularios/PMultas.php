<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	include('multasXML.php');
	$folio = $_POST['folio'];

	$vehiculo = $_POST['vehiculo'];
	$verificacion = $_POST['verificacion'];
	$licencia = $_POST['licencia'];
	
	$descripcion = $_POST['descripcion'];
	$monto = $_POST['monto'];
	$fecha = $_POST['fecha'];
	$motivo = $_POST['motivo'];
	$emisor = $_POST['emisor'];
	$garantia = $_POST['garantia'];
	
	print("Folio: " . $folio . "<br>");
	print("Licencia: " . $licencia . "<br>");
	print("Vehiculo: " . $vehiculo . "<br>");
	print("Verificacion: " . $verificacion . "<br>");
	print("Motivo: " . $motivo . "<br>");
	print("Emisor: " . $emisor . "<br>");
	print("Fecha: " . $fecha . "<br>");
	print("Monto: " . $monto . "<br>");
	print("Descripcion: " . $descripcion . "<br>");
	print("Garantia: " . $garantia . "<br>");

	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL = "INSERT INTO multas VALUES('$folio','$vehiculo','$verificacion','$licencia','$descripcion','$monto','$fecha','$motivo','$emisor','$garantia');";
	$Query = EjecutarConsulta($Con,$SQL);

	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	$Status = mysqli_affected_rows($Con);
	print("Estado: ".$Status."<br>");
	if($Status == -1){
		print("Pruebe de nuevo, error");
	}else{
		print("Registro insertado");
		print("<br>");
		Incio($folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia);
		print("<br>XML actualizado");
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>