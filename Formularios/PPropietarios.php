<?php session_start(); ?>
<?php 
	include('../valida.php');
	valida();

	$rfc = $_POST['rfc'];
	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	
	print("RFC: " . $rfc . "<br>");
	print("Nombre: " . $nombre . "<br>");
	print("Direccion: " . $direccion . "<br>");
	print("Telefono: " . $telefono . "<br>");
	print("Correo: " . $correo . "<br>");

	include("conexion.php");
	$Con= Conectar();
	//explicito
	$SQL= "INSERT INTO propietarios (Correo,Telefono,Direccion,Nombre,RFC) VALUES('$correo','$telefono','$direccion','$nombre','$rfc');";
	$Query = EjecutarConsulta($Con,$SQL);
	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	if($Query == 1){
		print("Registro insertado");
	}else{
		print("Error, verifique que no exista la entrada y los tipos de dato sean correctos")
		exit();
	}
	Cerrar($Con);
	header("refresh:3;url=../menu.html");
?>