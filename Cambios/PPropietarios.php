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
	
	$datoBorrar=$rfc;
		print("Identificador: ".$datoBorrar);
		print("<br>");
		include("conexion.php");
		$Con= Conectar();
		$SQL = "DELETE FROM propietarios WHERE rfc = '$datoBorrar';"; //DE QUE TABLA Y CONDICION
		$Query = EjecutarConsulta($Con,$SQL);
		$Status = mysqli_affected_rows($Con);
		//print("<br>Estado: ".$Status."<br>");
		if($Status == -1){
			print("No se modifico nada");
		}elseif($Status == 0){
			print("No se encontro el dato");
		}else{
			
			//explicito
			$SQL= "INSERT INTO propietarios (Correo,Telefono,Direccion,Nombre,RFC) VALUES('$correo','$telefono','$direccion','$nombre','$rfc');";
			$Query = EjecutarConsulta($Con,$SQL);
			//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
			if($Query == 1){
				print("Registro modificado");
			}else{
				print("Pruebe de nuevo, error");
			}
			
		}
		print("<br>");
		Cerrar($Con);

	
	header("refresh:3;url=../menu.html");
?>