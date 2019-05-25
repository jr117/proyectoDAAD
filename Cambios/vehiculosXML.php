<?php 
	
	
	//Incio("1","5321","3","12/12/2012","12/12/1222","Queretaro");

	function Incio($idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta){
		$dir = '../temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename='../temp/vehiculosXML.xml';
		if (!$xml=simplexml_load_file($filename)) {
			echo "No existe el archivo, se creara uno...";
			CreayAgrega($idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta);
		}else{
			Agrega($xml,$idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta);
		}
	}

	function CreayAgrega($idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta){
		$filename='../temp/vehiculosXML.xml';
		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?> <vehiculos></vehiculos>');
		$veh = $xml->addChild('vehiculo');
		$veh->addChild('idVehiculo',"$idVehiculo");
		$veh->addChild('propietario',"$propietario");
		$veh->addChild('niv',"$niv");
		$veh->addChild('placa',"$placa");
		$veh->addChild('uso',"$uso");
		$veh->addChild('tipo',"$tipo");
		$veh->addChild('color',"$color");
		$veh->addChild('origen',"$origen");
		$veh->addChild('linea',"$linea");
		$veh->addChild('transmision',"$transmision");
		$veh->addChild('numeroCilindro',"$numeroCilindro");
		$veh->addChild('ano',"$ano");
		$veh->addChild('combustible',"$combustible");
		$veh->addChild('modelo',"$modelo");
		$veh->addChild('numSerie',"$numSerie");
		$veh->addChild('numMotor',"$numMotor");
		$veh->addChild('marca',"$marca");
		$veh->addChild('numPuerta',"$numPuerta");

		$xml->asXML($filename);
	}

	function Agrega($xml,$idVehiculo,$propietario,$niv,$placa,$uso,$tipo,$color,$origen,$linea,$transmision,$numeroCilindro,$ano,$combustible,$modelo,$numSerie,$numMotor,$marca,$numPuerta){
		$filename='../temp/vehiculosXML.xml';
		$xml = $xml;
		$veh = $xml->addChild('vehiculo');
		$veh->addChild('idVehiculo',"$idVehiculo");
		$veh->addChild('propietario',"$propietario");
		$veh->addChild('niv',"$niv");
		$veh->addChild('placa',"$placa");
		$veh->addChild('uso',"$uso");
		$veh->addChild('tipo',"$tipo");
		$veh->addChild('color',"$color");
		$veh->addChild('origen',"$origen");
		$veh->addChild('linea',"$linea");
		$veh->addChild('transmision',"$transmision");
		$veh->addChild('numeroCilindro',"$numeroCilindro");
		$veh->addChild('ano',"$ano");
		$veh->addChild('combustible',"$combustible");
		$veh->addChild('modelo',"$modelo");
		$veh->addChild('numSerie',"$numSerie");
		$veh->addChild('numMotor',"$numMotor");
		$veh->addChild('marca',"$marca");
		$veh->addChild('numPuerta',"$numPuerta");

		$xml->asXML($filename);
	}
	
 ?>