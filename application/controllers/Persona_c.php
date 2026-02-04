<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador Persona.
 *
 * @author Carlos Iturralde <iturraldec@gmail.com>
 */
class Persona_c extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');

		if (!isset($this->session->persona_id)) {
			header('Location: ' . base_url());
			exit;
		}
	}

	/**
	 * Retorna un dropdown con el género de una persona (MASCULINO / FEMENINO).
	 */
	public function get_genero_select()
	{
		$data = array('MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO');
		echo form_dropdown('genero_select', $data);
	}
}
