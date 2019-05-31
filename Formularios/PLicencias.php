<?php session_start(); ?>
<?php 
	
	include('../valida.php');
	include('../creaCodigos.php');
	include('licenciasXML.php');

	valida();

	$folio = $_POST['folio'];
	$conductor = $_POST['conductor'];
	$tipo = $_POST['tipo'];
	$fechaExpedicion = $_POST['fechaExpedicion'];
	$vigencia = $_POST['fechaVencimiento'];
	$estadoEmision = $_POST['estadoEmision'];

	$aux = explode('-', $fechaExpedicion);

	if ($vigencia == 3) {
		$aux[0] += 3;
	} else if ($vigencia == 5){
		$aux[0] += 5;
	}else{
		header("Location: ../errorFuera.html");
		exit();
	}

	if (strlen($aux[0])==1) {
		$fechaVencimiento = "000".$aux[0]."-".$aux[1]."-".$aux[2];
	} else if (strlen($aux[0])==2) {
		$fechaVencimiento = "00".$aux[0]."-".$aux[1]."-".$aux[2];
	}else if (strlen($aux[0])==3) {
		$fechaVencimiento = "0".$aux[0]."-".$aux[1]."-".$aux[2];
	}else if (strlen($aux[0])==4) {
		$fechaVencimiento = $aux[0]."-".$aux[1]."-".$aux[2];
	}
	
	
	$fechaVencimiento = "".$aux[0]."-".$aux[1]."-".$aux[2];
	
	print("Folio: " . $folio . "<br>");
	print("Conductor: " . $conductor . "<br>");
	print("Tipo de Licencia: " . $tipo . "<br>");
	print("Fecha de Expedicion: " . $fechaExpedicion . "<br>");
	print("Fecha de Vencimiento: " . $fechaVencimiento . "<br>");
	print("Estado de Emision: " . $estadoEmision . "<br>");

	$contenidoCodigo = "Folio:".$folio." Conductor:".$conductor." TipoLicencia:".$tipo;
	$rutaCodigo = creaQR($contenidoCodigo);

	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL = "INSERT INTO licencias VALUES('$folio','$conductor','$tipo','$fechaExpedicion','$fechaVencimiento','$estadoEmision');";
	$Query = EjecutarConsulta($Con,$SQL);

	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	$Status = mysqli_affected_rows($Con);
	print("Estado: ".$Status."<br>");
	if($Status == -1){
		print("Pruebe de nuevo, error");
		header("refresh:5;url=../menu.html");
		exit();
	}else{
		print("Registro insertado");
		print("<br>");
		Incio($folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision);
		print("<br>XML actualizado");
	}
	Cerrar($Con);
	
	// mPDF
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
    <h1>LICENCIA</h1>
    <div id="project">
      <div><span>Empresa </span> Instituto Queretano de Transporte </div>     
      <div><span>Direccion </span> Av Constituyentes 20, Centro, 76000 Santiago de Querétaro, Qro.</div>
      <div><span>E-mail </span> <a href="mailto:john@example.com">transporte@iqt.com</a></div>
      <div><span>Fecha </span> '.date("d/m/Y").'</div>
      <div><span>Telefono </span>01 442 210 0303</div>
    </div>
  </header>
  <table>
    <thead>
      <tr>
        <th class="service">Folio</th>
        <th class="desc">Conductor</th>
        <th>Tipo</th>
        <th>Fecha de Expedicion</th>
        <th>Fecha de Vencimiento</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="service">'.$folio.'</td>
        <td class="desc">'.$conductor.'</td>
        <td class="unit">'.$tipo.'</td>
        <td class="qty">'.$fechaExpedicion.'</td> 
        <td class="total">'.$fechaVencimiento.'</td>
      </tr>
    </tbody>
  </table>
  <div id="logo">
    <img src="./temp/qr.png">
  </div>
</body>
</html>';
	require_once '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$css = file_get_contents('../cssPDF/style.css');
	$mpdf-> writeHTML($css,1);
	$mpdf->writeHTML(utf8_encode($html),\Mpdf\HTMLParserMode::DEFAULT_MODE);
	
	$mpdf->Output('..\temp\Licencia-'.$folio.'.pdf','F');
	header("refresh:3;url=../menu.html");
?>