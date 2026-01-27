<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
require_once('Persona_m.php');

//
require_once('Rol_m.php');

//
#[\AllowDynamicProperties]
class Usuario_m extends MY_Model
{
	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('utilidades', 'email'));
		$this->tabla 		 = 'usuario';
		$this->vista 		 = 'usuario_view';
		$this->id 			 = 0;
		$this->persona_fk	 = 0;
		$this->rol_fk		 = 0;
		$this->correo_chk    = FALSE;
		$this->ultimo_acceso = NULL;
		$this->oPersona 	 = new Persona_m();
		$this->oRol 	 	 = new Rol_m();
	}
	/////////////////////////////// FIN DE: __construct ////////////////////////

	/**
	 * Carga los datos de un usuario segun su id.
	 *
	 * @access 		public
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	17/07/2018
	 **/

	public function get_by_id() 
	{
		$r = $this->db->get_where('usuario_view', array('id' => $this->id), 1);
		if ($r->num_rows() == 0) {
			$this->success = FALSE;
			$this->mensaje = '!get';
		}
		else {
			$this->success = TRUE;
			$this->mensaje = 'get';
			$r = $r->row();
			$this->persona_fk 			= $r->persona_fk;
			$this->rol_fk				= $r->rol_fk;
			$this->correo_chk   		= $r->correo_chk;
			$this->ultimo_acceso 		= $r->ultimo_acceso;
			$this->oPersona->id 		= $r->persona_fk;
			$this->oPersona->get_by_id();
			$this->oRol->id 			= $r->rol_fk;
			$this->oRol->get_by_id();
		}
		return $this->success;
	}
	/////////////////////////////// FIN DE: get_by_id ////////////////////////////

	/**
	 * Carga los datos de un usuario.
	 *
	 * @access 		public
	 * @param 		string 	campo de busqueda
	 * @param 		mix 	valor a buscar
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	22/07/2018
	 **/

	public function get_data($campo, $valor) 
	{
		$r = $this->db->get_where('usuario_view', array($campo => $valor), 1);
		if ($r->num_rows() == 0) {
			$this->success = FALSE;
			$this->mensaje = '!get';
		}
		else {
			$this->success = TRUE;
			$this->mensaje = 'get';
			$r = $r->row();
			$this->id 					= $r->id;
			$this->persona_fk 			= $r->persona_fk;
			$this->rol_fk				= $r->rol_fk;
			$this->correo_chk   		= $r->correo_chk;
			$this->ultimo_acceso 		= $r->ultimo_acceso;
			$this->oPersona->id 		= $r->persona_fk;
			$this->oPersona->get_by_id();
			$this->oRol->id 			= $r->rol_fk;
			$this->oRol->get_by_id();
		}
		return $this->success;
	}
	///////////////////////////// FIN DE: get_data //////////////////////////

	/**
	 * El usuario esta logeado?
	 *
	 * @access 		public
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	28/06/2018
	 **/

	public function is_logueado()
	{
		return isset($this->session->usuario_id);
	}
	////////////////////////////// FIN DE: is_logueado ////////////////////////////////

	/**
	 * Agregar un usuario.
	 *
	 * @access 		public
	 * @param 		string 	clave del usuario
	 * @return 		bool 	resultado del proceso
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	09/07/2018
	 **/

	public function nuevo()
	{
		// verifico que el usuario no exista
		$r = $this->db->get_where('usuario_view', array('cedula' => $this->datos['cedula']), 1);
		if ($r->num_rows() == 1) {
			$this->success = 0;
			$this->mensaje = 'Error: El Usuario ya esta registrado.';
			return FALSE;
		}

		// verifico que la persona exista
		$this->oPersona->cedula = $this->datos['cedula'];
		if (! $this->oPersona->get_by_cedula()) {
			$this->success = -1;
			$this->mensaje = 'Error: La Persona no esta registrada en el Sistema.';
			return FALSE;
		}

		// verifico que el correo no exista
		$correo = $this->datos['correo'];
		if ($this->oPersona->is_correo($correo)) {
			$this->success = -2;
			$this->mensaje = 'Error: El correo Electrónico ingresado ya existe.';
			return FALSE;
		}

		// envio el correo de validacion
		$correo_clave = $this->utilidades->hash();
		$link = anchor("Usuario_c/valida_correo?id={$this->oPersona->id}&clave={$correo_clave}");
		$this->email->destino = $correo;
		$this->email->motivo = 'Talento Humano - Gobernación del Estado Mérida: Validación de Correo Electrónico';
		$this->email->mensaje = "Pulsa el enlace para finalizar tu Registro en nuestro servicio: {$link}";
		if (! $this->email->envia_correo()) {
			$this->success = -2;
			$this->mensaje = 'Error: Ocurrio un error mientras se enviada su correo.';
			return FALSE;
		}
		
		// agrego el usuario
		$this->datos = array(
			'persona_fk' 	=> $this->oPersona->id,
			'rol_fk' 		=> $this->datos['rol'],
			'clave'			=> $this->utilidades->hash($this->datos['clave']),
			'correo_clave'	=> $correo_clave
		);
		if (! $this->upd()) {
			$this->success = -3;
			$this->mensaje = 'Error: Ocurrio un error mientras se grababa el Usuario.';
			return FALSE;
		}

		// actualizo su correo...por si lo necesita
		$this->oPersona->set_datos(
			array('correo' => $correo)
		);
		$this->oPersona->upd();			
		return TRUE;
	}
	/////////////////////////////// FIN DE: nuevo ////////////////////////////////

	/**
	 * Validacion del correo electronico.
	 *
	 * @access 		public
	 * @param 		integer 	id de la persona
	 * @param 		string 		clave de validacion del correo
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	16/07/2018
	 **/

	public function valida_correo($persona_id, $clave)
	{
		$r = $this->db->where('persona_fk', $persona_id)
		     ->where('correo_clave', $clave)
		     ->limit(1)
		     ->get($this->vista);
		if ($r->num_rows() == 0)
		{
			$this->success = FALSE;
			$this->mensaje = 'Error: La persona no tiene correo por validar.';
		}
		else
		{
			$this->datos = array(
				'correo_chk' => TRUE,
			);
			$this->id = $r->row()->id;
			$this->success = $this->upd();
		}
		return $this->success; 
	}
	/////////////////////////// FIN DE: valida_correo ////////////////////////////

	/**
	 * El usuario esta registrado en el sistema?
	 *
	 * @access 		public
	 * @param 		string 	nombre del usuario (correo electronico)
	 * @param 		string 	clave del usuario
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	17/07/2018
	 **/

	public function login($usuario, $password)
	{
	    $r = $this->db->where('correo', $usuario)
		     ->where('clave', $this->utilidades->hash($password))
		     ->limit(1)
		     ->get($this->vista);
		if ($r->num_rows() == 0)
		{
			$this->success = FALSE;
			$this->mensaje = 'Error: La combinación correo y clave, no fue encontrada.';
		}
		else
		{
			$r = $r->row();
			if ($r->correo_chk == 'f') {
				$this->success = FALSE;
				$this->mensaje = 'Error: Tu dirección de correo aún no ha sido validada.';
			}
			else {
				$ua = new DateTime($r->ultimo_acceso);
				$this->session->usuario_id 		= $r->id;
				$this->session->rol_id 		    = $r->rol_fk;
				$this->session->persona_id 		= $r->persona_fk;
				$this->session->nombre 			= trim($r->apellido1).', '.trim($r->nombre1);
				$this->session->rol 			= $r->rol;
				$this->session->ultimo_acceso 	= $ua->format('d/m/Y H:i:s');
				$this->db->where('id', $r->id);
				$this->db->update('usuario', array('ultimo_acceso' => 'now()'));
				$this->success = TRUE;
			}
		}
		return $this->success;
	}
	//////////////////////////////// FIN DE: login ////////////////////////////////

	/**
	 * Olvide mi clave.
	 *
	 * @access 	public
	 * @return 	bool
	 * @author 	Carlos Iturralde <iturraldec@gmail.com>
	 * @version 22/07/2018
	 **/

	public function olvide_clave()
	{
		$clave = '123456';
		$this->email->destino = $this->oPersona->correo;
		$this->email->motivo = 'Talento Humano - Gobernación del Estado Mérida: Recuperación de clave de usuario';
		$this->email->mensaje = "Tu nueva clave es: $clave, por favor recuerda cambiarla a una más segura.";
		if (! $this->email->envia_correo()) {
			$this->success = FALSE;
		}
		else {
			$this->datos = array(
				'clave' => $this->utilidades->hash($clave)
			);
			$this->upd();
		}
		return $this->success; 
	}
	/////////////////////////// FIN DE: olvide_clave ////////////////////////////

	/**
	 * Cambia la clave del usuario.
	 *
	 * @param 		string 	clave actual
	 * @param 		string 	clave nueva
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	23/07/2018
	 **/

	public function cambia_clave($clavea, $claven)
	{
		$r = $this->db->get_where('usuario', 
				array('id' => $this->id, 'clave' => $this->utilidades->hash($clavea)),
				1);
		if ($r->num_rows() == 0) {
			$this->success = FALSE;
			$this->mensaje = "Error: Clave actual invalida.";
		}
		else {
			$this->datos = array(
				'clave' => $this->utilidades->hash($claven)
			);
			$this->success = $this->upd();
			if ($this->success) {
				$this->mensaje = 'Clave actualizada.';
			}
			else {
				$this->mensaje = 'Error: Ocurrio un error inesperado al actualizar la Clave de Usuario.';
			}
		}
		return $this->success; 
	}
	/////////////////////////// FIN DE: cambia_clave ////////////////////////////

	/**
	 * Cambia el correo del usuario.
	 *
	 * @param 		string 	nuevo correo
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	25/07/2019
	 **/

	public function cambia_correo($correo)
	{
		if (! $this->email->is_correo($correo)) {
			$this->success = FALSE;
			$this->mensaje = 'Error: La dirección de correo no es valida.';
		}
		elseif ($this->get_data('correo', $correo)) {
			$this->success = FALSE;
			$this->mensaje = 'Error: La dirección de correo ya existe.';
		}
		else {
			$correo_clave = $this->utilidades->hash();
			$link = anchor("Usuario_c/valida_correo?id={$this->oPersona->id}&clave={$correo_clave}");
			$this->email->destino = $correo;
			$this->email->motivo = 'Talento Humano - Gobernación del Estado Mérida: Actualización de Correo Electrónico';
			$this->email->mensaje = "Pulsa el enlace para finalizar la actualización de tu correo: {$link}";
			if (! $this->email->envia_correo()) {
				$this->success = FALSE;
				$this->mensaje = 'Error: Ocurrio un error inesperado al enviar la actualización del Correo.';
			}
			else {
				$this->oPersona->datos = array('correo' => $correo);
				$this->oPersona->upd();
				$this->datos = array(
					'correo_clave' 	=> $correo_clave,
					'correo_chk' 	=> 'f'
				);
				$this->success = $this->upd();
				$this->mensaje = ($this->success) ? 'Correo modificado, por favor, revisa tu correo para validarlo.' : 'Error: Ocurrio un error inesperado al actualizar tu correo.';
			}
		}
		return $this->success;
	}
	/////////////////////////// FIN DE: cambia_correo ////////////////////////////

	/** 
	* Destruye la sesion actual.
	*
	* @access 		public
	* @autor 		Carlos Iturralde <iturraldec@gmail.com>
	* @version		27/02/2018
	*/

	public function logout()
	{
		$this->session->sess_destroy();
	}
	//////////////////////////////////// FIN DE: logout //////////////////////////////
}

/* End of file Usuario_m.php */
/* Location: ./application/models */
