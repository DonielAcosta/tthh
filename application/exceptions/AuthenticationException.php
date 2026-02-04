<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excepción de autenticación
 * 
 * @package App\Exceptions
 * @author Ing. Doniel Acosta
 */
class AuthenticationException extends Exception
{
    public function __construct($message = "Error de autenticación", $code = 401)
    {
        parent::__construct($message, $code);
    }
}
