<?php
require_once ('../../../config/config.php');
require_once (APP . 'comun/grid.php');

$action = new Action ();
$arrayFunciones = Array ("edoSession", "imprimir" );
if (! isset ( $xajax )) {
	$action->iniciarXajax ( $arrayFunciones );
} else {
	$action->cargarFunciones ( $arrayFunciones, $xajax );
}
function edoSession() {
	global $objResponse;
	$objResponse = new xajaxResponse ();
	if (isset ( $_SESSION ['usuarioIds'] )) {
		$msg = 'valido';
		$objResponse->call ( "ventanaLogin()" );
//		return true;
	} else {
//		$this->finalizarSesion ();
//		return false;
//		$objResponse->alert( "session finalizada" );
		$msg = 'Session finalizada, por favor vuelva a ingresar la información de acceso o pulse en continuar para salir';
//		$objResponse->call ( "ventanaAlerta('$msg','Alerta')" );
		$objResponse->call ( "ventanaLogin()" );
//		return false;
	}
	return $objResponse;
}
function imprimir($form) {
	global $objResponse;
//	dump($form);
	$objResponse = new xajaxResponse ();
	$modulo = $form ['modulo'];
	$etiquetaModulo = $form ['etiquetaModulo'];
	$buscar = $form ['nom' . ucfirst ( $modulo )];
	if ($buscar != '') {
		$pagina = 'base/' . $modulo . '/imprimir/' . $buscar;
	} else {
		$pagina = 'base/' . $modulo . '/imprimir';
	}
	$tituloPagina = $etiquetaModulo;
	$objResponse->call ( "vntImprimir('$pagina','$tituloPagina','undefined','undefined')" );
	return $objResponse;
}
?>