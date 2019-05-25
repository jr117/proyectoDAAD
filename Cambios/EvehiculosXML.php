<?php 

	function Elimina($key){
		$dir = '../temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename='../temp/vehiculosXML.xml';
		if (!$xml=simplexml_load_file($filename)) {
			echo "No existe XML";
		}else{
			$xml=simplexml_load_file($filename);
			$vehiculos = $xml->vehiculos;
			$node = $xml->xpath('//vehiculo[idVehiculo="'.$key.'"]');
			$dom=dom_import_simplexml($node[0]);
			$dom->parentNode->removeChild($dom);
			$xml->asXML($filename);
		}
	}

 ?>