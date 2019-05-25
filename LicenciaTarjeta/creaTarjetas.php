<?php session_start(); ?>
<?php 
	include('C:\xampp\htdocs\DAAD2019262925\conexion.php');
	include('tarjetaCirculacionPdf.php');
	$Con = Conectar();
	//implicito
	$SQL = "SELECT * FROM vehiculos;";

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
       	for($y=0;$y<18;$y++){
       		$opcion[$y]=strtoupper($opcion[$y]);
       	}
        $idVehiculo=$opcion[0];
        $rfc=$opcion[1];
        $propietario=BuscaPropietario($opcion[1]);//PROPIETARIO
        $propietario = strtoupper($propietario);
        $niv=$opcion[2];
        $placa=$opcion[3];
        $uso=$opcion[4];
        $tipo=$opcion[5];
        $color=$opcion[6];
        $origen=$opcion[7];
        $linea=$opcion[8];
        $transmision=$opcion[9];
        $numeroCilindro=$opcion[10];
        $ano=$opcion[11];
        $combustible=$opcion[12];
        $modelo=$opcion[13];
        $numSerie=$opcion[14];
        $numMotor=$opcion[15];
        $marca=$opcion[16];
        $numPuerta=$opcion[17];

		CreaTarjeta($tipo, $propietario, $rfc, $origen, $color, $numeroCilindro, $numPuerta, $combustible, $transmision, $numSerie, $idVehiculo, $placa, $modelo, $numMotor, $ano);
		break;
    }
    

    function BuscaPropietario($rfc){
		$Con = Conectar();
		//implicito
		$SQL = "SELECT nombre FROM propietarios WHERE rfc='$rfc';";

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
	  	return $opcion[0];
    }
 ?>