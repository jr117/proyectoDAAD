<?php
	//CIERRA SESION DE USUARIO
	session_start();
	session_unset();
	session_destroy();
	header("Location: FAcceso.html");
 ?>