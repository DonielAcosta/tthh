<?php

require_once('routes.ini.php');
require_once('databases.ini.php');

require_once (LIB . 'xajax05/xajax_core/xajax.inc.php');
require_once('msnerror.ini.php');
require_once(LIB.'util/fechautil.php');
require_once(HELP.'helpers.php');
//require_once(LIB . 'smarty/Smarty.class.php');
//require_once(LIB . 'smarty-3.1.30/libs/Smarty.class.php');
require_once(LIB . 'smarty-2.6.30/libs/Smarty.class.php');
/*
define('ADODB_ERROR_LOG_TYPE', 3);
define('ADODB_ERROR_LOG_DEST', 'framework_errors.log');
require_once(RAIZ.'errorhandler.inc.php');

*/
//define('ADODB_ERROR_LOG_TYPE', 3);
//define('ADODB_ERROR_LOG_DEST', 'framework_errors.log');

require_once(LIB . 'adodb5/adodb-exceptions.inc.php');
require_once(LIB . 'adodb5/adodb.inc.php');
require_once('action.ini.php');
?>