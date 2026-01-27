<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Dependencia_m extends MY_Model
{
	//
	public function __construct($dp_id = 0)
	{
		parent::__construct();
		$this->id 		= 0;
		$this->codigo	= '';
		$this->ue		= '';
		$this->organismo= '';
		$this->tabla 	= 'dependencia';
		$this->vista 	= 'dependencia';
		if ($dp_id) {
			$this->id = $dp_id;
			$this->get_by_id();
		}
	}
	/////////////////////////// FIN DE: __construct /////////////////////////////

	/*
	* Carga una dependencia
	* 
	* @param integer id de la dependencia
	* @autor Carlos Iturralde <iturraldec@gmail.com>
	* @version 29/10/2018
	*/

	public function get_by_id()
	{
		$r = $this->db->get_where($this->tabla, "id =  {$this->id}", 1);
		if ($r->num_rows() == 0) {
			$this->success = FALSE;
			$this->mensaje = '!get';
		}
		else
		{
			$r = $r->row();
			$this->codigo	= $r->codigo;
			$this->ue		= $r->unidad_ejecutora;
			$this->organismo= $r->organismo;
			$this->success  = TRUE;
			$this->mensaje  = 'get';
		}
		return $this->success;
	}
	////////////////////// FIN DE: get_by_id /////////////////////

}

/* End of file: Dependencia_m.php */
/* Location: ./application/models */
