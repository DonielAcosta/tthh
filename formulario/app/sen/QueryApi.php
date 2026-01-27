<?php
$dirBase = dirname(__FILE__);
//echo "-$dirBase-";
require_once("$dirBase/../mod/Log.php");
class QueryApi {
	/**
	 * Constantes transaccionales
	 *
	 */
	const READ_UNCOMMITTED = "READ UNCOMMITTED"; // allows dirty reads, but fastest
	const READ_COMMITTED = "READ COMMITTED";     // default postgres, mssql and oci8
	const REPEATABLE_READ = "REPEATABLE READ";   // default mysql
	const SERIALIZABLE = "SERIALIZABLE";         //slowest and most restrictive

	/**
	 * Constantes de tipos de datos
	 */
	const DATATYPE_STRING = 1;
	const DATATYPE_INTEGER = 2;
	const DATATYPE_DOUBLE = 3;
	const DATATYPE_DATE = 4;
	const DATATYPE_DATETIME = 8;
	const DATATYPE_BOOLEAN = 5;	
	const DATATYPE_BIT = 6;	
	const DATATYPE_MONEDA = 7;	

	/**
 	 * Atributos de la clase
 	 *
 	 */
	private $conn;
	private $dns;

	/**
	 * Constructor
	 *
	 * @param String $dns Cadena de conexion a la base de datos
	 * @return Query
	 */
	function Query($dns=null) {
//		sybase_min_client_severity(100);
//		sybase_min_server_severity(100);
		//$this->conn = NewADOConnection(DRIVER);
		//$this->conn->Connect(SERVER,USER,PASSWORDBD,DATABASE);
//		$this->EXECUTE("set names 'utf8'");
		
		try{ 
//			$this->conn = NewADOConnection(DRIVER);
//		    $this->conn->Connect(SERVER,USER,PASSWORDBD,DATABASE); 
		}catch (exception $e){ 
//		    var_dump($e); 
		}
//   		if(!$this->conn->IsConnected)
//        {
//           die("conexión abierta");
//        }
		
	}
	/*
	function __construct(){
		$this->abrirConexion();
	}
	*/
	/**
	 * Establece la conexion
	 */
	function abrirConexion(){
		//$this->conn = NewADOConnection(DRIVER);
		//$this->conn->Connect(SERVER,USER,PASSWORDBD,DATABASE);
		try { 
//			$this->conn = NewADOConnection(DRIVER);
//			$this->conn->Connect(SERVER,USER,PASSWORDBD,DATABASE);
		} catch (exception $e) { 
			//var_dump($e);
			//echo "aca toy";
			//exit(1); 
			//return false;
			//die();
		}		
	}
	function abrirConexionConParam($server,$user,$passwordbd,$database){
		try { 
			$this->conn = NewADOConnection(DRIVER);
			$this->conn->Connect($server,$user,$passwordbd,$database);
		} catch (exception $e) { 
			//var_dump($e);
			echo "Error de Conexion con parametros";
			//exit(1); 
			return false;
			//die();
		}		
	}
	
	/**
	 * Cierra la conexion
	 */
	function cerrarConexion(){
		//$this->conn->close();
	}	
	/**
	 * Inicia una transaccion
	 *
	 * @param string $isolationLevel Nivel de aislamiento transaccional
	 * @return boolean True, si fue iniciada la transaccion
	 */
	function iniciarTransaccion(){
		return $this->conn->StartTrans();
	}
	function beginTransaction($isolationLevel="READ COMMITTED"){
		//$this->conn->SetTransactionMode($isolationLevel);
		return $this->conn->BeginTrans();
	}
	
	function finalizarTransaccion(){
		return $this->conn->CompleteTrans();
	}
	/**
	 * Guarda una transaccion
	 *
	 * @return boolean True, si fue finalizada la transaccion
	 */
	function commitTransaction(){
		return $this->conn->CommitTrans();
	}

	/**
	 * Deshace una transaccion
	 *
	 * @return boolean True, si la transaccion fue revertida
	 */
	function rollbackTransaction(){
		return $this->conn->RollbackTrans();
	}


	/**
	 * Ejecuta una consulta SQL de tipo SELECT
	 *
	 * @param string $sql Cadena de consulta SQL
	 * @param array $params Lista de parametros
	 * @return array Tabla
	 */
	function executeQuerySesion($urlAPI, $params=null){
//		echo "+ $sql + conseguido: ";
		try {
		$urlAPI = 'http://curabitur.pe/api/'.$urlAPI;
		//$urlAPI = urlencode("http://curabitur.pe/api/login");
		//		$_SERVER['REQUEST_METHOD']
		//$opciones = array(
		//  'http'=>array(
		//    'method'=>"POST",
		//	'header' => "User-Agent:MyAgent/1.0\r\n"
		//  )
		//);		
//		$contexto = stream_context_create ( $opciones );
		//		$res = file_get_contents($urlAPI, false, $contexto);
		//		echo $res;
//		$login = "josue@gmail.com";
//		$clave = "123456";
//curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$accessToken]);
		$curl = curl_init ();
		curl_setopt_array ( $curl, array (CURLOPT_PORT => "80", 
		CURLOPT_URL => $urlAPI, 
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_ENCODING => "", 
		CURLOPT_MAXREDIRS => 10, 
		CURLOPT_TIMEOUT => 30, 
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
		
		CURLOPT_CUSTOMREQUEST => "POST", 
		CURLOPT_POSTFIELDS => $params, 
		CURLOPT_HTTPHEADER => array ("Cache-Control: no-cache") ) );
		$response = curl_exec ( $curl );
		$err = curl_error ( $curl );
		curl_close ( $curl );
//			$response = json_decode ( $response );
			$response = json_decode ( $response,true );
			return $response;
		} catch (Exception $e) {
//			echo 'Exception in executeQuery(): ',  $e->getMessage(), "<br>";
//	   		$this->desconectar();
	   		return $err;
		}
		return null;
	}
	function executeQuery($urlAPI, $params=null){
//		echo "+ $sql + conseguido: ";
		try {
		$urlAPI = 'http://curabitur.pe/api/'.$urlAPI;
		//$urlAPI = urlencode("http://curabitur.pe/api/login");
		//		$_SERVER['REQUEST_METHOD']
		//$opciones = array(
		//  'http'=>array(
		//    'method'=>"POST",
		//	'header' => "User-Agent:MyAgent/1.0\r\n"
		//  )
		//);		
//		$contexto = stream_context_create ( $opciones );
		//		$res = file_get_contents($urlAPI, false, $contexto);
		//		echo $res;
//		$login = "josue@gmail.com";
//		$clave = "123456";
//curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$accessToken]);
		$curl = curl_init ();
		curl_setopt_array ( $curl, array (CURLOPT_PORT => "80", 
		CURLOPT_URL => $urlAPI, 
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_ENCODING => "", 
		CURLOPT_MAXREDIRS => 10, 
		CURLOPT_TIMEOUT => 30, 
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
		
		CURLOPT_CUSTOMREQUEST => "POST", 
		CURLOPT_POSTFIELDS => $params, 
		CURLOPT_HTTPHEADER => array ("Cache-Control: no-cache", 
		"Authorization: Bearer ".$_SESSION ['token'] ) ) );
		$response = curl_exec ( $curl );
		$err = curl_error ( $curl );
		curl_close ( $curl );
//			$response = json_decode ( $response );
			$response = json_decode ( $response,true );
			return $response;
		} catch (Exception $e) {
//			echo 'Exception in executeQuery(): ',  $e->getMessage(), "<br>";
//	   		$this->desconectar();
	   		return $err;
		}
		return null;
	}
	function executeGET($urlAPI, $params=null){
//		echo "+ $sql + conseguido: ";
		try {
		$urlAPI = 'http://curabitur.pe/api/'.$urlAPI;
		if ($params) {
			$urlAPI = $urlAPI.'?'.$params;
		}
//		echo "[$urlAPI]";
		//$urlAPI = urlencode("http://curabitur.pe/api/login");
		//		$_SERVER['REQUEST_METHOD']
		//$opciones = array(
		//  'http'=>array(
		//    'method'=>"POST",
		//	'header' => "User-Agent:MyAgent/1.0\r\n"
		//  )
		//);		
//		$contexto = stream_context_create ( $opciones );
		//		$res = file_get_contents($urlAPI, false, $contexto);
		//		echo $res;
//		$login = "josue@gmail.com";
//		$clave = "123456";
//curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$accessToken]);
		$curl = curl_init ();
		curl_setopt_array ( $curl, array (CURLOPT_PORT => "80", 
		CURLOPT_URL => $urlAPI, 
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_ENCODING => "", 
		CURLOPT_MAXREDIRS => 10, 
		CURLOPT_TIMEOUT => 50, 
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
		
		CURLOPT_CUSTOMREQUEST => "GET", 
		CURLOPT_POSTFIELDS => $params, 
//		CURLOPT_HTTPHEADER => array ("Cache-Control: no-cache", 
//		"Authorization: Bearer ".$_SESSION ['token'] ) ) );
		CURLOPT_HTTPHEADER => array ("Cache-Control: no-cache", 
		"Authorization: Bearer 8xviHq51aL5AdlKQySF1CleoB6Of4U1oYnm7rG4GqqvX12m3BFwVbE6OGhhGp6yA3oHHO8lfjNlLQzLD6rkiFjtV6szmk3d3RCs1" ) ) );
//		"Authorization: Bearer EzGcZUSOJcqJaIFBvkwfiiLwAHKlNvD7JUZudnelcyTPN54B2rodIZ9Bc5KFXIAzmujlgVP8eVT2nnNcgRogm7RUQg1PxG6CqZ9J" ) ) );
		$response = curl_exec ( $curl );
		$err = curl_error ( $curl );
		curl_close ( $curl );
//			$response = json_decode ( $response );
			$response = json_decode ( $response,true );
			return $response;
		} catch (Exception $e) {
			echo 'Exception in executeQuery(): ',  $e->getMessage(), "<br>";
//	   		$this->desconectar();
	   		return $err;
		}
		return null;
	}
	function executePOST($urlAPI, $params=null){
//		echo "+ $sql + conseguido: ";
		try {
		$urlAPI = 'http://curabitur.pe/api/'.$urlAPI;
		if ($params) {
			$urlAPI = $urlAPI.'?'.$params;
		}
//		echo "[$urlAPI]";
		//$urlAPI = urlencode("http://curabitur.pe/api/login");
		//		$_SERVER['REQUEST_METHOD']
		//$opciones = array(
		//  'http'=>array(
		//    'method'=>"POST",
		//	'header' => "User-Agent:MyAgent/1.0\r\n"
		//  )
		//);		
//		$contexto = stream_context_create ( $opciones );
		//		$res = file_get_contents($urlAPI, false, $contexto);
		//		echo $res;
//		$login = "josue@gmail.com";
//		$clave = "123456";
//curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$accessToken]);
		$curl = curl_init ();
		curl_setopt_array ( $curl, array (CURLOPT_PORT => "80", 
		CURLOPT_URL => $urlAPI, 
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_ENCODING => "", 
		CURLOPT_MAXREDIRS => 10, 
		CURLOPT_TIMEOUT => 30, 
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
		
		CURLOPT_CUSTOMREQUEST => "POST", 
		CURLOPT_POSTFIELDS => $params, 
		CURLOPT_HTTPHEADER => array ("Cache-Control: no-cache", 
		"Authorization: Bearer ".$_SESSION ['token'] ) ) );
		$response = curl_exec ( $curl );
		$err = curl_error ( $curl );
		curl_close ( $curl );
//			$response = json_decode ( $response );
			$response = json_decode ( $response,true );
			return $response;
		} catch (Exception $e) {
			echo 'Exception in executeQuery(): ',  $e->getMessage(), "<br>";
//	   		$this->desconectar();
	   		return $err;
		}
		return null;
	}
	/**
	 * Ejecuta una consulta SQL de tipo INSERT, UPDATE, DELETE
	 *
	 * @param string $sql Cadena de consulta SQL de actualizacion
	 * @param array $params Lista de parametros
	 * @return int Numero de filas afectadas
	 */
	function execute($sql, $params=null,$opcionLog=false){
//		echo "--- $sql <br>";
//		var_dump($params);
//		die();
		try {
			if ($params == null) {
				$this->conn->Execute($sql);
			} else {
				$this->conn->Execute($sql, $params);
				if ($opcionLog==true) {
					$this->log($sql, $params);
				}				
			}
//			if ( $this->conn->ErrorMsg() != "" ) {
//				throw new Exception($this->conn->ErrorMsg());
//			}
			$filasAfectadas = $this->conn->Affected_Rows();
//			$this->desconectar();
			return $filasAfectadas;
		} catch (Exception $e) {
	   		echo 'Caught exception in execute(): ',  $e->getMessage(), "<br>";
//	   		throw new Exception($this->conn->ErrorMsg());
	   		$this->desconectar();
		}
		return null;
	}

	/**
	 * Retorna el proximo ID de una secuencia
	 *
	 * @param string $secuencia Nombre de la secuencia
	 * @return integer ID
	 */
	function nextSequenceID($sequence_name){
		$params = array($sequence_name);
		$tabla = $this->executeQuery("SELECT nextval(?)", $params);
		if (count($tabla) > 0) {
			return $tabla[0]['nextval'];
		}
		return null;
	}
	public function desconectar(){
	    $this->conn->Close();
	    return 1;
	}  
	/**
	 * Prepara los parametros de consulta
	 *
	 * @param var Valor del parametro
	 * @param string Tipo de dato: string, integer, double, date, boolean
	 * @param integer Longitud maxima. Solo para tipo string
	 * @return var Valor preparado
	 */
	function prepareParam($value, $datatype=null, $length=null){
		switch ($datatype) {
			case self::DATATYPE_STRING:
				$value = trim($value);
//				$value = settype($value, "string");
				if ($value===0) {
					$value = '0';
				}
				if ($length==null) {
//					$value = utf8_encode($value);
					$value = mb_convert_encoding($value, "ISO-8859-1", "UTF-8");
					$value = is_string($value) ? $value : null;
				} else {
					$value = mb_convert_encoding($value, "ISO-8859-1", "UTF-8");
//					$value = utf8_encode($value);
					$value = is_string($value) && $length>0 ? substr($value, 0, $length) : null;
//					$value = is_string($value) && $length>0 ? substr($value, 0, $length) : '';
				}
//				echo "++$value--";
				if (strlen($value)==0) {
					$value=null;
				}
//				echo "++$value--";
				break;
			case self::DATATYPE_INTEGER:
				if (is_numeric($value)) {
//					echo "--$value--";
//					$value = intval($value);
					if ($value<2147483647) {
						$value = intval($value);
					}					
//					echo "++$value++";
				} else {
					$value = null;
				}
//				$value = is_numeric($value) ? settype($value,"integer") : null;
//				$value = is_numeric($value) ? $value : null;
				break;
			case self::DATATYPE_DOUBLE:
//				$value = is_numeric($value) ? $value : null;
				if (is_numeric($value)) {
//					echo "--$value--";
					$k = settype($value, "float");
//					echo "++$value++";
				} else {
					$value = null;
				}
				break;
			case self::DATATYPE_MONEDA:
//				$value = is_numeric($value) ? $value : null;
//				echo "[1] moneda: $value";
//				if (is_numeric($value)) {
				if (1) {
					$value = str_replace(',', '', $value);
//					echo "[1.1] moneda: $value";
//					$value = number_format ( $value, 2, ',', '' );
//					echo "[2] moneda: $value";
					$k = settype($value, "float");
//					echo "[3] moneda: $value";
				} else {
					$value = null;
				}
//				echo "[4] moneda: $value";
				break;
			case self::DATATYPE_DATE:
				$value = european2iso($value);
				$value = trim($value);
//				if (strpos($value,'-')!== false) {
//					$value = ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $value) ? $value : null;
//				}else{
//					$value = ereg("([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})", $value) ? $value : null;
//				}
				if (strpos($value,'-')!== false) {
//					$value = ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $value) ? $value : null;
					$value = preg_match ( "/^([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $value ) ? $value : null;
				}else{
//					$value = ereg("([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})", $value) ? $value : null;
					$value = preg_match ( "/^([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/", $value ) ? $value : null;
				}				
				break;
			case self::DATATYPE_DATETIME:
				$value = european2iso($value);
				$value = trim($value);
//				if (strpos($value,'-')!== false) {
//					$value = ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $value) ? $value : null;
//				}else{
//					$value = ereg("([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})", $value) ? $value : null;
//				}
//				if (strpos($value,'-')!== false) {
//					$value = ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $value) ? $value : null;
//				}else{
//					$value = ereg("([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})", $value) ? $value : null;
//				}				
				break;
			case self::DATATYPE_BOOLEAN:
				$value = is_bool($value) ? $value : null;
				break;
			case self::DATATYPE_BIT:
				if ($value == 1) {
					$value = intval($value);
				}elseif ($value == 0){
					$value = intval($value);
				}else{
					$value = null;
				}
				break;
			default:
				$value = null;
				break;
		}
		return $value;
	}

	/**
	 * Permite actualizar un campo Blob
	 *
	 * @param string $table Nombre de la tabla
	 * @param string $field_name Nombre del campo blob
	 * @param string $data Datos blob
	 * @param string $where Condicion
	 */
	function updateBlobField($table, $field_name, $data, $where){
		$this->conn->UpdateBlob($table, $field_name, $data, $where);
	}

	/**
	 * Retorna la fecha actual en el servidor
	 *
	 * @return date Fecha actual
	 */
	function currentDate(){
		$query = new Query();
		$tabla = $query->executeQuery("SELECT CURRENT_DATE AS now");
		if (count($tabla) > 0){
			return $tabla[0]["now"];
		}
		return null;
	}
	/**
	* FunciÃ³n para obtener la IP real de un cliente
	* CrÃ©dito: http://www.eslomas.com/index.php/archives/2005/04/26/obtencion-ip-real-php/
	*/
	function obtenerIP()
	{
	   if( @$_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	      // los proxys van aÃ±adiendo al final de esta cabecera
	      // las direcciones ip que van "ocultando". Para localizar la ip real
	      // del usuario se comienza a mirar por el principio hasta encontrar
	      // una direcciÃ³n ip que no sea del rango privado. En caso de no
	      // encontrarse ninguna se toma como valor el REMOTE_ADDR
	      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
	      reset($entries);
	      while (list(, $entry) = each($entries))
	      {
	         $entry = trim($entry);
	         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
	         {
	            // http://www.faqs.org/rfcs/rfc1918.html
	            $private_ip = array(
	                  '/^0\./',
	                  '/^127\.0\.0\.1/',
	                  '/^192\.168\..*/',
	                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
	                  '/^10\..*/');
	            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	            if ($client_ip != $found_ip)
	            {
	               $client_ip = $found_ip;
	               break;
	            }
	         }
	      }
	   }
	   else
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   }
	   return $client_ip;
	}
	/**
	 * Permite ingresar un registro en el log
	 *
	 * @param String $sql
	 * @param Array $parametros
	 * @return Integer Numero de registros actualizados
	 */
	function log($sql,$parametros){
		//$query = new Query();
		$aux = '';
		$fechaLog = date("Y-m-d h:i:s");
		$ipLog = $this->obtenerIP();
		if (count($parametros)>0) {
			foreach ($parametros as $ite){
				$aux = $aux . "'". trim($ite) . "'|";
			}
		}
		$sentenciaLog = addslashes("$sql||$aux");
		//$sentenciaLog = "$sql||$aux";
		if (isset($_SESSION['usuarioid'])) {
			$usuarioId = $_SESSION['usuarioid'];
		}else{
			$usuarioId = 1;
		}
		
//		$usuarioId = 1;
		//echo "($fechaLog,$ipLog,$sentenciaLog,$usuarioId)";
		$tabla = Log::agregarLog($usuarioId,$fechaLog,$ipLog,$sentenciaLog);
		return $tabla;
	}	
}
?>