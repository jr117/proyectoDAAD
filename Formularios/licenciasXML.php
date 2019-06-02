<?php 
	
	
	function Incio($folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision){
		$dir = '../temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename=$dir.'licenciasXML.xml';
		if (!$xml=simplexml_load_file($filename)) {
			echo "No existe el archivo, se creara uno...";
			CreayAgrega($folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision);
		}else{
			Agrega($xml,$folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision);
		}
	}
	
	function CreayAgrega($folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision){
		$filename='../temp/licenciasXML.xml';
		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?> <licencias></licencias>');
		$lic = $xml->addChild('licencia');
		$lic->addChild('folio',"$folio");
		$lic->addChild('conductor',"$conductor");
		$lic->addChild('tipo',"$tipo");
		$lic->addChild('fechaExpedicion',"$fechaExpedicion");
		$lic->addChild('fechaVencimiento',"$fechaVencimiento");
		$lic->addChild('estadoEmision',"$estadoEmision");

		$xml->asXML($filename);
	}
	
	function Agrega($xml,$folio,$conductor,$tipo,$fechaExpedicion,$fechaVencimiento,$estadoEmision){
		$filename='../temp/licenciasXML.xml';
		$xml = $xml;
		$lic = $xml->addChild('licencia');
		$lic->addChild('folio',"$folio");
		$lic->addChild('conductor',"$conductor");
		$lic->addChild('tipo',"$tipo");
		$lic->addChild('fechaExpedicion',"$fechaExpedicion");
		$lic->addChild('fechaVencimiento',"$fechaVencimiento");
		$lic->addChild('estadoEmision',"$estadoEmision");

		$xml->asXML($filename);
	}
	
 ?>