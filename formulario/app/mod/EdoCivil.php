<?php
require_once ('../../../config/config.php');
require_once (SENT . 'Query.php');
require_once (SENT . 'SQLEdoCivil.php');
class EdoCivil extends Query {
	function __construct() {
		parent::abrirConexion ();
	}
	/**
	function compAgregarcambiarTabla1cambiarTabla2($idEdoCivil, $nomEdoCivil, $descEdoCivil) {
		$objcambiarTabla1 = new cambiarTabla1();
		$objcambiarTabla1->beginTransaction();
		$resultado1 = cambiarTabla1::agregarcambiarTabla1('aqui van los campos de tabla1');
		$idcambiarTabla1 = $objcambiarTabla1->consultarcambiarTabla1UltimoId();
		$resultado2 = cambiarTabla2::agregarcambiarTabla2($idEdoCivil, $nomEdoCivil, $descEdoCivil, $id_edocivil);
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
	function compActualizarcambiarTabla1cambiarTabla2($idEdoCivil, $nomEdoCivil, $descEdoCivil) {
		$objcambiarTabla1 = new cambiarTabla1();
		$objcambiarTabla1->beginTransaction();
		$resultado1 = cambiarTabla1::actualizarcambiarTabla1('aqui van los campos de tabla1');
		$resultado2 = cambiarTabla2::actualizarcambiarTabla2($idEdoCivil, $nomEdoCivil, $descEdoCivil, $id_edocivil);
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
	function agregarEdocivil($idEdoCivil, $nomEdoCivil, $descEdoCivil) {
		$idEdoCivil = parent::prepareParam ( $idEdoCivil, Query::DATATYPE_INTEGER );
		$nomEdoCivil = parent::prepareParam ( $nomEdoCivil, Query::DATATYPE_STRING, 0 );
		$descEdoCivil = parent::prepareParam ( $descEdoCivil, Query::DATATYPE_STRING, 0 );
		$params = array ($idEdoCivil, $nomEdoCivil, $descEdoCivil );
		return parent::execute ( SQLEdocivil::AGREGAR_EDOCIVIL, $params );
	}
	function actualizarEdocivil($idEdoCivil, $nomEdoCivil, $descEdoCivil, $id_edocivil) {
		$idEdoCivil = parent::prepareParam ( $idEdoCivil, Query::DATATYPE_INTEGER );
		$nomEdoCivil = parent::prepareParam ( $nomEdoCivil, Query::DATATYPE_STRING, 0 );
		$descEdoCivil = parent::prepareParam ( $descEdoCivil, Query::DATATYPE_STRING, 0 );
		$params = array ($idEdoCivil, $nomEdoCivil, $descEdoCivil, $id_edocivil );
		return parent::execute ( SQLEdocivil::ACTUALIZAR_EDOCIVIL, $params );
	}
	function consultarEdocivil() {
		return parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL );
	}
	function eliminarEdocivil($id_edocivil) {
		$params = array ($id_edocivil );
		return parent::execute ( SQLEdocivil::ELIMINAR_EDOCIVIL, $params );
	}
	//------------------------------	
	function consultarEdocivilXidEdoCivil($idEdoCivil) {
		$params = array ($idEdoCivil );
		return parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_IDEDOCIVIL, $params );
	}
	function existeEdocivilXidEdoCivil($idEdoCivil) {
		$params = array ($idEdoCivil );
		$tabla = parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_IDEDOCIVIL, $params );
		if (count ( $tabla ) > 0) {
			return true;
		}
		return false;
	}
	function consultarEdocivilXnomEdoCivil($nomEdoCivil) {
		$params = array ("%$nomEdoCivil%" );
		return parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_NOMEDOCIVIL, $params );
	}
	function consultarEdocivilXnomEdoCivilAprox($nomEdoCivil) {
		$params = array ("%$nomEdoCivil%" );
		return parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_NOMEDOCIVIL_APROX, $params );
	}
	function existeEdocivilXnomEdoCivil($nomEdoCivil) {
		$params = array ($nomEdoCivil );
		$tabla = parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_NOMEDOCIVIL, $params );
		if (count ( $tabla ) > 0) {
			return true;
		}
		return false;
	}
	function consultarEdocivilXdescEdoCivil($descEdoCivil) {
		$params = array ("%$descEdoCivil%" );
		return parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_DESCEDOCIVIL, $params );
	}
	function consultarEdocivilXdescEdoCivilAprox($descEdoCivil) {
		$params = array ("%$descEdoCivil%" );
		return parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_DESCEDOCIVIL_APROX, $params );
	}
	function existeEdocivilXdescEdoCivil($descEdoCivil) {
		$params = array ($descEdoCivil );
		$tabla = parent::executeQuery ( SQLEdocivil::CONSULTAR_EDOCIVIL_POR_DESCEDOCIVIL, $params );
		if (count ( $tabla ) > 0) {
			return true;
		}
		return false;
	}
	//------------------------------	
//INICIO COMBOS 
//FIN COMBOS 
}
?>