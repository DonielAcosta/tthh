<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Trabajador_Tipo_m extends MY_Model
{
	// constructor
	public function __construct($id = 0)
	{
		parent::__construct();
		$this->trabajador_tp_id = 0;
		$this->tipo	 			= '';
		$this->cesta_ticket 	= FALSE;
		$this->ct_plantilla		= '';
		if ($id != 0) {
			$this->trabajador_tp_id = $id;
			$this->get_by_id();
		}
	}
	/////////////////////////////// FIN DE: __construct ////////////////////////

	/**
	 * Carga los datos de un tipo de trabajdor, segun su id.
	 *
	 * @access 		public
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	12/11/2018
	 **/

	public function get_by_id()
	{
	    $r = $this->db->get_where('trabajadores_tp', array('trabajador_tp_id' => $this->trabajador_tp_id), 1);
	    if ($r->num_rows() == 0) {
	    	$this->success = FALSE;
	    	$this->mensaje = '!get';
	    }
	    else {
	    	$this->success 	= TRUE;
	    	$this->mensaje 	= 'get';
	    	$r = $r->row();
			$this->tipo 		= $r->tipo;
			$this->cesta_ticket = ($r->cesta_ticket == 't') ? TRUE : FALSE;
			$this->ct_plantilla	= $r->ct_plantilla;
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_id /////////////////////////////
}

/* End of file Rol_m.php */
/* Location: ./application/models */
