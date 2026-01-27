<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class EdoSolicitud_m extends MY_Model
{
	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->tabla 	= 'sol_edosolicitud';
// 		$this->vista 	= 'sol_edosolicitud';
		$this->id 		= 0;
		$this->rol	 	= '';
		$this->admin 	= FALSE;
		$this->add 		= FALSE;
		$this->upd 		= FALSE;
		$this->del 		= FALSE;
		$this->menu 	= '';
	}
	/////////////////////////////// FIN DE: __construct ////////////////////////
	public function get_all()
	{
	    $r = $this->db->get($this->tabla);
	    if ($r->num_rows() == 0) {
	        $this->success = FALSE;
	        $this->mensaje = '!get';
	    }
	    else
	    {
	        //			$r = $r->row();
	        //			$this->datos = $r->result();
	        return $r->result_array();
	    }
// 	    if ($r->num_rows() == 0) {
// 	        $this->success = FALSE;
// 	        $this->mensaje = '!get';
// 	    }
// 	    else
// 	    {
// 	        $r = $r->row();
// 	        $this->id 			       = $r->idedosolicitud;
// 	        $this->nomEdoSolicitud     = $r->nomedosolicitud;
// 	        $this->descEdoSolicitud	   = $r->descedosolicitud;
// 	        $this->success 		= TRUE;
// 	        $this->mensaje 		= 'get';
// 	    }
	}
	/**
	 * Retorna datos de un edoSolicitud, segun su id.
	 *
	 * @access 		public
	 * @return 		bool
	 * @author 		Gianny Josue Villarreal B<josue.villarreal@gmail.com>
	 * @version 	15/11/2020
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
	    	$this->id 			       = $r->idEdoSolicitud;
	    	$this->nomEdoSolicitud     = $r->nomEdoSolicitud;
	    	$this->descEdoSolicitud	   = $r->descEdoSolicitud;
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_id /////////////////////////////
}

/* End of file Rol_m.php */
/* Location: ./application/models */
