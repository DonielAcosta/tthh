<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo Persona.
 *
 * @author Carlos Iturralde <iturraldec@gmail.com>
 */
#[\AllowDynamicProperties]
class Persona_m extends MY_Model
{
    public function __construct($persona_id = 0)
    {
        parent::__construct();
        $this->tabla        = 'persona';
        $this->vista        = 'persona_view';
        $this->id           = $persona_id;
        $this->nacionalidad = '';
        $this->cedula       = '';
        $this->nombre1      = '';
        $this->nombre2      = '';
        $this->apellido1    = '';
        $this->apellido2    = '';
        $this->correo       = '';
        $this->telefono     = '';

        if ($persona_id != 0) {
            $this->get_by_id();
        }
    }

    /**
     * Asigna las propiedades desde un registro de BD.
     */
    private function _set_propiedades($oRegistro = null)
    {
        if ($oRegistro === null) {
            return;
        }
        $this->id           = $oRegistro->id;
        $this->nacionalidad = $oRegistro->nacionalidad;
        $this->cedula       = $oRegistro->cedula;
        $this->nombre1      = $oRegistro->nombre1;
        $this->nombre2      = $oRegistro->nombre2;
        $this->apellido1    = $oRegistro->apellido1;
        $this->apellido2    = $oRegistro->apellido2;
        $this->correo       = $oRegistro->correo;
        $this->telefono     = $oRegistro->telefono;
    }

    /**
     * Carga la persona por cédula.
     *
     * @return bool
     */
    public function get_by_cedula()
    {
        $r = $this->db->get_where($this->vista, array('cedula' => $this->cedula), 1);

        if ($r->num_rows() === 0) {
            $this->success = FALSE;
            $this->mensaje = '!get';
            return FALSE;
        }

        $this->success = TRUE;
        $this->mensaje = 'get';
        $this->_set_propiedades($r->row());

        return TRUE;
    }

    /**
     * Carga la persona por ID.
     *
     * @return bool
     */
    public function get_by_id()
    {
        $r = $this->db->get_where($this->vista, array('id' => $this->id), 1);

        if ($r->num_rows() === 0) {
            $this->success = FALSE;
            $this->mensaje = '!get';
            return FALSE;
        }

        $this->success = TRUE;
        $this->mensaje = 'get';
        $this->_set_propiedades($r->row());

        return TRUE;
    }

    /**
     * Indica si existe una persona con el correo dado.
     *
     * @param string $correo
     * @return bool
     */
    public function is_correo($correo = '')
    {
        $r = $this->db->get_where($this->tabla, array('correo' => $correo), 1);
        return $r->num_rows() === 1;
    }

    /**
     * Retorna nombre completo (nombre1 nombre2 apellido1 apellido2).
     *
     * @return string
     */
    public function get_nombre_full()
    {
        return trim($this->nombre1 . ' ' . $this->nombre2 . ' ' . $this->apellido1 . ' ' . $this->apellido2);
    }
}
