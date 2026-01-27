<?php 
require_once('../../../config/config.php');
require_once(SENT .'Query.php');
require_once(SENT .'SQLLog.php');

class Log extends Query{
function __construct(){
		parent::abrirConexion();
}
/**
	function compAgregarcambiarTabla1cambiarTabla2($idlog, $idUsuario, $fechalog, $iplog, $accionlog) {
		$objcambiarTabla1 = new cambiarTabla1();
		$objcambiarTabla1->beginTransaction();
		$resultado1 = cambiarTabla1::agregarcambiarTabla1('aqui van los campos de tabla1');
		$idcambiarTabla1 = $objcambiarTabla1->consultarcambiarTabla1UltimoId();
		$resultado2 = cambiarTabla2::agregarcambiarTabla2($idlog, $idUsuario, $fechalog, $iplog, $accionlog, $id_log);
		if ($resultado1>0 AND $resultado2>0) {
			cambiarTabla2::commitTransaction();
			$objcambiarTabla1->commitTransaction();
			cambiarTabla2::desconectar();
			$objcambiarTabla1->desconectar();
			return true;
		}else{
			cambiarTabla2::rollbackTransaction();
			$objcambiarTabla1->rollbackTransaction();
			cambiarTabla2::desconectar();
			$objcambiarTabla1->desconectar();
			return false;
		}
	}
	function compActualizarcambiarTabla1cambiarTabla2($idlog, $idUsuario, $fechalog, $iplog, $accionlog) {
		$objcambiarTabla1 = new cambiarTabla1();
		$objcambiarTabla1->beginTransaction();
		$resultado1 = cambiarTabla1::actualizarcambiarTabla1('aqui van los campos de tabla1');
		$resultado2 = cambiarTabla2::actualizarcambiarTabla2($idlog, $idUsuario, $fechalog, $iplog, $accionlog, $id_log);
		if ($resultado1>0 AND $resultado2>0) {
			cambiarTabla2::commitTransaction();
			$objcambiarTabla1->commitTransaction();
			cambiarTabla2::desconectar();
			$objcambiarTabla1->desconectar();
			return true;
		}else{
			cambiarTabla2::rollbackTransaction();
			$objcambiarTabla1->rollbackTransaction();
			cambiarTabla2::desconectar();
			$objcambiarTabla1->desconectar();
			return false;
		}
	}
	*/ 
	function agregarLog($idlog, $idUsuario, $fechalog, $iplog, $accionlog) {
$idlog = parent::prepareParam($idlog, Query::DATATYPE_INTEGER);
$idUsuario = parent::prepareParam($idUsuario, Query::DATATYPE_INTEGER);
$iplog = parent::prepareParam($iplog, Query::DATATYPE_STRING, 0);
$accionlog = parent::prepareParam($accionlog, Query::DATATYPE_STRING, 0);
		
		$params = array($idlog, $idUsuario, $fechalog, $iplog, $accionlog);
		return parent::execute(SQLLog::AGREGAR_LOG, $params);
	}

	function actualizarLog($idlog, $idUsuario, $fechalog, $iplog, $accionlog, $id_log){
		
$idlog = parent::prepareParam($idlog, Query::DATATYPE_INTEGER);
$idUsuario = parent::prepareParam($idUsuario, Query::DATATYPE_INTEGER);
$iplog = parent::prepareParam($iplog, Query::DATATYPE_STRING, 0);
$accionlog = parent::prepareParam($accionlog, Query::DATATYPE_STRING, 0);

		
		$params = array($idlog, $idUsuario, $fechalog, $iplog, $accionlog, $id_log);
		return parent::execute(SQLLog::ACTUALIZAR_LOG, $params);		
	}
	
	
	function consultarLog(){	
		return parent::executeQuery(SQLLog::CONSULTAR_LOG);
	}	
	
	function eliminarLog($id_log){
		$params = array($id_log);
		return parent::execute(SQLLog::ELIMINAR_LOG, $params);		
	}
	
//------------------------------	
	function consultarLogXidlog($idlog){	
		$params = array($idlog);
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IDLOG, $params);
	}	
	
	function existeLogXidlog($idlog){
		$params = array($idlog);
		$tabla = parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IDLOG, $params);
		if (count($tabla)>0) {
			return true;			
		}
		return false;
	}	

	function consultarLogXidUsuario($idUsuario){	
		$params = array($idUsuario);
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IDUSUARIO, $params);
	}	
	
	function existeLogXidUsuario($idUsuario){
		$params = array($idUsuario);
		$tabla = parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IDUSUARIO, $params);
		if (count($tabla)>0) {
			return true;			
		}
		return false;
	}	

	function consultarLogXfechalog($fechalog){	
		$params = array($fechalog);
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_FECHALOG, $params);
	}	
	
	function existeLogXfechalog($fechalog){
		$params = array($fechalog);
		$tabla = parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_FECHALOG, $params);
		if (count($tabla)>0) {
			return true;			
		}
		return false;
	}	

	function consultarLogXiplog($iplog){	
		$params = array("%$iplog%");
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IPLOG, $params);
	}	
	
	function consultarLogXiplogAprox($iplog){	
		$params = array("%$iplog%");
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IPLOG_APROX, $params);
	}	
	
	function existeLogXiplog($iplog){
		$params = array($iplog);
		$tabla = parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_IPLOG, $params);
		if (count($tabla)>0) {
			return true;			
		}
		return false;
	}	

	function consultarLogXaccionlog($accionlog){	
		$params = array("%$accionlog%");
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_ACCIONLOG, $params);
	}	
	
	function consultarLogXaccionlogAprox($accionlog){	
		$params = array("%$accionlog%");
		return parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_ACCIONLOG_APROX, $params);
	}	
	
	function existeLogXaccionlog($accionlog){
		$params = array($accionlog);
		$tabla = parent::executeQuery(SQLLog::CONSULTAR_LOG_POR_ACCIONLOG, $params);
		if (count($tabla)>0) {
			return true;			
		}
		return false;
	}	

//------------------------------	

 //INICIO COMBOS 

 //FIN COMBOS 
}
?>