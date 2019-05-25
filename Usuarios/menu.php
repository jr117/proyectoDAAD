<?php 
	session_start();
	if ($_SESSION['validacion']) {
		print("Bienvenid@: ".$_SESSION['username']."<br>");
		header("refresh:3;url=../menu.html");
	}else{
		header("Location:FAcceso.html");
	}
	// print("<a href='cerrarSesion.php'>Cerrar Sesion</a>");	
 ?>