<?php session_start();?>
<?php 
	//INCLUDES REQUERIDOS
	include('../valida.php');
	include('../odbc.php');
	include('../creaCodigos.php');
	include('vehiculosXML.php');
	include('EvehiculosXML.php');
	valida();

	//SE GUARDAN LOS DATOS DEL FORMULARIO
	$idVehiculo = $_POST['idVehiculo'];
	$propietario = $_POST['propietario'];
	$placa = $_POST['placa'];
	$niv = $_POST['niv'];
	$tipo = $_POST['tipo'];
	$color = $_POST['color'];
	$uso = $_POST['uso'];
	$marca = $_POST['marca'];
	$numMotor = $_POST['numMotor'];
	$numSerie = $_POST['numSerie'];
	$modelo = $_POST['modelo'];
	$combustible = $_POST['combustible'];
	$ano = $_POST['ano'];
	$numeroCilindro = $_POST['numeroCilindro'];
	$transmision = $_POST['transmision'];
	$linea = $_POST['linea'];
	$origen = $_POST['origen'];
	$numPuerta = $_POST['numPuerta'];	
	
	print("id Vehiculo: " . $idVehiculo . "<br>");
	print("Propietario: " . $propietario . "<br>");
	print("Placa: " . $placa . "<br>");
	print("Niv: " . $niv . "<br>");
	print("Tipo: " . $tipo . "<br>");
	print("Color: " . $color . "<br>");
	print("Uso: " . $uso . "<br>");
	print("Marca: " . $marca . "<br>");
	print("NumMotor: " . $numMotor . "<br>");
	print("NumSerie: " . $numSerie . "<br>");
	print("Modelo: " . $modelo . "<br>");
	print("Combustible: " . $combustible . "<br>");
	print("A�o: " . $ano . "<br>");
	print("Cilindraje: " . $numeroCilindro . "<br>");
	print("Transmision: " . $transmision . "<br>");
	print("Linea: " . $linea . "<br>");
	print("Origen: " . $origen . "<br>");
	print("Numero de Puertas: " . $numPuerta . "<br>");	

	// SE GENERA EL CODIGO USADO EN EL COMPROBANTE
	$contenidoCodigo = "ID:".$idVehiculo." Propietario:".$propietario." Placa:".$placa;
	$rutaCodigo = creaQR($contenidoCodigo);

	//SE BUSCA Y BORRA EL REGISTRO ANTIGUO ANTES DE INSERTAR UNO NUEVO
	$datoBorrar=$idVehiculo;
	print("Identificador: ".$datoBorrar);
	print("<br>");
	include("conexion.php");
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
		//SI SE REALIZO EL BORRADO SE BORRA DE LA TABLA ESPEJO Y SE INSERTA EL NUEVO REGISTRO EN LA BD
		odbc_exec($conexionODBC, $SQL);
		//explicito
		$SQL= "INSERT INTO vehiculos (numPuerta,marca,numMotor,numSerie,modelo,combustible,ano,numeroCilindro,transmision,linea,origen,color,tipo,uso,placa,niv, propietario,idVehiculo) VALUES('$numPuerta','$marca','$numMotor','$numSerie','$modelo','$combustible','$ano','$numeroCilindro','$transmision','$linea','$origen','$color','$tipo','$uso','$placa','$niv','$propietario','$idVehiculo');";
		$Query = EjecutarConsulta($Con,$SQL);
		//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
		if($Query == 1){
			// SI SE INSERTA CON EXITO SE REALIZA LA INSERCION EN LA TABLA ESPEJO
			odbc_exec($conexionODBC, $SQL);
			print("Registro modificado");
			print("<br>");
			Elimina($idVehiculo);
			Incio($idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta);
			print("<br>XML actualizado");
		}else{
			print("Pruebe de nuevo, error");
		}
		
	}
	print("<br>");
	Cerrar($Con);
	
	//SE CREA EL COMPROBANTE
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
	      <img src="../images/logo.png">
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
	  <table>
	    <thead>
	      <tr>
	        <th class="service">ID</th>
	        <th class="desc">Propietario</th>
	        <th>Placa</th>
	        <th>Modelo</th>
	        <th>Color</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td class="service">'.$idVehiculo.'</td>
	        <td class="desc">'.$propietario.'</td>
	        <td class="unit">'.$placa.'</td>
	        <td class="qty">'.$modelo.'</td>	
	        <td class="total">'.$color.'</td>
	      </tr>
	    </tbody>
	  </table>
	  <div id="logo">
	    <img src="./temp/qr.png">
	  </div>
	</body>
	</html>';

	//SE GENERA EL PDF Y SE GUARDA SOBREESCRIBIENDO EL ANTIGUO
	require_once '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$css = file_get_contents('../cssPDF/style.css');
	$mpdf-> writeHTML($css,1);
	$mpdf->writeHTML(utf8_encode($html),\Mpdf\HTMLParserMode::DEFAULT_MODE);
	$mpdf->Output('..\temp\Vehiculo-'.$idVehiculo.'.pdf','F');
	header("refresh:3;url=../menu.html");
?>