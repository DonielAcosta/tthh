<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Nosotros_c extends MY_Controller
{
	// constructor
	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('number', 'download', 'date'));
        $this->load->library('table');
//		$this->load->model('Trabajador_m', 'trbm');
//		$this->load->model('Trabajador_m', 'cargos');
        if (isset($this->session->persona_id)){
//            $this->trbm->get_by_persona($this->session->persona_id);
//            $this->cargos->get_jobs_by_persona($this->session->persona_id);
        }else{
            $url = base_url();
        	header ( "Location: $url" );
        }
//        die();
	}
	/////////////////////////// FIN DE: __construct /////////////////////////////

	// 
    public function index() 
    {
            //$datos['page_encabezado'] = 'Nosotros';
            $datos['page_encabezado'] = '';
            $datos['page_descripcion'] = '';
//            $datos['ddl_anios'] = $ddl_anios;
//            $datos['ddl_mes'] = $ddl_mes;
//            $datos['ddl_nomina'] = $ddl_nomina;    	
//        $datos['contenido'] = $this->load->view('Nosotros_v', $datos, TRUE);
            $datos['contenido'] = $this->load->view('nosotros/mision_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);        
    } 
    public function estructura() 
    {
            $datos['page_encabezado'] = 'Estructura';
            $datos['page_descripcion'] = '';
//            $datos['ddl_anios'] = $ddl_anios;
//            $datos['ddl_mes'] = $ddl_mes;
//            $datos['ddl_nomina'] = $ddl_nomina;       
//        $datos['contenido'] = $this->load->view('Nosotros_v', $datos, TRUE);
            $datos['contenido'] = $this->load->view('nosotros/estructura_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);        
    }
    public function normas() 
    {
            $datos['page_encabezado'] = 'Estructura';
            $datos['page_descripcion'] = '';
//            $datos['ddl_anios'] = $ddl_anios;
//            $datos['ddl_mes'] = $ddl_mes;
//            $datos['ddl_nomina'] = $ddl_nomina;       
//        $datos['contenido'] = $this->load->view('Nosotros_v', $datos, TRUE);
            $datos['contenido'] = $this->load->view('nosotros/normas_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);        
    }



}

/* End of file: Nosotros_c.php */
/* Location: ./application/controllers */
