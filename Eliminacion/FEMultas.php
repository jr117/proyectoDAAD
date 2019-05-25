<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Eliminacion de Multa <!-- QUE BORRARA -->
	</title>
</head>
<body>
	<form id="form1" name="form1" method="post" action="">
		<label>folio multa</label> <!-- QUE PIDE -->
		<input type="text" name="datoBorrar">
		<input type="submit" name="Submit" value="Borrar" />
	</form>

	<button onclick="window.location = '../menu.html'">Regresar</button>
</body>
</html>

<?php 
	include('../valida.php');
	valida();

	if(isset($_POST['datoBorrar'])){
		$datoBorrar=$_POST['datoBorrar'];
		print("Identificador: ".$datoBorrar); //DATO
		print("<br>");
		include("conexion.php");
		$Con= Conectar();
		$SQL = "DELETE FROM multas WHERE folio = '$datoBorrar';"; //DE QUE TABLA Y CONDICION
		$Query = EjecutarConsulta($Con,$SQL);
		$Status = mysqli_affected_rows($Con);
		//print("<br>Estado: ".$Status."<br>");
		if($Status == -1){
			print("No se modifico nada");
		}elseif($Status == 0){
			print("No se encontro el dato");
		}else{
			print("Se eliminaron ".$Status." registro(s)");
		}
		print("<br>");
		Cerrar($Con);
	}else{
		print("No se ha modificado nada aun");
	}

 ?>