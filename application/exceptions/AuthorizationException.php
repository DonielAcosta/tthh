<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excepción de Autorización
 * 
 * Se lanza cuando un usuario no tiene permisos para realizar una acción
 * 
 * @package App\Exceptions
 * @author Ing. Doniel Acosta
 * @version 1.0.1
 */
class AuthorizationException extends Exception
{
    /**
     * Constructor
     * 
     * @param string $message Mensaje de error
     * @param int $code Código de error HTTP (default: 403)
     */
    public function __construct($message = "No tiene permisos para realizar esta acción", $code = 403)
    {
        parent::__construct($message, $code);
    }
}
