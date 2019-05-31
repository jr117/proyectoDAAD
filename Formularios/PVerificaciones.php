<?php session_start(); ?>
<?php 
	include('../valida.php');
	include('verificacionesXML.php');
	valida();

	
	$idVerificacion = $_POST['idVerificacion'];
	$vehiculo = $_POST['vehiculo'];
	$periodo = $_POST['periodo'];
	$centroVerificacion = $_POST['centroVerificacion'];
	$tipo = $_POST['tipo'];	
	$dictamen = $_POST['dictamen'];
	
	
	print("ID Verificacion: " . $idVerificacion . "<br>");
	print("Vehiculo: " . $vehiculo . "<br>");
	print("Periodo: " . $periodo . "<br>");
	print("Centro Verificador: " . $centroVerificacion . "<br>");
	print("Dictamen: " . $dictamen . "<br>");
	print("Tipo: " . $tipo . "<br>");


	include("conexion.php");
	$Con= Conectar();
	//implicito
	$SQL= "INSERT INTO verificaciones VALUES('$idVerificacion','$vehiculo','$periodo','$centroVerificacion','$tipo','$dictamen');";
	$Query = EjecutarConsulta($Con,$SQL);
	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	if($Query == 1){
		print("Registro insertado");
		print("<br>");
		Incio($idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen);
		print("<br>XML actualizado");
	}else{
		print("Pruebe de nuevo, error");
		header("refresh:5;url=../menu.html");
		exit();
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
    <h1>VERIFICACION</h1>
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
        <th class="service">ID</th>
        <th class="desc">Vehiculo</th>
        <th>Periodo</th>
        <th>Centro Verificador</th>
        <th>Dictamen</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="service">'.$idVerificacion.'</td>
        <td class="desc">'.$vehiculo.'</td>
        <td class="unit">'.$periodo.'</td>
        <td class="qty">'.$centroVerificacion.'</td> 
        <td class="total">'.$dictamen.'</td>
      </tr>
    </tbody>
  </table>
</body>
</html>';
	require_once '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$css = file_get_contents('../cssPDF/style.css');
	$mpdf-> writeHTML($css,1);
	$mpdf->writeHTML(utf8_encode($html),\Mpdf\HTMLParserMode::DEFAULT_MODE);
	$mpdf->Output('..\temp\Verificacion-'.$idVerificacion.'.pdf','F');
	header("refresh:3;url=../menu.html");
?>