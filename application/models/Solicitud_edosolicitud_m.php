<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo Solicitud–Estado de solicitud (historial de estados).
 *
 * @author Gianny Josué Villarreal Bustos <josue.villarreal@gmail.com>
 */
class Solicitud_edosolicitud_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'sol_solicitud_edosolicitud';
        $this->id    = 0;
    }

    /**
     * Registra o actualiza un estado de la solicitud.
     *
     * @return bool
     */
    public function nuevoEdoSol()
    {
        $idusuario = isset($this->datos['idusuario']) ? $this->datos['idusuario'] : (isset($this->datos['idUsuario']) ? $this->datos['idUsuario'] : 0);

        $this->datos = array(
            'idusuario'             => $idusuario,
            'idedosolicitud'         => $this->datos['idedosolicitud'],
            'idsolicitud'            => $this->datos['idsolicitud'],
            'fecarc_edosolicitud'   => $this->datos['fecarc_edosolicitud'],
            'obsarc_edosolicitud'   => $this->datos['obsarc_edosolicitud'],
        );

        if (!$this->upd()) {
            $this->success = -3;
            $this->mensaje = 'Error: Ocurrió un error mientras se grababa el estado de la solicitud.';
            return false;
        }

        return true;
    }
}
