<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excepción de validación
 * 
 * @package App\Exceptions
 * @author Ing. Doniel Acosta
 */
class ValidationException extends Exception
{
    protected $errors = [];
    
    public function __construct($message = "Error de validación", $errors = [], $code = 422)
    {
        parent::__construct($message, $code);
        $this->errors = $errors;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}
