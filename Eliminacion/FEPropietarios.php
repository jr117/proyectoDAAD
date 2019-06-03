<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Eliminacion de Propietario <!-- QUE BORRARA -->
	</title>
</head>
<body>
	<div id="cont">
		<form id="form1" name="form1" method="post" action="">
			<label>rfc propietario</label> <!-- QUE PIDE -->
			<input type="text" name="datoBorrar">
			<input class="boton" type="submit" name="Submit" value="Borrar" />
		</form>
	</div>
	

	<button class="boton" onclick="window.location = '../menu.html'">Regresar</button>
	<style type="text/css">
	#cont{
	  border-radius: 10px;
	  position: relative;
	  box-sizing: border-box;
	  display: flex;
	  justify-content: center;
	  align-items: center;
	  flex-wrap: wrap-reverse;
	  width: calc(100% - 20px);
	  height: 50px;
	  background-color: #75B3A6;
	  margin: 10px;
	}
	.boton{
	  border-radius: 5px;
	  background-color: #16293A;
	  border-color: white;
	  width: 130px;
	  height: 25px;
	  margin-left: 10px;
	  color: white;
	  font-size: 17px;
	  align-content: center;
	}
	label{
	  font-size: 1.5em;
	}
	</style>
</body>
</html>

<?php 
	include('../valida.php');
	valida();

	if(isset($_POST['datoBorrar'])){
		$datoBorrar=$_POST['datoBorrar'];
		print("Identificador: ".$datoBorrar);
		print("<br>");
		if ($datoBorrar==0) {
			print("Error, no se puede borrar este dato");
			exit();
		}
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
			print("Se eliminaron ".$Status." registro(s)");
		}
		print("<br>");
		Cerrar($Con);
	}else{
		print("No se ha modificado nada aun");
	}

 ?>