<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de Administración
 * 
 * Funcionalidades administrativas del sistema
 * Solo accesible para usuarios con rol Administrador
 * 
 * @author Ing. Doniel Acosta
 * @version 2026-01-28
 */
class Admin_c extends MY_Controller
{
    // constructor
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
        
        // Verificar que sea administrador
        if (!isset($this->session->rol) || $this->session->rol !== 'Administrador') {
            redirect('Home_c');
            exit;
        }
    }
    /////////////////////////// FIN DE: __construct /////////////////////////////

    /**
     * Lista de trabajadores (vista principal de administración)
     *
     * @access public
     * @return void
     */
    public function index()
    {
        redirect('Admin_c/trabajadores');
    }

    /**
     * Muestra el formulario para crear un nuevo trabajador
     *
     * @access public
     * @return void
     */
    public function crear_trabajador()
    {
        // Cargar datos para los combos
        $this->load_combos();
        
        $datos['page_encabezado'] = 'Crear Nuevo Trabajador';
        $datos['page_descripcion'] = 'Complete el formulario para registrar un nuevo trabajador';
        $datos['accion'] = 'crear';
        $datos['trabajador'] = null;
        
        $datos['contenido'] = $this->load->view('admin/trabajador_form_v', $datos, TRUE);
        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Procesa el formulario para crear un trabajador
     *
     * @access public
     * @return void
     */
    public function guardar_trabajador()
    {
        // Validar datos
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
        
        if ($this->form_validation->run() == FALSE) {
            // Si hay errores de validación, mostrar el formulario de nuevo
            $this->load_combos();
            $datos['page_encabezado'] = 'Crear Nuevo Trabajador';
            $datos['page_descripcion'] = 'Corrija los errores en el formulario';
            $datos['accion'] = 'crear';
            $datos['trabajador'] = null;
            $datos['errores'] = validation_errors();
            
            $datos['contenido'] = $this->load->view('admin/trabajador_form_completo_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }
        
        // Procesar creación
        $resultado = $this->trbm->crear_trabajador_completo($this->input->post());
        
        if ($resultado['success']) {
            $datos['page_encabezado'] = 'Trabajador Creado Exitosamente';
            $datos['page_descripcion'] = 'El trabajador ha sido registrado en el sistema';
            $datos['mensaje'] = $resultado['mensaje'];
            $datos['trabajador_id'] = $resultado['trabajador_id'];
            $datos['contenido'] = $this->load->view('admin/trabajador_exito_v', $datos, TRUE);
        } else {
            $this->load_combos();
            $datos['page_encabezado'] = 'Error al Crear Trabajador';
            $datos['page_descripcion'] = 'Ocurrió un error al intentar crear el trabajador';
            $datos['mensaje'] = $resultado['mensaje'];
            $datos['accion'] = 'crear';
            $datos['trabajador'] = null;
            $datos['contenido'] = $this->load->view('admin/trabajador_form_completo_v', $datos, TRUE);
        }
        
        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Lista todos los trabajadores
     *
     * @access public
     * @return void
     */
    public function trabajadores()
    {
        // Cargar datos para los combos del modal
        $this->load_combos();
        
        $datos['page_encabezado'] = 'Gestión de Trabajadores';
        $datos['page_descripcion'] = 'Lista de todos los trabajadores del sistema';
        
        // Obtener lista de trabajadores (simplificado - puedes mejorarlo)
        $query = $this->db->query("SELECT *, id as trabajador_id FROM trabajador_view ORDER BY apellido1, nombre1 LIMIT 100");
        $datos['trabajadores'] = $query->result_array();
        
        $datos['contenido'] = $this->load->view('admin/trabajadores_lista_v', $datos, TRUE);
        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Obtiene los datos de un trabajador para el modal
     *
     * @access public
     * @return void
     */
    public function obtener_trabajador()
    {
        $trabajador_id = $this->input->post('trabajador_id');
        
        if (!$trabajador_id) {
            echo json_encode(array('success' => false, 'mensaje' => 'ID de trabajador no proporcionado'));
            return;
        }
        
        // Obtener datos del trabajador
        $trabajador = $this->db->get_where('trabajador_view', array('id' => $trabajador_id))->row();
        
        if (!$trabajador) {
            echo json_encode(array('success' => false, 'mensaje' => 'Trabajador no encontrado'));
            return;
        }
        
        // Obtener datos de la persona
        $persona = $this->db->get_where('persona', array('id' => $trabajador->persona_fk))->row();
        
        echo json_encode(array(
            'success' => true,
            'trabajador' => $trabajador,
            'persona' => $persona
        ));
    }

    /**
     * Actualiza los datos de un trabajador desde el modal
     *
     * @access public
     * @return void
     */
    public function actualizar_trabajador()
    {
        $trabajador_id = $this->input->post('trabajador_id');
        $persona_id = $this->input->post('persona_id');
        
        if (!$trabajador_id || !$persona_id) {
            echo json_encode(array('success' => false, 'mensaje' => 'IDs no proporcionados'));
            return;
        }
        
        $this->db->trans_start();
        
        try {
            // Actualizar datos de la persona
            $datos_persona = array(
                'nacionalidad' => $this->input->post('nacionalidad'),
                'cedula' => $this->input->post('cedula'),
                'nombre1' => $this->input->post('nombre1'),
                'nombre2' => $this->input->post('nombre2'),
                'apellido1' => $this->input->post('apellido1'),
                'apellido2' => $this->input->post('apellido2'),
                'correo' => $this->input->post('correo') ?: $this->input->post('correo_contacto'),
                'telefono' => $this->input->post('telefono') ?: $this->input->post('telefono_contacto')
            );
            
            // Agregar campos opcionales si existen en la tabla
            if ($this->input->post('rif')) $datos_persona['rif'] = $this->input->post('rif');
            if ($this->input->post('sexo')) $datos_persona['sexo'] = $this->input->post('sexo');
            if ($this->input->post('civil')) $datos_persona['civil'] = $this->input->post('civil');
            if ($this->input->post('nacimi')) $datos_persona['nacimi'] = $this->input->post('nacimi');
            if ($this->input->post('direc1')) $datos_persona['direc1'] = $this->input->post('direc1');
            
            $this->db->where('id', $persona_id);
            $this->db->update('persona', $datos_persona);
            
            // Actualizar datos del trabajador - incluir TODOS los campos de pers
            $datos_trabajador = array(
                'codigo' => $this->input->post('codigo'),
                'cargo' => $this->input->post('cargo'),
                'tipo_fk' => $this->input->post('tipo_fk'),
                'dp_adm_fk' => $this->input->post('dp_adm_fk'),
                'dp_ads_fk' => $this->input->post('dp_ads_fk')
            );
            
            // Campos básicos
            if ($this->input->post('fingreso')) $datos_trabajador['fingreso'] = $this->input->post('fingreso');
            if ($this->input->post('retiro')) $datos_trabajador['retiro'] = $this->input->post('retiro');
            if ($this->input->post('banco')) $datos_trabajador['banco'] = $this->input->post('banco');
            if ($this->input->post('cuenta')) $datos_trabajador['cuenta'] = $this->input->post('cuenta');
            if ($this->input->post('observacion')) $datos_trabajador['observacion'] = $this->input->post('observacion');
            
            // Todos los campos adicionales de pers
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
                'evaluador', 'gsal', 'moneda', 'autoriza', 'cestaticket'
            );
            
            foreach ($campos_pers as $campo) {
                if ($this->input->post($campo) !== FALSE && $this->input->post($campo) !== '') {
                    $datos_trabajador[$campo] = $this->input->post($campo);
                }
            }
            
            $this->db->where('id', $trabajador_id);
            $this->db->update('trabajador', $datos_trabajador);
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Error en la transacción');
            }
            
            echo json_encode(array('success' => true, 'mensaje' => 'Trabajador actualizado exitosamente'));
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
            echo json_encode(array('success' => false, 'mensaje' => $e->getMessage()));
        }
    }

    /**
     * Carga los datos para los combos del formulario
     *
     * @access private
     * @return void
     */
    private function load_combos()
    {
        // Tipos de trabajador
        $tipos = $this->db->get('trabajadores_tp')->result();
        $datos['tipos_trabajador'] = array();
        foreach ($tipos as $tipo) {
            $datos['tipos_trabajador'][$tipo->trabajador_tp_id] = $tipo->tipo;
        }
        
        // Dependencias
        $dependencias = $this->db->get('dependencia')->result();
        $datos['dependencias'] = array();
        foreach ($dependencias as $dep) {
            $datos['dependencias'][$dep->id] = $dep->organismo;
        }
        
        // Roles (para crear usuario si es necesario)
        $roles = $this->db->get('rol')->result();
        $datos['roles'] = array();
        foreach ($roles as $rol) {
            $datos['roles'][$rol->id] = $rol->rol;
        }
        
        // Pasar a la vista
        $this->load->vars($datos);
    }
}

/* End of file: Admin_c.php */
/* Location: ./application/controllers */
