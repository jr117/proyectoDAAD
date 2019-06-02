<?php 
	//CONECTA CON BASE DE DATOS
	session_start();
	include("conexion.php");
	$username = $_SESSION['username'];
	$con=Conectar();
	//BUSCA EL USUARIO ACTIVO
	$sql="SELECT * FROM usuarios WHERE username='$username';";
	$query=EjecutarConsulta($con,$sql);
	$n=mysqli_num_rows($query);
	$fila=mysqli_fetch_row($query);
	// BUSCA LA LLAVE DEL USUARIO
	$key=$fila[2];
	$dir = 'C:/keys/';
	if (!file_exists($dir)){
        mkdir($dir);
	}
	$nombre=$dir."key".$username.".txt";
	$manejador=fopen($nombre, "w");
	// DESCARGA LA LLAVE EN CARPETA PREDETERMINADA
	fwrite($manejador, $key);
	fclose($manejador);
	print_r("Su llave se descargo en ruta C:/keys <br>... sera reedirigido al menu");
	header("refresh:4;url=../menu.html");
 ?>