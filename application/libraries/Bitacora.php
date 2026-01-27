<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Registra la bitacora (Log) del sistema.
 *
 * @author  Carlos Iturralde <iturraldec@gmail.com>
 * @version 01/01/2016
 */

class Bitacora
{

    /**
     * Contiene la instancia de CI
     * @var $CI CodeIgniter
     */
    private $CI = NULL;

    /**
     * Contiene el resultado de la operacion.
     * @var $resultado String
     */
    private $resultado = '';

    /**
     * Contiene los datos utlizados en la operaion.
     * @var $datos Array
     */
    private $datos = array();

    // constructor
	public function __construct() 
    {
        $this->CI =& get_instance();
        $this->CI->load->library('user_agent');
        $this->CI->load->helper('url');
        $this->CI->load->model('bitacora_model');
    }
	/////////////////////////////// FIN DE: __construct //////////////////////////////////

    /* 
	* Establecer el resultado de la operacion.
	*
	* @author	Carlos Iturralde <iturraldec@gmail.com>
	* @access 	public
	* @param	String	resultado de la opreacion
	* @version	01/01/2016
	*/

	public function set_resultado($r) {
        $this->resultado = $r;
    }
	/////////////////////////////// FIN DE: set_resultado //////////////////////////////////
	
	/* 
	* Retorna el resultado de la operacion.
	*
	* @author	Carlos Iturralde <iturraldec@gmail.com>
	* @access 	public
	* @return	String
	* @version	01/01/2016
	*/

	public function get_resultado() {
        return $this->resultado;
    }
	/////////////////////////////// FIN DE: get_resultado //////////////////////////////////
	
    /* 
	* Establecer los datos involucrados en la operacion.
	*
	* @author	Carlos Iturralde <iturraldec@gmail.com>
	* @access 	public
	* @param	Array	datos involucrados en la opreacion
	* @version	01/01/2016
	*/

	public function set_datos($d) {
        $this->datos = $d;
    }
	/////////////////////////////// FIN DE: set_datos //////////////////////////////////
	
	/* 
	* Retorna los datos involucrados en la operacion.
	*
	* @author	Carlos Iturralde <iturraldec@gmail.com>
	* @access 	public
	* @return	Array
	* @version	01/01/2016
	*/
    
	public function get_datos() {
        return $this->datos;
    }
	/////////////////////////////// FIN DE: get_datos //////////////////////////////////
	
    /**
     * Realiza el registro de la bitacora del sistema.
     *
     * @author  Carlos Iturralde <iturraldec@gmail.com>
     * @access	public
     * @param   integer     ID del usuario que ejecuta la accion
     * @version 20/01/2017
     */

    public function registrar($usuario_id) {
        $data = array(
            'usuario_id' => $usuario_id,
            'url' 		=> base_url($this->CI->input->server('REQUEST_URI')),
			'datos'		=> ( empty ( $this->datos ) ) ? '' : json_encode ( $this->get_datos() ),
			'resultado' => $this->get_resultado(),
            'momento' 	=> date('d-m-Y H:i:s'),
            'ip' 		=> $this->CI->input->ip_address(),
            'browser' 	=> $this->CI->agent->browser(),
            'version' 	=> $this->CI->agent->version(),
            'os' 		=> $this->CI->agent->platform(),
        );
        $this->CI->bitacora_model->add( $data );
    }
	/////////////////////////////// FIN DE: registrar //////////////////////////////////
}

/* End of file Bitacora.php */
/* Location: ./application/libraries */
