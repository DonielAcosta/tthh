<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Helper para manejo de variables de entorno
 * 
 * @package App\Helpers
 * @author Ing. Doniel Acosta
 */

if (!function_exists('env')) {
    /**
     * Obtiene una variable de entorno
     * 
     * @param string $key Clave de la variable
     * @param mixed $default Valor por defecto si no existe
     * @return mixed Valor de la variable o default
     */
    function env($key, $default = null)
    {
        static $env = null;
        
        // Cargar .env solo una vez
        if ($env === null) {
            $env = [];
            $envFile = FCPATH . '.env';
            
            if (file_exists($envFile)) {
                $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    // Ignorar comentarios
                    if (strpos(trim($line), '#') === 0) {
                        continue;
                    }
                    
                    // Parsear línea clave=valor
                    if (strpos($line, '=') !== false) {
                        list($key, $value) = explode('=', $line, 2);
                        $env[trim($key)] = trim($value);
                    }
                }
            }
        }
        
        return isset($env[$key]) ? $env[$key] : $default;
    }
}

if (!function_exists('config_env')) {
    /**
     * Carga configuración desde variables de entorno
     * 
     * @param string $prefix Prefijo de las variables (ej: 'DB_')
     * @return array Array asociativo con las configuraciones
     */
    function config_env($prefix)
    {
        $config = [];
        $envFile = FCPATH . '.env';
        
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                
                if (strpos($line, '=') !== false && strpos($line, $prefix) === 0) {
                    list($key, $value) = explode('=', $line, 2);
                    $config[str_replace($prefix, '', trim($key))] = trim($value);
                }
            }
        }
        
        return $config;
    }
}
