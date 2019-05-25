<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	include('verificacionesXML.php');
	$idVerificacion = $_POST['idVerificacion'];
	$vehiculo = $_POST['vehiculo'];
	$periodo = $_POST['periodo'];
	$centroVerificacion = $_POST['centroVerificacion'];
	$tipo = $_POST['tipo'];	
	$dictamen = $_POST['dictamen'];
	
	
	print("ID Verificacion: " . $idVerificacion . "<br>");
	print("Vehiculo: " . $vehiculo . "<br>");
	print("Periodo: " . $periodo . "<br>");
	print("Centro Verificador: " . $centroVerificacion . "<br>");
	print("Dictamen: " . $dictamen . "<br>");
	print("Tipo: " . $tipo . "<br>");


	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL= "INSERT INTO verificaciones VALUES('$idVerificacion','$vehiculo','$periodo','$centroVerificacion','$tipo','$dictamen');";
	$Query = EjecutarConsulta($Con,$SQL);
	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	if($Query == 1){
		print("Registro insertado");
		print("<br>");
		Incio($idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen);
		print("<br>XML actualizado");
	}else{
		print("Pruebe de nuevo, error");
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>