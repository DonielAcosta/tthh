<?php defined('BASEPATH') OR exit('No direct script access allowed');

//
class Servicios_c extends MY_Controller
{
	// constructor
	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('number', 'download', 'date'));
        $this->load->library('table');
		$this->load->model('Servicios_m', 'servm');
//		$this->load->model('Trabajador_m', 'cargos');
        if (isset($this->session->persona_id)){
//            $this->trbm->get_by_persona($this->session->persona_id);
//            $this->cargos->get_jobs_by_persona($this->session->persona_id);
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
            $datos['page_encabezado'] = 'Servicios';
            $datos['page_descripcion'] = 'Constancias de Trabajo, Comprobantes de Pagos y Solicitudes';
//            $datos['ddl_anios'] = $ddl_anios;
//            $datos['ddl_mes'] = $ddl_mes;
//            $datos['ddl_nomina'] = $ddl_nomina;    	
//        $datos['contenido'] = $this->load->view('servicios_v', $datos, TRUE);
            $datos['contenido'] = $this->load->view('servicios/servicios_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);        
    }
    /**
    * Buscar las solicitudes realizadas por el usuario
    *
    * @access       public
    * @autor        Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
    * @version      1.0 25/05/2020
    */
    public function solicitud()
    {
            $datos['page_encabezado'] = 'Solicitudes';
            $datos['page_descripcion'] = '';
            $datos['contenido'] = $this->load->view('servicios/solicitudcons_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos); 
    }
    /**
    * Permite realizar una solicitud
    *
    * @access       public
    * @autor        Gianny Josue Villarreal Bustos <josue.villarreal@gmail.com>
    * @version      1.0 25/05/2020
    */
    public function solicitud_ing()
    {
//         echo "acá con rol: ".$this->session->persona_id.' y '.$this->session->rol_id;die(); 
//         $this->load->model('EdoSolicitud_m', 'edoSol');
//         $r = $this->edoSol->get_all();
//         foreach($r as $row)
//             $dataEdo[$row['idedosolicitud']] = $row['nomedosolicitud'];
        
//         $cmb_edoSol = form_dropdown(
//             'edoSol',$dataEdo,'',
//             array('id'=>'idedosolicitud','class'=>'form-control')
//             );
//         $datos['cmb_edoSol'] = $cmb_edoSol;
        
//         var_dump($r);        
//         die();

            $datos['idsolicitud'] = '';
            $datos['asuntoSol'] = '';
            $datos['descSol'] = '';
            $datos['obsArc_EdoSolicitud'] = '';
            $datos['emailaltsolicitud'] = '';
            $datos['opt'] = 'ing';
            $datos['optadjsolicitud'] = '';
            $datos['adjsolicitud'] = null;
            $datos['page_encabezado'] = 'Ingresar solicitud';
            $datos['page_descripcion'] = '';
            if ($this->session->rol_id==2) {
                $datos['cmb_edoSol'] = $this->comboEdoSol();
                $datos['cmb_destino'] = $this->comboDestino();
                $datos['contenido'] = $this->load->view('servicios/solicitud_admin_v', $datos, TRUE);
            }else{
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
                
//                 echo form_input($opt_idedosolicitud);
                $datos['cmb_edoSol'] = form_input($opt_idedosolicitud).'Por Ingresar';
                $datos['cmb_destino'] = form_input($opt_destSol).'RRHH';
                $datos['contenido'] = $this->load->view('servicios/solicitud_v', $datos, TRUE);
            }
            $this->renderiza($this->entorno->empty_template, $datos); 
    }
    /////////////////////////////// FIN DE: comprobante_pago ////////////////////////////////
    /**
    * Ingresar Solicitud
    *
    * @access       public
    * @autor        Gianny Josué Villarreal Bustos <josue.villarreal@gmail.com>
    * @version 1.0  30/05/2020
    */
    public function ingresar_solicitud(){
//         $asuntoArchivo = $this->input->get('fileToUpload');
//         $file = $_REQUEST['file'];
// echo "controlador";
        
        /*
        echo BASEPATH;
        echo "<br>";
        echo APPPATH;
        echo "<br>";
        die();
        */
//         $idsolicitud = $_REQUEST['idsolicitud'];
//         echo "acá con idSol = ($idsolicitud)";die();
        
        if (isset($_REQUEST['idsolicitud'])) {
            $idsolicitud = $_REQUEST['idsolicitud'];
            $obsArc_EdoSolicitud = $_REQUEST['obsArc_EdoSolicitud'];
        }else{
            $idsolicitud = '';
            $obsArc_EdoSolicitud = '';
        }
        if (isset($_FILES ["file"])) {
            $objArchivo = $_FILES ["file"];
            $datos['adjsolicitud'] = trim($objArchivo['name']);
        }else{
            $objArchivo = null;
            $datos['adjsolicitud'] = '';
        }
//         echo "imp objarchivo;";
//         var_dump($objArchivo);die();
        
        
        $asuntoSol = $_REQUEST['asuntoSol'];
        $destSol = $_REQUEST['destSol'];
        $descSol = $_REQUEST['descSol'];
        $edoSol = $_REQUEST['edoSol'];
//         $obsArc_EdoSolicitud = $_REQUEST['obsArc_EdoSolicitud'];
        $emailaltsolicitud = $_REQUEST['emailaltsolicitud'];
        $idEdoSolicitud = $_REQUEST['edoSol'];
//         var_dump($objArchivo);
//         echo "[$asuntoSol][$destSol][$descSol][$edoSol][]";
        
        $datos['idsolicitud'] = $idsolicitud;
        $datos['asuntosolicitud'] = trim($asuntoSol);
        $datos['descsolicitud'] = trim($descSol);
        $datos['iddestsolicitud'] = trim($destSol);
        $datos['asuntoSol'] = trim($asuntoSol);
        $datos['fecregsolicitud'] = date('Y-m-d');
        
        $datos['emailaltsolicitud'] = trim($emailaltsolicitud);
        $datos['obsArc_EdoSolicitud'] = trim($obsArc_EdoSolicitud);
        $datos['idEdoSolicitud'] = $idEdoSolicitud;
        $datos['objArchivo'] = $objArchivo;
        
//         echo "idSol = ($idsolicitud)";die();
        
        $this->servm->set_datos($datos);
        if ($idsolicitud!='') {
            $resComp = $this->servm->actualizarSolicitud();
        }else{
            $resComp = $this->servm->nuevaSolicitud();
        }
        
        $resultado = $resComp['res'];
        $mensaje = $resComp['mns'];
         //var_dump($resComp);die();
        if ($resultado) {
            $r['success'] = TRUE;
            $r['message'] = 'Solicitud registrada.';
        }
        else {
            $r['success'] = FALSE;
            $r['message'] = $mensaje.'. '.$this->servm->get_mensaje();
        }
        $this->utilidades->json_output($r);
    }
    /////////////////////////////// FIN DE: Ingresar Solicitud ////////////////////////////////

    /**
     * Consultar Solicitud: Devuelve todas las solicitudes registradas
     *
     * @access       public
     * @autor        Gianny Josué Villarreal Bustos <josue.villarreal@gmail.com>
     * @version 1.0  30/05/2020
     */
    public function consultar_solicitudes()
    {
        $res = $this->servm->consultarSolicitudes();
//                 echo "[$res]";die();
        //         var_dump($res);
        //         echo $res;
        echo json_encode($res);
    }
    /**
     * Consultar Solicitud por parametro: Devuelve todas las solicitudes dado un parametro
     *
     * @access       public
     * @autor        Gianny Josué Villarreal Bustos <josue.villarreal@gmail.com>
     * @version 1.0  30/05/2020
     */
    public function consultar_solicitudes_param()
    {
        $opcion = $_POST['valOp'];
        $idSolicitud = $_POST['valId'];
//         echo "[$opcion] - [$idSolicitud]";
//         $IdSolicitud = 28;
        $res = $this->servm->consultarSolicitudesPorParametro('idsolicitud',$idSolicitud);
        $res = $res[0];
        $edoSol = $res['idedosolicitud'];
        $rol = $this->session->rol_id;
//         var_dump($res);
        $titConsulta = 'Consultar solicitud N° <b>'.$idSolicitud.'</b>';
        if ($edoSol>1 AND $rol>2) {
            $titConsulta = "La solicitud N° $idSolicitud está siendo procesada por nuestros analistas, por lo tanto, no puede ser actualizada por usted.";
            $opcion = 1;
        }
        $pantActualizar = 'servicios/solicitud_v.php';
        if ($rol<3) {
            $pantActualizar = 'servicios/solicitud_admin_v.php';
        }
        
        $datos['cmb_edoSol'] = $this->comboEdoSol($res['idedosolicitud']);
        $datos['cmb_destino'] = $this->comboDestino($res['iddestsolicitud']);
        
        $datos['page_descripcion'] = '';
        
        $datos['idsolicitud'] = $res['idsolicitud'];
        $datos['asuntoSol'] = $res['asuntosolicitud'];
        $datos['descSol'] = $res['descsolicitud'];
        $datos['obsArc_EdoSolicitud'] = $res['obsarc_edosolicitud'];
        $datos['adjsolicitud'] = $res['adjsolicitud'];
        $datos['emailaltsolicitud'] = $res['emailaltsolicitud'];
        $datos['opt'] = 'mod';
        
        if ($opcion==1) {
//             $datos['page_encabezado'] = 'Consultar solicitud N° <b>'.$idSolicitud.'</b>';
            $datos['page_encabezado'] = $titConsulta;
            $datos['contenido'] = $this->load->view('servicios/solicitudc_v', $datos, TRUE);
        }else{
            $datos['page_encabezado'] = 'Actualizar solicitud N° <b>'.$idSolicitud.'</b>';
            if ($this->session->rol_id==2) {
                $datos['page_encabezado'] = 'Gestión de solicitud N° <b>'.$idSolicitud.'</b>';
            }
//             $datos['contenido'] = $this->load->view('servicios/solicitud_v', $datos, TRUE);
//             $datos['contenido'] = $this->load->view('servicios/solicitud_admin_v.php', $datos, TRUE);
            $datos['contenido'] = $this->load->view($pantActualizar, $datos, TRUE);
        }
        
        $this->renderiza($this->entorno->empty_template, $datos); 
    }
    /////////////////////////// FIN DE: consultar_solicitudes_param ////////////////////////
    
    function comboEdoSol($id=null){
        $this->load->model('EdoSolicitud_m', 'edoSol');
        $r = $this->edoSol->get_all();
        foreach($r as $row)
            $dataEdo[$row['idedosolicitud']] = $row['nomedosolicitud'];            
            $cmb_edoSol = form_dropdown(
                'edoSol',$dataEdo,$id,array('id'=>'idedosolicitud','class'=>'form-control')
                );
        return $cmb_edoSol;
    }
    function comboDestino($id=null){
//         echo "[$id]";
//         $this->load->model('EdoSolicitud_m', 'edoSol');
//         $r = $this->edoSol->get_all();
//         $r = array(1=>'RRHH',2=>'RRHH - Dpto de Informática',3=>'RRHH - Dpto de Nómina');
        $r = array(
            1=> 'RRHH',
            2=> 'Dpto. de Empleados',
            3=> 'Dpto. de Jubilados',
            4=> 'Dpto. de Prestaciones sociales',
            5=> 'Dpto. de Planificación',
            6=> 'Dpto. de Asesoría legal',
            7=> 'Dpto. de Informática',
            8=> 'Dpto. de Administración',
            9=> 'Dpto. de Coordinación',
            10=> 'Dpto. de Nómina');
//         $id=3;
        $cmb_destino = form_dropdown('destSol', $r, $id,array('id'=>'destSol','class'=>'form-control'));
        return $cmb_destino;
    }
    
    public function constancia_solicitud()
    {
        if ($this->entorno->system_delay) {
            $datos['page_encabezado'] = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            $datos['mensaje'] = 'Estimado Usuario, en éstos momentos estamos realizando<br>
                la actualizacón de la información de las Nóminas de Pago.
                Por favor intenta dentro de unos minutos.';
            $datos['contenido'] = $this->load->view('system_delay_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
        }
        else if (! $this->input->is_ajax_request()) {
            $datos['page_encabezado'] = 'Constancias de Trabajo';
            $datos['page_descripcion'] = 'Descarga y visualización de Constancias de Trabajo';
            
            $r = $this->trbm->get_jobs_by_persona($this->session->persona_id);
            	        var_dump($r);die();
            
            $datos['lista'] = $r;
            
            $datos['contenido'] = $this->load->view('trabajador/constancia_trabajo_v', $datos, TRUE);
            $this->renderiza($this->entorno->empty_template, $datos);
        }
        else {
//             echo $_GET['id'].']++id';die();
            $this->load->library('Pdf');
//             $idTrabajador = $_GET['id'];
            $idTrabajador = $this->session->persona_id;

//             $opcion = $_POST['valOp'];
//             $idSolicitud = $_POST['id'];
            $idSolicitud = $_GET['id'];
            //         echo "[$opcion] - [$idSolicitud]";
            //         $IdSolicitud = 28;
            $res = $this->servm->consultarSolicitudesPorParametro('idsolicitud',$idSolicitud);
            $res = $res[0];
//             var_dump($res);die();
            
            $dia = date("d");
            $mes = date("m");
            $anio = date("Y");
            
            $fecha = strtolower(numtoletras($dia, FALSE)).' días del mes de '.$this->entorno->local_mes[$mes-1].' de '.$anio;
            $constancia = $this->cont_constancia_asistencia();
            $constancia = str_replace('{NOMBRE}', '<b>'.$res['nombre1'].' '.$res['nombre2'].' '.
                $res['apellido1'].' '.$res['apellido2'].'</b>', $constancia);
            $constancia = str_replace('{CEDULA}', '<b>'.($res['cedula']).'</b>', $constancia);
            $constancia = str_replace('{FECHA_SOLICITUD}', '<b>'.($res['fecregsolicitud']).'</b>', $constancia);
            $constancia = str_replace('{FECHA_RESPUESTA}', '<b>'.($res['fecarc_edosolicitud']).'</b>', $constancia);
            $constancia = str_replace('{ASUNTO_SOLICITUD}', '<b>'.($res['asuntosolicitud']).'</b>', $constancia);
            $constancia = str_replace('{DESTINO}', '<b>'.'RRHH'.'</b>', $constancia);
            $constancia = str_replace('{SOLICITUD}', '<b>'.($res['descsolicitud']).'</b>', $constancia);
            $constancia = str_replace('{RESPUESTA_SOLICITUD}', '<b>'.($res['obsarc_edosolicitud']).'</b>', $constancia);
            
//             $constancia_codigo = $this->trbm->constancia->get_codigo();
            $constancia_codigo = $this->generar_codigo(10);
            $url = base_url("ct_chk?codigo=$constancia_codigo");
            $constancia = str_replace('{CODIGO_CT}', $constancia_codigo, $constancia);
            
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
            $constancia_codigo = 'XXXXX';
            $url = base_url("ct_chk?codigo=$constancia_codigo");
            $pdf = new Pdf();
            $pdf->SetTitle('Constacia de solicitud de Asistencia');
            $pdf->SetSubject('Constacia de solicitud de Asistencia');
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
            $x = $this->entorno->usuario_dir.'. '.$this->entorno->rrhh_nombre;
            $x .= " Teléfono: {$this->entorno->usuario_tlf}. {$this->entorno->usuario_id}";
            $pdf->set_footer($x);
            $pdf->Output('cns_trabajo.pdf', 'D');
        }
    }
    ////////////////////////////// FIN DE: constancia_trabajo /////////////////////////////
    
    public function cont_constancia_asistencia(){
        $text = '<p style="text-align:justify;">
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
GOBERNACIóN DEL ESTADO MÉRIDA<br>
{RRHH_DIRECTOR_DECRETO}
</p>
Esta constancia de trabajo ha sido impresa electrónicamente, los datos reflejados están
sujetos a validación a través de la dirección: <b>http://tthh.merida.gob.ve/proyectos/tthh/ct_chk</b>,
introduciendo el siguiente código: {CODIGO_CT}  ó escaneando  el código QR:<br>
</p>
';
        return $text;
    }
    
    function generar_codigo($strength = 16) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        
        return $random_string;
    }
    
}


/* End of file: Servicios_c.php */
/* Location: ./application/controllers */