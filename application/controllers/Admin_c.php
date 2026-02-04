<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de Administración.
 * Funcionalidades administrativas; solo accesible con rol Administrador.
 *
 * @author Ing. Doniel Acosta
 * @version 2026-01-28
 */
class Admin_c extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Trabajador_m', 'trbm');
        $this->load->model('Persona_m', 'persona_m');
        $this->load->model('Dependencia_m', 'dep_m');
        $this->load->model('Trabajador_Tipo_m', 'tipo_m');
        $this->load->model('Rol_m', 'rol_m');

        $rol = isset($this->session->rol) ? trim($this->session->rol) : '';
        if ($rol === '' || stripos($rol, 'Administrador') === false) {
            redirect('Home_c');
            exit;
        }
    }

    public function index()
    {
        redirect('Admin_c/trabajadores');
    }

    /**
     * Formulario para crear un nuevo trabajador.
     */
    public function crear_trabajador()
    {
        $this->load_combos();

        $datos['page_encabezado']   = 'Crear Nuevo Trabajador';
        $datos['page_descripcion']  = 'Complete el formulario para registrar un nuevo trabajador';
        $datos['accion']            = 'crear';
        $datos['trabajador']        = null;
        $datos['contenido']         = $this->load->view('admin/trabajador_form_v', $datos, TRUE);

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Procesa el formulario de creación de trabajador.
     */
    public function guardar_trabajador() {
        $this->set_rules_crear_trabajador();

        if ($this->form_validation->run() === FALSE) {
            $this->load_combos();
            $datos['page_encabezado']   = 'Crear Nuevo Trabajador';
            $datos['page_descripcion']  = 'Corrija los errores en el formulario';
            $datos['accion']            = 'crear';
            $datos['trabajador']        = null;
            $datos['errores']           = validation_errors();
            $datos['contenido']         = $this->load->view('admin/trabajador_form_completo_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        $resultado = $this->trbm->crear_trabajador_completo($this->input->post());

        if ($resultado['success']) {
            $datos['page_encabezado']   = 'Trabajador Creado Exitosamente';
            $datos['page_descripcion']  = 'El trabajador ha sido registrado en el sistema';
            $datos['mensaje']           = $resultado['mensaje'];
            $datos['trabajador_id']     = $resultado['trabajador_id'];
            $datos['contenido']         = $this->load->view('admin/trabajador_exito_v', $datos, TRUE);
        } else {
            $this->load_combos();
            $datos['page_encabezado']   = 'Error al Crear Trabajador';
            $datos['page_descripcion']  = 'Ocurrió un error al intentar crear el trabajador';
            $datos['mensaje']           = $resultado['mensaje'];
            $datos['accion']            = 'crear';
            $datos['trabajador']        = null;
            $datos['contenido']         = $this->load->view('admin/trabajador_form_completo_v', $datos, TRUE);
        }

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Lista de trabajadores (cargar y ver información).
     */
    public function trabajadores() {
        $this->load_combos();

        $datos['page_encabezado']   = 'Gestión de Trabajadores';
        $datos['page_descripcion']  = 'Cargue la lista y vea la información de cada trabajador';
        $datos['trabajadores']      = $this->db->query(
            "SELECT *, id AS trabajador_id FROM trabajador_view ORDER BY apellido1, nombre1 LIMIT 100"
        )->result_array();
        $datos['contenido']         = $this->load->view('admin/trabajadores_lista_v', $datos, TRUE);

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Ver ficha completa de un trabajador.
     * URL: Admin_c/ver_trabajador/{id}
     */
    public function ver_trabajador($trabajador_id = 0) {
        $trabajador_id = (int) $trabajador_id;
        if ($trabajador_id <= 0) {
            $this->session->set_flashdata('mensaje', 'ID de trabajador no válido.');
            redirect('Admin_c/trabajadores');
            return;
        }

        $row = $this->db->get_where('trabajador_view', array('id' => $trabajador_id), 1)->row();
        if (!$row) {
            $this->session->set_flashdata('mensaje', 'Trabajador no encontrado.');
            redirect('Admin_c/trabajadores');
            return;
        }

        $this->trbm->get_by_persona($row->persona_fk);
        $cargos = $this->trbm->get_jobs_by_persona($row->persona_fk);
        if (!is_array($cargos)) {
            $cargos = array();
        }

        $datos['page_encabezado']   = 'Información del Trabajador';
        $datos['page_descripcion']  = trim(($row->nombre1 ?? '') . ' ' . ($row->apellido1 ?? ''));
        $datos['trabajador']        = $this->trbm;
        $datos['cargos']            = $cargos;
        $datos['contenido']         = $this->load->view('admin/trabajador_ficha_v', $datos, TRUE);

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Devuelve datos de un trabajador (AJAX).
     */
    public function obtener_trabajador(){
        $trabajador_id = $this->input->post('trabajador_id');

        if (!$trabajador_id) {
            $this->json_response(FALSE, 'ID de trabajador no proporcionado');
            return;
        }

        $trabajador = $this->db->get_where('trabajador_view', array('id' => $trabajador_id))->row();
        if (!$trabajador) {
            $this->json_response(FALSE, 'Trabajador no encontrado');
            return;
        }

        $persona = $this->db->get_where('persona', array('id' => $trabajador->persona_fk))->row();
        $this->json_response(TRUE, null, array('trabajador' => $trabajador, 'persona' => $persona));
    }

    /**
     * Actualiza trabajador desde el modal (AJAX).
     */
    public function actualizar_trabajador() {
        $trabajador_id = $this->input->post('trabajador_id');
        $persona_id   = $this->input->post('persona_id');

        if (!$trabajador_id || !$persona_id) {
            $this->json_response(FALSE, 'IDs no proporcionados');
            return;
        }

        $this->db->trans_start();

        try {
            $this->db->where('id', $persona_id);
            $this->db->update('persona', $this->datos_persona_desde_post());

            $this->db->where('id', $trabajador_id);
            $this->db->update('trabajador', $this->datos_trabajador_desde_post());

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Error en la transacción');
            }

            $this->json_response(TRUE, 'Trabajador actualizado exitosamente');
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $this->json_response(FALSE, $e->getMessage());
        }
    }

    /**
     * Reglas de validación para crear trabajador.
     */
    private function set_rules_crear_trabajador(){

        $this->form_validation->set_rules('cedula', 'Cédula', 'required|trim');
        $this->form_validation->set_rules('nombre1', 'Primer Nombre', 'required|trim');
        $this->form_validation->set_rules('apellido1', 'Primer Apellido', 'required|trim');
        $this->form_validation->set_rules('correo', 'Correo Electrónico', 'valid_email|trim');
        $this->form_validation->set_rules('codigo', 'Código del Trabajador', 'required|trim');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required|trim');
        $this->form_validation->set_rules('tipo_fk', 'Tipo de Trabajador', 'required|numeric');
        $this->form_validation->set_rules('dp_adm_fk', 'Dependencia de Origen', 'required|numeric');
        $this->form_validation->set_rules('dp_ads_fk', 'Dependencia Adscrita', 'required|numeric');
        $this->form_validation->set_rules('fingreso', 'Fecha de Ingreso', 'required');
    }

    /**
     * Datos de persona a partir del POST (para actualizar).
     */
    private function datos_persona_desde_post() {
        $datos = array(
            'nacionalidad' => $this->input->post('nacionalidad'),
            'cedula'       => $this->input->post('cedula'),
            'nombre1'      => $this->input->post('nombre1'),
            'nombre2'      => $this->input->post('nombre2'),
            'apellido1'    => $this->input->post('apellido1'),
            'apellido2'    => $this->input->post('apellido2'),
            'correo'       => $this->input->post('correo') ?: $this->input->post('correo_contacto'),
            'telefono'     => $this->input->post('telefono') ?: $this->input->post('telefono_contacto'),
        );

        $opcionales = array('rif', 'sexo', 'civil', 'nacimi', 'direc1');
        foreach ($opcionales as $campo) {
            if ($this->input->post($campo)) {
                $datos[$campo] = $this->input->post($campo);
            }
        }

        return $datos;
    }

    /**
     * Datos de trabajador a partir del POST (para actualizar).
     */
    private function datos_trabajador_desde_post() {
        
        $datos = array(
            'codigo'     => $this->input->post('codigo'),
            'cargo'      => $this->input->post('cargo'),
            'tipo_fk'    => $this->input->post('tipo_fk'),
            'dp_adm_fk'  => $this->input->post('dp_adm_fk'),
            'dp_ads_fk'  => $this->input->post('dp_ads_fk'),
        );

        $basicos = array('fingreso', 'retiro', 'banco', 'cuenta', 'observacion');
        foreach ($basicos as $campo) {
            if ($this->input->post($campo)) {
                $datos[$campo] = $this->input->post($campo);
            }
        }

        $campos_pers = array(
            'direc1', 'direc2', 'direc3', 'sso', 'sexo', 'civil', 'depto', 'sueldo', 'tipo',
            'contrato', 'dialib', 'status', 'cutipo', 'vari1', 'vari2', 'vari3', 'vari4',
            'vari5', 'vari6', 'uaumento', 'formato', 'dialab', 'xdialab', 'sucursal', 'divi',
            'carnet', 'enlace', 'cuentab', 'profes', 'niveled', 'vence', 'cuotafija', 'tipoe',
            'escritura', 'rif', 'observa', 'turno', 'horame', 'horams', 'horate', 'horats',
            'mac', 'uuid', 'evalua', 'titulo', 'educacion', 'discapacidad', 'estado', 'municipio',
            'parroquia', 'cpostal', 'hmotriz', 'tsangre', 'alergias', 'enfermedades', 'antefam',
            'tipofamil1', 'tipofamil2', 'tipofamil3', 'tipofamil4', 'tipofamil5',
            'cifamil1', 'cifamil2', 'cifamil3', 'cifamil4', 'cifamil5',
            'nombref1', 'nombref2', 'nombref3', 'nombref4', 'nombref5',
            'tlffamil1', 'tlffamil2', 'tlffamil3', 'tlffamil4', 'tlffamil5',
            'evaluador', 'gsal', 'moneda', 'autoriza', 'cestaticket',
        );

        foreach ($campos_pers as $campo) {
            $valor = $this->input->post($campo);
            if ($valor !== FALSE && $valor !== '') {
                $datos[$campo] = $valor;
            }
        }

        return $datos;
    }

    /**
     * Respuesta JSON para peticiones AJAX.
     *
     * @param bool  $success
     * @param mixed $mensaje   Mensaje o null
     * @param array $extra     Claves adicionales para el JSON
     */
    private function json_response($success, $mensaje = null, array $extra = array())
    {
        $out = array('success' => $success);
        if ($mensaje !== null) {
            $out['mensaje'] = $mensaje;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array_merge($out, $extra)));
    }

    /**
     * Carga combos para formularios (tipos, dependencias, roles).
     */
    private function load_combos()
    {
        $datos['tipos_trabajador'] = $this->array_from_query(
            $this->db->get('trabajadores_tp'),
            'trabajador_tp_id',
            'tipo'
        );
        $datos['dependencias'] = $this->array_from_query(
            $this->db->get('dependencia'),
            'id',
            'organismo'
        );
        $datos['roles'] = $this->array_from_query(
            $this->db->get('rol'),
            'id',
            'rol'
        );
        $this->load->vars($datos);
    }

    /**
     * Convierte resultado de query en array asociativo id => nombre.
     */
    private function array_from_query($query, $key, $value)
    {
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[$row->$key] = $row->$value;
        }
        return $arr;
    }
}
