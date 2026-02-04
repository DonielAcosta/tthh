<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase principal del Sistema.
 *
 * @version 23/03/2018
 */
class Home_c extends MY_Controller {
	public function __construct(){
		parent::__construct();
		if (!isset($this->session->persona_id)) {
			header('Location: ' . base_url());
			exit;
		}
	}

	/**
	 * Página de inicio.
	 */
	public function index(){
		$datos['page_encabezado']   = '';
		$datos['page_descripcion']  = '';
		$datos['contenido']         = $this->load->view('home_v', $datos, TRUE);
		$this->renderiza($this->entorno->empty_template, $datos);
	}

	/**
	 * Página "Acerca de".
	 */
	public function acerca_de(){
		$datos['page_encabezado']   = 'Sistema de Talento Humano';
		$datos['page_descripcion']  = 'Acerca de...';
		$datos['contenido']         = $this->load->view('acerca_de_v', '', TRUE);
		$this->renderiza($this->entorno->empty_template, $datos);
	}
}
