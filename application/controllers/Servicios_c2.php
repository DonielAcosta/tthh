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
            $datos['page_encabezado'] = 'Comprobantes de Pagos';
            $datos['page_descripcion'] = 'Descarga y visualización de Comprobantes de Pagos';
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
//         echo "acá con rol: ".$this->session->persona_id.' y '.$this->session->rol_id; 
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
            $datos['cmb_edoSol'] = $this->comboEdoSol();
            $datos['cmb_destino'] = $this->comboDestino();
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
                $datos['contenido'] = $this->load->view('servicios/solicitud_admin_v', $datos, TRUE);
            }else{
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
        }else{
            $objArchivo = null;
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
        $datos['adjsolicitud'] = trim($objArchivo['name']);
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
        $r = array(1=>'RRHH',2=>'RRHH - Dpto de Informática',3=>'RRHH - Dpto de Nómina');
//         $id=3;
        $cmb_destino = form_dropdown('destSol', $r, $id,array('id'=>'destSol','class'=>'form-control'));
        return $cmb_destino;
    }
}

/* End of file: Servicios_c.php */
/* Location: ./application/controllers */