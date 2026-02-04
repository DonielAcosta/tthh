<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo Rol.
 *
 * @author Carlos Iturralde <iturraldec@gmail.com>
 */
#[\AllowDynamicProperties]
class Rol_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'rol';
        $this->vista = 'rol';
        $this->id    = 0;
        $this->rol   = '';
        $this->admin = FALSE;
        $this->add   = FALSE;
        $this->upd   = FALSE;
        $this->del   = FALSE;
        $this->menu  = '';
    }

    /**
     * Carga un rol por ID.
     *
     * @return bool
     */
    public function get_by_id()
    {
        $r = $this->db->get_where($this->tabla, array('id' => $this->id), 1);

        if ($r->num_rows() === 0) {
            $this->success = FALSE;
            $this->mensaje = '!get';
            return FALSE;
        }

        $row = $r->row();
        $this->success = TRUE;
        $this->mensaje = 'get';
        $this->rol     = $row->rol;
        $this->admin   = $row->admin;
        $this->add     = $row->add;
        $this->upd     = $row->upd;
        $this->del     = $row->del;
        $this->menu    = $row->menu;

        return TRUE;
    }
}
