<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/Solicitud_edosolicitud_m.php';

/**
 * Modelo Servicios: solicitudes y estados.
 *
 * @author Gianny Josué Villarreal Bustos <josue.villarreal@gmail.com>
 */
class Servicios_m extends MY_Model
{
    private const MAX_SIZE_ARCHIVO = 1000000; // 1000 KB
    private const EXTENSIONES_PERMITIDAS = array('pdf', 'PDF', 'jpg', 'jpeg', 'JPG', 'JPEG');

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('archivos'));
        $this->tabla        = 'sol_solicitud';
        $this->vista        = 'sol_solicitud_view';
        $this->id           = 0;
        $this->ultimo_acceso = null;
    }

    /**
     * Valida archivo adjunto y prepara datos. Retorna array('res'=>bool,'mns'=>string) en error.
     *
     * @param array|null $objArchivo
     * @param string     $rutaAnioMes  salida por referencia
     * @param string     $nomArchivo   salida por referencia
     * @param int        $tamanoArchivo salida por referencia
     * @param string     $temporal     salida por referencia
     * @param string     $adjsolicitud salida por referencia
     * @return array|null null si OK, array de error si no
     */
    private function _validar_archivo_adjunto($objArchivo, &$rutaAnioMes, &$nomArchivo, &$tamanoArchivo, &$temporal, &$adjsolicitud)
    {
        $rutaAnioMes = '';
        $adjsolicitud = '';

        if ($objArchivo === null || empty($objArchivo['name'])) {
            return null;
        }

        $nomArchivo    = date('dmY') . rand(1, 100) . '_' . $objArchivo['name'];
        $tamanoArchivo = (int) $objArchivo['size'];
        $temporal      = $objArchivo['tmp_name'];
        $rutaAnioMes   = date('Y') . '/' . date('m') . '/';

        if ($tamanoArchivo > self::MAX_SIZE_ARCHIVO) {
            return array('res' => false, 'mns' => 'Error, el archivo supera los 1000kb');
        }

        $partes = explode('.', $nomArchivo);
        $ext    = end($partes);

        if (!in_array($ext, self::EXTENSIONES_PERMITIDAS, true)) {
            return array('res' => false, 'mns' => 'Error, el formato de archivo <b><i>.' . $ext . '</i></b> no es válido');
        }

        $adjsolicitud = $rutaAnioMes . $nomArchivo;

        return null;
    }

    /**
     * Alta de una nueva solicitud.
     *
     * @return array|bool array con 'res' y 'mns' o FALSE
     */
    public function nuevaSolicitud()
    {
        $obsArc_EdoSolicitud = isset($this->datos['obsArc_EdoSolicitud']) ? $this->datos['obsArc_EdoSolicitud'] : '';
        $idEdoSolicitud      = isset($this->datos['idEdoSolicitud']) ? $this->datos['idEdoSolicitud'] : 1;
        $objArchivo          = isset($this->datos['objArchivo']) ? $this->datos['objArchivo'] : null;

        $rutaAnioMes = '';
        $nomArchivo  = '';
        $tamanoArchivo = 0;
        $temporal    = '';
        $adjsolicitud = isset($this->datos['adjsolicitud']) ? $this->datos['adjsolicitud'] : '';

        $err = $this->_validar_archivo_adjunto($objArchivo, $rutaAnioMes, $nomArchivo, $tamanoArchivo, $temporal, $adjsolicitud);
        if ($err !== null) {
            return $err;
        }

        $this->datos = array(
            'idusuariosolicitud' => $this->session->usuario_id,
            'asuntosolicitud'    => $this->datos['asuntosolicitud'],
            'iddestsolicitud'    => $this->datos['iddestsolicitud'],
            'descsolicitud'      => $this->datos['descsolicitud'],
            'emailaltsolicitud'  => $this->datos['emailaltsolicitud'],
            'adjsolicitud'       => $adjsolicitud,
            'fecregsolicitud'    => $this->datos['fecregsolicitud'],
        );

        $res = $this->ingresar();

        if (!$res) {
            $this->success = -3;
            $this->mensaje = 'Error: Ocurrió un error mientras se grababa la solicitud.';
            return false;
        }

        $oSolEdo = new Solicitud_edosolicitud_m();
        $oSolEdo->set_datos(array(
            'idusuario'             => $this->session->usuario_id,
            'idsolicitud'           => $res,
            'idedosolicitud'        => $idEdoSolicitud,
            'fecarc_edosolicitud'   => date('Y-m-d'),
            'obsarc_edosolicitud'   => $obsArc_EdoSolicitud,
        ));
        $resEdo = $oSolEdo->upd();

        if ($objArchivo !== null && !empty($objArchivo['tmp_name'])) {
            $path = path_sistema . 'public/adjuntos/' . $rutaAnioMes;
            $this->archivos->crear_directorio($path);
            $resArchivo = $this->archivos->subirArchivo($nomArchivo, $tamanoArchivo, $temporal, 'excel', $path);
        } else {
            $resArchivo = array('res' => $resEdo, 'mns' => '');
        }

        return $resArchivo;
    }

    /**
     * Actualiza una solicitud existente.
     *
     * @return array|bool array con 'res' y 'mns' o FALSE
     */
    public function actualizarSolicitud()
    {
        $obsArc_EdoSolicitud = isset($this->datos['obsArc_EdoSolicitud']) ? $this->datos['obsArc_EdoSolicitud'] : '';
        $idEdoSolicitud      = isset($this->datos['idEdoSolicitud']) ? $this->datos['idEdoSolicitud'] : 1;
        $objArchivo          = isset($this->datos['objArchivo']) ? $this->datos['objArchivo'] : null;

        $rutaAnioMes  = '';
        $nomArchivo   = '';
        $tamanoArchivo = 0;
        $temporal     = '';
        $adjsolicitud = isset($this->datos['adjsolicitud']) ? $this->datos['adjsolicitud'] : '';

        $err = $this->_validar_archivo_adjunto($objArchivo, $rutaAnioMes, $nomArchivo, $tamanoArchivo, $temporal, $adjsolicitud);
        if ($err !== null) {
            return $err;
        }

        if ($objArchivo === null || empty($objArchivo['name'])) {
            $adjsolicitud = isset($this->datos['adjsolicitud']) ? $this->datos['adjsolicitud'] : '';
        }

        $this->datos = array(
            'idsolicitud'       => $this->datos['idsolicitud'],
            'asuntosolicitud'   => $this->datos['asuntosolicitud'],
            'iddestsolicitud'   => $this->datos['iddestsolicitud'],
            'descsolicitud'     => $this->datos['descsolicitud'],
            'emailaltsolicitud' => $this->datos['emailaltsolicitud'],
            'adjsolicitud'      => $adjsolicitud,
            'fecregsolicitud'   => $this->datos['fecregsolicitud'],
        );

        $res = $this->actualizar();

        if (!$res) {
            $this->success = -3;
            $this->mensaje = 'Error: Ocurrió un error mientras se grababa la solicitud.';
            return false;
        }

        $oSolEdo = new Solicitud_edosolicitud_m();
        $oSolEdo->set_datos(array(
            'idusuario'             => $this->session->usuario_id,
            'idsolicitud'           => $res,
            'idedosolicitud'        => $idEdoSolicitud,
            'fecarc_edosolicitud'   => date('Y-m-d'),
            'obsarc_edosolicitud'   => $obsArc_EdoSolicitud,
        ));
        $resEdo = $oSolEdo->upd();

        if ($objArchivo !== null && !empty($objArchivo['tmp_name'])) {
            $path = path_sistema . $rutaAnioMes;
            $this->archivos->crear_directorio($path);
            $resArchivo = $this->archivos->subirArchivo($nomArchivo, $tamanoArchivo, $temporal, 'excel', $path);
        } else {
            $resArchivo = array('res' => $resEdo, 'mns' => '');
        }

        return $resArchivo;
    }

    /**
     * Lista solicitudes (todas si rol 2, sino las del usuario).
     *
     * @return array
     */
    public function consultarSolicitudes()
    {
        if ((int) $this->session->rol_id !== 2) {
            $r = $this->db->get_where('sol_solicitud_view', array('idusuario' => $this->session->usuario_id));
        } else {
            $r = $this->db->get('sol_solicitud_view');
        }

        if ($r->num_rows() === 0) {
            $this->success = false;
            $this->mensaje = '!get';
            return array();
        }

        $this->success = true;
        $this->mensaje = 'get';

        return $r->result_array();
    }

    /**
     * Busca solicitudes por un campo y valor.
     *
     * @param string $campo
     * @param mixed  $valor
     * @return array
     */
    public function consultarSolicitudesPorParametro($campo, $valor)
    {
        $r = $this->db->get_where('sol_solicitud_view', array($campo => $valor), 1);

        if ($r->num_rows() === 0) {
            $this->success = false;
            $this->mensaje = '!get';
            return array();
        }

        $this->success = true;
        $this->mensaje = 'get';

        return $r->result_array();
    }

    /**
     * Último ID (reservado para uso futuro).
     */
    public function ultimoId()
    {
        return null;
    }
}
