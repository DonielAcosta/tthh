<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Trabajador_CT_m extends MY_Model
{
	// constructor
	public function __construct($id = 0)
	{
		parent::__construct();
		$this->tabla 			= 'trabajadores_ct';
		$this->pk 				= 'trabajador_ct_id';
		$this->trabajador_ct_id = 0;
		$this->trabajador_fk 	= 0;
		$this->codigo 			= '';
		$this->capture			= '';
		if ($id != 0) {
			$this->trabajador_ct_id = $id;
			$this->get_by_id();
		};
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
	    $r = $this->db->get_where('trabajadores_ct', array('trabajador_ct_id' => $this->trabajador_ct_id), 1);
	    if ($r->num_rows() == 0) {
	    	$this->success = FALSE;
	    	$this->mensaje = '!get';
	    }
	    else {
	    	$this->success 	= TRUE;
	    	$this->mensaje 	= 'get';
	    	$r = $r->row();
			$this->trabajador_fk = $r->trabajador_fk;
			$this->codigo 		 = $r->codigo;
			$this->capture 		 = $r->capture;
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_id /////////////////////////////

	/**
	 * Carga los datos de una constancia, segun su codigo.
	 *
	 * @access 		public
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	19/11/2018
	 **/

	public function get_by_codigo()
	{
	    $r = $this->db->get_where('trabajadores_ct', array('codigo' => $this->codigo), 1);
	    if ($r->num_rows() == 0) {
	    	$this->success = FALSE;
	    	$this->mensaje = '!get';
	    }
	    else {
	    	$this->success 	= TRUE;
	    	$this->mensaje 	= 'get';
	    	$r = $r->row();
	    	$this->trabajador_ct_id = $r->trabajador_ct_id;
			$this->trabajador_fk 	= $r->trabajador_fk;
			$this->capture 		 	= $r->capture;
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_codigo /////////////////////////////

	/**
	 * Retorna un codigo unico para la constancia.
	 *
	 * @access 		public
	 * @return 		string
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	16/11/2018
	 **/

	public function get_codigo()
	{
		$ok = false;
		$codigo = '';
		while (! $ok) {
			$codigo = $this->utilidades->randomString();
			$r = $this->db->get_where('trabajadores_ct', array('codigo' => $codigo), 1);
			if ($r->num_rows() == 0)
				$ok = true;
		}
		return $codigo;
	}
	///////////////////////// FIN DE: get_codigo ////////////////////////
}

/* End of file Rol_m.php */
/* Location: ./application/models */
