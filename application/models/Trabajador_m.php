<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
require_once('Persona_m.php');
require_once('Dependencia_m.php');
require_once('Trabajador_Tipo_m.php');
require_once('Trabajador_CT_m.php');

//
class Trabajador_m extends MY_Model
{
	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->vista			= 'trabajador_view';
		$this->id 				= 0;
		$this->persona			= NULL;
		$this->codigo 			= '';
		$this->fingreso			= NULL;
		$this->dp_origen		= NULL;
		$this->dp_ads 			= NULL;
		$this->cargo 			= '';
		$this->banco 			= '';
		$this->cuenta 			= '';
		$this->observacion 		= '';
		$this->tipo 			= NULL;
		$this->constancia 		= new Trabajador_CT_m();
		$this->datos			= null;
	}
	/////////////////////////// FIN DE: __construct /////////////////////////

	/*
	* Carga un trabajdor por su id de persona
	*
	* @param 	integer 	id de la persona
	* @return 	bool
	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
	* @version  29/10/2018
	*/

	public function get_by_persona($persona_id = 0)
	{
		$r = $this->db->get_where('trabajador_view', "persona_fk = $persona_id", 1);
		if ($r->num_rows() == 0) {
			$this->success = FALSE;
			$this->mensaje = '!get';
		}
		else
		{
			$r = $r->row();
//			var_dump($r);
			$this->id 			= $r->id;
			$this->id_trabajador 			= $r->id_trabajador;
			$this->persona 		= new Persona_m($persona_id);
			$this->codigo 		= $r->codigo;
			$this->fingreso		= $r->fingreso;
			$this->sfingreso	= $r->sfingreso;
			$this->dp_origen	= new Dependencia_m($r->dp_adm_fk);
			$this->dp_ads		= new Dependencia_m($r->dp_ads_fk);
			$this->cargo 		= $r->cargo;
			$this->banco 		= $r->banco;
			$this->cuenta 		= $r->cuenta;
			$this->observacion 	= $r->observacion;
			$this->tipo			= new Trabajador_Tipo_m($r->tipo_fk);
			$this->constancia	= new Trabajador_CT_m($persona_id);
			$this->success 		= TRUE;
			$this->mensaje 		= 'get';
		}
	}
	/////////////////////////// FIN DE: get_by_persona /////////////////////////
	/*
	* Busca los trabajos dado el id de persona
	*
	* @param 	integer 	id de la persona
	* @return 	bool
	* @autor 	Giany Josue Villarreal B <josue.villarreal@gmail.com>
	* @version  30/04/20
	*/

	public function get_jobs_by_persona($persona_id = 0)
	{
		$r = $this->db->get_where('trabajador_view', "persona_fk = $persona_id");
//		var_dump($r->result());
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
	}
	/////////////////////////// FIN DE: get_jobs_by_persona /////////////////////////
	
	public function get_by_trabajador($trabajador_id = 0)
	{
// 		$r = $this->db->get_where('trabajador_view', "id = $trabajador_id", 1);
		$r = $this->db->get_where('datos_constancias', "id = $trabajador_id", 1);
		if ($r->num_rows() == 0) {
			$this->success = FALSE;
			$this->mensaje = '!get';
		}
		else
		{
			$res = $r->row();
			$datosTrabajador =  array(
			'trabajador'=>$r->result_array(),
			'datosPersona'=>new Persona_m($res->id_persona),
			'datosOrigen'=>new Dependencia_m($res->dp_adm_fk),
			'datosAds'=>new Dependencia_m($res->dp_ads_fk),
			'datosTipo'=>new Trabajador_Tipo_m($res->tipo_fk),
			'datosConstancia'=>new Trabajador_CT_m($res->id_persona)
			
			);
			return $datosTrabajador;
			
//			var_dump($r);
			$this->id 			= $r->id;
			$this->id_trabajador 			= $r->id_trabajador;
//			$this->persona 		= new Persona_m($persona_id);
			$this->persona 		= new Persona_m($r->id_persona);
			$this->codigo 		= $r->codigo;
			$this->fingreso		= $r->fingreso;
			$this->sfingreso	= $r->sfingreso;
			$this->dp_origen	= new Dependencia_m($r->dp_adm_fk);
			$this->dp_ads		= new Dependencia_m($r->dp_ads_fk);
			$this->cargo 		= $r->cargo;
			$this->banco 		= $r->banco;
			$this->cuenta 		= $r->cuenta;
			$this->observacion 	= $r->observacion;
			$this->tipo			= new Trabajador_Tipo_m($r->tipo_fk);
//			$this->constancia	= new Trabajador_CT_m($persona_id);
			$this->constancia	= new Trabajador_CT_m($r->id_persona);
			$this->success 		= TRUE;
			$this->mensaje 		= 'get';
			
			$this->codigoConst       = $r->codigoConst;
			$this->cedulaConst       = $r->cedulaConst;
			$this->actividadConst    = $r->actividadConst;
			$this->nom_unidadConst   = $r->nom_unidadConst;
			$this->nombreConst       = $r->nombreConst;
			$this->cod_cargoConst    = $r->cod_cargoConst;
			$this->nom_cargoConst    = $r->nom_cargoConst;
			$this->fecha_ingConst    = $r->fecha_ingConst;
			$this->direccionConst    = $r->direccionConst;
			$this->quincena1Const    = $r->quincena1Const;
			$this->quincena2Const    = $r->quincena2Const;
			$this->totalConst        = $r->totalConst;
		}
	}
	/////////////////////////// FIN DE: get_by_trabajador /////////////////////////
	/**
	* Retorna las nominas de un trabajador.
	*
	* @return 	query 		consulta
	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
	* @version  31/10/2018
	**/

	public function get_nomina()
	{
//		echo "[".$this->id."]";
		return $this->db->query("select * from get_nomina({$this->id})");
	}
	/////////////////////////// FIN DE: get_nomina /////////////////////////
	
	/**
	* Retorna las nominas de un trabajador para un anio y mes especifico
	*
	* @return 	query 		consulta
	* @autor 	Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
	* @version  1.0 01/05/2020
	**/

	public function get_nomina_by_anio_y_mes($idTrabajador,$anio,$mes)
	{
//		return $this->db->query("select * from get_nomina({$this->id})");
		return $this->db->query("select * from get_nomina($idTrabajador) where extract(YEAR from fdesde) = $anio AND extract(MONTH from fhasta) = $mes");
	}
	/////////////////////////// FIN DE: get_nomina /////////////////////////

	/**
	* Retorna los un recibo de pago de un trabajador.
	*
	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
	* @param 	integer id de la nomina
	* @param 	integer id del trabajador, si es 0 toma el trabajador actual
	* @return 	query 	consulta
	* @version  31/10/2018
	**/

	public function get_recibo($nomina_id = 0, $trabajador_id = 0)
	{
		if (!$trabajador_id) $trabajador_id = $this->id;
		return $this->db->get_where('nomina_view', array('nomina_id' => $nomina_id, 'trabajador_id' => $trabajador_id));
	}
	/////////////////////////////////////// FIN DE: get_recibo ////////////////////////////////

	/**
	* Retorna el ingreso de la ultima nomina
	*
	* @return 	real
	* @autor 	Carlos Iturralde <iturraldec@gmail.com>
	* @version  31/10/2018
	**/

	public function get_last_ingreso()
	{
		return $this->db->query("select get_last_ingreso({$this->id}) as ingreso")->row()->ingreso;
	}
	/////////////////////////////////////// FIN DE: get_last_ingreso ///////////////////////////////
	/**
	* Retorna el ingreso de la ultima nomina
	*
	* @return 	real
	* @autor 	Gianny Josué Villarreal B <josue.villarreal@gmail.com>
	* @version  01/05/2020
	**/

	public function get_last_ingreso_by_id($trabajador_id)
	{
		return $this->db->query("select get_last_ingreso({$trabajador_id}) as ingreso")->row()->ingreso;
	}
	/////////////////////////////////////// FIN DE: get_last_ingreso ///////////////////////////////

}

/* End of file: Trabajador_m.php */
/* Location: ./application/models */
