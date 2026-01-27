<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Persona -> Controlador.
 *
 * @autor       Carlos Iturralde
 * @access      public
 */

class Persona_c extends MY_Controller
{
	//
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('form');
        if (!isset($this->session->persona_id)){
            $url = base_url();
            header ( "Location: $url" );
        }	
	}
	/////////////////////////// FIN DE: __construct /////////////////////////////

    /*
     * Retorna DropDwonList del genero de una persona.
     *
     * @autor       Carlos Iturralde <iturraldec@gmail.com>
     * @access      public
     * @version     22/05/2018
    */

    public function get_genero_select()
    {
        $data['MASCULINO'] = 'MASCULINO';
        $data['FEMENINO'] = 'FEMENINO';
        echo form_dropdown('genero_select', $data);
    }
    //////////////////////////// FIN DE: get_genero_select /////////////////////

}

/* End of file: Persona_c.php */
/* Location: ./application/controllers */
