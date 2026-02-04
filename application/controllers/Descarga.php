<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador para descarga de constancias/recibos (oculta la ruta real del archivo).
 */
class Descarga extends CI_Controller {
    private const ANIO = 2021;

    /** Mapeo tipo empleado (tp) => carpeta */
    private const TIPO_CARPETA = [
        '1' => 'doc',
        '2' => 'obr',
        '3' => 'emp',
        '4' => 'con',
    ];

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * Descarga el PDF del recibo según mes, quincena y tipo (parámetros en GET/POST).
     */
    public function index() {
        $ced = $this->session->userdata('cedulaRec');
        if (empty($ced)) {
            $this->respuesta_error('Sesión no válida o sin cédula de recibo.');
            return;
        }

        $mes      = $this->input->get_post('mes');
        $quincena = $this->input->get_post('qui');
        $tipoEmp  = $this->input->get_post('tp');

        if ($mes === null || $mes === '' || $quincena === null || $quincena === '' || $tipoEmp === null || $tipoEmp === '') {
            $this->respuesta_error('Faltan parámetros: mes, qui o tp.');
            return;
        }

        $carp = $this->obtener_carpeta($tipoEmp);
        if ($carp === null) {
            $this->respuesta_error('Tipo de empleado no válido.');
            return;
        }

        $ruta_relativa  = self::ANIO . '/' . $mes . '/' . $quincena . '/' . $carp;
        $nombre_archivo = 'rec_' . $ced . '.pdf';
        $ruta_completa  = path_sistema . 'src/constancias/' . $ruta_relativa . '/' . $nombre_archivo;

        if (!is_file($ruta_completa)) {
            $this->respuesta_error('El archivo no existe.');
            return;
        }

        $this->enviar_pdf($ruta_completa, $nombre_archivo);
    }

    /**
     * @param string $tipoEmp Valor de tp (1, 2, 3, 4)
     * @return string|null Nombre de carpeta o null si no válido
     */
    private function obtener_carpeta($tipoEmp){
        return self::TIPO_CARPETA[$tipoEmp] ?? null;
    }

    /**
     * Envía el archivo PDF como descarga.
     */
    private function enviar_pdf($ruta_completa, $nombre_descarga) {
        $size = filesize($ruta_completa);
        header('Content-Transfer-Encoding: binary');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $nombre_descarga . '"');
        header('Content-Length: ' . $size);
        readfile($ruta_completa);
        exit;
    }

    /**
     * Respuesta ante error (ajustar según cómo quieras mostrar errores).
     */
    private function respuesta_error($mensaje) {
        show_error($mensaje, 400);
    }
}
