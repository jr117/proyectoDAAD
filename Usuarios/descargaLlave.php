<?php 
	session_start();
	include("conexion.php");
	$username = $_SESSION['username'];
	$con=Conectar();
	$sql="SELECT * FROM usuarios WHERE username='$username';";
	$query=EjecutarConsulta($con,$sql);
	$n=mysqli_num_rows($query);
	$fila=mysqli_fetch_row($query);
	$key=$fila[2];
	$dir = 'C:/keys/';
	if (!file_exists($dir)){
        mkdir($dir);
	}
	$nombre=$dir."key".$username.".txt";
	$manejador=fopen($nombre, "w");
	fwrite($manejador, $key);
	fclose($manejador);
	print_r("Su llave se descargo en ruta C:/keys <br>... sera reedirigido al menu");
	header("refresh:4;url=../menu.html");
 ?>