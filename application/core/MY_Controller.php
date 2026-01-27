<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase padre para el manejo de los controladores.
 *
 * @autor 	Carlos Iturralde <iturraldec@gmail.com>
 * @access 	public
 * @version	30/10/2017
*/

class MY_Controller extends CI_Controller
{
	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->entorno = json_decode(file_get_contents("application/config/tthh.json"));
	}
	////////////////////////// FIN DE: __construct ///////////////////////

	/**
	* Renderizar las vistas.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @param	string 	plantilla a utilizar
 	* 		 	string 	nombre de la vista
 	* @version	17/07/2018
	*/

	public function renderiza($template, $datos)
	{
		// cargo el menu del usuario segun su rol
		switch ($this->session->rol) {
			case 'Trabajador':
				$datos['menu'] = $this->load->view('menu/trabajador_v', '', TRUE);
				break;
			
			default:
				$datos['menu'] = $this->load->view('menu/menu', '', TRUE);
				break;
		}

		// cargo el template con sus datos
		$this->load->view($template, $datos);
	}
	////////////////////////// FIN DE: renderizar ///////////////////////////////
	
}

/* End of file MY_Controller.php */
/* Location: ./application/core */
