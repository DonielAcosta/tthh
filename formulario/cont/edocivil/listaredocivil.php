<?php 
/** 
 * @file edocivil.php 
 *  
 * Controlador Ingresar/Actualizar de la Tabla Edocivil 
 * 
 * @author SOLINF 
 * @version V 0.1 
 * @date 24/02/2020
 *  
*/ 
require_once('../../../config/config.php');
require_once(MOD.'EdoCivil.php');
require_once(MOD.'Enumerado.php');
class principalEdocivil extends Controller {
	private $opt;
	// Atributos de 
// private $idEdoCivil;
// private $nomEdoCivil;
// private $descEdoCivil;
	function principalEdocivil(){
		parent::__construct ();		
		$this->campos = 'idEdoCivil,nomEdoCivil,descEdoCivil';
		$this->modelo = 'edocivil';
		$this->modulo = 'Edocivil';
		$this->setTemplateDir(TEMPLATE);
		$this->asignarConstantes();
		$this->setParameter( 'MOD', $this->modelo );
	}
	function listar($request,$session){
		$this->llamadoXajax ( 'edocivil' );
		$this->setParameter ( 'etiquetaModulo', 'Listar' .' '. $this->modulo);
		$this->setParameterPath ( 'urlImp', 'base/edocivil/imprimir' );
		$this->ver('listaredocivil.tpl');
	}
	function guardar($request,$session){
		$opcion = $request ['opcion'];
		$this->inicializarAtributos($request,$this->campos);
		$objEdocivil = new Edocivil ();
		$tablaResultado = $objEdocivil->agregarEdocivil($this->idEdoCivil,$this->nomEdoCivil,$this->descEdoCivil);
		$objEdocivil->cerrarConexion();
		if ($tablaResultado > 0) {
			$exito = Messages::EXITO_INGRESAR;
			$this->setParameter ( 'exito', $exito );
			$this->setParameter ( 'opt', '' );
			$this->listar($request,$session);
		}else{
			$error = Messages::ERROR_INGRESAR;
			$this->setParameter ( 'error', $error );
			$this->asignarParametrosError($request,'g',$this->modelo, 'guardar', '', $this->campos);
			$this->ver('edocivil.tpl');
		}
	}
	function ingresar($request,$session ){
		$this->llamadoXajax ( 'edocivil' );
		$opcion = $request ['opcion'];
		$this->asignarParametros($request,'g',$this->modelo,$opcion,null,null,null);
		$this->setParameterPath( 'urlImp', '' );
		$this->setParameter ( 'etiquetaModulo', 'Ingresar'. ' ' .$this->modulo);
		$this->ver('edocivil.tpl');
	}
	function actualizar($request,$session){
		$this->inicializarAtributos($request,$this->campos);
		$objEdocivil = new Edocivil ();
		$tablaResultado = $objEdocivil->actualizarEdocivil($this->idEdoCivil,$this->nomEdoCivil,$this->descEdoCivil,$this->idEdoCivil);
		$objEdocivil->cerrarConexion();
		if ($tablaResultado > 0) {
			$exito = Messages::EXITO_ACTUALIZAR;
			$this->setParameter ( 'exito', $exito );
			$this->setParameter ( 'opt', '' );
			$this->listar($request,$session);
		}else{
			$error = Messages::ERROR_ACTUALIZAR;
			$this->asignarParametrosError($request,'m',$this->modelo,'actualizar','',$this->campos);
			$this->setParameter( 'opt', 'mr' );
			$this->ver ( 'edocivil.tpl' );
		}
	}
	function verEditar($request,$session,$opcionMod=false){
		$this->llamadoXajax ( 'edocivil' );
		$opcion = $request ['opcion'];
		$this->inicializarAtributos($request,'id');
		$objEdocivil = new Edocivil ();
		$tablaResultado = $objEdocivil->consultarEdocivilXidEdoCivil($this->id);
		$objEdocivil->cerrarConexion();
		if ($tablaResultado) {
			$tablaResultado = $tablaResultado[0];
			if ($opcionMod) {
				$this->asignarParametros($request,'vr',$this->modelo,$opcion,null,$tablaResultado,$this->campos);
				$this->setParameter ( 'etiquetaModulo', 'Consultar'. ' ' .$this->modulo);
				$this->ver('veredocivil.tpl', true );
			}else{
				$this->asignarParametros($request,'mr',$this->modelo,$opcion,null,$tablaResultado,$this->campos);
				$this->setParameter ( 'etiquetaModulo', 'Editar'. ' ' .$this->modulo);
				$this->ver('edocivil.tpl');
			}
		}else{
//		$this->visualizar('principal/error.tpl');
		}
	}
	function consultar($request,$session){
		$this->verEditar($request,$session,true);
	}
	function eliminar($request,$session){
		$tablaResultado = false;
		$ids = $request['ids'];
		if ($ids == null || $ids == '') {
			return 0;
		}
		$objEdocivil = new Edocivil ();
		$arreglo_ids = split(',', $ids);
		foreach ($arreglo_ids as $idEdoCivil) {
			$tablaResultado = $objEdocivil->eliminarEdocivil($idEdoCivil);
		}
		$objEdocivil->cerrarConexion();
		if ($tablaResultado) {
			$exito = Messages::EXITO_ELIMINAR;
			$this->setParameter ( 'exito', $exito );
			$this->setParameter ( 'opt', '' );
			$this->listar($request,$session);
		}else{
			$error = Messages::ERROR_ELIMINAR;
			$this->setParameter ( 'error', $error );
			$this->listar($request,$session);
		}
	}
	function cancelar($request,$session){
		$this->listar($request,$session);
	}
	function home($request,$session){
		$this->verEditar('../principal/principal.php');
	}
function ver($pagina, $formatoImpresion = false){
		if($formatoImpresion) {
			$this->setTemplateDir ( VISTA . 'edocivil/' );
			$this->goForward ( $pagina );
		}else {
			$this->visualizar('edocivil/'.$pagina);
		}
	}
	function imprimir($request,$session){
		$mod = ucfirst ( @$request ['sec'] );
		$opt = '';
		if (isset ( $request ['id'] )) {
			$opt = $request ['id'];
		}
		$cad = trim ( 'imp' . $mod . '.php' );
		include $cad;
	}
	function ventanaConsultar($request,$session){
		$opcion = $request ['opcion'];
		$this->inicializarAtributos($request,'id');
		$objEdocivil = new Edocivil ();
		$tablaResultado = $objEdocivil->consultarEdocivilXid($this->id);
		$objEdocivil->cerrarConexion();
		if ($tablaResultado) {
				$this->asignarParametros($request,'vr',$this->modelo,$opcion,null,$tablaResultado,$this->campos);
				$this->setParameter ( 'etiquetaModulo', 'Consultar'. ' ' .$this->modulo);
				$this->ver('veredocivil.tpl',TRUE);
		}else{
//		$this->visualizar('principal/error.tpl');
		}
	}
}
?>