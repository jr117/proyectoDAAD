<?php session_start(); ?>
<?php 
	
	//CreaTarjeta(1,1,1,1,1,1,1,1,1,1,1,1,1,1);


	function ReordenaNombre($nombre){
		$list = explode(" ", $nombre);
		$nombre="";
		if(sizeof($list)==4) {
			$nombre=$list[2]." ".$list[3]." ".$list[0]." ".$list[1];
		}elseif(sizeof($list)==3){
			$nombre=$list[1]." ".$list[2]." ".$list[0];
		}elseif(sizeof($list)==2){
			$nombre=$list[1]." ".$list[0];
		}elseif(sizeof($list)==1){
			$nombre=$list[0];
		}
		return $nombre;
	}

	function TresDig($numMotor){
		return $numMotor[-3].$numMotor[-2].$numMotor[-1];
	}

	function CreaTarjeta($tipo, $propietario, $rfc, $origen, $color, $numeroCilindro, $numPuerta, $combustible, $transmision, $numSerie, $idVehiculo, $placa, $modelo, $numMotor, $ano){
		
		$fechaEx=date("d") . "/" . date("m") . "/" . date("Y");
		$nombre = ReordenaNombre($propietario);
		$td=TresDig($numMotor);

		require 'C:\xampp\htdocs\fpdf\fpdf.php' ;
		$pdf= new FPDF();
		$pdf->AddPage('L');
		$pdf->SetAutoPageBreak(false);

		//BASE DE TARJETA
		$pdf->SetY(0,true);
		$pdf->SetXY(10,140);
		$pdf->Image('Pictures\peq.jpg',null,null,75,30);
		$pdf->SetXY(95,140);
		$pdf->Image('Pictures\qro.png',null,null,70,30);
		$pdf->SetXY(170,140);
		$pdf->Image('Pictures\spf.png',null,null,75,30);
		$pdf->SetFillColor(0,0,117);
		$pdf->SetFont('Arial','B','24');
		$pdf->SetXY(50,180);
		$pdf->SetFillColor(0,0,117);
		$pdf->Cell(200,20,'TARJETA DE CIRCULACION VEHICULAR 2019',1,0,'C');


		//CUADRO DE INFORMACION
		$pdf->SetXY(10,10);
		$pdf->Cell(275,125,'',1,0,'C');


		//INFORMACION BASE
		$pdf->SetFont('Arial','','12');
		$pdf->SetXY(30,10);
		$pdf->Cell(30,22,'TIPO DE SERVICIO',0,0,'L');
		
		$pdf->SetXY(30,22);
		$pdf->Cell(30,22,'PROPIETARIO',0,0,'L');

		$pdf->SetXY(130,10);
		$pdf->Cell(30,22,'HOLOGRAMA',0,0,'L');

		$pdf->SetXY(170,10);
		$pdf->Cell(30,22,'FOLIO',0,0,'L');

		$pdf->SetXY(230,10);
		$pdf->Cell(30,22,'PLACA',0,0,'L');


				//FILA 1
		$pdf->SetXY(30,40);
		$pdf->Cell(30,22,'RFC',0,0,'L');

		$pdf->SetXY(30,50);
		$pdf->Cell(30,22,'LOCALIDAD',0,0,'L');

		$pdf->SetXY(30,65);
		$pdf->Cell(30,22,'MUNICIPIO',0,0,'L');

		$pdf->SetFont('Arial','','12');
		$pdf->SetXY(30,83);
		$pdf->Cell(30,22,'NUMERO DE CONSTANCIA',0,0,'L');
		$pdf->SetXY(30,87);
		$pdf->Cell(30,22,'DE INSCRIPCION (NCI)',0,0,'L');

		$pdf->SetXY(30,100);
		$pdf->Cell(30,22,'ORIGEN',0,0,'L');

		$pdf->SetXY(30,110);
		$pdf->Cell(30,22,'COLOR',0,0,'L');

				//FILA 2
		$pdf->SetFont('Arial','','13');
		$pdf->SetXY(110,40);
		$pdf->Cell(30,22,'NUMERO DE SERIE',0,0,'L');

		$pdf->SetFont('Arial','','12');
		$pdf->SetXY(110,80);
		$pdf->Cell(30,22,'CILINDRAJE',0,0,'L');

		$pdf->SetXY(110,86);
		$pdf->Cell(30,22,'CAPACIDAD',0,0,'L');

		$pdf->SetXY(110,92);
		$pdf->Cell(30,22,'PUERTAS',0,0,'L');

		$pdf->SetXY(110,98);
		$pdf->Cell(30,22,'ASIENTOS',0,0,'L');

		$pdf->SetXY(110,104);
		$pdf->Cell(30,22,'COMBUSTIBLE',0,0,'L');

		$pdf->SetXY(110,110);
		$pdf->Cell(30,22,'TRANSMISION',0,0,'L');
	    
	            //FILA 3
		$pdf->SetFont('Arial','','12');
		$pdf->SetXY(155,80);
		$pdf->Cell(30,22,'CVE. VEHICULAR',0,0,'L');

		$pdf->SetXY(155,92);
		$pdf->Cell(30,22,'CLASE',0,0,'L');

		$pdf->SetXY(155,98);
		$pdf->Cell(30,22,'TIPO',0,0,'L');

		$pdf->SetXY(155,104);
		$pdf->Cell(30,22,'REC',0,0,'L');

		$pdf->SetXY(155,110);
		$pdf->Cell(30,22,'RFA',0,0,'L');

	            //FILA 4
	    $pdf->SetFont('Arial','','12');
		$pdf->SetXY(210,40);
		$pdf->Cell(30,22,'MODELO',0,0,'L');

		$pdf->SetXY(210,50);
		$pdf->Cell(30,22,'OPERACION',0,0,'L');

		$pdf->SetXY(210,60);
		$pdf->Cell(30,22,'FOLIO',0,0,'L');

		$pdf->SetXY(210,70);
		$pdf->Cell(30,22,'PLACA ANT.',0,0,'L');

		$pdf->SetXY(210,80);
		$pdf->Cell(30,22,'FECHA DE EXPEDICION',0,0,'L');

		$pdf->SetXY(210,90);
		$pdf->Cell(30,22,'OFICINA EXPEDIDORA',0,0,'L');

		$pdf->SetXY(210,95);
		$pdf->Cell(30,22,'MOVIMIENTO',0,0,'L');
	    
	    $pdf->SetXY(210,105);
		$pdf->Cell(30,22,'NUMERO DE MOTOR',0,0,'L');














		//INFO PERSONAL
		$pdf->SetFont('Arial','B','20');
		$pdf->SetXY(30,16);
		$pdf->Cell(30,22,'PARTICULAR',0,0,'L');

		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(170,16);
		$pdf->Cell(30,22,"$idVehiculo",0,0,'L');

		$pdf->SetXY(230,16);
		$pdf->Cell(30,22,"$ano"."/"."$placa",0,0,'L');

		$pdf->SetXY(65,22);
		$pdf->Cell(30,22,"$nombre",0,0,'L');

				//FILA 1
		$pdf->SetXY(30,45);
		$pdf->Cell(30,22,"$rfc",0,0,'L');

		$pdf->SetXY(30,55);
		$pdf->Cell(30,22,'SANTIAGO DE',0,0,'L');
		$pdf->SetXY(30,60);
		$pdf->Cell(30,22,'QUERETARO',0,0,'L');

		$pdf->SetXY(30,70);
		$pdf->Cell(30,22,'QUERETARO',0,0,'L');

		$pdf->SetXY(30,105);
		$pdf->Cell(30,22,"$origen",0,0,'L');

		$pdf->SetXY(30,115);
		$pdf->Cell(30,22,"$color",0,0,'L');

				//FILA 2
	    $pdf->SetFont('Arial','B','15');
		$pdf->SetXY(110,45);
		$pdf->Cell(30,22,'NO SE QUE DICE',0,0,'L');
		$pdf->SetXY(110,50);
		$pdf->Cell(30,22,'AQUI, NO ALCANZO',0,0,'L');
		$pdf->SetXY(110,55);
		$pdf->Cell(30,22,'A VER PORQUE NO',0,0,'L');
		$pdf->SetXY(110,60);
		$pdf->Cell(30,22,'SOY DE QUERETARO',0,0,'L');

	    $pdf->SetXY(145,80);
		$pdf->Cell(30,22,"$numeroCilindro",0,0,'L');

	    $pdf->SetXY(145,86);
		$pdf->Cell(30,22,'0',0,0,'L');

	    $pdf->SetXY(145,92);
		$pdf->Cell(30,22,"$numPuerta",0,0,'L');
	    
	    $pdf->SetXY(145,98);
		$pdf->Cell(30,22,'5',0,0,'L');

	    $pdf->SetXY(145,104);
		$pdf->Cell(30,22,"$combustible",0,0,'L');
	    
	    $pdf->SetXY(110,115);
		$pdf->Cell(30,22,"$transmision",0,0,'L');

	            //FILA 3
		$pdf->SetXY(165,86);
		$pdf->Cell(30,22,"$numSerie",0,0,'L');

	    $pdf->SetXY(180,92);
		$pdf->Cell(30,22,'1',0,0,'L');

		$pdf->SetXY(180,98);
		$pdf->Cell(30,22,"$tipo",0,0,'L');

		$pdf->SetXY(180,104);
		$pdf->Cell(30,22,'36',0,0,'L');

		$pdf->SetXY(180,110);
		$pdf->Cell(30,22,'',0,0,'L');

	            //FILA 4
		$pdf->SetXY(210,45);
		$pdf->Cell(30,22,"$modelo",0,0,'L');

		$pdf->SetXY(210,55);
		$pdf->Cell(30,22,'12ASD6C2',0,0,'L');

		$pdf->SetXY(210,65);
		$pdf->Cell(30,22,"$idVehiculo",0,0,'L');
	    
		$pdf->SetXY(210,75);
		$pdf->Cell(30,22,'',0,0,'L');

		$pdf->SetXY(210,85);
		$pdf->Cell(30,22,"$fechaEx",0,0,'L');

		$pdf->SetXY(260,90);
		$pdf->Cell(30,22,'1',0,0,'L');

		$pdf->SetXY(210,100);
		$pdf->Cell(30,22,'TARJETA DE CIRCULACI',0,0,'L');

		$pdf->SetXY(210,110);
		$pdf->Cell(30,22,"$numMotor",0,0,'L');

	    



		//ULTIMOS 3 DIGITOS
		$pdf->SetFont('Arial','B','45');
		$pdf->SetXY(255,150);
		$pdf->Cell(30,22,"$TresDig",1,0,'C');



		$pdf->Output();	
	}
	
 ?>