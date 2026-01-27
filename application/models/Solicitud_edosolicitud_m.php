<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
// require_once('Persona_m.php');
//
//require_once('Rol_m.php');

//
class Solicitud_edosolicitud_m extends MY_Model
{
	// constructor
	public function __construct()
	{
		parent::__construct();
// 		$this->load->library(array('utilidades', 'email'));
		$this->tabla 		 = 'sol_solicitud_edosolicitud';
// 		$this->vista 		 = 'solicitud_view';
		$this->id 			 = 0;
// 		$this->persona_fk	 = 0;
// 		$this->rol_fk		 = 0;
// 		$this->correo_chk    = FALSE;
// 		$this->ultimo_acceso = NULL;
// 		$this->oPersona 	 = new Persona_m();
// 		$this->oRol 	 	 = new Rol_m();
	}
	/////////////////////////////// FIN DE: __construct ////////////////////////

	/**
	 * Agregar un estado de la solicitud.
	 *
	 * @access 		public
	 * @param 		string 	clave del solicitud
	 * @return 		bool 	resultado del proceso
	 * @author 		Gianny Josué Villarreal B <josue.villarreal@gmail.com>
	 * @version 	05/07/2020
	 **/
	public function nuevoEdoSol() 
	{
	    // agrego el odoSolicitud
	    $this->datos = array(
	        'idusuario' 		=> $this->datos['idUsuario'],
	        'idedosolicitud' 		=> $this->datos['idedosolicitud'],
	        'idsolicitud' 		=> $this->datos['idsolicitud'],
	        'fecarc_edosolicitud' 		=> $this->datos['fecarc_edosolicitud'],
	        'obsarc_edosolicitud' 		=> $this->datos['obsarc_edosolicitud']
	    );
	    if (! $this->upd()) {
	        $this->success = -3;
	        $this->mensaje = 'Error: Ocurrio un error mientras se grababa el estado de la solicitud.';
	        return FALSE;
	    }
	    
	    // actualizo su correo...por si lo necesita
// 	    $this->oPersona->set_datos(
// 	        array('correo' => $correo)
// 	        );
// 	    $this->oPersona->upd();
// 	    return TRUE;
	}
	/////////////////////////////// FIN DE: nuevo ////////////////////////////////
	
}

/* End of file Solicitud_edosolicitud_m.php */
/* Location: ./application/models */
