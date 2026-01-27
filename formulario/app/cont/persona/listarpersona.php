<?php
/**
 * @file persona.php
 *
 * Controlador Ingresar/Actualizar de la Tabla Persona
 *
 * @author SOLINF
 * @version V 0.1
 * @date 24/02/2020
 *
 */
require_once ('../../../config/config.php');
require_once (MOD . 'Persona.php');
// require_once (MOD . 'Usuario.php');
require_once (MOD . 'Enumerado.php');
require_once (MOD . 'EdoCivil.php');
// require_once (MOD . 'EdoRegistro.php');
// require_once (MOD . 'Rol.php');
class principalPersona extends Controller {
    private $opt;
    function principalPersona() {
        parent::__construct ();
        $this->campos = 'idpersona,nacpersona,cedpersona,nompersona,apepersona,genpersona,fecnacpersona,edocivpersona,correopersona,numhijmenpersona,numhijmay,tel2dompersona,telmov1persona,telmov2persona,discpersona,descdiscpersona,tipdiscpersona,gdodiscpersona,numcarnetdiscpersona,facepersona,instpersona,twtpersona,wapppersona,telhabpersona,munhabpersona,parhabpersona,dirpersona,nacconpersona,cedconpersona,nomconpersona,apeconpersona,genconpersona,fecnacconpersona,correoconpersona,telmovconpersona,admantpersona1,cgoantpersona1,fecingantpersona1,fecfinantpersona1,admantpersona2,cgoantpersona2,fecingantpersona2,fecfinantpersona2,admantpersona3,cgoantpersona3,fecingantpersona3,fecfinantpersona3,tiplabpersona,munlabpersona,parlabpersona,dirlabpersona,otrodestlabpersona,dirotrodestlabpersona,tyc,numhijdispersona,fecingpersona,entepersona';
        $this->modelo = 'persona';
        $this->modulo = 'Persona';
        $this->setTemplateDir ( TEMPLATE );
        $this->asignarConstantes ();
        $this->setParameter ( 'MOD', $this->modelo );
        //         if ($_SESSION ['rolId'] == 1) {
        $this->setParameterPath ( 'admin', 'true' );
        //         }
    }
    
    function guardar($request, $session) {
        $opcion = $request ['opcion'];
        $this->inicializarAtributos ( $request, $this->campos );
        $objPersona = new Persona ();
        
        //         dump($request);
        //         die();
        // 		$tablaResultado = $objPersona->agregarPersona ( $this->idEdoCivil, $this->idEdoRegistroPer, $this->cedPersona, $this->rifPersona, $this->genPersona, $this->nomPersona, $this->apePersona, $this->correoPersona, $this->fecNacPersona, $this->pesoPersona, $this->altPersona, $this->telPersona, $this->mov1Persona, $this->mov2Persona, $this->numCasaPersona, $this->dirPersona, $this->obsPersona, $this->fecIngPersona );
        $tablaResultado = $objPersona->agregarPersona(
            $this->nacpersona, $this->cedpersona, $this->nompersona, $this->apepersona, $this->genpersona, $this->fecnacpersona,
            $this->edocivpersona, $this->correopersona, $this->numhijmenpersona, $this->numhijmay, $this->tel2dompersona, $this->telmov1persona,
            $this->telmov2persona, $this->discpersona, $this->descdiscpersona, $this->facepersona, $this->instpersona, $this->twtpersona,
            $this->wapppersona, $this->munhabpersona, $this->parhabpersona, $this->dirpersona, $this->nacconpersona, $this->cedconpersona,
            $this->nomconpersona, $this->apeconpersona, $this->genconpersona, $this->fecnacconpersona, $this->tiplabpersona, $this->munlabpersona, $this->parlabpersona,
            $this->dirlabpersona, $this->otrodestlabpersona, $this->dirotrodestlabpersona, $this->tyc, $this->numhijdispersona,$this->fecingpersona,$this->entepersona,
            $this->tipdiscpersona, $this->gdodiscpersona, $this->numcarnetdiscpersona, $this->telhabpersona, $this->correoconpersona,
            $this->telmovconpersona, $this->admantpersona1, $this->cgoantpersona1, $this->fecingantpersona1, $this->fecfinantpersona1,
            $this->admantpersona2, $this->cgoantpersona2, $this->fecingantpersona2, $this->fecfinantpersona2, $this->admantpersona3,
            $this->cgoantpersona3, $this->fecingantpersona3, $this->fecfinantpersona3
            );
        $objPersona->cerrarConexion ();
        if ($tablaResultado) {
            $exito = Messages::EXITO_INGRESAR;
            $this->setParameter ( 'exito', $exito );
            $this->setParameter ( 'opt', '' );
            //             $this->listar ( $request, $session );
            $this->setParameterPath('desactivarOpciones', true);
            $this->ver ( 'resultado.tpl' );
        } else {
            $error = Messages::ERROR_INGRESAR;
            $this->setParameter ( 'error', $error );
            $this->asignarParametrosError ( $request, 'g', $this->modelo, 'guardar', '', $this->campos );
            $this->ver ( 'persona.tpl' );
        }
    }
    function listar($request, $session) {
        $this->llamadoXajax ( 'persona' );
        //         $opcion = $request ['opcion'];
        $opcion = '';
        $this->inicializarCombos ();
        $this->asignarParametros ( $request, 'g', $this->modelo, $opcion, null, null, null );
        $this->setParameterPath ( 'urlImp', '' );
        $this->setParameter ( 'etiquetaModulo', 'Ingresar' . ' ' . $this->modulo );
        $this->setParameter ( 'fecIngPersona', date('d-m-Y'));
        $this->ver ( 'persona.tpl' );
        //         $this->ver ( 'resultado.tpl' );
    }
    function test($request, $session) {
        $this->llamadoXajax ( 'persona' );
        //         $opcion = $request ['opcion'];
        $opcion = '';
        $this->setParameterPath('desactivarOpciones', true);
        $this->ver ( 'resultado.tpl' );
    }
    function actualizar($request, $session) {
        //		dump($request);die();
        $this->inicializarAtributos ( $request, $this->campos );
        $objPersona = new Persona ();
        $tablaResultado = $objPersona->actualizarPersona (
            $this->idEdoCivil, $this->idEdoRegistroPer, $this->cedPersona, $this->rifPersona, $this->genPersona,
            $this->nomPersona, $this->apePersona, $this->correoPersona, $this->fecNacPersona, $this->pesoPersona,
            $this->altPersona, $this->telPersona, $this->mov1Persona, $this->mov2Persona, $this->numCasaPersona,
            $this->dirPersona, $this->obsPersona, $this->fecIngPersona, $this->idPersona );
        $objPersona->cerrarConexion ();
        
        $objUsuario = new Usuario ();
        $tablaResultado1 = $objUsuario->actualizarUsuario ( $this->idRol, $this->idPersona, $this->idEdoRegistroUsu, $this->cuentaUsuario,
            $this->fecCreacion, $this->pregSecreta, $this->respPregSecreta, $this->idUsuario );
        $objUsuario->cerrarConexion ();
        // 		dump($tablaResultado);dump($tablaResultado1);die();
        if ($tablaResultado > 0 OR $tablaResultado1>0) {
            //		if ($tablaResultado > 0 AND $tablaResultado1 > 0) {
            $exito = Messages::EXITO_ACTUALIZAR;
            $this->setParameter ( 'exito', $exito );
            $this->setParameter ( 'opt', '' );
            if ($_SESSION ['rolId'] == 1) {
                $this->listar ( $request, $session );
            }else{
                $this->setParameterPath ( 'desactivarOpciones', true );
                //				$this->home( $request, $session );
                //				$this->ver ( 'persona.tpl' );
                $this->visualizar ( 'principal/principal.tpl' );
            }
        } else {
            $this->inicializarCombos ();
            $error = Messages::ERROR_ACTUALIZAR;
            $this->asignarParametrosError ( $request, 'm', $this->modelo, 'actualizar', '', $this->campos );
            $this->setParameter ( 'opt', 'mr' );
            $this->ver ( 'persona.tpl' );
        }
    }
    function verEditar($request, $session, $opcionMod = false) {
        //         		dump($request);die();
        $this->llamadoXajax ( 'persona' );
        $opcion = $request ['opcion'];
        $this->inicializarAtributos ( $request, 'id' );
        $this->inicializarCombos ();
        if ($_SESSION ['rolId'] == 2) {
            $this->id = $_SESSION ['ID_PERSONA'];
        }
        //         echo "{".$this->id."}";
        $objPersona = new Persona ();
        $tablaResultado = $objPersona->consultarPersonaXidPersona ( $this->id );
        $objPersona->cerrarConexion ();
        //         		dump($tablaResultado);die();
        if ($tablaResultado) {
            //			echo "--$opcionMod--";
            //			dump($tablaResultado);die();
            $tablaResultado = $tablaResultado[0];
            if ($opcionMod) {
                $this->asignarParametros ( $request, 'vr', $this->modelo, $opcion, null, $tablaResultado, $this->campos );
                $this->setParameter ( 'etiquetaModulo', 'Consultar' . ' ' . $this->modulo );
                $this->ver ( 'verpersona.tpl', true );
            } else {
                $this->asignarParametros ( $request, 'mr', $this->modelo, $opcion, null, $tablaResultado, $this->campos );
                $this->setParameter ( 'etiquetaModulo', 'Editar' . ' ' . $this->modulo );
                $this->ver ( 'persona.tpl' );
            }
        } else {
            //		$this->visualizar('principal/error.tpl');
        }
    }
    function consultar($request, $session) {
        //		echo "En consultar ";
        $this->verEditar ( $request, $session, true );
    }
    function misDatos($request, $session) {
        //		echo "En consultar ";
        $this->verEditar ( $request, $session );
    }
    function eliminar($request, $session) {
        $tablaResultado = false;
        $ids = $request ['ids'];
        if ($ids == null || $ids == '') {
            return 0;
        }
        $objPersona = new Persona ();
        $arreglo_ids = split ( ',', $ids );
        foreach ( $arreglo_ids as $id_persona ) {
            $tablaResultado = $objPersona->eliminarPersona ( $id_persona );
        }
        $objPersona->cerrarConexion ();
        if ($tablaResultado) {
            $exito = Messages::EXITO_ELIMINAR;
            $this->setParameter ( 'exito', $exito );
            $this->setParameter ( 'opt', '' );
            $this->listar ( $request, $session );
        } else {
            $error = Messages::ERROR_ELIMINAR;
            $this->setParameter ( 'error', $error );
            $this->listar ( $request, $session );
        }
    }
    function cancelar($request, $session) {
        $this->listar ( $request, $session );
    }
    function home($request, $session) {
        $this->verEditar ( '../principal/principal.php' );
    }
    function ver($pagina, $formatoImpresion = false) {
        if ($formatoImpresion) {
            $this->setTemplateDir ( VISTA . 'persona/' );
            $this->goForward ( $pagina );
        } else {
            $this->visualizar ( 'persona/' . $pagina );
        }
    }
    function imprimir($request, $session) {
        $mod = ucfirst ( @$request ['sec'] );
        $opt = '';
        if (isset ( $request ['id'] )) {
            $opt = $request ['id'];
        }
        $cad = trim ( 'imp' . $mod . '.php' );
        include $cad;
    }
    function ventanaConsultar($request, $session) {
        $opcion = $request ['opcion'];
        $this->inicializarAtributos ( $request, 'id' );
        $objPersona = new Persona ();
        $tablaResultado = $objPersona->consultarPersonaXid ( $this->id );
        $objPersona->cerrarConexion ();
        if ($tablaResultado) {
            $tablaResultado = $tablaResultado[0];
            $this->asignarParametros ( $request, 'vr', $this->modelo, $opcion, null, $tablaResultado, $this->campos );
            $this->setParameter ( 'etiquetaModulo', 'Consultar' . ' ' . $this->modulo );
            $this->ver ( 'verpersona.tpl', TRUE );
        } else {
            //		$this->visualizar('principal/error.tpl');
        }
    }
    function inicializarCombos() {
        $objPersona = new Persona ();
        $tablaMunicipio = Enumerado::tabla2enumerado ( $objPersona->consultarMunicipios(), 'nombre_municipio', 0 );
        $objPersona->cerrarConexion ();
        $this->setParameter ( 'tablaMunicipio', $tablaMunicipio );
        
        $tablaTipoTrabajador = array(
            '1' => "Docente",
            '2' => "Empleado Fijo",
            '3' => "Obrero Fijo",
            '4' => "Jubilado",
            '5' => "Empleado Contratado",
            '6' => "Obrero Contratado",
            '7' => "Empleado de Alto Nivel",
            '8' => "Pensionados"
        );
        $this->setParameter('tablaTipLabPersona', $tablaTipoTrabajador);
        
        $tablaGenero = array(
            '1' => "Femenino",
            '2' => "Masculino"
        );
        $this->setParameter('tablaGenero', $tablaGenero);
        
        $tablaEdoCivil = array(
            '1' => "Soltero",
            '2' => "Casado",
            '3' => 'Uni&oacute;n estable',
            '4' => 'Viudo',
            '5' => 'Divorciado'
        );
        $this->setParameter('tablaEdoCivil', $tablaEdoCivil);
        
        $tablaAdministracion = array(
            '1' => "Nacional",
            '2' => "Estadal",
            '3' => "Municipal"
        );
        $this->setParameter('tablaAdministracion', $tablaAdministracion);
        
        $tablaTipoDiscapacidad = array(
            '1' => "Auditiva",
            '2' => "Cardiovascular",
            '3' => "Genitourinaria",
            '4' => "Mental Intelectual",
            '5' => "Mental Psicosocial",
            '6' => "Metab&oacute;lica",
            '7' => "Multiple",
            '8' => "M&uacute;sculo-Esquel&eacute;tica",
            '9' => "Neurol&oacute;gico",
            '10' => "Respiratoria",
            '11' => "Sensitiva",
            '12' => "Visual",
            '13' => "Voz y Habla"
        );
        $this->setParameter('tablaTipoDiscapacidad', $tablaTipoDiscapacidad);
        
        $tablaGradoDiscapacidad = array(
            '1' => "Leve",
            '2' => "Moderado",
            '3' => "Grave",
            '4' => "Completo"
        );
        $this->setParameter('tablaGradoDiscapacidad', $tablaGradoDiscapacidad);
        
        //         $tablaMunicipio = array(
        //             '1' => "Alberto Adriani",
        //             '2' => "Libertador"
        //         );
        //         $this->setParameter('tablaMunicipio', $tablaMunicipio);
        
        //         $tablaParroquia = array(
        //             '1' => "Milla",
        //             '2' => "San Antonio"
        //         );
        //         $this->setParameter('tablaParroquia', $tablaParroquia);
        
        
        
    }
    function tyc(){
        $this->setParameterPath ( 'desactivarOpciones', true );
        $this->ver ( 'tyc.tpl' );
    }
}
?>