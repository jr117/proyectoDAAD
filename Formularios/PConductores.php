<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	$dir = '../Files/';
	if (!file_exists($dir)){
        mkdir($dir);
	}

	$rfc = $_POST['rfc'];
	$nombre = $_POST['nombre'];
	$fechaNac = $_POST['fechaNac'];
	$domicilio = $_POST['domicilio'];
	$antiguedad = $_POST['antiguedad'];
	$sexo = $_POST['sexo'];
	$tipoSangre = $_POST['tipoSangre'];
	$restriccion = $_POST['restriccion'];
	$telEmergencia = $_POST['telEmergencia'];
	
	$foto = $_FILES["foto"]['tmp_name'];
	$firma = $_FILES["firma"]['tmp_name'];

	$filenameFoto = $rfc.'-Foto.png';
	$filenameFirma = $rfc.'-Firma.png';


	print("RFC: " . $rfc . "<br>");
	print("Nombre: " . $nombre . "<br>");
	print("Fecha de Nacimiento: " . $fechaNac . "<br>");
	print("Domicilio: " . $domicilio . "<br>");
	print("Antiguedad: " . $antiguedad . "<br>");
	print("Sexo: " . $sexo . "<br>");
	print("Tipo de Sangre: " . $tipoSangre . "<br>");
	print("Restriccion: " . $restriccion . "<br>");
	print("Telefono de Emergencia: " . $telEmergencia . "<br>");


	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL = "INSERT INTO conductores VALUES('$rfc','$nombre','$fechaNac','$filenameFirma','$domicilio','$antiguedad','$sexo','$tipoSangre','$restriccion','$telEmergencia');";
	$Query = EjecutarConsulta($Con,$SQL);
	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	$Status = mysqli_affected_rows($Con);
	print("Estado: ".$Status."<br>");
	if($Status == -1){
		print("Error, verifique que no exista la entrada y los tipos de dato sean correctos")
		exit();
	}else{
		print("Registro insertado");
		move_uploaded_file($_FILES["foto"]['tmp_name'], $dir.$filenameFoto);
		move_uploaded_file($_FILES["firma"]['tmp_name'], $dir.$filenameFirma);
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>