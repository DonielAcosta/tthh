<?php
$dir = str_replace ( 'config', '', dirname ( __FILE__ ) );
define ( 'RAIZ_LIB', PATH_LIB );
define ( 'RAIZ', PATH . NOMSIST . '/' );
// echo RAIZ;
//echo RAIZ_LIB;
define ( 'LIB', RAIZ_LIB . 'libComunP7/lib/' );
define ( 'PUB', RAIZ_LIB . 'libComunP7/public/' );

define ( 'LIBSIST', RAIZ . 'lib/' );
define ( 'PUBSIST', RAIZ . 'public/' );

if (CONSEGURA==1) {
	$domSeg = 'https';
	define ( 'DOMSEG','https' );
}else{
	$domSeg = 'http';
	define ( 'DOMSEG','http' );
}
// Detectar si estamos en entorno local para agregar el subdirectorio tthh
$is_local = (defined('DOMINIO') && (DOMINIO == 'localhost' || strpos(DOMINIO, '127.0.0.1') !== false));
$subdir = $is_local ? 'tthh/' : '';

define('URLSIST', $domSeg . '://'.DOMINIO.'/'.$subdir.NOMSIST.'/');
define('URLSISTCONT', $domSeg . '://'.DOMINIO.'/'.$subdir.NOMSIST.'/control.php?ula=');
define ( 'PUB_URL', $domSeg . '://' . DOMINIO_LIB . '/'.$subdir.'libComunP7/public/' );
define ( 'PUB_URLSIST', $domSeg . '://' . DOMINIO . '/'.$subdir.NOMSIST . '/public/' );

define ( 'LIB_URL', $domSeg . '://' . DOMINIO_LIB . '/'.$subdir.'libComunP7/lib/' );

define ( 'APP', RAIZ . 'app/' );
define ( 'TMP', RAIZ . 'tmp/' );

define ( 'TEMPLATE', PUBSIST . 'templates/' . PLANTILLA . '/' );
define ( 'TEMPLATE_URL', PUB_URLSIST . 'templates/' . PLANTILLA . '/' );

define ( 'CON', APP . 'cont/' );
define ( 'VISTA', APP . 'vista/' );
define ( 'COM', APP . 'comun/' );
define ( 'SENT', APP . 'sen/' );
define ( 'MOD', APP . 'mod/' );
define ( 'HELP', APP . 'helpers/' );

define ( 'MENU', 'menuh' );

define ( 'PATH_MENU', COM . MENU . '/' );

define ( 'PATH_CSS', PUB_URL . 'css/' );
define ( 'PATH_JS', PUB_URL . 'js/' );
define ( 'PATH_JS_SIST', PUB_URLSIST . 'js/' );
define ( 'PATH_JSXAJAX_SIST', PUB_URLSIST . 'jsXajax/' );

define ( 'PATH_JS_XAJAX', PUB_URLSIST . 'jsXajax/' );

define ( 'ADODB_ERROR_LOG_TYPE', 3 );
define ( 'ADODB_ERROR_LOG_DEST', RAIZ . NOMSIST . '_errors.log' );

define ( 'SMA', TMP . 'smarty/' );
// define('IMG', TMP.'imagen/');
// define('CSV', TMP.'csv/');
define ( 'TEMPLATE_DIR', SMA . 'templates/' );
define ( 'COMPILE_DIR', SMA . 'templates_c/' );
define ( 'CONFIG_DIR', SMA . 'configs/' );
define ( 'CACHE_DIR', SMA . 'cache/' );
?>