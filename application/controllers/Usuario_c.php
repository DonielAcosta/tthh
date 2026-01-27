<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Usuario_c extends MY_Controller
{	
	// consructor
	public function __construct()
	{
        parent::__construct();
        $this->load->library(array('email', 'utilidades'));
        $this->load->model('usuario_m', 'usrm');
        $this->load->helper('html');
	}
	////////////////////////////FIN DE: __construct /////////////////////////////

	//
	function index()
	{
		if ($this->entorno->system_stop) {
			$datos['page_encabezado'] = 'Sistema de Recursos Humanos';
			$datos['mensaje'] = 'Estimado Usuario en estos momentos el equipo de Informática
				se encuentra actualizando la aplicación que acabas de accesar...
				por favor intenta más tarde.';
			$datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
        	$this->renderiza($this->entorno->free_template, $datos);
		}
		else if ($this->usrm->is_logueado())
			redirect('Home_c');
		else
			$this->login();
	}
	///////////////////////// FIN DE: index ////////////////////////////

	/**
	 * Registrar un nuevo usuario
	 *
	 * @access  public
	 * @author 	Carlos Iturralde <iturraldec@gmail.com>
	 * @version 07/07/2018
	 **/

	public function nuevo()
	{
		if (! $this->input->is_ajax_request())
			$this->load->view('usuario/nuevo_trb_v');
		else {
			$datos['cedula'] = trim($this->input->post('cedula'));
			$datos['correo'] = strtolower(trim($this->input->post('correo')));
			$datos['clave'] = trim($this->input->post('clave'));
			$datos['rol'] = trim($this->input->post('rol'));
			
			// valido el correo
			if (! $this->email->is_correo($datos['correo'])) {
				$r['success'] = FALSE;
				$r['mensaje'] = 'Error: La dirección de correo no es valida.';
			}
			
			// lo agrego
			else {
				$this->usrm->set_datos($datos);
				if ($this->usrm->nuevo()) {
					$r['success'] = TRUE;
					$r['mensaje'] = 'Solicitud registrada. Visita tu correo para finalizar el proceso de Ingreso.';
				}
				else {
					$r['success'] = FALSE;
					$r['mensaje'] = $this->usrm->get_mensaje();
				}
			}
			$this->utilidades->json_output($r);
		}
	}
	///////////////////// FIN DE: nuevo ////////////////////

	/**
	 * Validacion del correo electronico
	 *
	 * @author 	Carlos Iturralde <iturraldec@gmail.com>
	 * @version 16/07/2018
	 **/

	public function valida_correo()
	{
		
		$persona_id = $this->input->get('id');
		$clave 		= $this->input->get('clave');
		if ($this->usrm->valida_correo($persona_id, $clave))
		{
			$this->usrm->get_by_id();
			$datos['nombre'] = "{$this->usrm->oPersona->nombre1} {$this->usrm->oPersona->nombre2} {$this->usrm->oPersona->apellido1} {$this->usrm->oPersona->apellido2}";
			$this->load->view('usuario/correo_chk_v', $datos);
		}
		else
			echo 'no existe el correo';
	}
	////////////////////////////FIN DE: valida_correo /////////////////////////////

	/**
	 * Login del sistema
	 *
	 * @access  public
	 * @author 	Carlos Iturralde <iturraldec@gmail.com>
	 * @version 16/07/2018
	 **/

	public function login()
	{
		if (! $this->input->is_ajax_request()) {
			$this->load->view('usuario/login_v1');
		}
		else {
			$correo = $this->input->post('correo');
			$clave = $this->input->post('clave');
			$this->usrm->login($correo, $clave);
			$this->utilidades->json_output(array(
				'success' => $this->usrm->get_success(),
				'mensaje' => $this->usrm->get_mensaje()
			));
		}
	}
	///////////////////////// FIN DE: login ///////////////////////////////

	/**
    * Recuperar clave
    *
    * @access   public
    * @autor    Carlos Iturralde <iturraldec@gmail.com>
    * @version  21/07/2018
    */

    public function olvide_clave()
    {
    	if (! $this->input->is_ajax_request()) {
			$this->load->view('usuario/olvide_clave_v');
		}
		else {
			// verifico que exista como usuario
			if (! $this->usrm->get_data('correo', $this->input->post('correo')))
				$msg['mensaje'] = 'Error: Usuario no registrado.';
			else {
				if ($this->usrm->olvide_clave())
						$msg['mensaje'] = 'Te hemos enviado a tu correo una nueva clave...recuerda cambiarla!';
				else
					$msg['mensaje'] = $this->usrm->email->destino;

			}
			$msg['success'] = $this->usrm->get_success();
			$this->utilidades->json_output($msg);
		}
    }
    ///////////////////////////// FIN DE: olvide_clave ///////////////////////////

	/**
	 * Cambio de clave.
	 *
	 * @access 		public
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	22/07/2018
	 **/

	public function cambia_clave()
	{
		if (! $this->input->is_ajax_request()) {
			$datos['page_encabezado'] 	= 'Actualización de Datos';
        	$datos['page_descripcion'] 	= 'Cambio de Clave';
        	$datos['contenido'] 		= $this->load->view('usuario/cambia_clave_v', '', TRUE);
        	$this->renderiza($this->entorno->empty_template, $datos);
		}
		else
		{
			$this->usrm->id = $this->session->usuario_id;
			$this->usrm->cambia_clave($this->input->post('clavea'), $this->input->post('claven'));
			$this->utilidades->json_output(array(
				'success' => $this->usrm->get_success(),
				'mensaje' => $this->usrm->get_mensaje()
			));
		}
	}
	////////////////////////////FIN DE: cambia_clave /////////////////////////////

	/**
	 * Cambio de correo electronico.
	 *
	 * @access 		public
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	25/07/2018
	 **/

	public function cambia_correo()
	{
		if (! $this->input->is_ajax_request()) {
			$datos['page_encabezado'] 	= 'Actualización de Datos';
        	$datos['page_descripcion'] 	= 'Cambio de Correo Electrónico';
        	$datos['contenido'] 		= $this->load->view('usuario/cambia_correo_v', '', TRUE);
        	$this->renderiza($this->entorno->empty_template, $datos);
		}
		else
		{
			$this->usrm->get_data('id', $this->session->usuario_id);
			$this->usrm->cambia_correo($this->input->post('correo'));
			$this->utilidades->json_output(array(
				'success' => $this->usrm->get_success(),
				'mensaje' => $this->usrm->get_mensaje()
			));
		}
	}
	////////////////////////////FIN DE: cambia_correo /////////////////////////////

    /** 
	* Destruye la sesion actual,
	*
	* @access 		public
	* @autor 		Carlos Iturralde <iturraldec@gmail.com>
	* @version		18/07/2018
	*/

	public function logout()
	{
		$this->usrm->logout();
		redirect(base_url());
	}
	//////////////////////////////////// FIN DE: logout //////////////////////////////
}

/* End of file Usuario_c.php */
/* Location: ./application/controllers */
