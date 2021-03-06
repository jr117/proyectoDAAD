<?php session_start(); ?>
<!-- FORMULARIO DE ELIMINACION -->
<!DOCTYPE html>
<html>
<head>
	<title>
		Eliminacion de Vehiculo <!-- QUE BORRARA -->
	</title>
</head>
<body>
	<div id="cont">
		<form id="form1" name="form1" method="post" action="">
			<label>id vehiculo</label> <!-- QUE PIDE -->
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
	//INCLUDES REQUERIDOS Y VALIDACION DE INICIO DE SESION
	include('../valida.php');
	include('../odbc.php');
	include('../creaCodigos.php');
	include('EvehiculosXML.php');
	include("conexion.php");
	valida();

	// VERIFICA QUE SE HAYA DADO UN DATO PARA BORRAR
	if(isset($_POST['datoBorrar'])){
		$datoBorrar=$_POST['datoBorrar'];
		$idVehiculo = $datoBorrar;
		print("Identificador: ".$datoBorrar);
		print("<br>");
		if ($datoBorrar==0) {
			print("Error, no se puede borrar este dato");
			exit();
		}
		
		//CONECTA A LA BD Y BORRA EL ELEMENTO, MANDA ERROR SI NO SE ENCONTRO DATO
		$Con= Conectar();
		$SQL = "DELETE FROM vehiculos WHERE idVehiculo = '$datoBorrar';"; //DE QUE TABLA Y CONDICION
		$Query = EjecutarConsulta($Con,$SQL);
		$Status = mysqli_affected_rows($Con);
		//print("<br>Estado: ".$Status."<br>");
		if($Status == -1){
			print("No se modifico nada");
		}elseif($Status == 0){
			print("No se encontro el dato");
		}else{
			// SI SE REALIZA CON EXITO, LO BORRA TAMBIEN DE LA TABLA ESPEJO
			odbc_exec($conexionODBC, $SQL);
			print("Se eliminaron ".$Status." registro(s)");
			print("<br>");
			Elimina($datoBorrar);
			print("Se elimino del XML");
		}
		print("<br>");
		Cerrar($Con);
		$contenidoCodigo = "ID Vehiculo:".$idVehiculo;
		$rutaCodigo = creaQR($contenidoCodigo);
		creaPdf($idVehiculo);
	}else{
		print("No se ha modificado nada aun");
	}

	//COMPROBANTE DE ELIMINACION DEL ELEMENTO
	function creaPdf($idVehiculo)
	{
		$html = '<!DOCTYPE html>
	<html>
	<head>
	  <meta charset="iso-8859-1" http-equiv="Content-Type" content="text/html">
	  <title>
	    
	  </title>
	</head>
	<body>
	  <header class="clearfix">
	    <div id="logo">
	      <img src="./images/logo.png">
	    </div>
	    <h1>VEHICULO</h1>
	    <div id="project">
	      <div><span>Empresa </span> Instituto Queretano de Transporte </div>     
	      <div><span>Direccion </span> Av Constituyentes 20, Centro, 76000 Santiago de Quer�taro, Qro.</div>
	      <div><span>E-mail </span> <a href="mailto:john@example.com">transporte@iqt.com</a></div>
	      <div><span>Fecha </span> '.date("d/m/Y").'</div>
	      <div><span>Telefono </span>01 442 210 0303</div>
	    </div>
	  </header>
	  <div>
	  	<h3>El vehiculo con id: '.$idVehiculo.'.  Se ha eliminado correctamente.</h3>
	  </div>
	</body>
	</html>';

	// CREACION DEL COMPROBANTE EN PDF Y GUARDADO
	require_once '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$css = file_get_contents('../cssPDF/style.css');
	$mpdf-> writeHTML($css,1);
	$mpdf->writeHTML(utf8_encode($html),\Mpdf\HTMLParserMode::DEFAULT_MODE);
	$mpdf->Output('..\temp\Vehiculo-'.$idVehiculo.'.pdf','F');
	}
	
	
 ?>