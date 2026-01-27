<?php
require_once ('../../../config/config.php');
require_once (LIB . 'xajax05/xajax_core/xajax.inc.php');
$xajax=new xajax();
$xajax->configure ( 'javascript URI', PUB_URL.'js/xajax05/' );
//$xajax->configure( 'debug', true ); 
//$xajax->configure( 'javascript URI',PUB_URL . 'js/xajax05/' );
$xajax->setCharEncoding ( CHARSET_GRID );
?>