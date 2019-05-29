<?php session_start(); ?>
<?php 
	include('../valida.php');
	require('../lib/pdf/mpdf.php');
	valida();

	include('verificacionesXML.php');
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
	}
	Cerrar($Con);
	// mPDF
	$html = '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<header class="clearfix">
      <div id="logo">
        <img src="./images/logo.png">
      </div>
      <h1>VERIFICACIONES</h1>
      <div id="project">
        <div><span>Empresa</span> Instituto Queretano de Transporte </div>     
        <div><span>Direccion</span>Av Constituyentes 20, Centro, 76000 Santiago de Querétaro, Qro.</div>
        <div><span>E-mail</span> <a href="mailto:john@example.com">transporte@iqt.com</a></div>
        <div><span>Centro de verificacion:'.$color.' </span></div>
        <div><span>Telefono</span>01 442 210 0303</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Id</th>
            <th class="desc">Vehiculo</th>
            <th>Periodo</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">'.$idVerificacion.'</td>
            <td class="desc">'.$vehiculo.'</td>
            <td class="unit">'.$periodo.'</td>
            <td class="qty">'.$tipo.'</td>	
          </tr>
        </tbody>
      </table>
    </main>';
$mpdf = new mPDF('c','A4');
$css = file_get_contents('../cssPDF/style.css');
$mpdf-> writeHTML($css,1);
$mpdf->writeHTML(utf8_encode($html));
$mpdf->Output('..\temp\Verificacion-'.$idVerificacion.'.pdf','F');

?>