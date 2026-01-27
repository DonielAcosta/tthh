<?php
require_once ('../../config/config.php');
require_once (MOD . 'Cie.php');

// recuperamos el criterio de la busqueda
$criterio = strtolower ( $_GET ["term"] );
if (! $criterio)
	return;
?>
[<?php

$objCie = new Cie ();
$productos = $objCie->consultarCieXdesc_4Aprox ( $criterio );
$objCie->cerrarConexion ();
//dump($productos);


// cada elemento debe tener la forma:
// { label : "lo que quieras que aparezca escrito", value: { datos del producto... } }
$contador = 0;
if ($productos) {
	foreach ( $productos as $ite ) {
		$COD_4 = $ite ['COD_4'];
		$descripcion = $ite ['DESC_4_CARACT'];
		$descripcion = utf8_encode($descripcion);
		
		$valor = $ite ['id_g2_cie10'];
//		if (strpos ( strtolower ( $descripcion ), $criterio ) !== false) {
//		if (strpos ( ( $descripcion ), $criterio ) !== false) {
			if ($contador ++ > 0)
				print ", ";
			print "{ \"label\" : \"$COD_4 - $descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"precio\" : $valor } }";
//		}
	}
}
?>]