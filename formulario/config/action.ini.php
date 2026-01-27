<?php
/**
 * Clase Controlador Action
 *
 */
class Action extends Smarty {
	
	const INGRESAR = 1;
	const ACTUALIZAR = 2;
	const ELIMINAR = 3;
	const CONSULTAR = 4;
	const ACEPTAR = 5;
	const CANCELAR = 6;
	const CERRAR = 7;
	const REGRESAR = 8;
	const REGISTRAR = 9;
	const LISTAR = 10;
	
	/**
	 * Constructor
	 *
	 * @return Action
	 */
	function __construct() {
		$this->template_dir = TEMPLATE_DIR;
		$this->compile_dir = COMPILE_DIR;
		$this->config_dir = CONFIG_DIR;
		$this->cache_dir = CACHE_DIR;
	}
	
	/**
	 * Asigna el directorio donde se encuentran las plantillas
	 */
	function setTemplateDir($dir, $isConfig = false){
//	function setTemplateDir($dir , false ) {
		if (file_exists ( $dir )) {
			$this->template_dir = $dir;
		} else {
			echo ("No existe el directorio $dir");
		}
	}
	function obtenerAccion($opcion) {
		switch ($opcion) {
			case 'ingresar' :
				return Action::INGRESAR;
			case 'actualizar' :
				return Action::ACTUALIZAR;
			case 'cancelar' :
				return Action::CANCELAR;
			case 'eliminar' :
				return Action::ELIMINAR;
		}
	}
	/**
	 * Obtiene el valor de un parametro aplicando
	 * filtros
	 *
	 * @param string Nombre del parametro
	 * @param var Request
	 */
	function getParameter($param_name, $request) {
		$value = @$request [$param_name];
		if ($value != null && $value != "") {
			if (is_string ( $value )) {
				$value = trim ( $value );
				$value = $value != null ? strip_tags ( $value ) : null;
			}
			return $value;
		}
		return null;
	}
	
	/**
	 * Suprime slashes de una matriz
	 *
	 * @param array Arreglo o matriz
	 * @return Arreglo sin slashes
	 */
	static function stripslashesArray($array) {
		$temp = array ();
		if (is_array ( $array )) {
			foreach ( $array as $key => $value ) {
				if (is_array ( $value )) {
					$temp [$key] = self::stripslashesArray ( $value );
				} else {
					if (get_magic_quotes_gpc () && is_string ( $value )) {
						$value = stripslashes ( $value );
					}
					$temp [$key] = $value;
				}
			}
		} else {
			if (get_magic_quotes_gpc ()) {
				$array = stripslashes ( $array );
			}
			$temp = $array;
		}
		return $temp;
	}
	function asignarParametros($request, $opt = null, $cont, $metodo, $pagina = null, $datos = null, $campos = null) {
		if ($datos != null and $campos != null) {
			//			$matCampos = split(',',$campos);
			$matCampos = explode ( ',', $campos );
//			dump($datos);die();
			if (count ( $datos ) > 0) {
				foreach ( $matCampos as $ite ) {
					$ite1 = trim($ite);
//					$cad = "\$this->setParameter ('$ite1', utf8_encode(\$datos [0] ['$ite1'] ));";
					$cad = "\$this->setParameter ('$ite1', utf8_encode(\$datos ['$ite1'] ));";
//					$cad = "\$this->setParameter ('$ite1', \$datos [0] ['$ite1'] );";
//					echo "$cad <br>";
					eval ( $cad );
				}
			}
//			var_dump($campos);
		//			echo "-->".$this->generopersona;
		}
		//$this->setParameter ('valorForm', "base.php?sec=$cont&name=$metodo&pagina=$pagina");
		//$this->setParameter ('valorForm', "../../$cont");
//		if ($opt == 'i') {
//			$this->setParameter ( 'valorForm', "../$cont" );
//		} else {
//			if ($opt == 'g') {
//				$this->setParameter ( 'valorForm', "$cont" );
//			} else {
//				$this->setParameter ( 'valorForm', "../../$cont" );
//			}
//		}
		if ($opt == 'i') {
			$this->setParameter ( 'valorForm', URLSIST."base/$cont" );
		} else {
			if ($opt == 'g') {
				$this->setParameter ( 'valorForm', URLSIST."base/$cont" );
			} else {
				$this->setParameter ( 'valorForm', URLSIST."base/$cont" );
			}
		}
		$this->setParameter ( 'opt', $opt );
	}
	function asignarParametrosError($request, $opt = null, $cont, $metodo, $pagina = null, $campos = null) {
//		echo $campos;
		if ($request != null) {
			$matCampos = explode ( ',', $campos );
//			$matCampos = explode ( ',', $request );
//			$matCampos = $request;
			foreach ( $matCampos as $ite ) {
				$cad = "\$this->setParameter ('$ite',\$this->$ite );";
				eval ( $cad );
			}
		//			dump($datos);
		//			echo "-->".$this->generopersona;
		}
//		$this->setParameter ( 'valorForm', "base.php?sec=$cont&name=$metodo&pagina=$pagina" );
		if ($opt == 'i') {
			$this->setParameter ( 'valorForm', "../$cont" );
		} else {
			if ($opt == 'g') {
				$this->setParameter ( 'valorForm', "$cont" );
			} else {
				$this->setParameter ( 'valorForm', "$cont" );
			}
		}		
		$this->setParameter ( 'opt', $opt );
	}
	function inicializarAtributos($request, $campos) {
		if ($campos != '') {
			//			$matCampos = split(',',$campos);
			$matCampos = explode ( ',', $campos );
			if (count ( $matCampos ) != 0) {
				foreach ( $matCampos as $ite ) {
					$cad = "\$this->$ite = \$this->getParameter ( '$ite', \$request );";
//					echo "$cad <br>";
					eval ( $cad );
				}
			} else {
				$cad = "\$this->\$request['$campos'] = \$this->getParameter ( '$campos', \$request );";
//				echo "$cad <br>";
				eval ( $cad );
			}
		
		//			echo "-->".$this->generopersona;
		}
//		echo "---".$this->nomContinente ;
//		die();
	}
	/**
	 * Crea las cadenas para obtener las variables de las tablas para los PDF
	 * @param unknown_type $campos
	 */
	function inicializarAtributosPdf($campos) {
		if ($campos != '') {
			//			$matCampos = split(',',$campos);
			$matCampos = explode ( ',', $campos );
			if (count ( $matCampos ) != 0) {
				foreach ( $matCampos as $ite ) {
//					$NOM_PACIENTE = utf8_encode ( $tabla [0] ['NOM_PACIENTE'] );
					$cad = "\$$ite = utf8_encode ( \$tabla [0] ['$ite'] );";
					echo "$cad <br>";
//					eval ( $cad );
				}
			} 
		
		//			echo "-->".$this->generopersona;
		}
//		echo "---".$this->nomContinente ;
//		die();
	}
	function prepararParametros($campos) {
		if ($campos != '') {
			$cad = '';
			$matCampos = split ( ',', $campos );
			$numReg = count ( $matCampos );
			if ($numReg != 0) {
				foreach ( $matCampos as $ite ) {
					$var = ($cad == '') ? '' : ',';
					if (isset ( $this->$ite )) {
						$aux = $this->$ite;
					} else {
						return false;
					}
					
					//					echo "aux = $aux <br>";
					//					$cad = $cad . $var . "'" . $aux . "'";
					$cad = $cad . $var . $aux;
				
		//					echo "$cad <br>";
				//					eval($cad);
				}
			} else {
				//					$cad = $cad . "\$this->$ite";
				$cad = $this->$ite;
			
		//					echo "$cad <br>";
			//					eval($cad);			
			}
		}
		//		$cad = eval($cad);
		//		echo "$cad <br>";
		return $cad;
	}
	
	function condicionarSententcia($nomCampoCleve, $campos) {
		if ($campos != '') {
			$cad = '';
			$parametros = split ( ',', $campos );
			$numReg = count ( $parametros );
			if ($numReg != 0) {
				foreach ( $parametros as $ite ) {
					$var = ($cad == '') ? '' : ' AND ';
					if (isset ( $ite )) {
						$aux = "$nomCampoCleve = " . $ite;
					} else {
						return false;
					}
					$cad = $cad . $var . $aux;
				}
			} else {
				$cad = $this->$ite;
			}
		}
		//		$cad = "WHERE $cad";
		//		echo "$cad <br>";
		return $cad;
	}
	
	/**
	 * Asigna el valor de un parametro
	 *
	 * @param string $param_name Nombre del parametro
	 * @param string $param_value Valor del parametro
	 */
	function setParameter($param_name, $param_value) {
		//if (!empty($param_name) && !empty($param_value)) {
		if (! empty ( $param_name ) && $param_value != "") {
			if (is_string ( $param_value )) {
				$param_value = stripslashes ( $param_value );
			} elseif (is_array ( $param_value )) {
				$param_value = self::stripslashesArray ( $param_value );
			}
			$this->assign ( $param_name, $param_value );
		}
	}
	
	function setParameterPath($param_name, $param_value) {
		//if (!empty($param_name) && !empty($param_value)) {
		if (! empty ( $param_name ) && $param_value != "") {
			$this->assign ( $param_name, $param_value );
		}
	}
	function asignarConstantes() {
		if (isset($_SESSION ['rolId'])) {
//			echo "entre".$_SESSION ['rolId'];die();;
//		if (isset ( $_SESSION ['cod_nivel_acceso'] )) {
			$rolId = $_SESSION ['rolId'];
//			$rolId = $_SESSION ['cod_nivel_acceso'];
			$this->setParameterPath ( 'NOMBRE_USUARIO', $_SESSION ['nombre'] );
			$this->setParameterPath ( 'MENU_USU', $_SESSION ['menuUsu'] );
//			$this->setParameterPath ( 'LOGO_CLINICA', utf8_encode($_SESSION ['NOM_CLINICA']) );
		}
		if (isset ( $_SESSION ['NOMBRE_PACIENTE'] )) {
			$this->setParameterPath ( 'etiquetaPaciente', $_SESSION ['NOMBRE_PACIENTE'] );
			//			$this->setParameterPath ( 'desactivar', true );
			$this->setParameterPath ( 'activarExamenes', true );
		} else {
			//			$this->setParameterPath ( 'desactivar', false );
			$this->setParameterPath ( 'activarExamenes', false );
		}
		//$this->setParameterPath ( 'MENU_USU', $_SESSION ['menuUsu'] );
		$this->setParameterPath ( 'URLSIST', URLSIST );
		$this->setParameterPath ( 'CHARSET', CHARSET );
		$this->setParameterPath ( 'PATH_CSS', PATH_CSS );
		$this->setParameterPath ( 'PUB_URL', PUB_URL );
		$this->setParameterPath ( 'PUB_URLSIST', PUB_URLSIST );
		$this->setParameterPath ( 'PATH_TEMPLATE', TEMPLATE_URL );
		$this->setParameterPath ( 'PATH_JS', PATH_JS );
		$this->setParameterPath ( 'PATH_JS_SIST', PATH_JS_SIST );
		$this->setParameterPath ( 'PATH_JS_XAJAX', PATH_JS_XAJAX );
		$this->setParameterPath ( 'PATH_MENU', PATH_MENU );
		$this->assign ( 'COPYRIGHT', COPYRIGHT );
		$this->assign ( 'FECHA_SISTEMA', FECHA_SISTEMA );
		$this->assign ( 'NOM_PROYECTO', NOM_PROYECTO );
		$this->assign ( 'LOGO_PROYECTO', LOGO_PROYECTO );
		$this->assign ( 'LINE1_ENCABEZADO', LINE1_ENCABEZADO );
		$this->assign ( 'LINE2_ENCABEZADO', LINE2_ENCABEZADO );
		$this->assign ( 'LINE3_ENCABEZADO', LINE3_ENCABEZADO );
		$this->assign ( 'ALINEACIONGRID', ALINEACIONGRID );
		
//		$this->llamadoXajax('principal');
	
		//		$valImp = rand(0,1000);
	//		$this->assign ( 'valImp', $valImp );
	}
	/**
	 * Verifica si el usuario esta registrado y si tiene permiso para acceder al modulo seleccionado
	 * @param String $modulo Modulo al que desea acceder
	 * @return boolean True; si tiene acceso False: acceso restringido
	 */
	function validaUsuario($clase, $metodo) {		
//		if (isset ( $_SESSION ['usuarioid'] )) {
		if (isset ( $_SESSION [NOMSIST.'Id'] )) {
//			echo "aca [".$_SESSION [NOMSIST.'Id'].']';die();
			if ($this->validaModulo ( $metodo )) {
				return true;
			}else{
//				return false;
				$this->paginaRestringida ();
			}
//			return true;
		} else {
//			echo "alla";die();
			$this->finalizarSesion();
//			return true;
		}
	}
	/**
	 * Valida si el usuario tiene acceso o no al modulo
	 * @param String $modulo Modulo al que desea acceder
	 * @return boolean True; si tiene acceso False: acceso restringido
	 */
	function validaModulo($modulo) {
		return true;
	}
	/**
	 * Redirecciona al usuario a "denegado.php" cuando esta intentando acceder a una pagina la que no 
	 * tiene permiso
	 */
	function paginaRestringida() {
		$this->redirect ( URLSIST.'app/cont/principal/denegado.php' );
	}
	/**
	 * Si no existe una sesion, redirecciona a la pagina de registro
	 */
	function finalizarSesion() {
//		$this->redirect ( '../../../index.php' );
		$this->redirect ( URLSIST );
		return;
	}
	/**
	 * Siguiente plantilla a renderizar
	 *
	 * @param string $tpl_name Nombre del archivo plantilla
	 */
	function goForward($tpl_name) {
		if (file_exists ( $this->template_dir . $tpl_name )) {
			$this->display ( $tpl_name );
		} else {
			echo ("No existe la plantilla $tpl_name");
		}
	}
	
	/**
	 * Retorna TRUE si el atributo tiene un valor asignado
	 * y FALSE en otro caso
	 *
	 * @param string $attr Atributo
	 * @return boolean
	 */
	function issetAttribute($attr) {
		if ($attr == null || $attr == "") {
			return false;
		}
		return true;
	}
	
	/**
	 * Permite truncar una tabla dado el
	 * numero de pagina
	 *
	 * @param array Tabla
	 * @param integer Numero de pagina
	 * @return array Tabla truncada
	 */
	function getPage($table, $page) {
		if ($page == null || $page == "") {
			$page = 1;
		}
		
		if (count ( $table ) <= TAM_PAG) {
			return $table;
		}
		
		$offset = ($page - 1) * TAM_PAG;
		
		$table = array_slice ( $table, $offset, TAM_PAG );
		return $table;
	}
	
	/**
	 * Permite obtener el numero de paginas a partir
	 * de la tabla de resultados
	 *
	 * @param array Tabla
	 * @return integer Numero de paginas
	 */
	function getPageNumbers($table) {
		if (!is_array($table)) {
			return 0;
		}
		$rows = count ( $table );
		
		if ($rows <= TAM_PAG) {
			return 1;
		}
		
		$pageNumbers = ceil ( $rows / TAM_PAG );
		return $pageNumbers;
	}
	/**
	 * Permite obtener el numero de paginas a partir
	 * de la tabla de resultados y el numero de registros que se desean mostrar en el grid 
	 * @param array Tabla
	 * @param integer $cantRegistros
	 * @return integer Numero de paginas
	 */
	function getPageNumbersCantRegistros($table,$cantRegistros = TAM_PAG) {
		if (!is_array($table)) {
			return 0;
		}
		$rows = count ( $table );
		
		if ($rows <= $cantRegistros) {
			return 1;
		}
		
		$pageNumbers = ceil ( $rows / $cantRegistros );
		return $pageNumbers;
	}
	
	/**
	 * Permite redireccionar a una URL dada
	 *
	 * @param string URL destino
	 */
	function redirect($url) {
		header ( "Location: $url" );
	}
	function iniciarXajax($arrayFunciones){
		require_once (LIB . 'xajax05/xajax_core/xajax.inc.php');
		$xajax=new xajax();
		$xajax->configure ( 'javascript URI', PUB_URL.'js/xajax05/' );
		$xajax->setCharEncoding ( CHARSET );		
		
		$this->cargarFunciones($arrayFunciones,$xajax);
		
		$xajax->processRequest();
	}
	function cargarFunciones($arrayFunciones,$xajax){
//		principal.xajax.php		
		for($i = 0; $i < count ( $arrayFunciones ); $i ++) {
			//$xajax->registerFunction("llenarGridPersona");
			eval("\$xajax->registerFunction('".$arrayFunciones[$i]."');");
//			require_once RAIZ . 'app/cont/' . $vector [$i] . '/' . $vector [$i] . '.xajax.php'; // archivo que contiene las funciones xajax
		}			
	}
	function llamadoXajax($nombreArchivoXajax) {
		require_once RAIZ . 'app/cont/principal/principalIni.xajax.php';
		require_once RAIZ . 'app/cont/principal/principal.xajax.php';
		include_once RAIZ . 'app/cont/' . $nombreArchivoXajax . '/' . $nombreArchivoXajax . '.xajax.php';
		require_once RAIZ . 'app/cont/principal/principalFin.xajax.php';
		$this->assign ( 'xajax_javascript', $xajax->printJavascript () );
	}
	function llamadoXajaxArray($vector) {
		require_once RAIZ . 'app/cont/principal/principalIni.xajax.php';
		require_once RAIZ . 'app/cont/principal/principal.xajax.php';
		for($i = 0; $i < count ( $vector ); $i ++) {
			require_once RAIZ . 'app/cont/' . $vector [$i] . '/' . $vector [$i] . '.xajax.php'; // archivo que contiene las funciones xajax
		}
		require_once RAIZ . 'app/cont/principal/principalFin.xajax.php';
		$this->assign ( 'xajax_javascript', $xajax->printJavascript () );
	}
	function paginado($objResponse,$numPag,$indice,$funcionXajax,$campoBusqueda,$paginas,$resultado){
	    if ($numPag > 1) {
	        $j = 0;
	        $i1 = 0;
	        $cad1 = '';
	        $cad2 = '';
	        $cad3 = '';
	        if ($indice == null OR $indice=='') {
	            $indice=0;
	        }
	        $numPag1 = $numPag;
	        $numIte = $numPag;
	        $cantNumPag = 5;
	        if ($numPag > $cantNumPag) {
	            $numPag1 = $indice + $cantNumPag;
	            //				$cad2 = " <label onclick='$funcionXajax(\"$campoBusqueda\",$indice + $cantNumPag)' class='pagerCurrent'>+$cantNumPag</label>";
	            $cad2 = " <span onclick='$funcionXajax(\"$campoBusqueda\",$indice + $cantNumPag)' class='label label-primary classHand'>+$cantNumPag</span>";
	            if ($indice > $cantNumPag - 1) {
	                //					$cad1 = " <label onclick='$funcionXajax(\"$campoBusqueda\",$indice - $cantNumPag)' class='pagerCurrent'>-$cantNumPag</label>";
	                $cad1 = " <span onclick='$funcionXajax(\"$campoBusqueda\",$indice - $cantNumPag)' class='label label-primary classHand'>-$cantNumPag</span>";
	            }
	            if ($indice < $cantNumPag && $indice > 1) {
	                $newTam = $indice;
	                //					$cad1 = " <label onclick='$funcionXajax(\"$campoBusqueda\",$indice - $newTam)' class='pagerCurrent'>-$newTam</label>";
	                $cad1 = " <span  onclick='$funcionXajax(\"$campoBusqueda\",$indice - $newTam)' class='label label-primary classHand'>-$newTam</span>";
	            }
	            $i1 = $indice;
	            $j = $indice;
	        }
	        for($i = $i1; $i < $numPag1; $i ++) {
	            $j = $j + 1;
	            //				$paginas = $paginas . " <label onclick='$funcionXajax(\"$campoBusqueda\",$j)' class='pagerCurrent'>$j</label>";
	            $paginas = $paginas . " <span  onclick='$funcionXajax(\"$campoBusqueda\",$j)' class='label label-info classHand'>$j</span>";
	        }
	        if ($indice==0) {
	            $indice=1;
	        }
	        //			$cad3 = "<label class='pagerCurrent'>Página actual: $indice</label><br><br>";
	        $cad3 = "<span  class='label label-info classHand'>Pág. actual: $indice</span>";
	        return array($paginas,$cad1,$cad2,$cad3);
	        
	    } else {
	        $objResponse->assign ( 'paginacion', 'innerHTML', '', '' );
	        $objResponse->assign ( 'paginacion1', 'innerHTML', '', '' );
	    }
	}	
	function paginadoOld($objResponse,$numPag,$indice,$funcionXajax,$campoBusqueda,$paginas,$resultado){
		$numRegistros = count($resultado);
//		echo "[$numRegistros]";
		if ($numPag > 1) {
// 			if ($indice=='') {
			if ($indice == null OR $indice=='') {
				$indice=0;
			}
			$j = 0;
			$i1 = 0;
			$cad1 = '';
			$cad2 = '';
			$cad3 = '';
			$numPag1 = $numPag;
			$numIte = $numPag;
			$cantNumPag = 5;
			if ($numPag > $cantNumPag) {
				$numPag1 = $indice + $cantNumPag;
				$cad2 = " <span onclick='$funcionXajax(\"$campoBusqueda\",$indice + $cantNumPag)' class='label label-primary classHand'>+$cantNumPag</span>";
				if ($indice > $cantNumPag - 1) {
					$cad1 = " <span onclick='$funcionXajax(\"$campoBusqueda\",$indice - $cantNumPag)' class='label label-primary classHand'>-$cantNumPag</span>";
				}
				if ($indice < $cantNumPag && $indice > 1) {
					$newTam = $indice;
					$cad1 = " <span  onclick='$funcionXajax(\"$campoBusqueda\",$indice - $newTam)' class='label label-primary classHand'>-$newTam</span>";
				}
				$i1 = $indice;
				$j = $indice;
			}
			if ($indice==0) {
				$indice=1;
			}
			if ($j>0) {
				$j=$j-1;
			}
			for($i = $i1; $i < $numPag1; $i ++) {
				$j = $j + 1;
				if ($j>$numRegistros) {
					break;
				}
				if ($j==$indice) {
					$paginas = $paginas . " <span  onclick='$funcionXajax(\"$campoBusqueda\",$j)' class='label label-info-sel classHand'>$j</span>";
				}else{
					$paginas = $paginas . " <span  onclick='$funcionXajax(\"$campoBusqueda\",$j)' class='label label-info classHand'>$j</span>";
				}
			}
			if ($indice==0) {
				$indice=1;
			}
			$cad3 = "";//Si desea que salga el texto que indica la pagina actual, descomente la linea anterior 
			return array($paginas,$cad1,$cad2,$cad3);

		} else {
			$objResponse->assign ( 'paginacion', 'innerHTML', '', '' );
			$objResponse->assign ( 'paginacion1', 'innerHTML', '', '' );
		}		
	}	
}

function ObtenerNavegador($user_agent) {
	$navegadores = array ('Opera' => 'Opera', 'Mozilla Firefox' => '(Firebird)|(Firefox)', 'Galeon' => 'Galeon', 'Mozilla' => 'Gecko', 'MyIE' => 'MyIE', 'Lynx' => 'Lynx', 'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)', 'Konqueror' => 'Konqueror', 'Internet Explorer 7' => '(MSIE 7\.[0-9]+)', 'Internet Explorer 6' => '(MSIE 6\.[0-9]+)', 'Internet Explorer 5' => '(MSIE 5\.[0-9]+)', 'Internet Explorer 4' => '(MSIE 4\.[0-9]+)' );
	//	foreach ( $navegadores as $navegador => $pattern ) {
	//		if (eregi ( $pattern, $user_agent ))
	//		if (preg_match( $pattern, $user_agent ))
	//			return $navegador;
	//	}
	return 'Desconocido';
}
?>