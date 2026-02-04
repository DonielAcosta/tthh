<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador sección Nosotros (misión, estructura, normas).
 */
class Nosotros_c extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('number', 'download', 'date'));
		$this->load->library('table');

		if (!isset($this->session->persona_id)) {
			header('Location: ' . base_url());
			exit;
		}
	}

	/**
	 * Misión (página principal de Nosotros).
	 */
	public function index()
	{
		$this->render_pagina('', '', 'nosotros/mision_v');
	}

	/**
	 * Estructura organizativa.
	 */
	public function estructura()
	{
		$this->render_pagina('Estructura', '', 'nosotros/estructura_v');
	}

	/**
	 * Normas.
	 */
	public function normas()
	{
		$this->render_pagina('Normas', '', 'nosotros/normas_v');
	}

	/**
	 * Carga una vista de nosotros con el template común.
	 */
	private function render_pagina($encabezado, $descripcion, $vista){
		$datos['page_encabezado']  = $encabezado;
		$datos['page_descripcion'] = $descripcion;
		$datos['contenido']        = $this->load->view($vista, $datos, TRUE);
		$this->renderiza($this->entorno->empty_template, $datos);
	}
}
