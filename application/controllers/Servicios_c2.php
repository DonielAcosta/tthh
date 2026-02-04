<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador Servicios (variante 2): Comprobantes de pago y solicitudes.
 *
 * @author Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
 */
class Servicios_c2 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('number', 'download', 'date'));
        $this->load->library('table');
        $this->load->model('Servicios_m', 'servm');

        if (!isset($this->session->persona_id)) {
            header('Location: ' . base_url());
            exit;
        }
    }

    public function index()
    {
        $datos['page_encabezado']   = 'Comprobantes de Pagos';
        $datos['page_descripcion']  = 'Descarga y visualización de Comprobantes de Pagos';
        $datos['contenido']         = $this->load->view('servicios/servicios_v', $datos, TRUE);
        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Listado de solicitudes del usuario.
     */
    public function solicitud()
    {
        $datos['page_encabezado']   = 'Solicitudes';
        $datos['page_descripcion']  = '';
        $datos['contenido']         = $this->load->view('servicios/solicitudcons_v', $datos, TRUE);
        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Formulario para ingresar solicitud (vista admin o normal según rol).
     */
    public function solicitud_ing()
    {
        $datos['cmb_edoSol']          = $this->comboEdoSol();
        $datos['cmb_destino']         = $this->comboDestino();
        $datos['idsolicitud']         = '';
        $datos['asuntoSol']           = '';
        $datos['descSol']             = '';
        $datos['obsArc_EdoSolicitud'] = '';
        $datos['emailaltsolicitud']   = '';
        $datos['opt']                 = 'ing';
        $datos['optadjsolicitud']     = '';
        $datos['adjsolicitud']        = null;
        $datos['page_encabezado']     = 'Ingresar solicitud';
        $datos['page_descripcion']    = '';

        if ((int) $this->session->rol_id === 2) {
            $datos['contenido'] = $this->load->view('servicios/solicitud_admin_v', $datos, TRUE);
        } else {
            $datos['contenido'] = $this->load->view('servicios/solicitud_v', $datos, TRUE);
        }

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Procesa alta o actualización de solicitud (AJAX).
     */
    public function ingresar_solicitud()
    {
        $idsolicitud         = $this->input->post_get('idsolicitud') ?: '';
        $obsArc_EdoSolicitud = $this->input->post_get('obsArc_EdoSolicitud') ?: '';

        if (isset($_FILES['file'])) {
            $objArchivo = $_FILES['file'];
            $adjsolicitud = trim($objArchivo['name']);
        } else {
            $objArchivo = null;
            $adjsolicitud = '';
        }

        $datos = array(
            'idsolicitud'          => $idsolicitud,
            'asuntosolicitud'      => trim($this->input->post_get('asuntoSol')),
            'descsolicitud'        => trim($this->input->post_get('descSol')),
            'iddestsolicitud'      => trim($this->input->post_get('destSol')),
            'asuntoSol'            => trim($this->input->post_get('asuntoSol')),
            'fecregsolicitud'      => date('Y-m-d'),
            'adjsolicitud'         => $adjsolicitud,
            'emailaltsolicitud'    => trim($this->input->post_get('emailaltsolicitud')),
            'obsArc_EdoSolicitud'  => trim($obsArc_EdoSolicitud),
            'idEdoSolicitud'       => $this->input->post_get('edoSol'),
            'objArchivo'           => $objArchivo,
        );

        $this->servm->set_datos($datos);
        $resComp = ($idsolicitud !== '') ? $this->servm->actualizarSolicitud() : $this->servm->nuevaSolicitud();

        $r = array(
            'success' => (bool) $resComp['res'],
            'message' => $resComp['res']
                ? 'Solicitud registrada.'
                : $resComp['mns'] . '. ' . $this->servm->get_mensaje()
        );
        $this->utilidades->json_output($r);
    }

    /**
     * Devuelve todas las solicitudes (AJAX).
     */
    public function consultar_solicitudes()
    {
        $res = $this->servm->consultarSolicitudes();
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }

    /**
     * Consulta una solicitud por ID y muestra vista consulta o actualización.
     */
    public function consultar_solicitudes_param()
    {
        $opcion      = $this->input->post('valOp');
        $idSolicitud = $this->input->post('valId');

        $res = $this->servm->consultarSolicitudesPorParametro('idsolicitud', $idSolicitud);
        $res    = $res[0];
        $edoSol = (int) $res['idedosolicitud'];
        $rol    = (int) $this->session->rol_id;

        $titConsulta = 'Consultar solicitud N° <b>' . $idSolicitud . '</b>';
        if ($edoSol > 1 && $rol > 2) {
            $titConsulta = "La solicitud N° $idSolicitud está siendo procesada por nuestros analistas, por lo tanto, no puede ser actualizada por usted.";
            $opcion = 1;
        }

        $pantActualizar = ($rol < 3) ? 'servicios/solicitud_admin_v' : 'servicios/solicitud_v';

        $datos['cmb_edoSol']          = $this->comboEdoSol($res['idedosolicitud']);
        $datos['cmb_destino']         = $this->comboDestino($res['iddestsolicitud']);
        $datos['page_descripcion']    = '';
        $datos['idsolicitud']         = $res['idsolicitud'];
        $datos['asuntoSol']           = $res['asuntosolicitud'];
        $datos['descSol']             = $res['descsolicitud'];
        $datos['obsArc_EdoSolicitud'] = $res['obsarc_edosolicitud'];
        $datos['adjsolicitud']        = $res['adjsolicitud'];
        $datos['emailaltsolicitud']   = $res['emailaltsolicitud'];
        $datos['opt']                 = 'mod';

        if ((int) $opcion === 1) {
            $datos['page_encabezado'] = $titConsulta;
            $datos['contenido']       = $this->load->view('servicios/solicitudc_v', $datos, TRUE);
        } else {
            $datos['page_encabezado'] = 'Actualizar solicitud N° <b>' . $idSolicitud . '</b>';
            $datos['contenido']       = $this->load->view($pantActualizar, $datos, TRUE);
        }

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Combo estado de solicitud.
     */
    private function comboEdoSol($id = null)
    {
        $this->load->model('EdoSolicitud_m', 'edoSol');
        $r = $this->edoSol->get_all();
        $dataEdo = array();
        foreach ($r as $row) {
            $dataEdo[$row['idedosolicitud']] = $row['nomedosolicitud'];
        }
        return form_dropdown('edoSol', $dataEdo, $id, array('id' => 'idedosolicitud', 'class' => 'form-control'));
    }

    /**
     * Combo destino de solicitud (versión reducida).
     */
    private function comboDestino($id = null)
    {
        $r = array(
            1 => 'RRHH',
            2 => 'RRHH - Dpto de Informática',
            3 => 'RRHH - Dpto de Nómina'
        );
        return form_dropdown('destSol', $r, $id, array('id' => 'destSol', 'class' => 'form-control'));
    }
}
