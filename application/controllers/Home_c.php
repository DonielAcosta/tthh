<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
* Clase prinicipal del Sistema.
*
* @version 	23/03/2018 
*/

class Home_c extends MY_Controller
{
	//
	function __construct()
	{
		parent::__construct();
	    if (!isset($this->session->persona_id)){
	        $url = base_url();
        	header ( "Location: $url" );
        }		
	}

	//
	public function index()
	{
		$datos['page_encabezado'] = '';
        $datos['page_descripcion'] = '';
        $datos['contenido'] = '<img src="img/logo02.jpg" width="40%" class="espacio-imagen center-block">';
//        $this->renderiza($this->entorno->empty_template, $datos);
        $datos['contenido'] = $this->load->view('home_v', $datos, TRUE);
        $this->renderiza($this->entorno->empty_template, $datos);
	}
	///////////////////////// FIN DE: index ///////////////////////////////
	
	//
	public function acerca_de()
	{
		$datos['page_encabezado'] = 'Sistema de Talento Humano';
        $datos['page_descripcion'] = 'Acerca de...';
        $datos['contenido'] = $this->load->view('acerca_de_v', '', TRUE);
        $this->renderiza($this->entorno->empty_template, $datos);
	}
}

/* End of file: Home_c.php */
/* Location: ./application/controllers */
