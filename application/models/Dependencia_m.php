<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo Dependencia.
 *
 * @author Carlos Iturralde <iturraldec@gmail.com>
 */
class Dependencia_m extends MY_Model
{
    public function __construct($dp_id = 0)
    {
        parent::__construct();
        $this->id        = 0;
        $this->codigo    = '';
        $this->ue        = '';
        $this->organismo = '';
        $this->tabla     = 'dependencia';
        $this->vista     = 'dependencia';

        if ($dp_id) {
            $this->id = $dp_id;
            $this->get_by_id();
        }
    }

    /**
     * Carga una dependencia por ID.
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
        $this->codigo    = $row->codigo;
        $this->ue        = $row->unidad_ejecutora;
        $this->organismo = $row->organismo;
        $this->success   = TRUE;
        $this->mensaje   = 'get';

        return TRUE;
    }
}
