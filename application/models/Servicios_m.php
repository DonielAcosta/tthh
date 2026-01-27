<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Solicitud_edosolicitud_m.php');

class Servicios_m extends MY_Model
{
	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('archivos'));
		$this->tabla 		 = 'sol_solicitud';
		$this->vista 		 = 'sol_solicitud_view';
		$this->id 			 = 0;
		$this->ultimo_acceso = NULL;
	}
	/**
	 * Agregar una solicitud.
	 *
	 * @access 		public
	 * @return 		bool 	resultado del proceso
	 * @author 		Gianny Josué Villarreal B <josue.villarreal@gmail.com>
	 * @version 	05/07/2020
	 **/
	public function nuevaSolicitud() 
	{
	    $obsArc_EdoSolicitud = $this->datos['obsArc_EdoSolicitud'];
// 	    $idEdoSolicitud = 1;
	    $idEdoSolicitud = $this->datos['idEdoSolicitud'];
	    $objArchivo = $this->datos['objArchivo'];
	    
	    $rutaAnioMes = '';
	    $objArchivo = $this->datos['objArchivo'];
	    $adjsolicitud = '';
	    
	    if ($objArchivo!=NULL) {
	        $tipoArchivo = $objArchivo ["type"];
	        $preNombre = date('dmY').rand(1,100);
	        $nomArchivo = $preNombre.'_'.$objArchivo ["name"];
	        $tamanoArchivo = $objArchivo ["size"];
	        $temporal = $objArchivo ["tmp_name"];
	        $rutaAnioMes = date ( 'Y' ) . '/' . date ( 'm' ) . '/';
	        $extension = explode ( ".", $nomArchivo );
	        $num = count ( $extension ) - 1;
	        if ($tamanoArchivo > 1000000) {
	            $mensaje = "Error, el archivo supera los 1000kb";
	            $resArchivo = array('res'=>false ,"mns"=>$mensaje);
	            return $resArchivo;
	        }
// 	        if ($tipoArchivo == "pdf" || $tipoArchivo == "PDF" || $tipoArchivo == "jpg" || $tipoArchivo == "jpg") {
	        if ($extension [$num] == "pdf" || $extension [$num] == "PDF" || $extension [$num] == "jpg" || $extension [$num] == "jpg") {
	        }else{
	            $mensaje = "Error, el formato de archivo <b><i>.".$extension [$num]."</i></b> no es valido";
	            $resArchivo = array('res'=>false ,"mns"=>$mensaje);
	            return $resArchivo;
	        }
	        $adjsolicitud = $rutaAnioMes.$nomArchivo;
	    }
// 	    var_dump($objArchivo);die();
	    // agrego la solicitud
	    $this->datos = array(
// 	        'persona_fk' 	=> $this->oPersona->id,
	        'idusuariosolicitud'   => $this->session->usuario_id,
	        'asuntosolicitud'      => $this->datos['asuntosolicitud'],
	        'iddestsolicitud'      => $this->datos['iddestsolicitud'],
	        'descsolicitud'        => $this->datos['descsolicitud'],
	        'emailaltsolicitud'    => $this->datos['emailaltsolicitud'],
	        'adjsolicitud' 		   => $this->datos['adjsolicitud'],
	        'fecregsolicitud'      => $this->datos['fecregsolicitud'],
	        // 			'fecRespSol' 		=> $this->datos['fecRespSol'],
	        'adjsolicitud' 		=> $adjsolicitud
	    );
	    $res = $this->ingresar();
	    
// 	    echo "Imprimiendo res = [$res]<br>";
// 	    var_dump($res);die();
// 	    if (! $this->upd()) {
	    if (!$res) {
	        $this->success = -3;
	        $this->mensaje = 'Error: Ocurrio un error mientras se grababa el solicitud.';
	        return FALSE;
	    }else{
	        $oSolEdo 	 = new Solicitud_edosolicitud_m();
	        $oSolEdo->set_datos(
	            array(
	                'idusuario' 		=> $this->session->usuario_id,
	                'idsolicitud' 		=> $res,
	                'idedosolicitud' 		=> $idEdoSolicitud,
	                'fecarc_edosolicitud' 		=> date('Y-m-d'),
	                'obsarc_edosolicitud' 		=> $obsArc_EdoSolicitud
	            )
	            );
// 	        $this->oSolEdo->nuevoEdoSol();
	        $resEdo = $oSolEdo->upd();
	        
	        if ($objArchivo!=NULL) {
    	        /* Subiendo archivo */
//     	        $path = FCPATH.'public/adjuntos' . '/' . $rutaAnioMes;
//     	        $path = '/var/www/html/webtthh/'.'public/adjuntos' . '/' . $rutaAnioMes;
    	        
 	            //echo 'path_sistema ['.path_sistema.']';
	            
	            $path = path_sistema .'public/adjuntos' . '/' . $rutaAnioMes;
	            
    	        $this->archivos->crear_directorio ( $path );
    	        $resArchivo = $this->archivos->subirArchivo($nomArchivo, $tamanoArchivo, $temporal,'excel', $path);
	        }else{
	            $mensaje = '';
	            $resArchivo = array('res'=>$resEdo ,"mns"=>$mensaje);
	        }
	    }
	    return $resArchivo;
	}
	/////////////////////////////// FIN DE: nuevaSolicitud ////////////////////////////////
	/**
	 * Actualizar una solicitud.
	 *
	 * @access 		public
	 * @return 		bool 	resultado del proceso
	 * @author 		Gianny Josué Villarreal B <josue.villarreal@gmail.com>
	 * @version 	05/07/2020
	 **/
	public function actualizarSolicitud() 
	{
	    $idsolicitud = $this->datos['idsolicitud'];
	    $obsArc_EdoSolicitud = $this->datos['obsArc_EdoSolicitud'];
	    $idEdoSolicitud = $this->datos['idEdoSolicitud'];
// 	    $idEdoSolicitud = 1;
	    $objArchivo = $this->datos['objArchivo'];
	    
	    $rutaAnioMes = '';
	    $objArchivo = $this->datos['objArchivo'];
	    
	    if ($objArchivo!=NULL) {
	        $tipoArchivo = $objArchivo ["type"];
	        $preNombre = date('dmY').rand(1,100);
	        $nomArchivo = $preNombre.'_'.$objArchivo ["name"];
	        $tamanoArchivo = $objArchivo ["size"];
	        $temporal = $objArchivo ["tmp_name"];
	        $rutaAnioMes = date ( 'Y' ) . '/' . date ( 'm' ) . '/';
	        $extension = explode ( ".", $nomArchivo );
	        $num = count ( $extension ) - 1;
	        if ($tamanoArchivo > 1000000) {
	            $mensaje = "Error, el archivo supera los 1000kb";
	            $resArchivo = array('res'=>false ,"mns"=>$mensaje);
	            return $resArchivo;
	        }
// 	        if ($tipoArchivo == "pdf" || $tipoArchivo == "PDF" || $tipoArchivo == "jpg" || $tipoArchivo == "jpg") {
	        if ($extension [$num] == "pdf" || $extension [$num] == "PDF" || $extension [$num] == "jpg" || $extension [$num] == "jpg") {
	        }else{
	            $mensaje = "Error, el formato de archivo <b><i>.".$extension [$num]."</i></b> no es valido";
	            $resArchivo = array('res'=>false ,"mns"=>$mensaje);
	            return $resArchivo;
	        }
	    }
// 	    var_dump($objArchivo);die();
	    // agrego la solicitud
	    $this->datos = array(
// 	        'persona_fk' 	=> $this->oPersona->id,
	        'idsolicitud' 		=> $this->datos['idsolicitud'],
	        'asuntosolicitud' 		=> $this->datos['asuntosolicitud'],
	        'iddestsolicitud' 		=> $this->datos['iddestsolicitud'],
	        'descsolicitud' 		=> $this->datos['descsolicitud'],
	        'emailaltsolicitud' 		=> $this->datos['emailaltsolicitud'],
	        'adjsolicitud' 		=> $this->datos['adjsolicitud'],
	        'fecregsolicitud' 		=> $this->datos['fecregsolicitud'],
	        // 			'fecRespSol' 		=> $this->datos['fecRespSol'],
	        'adjsolicitud' 		=> $rutaAnioMes.$this->datos['adjsolicitud']
	    );
	    $res = $this->actualizar();
	    
// 	    echo "Imprimiendo res = [$res]<br>";
// 	    var_dump($res);die();
// 	    if (! $this->upd()) {
	    if (!$res) {
	        $this->success = -3;
	        $this->mensaje = 'Error: Ocurrio un error mientras se grababa el solicitud.';
	        return FALSE;
	    }else{
	        $oSolEdo 	 = new Solicitud_edosolicitud_m();
	        $oSolEdo->set_datos(
	            array(
	                'idusuario' 		=> $this->session->usuario_id,
	                'idsolicitud' 		=> $res,
	                'idedosolicitud' 		=> $idEdoSolicitud,
	                'fecarc_edosolicitud' 		=> date('Y-m-d'),
	                'obsarc_edosolicitud' 		=> $obsArc_EdoSolicitud
	            )
	            );
// 	        $this->oSolEdo->nuevoEdoSol();
	        $resEdo = $oSolEdo->upd();
	        
	        if ($objArchivo!=NULL) {
    	        /* Subiendo archivo */
//     	        $path = FCPATH.'public/adjuntos' . '/' . $rutaAnioMes;
//     	        $path = '/var/www/html/webtthh/'.'public/adjuntos' . '/' . $rutaAnioMes;

//     	        echo 'path_sistema ['.path_sistema.']';
    	        $path = path_sistema . '/' . $rutaAnioMes;
    	        
    	        $this->archivos->crear_directorio ( $path );
    	        $resArchivo = $this->archivos->subirArchivo($nomArchivo, $tamanoArchivo, $temporal,'excel', $path);
	        }else{
	            $mensaje = '';
	            $resArchivo = array('res'=>$resEdo ,"mns"=>$mensaje);
	        }
	    }
	    return $resArchivo;
	}
	/////////////////////////////// FIN DE: nuevaSolicitud ////////////////////////////////
	/*
	 * Retorna todas las solicitudes
	 *
	 * @return 	array
	 * @autor 	Giany Josue Villarreal B <josue.villarreal@gmail.com>
	 * @version  12/07/2020
	 */
	public function consultarSolicitudes()
	{
// 	    echo "aca con [".$this->session->usuario_id.']';
	    if ($this->session->rol_id!=2) {
// 	        $where = 'idusuario='.$this->session->persona_id;
	        $where = array('idusuario' => $this->session->usuario_id);
	        //$r = $this->db->get_where('sol_solicitud_view',$where, 1);
	        $r = $this->db->get_where('sol_solicitud_view',$where);
	    }else{
	        $r = $this->db->get_where('sol_solicitud_view');
	    }
// 	    $where = 'WHERE idusuario='.$this->session->persona_id;
// 	    $r = $this->db->get_where('sol_solicitud_view',$where, 1);
// 	    $r = $this->db->get_where('sol_solicitud_view');
// 	    var_dump($r);
	    if ($r->num_rows() == 0) {
	        $this->success = FALSE;
	        $this->mensaje = '!get';
	    }else{
	        return $r->result_array();
	    }
	}
	/////////////////////////////// FIN DE: consultar solicitudes ////////////////////////////////
	/*
	 * Retorna las solicitudes dado un campo
	 *
	 * @return 	array
	 * @autor 	Giany Josue Villarreal B <josue.villarreal@gmail.com>
	 * @version  12/07/2020
	 */
	public function consultarSolicitudesPorParametro($campo, $valor)
	{
// 	    $r = $this->db->get_where('sol_solicitud_view');
	    $r = $this->db->get_where('sol_solicitud_view', array($campo => $valor), 1);
	    if ($r->num_rows() == 0) {
	        $this->success = FALSE;
	        $this->mensaje = '!get';
	    }else{
	        return $r->result_array();
	    }
	}
	/////////////////////////////// FIN DE: consultar solicitudes ////////////////////////////////
	
	function ultimoId(){
	    
	}
}

/* End of file Servicios_m.php */
/* Location: ./application/models */