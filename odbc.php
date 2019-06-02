<?php
	//REALIZA LA CONEXION CON LA BASE DE DATOS ESPEJO POR ODBC
	$parametros=parse_ini_file('configuracion.ini');

	$dns=$parametros["ODBCdns"];
	$usuario=$parametros["ODBCuser"];
	$contraseña=$parametros["ODBCpass"];

	$dsnmysql = $dns;
	$usermysql = $usuario;
	$passwordmysql = $contraseña;

	$conexionODBC = odbc_connect($dsnmysql, $usermysql, $passwordmysql);
 ?>