<?php session_start(); ?>
<?php 
	//CreaLicencia(1231,'Luis Rodriguez Cardenas',"A",'12/12/1212','12/12/1222','12/12/1999');

	function SeparaNombre($nombre){
		$list = explode(" ", $nombre);
		return $list;
	}

	function CreaLicencia($folio, $conductor, $tipo, $fExp, $fVen, $fechaNac){

		$nombre = SeparaNombre($conductor);

		require 'C:\xampp\htdocs\fpdf\fpdf.php' ;
		$pdf= new FPDF();
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(false);


		//LOGO
		$pdf->SetY(0,true);
		$pdf->SetXY(10,10);
		$pdf->Image('Pictures\pe.jpg',null,null,50,43);
		

		//ENCABEZADO
		$pdf->SetFont('Arial',null,'20');
		$x=$pdf->GetX();
		$pdf->SetXY(55,7);
		$pdf->Cell(100,20,'Estados Unidos Mexicanos',0,1,'L');
		$pdf->SetXY(55,16);
		$pdf->Cell(100,20,'Poder Ejecutivo del Estado de Queretaro',0,0,'L');
		$pdf->SetFont('Arial','B','20');
		$pdf->SetXY(55,28);
		$pdf->Cell(100,20,'Secretaria de Seguridad Ciudadana',0,0,'L');
		$pdf->SetXY(55,37);
		$pdf->Cell(100,20,'Licencia para conducir',0,0,'L');


		//FOTO
		$pdf->SetY(0,true);
		$pdf->SetXY(140,60);
		$pdf->Image('Pictures\Koala.jpg',null,null,60,75);


		//NO LICENCIA
		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(125,100);
		$pdf->Cell(10,20,'No. de Licencia',0,0,'R');
		$pdf->SetFont('Arial','B','30');
		$pdf->SetXY(125,110);
		$pdf->Cell(10,20,"$folio",0,0,'R');
		$pdf->SetFont('Arial','B','17');
		$pdf->SetXY(125,120);
		$pdf->Cell(10,20,'Clase Chofer Particular',0,0,'R');


		//NOMBRE
		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(190,130);
		$pdf->Cell(10,20,'Nombre',0,0,'R');
		$pdf->SetFont('Arial',null,'35');
		$pdf->SetXY(190,140);

		if(isset($nombre[2])){
			$pdf->Cell(10,20,"$nombre[1]",0,0,'R');
		}else{
			$pdf->Cell(10,20,'',0,0,'R');
		}
		$pdf->SetXY(190,152.5);
		if(isset($nombre[1])){
			$pdf->Cell(10,20,"$nombre[2]",0,0,'R');
		}else{
			$pdf->Cell(10,20,'',0,0,'R');
		}
		
		$pdf->SetFont('Arial','B','35');
		$pdf->SetXY(190,165);
		$pdf->Cell(10,20,"$nombre[0]",0,0,'R');


		//DATOS
		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(10,180);
		$pdf->Cell(10,20,'Fecha de Nacimiento',0,0,'L');
		$pdf->SetFont('Arial',null,'30');
		$pdf->SetXY(10,188);
		$pdf->Cell(10,20,"$fechaNac",0,0,'L');

		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(10,197);
		$pdf->Cell(10,20,'Fecha de Expedicion',0,0,'L');
		$pdf->SetFont('Arial',null,'30');
		$pdf->SetXY(10,205);
		$pdf->Cell(10,20,"$fExp",0,0,'L');

		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(10,214);
		$pdf->Cell(10,20,'Valida Hasta',0,0,'L');
		$pdf->SetFont('Arial',null,'30');
		$pdf->SetXY(10,222);
		$pdf->Cell(10,20,"$fVen",0,0,'L');

		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(10,231);
		$pdf->Cell(10,20,'Antiguedad',0,0,'L');
		$pdf->SetFont('Arial',null,'30');
		$pdf->SetXY(10,239);
		$pdf->Cell(10,20,'0',0,0,'L');


		//OBSERVACIONES
		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(190,180);
		$pdf->Cell(10,20,'Observaciones',0,0,'R');
		$pdf->SetFont('Arial',null,'15');
		$pdf->SetXY(190,188);
		$pdf->Cell(10,20,'A. Hipertension',0,0,'R');
		$pdf->SetXY(190,194);
		$pdf->Cell(10,20,'B. Diabetes',0,0,'R');
		$pdf->SetXY(190,200);
		$pdf->Cell(10,20,'C. Epideria',0,0,'R'); //:( NO SOY DE QRO, NO TENGO LICENCIA DE AHI Y NO SE QUE DICE
		$pdf->SetXY(190,206);
		$pdf->Cell(10,20,'D. Alergia de medicamentos',0,0,'R');


		//CUADRO BONITO DE COLOR
		$pdf->SetFont('Arial','B','30');
		$pdf->SetXY(10,265);
		$pdf->Cell(20,20,"$tipo",1,0,'C');

		//FIRMA
		$pdf->SetFont('Arial','B','15');
		$pdf->SetXY(95,245);
		$pdf->Cell(20,20,'FIRMA',0,0,'C');
		$pdf->SetXY(80,255);
		$pdf->Image('Pictures\firma-lester.png',null,null,50,30);


		$pdf->Output('D',"$folio.pdf");
	}
	
 ?>