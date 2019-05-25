<?php 
	
	
	//Incio("1","5321","3","12/12/2012","12/12/1222","Queretaro");

	function Incio($idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen){
		$dir = '../temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename='../temp/verificacionesXML.xml';
		if (!$xml=simplexml_load_file($filename)) {
			echo "No existe el archivo, se creara uno...";
			CreayAgrega($idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen);
		}else{
			Agrega($xml,$idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen);
		}
	}

	function CreayAgrega($idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen){
		$filename='../temp/verificacionesXML.xml';
		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?> <verificaciones></verificaciones>');
		$ver = $xml->addChild('verificacion');
		$ver->addChild('idVerificacion',"$idVerificacion");
		$ver->addChild('vehiculo',"$vehiculo");
		$ver->addChild('periodo',"$periodo");
		$ver->addChild('centroVerificacion',"$centroVerificacion");
		$ver->addChild('tipo',"$tipo");
		$ver->addChild('dictamen',"$dictamen");

		$xml->asXML($filename);
	}

	function Agrega($xml,$idVerificacion,$vehiculo,$periodo,$centroVerificacion,$tipo,$dictamen){
		$filename='../temp/verificacionesXML.xml';
		$xml = $xml;
		$ver = $xml->addChild('verificacion');
		$ver->addChild('idVerificacion',"$idVerificacion");
		$ver->addChild('vehiculo',"$vehiculo");
		$ver->addChild('periodo',"$periodo");
		$ver->addChild('centroVerificacion',"$centroVerificacion");
		$ver->addChild('tipo',"$tipo");
		$ver->addChild('dictamen',"$dictamen");

		$xml->asXML($filename);
	}
	
 ?>