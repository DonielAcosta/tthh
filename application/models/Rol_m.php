<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
#[\AllowDynamicProperties]
class Rol_m extends MY_Model
{
	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->tabla 	= 'rol';
		$this->vista 	= 'rol';
		$this->id 		= 0;
		$this->rol	 	= '';
		$this->admin 	= FALSE;
		$this->add 		= FALSE;
		$this->upd 		= FALSE;
		$this->del 		= FALSE;
		$this->menu 	= '';
	}
	/////////////////////////////// FIN DE: __construct ////////////////////////

	/**
	 * Retorna datos de un rol, segun su id.
	 *
	 * @access 		public
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	17/07/2018
	 **/

	public function get_by_id()
	{
	    $r = $this->db->get_where($this->tabla, array('id' => $this->id), 1);
	    if ($r->num_rows() == 0) {
	    	$this->success = FALSE;
	    	$this->mensaje = '!get';
	    }
	    else {
	    	$this->success 	= TRUE;
	    	$this->mensaje 	= 'get';
	    	$r = $r->row();
			$this->rol 	 	= $r->rol;
			$this->admin 	= $r->admin;
			$this->add 		= $r->add;
			$this->upd 		= $r->upd;
			$this->del 		= $r->del;
			$this->menu 	= $r->menu;
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_id /////////////////////////////
}

/* End of file Rol_m.php */
/* Location: ./application/models */
