<?php session_start(); ?>
<?php 
	include('../valida.php');
	include('../creaCodigos.php');
	include('multasXML.php');
	valida();

	
	$folio = $_POST['folio'];

	$vehiculo = $_POST['vehiculo'];
	$verificacion = $_POST['verificacion'];
	$licencia = $_POST['licencia'];
	
	$descripcion = $_POST['descripcion'];
	$monto = $_POST['monto'];
	$fecha = $_POST['fecha'];
	$motivo = $_POST['motivo'];
	$emisor = $_POST['emisor'];
	$garantia = $_POST['garantia'];
	
	print("Folio: " . $folio . "<br>");
	print("Licencia: " . $licencia . "<br>");
	print("Vehiculo: " . $vehiculo . "<br>");
	print("Verificacion: " . $verificacion . "<br>");
	print("Motivo: " . $motivo . "<br>");
	print("Emisor: " . $emisor . "<br>");
	print("Fecha: " . $fecha . "<br>");
	print("Monto: " . $monto . "<br>");
	print("Descripcion: " . $descripcion . "<br>");
	print("Garantia: " . $garantia . "<br>");

	$rutaCodigo = creaBarra($folio);

	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL = "INSERT INTO multas VALUES('$folio','$vehiculo','$verificacion','$licencia','$descripcion','$monto','$fecha','$motivo','$emisor','$garantia');";
	$Query = EjecutarConsulta($Con,$SQL);

	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	$Status = mysqli_affected_rows($Con);
	print("Estado: ".$Status."<br>");
	if($Status == -1){
		print("Error, verifique que no exista la entrada y los tipos de dato sean correctos");
		exit();
	}else{
		print("Registro insertado");
		print("<br>");
		Incio($folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia);
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
    <h1>MULTA</h1>
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
        <th class="desc">Vehiculo</th>
        <th>Descripcion</th>
        <th>Monto</th>
        <th>Fecha de Emision</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="service">'.$folio.'</td>
        <td class="desc">'.$vehiculo.'</td>
        <td class="unit">'.$descripcion.'</td>
        <td class="qty">'.$monto.'</td> 
        <td class="total">'.$fecha.'</td>
      </tr>
    </tbody>
  </table>
  <div id="logo">
    <img src="./temp/cb.png">
  </div>
</body>
</html>';


	require_once '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$css = file_get_contents('../cssPDF/style.css');
	$mpdf-> writeHTML($css,1);
	$mpdf->writeHTML(utf8_encode($html),\Mpdf\HTMLParserMode::DEFAULT_MODE);
	$mpdf->Output('..\temp\Multa-'.$folio.'.pdf','F');
	header("refresh:3;url=../menu.html");
?>