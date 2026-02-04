<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador Solicitud: comprobantes de pago y constancias de trabajo.
 *
 * @author Carlos Iturralde <iturraldec@gmail.com>
 * @author Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
 */
class Solicitud_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('number', 'download', 'date'));
        $this->load->library('table');
        $this->load->model('Trabajador_m', 'trbm');

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
     * Genera PDF de comprobante de pago.
     */
    public function generar_comprobante_pago()
    {
        $this->load->library('Pdf');

        $nomina_id    = $this->input->get('nomina_id');
        $idTrabajador = $this->input->get('idT');

        $r          = $this->trbm->get_recibo($nomina_id, $idTrabajador);
        $encabezado = $r->result()[0];

        $pdf = new Pdf();
        $styleQR = array(
            'border'        => 2,
            'vpadding'     => 'auto',
            'hpadding'     => 'auto',
            'fgcolor'      => array(0, 0, 0),
            'bgcolor'      => false,
            'module_width' => 1,
            'module_height' => 1
        );

        $pdf->SetTitle('Comprobante de Pago');
        $pdf->SetSubject('Comprobante de Pago');
        $pdf->SetRightMargin(1);
        $pdf->AddPage();
        $pdf->SetY(30);
        $pdf->Cell(0, 0, 'Comprobante de Pago', 0, 1, 'C');

        $x       = 20;
        $y       = $pdf->getY();
        $offsetX = 40;
        $offsetY = 2;
        $url     = base_url("comp_pago_chk?id1=$nomina_id&id2={$this->trbm->id}");
        $pdf->write2DBarcode($url, 'QRCODE,H', $x, $y, 30, 30, $styleQR, 'N');

        $pdf->setFontSize(7);
        $pdf->setXY($x + $offsetX, $y + $offsetY);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'Nómina:', 0, 0, 'R');
        $pdf->SetFont('');
        $pdf->Cell(80, 0, $encabezado->denominacion, 0, 1, 'L');

        $pdf->setX($x + $offsetX);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'Periodo:', 0, 0, 'R');
        $pdf->SetFont('');
        $pdf->Cell(80, 0, $encabezado->fdesde . ' AL ' . $encabezado->fhasta, 0, 1, 'L');

        $pdf->setX($x + $offsetX);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'Trabajador:', 0, 0, 'R');
        $pdf->SetFont('');
        $pdf->MultiCell(80, 0, trim($encabezado->codigo) . "(" . trim($encabezado->cedula) . ") " . trim($this->session->nombre), 0, 'L', FALSE, 1);

        $pdf->setX($x + $offsetX);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'F. de Ingreso:', 0, 0, 'R');
        $pdf->SetFont('');
        $fechaIngreso = date("d/m/Y", strtotime($encabezado->fingreso));
        $pdf->Cell(80, 0, $fechaIngreso, 0, 1, 'L');

        $pdf->setX($x + $offsetX);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'Cargo:', 0, 0, 'R', FALSE, '', 1);
        $pdf->SetFont('');
        $pdf->MultiCell(80, 0, $encabezado->cargo, 0, 'L', FALSE, 1);

        $pdf->setX($x + $offsetX);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'Banco:', 0, 0, 'R');
        $pdf->SetFont('');
        $pdf->Cell(80, 0, $encabezado->banco, 0, 1, 'L');

        $pdf->setX($x + $offsetX);
        $pdf->SetFont('', 'B');
        $pdf->Cell(20, 0, 'Cuenta:', 0, 0, 'R', FALSE, '', 1);
        $pdf->SetFont('');
        $pdf->MultiCell(80, 0, $encabezado->cuenta, 0, 'L', FALSE, 1);

        $pdf->setXY($x, 65);
        $pdf->SetFont('', 'B');
        $pdf->Cell(80, 0, 'Concepto', 0, 0, 'C');
        $pdf->Cell(40, 0, 'Asignaciones', 0, 0, 'C');
        $pdf->Cell(40, 0, 'Deducciones', 0, 1, 'C');

        $asignacion = 0;
        $deduccion  = 0;
        $pdf->SetFont('');
        foreach ($r->result() as $value) {
            $pdf->setXY($x, $pdf->getY());
            $pdf->Cell(80, 0, $value->concepto, 1, 0);
            $pdf->Cell(40, 0, set_formato_decimal($value->asignacion), 1, 0, 'R');
            $pdf->Cell(40, 0, set_formato_decimal($value->deduccion), 1, 1, 'R');
            $asignacion += $value->asignacion;
            $deduccion  += $value->deduccion;
        }

        $pdf->setX($x);
        $pdf->SetFont('', 'B');
        $pdf->Cell(80, 0, 'Totales Bs. ', 1, 0, 'R');
        $pdf->Cell(40, 0, set_formato_decimal($asignacion), 1, 0, 'R');
        $pdf->Cell(40, 0, set_formato_decimal($deduccion), 1, 1, 'R');

        $pdf->setX($x);
        $pdf->Cell(80, 0, 'Neto Bs. ', 1, 0, 'R');
        $pdf->Cell(80, 0, set_formato_decimal($asignacion - $deduccion), 1, 1, 'C');

        $pdf->imprimir_pie = FALSE;
        $pdf->Output('cmp_pago.pdf', 'D');
    }

    /**
     * Vista/formulario para seleccionar comprobante de pago.
     */
    public function comprobante_pago()
    {
        $dataAnio = array('2018' => '2018', '2019' => '2019', '2020' => '2020');
        $ddl_anios = form_dropdown(
            'anioNomina',
            $dataAnio,
            '',
            array('id' => 'anioNomina', 'class' => 'form-control', 'onClick' => 'limpiarComprobante()')
        );

        $dataMes = array(
            1  => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
            7  => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        );
        $ddl_mes = form_dropdown(
            'mesNomina',
            $dataMes,
            '',
            array('id' => 'mesNomina', 'class' => 'form-control', 'onClick' => 'limpiarComprobante()')
        );

        $r = $this->trbm->get_jobs_by_persona($this->session->persona_id);
        $dataCargos = array();
        foreach ($r as $row) {
            $dataCargos[$row['id']] = $row['cargo'];
        }

        $cmbTrabajo = form_dropdown(
            'cargoNomina',
            $dataCargos,
            '',
            array('id' => 'cargoNomina', 'class' => 'form-control', 'onClick' => 'limpiarComprobante()')
        );

        $datos['lista'] = $cmbTrabajo;

        if ($this->entorno->system_delay) {
            $datos['page_encabezado']  = 'Comprobantes de Pagos';
            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
            $datos['mensaje']          = 'Estimado Usuario, en éstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago.
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        if (!$this->input->is_ajax_request()) {
            $datos['page_encabezado']  = 'Comprobantes de Pagos';
            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
            $datos['ddl_anios']        = $ddl_anios;
            $datos['ddl_mes']          = $ddl_mes;
            $datos['ddl_nomina']       = null;
            $datos['contenido']        = $this->load->view('trabajador/comprobante_pago_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        $idTrabajador = $this->input->get('idT');
        $anio         = $this->input->get('anio');
        $mes          = $this->input->get('mes');

        $r = $this->trbm->get_nomina_by_anio_y_mes($idTrabajador, $anio, $mes);

        if ($r->num_rows() == 0) {
            echo 'El Trabajador no posee comprobantes.';
            return;
        }

        $cad = '<ul>';
        $data = array();
        foreach ($r->result() as $row) {
            $data[$row->id] = $row->denominacion;
            $cad .= "<li onClick=generar(" . $row->id . ") class='li-nuevo'>" .
                '<button type="button" id="btnVer" class="btn btn-primary"><i class="fa fa-fw fa-file-pdf-o"></i></button> ' .
                $row->denominacion . "</li>";
        }
        $cad .= "</ul>";

        echo $cad;
    }

    /**
     * Validación de comprobante de pago (público).
     */
    public function comprobante_pago_chk()
    {
        $nomina_id     = $this->input->get('id1');
        $trabajador_id = $this->input->get('id2');
        $r             = $this->trbm->get_recibo($nomina_id, $trabajador_id);
        $encabezado    = $r->result()[0];

        $asignacion = 0;
        $deduccion  = 0;
        foreach ($r->result() as $value) {
            $asignacion += $value->asignacion;
            $deduccion  += $value->deduccion;
        }

        $datos['page_encabezado'] = 'Validación de Comprobantes de Pagos';
        $datos['contenido']       = '<table align="center" border="2" style="border-collapse: separate; border-spacing: 5px 5px;">';
        $datos['contenido']      .= "<tr><td width='200' class='text-right'><b>Código del Trabajador</b></td>";
        $datos['contenido']      .= "<td width='200'>{$encabezado->codigo}</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Cédula de Identidad</b></td>";
        $datos['contenido']      .= "<td>{$encabezado->cedula}</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Nombre(s) y Apellido(s)</b></td>";
        $datos['contenido']      .= "<td>{$encabezado->nombre1} {$encabezado->nombre2} {$encabezado->apellido1} {$encabezado->apellido2}</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Nómina</b></td>";
        $datos['contenido']      .= "<td>{$encabezado->denominacion}</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Periodo</b></td>";
        $datos['contenido']      .= "<td>{$encabezado->fdesde} AL {$encabezado->fhasta}</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Asignaciones Bs.</b></td>";
        $datos['contenido']      .= "<td>" . set_formato_decimal($asignacion) . "</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Deducciones Bs.</b></td>";
        $datos['contenido']      .= "<td>" . set_formato_decimal($deduccion) . "</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Ingreso Neto Bs.</b></td>";
        $datos['contenido']      .= "<td>" . set_formato_decimal($asignacion - $deduccion) . "</td></tr>";
        $datos['contenido']      .= "<tr><td class='text-right'><b>Bono de Alimentación Bs.</b></td>";
        $datos['contenido']      .= "<td>{$this->entorno->cesta_ticket}</td></tr>";
        $datos['contenido']      .= "</table>";

        $this->renderiza($this->entorno->free_template, $datos);
    }

    /**
     * Constancia de trabajo: vista HTML o generación de PDF.
     */
    public function constancia_trabajo()
    {
        if ($this->entorno->system_delay) {
            $datos['page_encabezado']  = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $datos['mensaje']           = 'Estimado Usuario, en éstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago.
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        if (!$this->input->is_ajax_request()) {
            $datos['page_encabezado']  = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $datos['lista']            = $this->trbm->get_jobs_by_persona($this->session->persona_id);
            $datos['contenido']        = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
            return;
        }

        $this->load->library('Pdf');
        $idTrabajador   = $this->input->get('id');
        $datosConstancia = $this->trbm->get_by_trabajador($idTrabajador);

        $datTrabajador = $datosConstancia['trabajador'][0];
        $datAds        = $datosConstancia['datosAds'];
        $datTipo       = $datosConstancia['datosTipo'];

        $ingreso  = $this->trbm->get_last_ingreso_by_id($idTrabajador);
        $singreso = numtoletras($ingreso);
        $ingreso  = set_formato_decimal($ingreso);

        $dia   = date('d');
        $mes   = date('m');
        $anio  = date('Y');
        $fecha = strtolower(numtoletras($dia, FALSE)) . ' días del mes de ' . $this->entorno->local_mes[$mes - 1] . ' de ' . $anio;

        $constancia = $this->trbm->tipo->ct_plantilla;
        $constancia = str_replace('{NOMBRE}', '<b>' . $this->trbm->persona->nombre1 . ' ' . $this->trbm->persona->nombre2 . ' ' .
            $this->trbm->persona->apellido1 . ' ' . $this->trbm->persona->apellido2 . '</b>', $constancia);
        $constancia = str_replace('{CEDULA}', '<b>' . set_formato_entero($this->trbm->persona->cedula) . '</b>', $constancia);
        $constancia = str_replace('{CARGO}', '<b>' . $datTrabajador['cargo'] . '</b>', $constancia);
        $constancia = str_replace('{DP_ADSCRITO}', '<b>' . $datAds->organismo . '</b>', $constancia);
        $constancia = str_replace('{CONDICION}', '<b>' . $datTipo->tipo . '</b>', $constancia);
        $constancia = str_replace('{INGRESO_CAD}', '<b>' . $singreso . '</b>', $constancia);
        $constancia = str_replace('{INGRESO}', '<b>' . $ingreso . '</b>', $constancia);
        $constancia = str_replace('{CODIGO_TRABAJADOR}', '<b>' . $datTrabajador['codigo'] . '</b>', $constancia);
        $constancia = str_replace('{FECHA_INGRESO}', '<b>' . $datTrabajador['sfingreso'] . '</b>', $constancia);

        if ($this->trbm->tipo->cesta_ticket) {
            $ct  = $this->entorno->cesta_ticket;
            $sct = numtoletras(unset_formato($ct));
            $constancia = str_replace('{CESTA_TICKET_CAD}', '<b>' . $sct . '</b>', $constancia);
            $constancia = str_replace('{CESTA_TICKET}', '<b>' . $ct . '</b>', $constancia);
        } else {
            $ct = 0;
        }

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

        $capture = array(
            'fecha'   => "$dia/$mes/$anio",
            'ingreso' => $ingreso,
            'ct'      => $ct,
            'avala'   => $this->entorno->rrhh_director
        );

        $constancia_codigo = $this->trbm->constancia->get_codigo();
        $this->trbm->constancia->set_datos(array(
            'trabajador_fk' => $this->trbm->id_trabajador,
            'capture'       => json_encode($capture),
            'codigo'        => $constancia_codigo
        ));
        $this->trbm->constancia->trabajador_ct_id = 0;
        if (!$this->trbm->constancia->upd()) {
            return;
        }

        $url = base_url("ct_chk?codigo=$constancia_codigo");
        $constancia = str_replace('{CODIGO_CT}', $constancia_codigo, $constancia);

        $pdf = new Pdf();
        $pdf->SetTitle('Constancia de Trabajo');
        $pdf->SetSubject('Constancia de Trabajo');
        $pdf->SetRightMargin(1);
        $pdf->AddPage();
        $pdf->SetY(40);
        $pdf->setFont('', 'B', 10);
        $pdf->Cell(0, 3, 'EL SUSCRITO DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS HUMANOS', 0, 1, 'C');
        $pdf->Cell(0, 3, 'DE LA GOBERNACIÓN DEL ESTADO BOLIVARIANO DE MÉRIDA', 0, 1, 'C');
        $pdf->Cell(0, 15, 'HACE CONSTAR', 0, 1, 'C');
        $pdf->setFont('', '', 12);
        $pdf->writeHTMLCell(0, 0, '', '', $constancia, 0, 1, 0, true, '', true);
        $pdf->write2DBarcode($url, 'QRCODE,H', 90, 180, 40, 40, $styleQR);
        $x = $this->entorno->usuario_dir . '. ' . $this->entorno->rrhh_nombre;
        $x .= " Teléfono: {$this->entorno->usuario_tlf}. {$this->entorno->usuario_id}";
        $pdf->set_footer($x);
        $pdf->Output('cns_trabajo.pdf', 'D');
    }

    /**
     * Validación de constancia de trabajo (público).
     */
    public function ct_chk()
    {
        $datos['page_encabezado'] = 'Validación de Constancias de Trabajo';

        if ($this->input->get('codigo')) {
            $template = array(
                'table_open' => '<table align="center" border="2" style="border-collapse: separate; border-spacing: 5px 5px;">',
            );
            $this->table->set_template($template);
            $this->trbm->constancia->codigo = $this->input->get('codigo');
            $this->trbm->constancia->get_by_codigo();

            if (!$this->trbm->constancia->get_success()) {
                $data = array(
                    array('<strong>Código de la Constancia de Trabajo no reconocido!</strong>')
                );
            } else {
                $ct = json_decode($this->trbm->constancia->capture);
                $this->trbm->get_by_persona($this->trbm->constancia->trabajador_fk);
                $this->table->set_caption('Constancia de Trabajo Referenciada');
                $data = array(
                    array('', ''),
                    array('<strong>Cédula</strong>', "{$this->trbm->persona->nacionalidad}-{$this->trbm->persona->cedula}"),
                    array('<strong>Nombre</strong>', $this->trbm->persona->get_nombre_full()),
                    array('<strong>Código del Trabajador</strong>', $this->trbm->codigo),
                    array('<strong>Fecha de emisión</strong>', $ct->fecha),
                    array('<strong>Ingreso Bs.</strong>', $ct->ingreso),
                    array('<strong>Cesta Ticket Bs.</strong>', $ct->ct),
                    array('<strong>Director de RRHH</strong>', $ct->avala),
                );
            }
            $datos['contenido'] = $this->table->generate($data);
        } else {
            $datos['contenido'] = $this->load->view('trabajador/ct_chk_v', '', TRUE);
        }

        $this->renderiza($this->entorno->free_template, $datos);
    }
}
