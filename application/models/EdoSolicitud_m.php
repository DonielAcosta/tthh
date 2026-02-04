<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo Estado de Solicitud.
 *
 * @author Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
 */
class EdoSolicitud_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'sol_edosolicitud';
        $this->id    = 0;
        $this->rol   = '';
        $this->admin = FALSE;
        $this->add   = FALSE;
        $this->upd   = FALSE;
        $this->del   = FALSE;
        $this->menu  = '';
    }

    /**
     * Devuelve todos los estados de solicitud.
     *
     * @return array
     */
    public function get_all()
    {
        $r = $this->db->get($this->tabla);

        if ($r->num_rows() === 0) {
            $this->success = FALSE;
            $this->mensaje = '!get';
            return array();
        }

        $this->success = TRUE;
        $this->mensaje = 'get';

        return $r->result_array();
    }

    /**
     * Carga un estado de solicitud por ID.
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
        $this->id               = $row->idEdoSolicitud;
        $this->nomEdoSolicitud  = $row->nomEdoSolicitud;
        $this->descEdoSolicitud = $row->descEdoSolicitud;
        $this->success          = TRUE;
        $this->mensaje          = 'get';

        return TRUE;
    }
}
