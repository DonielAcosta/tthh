<?php
require_once ('../../../config/config.php');
class Base {
}
class Controller extends Action {
    function __construct() {
        parent::__construct ();
    }
    function instanciarClase($clase, $metodo, $matParametros) {
        $this->resultado = null;
        $this->clase = new $clase ();
        return $this->clase;
    }
    function visualizar($pagina) {
        $this->setParameterPath ( 'pagina', VISTA . $pagina );
        $this->goForward ( 'template.tpl' );
    }
    function visualizarPagina($pagina) {
        //		$this->goForward ( $pagina );
        $this->setParameterPath ( 'pagina', VISTA . $pagina );
        $this->goForward ( 'templateSimple.tpl' );
    }
    function main($request, $session) {
        $controller = $request ['sec'];
        //		echo "[($controller)]";
        if (strlen ( $controller ) > 25) {
            //			$sem = date("Y-m-d");
            $sem = SEM;
            //			$sem = 'josue';
            $controller = desencriptar3 ( $_GET ['sec'], $sem );
            @$model = desencriptar3 ( $_GET ['opcion'], $sem );
            @$pagina = @$request ['pagina'];
            //@$pagina = desencriptar3($_GET['pagina'],date("Y-m-d"));
        } else {
            $controller = $request ['sec'];
            @$model = @$request ['opcion'];
            @$pagina = @$request ['pagina'];
        }
        if ($model == null) {
            $model = 'listar';
        }
        $controller = str_replace ( '/', '', $controller );
        //		echo " - [($controller) ($model) ($pagina)]";
        //		echo "{$sem} - [($controller) ($model) ($pagina)]";
        //		die();
//         $valida = $this->validaUsuario ( $controller, $model );
        //		echo "[$valida]";die();
        //		if (! $valida) {
        //			$this->paginaRestringida ();
            //		}
            if ($pagina == null) {
                $pagina = 'listar' . $controller;
            }
            //		$pagina = 'listar'.$controller;
            $ruta = APP . "cont/$controller/$pagina.php";
            //		echo "-$ruta-";
            //		die();
            if (is_file ( $ruta )) {
                require_once $ruta;
                //			$clase = $controller.'List';
                $controller = ucfirst ( $controller ); //Tuvo que agregarse
                $clase = 'principal' . $controller;
                //			echo "[$clase] {$model }";die();
                //			$model = 'cancelar';
                $object = new $clase ();
                $object->$model ( $_REQUEST, $_SESSION );
            } else {
                //			echo " - [($controller) ($model) ($pagina)]";
                echo "No existe la ruta para: - $pagina -";
                die ();
                $_SESSION ['msgError'] = "Ruta no encontrada";
                $ruta = APP . "cont/principal/listarerror.php";
                $ruta = APP . "cont/principal/error.php";
                require_once $ruta;
                $clase = 'principalError';
                $object = new $clase ();
                $object->listar ( $_REQUEST, $_SESSION );
                //			$this->setParameterPath ( 'test', 'josue' );
            }
    }
}
class Model extends Controller {
    function view($name, $data) {
        extract ( $data );
        include "app/view/" . $name . ".php";
    }
}
class Vista extends Controller {
}
// ------ Router & Loader ------
//function _main ($request) {
//	$controller = $request ['section'];
//	@$model = @$request ['opcion'];
//	@$pagina = @$request ['pagina'];
//	if ($model==null) {
//		$model = 'listar';
//	}
//	$valida = $this->validaUsuario ( $controller, $model );
//	if (! $valida) {
//		$this->paginaRestringida ();
//	}
//	if ($pagina==null) {
//		$pagina = 'listar'.$controller;
//	}
//	$ruta = APP . "cont/$controller/$pagina.php";
//	if (is_file ( $ruta )) {
//		require_once $ruta;
//		$clase = $controller.'List';
//		$object = new $clase ();
//		$object->$model ($_REQUEST, $_SESSION);
//	}
//}
// ----- Rutina -----
//_main ($_REQUEST);
$action = new Controller ();
$action->main ( $_REQUEST, $_SESSION );
?>