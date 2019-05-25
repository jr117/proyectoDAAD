<?php session_start(); ?>
<?php 

	include('../valida.php');
	valida();

	
	include('licenciasXML.php');
	$folio = $_POST['folio'];
	$conductor = $_POST['conductor'];
	$tipo = $_POST['tipo'];
	$fechaExpedicion = $_POST['fechaExpedicion'];
	$vigencia = $_POST['fechaVencimiento'];
	$estadoEmision = $_POST['estadoEmision'];

	$aux = explode('-', $fechaExpedicion);

	if ($vigencia == 3) {
		$aux[0] += 3;
	} else if ($vigencia == 5){
		$aux[0] += 5;
	}else{
		header("Location: ../errorFuera.html");
		exit();
	}

	if (strlen($aux[0])==1) {
		$fechaVencimiento = "000".$aux[0]."-".$aux[1]."-".$aux[2];
	} else if (strlen($aux[0])==2) {
		$fechaVencimiento = "00".$aux[0]."-".$aux[1]."-".$aux[2];
	}else if (strlen($aux[0])==3) {
		$fechaVencimiento = "0".$aux[0]."-".$aux[1]."-".$aux[2];
	}else if (strlen($aux[0])==4) {
		$fechaVencimiento = $aux[0]."-".$aux[1]."-".$aux[2];
	}
	
	
	$fechaVencimiento = "".$aux[0]."-".$aux[1]."-".$aux[2];
	
	print("Folio: " . $folio . "<br>");
	print("Conductor: " . $conductor . "<br>");
	print("Tipo de Licencia: " . $tipo . "<br>");
	print("Fecha de Expedicion: " . $fechaExpedicion . "<br>");
	print("Fecha de Vencimiento: " . $fechaVencimiento . "<br>");
	print("Estado de Emision: " . $estadoEmision . "<br>");



	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL = "INSERT INTO licencias VALUES('$folio','$conductor','$tipo','$fechaExpedicion','$fechaVencimiento','$estadoEmision');";
	$Query = EjecutarConsulta($Con,$SQL);

	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	$Status = mysqli_affected_rows($Con);
	print("Estado: ".$Status."<br>");
	if($Status == -1){
		print("Pruebe de nuevo, error");
	}else{
		print("Registro insertado");
		print("<br>");
		Incio($folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision);
		print("<br>XML actualizado");
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>