<?php session_start(); ?>
<?php 
	include('C:\xampp\htdocs\DAAD2019262925\conexion.php');
	include('licenciaPdf.php');
	$Con = Conectar();
	//implicito
	$SQL = "SELECT * FROM licencias;";

	$query = EjecutarConsulta($Con,$SQL);

	//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
	$Status = mysqli_affected_rows($Con);
	//print("Estado: ".$Status."<br>");
	if($Status == -1){
		print("Pruebe de nuevo, error");
		exit;
	}else{
		//print("Consulta Correcta");
	}

	Cerrar($Con);
	//print("<br>");

	$re=mysqli_num_rows($query);
  	$x=0;
    for($a=0;$a<$re;$a++){
        $opcion=mysqli_fetch_row($query);
        $folio=$opcion[0];
        $nombreNacimiento=BuscaConductor($opcion[1]);
        $conductor=$nombreNacimiento[0];
        $fechaNac=$nombreNacimiento[1];
        $tipo=$opcion[2];
        $fExp=$opcion[3];
        $fVen=$opcion[4];
        print($folio." ".$conductor." ".$tipo." ".$fExp." ".$fVen." ".$fechaNac."<br>");
		//CreaLicencia($folio, $conductor, $tipo, $fExp, $fVen, $fechaNac);
		//CreaLicencia("$folio","$conductor","$tipo","$fExp","$fVen","$fechaNac");
		//break;
    }
    

    function BuscaConductor($rfc){
		$Con = Conectar();
		//implicito
		$SQL = "SELECT nombre, fechaNac FROM conductores WHERE rfc='$rfc';";

		$query = EjecutarConsulta($Con,$SQL);

		//VERIFICAR SI SE HICIERON CAMBIOS O HUBO ERROR
		$Status = mysqli_affected_rows($Con);
		//print("Estado: ".$Status."<br>");
		if($Status == -1){
			print("Pruebe de nuevo, error");
			exit;
		}else{
			//print("Consulta Correcta");
		}

		Cerrar($Con);

		$re=mysqli_num_rows($query);
		$opcion=mysqli_fetch_row($query);
	  	$x=0;
	  	return $opcion;
    }
 ?>