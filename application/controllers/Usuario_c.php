<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador Usuario: login, registro, validación de correo y cambio de clave/correo.
 *
 * @author Carlos Iturralde <iturraldec@gmail.com>
 */
class Usuario_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('email', 'utilidades'));
        $this->load->model('usuario_m', 'usrm');
        $this->load->helper('html');
    }

    public function index()
    {
        if ($this->entorno->system_stop) {
            $datos['page_encabezado'] = 'Sistema de Recursos Humanos';
            $datos['mensaje']        = 'Estimado Usuario en estos momentos el equipo de Informática
                se encuentra actualizando la aplicación que acabas de accesar...
                por favor intenta más tarde.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->free_template, $datos);
            return;
        }
        if ($this->usrm->is_logueado()) {
            redirect('Home_c');
            return;
        }
        $this->login();
    }

    /**
     * Registro de nuevo usuario.
     */
    public function nuevo()
    {
        if (!$this->input->is_ajax_request()) {
            $this->load->view('usuario/nuevo_trb_v');
            return;
        }

        $datos = array(
            'cedula' => trim($this->input->post('cedula')),
            'correo' => strtolower(trim($this->input->post('correo'))),
            'clave'  => trim($this->input->post('clave')),
            'rol'    => trim($this->input->post('rol')),
        );

        if (!$this->email->is_correo($datos['correo'])) {
            $this->utilidades->json_output(array(
                'success' => FALSE,
                'mensaje'  => 'Error: La dirección de correo no es válida.'
            ));
            return;
        }

        $this->usrm->set_datos($datos);
        if ($this->usrm->nuevo()) {
            $r = array(
                'success' => TRUE,
                'mensaje'  => 'Solicitud registrada. Visita tu correo para finalizar el proceso de Ingreso.'
            );
        } else {
            $r = array(
                'success' => FALSE,
                'mensaje'  => $this->usrm->get_mensaje()
            );
        }
        $this->utilidades->json_output($r);
    }

    /**
     * Validación de correo electrónico (enlace desde email).
     */
    public function valida_correo()
    {
        $persona_id = $this->input->get('id');
        $clave      = $this->input->get('clave');

        if (!$this->usrm->valida_correo($persona_id, $clave)) {
            echo 'no existe el correo';
            return;
        }

        $this->usrm->get_by_id();
        $datos['nombre'] = "{$this->usrm->oPersona->nombre1} {$this->usrm->oPersona->nombre2} {$this->usrm->oPersona->apellido1} {$this->usrm->oPersona->apellido2}";
        $this->load->view('usuario/correo_chk_v', $datos);
    }

    /**
     * Formulario de login y proceso (AJAX).
     */
    public function login()
    {
        if (!$this->input->is_ajax_request()) {
            $this->load->view('usuario/login_v1');
            return;
        }

        $correo = $this->input->post('correo');
        $clave  = $this->input->post('clave');
        $this->usrm->login($correo, $clave);
        $this->utilidades->json_output(array(
            'success' => $this->usrm->get_success(),
            'mensaje'  => $this->usrm->get_mensaje()
        ));
    }

    /**
     * Recuperar clave (formulario y envío por correo).
     */
    public function olvide_clave()
    {
        if (!$this->input->is_ajax_request()) {
            $this->load->view('usuario/olvide_clave_v');
            return;
        }

        $correo = $this->input->post('correo');
        if (!$this->usrm->get_data('correo', $correo)) {
            $msg = array(
                'success' => FALSE,
                'mensaje'  => 'Error: Usuario no registrado.'
            );
        } else {
            $ok = $this->usrm->olvide_clave();
            $msg = array(
                'success' => $this->usrm->get_success(),
                'mensaje'  => $ok ? 'Te hemos enviado a tu correo una nueva clave...recuerda cambiarla!' : $this->usrm->email->destino
            );
        }
        $this->utilidades->json_output($msg);
    }

    /**
     * Cambio de clave (requiere sesión).
     */
    public function cambia_clave()
    {
        if (!$this->input->is_ajax_request()) {
            $datos['page_encabezado']  = 'Actualización de Datos';
            $datos['page_descripcion'] = 'Cambio de Clave';
            $datos['contenido']        = $this->load->view('usuario/cambia_clave_v', '', TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        $this->usrm->id = $this->session->usuario_id;
        $this->usrm->cambia_clave($this->input->post('clavea'), $this->input->post('claven'));
        $this->utilidades->json_output(array(
            'success' => $this->usrm->get_success(),
            'mensaje'  => $this->usrm->get_mensaje()
        ));
    }

    /**
     * Cambio de correo electrónico (requiere sesión).
     */
    public function cambia_correo()
    {
        if (!$this->input->is_ajax_request()) {
            $datos['page_encabezado']  = 'Actualización de Datos';
            $datos['page_descripcion'] = 'Cambio de Correo Electrónico';
            $datos['contenido']        = $this->load->view('usuario/cambia_correo_v', '', TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        $this->usrm->get_data('id', $this->session->usuario_id);
        $this->usrm->cambia_correo($this->input->post('correo'));
        $this->utilidades->json_output(array(
            'success' => $this->usrm->get_success(),
            'mensaje'  => $this->usrm->get_mensaje()
        ));
    }

    /**
     * Cierra la sesión y redirige al inicio.
     */
    public function logout()
    {
        $this->usrm->logout();
        redirect(base_url());
    }
}
