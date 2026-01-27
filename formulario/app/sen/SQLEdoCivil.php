<?php
/** 
 * @file SQLEdocivil.php 
 * 
 * Consultas SQL de la Tabla Edocivil 
 * 
 * @author SOLINF 
 * @version V 0.1 
 * @date 24/02/2020
 * 
 */
class SQLEdocivil {
	const AGREGAR_EDOCIVIL = "INSERT INTO EdoCivil (idEdoCivil, nomEdoCivil, descEdoCivil) VALUES (?, ?, ?) ";
	const ACTUALIZAR_EDOCIVIL = "UPDATE EdoCivil SET idEdoCivil = ?, nomEdoCivil = ?, descEdoCivil = ? WHERE idEdoCivil = ?";
	const ELIMINAR_EDOCIVIL = "DELETE FROM EdoCivil WHERE idEdoCivil = ?";
	const CONSULTAR_EDOCIVIL = "SELECT * FROM EdoCivil ORDER BY idEdoCivil";
	const CONSULTAR_EDOCIVIL_POR_IDEDOCIVIL = "SELECT * FROM EdoCivil WHERE idEdoCivil = ?";
	const CONSULTAR_EDOCIVIL_POR_NOMEDOCIVIL = "SELECT * FROM EdoCivil WHERE UPPER(nomEdoCiviledocivil) = UPPER(?)";
	const CONSULTAR_EDOCIVIL_POR_NOMEDOCIVIL_APROX = "SELECT * FROM EdoCivil WHERE UPPER(nomEdoCiviledocivil) LIKE UPPER(?) ORDER BY nomEdoCiviledocivil";
	const CONSULTAR_EDOCIVIL_POR_DESCEDOCIVIL = "SELECT * FROM EdoCivil WHERE UPPER(descEdoCiviledocivil) = UPPER(?)";
	const CONSULTAR_EDOCIVIL_POR_DESCEDOCIVIL_APROX = "SELECT * FROM EdoCivil WHERE UPPER(descEdoCiviledocivil) LIKE UPPER(?) ORDER BY descEdoCiviledocivil";
}
?>