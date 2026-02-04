<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Servicio de Autenticación
 * 
 * Maneja toda la lógica de autenticación de usuarios
 * 
 * @package App\Services
 * @author Ing. Doniel Acosta
 * @version 1.0.1
 */
class AuthService
{
    protected $CI;
    protected $userModel;
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('usuario_m', 'userModel');
        $this->userModel = $this->CI->userModel;
    }
    
    /**
     * Autentica un usuario
     * 
     * @param string $email Correo electrónico
     * @param string $password Contraseña
     * @return bool True si la autenticación es exitosa
     * @throws Exception Si las credenciales son inválidas
     */
    public function authenticate(string $email, string $password): bool
    {
        // Normalizar entrada
        $email = trim(strtolower($email));
        $password = trim($password);
        
        // Validar entrada
        if (empty($email) || empty($password)) {
            throw new Exception('El correo y la contraseña son requeridos');
        }
        
        // Intentar login
        $result = $this->userModel->login($email, $password);
        
        if (!$this->userModel->get_success()) {
            throw new Exception($this->userModel->get_mensaje());
        }
        
        return true;
    }
    
    /**
     * Cierra la sesión del usuario actual
     * 
     * @return void
     */
    public function logout(): void
    {
        $this->userModel->logout();
    }
    
    /**
     * Verifica si hay un usuario autenticado
     * 
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        return $this->userModel->is_logueado();
    }
    
    /**
     * Obtiene el usuario actual
     * 
     * @return array|null Datos del usuario o null
     */
    public function getCurrentUser(): ?array
    {
        if (!$this->isAuthenticated()) {
            return null;
        }
        
        return [
            'id' => $this->CI->session->userdata('usuario_id'),
            'nombre' => $this->CI->session->userdata('nombre'),
            'rol' => $this->CI->session->userdata('rol'),
            'persona_id' => $this->CI->session->userdata('persona_id')
        ];
    }
}
