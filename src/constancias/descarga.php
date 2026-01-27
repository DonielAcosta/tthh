<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');
// echo "aca";die();
// Permite la descarga de un archivo ocultando su ruta
$anio = 2021;

// $ced = $session[cedulaRec];
$ced = $this->session->cedulaRec;
echo "aca";die();
$mes = $_REQUEST['mes'];
$quincena = $_REQUEST['qui'];
$tipoEmp = $_REQUEST['tp'];
// $tipoEmp = 'doc';
echo "aca";die();

switch ($tipoEmp) {
    case '1':
        $carp = 'doc';
    break;
    case '2':
        $carp = 'obr';
    break;
    case '3':
        $carp = 'emp';
    break;
    case '4':
        $carp = 'con';
    break;
    
    default:
        ;
    break;
}

$ruta = "$anio/$mes/$quincena/$carp";
$nomArchivo = 'rec_'.$ced;

$nombre = $nomArchivo . ".pdf";

echo "[$ruta] - [$nombre]";

$filename = "ConstanciasTrabajoGob_12780005.php";
$filename = "ConstanciasTrabajoGob_".$nombre.".php";

$size = filesize($filename);
header("Content-Transfer-Encoding: binary");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$nombre");
header("Content-Length: $size");
readfile("$filename");
?>  