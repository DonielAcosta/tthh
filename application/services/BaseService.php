<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase base para servicios
 * 
 * @package App\Services
 * @author Ing. Doniel Acosta
 */
abstract class BaseService
{
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }
}
