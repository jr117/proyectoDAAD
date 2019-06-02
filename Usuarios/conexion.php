
<?php
	// CONECTA, EJECUTA QUERY Y CIERRA CONEXION
	function Conectar(){
		$parametros=parse_ini_file('..\configuracion.ini');
		$Servidor=$parametros["Server"];
		$User=$parametros["UserName"];
		$Password=$parametros["Password"];
		$DB=$parametros["DataBase"];
		$Con = mysqli_connect($Servidor,$User,$Password,$DB);
		return $Con;
	}
	function EjecutarConsulta($Con, $SQL){
		$Query=mysqli_query($Con,$SQL);//or die (mysqli_error($Con));
		return $Query;
	}
	function Cerrar($Con){
		mysqli_close($Con);
	}

	
?>