<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mi clase Email
 *
 * @autor 	Carlos Iturralde <iturraldec@gmail.com>
 * @version	27/02/2018
*/

#[\AllowDynamicProperties]
class MY_Email extends CI_Email
{
    /**
     * Contiene la instancia de CI
     * @var $CI CodeIgniter
     */
    private $CI = NULL;

    //
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
        $this->CI->load->helper('email');
		
		// correo de origen
		$this->origen = 'tthh.gem@gmail.com';

		// clave del correo de origen
		$this->clave  = 't4l3nt0hum4n0';

		//configuracion para gmail
    	$this->configGmail = array(
    		'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
        	'smtp_port' => 465,
        	'smtp_user' => $this->origen,
        	'smtp_pass' => $this->clave,
        	'mailtype' => 'html',
        	'charset' => 'utf-8',
        	'newline' => "\r\n"
    	);

    	// destino del correo
    	$this->destino = '';

    	// motivo
    	$this->motivo = '';

    	// mensaje
    	$this->mensaje = '';
	}

	/*
	* Valida el nombre de un correo
	*
	* @param 	string 		correo electronico
	* @return 	bool 		es valido?
	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
	* version 	10/07/2018
	*/

	public function is_correo($correo = '')
	{
		return valid_email($correo);
	}
	/////////////////////////// FIN DE: is_correo ////////////////////////////

	/**
 	* Envia un correo
 	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @version	27/02/2018
	*/

	public function envia_correo()
	{
		$this->initialize($this->configGmail);
		$this->from($this->origen);
		$this->to($this->destino);
		$this->subject($this->motivo);
		$this->message($this->mensaje);
		return $this->send();
	}
	//////////////////////////////// FIN DE: envia_correo //////////////////////
}

/* End of file MY_Email.php */
/* Location: ./application/libraries */
