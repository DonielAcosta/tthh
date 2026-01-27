<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Trabajador_c extends MY_Controller
{
	// constructor
	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('number', 'download', 'date'));
        $this->load->library('table');
		$this->load->model('Trabajador_m', 'trbm');
		$this->load->model('Trabajador_m', 'cargos');
        if (isset($this->session->persona_id)){
            $this->trbm->get_by_persona($this->session->persona_id);
            $this->cargos->get_jobs_by_persona($this->session->persona_id);
        }else{
            $url = base_url();
        	header ( "Location: $url" );
        }
//        die();
	}
	/////////////////////////// FIN DE: __construct /////////////////////////////

	// 
    public function index() 
    {
        echo 'trabajador...';
    }
    /**
    * Buscar los Comprobantes de pago de un trabajador dado el anio y el mes
    *
    * @access       public
    * @autor        Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
    * @version      1.0 01/05/2020
    */

    public function generar_comprobante_pago()
    {
//    	$r = $this->trbm->get_nomina();
//        if ($this->entorno->system_delay) {
//            $datos['page_encabezado'] = 'Comprobantes de Pagos';
//            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
//            $datos['mensaje'] = 'Estimado Usuario, en óstos momentos estamos realizando<br>
//                la actualizacón de la información de las Nóminas de Pago. 
//                Por favor intenta dentro de unos minutos.';
//            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
//            $this->renderiza($this->entorno->empty_template, $datos);
//        }
//        else if (! $this->input->is_ajax_request()) {
//            $r = $this->trbm->get_nomina();
//            if ($r->num_rows() == 0)
//                $ddl_nomina = 'El Trabajador no posee comprobantes.';
//            else {
//                foreach($r->result() as $row)
//                    $data[$row->id] = $row->denominacion;
//                $ddl_nomina = form_dropdown(
//                    'nomina', 
//                    $data, 
//                    '', 
//                    array('id'      => 'nomina',
//                          'class'   => 'form-control'
//                    )
//                );
//            }
//            $dataAnio = array('2019'=>'2019','2020'=>'2020');
//            $ddl_anios = form_dropdown(
//                    'aniosNomina', 
//                    $dataAnio, 
//                    '', 
//                    array('id'      => 'anioNomina',
//                          'class'   => 'form-control'
//                    )
//                );
//            $dataMes = array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');
//            $ddl_mes = form_dropdown(
//                    'aniosNomina', 
//                    $dataMes, 
//                    '', 
//                    array('id'      => 'mesNomina',
//                          'class'   => 'form-control'
//                    )
//                );
//            $datos['page_encabezado'] = 'Comprobantes de Pagos';
//            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
//            $datos['ddl_anios'] = $ddl_anios;
//            $datos['ddl_mes'] = $ddl_mes;
//            $datos['ddl_nomina'] = $ddl_nomina;
//            $datos['contenido'] = $this->load->view('trabajador/comprobante_pago_v', $datos, TRUE);
//            $this->renderiza($this->entorno->empty_template, $datos);
//        }
//        else 
        {
            // descargar un comprobante
            $this->load->library('Pdf');

            //
            $nomina_id = $this->input->get('nomina_id');
            $idTrabajador = $this->input->get('idT');
            
            $r = $this->trbm->get_recibo($nomina_id,$idTrabajador);
//            echo "[$nomina_id]";
//            var_dump($r->result());die();
            $encabezado = $r->result()[0];
            $pdf = new Pdf();
            $styleQR = array(
                'border' => 2,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255)
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );
            $pdf->SetTitle('Comprobante de Pago');
            $pdf->SetSubject('Comprobante de Pago');
            $pdf->SetRightMargin(1);
            $pdf->AddPage();
            $pdf->SetY(30);
            $pdf->Cell(0, 0, 'Comprobante de Pago', 0, 1, 'C');
            $x = 20;
            $y = $pdf->getY();
            $offsetX = 40;
            $offsetY = 2;
            $url = base_url("comp_pago_chk?id1=$nomina_id&id2={$this->trbm->id}");
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
            $pdf->Cell(80, 0, $encabezado->fdesde.' AL '.$encabezado->fhasta, 0, 1, 'L');
            $pdf->setX($x + $offsetX);
            $pdf->SetFont('', 'B');
            $pdf->Cell(20, 0, 'Trabajador:', 0, 0, 'R');
            $pdf->SetFont('');
            $pdf->MultiCell(80, 0, trim($encabezado->codigo)."(".trim($encabezado->cedula).") ".trim($this->session->nombre), 0, 'L', FALSE, 1);
            $pdf->setX($x + $offsetX);
            $pdf->SetFont('', 'B');
            $pdf->Cell(20, 0, 'F. de Ingreso:', 0, 0, 'R');
            $pdf->SetFont('');
            $fechaIngreso = $encabezado->fingreso;
            //echo "-$fechaIngreso-";
            $fechaIngreso = date("d/m/Y", strtotime($fechaIngreso));
            //$pdf->Cell(80, 0, $encabezado->fingreso, 0, 1, 'L');
            $pdf->Cell(80, 0, $fechaIngreso, 0, 1, 'L');
            $pdf->setX($x + $offsetX);
            $pdf->SetFont('', 'B');
            $pdf->Cell(20, 0, 'Cargo:', 0, 0, 'R',FALSE,'',1);
            $pdf->SetFont('');
            $pdf->MultiCell(80, 0, $encabezado->cargo, 0, 'L', FALSE, 1);
            $pdf->setX($x + $offsetX);
            $pdf->SetFont('', 'B');
            $pdf->Cell(20, 0, 'Banco:', 0, 0, 'R');
            $pdf->SetFont('');
            $pdf->Cell(80, 0, $encabezado->banco, 0, 1, 'L');
            $pdf->setX($x + $offsetX);
            $pdf->SetFont('', 'B');
            $pdf->Cell(20, 0, 'Cuenta:', 0, 0, 'R',FALSE,'',1);
            $pdf->SetFont('');
            $pdf->MultiCell(80, 0, $encabezado->cuenta, 0, 'L', FALSE, 1);
            $pdf->setXY($x, 65);
            $pdf->SetFont('', 'B');
            $pdf->Cell(80, 0, 'Concepto', 0, 0, 'C');
            $pdf->Cell(40, 0, 'Asignaciones', 0, 0, 'C');
            $pdf->Cell(40, 0, 'Deducciones', 0, 1, 'C');
            $asignacion = 0;
            $deduccion = 0;
            $pdf->SetFont('');
            foreach ($r->result() as $value) {
                $pdf->setXY($x, $pdf->getY());
                $pdf->Cell(80, 0, $value->concepto, 1, 0);
                $pdf->Cell(40, 0, set_formato_decimal($value->asignacion), 1, 0, 'R');
                $pdf->Cell(40, 0, set_formato_decimal($value->deduccion), 1, 1, 'R');
                $asignacion += $value->asignacion;
                $deduccion += $value->deduccion;
            }
            $pdf->setX($x);
            $pdf->SetFont('', 'B');
            $pdf->Cell(80, 0, 'Totales Bs. ', 1, 0, 'R');
            $pdf->Cell(40, 0, set_formato_decimal($asignacion), 1, 0, 'R');
            $pdf->Cell(40, 0, set_formato_decimal($deduccion), 1, 1, 'R');
            $pdf->setX($x);
            $pdf->Cell(80, 0, 'Neto Bs. ', 1, 0, 'R');
            $pdf->Cell(80, 0, set_formato_decimal($asignacion - $deduccion), 1, 1, 'C');
            $pdf->setX($x);
            //$pdf->Cell(80, 0, 'Bono de Alimentación Bs. ', 1, 0, 'R');
            //$pdf->Cell(80, 0, $this->entorno->cesta_ticket, 1, 1, 'C');
            $pdf->imprimir_pie = FALSE;
            $pdf->Output('cmp_pago.pdf', 'D');
        }
    }
    /////////////////////////////// FIN DE: comprobante_pago ////////////////////////////////
    /**
    * Comprobante de pago de un trabajador.
    *
    * @access       public
    * @autor        Carlos Iturralde <iturraldec@gmail.com>
    * @version      18/07/2018 
    */

    public function comprobante_pago()
    {
//         $dataAnio = array('2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021');
        $dataAnio = array('2021'=>'2021');
        $datos['cedula'] = $this->trbm->persona->cedula;
            $ddl_anios = form_dropdown(
                    'anioNomina', 
                    $dataAnio, 
                    '', 
                    array('id'      => 'anioNomina',
                          'class'   => 'form-control',
                          'onClick'   => 'limpiarComprobante()'
                    )
                ); 
//             $dataMes = array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');
//             $dataMes = array('6:2q'=>'Junio, 2 Quincena','7:1q'=>'Julio, 1 Quincena','7:2q'=>'Julio, 2 Quincena','8:1q'=>'Agosto, 1 Quincena','9:1q'=>'Septiembre, 1 Quincena');
            $dataMes = array('12:1q'=>'Diciembre, 1 Quincena');
            $ddl_mes = form_dropdown(
                    'mesNomina', 
                    $dataMes, 
                    '', 
                    array('id'      => 'mesNomina',
                          'class'   => 'form-control',
                          'onClick'   => 'limpiarComprobante()'
                    )
                );
	        $r = $this->trbm->get_jobs_by_persona($this->session->persona_id);
// 	        var_dump($r);

// 	        $mes = '06/';
// 	        $quincena = '2q/';
	        
// 	        $cedRec = str_pad($this->trbm->persona->cedula, 8, "0", STR_PAD_LEFT);
// 	        $tipo = $r[0]['tipo_fk'];
// 	        $carp = $this->determinarCarpeta($tipo);
	        
// 	        echo "[$tipo]-[$carp]";
	        
// 	        $path = path_sistema.'src/constancias/'.$mes.$quincena.$carp;
// // 	        $resArchivos = $this->listarArchivos($path,$this->trbm->persona->cedula);
// // 	        var_dump($resArchivos);
	        
// 	        $this->load->library('session');
// 	        $this->load->helper('directory');
// 	        $map = directory_map($path);
	        
	        
	        
	        
// // 	        echo "[$cedRec]";die();
// // 	        var_dump($map);die(); 
// 	        $pathRecibo = '';
// 	        foreach ($map as $ite) {
// 	            if ($ite=="rec_".$cedRec.'.pdf') {
	                
// 	                $this->session->cedulaRec = $cedRec;
// 	                $this->session->cedulaMes = $mes;
// 	                $this->session->quincena = $quincena;
// 	                $this->session->tipo = $tipo;
// 	                $this->session->carp = $carp;
	                
// 	                $pathRecibo = $_SERVER['HTTP_HOST'].'/'.'src/constancias/'.$mes.$quincena.$carp."/rec_".$cedRec.'.pdf';
// 	                $datos['etiRecibo'] = 'Segunda quincena de junio';
// // 	                echo "Encontro archivo";
// 	            }else{
// // 	                echo $ite.'<br>';
// 	            }
// 	        }
// 	        $datos['pathRecibo'] = $pathRecibo;
	        
	        if ($r==null) {
	            $datos['page_encabezado'] = 'Comprobantes de Pagos';
	            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
	            $datos['mensaje'] = 'Estimado Usuario, no podemos generar su comprobante, por favor ingrese a Solicitudes varias y realice el requerimiento colocando en 
                el campo asunto: "comprobante inactivo".';
	            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
	            $this->renderiza($this->entorno->empty_template, $datos);
	        }else{
                foreach($r as $row)
                    $dataCargos[$row['tipo_fk']] = $row['cargo'];
                
//                     $dataCargos[$row['id']] = $row['cargo']; // Comentado por la version de archivos

//                     var_dump($dataCargos);die();
            $cmbTrabajo = form_dropdown(
                    'cargoNomina', 
                    $dataCargos, 
                    '', 
                    array('id'      => 'cargoNomina',
                          'class'   => 'form-control',
                          'onClick'   => 'limpiarComprobante()'
                    )
                );		   	
//		   	$datos['lista'] = $r;	
		   	$datos['lista'] = $cmbTrabajo;	
        if ($this->entorno->system_delay) {
            $datos['page_encabezado'] = 'Comprobantes de Pagos';
            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
            $datos['mensaje'] = 'Estimado Usuario, en óstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago. 
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
        }
        else if (! $this->input->is_ajax_request()) {
            $datos['page_encabezado'] = 'Comprobantes de Pagos';
            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
            $datos['ddl_anios'] = $ddl_anios;
            $datos['ddl_mes'] = $ddl_mes;
            $datos['ddl_nomina'] = null;
            $datos['contenido'] = $this->load->view('trabajador/comprobante_pago_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
        }
        else {
            // Aqui se generaba el PDF
        //            $r = $this->trbm->get_nomina();
        	$idTrabajador = $_GET['idT'];
        	$anio = $_GET['anio'];
        	$mes = $_GET['mes'];
//        	$idTrabajador = 1771;
//            $res = $this->trbm->get_nomina();
            $r = $this->trbm->get_nomina_by_anio_y_mes($idTrabajador,$anio,$mes);
//            var_dump($r->result());
            if ($r->num_rows() == 0){
                $ddl_nomina = 'El Trabajador no posee comprobantes.';
                $cad = 'El Trabajador no posee comprobantes.';
            }else {
//                foreach($r->result() as $row)
//                    $data[$row->id] = $row->denominacion;
                $cad = '<select id="comboNomina">';
                $cad = '<ul">';
            	foreach($r->result() as $row){
                    $data[$row->id] = $row->denominacion;
//                    $cad .= "<option value=".$row->id.">".$row->denominacion."</option>";
                    $cad .= "<li onClick=generar(".$row->id.") class='li-nuevo'>".
                    '<button type="button" id="btnVer" class="btn btn-primary"><i class="fa fa-fw fa-file-pdf-o"></i></button> '.
                    $row->denominacion."</li>";
                }
//                $cad .= "</select>";
                $cad .= "</ul>";
                $ddl_nomina = form_dropdown(
                    'nomina', 
                    $data, 
                    '', 
                    array('id'      => 'nomina',
                          'class'   => 'form-control'
                    )
                );
            }
//            var_dump($data);
//            foreach ($data as $ite) {
//            	echo "[$ite]<br>";;
//            }
            echo  $cad;
            $datos['page_encabezado'] = 'Comprobantes de Pagos';
            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
            $datos['ddl_anios'] = $ddl_anios;
            $datos['ddl_mes'] = $ddl_mes;
            $datos['ddl_nomina'] = $ddl_nomina;
//            $datos['contenido'] = $this->load->view('trabajador/comprobante_pago_v', $datos, TRUE);
//            $this->renderiza($this->entorno->empty_template, $datos);
        }
	        }
    }
    /////////////////////////////// FIN DE: comprobante_pago ////////////////////////////////

    /**
    * Verificacion de un comprobante de pago de un trabajador.
    *
    * @access       public
    * @autor        Carlos Iturralde <iturraldec@gmail.com>
    * @version      22/10/2018
    */

    public function comprobante_pago_chk()
    {
        $nomina_id = $this->input->get('id1');
        $trabajador_id = $this->input->get('id2');
        $r = $this->trbm->get_recibo($nomina_id, $trabajador_id);
        $encabezado = $r->result()[0];
        $asignacion = 0;
        $deduccion = 0;
        foreach ($r->result() as $value) {
            $asignacion += $value->asignacion;
            $deduccion += $value->deduccion;
        }
        $datos['page_encabezado'] = 'Validación de Comprobantes de Pagos';
        $datos['contenido'] = '<table align="center" border="2" style="border-collapse: separate; border-spacing: 5px 5px;">';
        $datos['contenido'] .= "<tr><td width='200' class='text-right'><b>Código del Trabajador</b></td>";
        $datos['contenido'] .= "<td width='200'>{$encabezado->codigo}</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Códula de Identidad</b></td>";
        $datos['contenido'] .= "<td>{$encabezado->cedula}</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Nombre(s) y Apellido(s)</b></td>";
        $datos['contenido'] .= "<td>{$encabezado->nombre1} {$encabezado->nombre2} {$encabezado->apellido1} {$encabezado->apellido2}</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Nómina</b></td>";
        $datos['contenido'] .= "<td>{$encabezado->denominacion}</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Periodo</b></td>";
        $datos['contenido'] .= "<td>{$encabezado->fdesde} AL {$encabezado->fhasta}</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Asignaciones Bs.</b></td>";
        $datos['contenido'] .= "<td>".set_formato_decimal($asignacion)."</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Deducciones Bs.</b></td>";
        $datos['contenido'] .= "<td>".set_formato_decimal($deduccion)."</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Ingreso Neto Bs.</b></td>";
        $datos['contenido'] .= "<td>".set_formato_decimal($asignacion - $deduccion)."</td></tr>";
        $datos['contenido'] .= "<tr><td class='text-right'><b>Bono de Alimentación Bs.</b></td>";
        $datos['contenido'] .= "<td>{$this->entorno->cesta_ticket}</td></tr>";
        $datos['contenido'] .= "</table>";
        $this->renderiza($this->entorno->free_template, $datos);
    }
    /////////////////////////// FIN DE: comprobante_pago_chk ////////////////////////

    /**
    * Constancia de trabajo.
    *
    * @access       public
    * @autor        Carlos Iturralde <iturraldec@gmail.com>
    * @version      13/11/2018
    */

    public function constancia_trabajo()
    {
        if ($this->entorno->system_delay) {
            $datos['page_encabezado'] = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $datos['mensaje'] = 'Estimado Usuario, en óstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago. 
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
        }
        else if (! $this->input->is_ajax_request()) {
            $datos['page_encabezado'] = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';           
			
	        $r = $this->trbm->get_jobs_by_persona($this->session->persona_id);
// 	        var_dump($r);
	        if ($r==null) {
	            $datos['sinInfo'] = 0;
	            
	            $datos['contenido'] = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
	            $this->renderiza($this->entorno->empty_template, $datos);
	        }else{
	            $datos['sinInfo'] = 1;
    		   	$datos['lista'] = $r;		   	
    		   
                $datos['contenido'] = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
                $this->renderiza($this->entorno->empty_template, $datos);
		   	}
        }
        else {
            //echo $_GET['id'].']++id';
            $this->load->library('Pdf');
            $idTrabajador = $_GET['id'];
            $datosConstancia = $this->trbm->get_by_trabajador($idTrabajador);
            
            $datTrabajador = $datosConstancia['trabajador'][0];
            $datAds = $datosConstancia['datosAds'];
            $datTipo = $datosConstancia['datosTipo'];
//            var_dump($datosConstancia);
//            var_dump($datAds);
//            var_dump($datTipo);
            
            //
            $ingreso = $this->trbm->get_last_ingreso_by_id($idTrabajador);
            $singreso = numtoletras($ingreso);
            $ingreso = set_formato_decimal($ingreso);
            $dia = date("d");
            $mes = date("m");
            $anio = date("Y");
            $fecha = strtolower(numtoletras($dia, FALSE)).' días del mes de '.strtolower($this->entorno->local_mes[$mes-1]).' de '.$anio;
            $constancia = $this->trbm->tipo->ct_plantilla;
            $constancia = str_replace('{NOMBRE}', '<b>'.$this->trbm->persona->nombre1.' '.$this->trbm->persona->nombre2.' '.
            		$this->trbm->persona->apellido1.' '.$this->trbm->persona->apellido2.'</b>', $constancia);
            $constancia = str_replace('{CEDULA}', '<b>'.set_formato_entero($this->trbm->persona->cedula).'</b>', $constancia);
//            $constancia = str_replace('{CARGO}', $this->trbm->cargo, $constancia);
            $constancia = str_replace('{CARGO}', '<b>'.$datTrabajador['cargo'].'</b>', $constancia);
//            $constancia = str_replace('{DP_ADSCRITO}', $this->trbm->dp_ads->organismo, $constancia);
            $constancia = str_replace('{DP_ADSCRITO}', '<b>'.$datAds->organismo.'</b>', $constancia);
//            $constancia = str_replace('{CONDICION}', '<b>'.$this->trbm->tipo->tipo.'</b>', $constancia);    
            $constancia = str_replace('{CONDICION}', '<b>'.$datTipo->tipo.'</b>', $constancia);    
            $constancia = str_replace('{INGRESO_CAD}', '<b>'.$singreso.'</b>', $constancia);
            $constancia = str_replace('{INGRESO}', '<b>'.$ingreso.'</b>', $constancia);
//            $constancia = str_replace('{CODIGO_TRABAJADOR}', '<b>'.$this->trbm->codigo.'</b>', $constancia);
            $constancia = str_replace('{CODIGO_TRABAJADOR}', '<b>'.$datTrabajador['codigo'].'</b>', $constancia);
//            $constancia = str_replace('{FECHA_INGRESO}', '<b>'.$this->trbm->sfingreso.'</b>', $constancia);
            $constancia = str_replace('{FECHA_INGRESO}', '<b>'.$datTrabajador['sfingreso'].'</b>', $constancia);
            if ($this->trbm->tipo->cesta_ticket) {
                $ct = $this->entorno->cesta_ticket;
                $sct = numtoletras(unset_formato($ct));
                $constancia = str_replace('{CESTA_TICKET_CAD}', '<b>'.$sct.'</b>', $constancia);
                $constancia = str_replace('{CESTA_TICKET}', '<b>'.$ct.'</b>', $constancia);
            }
            else {
                $ct = 0;
            }
            $constancia = str_replace('{FECHA}', '<b>'.$fecha.'</b>', $constancia);
            $constancia = str_replace('{RRHH_DIRECTOR}', '<b>'.$this->entorno->rrhh_director.'</b>', $constancia);
            $constancia = str_replace('{RRHH_DIRECTOR_DECRETO}', '<b>'.$this->entorno->rrhh_dir_decreto.'</b>', $constancia);
            $styleQR = array(
                'border'        => 2,
                'vpadding'      => 'auto',
                'hpadding'      => 'auto',
                'fgcolor'       => array(0,0,0),
                'bgcolor'       => false, //array(255,255,255)
                'module_width'  => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );
            $capture = array(
                "fecha"     => "$dia/$mes/$anio",
                "ingreso"   => $ingreso,
                "ct"        => $ct,
                "avala"     => $this->entorno->rrhh_director
            );
            $constancia_codigo = $this->trbm->constancia->get_codigo();
//            var_dump($this->trbm);
            $this->trbm->constancia->set_datos(array(
                'trabajador_fk' => $this->trbm->id_trabajador,
                'capture'       => json_encode($capture),
                'codigo'        => $constancia_codigo
            ));
            $this->trbm->constancia->trabajador_ct_id = 0;
            if (! $this->trbm->constancia->upd()) return;
            $url = base_url("ct_chk?codigo=$constancia_codigo");
            $constancia = str_replace('{CODIGO_CT}', $constancia_codigo, $constancia);
            $pdf = new Pdf();
            $pdf->SetTitle('Constacia de Trabajo');
            $pdf->SetSubject('Constacia de Trabajo');
            $pdf->SetRightMargin(1);
            $pdf->AddPage();
            $pdf->SetY(40);
            $pdf->setFont('', 'B', 10);
            $pdf->Cell(0, 3, 'EL SUSCRITO DIRECTOR ESTADAL DEL PODER POPULAR DE RECURSOS HUMANOS', 0, 1, 'C');
            $pdf->Cell(0, 3, 'DE LA GOBERNACIóóN DEL ESTADO BOLIVARIANO DE MóRIDA', 0, 1, 'C');
            $pdf->Cell(0, 15, 'HACE CONSTAR', 0, 1, 'C');
            $pdf->setFont('', '', 12);
            $pdf->writeHTMLCell(0, 0, '', '', $constancia, 0, 1, 0, true, '', true);
            $pdf->write2DBarcode($url, 'QRCODE,H', 90, 180, 40, 40, $styleQR);
            $x = $this->entorno->usuario_dir.'. '.$this->entorno->rrhh_nombre;
            $x .= " Telófono: {$this->entorno->usuario_tlf}. {$this->entorno->usuario_id}";
            $pdf->set_footer($x);
            $pdf->Output('cns_trabajo.pdf', 'D');
        }
    }
    public function constancia_trabajo2()
    {
        if ($this->entorno->system_delay) {
            $datos['page_encabezado'] = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $datos['mensaje'] = 'Estimado Usuario, en óstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago. 
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
        }
        else if (! $this->input->is_ajax_request()) {
            $datos['page_encabezado'] = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';           
			
	        $r = $this->trbm->get_jobs_by_persona($this->session->persona_id);
// 	        var_dump($r);
	        if ($r==null) {
	            $datos['sinInfo'] = 0;
	            
	            $datos['contenido'] = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
	            $this->renderiza($this->entorno->empty_template, $datos);
	        }else{
	            $datos['sinInfo'] = 1;
    		   	$datos['lista'] = $r;		   	
    		   
                $datos['contenido'] = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
                $this->renderiza($this->entorno->empty_template, $datos);
		   	}
        }
        else {
            //echo $_GET['id'].']++id';
            $this->load->library('Pdf');
            $idTrabajador = $_GET['id'];
            $datosConstancia = $this->trbm->get_by_trabajador($idTrabajador);
            
            $datTrabajador = $datosConstancia['trabajador'][0];
            $datAds = $datosConstancia['datosAds'];
            $datTipo = $datosConstancia['datosTipo'];
            
            
//             echo "datos constancias--<br><br>";
//            var_dump($datosConstancia);
//            echo "datos ads<br><br>";
//            var_dump($datAds);
//            echo "datos tipo<br><br>";
//            var_dump($datTipo);
//             die();
            //
//             $ingreso = $this->trbm->get_last_ingreso_by_id($idTrabajador); // provicional_const
            $ingreso = $datTrabajador['totalConst'];
            $singreso = numtoletras($ingreso);
            $ingreso = set_formato_decimal($ingreso);
            $dia = date("d");
            $mes = date("m");
            $anio = date("Y");
            $fecha = strtolower(numtoletras($dia, FALSE)).' días del mes de '.strtolower($this->entorno->local_mes[$mes-1]).' de '.$anio;
            $constancia = $this->trbm->tipo->ct_plantilla;
            $constancia = str_replace('{NOMBRE}', '<b>'.$this->trbm->persona->nombre1.' '.$this->trbm->persona->nombre2.' '.
            		$this->trbm->persona->apellido1.' '.$this->trbm->persona->apellido2.'</b>', $constancia);
            $constancia = str_replace('{CEDULA}', '<b>'.set_formato_entero($this->trbm->persona->cedula).'</b>', $constancia);
//            $constancia = str_replace('{CARGO}', $this->trbm->cargo, $constancia);
            $constancia = str_replace('{CARGO}', '<b>'.$datTrabajador['nom_cargoConst'].'</b>', $constancia);
//            $constancia = str_replace('{DP_ADSCRITO}', $this->trbm->dp_ads->organismo, $constancia);
//             $constancia = str_replace('{DP_ADSCRITO}', '<b>'.$datAds->organismo.'</b>', $constancia);
            $constancia = str_replace('{DP_ADSCRITO}', '<b>'.$datTrabajador['nom_unidadConst'].'</b>', $constancia);
//            $constancia = str_replace('{CONDICION}', '<b>'.$this->trbm->tipo->tipo.'</b>', $constancia);    
            $constancia = str_replace('{CONDICION}', '<b>'.$datTipo->tipo.'</b>', $constancia);    
            $constancia = str_replace('{INGRESO_CAD}', '<b>'.$singreso.'</b>', $constancia);
            $constancia = str_replace('{INGRESO}', '<b>'.$ingreso.'</b>', $constancia);
//            $constancia = str_replace('{CODIGO_TRABAJADOR}', '<b>'.$this->trbm->codigo.'</b>', $constancia);
            $constancia = str_replace('{CODIGO_TRABAJADOR}', '<b>'.$datTrabajador['codigo'].'</b>', $constancia);
//            $constancia = str_replace('{FECHA_INGRESO}', '<b>'.$this->trbm->sfingreso.'</b>', $constancia);
            $constancia = str_replace('{FECHA_INGRESO}', '<b>'.$datTrabajador['sfingreso'].'</b>', $constancia);
            if ($this->trbm->tipo->cesta_ticket) {
                $ct = $this->entorno->cesta_ticket;
                $sct = numtoletras(unset_formato($ct));
                $constancia = str_replace('{CESTA_TICKET_CAD}', '<b>'.$sct.'</b>', $constancia);
                $constancia = str_replace('{CESTA_TICKET}', '<b>'.$ct.'</b>', $constancia);
            }
            else {
                $ct = 0;
            }
            $constancia = str_replace('{FECHA}', '<b>'.$fecha.'</b>', $constancia);
            $constancia = str_replace('{RRHH_DIRECTOR}', '<b>'.$this->entorno->rrhh_director.'</b>', $constancia);
            $constancia = str_replace('{RRHH_DIRECTOR_DECRETO}', '<b>'.$this->entorno->rrhh_dir_decreto.'</b>', $constancia);
            $styleQR = array(
                'border'        => 2,
                'vpadding'      => 'auto',
                'hpadding'      => 'auto',
                'fgcolor'       => array(0,0,0),
                'bgcolor'       => false, //array(255,255,255)
                'module_width'  => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
            );
            $capture = array(
                "fecha"     => "$dia/$mes/$anio",
                "ingreso"   => $ingreso,
                "ct"        => $ct,
                "avala"     => $this->entorno->rrhh_director
            );
            $constancia_codigo = $this->trbm->constancia->get_codigo();
//            var_dump($this->trbm);
            $this->trbm->constancia->set_datos(array(
                'trabajador_fk' => $this->trbm->id_trabajador,
                'capture'       => json_encode($capture),
                'codigo'        => $constancia_codigo
            ));
            $this->trbm->constancia->trabajador_ct_id = 0;
            if (! $this->trbm->constancia->upd()) return;
            $url = base_url("ct_chk?codigo=$constancia_codigo");
            $constancia = str_replace('{CODIGO_CT}', $constancia_codigo, $constancia);
            $pdf = new Pdf();
            $pdf->SetTitle('Constacia de Trabajo');
            $pdf->SetSubject('Constacia de Trabajo');
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
            $x = $this->entorno->usuario_dir.'. '.$this->entorno->rrhh_nombre;
            $x .= " Telófono: {$this->entorno->usuario_tlf}. {$this->entorno->usuario_id}";
            $pdf->set_footer($x);
            $pdf->Output('cns_trabajo.pdf', 'D');
        }
    }
    ////////////////////////////// FIN DE: constancia_trabajo /////////////////////////////

    /**
    * Validacion de Constancia de trabajo.
    *
    * @access       public
    * @autor        Carlos Iturralde <iturraldec@gmail.com>
    * @version      13/11/2018
    */

    public function ct_chk()
    {
        $datos['page_encabezado'] = 'Validación de Constancias de Trabajo';
        if ($this->input->get('codigo')) {
            $template = array(
                'table_open'    => '<table align="center" border="2" style="border-collapse: separate; border-spacing: 5px 5px;">',
            );
            $this->table->set_template($template);
            $this->trbm->constancia->codigo = $this->input->get('codigo');
            $this->trbm->constancia->get_by_codigo();
            if (! $this->trbm->constancia->get_success()) {
                $data = array(
                    array('<strong>Código de la Constancia de Trabajo no reconocido!</strong>')
                );
            }
            else {

                $ct = json_decode($this->trbm->constancia->capture);
                $this->trbm->get_by_persona($this->trbm->constancia->trabajador_fk);
                $this->table->set_caption('Constancia de Trabajo Referenciada');
                $data = array(
                    array('', ''),
                    array('<strong>Códula</strong>', "{$this->trbm->persona->nacionalidad}-{$this->trbm->persona->cedula}"),
                    array('<strong>Nombre</strong>', $this->trbm->persona->get_nombre_full()),
                    array('<strong>Código del Trabajador</strong>', $this->trbm->codigo),
                    array('<strong>Fecha de emisión</strong>', $ct->fecha),
                    array('<strong>Ingreso Bs.</strong>', $ct->ingreso),
                    array('<strong>Cesta Ticket Bs.</strong>', $ct->ct),
                    array('<strong>Director de RRHH</strong>', $ct->avala),
                );
            }
            $datos['contenido'] = $this->table->generate($data);
        }
        else
            $datos['contenido'] = $this->load->view('trabajador/ct_chk_v', '', TRUE);
        $this->renderiza($this->entorno->free_template, $datos);
    }
    /**
     * Permite leer el contenido del directorio pasado como parametro
     * @param String $path
     * return Array nombre de los elementos encontrados
     */
    function listarArchivos( $path,$cedula ){
        $res = array();
        $i=0;
        // Abrimos la carpeta que nos pasan como parámetro
        $dir = opendir($path);
        // Leo todos los ficheros de la carpeta
        while ($elemento = readdir($dir)){
            // Tratamos los elementos . y .. que tienen todas las carpetas
            if( $elemento != "." && $elemento != ".."){
                // Si es una carpeta
                if( is_dir($path.$elemento) ){
                    // Muestro la carpeta
                    // 	                echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
                    $res[$i] = $elemento;
                    // Si es un fichero
                } else {
                    // Muestro el fichero
                    $res[$i] = $elemento;
                    // 	                echo "<br />". $elemento;
                }
                $i++;
            }
        }
        return $res;
    }
    function visualizarComprobante(){
        $tipo = $_GET['idT'];
        $anio = $_GET['anio'];
        $valMes = $_GET['mes'];
        $matMes = explode(":",$valMes);
        $mes=$matMes[0];
        $quincena = $matMes[1].'/';
        $mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
        
//         $quincena = '2q/';
        
        $cedRec = str_pad($this->trbm->persona->cedula, 8, "0", STR_PAD_LEFT);
//         $tipo = $r[0]['tipo_fk'];
        $carp = $this->determinarCarpeta($tipo);
        
        $path = path_sistema.'src/constancias/'.$mes.'/'.$quincena.$carp;
//         echo "[$path]<br>";
        // 	        $resArchivos = $this->listarArchivos($path,$this->trbm->persona->cedula);  
        // 	        var_dump($resArchivos);
        
        $this->load->library('session');
        $this->load->helper('directory');
        $map = directory_map($path);
        
//         var_dump($map);die();
        $pathRecibo = '';
        foreach ($map as $ite) {
            if ($ite=="rec_".$cedRec.'.pdf') {
                
                $this->session->cedulaRec = $cedRec;
                $this->session->cedulaMes = $mes;
                $this->session->quincena = $quincena;
                $this->session->tipo = $tipo;
                $this->session->carp = $carp;
                
                $pathRecibo = "<a target='_blank' href = 'http://".
                $_SERVER['HTTP_HOST'].
                '/'.
                'src/constancias/'.
                $mes.
                '/'.
                $quincena.$carp.
                "/rec_".
                $cedRec.
                '.pdf'.
                "'>Ver Recibo</a>";
                $datos['etiRecibo'] = 'Segunda quincena de junio';
//                 return $pathRecibo; 
                echo $pathRecibo;
                break;
                // 	                echo "Encontro archivo";
            }else{
                // 	                echo $ite.'<br>';
            }
        }
        $datos['pathRecibo'] = $pathRecibo;
    }
    function visualizarConprobanteV2(){
        echo "aca<br>";
        $this->load->library('session');
        // Permite la descarga de un archivo ocultando su ruta
        $anio = 2021;
        
//         echo "aca";die();
        
        $ced = $this->session->cedulaRec;
        
        
        $mes = $this->session->cedulaMes;
        $quincena = $this->session->quincena;
        $tipo = $this->session->tipo;
        $carp = $this->session->carp;
        
        

        
//         $ruta = "$anio/$mes/$quincena/$carp";
//         $ruta = $anio.'/'.$mes.$quincena.$carp.'/';
        $ruta = $mes.$quincena.$carp.'/';
        $nomArchivo = 'rec_'.$ced;
        
        $nombre = $nomArchivo . ".pdf";
        
        echo "[$ruta] - [$nombre]";
//         die();
        
//         $filename = "ConstanciasTrabajoGob_12780005.php";
//         $filename = "ConstanciasTrabajoGob_".$nombre.".php";

//         $datos['pathRecibo'] = $_SERVER['HTTP_HOST'].'/'.'src/constancias/descarga.php?mes='.$mes."&qui=$quincena&tp=$carpeta";
        $filename = $_SERVER['HTTP_HOST'].'/'.'src/constancias/'. $ruta;
        
        echo "[$filename]";
        
        $filename = path_sistema.'src/constancias/'. $ruta;
        

        
        echo "[$filename]";die();
        
//         $size = filesize($filename);
//         header("Content-Transfer-Encoding: binary");
//         header("Content-type: application/force-download");
//         header("Content-Disposition: attachment; filename=$nombre");
//         header("Content-Length: $size");
//         readfile("$filename");
    }
    
    function determinarCarpeta($idTipo){
//         1	"EMPLEADO FIJO"
//         2	"EMPLEADO CONTRATADO"
//         3	"OBRERO FIJO"
//         4	"OBRERO CONTRATADO"
//         5	"JUBILADO EMPLEADO"
//         6	"JUBILADO SUODE"
//         7	"JUBILADO CONSTRUCCION"
//         8	"JUBILADO IMPRENTA"
//         9	"PENSIONADO EMPLEADO"
//         10	"JUBILADO SINDICATO DE LA CONSTRUCCION"
//         11	"PENSIONADO IMPRENTA"
//         12	"PENSIONADO SUODE"
//         13	"PENSIONADO SOBREVIVIENTE"
//         14	"JUBILADO DOCENTE"
//         15	"JUBILADO POLICIA"
//         16	"JUBILADO BOMBERO"
//         17	"JUBILADO HOSPITALES Y CLINICAS"
//         18	"PENSIONADO DOCENTES"
//         19	"PENSIONADO POLICIA"
//         20	"JUBILADO MEDICOS/MUSICOS"
//         21	"JUBILADO SUODE CLAUSULA 40"
//         22	"PENSIONADO DE GRACIA"
//         23	"PENSIONADO ESPECIALES"
//         24	"JUBILADO SIMBTRA"
//         25	"DOCENTE FIJO"
//         26	"DOCENTE CONTRATADO" 
//         27	"DOCENTE SUPLENTE"
//         28	"JUBILADO OBRERO"
//         29	"BOMBERO"
//         30	"SUPLENTE EMPLEADOS"
//         31	"SUPLENTE OBREROS" 
//         32	"SUPLENTE DOCENTES"
        switch ($idTipo) {
               case 1:
                   $cad = "emp_fij";
               break;
               case 2:
                   $cad = "emp_con";
               break;
               case 3:
                   $cad = "obr_fij";
               break;
               case 4:
                   $cad = "obr_con";
               break;
               case 5:
                   $cad = "jub_emp";
               break;
               case 6:
                   $cad = "jub_suo";
               break;
               case 7:
                   $cad = "jub_const";
               break;
               case 8:
                   $cad = "jub_con";
               break;
               case 9:
                   $cad = "pen_emp";
               break;
               case 10:
                   $cad = "jub_sin_con";
               break;
               case 11:
                   $cad = "pen_imp";
               break;
               case 12:
                   $cad = "pen_suo";
               break;
               case 13:
                   $cad = "pen_sob";
               break;
               case 14:
                   $cad = "jub_doc";
               break;
               case 15:
                   $cad = "jub_pol";
               break;
               case 16:
                   $cad = "jub_bom";
               break;
               case 17:
                   $cad = "jub_hos";
               break;
               case 18:
                   $cad = "pen_doc";
               break;
               case 19:
                   $cad = "pen_pol";
               break;
               case 20:
                   $cad = "jub_med_mus";
               break;
               case 21:
                   $cad = "jub_suo40";
               break;
               case 22:
                   $cad = "pen_gra";
               break;
               case 23:
                   $cad = "pen_esp";
               break;
               case 24:
                   $cad = "jub_sim";
               break;
               case 25:
                   $cad = "doc_fij";
               break;
               case 26:
                   $cad = "doc_con";
               break;
               case 27:
                   $cad = "doc_sup";
               break;
               case 28:
                   $cad = "jub_obr";
               break;
               case 29:
                   $cad = "bomb";
               break;
               case 30:
                   $cad = "sub_emp";
               break;
               case 31:
                   $cad = "sub_obr";
               break;
               case 32:
                   $cad = "sub_doc";
               break;
               default:
                   ;
               break;
        }
        return $cad;
    }
}

/* End of file: Trabajador_c.php */
/* Location: ./application/controllers */
