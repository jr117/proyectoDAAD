<?php 
	
	
	//Incio("1","5321","3","12/12/2012","12/12/1222","Queretaro","3","12/12/2012","12/12/1222","Queretaro");

	function Incio($folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia){
		$dir = '../temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename='../temp/multasXML.xml';
		if (!$xml=simplexml_load_file($filename)) {
			echo "No existe el archivo, se creara uno...";
			CreayAgrega($folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia);
		}else{
			Agrega($xml,$folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia);
		}
	}

	function CreayAgrega($folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia){
		$filename='../temp/multasXML.xml';
		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?> <multas></multas>');
		$mult = $xml->addChild('multa');
		$mult->addChild('folio',"$folio");
		$mult->addChild('vehiculo',"$vehiculo");
		$mult->addChild('verificacion',"$verificacion");
		$mult->addChild('licencia',"$licencia");
		$mult->addChild('descripcion',"$descripcion");
		$mult->addChild('monto',"$monto");
		$mult->addChild('fecha',"$fecha");
		$mult->addChild('motivo',"$motivo");
		$mult->addChild('emisor',"$emisor");
		$mult->addChild('garantia',"$garantia");

		$xml->asXML($filename);
	}

	function Agrega($xml,$folio,$vehiculo,$verificacion,$licencia,$descripcion,$monto,$fecha,$motivo,$emisor,$garantia){
		$filename='../temp/multasXML.xml';
		$xml = $xml;
		$mult = $xml->addChild('multa');
		$mult->addChild('folio',"$folio");
		$mult->addChild('vehiculo',"$vehiculo");
		$mult->addChild('verificacion',"$verificacion");
		$mult->addChild('licencia',"$licencia");
		$mult->addChild('descripcion',"$descripcion");
		$mult->addChild('monto',"$monto");
		$mult->addChild('fecha',"$fecha");
		$mult->addChild('motivo',"$motivo");
		$mult->addChild('emisor',"$emisor");
		$mult->addChild('garantia',"$garantia");

		$xml->asXML($filename);
	}
	
 ?>