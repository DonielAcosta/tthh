<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador Servicios: constancias, comprobantes, solicitudes.
 *
 * @author Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
 */
class Servicios_c extends MY_Controller
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
        $datos['page_encabezado']   = 'Servicios';
        $datos['page_descripcion']  = 'Constancias de Trabajo, Comprobantes de Pagos y Solicitudes';
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
     * Formulario para ingresar una nueva solicitud (o vista admin según rol).
     */
    public function solicitud_ing()
    {
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
            $datos['cmb_edoSol']  = $this->comboEdoSol();
            $datos['cmb_destino'] = $this->comboDestino();
            $datos['contenido']   = $this->load->view('servicios/solicitud_admin_v', $datos, TRUE);
        } else {
            $opt_idedosolicitud = array(
                'type'  => 'text',
                'name'  => 'idedosolicitud',
                'id'    => 'idedosolicitud',
                'value' => '1',
                'class' => 'form-control'
            );
            $opt_destSol = array(
                'type'  => 'text',
                'name'  => 'destSol',
                'id'    => 'destSol',
                'value' => '1',
                'class' => 'form-control'
            );
            $datos['cmb_edoSol']  = form_input($opt_idedosolicitud) . 'Por Ingresar';
            $datos['cmb_destino'] = form_input($opt_destSol) . 'RRHH';
            $datos['contenido']   = $this->load->view('servicios/solicitud_v', $datos, TRUE);
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
            $objArchivo           = $_FILES['file'];
            $datos['adjsolicitud'] = trim($objArchivo['name']);
        } else {
            $objArchivo           = null;
            $datos['adjsolicitud'] = '';
        }

        $datos['idsolicitud']         = $idsolicitud;
        $datos['asuntosolicitud']    = trim($this->input->post_get('asuntoSol'));
        $datos['descsolicitud']      = trim($this->input->post_get('descSol'));
        $datos['iddestsolicitud']    = trim($this->input->post_get('destSol'));
        $datos['asuntoSol']          = trim($this->input->post_get('asuntoSol'));
        $datos['fecregsolicitud']    = date('Y-m-d');
        $datos['emailaltsolicitud']  = trim($this->input->post_get('emailaltsolicitud'));
        $datos['obsArc_EdoSolicitud'] = trim($obsArc_EdoSolicitud);
        $datos['idEdoSolicitud']     = $this->input->post_get('edoSol');
        $datos['objArchivo']         = $objArchivo;

        $this->servm->set_datos($datos);
        $resComp = ($idsolicitud !== '') ? $this->servm->actualizarSolicitud() : $this->servm->nuevaSolicitud();

        $resultado = $resComp['res'];
        $mensaje   = $resComp['mns'];

        $r = array(
            'success' => (bool) $resultado,
            'message' => $resultado ? 'Solicitud registrada.' : $mensaje . '. ' . $this->servm->get_mensaje()
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
        $opcion     = $this->input->post('valOp');
        $idSolicitud = $this->input->post('valId');

        $res = $this->servm->consultarSolicitudesPorParametro('idsolicitud', $idSolicitud);
        $res = $res[0];
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
            $datos['page_encabezado'] = ($rol === 2)
                ? 'Gestión de solicitud N° <b>' . $idSolicitud . '</b>'
                : 'Actualizar solicitud N° <b>' . $idSolicitud . '</b>';
            $datos['contenido'] = $this->load->view($pantActualizar, $datos, TRUE);
        }

        $this->renderiza($this->entorno->empty_template, $datos);
    }

    /**
     * Constancia de solicitud: vista HTML o generación de PDF (según petición).
     */
    public function constancia_solicitud()
    {
        if ($this->entorno->system_delay) {
            $datos['page_encabezado']  = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $datos['mensaje']          = 'Estimado Usuario, en éstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago.
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        if (!$this->input->is_ajax_request()) {
            $datos['page_encabezado']  = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $this->load->model('Trabajador_m', 'trbm');
            $datos['lista']     = $this->trbm->get_jobs_by_persona($this->session->persona_id);
            $datos['contenido'] = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        $this->load->library('Pdf');
        $idSolicitud = $this->input->get('id');
        $res         = $this->servm->consultarSolicitudesPorParametro('idsolicitud', $idSolicitud);
        $res         = $res[0];

        $dia  = date('d');
        $mes  = date('m');
        $anio = date('Y');
        $fecha = strtolower(numtoletras($dia, FALSE)) . ' días del mes de ' . $this->entorno->local_mes[$mes - 1] . ' de ' . $anio;

        $constancia = $this->cont_constancia_asistencia();
        $constancia = str_replace('{NOMBRE}', '<b>' . $res['nombre1'] . ' ' . $res['nombre2'] . ' ' . $res['apellido1'] . ' ' . $res['apellido2'] . '</b>', $constancia);
        $constancia = str_replace('{CEDULA}', '<b>' . $res['cedula'] . '</b>', $constancia);
        $constancia = str_replace('{FECHA_SOLICITUD}', '<b>' . $res['fecregsolicitud'] . '</b>', $constancia);
        $constancia = str_replace('{FECHA_RESPUESTA}', '<b>' . $res['fecarc_edosolicitud'] . '</b>', $constancia);
        $constancia = str_replace('{ASUNTO_SOLICITUD}', '<b>' . $res['asuntosolicitud'] . '</b>', $constancia);
        $constancia = str_replace('{DESTINO}', '<b>RRHH</b>', $constancia);
        $constancia = str_replace('{SOLICITUD}', '<b>' . $res['descsolicitud'] . '</b>', $constancia);
        $constancia = str_replace('{RESPUESTA_SOLICITUD}', '<b>' . $res['obsarc_edosolicitud'] . '</b>', $constancia);

        $constancia_codigo = $this->generar_codigo(10);
        $url = base_url('ct_chk?codigo=' . $constancia_codigo);
        $constancia = str_replace('{CODIGO_CT}', $constancia_codigo, $constancia);
        $constancia = str_replace('{FECHA}', '<b>' . $fecha . '</b>', $constancia);
        $constancia = str_replace('{RRHH_DIRECTOR}', '<b>' . $this->entorno->rrhh_director . '</b>', $constancia);
        $constancia = str_replace('{RRHH_DIRECTOR_DECRETO}', '<b>' . $this->entorno->rrhh_dir_decreto . '</b>', $constancia);

        $styleQR = array(
            'border'        => 2,
            'vpadding'      => 'auto',
            'hpadding'      => 'auto',
            'fgcolor'       => array(0, 0, 0),
            'bgcolor'       => false,
            'module_width'  => 1,
            'module_height' => 1
        );

        $pdf = new Pdf();
        $pdf->SetTitle('Constancia de solicitud de Asistencia');
        $pdf->SetSubject('Constancia de solicitud de Asistencia');
        $pdf->SetRightMargin(10);
        $pdf->AddPage();
        $pdf->SetY(40);
        $pdf->setFont('', 'B', 10);
        $pdf->Cell(0, 3, 'EL SUSCRITO DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS HUMANOS', 0, 1, 'C');
        $pdf->Cell(0, 3, 'DE LA GOBERNACIÓN DEL ESTADO BOLIVARIANO DE MÉRIDA', 0, 1, 'C');
        $pdf->Cell(0, 15, 'HACE CONSTAR', 0, 1, 'C');
        $pdf->setFont('', '', 12);
        $pdf->writeHTMLCell(0, 0, '', '', $constancia, 0, 1, 0, true, '', true);
        $pdf->write2DBarcode($url, 'QRCODE,H', 90, 190, 40, 40, $styleQR);
        $x = $this->entorno->usuario_dir . '. ' . $this->entorno->rrhh_nombre;
        $x .= " Teléfono: {$this->entorno->usuario_tlf}. {$this->entorno->usuario_id}";
        $pdf->set_footer($x);
        $pdf->Output('cns_trabajo.pdf', 'D');
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
     * Combo destino de solicitud.
     */
    private function comboDestino($id = null)
    {
        $r = array(
            1  => 'RRHH',
            2  => 'Dpto. de Empleados',
            3  => 'Dpto. de Jubilados',
            4  => 'Dpto. de Prestaciones sociales',
            5  => 'Dpto. de Planificación',
            6  => 'Dpto. de Asesoría legal',
            7  => 'Dpto. de Informática',
            8  => 'Dpto. de Administración',
            9  => 'Dpto. de Coordinación',
            10 => 'Dpto. de Nómina'
        );
        return form_dropdown('destSol', $r, $id, array('id' => 'destSol', 'class' => 'form-control'));
    }

    /**
     * Plantilla HTML de la constancia de asistencia (placeholders).
     */
    private function cont_constancia_asistencia(){
        return '<p style="text-align:justify;">
            Que el (la) ciudadano(a): {NOMBRE}, titular de la cédula de identidad Nro. {CEDULA},
            solicitó asistencia a través de nuestro sistema en línea el {FECHA_SOLICITUD}, recibiendo respuesta el {FECHA_RESPUESTA}.
            <br><br>
            Asunto:
            {ASUNTO_SOLICITUD}
            <br>
            Dirigido a:
            {DESTINO}
            <br>
            Solicitud:<br>
            {SOLICITUD}
            <br>
            Respuesta recibida:<br>
            {RESPUESTA_SOLICITUD}
            <br><br>
            Constancia que se expide a solicitud de parte interesada,
            en la ciudad de Mérida a los {FECHA}.
            <p style="text-align:center;">{RRHH_DIRECTOR}<br>
            DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS HUMANOS DE LA
            GOBERNACIÓN DEL ESTADO MÉRIDA<br>
            {RRHH_DIRECTOR_DECRETO}
            </p>
            Esta constancia de trabajo ha sido impresa electrónicamente, los datos reflejados están
            sujetos a validación a través de la dirección: <b>http://tthh.merida.gob.ve/proyectos/tthh/ct_chk</b>,
            introduciendo el siguiente código: {CODIGO_CT}  ó escaneando  el código QR:<br>
            </p>';
    }

    /**
     * Genera una cadena aleatoria alfanumérica.
     */
    private function generar_codigo($strength = 16){
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_string .= $input[mt_rand(0, $input_length - 1)];
        }
        return $random_string;
    }
}
