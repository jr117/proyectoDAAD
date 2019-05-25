<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	include('vehiculosXML.php');
	$idVehiculo = $_POST['idVehiculo'];
	$propietario = $_POST['propietario'];
	$placa = $_POST['placa'];
	$niv = $_POST['niv'];
	$tipo = $_POST['tipo'];
	$color = $_POST['color'];
	$uso = $_POST['uso'];
	$marca = $_POST['marca'];
	$numMotor = $_POST['numMotor'];
	$numSerie = $_POST['numSerie'];
	$modelo = $_POST['modelo'];
	$combustible = $_POST['combustible'];
	$ano = $_POST['ano'];
	$numeroCilindro = $_POST['numeroCilindro'];
	$transmision = $_POST['transmision'];
	$linea = $_POST['linea'];
	$origen = $_POST['origen'];
	$numPuerta = $_POST['numPuerta'];	
	
	print("id Vehiculo: " . $idVehiculo . "<br>");
	print("Propietario: " . $propietario . "<br>");
	print("Placa: " . $placa . "<br>");
	print("Niv: " . $niv . "<br>");
	print("Tipo: " . $tipo . "<br>");
	print("Color: " . $color . "<br>");
	print("Uso: " . $uso . "<br>");
	print("Marca: " . $marca . "<br>");
	print("NumMotor: " . $numMotor . "<br>");
	print("NumSerie: " . $numSerie . "<br>");
	print("Modelo: " . $modelo . "<br>");
	print("Combustible: " . $combustible . "<br>");
	print("Año: " . $ano . "<br>");
	print("Cilindraje: " . $numeroCilindro . "<br>");
	print("Transmision: " . $transmision . "<br>");
	print("Linea: " . $linea . "<br>");
	print("Origen: " . $origen . "<br>");
	print("Numero de Puertas: " . $numPuerta . "<br>");	


	include("conexion.php");
	$Con= Conectar();
	//explicito
	$SQL= "INSERT INTO vehiculos (numPuerta,marca,numMotor,numSerie,modelo,combustible,ano,numeroCilindro,transmision,linea,origen,color,tipo,uso,placa,niv, propietario,idVehiculo) VALUES('$numPuerta','$marca','$numMotor','$numSerie','$modelo','$combustible','$ano','$numeroCilindro','$transmision','$linea','$origen','$color','$tipo','$uso','$placa','$niv','$propietario','$idVehiculo');";
	$Query = EjecutarConsulta($Con,$SQL);
	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	if($Query == 1){
		print("Registro insertado");
		print("<br>");
		Incio($idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta);
		print("<br>XML actualizado");
	}else{
		print("Pruebe de nuevo, error");
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>