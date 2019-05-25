<?php 
	session_start();

	include("conexion.php");
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$key = $_REQUEST['key'];
	print($username."<br>");
	printf("<br>");
	if ($password == "" or $key== "") {
		print("Todos los campos son requeridos");
		header("refresh:2;url=menu.php");
	}
	$con=Conectar();
	$sql="SELECT * FROM usuarios WHERE username='$username';";
	$query=EjecutarConsulta($con,$sql);
	$n=mysqli_num_rows($query);
	//print($n);
	printf("<br>");
	if ($n==0) {
		//print("El usuario no existe");
		header("refresh:2;url=menu.php");
	}else {
		//Validar contraseña
		$fila=mysqli_fetch_row($query);
		if ($password==$fila[1]) {
			if ($fila[4]==1) {
				print("Acceso Correcto");
				printf("<br>");
				print("Tipo de usuario: ".$fila[2]);
				$sqlu="UPDATE usuarios SET intento=0 WHERE username='$username';";
				$query=EjecutarConsulta($con,$sqlu);

				$_SESSION['username']=$username;
				$_SESSION['validacion']=true;
				header("Location:menu.php");

			} else {
				print("Usuario Bloqueado");
				header("refresh:2;url=menu.php");
			}
		} else {
			print("Acceso Incorrecto");
			$sqlu="UPDATE usuarios SET intento=intento+1 WHERE username='$username';";
			$query=EjecutarConsulta($con,$sqlu);
			if ($fila[4]==2 or $fila[4]>2) {
				$sqlu="UPDATE usuarios SET estado=0 WHERE username='$username';";
				$query=EjecutarConsulta($con,$sqlu);
			}
			header("refresh:2;url=menu.php");
			
		}
				
	}
	




	Cerrar($con);
?>
