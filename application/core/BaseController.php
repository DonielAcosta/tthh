<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador Base Mejorado
 * 
 * Proporciona funcionalidades comunes para todos los controladores
 * 
 * @package App\Core
 * @author Ing. Doniel Acosta
 * @version 1.0.1
 */
#[\AllowDynamicProperties]
abstract class BaseController extends CI_Controller
{
    /**
     * Datos para pasar a la vista
     * 
     * @var array
     */
    protected $data = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        // Cargar configuración del entorno
        $this->load->config('tthh');
        $this->entorno = json_decode(file_get_contents("application/config/tthh.json"));
        
        // Inicializar datos comunes
        $this->data['entorno'] = $this->entorno;
        $this->data['base_url'] = base_url();
        $this->data['current_user'] = $this->getCurrentUser();
    }
    
    /**
     * Obtiene el usuario actual de la sesión
     * 
     * @return array|null Datos del usuario o null
     */
    protected function getCurrentUser()
    {
        if ($this->session->userdata('usuario_id')) {
            return [
                'id' => $this->session->userdata('usuario_id'),
                'nombre' => $this->session->userdata('nombre'),
                'rol' => $this->session->userdata('rol'),
                'persona_id' => $this->session->userdata('persona_id')
            ];
        }
        return null;
    }
    
    /**
     * Verifica si el usuario está autenticado
     * 
     * @return bool
     */
    protected function isAuthenticated(): bool
    {
        return $this->session->userdata('usuario_id') !== null;
    }
    
    /**
     * Requiere autenticación, redirige si no está autenticado
     * 
     * @return void
     */
    protected function requireAuth(): void
    {
        if (!$this->isAuthenticated()) {
            redirect('Usuario_c');
        }
    }
    
    /**
     * Requiere un rol específico
     * 
     * @param string|array $roles Rol(es) requerido(s)
     * @return void
     */
    protected function requireRole($roles): void
    {
        $this->requireAuth();
        
        $userRole = $this->session->userdata('rol');
        $requiredRoles = is_array($roles) ? $roles : [$roles];
        
        if (!in_array($userRole, $requiredRoles)) {
            show_error('No tiene permisos para acceder a esta sección', 403);
        }
    }
    
    /**
     * Respuesta JSON estándar
     * 
     * @param bool $success Estado de la operación
     * @param string $message Mensaje
     * @param array $data Datos adicionales
     * @return void
     */
    protected function jsonResponse(bool $success, string $message = '', array $data = []): void
    {
        $this->load->library('utilidades');
        $this->utilidades->json_output([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ]);
    }
    
    /**
     * Renderiza una vista con layout
     * 
     * @param string $view Nombre de la vista
     * @param string $layout Layout a usar
     * @param array $data Datos adicionales
     * @return void
     */
    protected function render(string $view, string $layout = 'empty_template', array $data = []): void
    {
        $this->data = array_merge($this->data, $data);
        
        // Cargar menú según rol
        $this->loadMenu();
        
        $this->data['contenido'] = $this->load->view($view, $this->data, TRUE);
        $this->load->view('layouts/' . $layout, $this->data);
    }
    
    /**
     * Carga el menú según el rol del usuario
     * 
     * @return void
     */
    protected function loadMenu(): void
    {
        $rol = $this->session->userdata('rol');
        
        switch ($rol) {
            case 'Trabajador':
                $this->data['menu'] = $this->load->view('menu/trabajador_v', '', TRUE);
                break;
            case 'Administrador':
                $this->data['menu'] = $this->load->view('menu/admin_v', '', TRUE);
                break;
            default:
                $this->data['menu'] = $this->load->view('menu/menu', '', TRUE);
                break;
        }
    }
    
    /**
     * Valida entrada de formulario
     * 
     * @param array $rules Reglas de validación
     * @return bool True si es válido
     */
    protected function validate(array $rules): bool
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }
}
