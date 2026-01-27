<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase padre para el manejo de los modelos.
 *
 * @autor 	Carlos Iturralde <iturraldec@gmail.com>
 * @access 	public
 * @version	01/01/2016
*/

#[\AllowDynamicProperties]
class MY_Model extends CI_Model
{
	// tabla de la base de datos
	protected $tabla;
	
	// campo clave de la tabla
	protected $pk;

	// vista de la tabla
	protected $vista;
	
	// campos a actualizar de un registro de la tabla
	protected $datos;

	// resultado de la ultima operacion
	protected $success;

	// mensajes del objeto
	protected $mensaje;

	// constructor
	public function __construct()
    {
        parent::__construct();
        $this->tabla 	= '';
		$this->pk		= 'id';
		$this->vista 	= '';
		$this->datos 	= array();
		$this->success 	= FALSE;
		$this->mensaje 	= '';
    }

	/**
 	* Establecer los datos a modificar en la tabla.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @param 	array
 	* @version	01/01/2016
 	*/

 	public function set_datos($datos = array())
 	{
 		$this->datos = $datos;
 	}
 	/////////////////////////// FIN DE: set_datos /////////////////////////////////////

 	/**
 	* Retorna los ultimos datos establecidos para modificar en la tabla.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @return 	array
 	* @version	01/01/2016
 	*/

 	public function get_datos()
 	{
 		return $this->datos;
 	}
 	/////////////////////////// FIN DE: get_datos /////////////////////////////////////

 	/**
 	* Retorna el ultimo estado establecido.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @return 	mix
 	* @version	02/02/2018
 	*/
 	
 	public function get_success()
 	{
 		return $this->success;
 	}
 	/////////////////////// FIN DE: get_success ///////////////////////////

 	/**
 	* Retorna el ultimo mensaje establecido.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @return 	string
 	* @version	01/01/2016
 	*/
 	
 	public function get_mensaje()
 	{
 		return $this->mensaje;
 	}
 	/////////////////////// FIN DE: get_mensaje ///////////////////////////

 	/**
 	* Consulta.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @return 	qry 	consulta de la vista
 	* @version	01/01/2016
 	*/

 	public function get()
 	{
 		return $this->db->get($this->vista);
 	}
 	//////////////////////////// FIN DE: get /////////////////////////////////////

 	/**
 	* Agrega/Modifica un registro.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @return 	bool
 	* @version	14/07/2018
 	*/

 	public function upd()
 	{
 		if ($this->{$this->pk} == 0) {	// lo agrego
 			$this->db->insert($this->tabla, $this->datos);
 			if ( $this->db->affected_rows() == 1 ) {
 				$this->success = TRUE;
 				$this->mensaje = 'add';
 			}
 			else {
 				$this->success = FALSE;
 				$this->mensaje = '!add';
 			}
 		}
 		else {							// lo actualizo
	 		$this->db->update($this->tabla, $this->datos, array($this->pk => $this->{$this->pk}));
	 		if ( $this->db->affected_rows() == 1 ) {
	 			$this->success = TRUE;
	 			$this->mensaje = 'upd';
	 		}
	 		else {
	 			$this->success = FALSE;
	 			$this->mensaje = '!upd';
	 		}
	 	}
	 	return $this->success;
 	}
 	////////////////////////////// FIN DE: upd ///////////////////////////////////
 	/**
 	 * Agregar un registro
 	 * @access 	public
 	 * @return 	Ultimo id ingresado
 	 * @author 	Gianny Josué Villarreal B <josue.villarreal@gmail.com>
 	 * @version 	05/07/2020
 	 */
 	
 	public function ingresar()
 	{
 	    $this->db->insert($this->tabla, $this->datos);
 	    if ( $this->db->affected_rows() == 1 ) {
 	        $this->success = $this->db->insert_id('sol_solicitud_idsolicitud_seq');
 	        $this->mensaje = 'add';
 	    }
 	    else {
 	        $this->success = FALSE;
 	        $this->mensaje = '!add';
 	    }
 	    return $this->success;
 	}
 	////////////////////////////// FIN DE: ingresar ///////////////////////////////////
 	/**
 	 * Actualizar un registro
 	 * @access 	public
 	 * @return 	bool
 	 * @author 	Gianny Josué Villarreal B <josue.villarreal@gmail.com>
 	 * @version 	05/07/2020
 	 */
 	public function actualizar()
 	{
//  	    var_dump($this->datos);
 	    $idsolicitud = $this->datos['idsolicitud'];
//  	    $this->db->insert($this->tabla, $this->datos);
//  	    $this->db->update($this->tabla, $this->datos, array('idsolicitud' => $this->datos['idsolicitud']));
 	    $this->db->update($this->tabla, $this->datos, array('idsolicitud' => $idsolicitud));
 	    if ( $this->db->affected_rows() == 1 ) {
 	        $this->success = $idsolicitud;
 	        $this->mensaje = 'add';
 	    }
 	    else {
 	        $this->success = FALSE;
 	        $this->mensaje = '!add';
 	    }
 	    return $this->success;
 	}
 	////////////////////////////// FIN DE: actualizar ///////////////////////////////////
 	/**
 	* Eliminar un registro.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @return 	bool
 	* @version	14/07/2018
 	*/

 	public function del()
 	{
 		$this->db->delete($this->tabla, array($this->pk => $this->{$this->pk}));
 		if ( $this->db->affected_rows() == 1 )
 		{
 			$this->success = TRUE;
 			$this->mensaje = 'del';
 		}
 		else
 		{
 			$this->success = FALSE;
 			$this->mensaje = '!del';
 		}
 		return $this->success;
 	}
 	/////////////////////////////// FIN DE: del /////////////////////////////////
 	
 	/**
 	* Retorna el numero de filas de la tabla.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @param 	bool 	todos o filtrados?
 	* @return 	integer
 	* @version	18/04/2018
 	*/

 	public function get_total_registros($todos = TRUE)
 	{
 		return ($todos) ? $this->db->count_all($this->vista) : $this->db->count_all_results($this->vista);
 	}
 	/////////////////////////////// FIN DE: get_total_registros ////////////////////////////

 	/**
 	* Retorna el ultimo id agregado.
	*
 	* @access 	public
 	* @param 	string 		nombre de la secuencia
 	* @return 	integer
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @version	13/11/2018
 	*/

	public function last_insert_id($secuencia)
	{
		return $this->db->insert_id($secuencia);
	}

 	/**
 	* Filta la informacion de la vista para datatable.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @version	24/05/2018
 	*/

 	protected function _filtra_datatable()
 	{	
 	}
 	/////////////////////////////// FIN DE: _filtra_datatable ////////////////////////////////////////

 	/**
 	* Retorna el listado de la vista en formato datatable.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @version	18/04/2018
 	*/

 	public function get_datatable()
 	{
 		if ($this->input->post('draw')){
 			$columnas = $this->input->post('columns');
    		$orden = $this->input->post('order');
    		$search = $this->input->post('search');
 			$datos['recordsTotal'] = $this->get_total_registros();
    		if (!$search['value']) 
    			$datos['recordsFiltered'] = $datos['recordsTotal'];
    		else {
 				$this->_filtra_datatable();
 				$datos['recordsFiltered'] = $this->get_total_registros(FALSE);
 				$this->_filtra_datatable();
    		}
    		$this->db->order_by($columnas[$orden[0]['column']]['data'], $orden[0]['dir']);
    		$this->db->limit($this->input->post('length'), $this->input->post('start'));  
 		}
 		$datos['data'] = $this->get()->result();
 		$this->utilidades->json_output($datos);
 	}
 	///////////////////////////// FIN DE: get_datatable /////////////////////////////

}

/* End of file MY_Model.php */
/* Location: ./application/core */