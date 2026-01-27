<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
#[\AllowDynamicProperties]
class Persona_m extends MY_Model
{
	// constructor
	public function __construct($persona_id = 0)
	{
		parent::__construct();
		$this->tabla 		 = 'persona';
		$this->vista 		 = 'persona_view';
		$this->id 			 = $persona_id;
		$this->nacionalidad	 = '';
		$this->cedula 		 = '';
		$this->nombre1 		 = '';
		$this->nombre2 		 = '';
		$this->apellido1	 = '';
		$this->apellido2	 = '';
		$this->correo	 	 = '';
		$this->telefono 	 = '';
		if ($persona_id != 0) $this->get_by_id();
	}
	/////////////////////////////// FIN DE: __construct ////////////////////////

	/**
	 * Copia los datos de un registro en las propiedades.
	 *
	 * @access 		private
	 * @param 		object 	datos del registro
	 * @return 		void
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	17/07/2018
	 **/

	private function _set_propiedades($oRegistro = NULL)
	{
		$this->id 	 		 = $oRegistro->id;
		$this->nacionalidad	 = $oRegistro->nacionalidad;
		$this->cedula 		 = $oRegistro->cedula;
		$this->nombre1 		 = $oRegistro->nombre1;
		$this->nombre2 		 = $oRegistro->nombre2;
		$this->apellido1	 = $oRegistro->apellido1;
		$this->apellido2	 = $oRegistro->apellido2;
		$this->correo	 	 = $oRegistro->correo;
		$this->telefono 	 = $oRegistro->telefono;
	}
	//////////////////////////////// FIN DE: _set_propiedades /////////////////////////////

	/**
	 * Retorna datos de la persona, segun su cedula.
	 *
	 * @author 	Carlos Iturralde
	 * @return 	bool
	 * @version 07/07/2018
	 **/

	public function get_by_cedula()
	{
	    $r = $this->db->get_where($this->vista, array('cedula' => $this->cedula), 1);
	    if ($r->num_rows() == 0) {
	    	$this->success = FALSE;
	    	$this->mensaje = '!get';
	    }
	    else {
	    	$this->success = TRUE;
	    	$this->mensaje = 'get';
	    	$this->_set_propiedades($r->row());
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_cedula /////////////////////////////

	/**
	 * Retorna datos de la persona, segun su id.
	 *
	 * @author 	Carlos Iturralde
	 * @return 	bool
	 * @version 17/07/2018
	 **/

	public function get_by_id()
	{
	    $r = $this->db->get_where($this->vista, array('id' => $this->id), 1);
	    if ($r->num_rows() == 0) {
	    	$this->success = FALSE;
	    	$this->mensaje = '!get';
	    }
	    else {
	    	$this->success = TRUE;
	    	$this->mensaje = 'get';
	    	$this->_set_propiedades($r->row());
	    }
	    return $this->success;
	}
	//////////////////////////////// FIN DE: get_by_id /////////////////////////////

	/**
	 * Verifica si un correo existe.
	 *
	 * @access 		public
	 * @param 		string 	correo
	 * @return 		bool
	 * @author 		Carlos Iturralde <iturraldec@gmail.com>
	 * @version 	19/07/2018
	 **/

	public function is_correo($correo = '')
	{
	    $r = $this->db->get_where($this->tabla, array('correo' => $correo), 1);
	    return ($r->num_rows() == 1);
	}
	//////////////////////////////// FIN DE: is_correo /////////////////////////////

	public function get_nombre_full()
	{
		return $this->nombre1.' '. $this->nombre2.' '.$this->apellido1.' '.$this->apellido2;		
	}
}

/* End of file Persona_m.php */
/* Location: ./application/models */
