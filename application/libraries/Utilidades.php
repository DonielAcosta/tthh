<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Utilidades de la aplicacion.
 *
 * @author  Carlos Iturralde <iturraldec@gmail.com>
 * @version 23/11/2017
 */

class Utilidades
{

  /**
    * Contiene la instancia de CI
    * @var $CI CodeIgniter
    */
  private $CI = NULL;

  // constructor
	public function __construct() 
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('form');
    }
	/////////////////////////////// FIN DE: __construct //////////////////////////////////

  /**
	 * Aplicar un metodo de encriptamiento.
	 *
	 * @author 		Carlos Iturralde
	 * @param 		string 	cadena, si esta vacia retornara la clave del tiempo actual
	 * @return 		string  cadena encriptada
	 * @version 	09/07/2018
	 **/

	public function hash($cadena = '')
	{
		if (empty($cadena)) 
			$cadena = date("YmdHis");
		return md5($cadena);
	}
	/////////////////////////// FIN DE: hash //////////////////////////
	
  /**
	* Enviar una cadena json a una pagina.
	*
 	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
 	* @access 	public
 	* @param 	mixed
 	* @version	22/02/2018
	*/

	public function json_output($datos)
	{	
		$this->CI->output
		     ->set_content_type('application/json')
        	 ->set_output(json_encode($datos));
    }
    ////////////////////////////// FIN DE: json_output /////////////////////////////////////

  /*
    * Create a random string
    * @author   XEWeb <>
    * @param    $length the length of the string to create
    * @return $str the string
    */
  public function randomString($length = 5) 
  {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
    }
    return $str;
  }
  ////////////////////////// FIN DE: randomString ///////////////////////
  
}

/* End of file Utility.php */
/* Location: ./application/libraries */
