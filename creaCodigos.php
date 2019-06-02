<?php 
	require "phpqrcode/qrlib.php";
	require 'php-barcode-master/barcode.php';
	//CREA CODIDO QR
	function creaQR($contenido)
	{
		$dir = 'temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename = $dir.'qr.png';
		QRcode::png($contenido,$filename);
		return $filename;
	}
	//CREA CODIGO DE BARRAS
	function creaBarra($contenido)
	{
		$dir = 'temp/';
		if (!file_exists($dir)){
	        mkdir($dir);
		}
		$filename = $dir.'cb.png';
		barcode($filename, $contenido, 20, 'horizontal', 'code128', true);
		return $filename;
	}

?>
