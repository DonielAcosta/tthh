<?php 
/** 
 * @file SQLLog.php 
 *  
 * Consultas SQL de la Tabla Log 
 * 
 * @author SOLINF 
 * @version V 0.1 
 * @date 24/02/2020
 *  
*/ 
class SQLLog 
{ 
  const AGREGAR_LOG = "INSERT INTO log (idlog, idUsuario, fechalog, iplog, accionlog) VALUES (?, ?, ?, ?, ?) ";

  const ACTUALIZAR_LOG = "UPDATE log SET idlog = ?, idUsuario = ?, fechalog = ?, iplog = ?, accionlog = ? WHERE id_log = ?";

  const ELIMINAR_LOG = "DELETE FROM log WHERE id_log = ?";

  const CONSULTAR_LOG = "SELECT * FROM log ORDER BY idlog";

  const CONSULTAR_LOG_POR_IDLOG = "SELECT * FROM log WHERE idlog_log = ?";

  const CONSULTAR_LOG_POR_IDUSUARIO = "SELECT * FROM log WHERE idUsuario_log = ?";

  const CONSULTAR_LOG_POR_FECHALOG = "SELECT * FROM log WHERE fechalog_log = ?";

  const CONSULTAR_LOG_POR_IPLOG = "SELECT * FROM log WHERE UPPER(iploglog) = UPPER(?)";

  const CONSULTAR_LOG_POR_IPLOG_APROX = "SELECT * FROM log WHERE UPPER(iploglog) LIKE UPPER(?) ORDER BY iploglog";

  const CONSULTAR_LOG_POR_ACCIONLOG = "SELECT * FROM log WHERE UPPER(accionloglog) = UPPER(?)";

  const CONSULTAR_LOG_POR_ACCIONLOG_APROX = "SELECT * FROM log WHERE UPPER(accionloglog) LIKE UPPER(?) ORDER BY accionloglog";

}
?>