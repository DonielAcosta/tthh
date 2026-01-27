<?php
require_once ('../../../config/config.php');
// require_once (MOD . 'Usuario.php');
require_once (SENT . 'Query.php');
require_once (SENT . 'SQLPersona.php');
class Persona extends Query {
    function __construct() {
        parent::abrirConexion ();
    }
    
    function compAgregarPersona(
        $idEdoCivil, $idEdoRegistro, $cedPersona, $rifPersona, $genPersona,
        $nomPersona, $apePersona, $correoPersona, $fecNacPersona, $pesoPersona,
        $altPersona, $telPersona, $mov1Persona, $mov2Persona, $numCasaPersona,
        $dirPersona, $obsPersona, $fecIngPersona,
        $idRol, $idPersona, $cuentaUsuario, $contrasenaUsuario, $fecCreacion, 
        $edoUsuario, $pregSecreta, $respPregSecreta
        ) {
	    
// 	    $this->beginTransaction();
	    $resultado1 = $this->agregarPersona($idEdoCivil, $idEdoRegistro, $cedPersona, $rifPersona, $genPersona, $nomPersona, $apePersona, $correoPersona, $fecNacPersona, $pesoPersona, $altPersona, $telPersona, $mov1Persona, $mov2Persona, $numCasaPersona, $dirPersona, $obsPersona, $fecIngPersona);
// 	    $idPersona = $this->consultarPersonaUltimoId();
// 	    $idPersona = $this->insert_Id();
	    $idPersona = $resultado1;
	    
// 	    echo "[$idPersona]";
	    
	    $objUsuario = new Usuario();
	    $resultado2 = $objUsuario->agregarUsuario(null, $idRol, $idPersona, $cuentaUsuario, $contrasenaUsuario, $fecCreacion, $edoUsuario, $pregSecreta, $respPregSecreta);
// 	    echo "[$idPersona]-[$resultado2]";die();
	    if ($resultado1>0 AND $resultado2>0) {
// 	        Usuario::commitTransaction();
// 	        $this->commitTransaction();
// 	        Usuario::desconectar();
// 	        $this->desconectar();
	        return true;
	    }else{
// 	        Usuario::rollbackTransaction();
// 	        $this->rollbackTransaction();
// 	        Usuario::desconectar();
// 	        $this->desconectar();
	        return false;
	    }
    }
    function compActualizarPersonaUsuario(
        $idEdoCivil, $idEdoRegistro, $cedPersona, $rifPersona, $genPersona,
        $nomPersona, $apePersona, $correoPersona, $fecNacPersona, $pesoPersona,
        $altPersona, $telPersona, $mov1Persona, $mov2Persona, $numCasaPersona,
        $dirPersona, $obsPersona, $fecIngPersona, $idPersona,
        $idRol, $cuentaUsuario, $fecCreacion,
        $edoUsuario, $pregSecreta, $respPregSecreta,$idUsuario
        ) {
            
            // 	    $this->beginTransaction();
            $resultado1 = $this->actualizarPersona(
                $idEdoCivil, $idEdoRegistro, $cedPersona, $rifPersona, $genPersona, 
                $nomPersona, $apePersona, $correoPersona, $fecNacPersona, $pesoPersona, 
                $altPersona, $telPersona, $mov1Persona, $mov2Persona, $numCasaPersona, 
                $dirPersona, $obsPersona, $fecIngPersona, $idPersona);            
            // 	    $idPersona = $this->consultarPersonaUltimoId();
            // 	    $idPersona = $this->insert_Id();
            
            // 	    echo "[$idPersona]";
            
            $objUsuario = new Usuario();
            $resultado2 = $objUsuario->actualizarUsuario($idRol, $idPersona, $edoUsuario, $cuentaUsuario, $fecCreacion, $pregSecreta, $respPregSecreta, $idUsuario);
            // 	    echo "[$idPersona]-[$resultado2]";die();
            if ($resultado1>0 AND $resultado2>0) {
                // 	        Usuario::commitTransaction();
                // 	        $this->commitTransaction();
                // 	        Usuario::desconectar();
                // 	        $this->desconectar();
                return true;
            }else{
                // 	        Usuario::rollbackTransaction();
                // 	        $this->rollbackTransaction();
                // 	        Usuario::desconectar();
                // 	        $this->desconectar();
                return false;
            }
     }
     function agregarPersona($nacpersona, $cedpersona, $nompersona, $apepersona, $genpersona, $fecnacpersona, $edocivpersona, $correopersona, $numhijmenpersona, $numhijmay, 
         $tel2dompersona, $telmov1persona, $telmov2persona, $discpersona, $descdiscpersona, $facepersona, $instpersona, $twtpersona, $wapppersona, $munhabpersona, $parhabpersona, 
         $dirpersona, $nacconpersona, $cedconpersona, $nomconpersona, $apeconpersona, $genconpersona, $fecnacconpersona,  
         $tiplabpersona, $munlabpersona, $parlabpersona, $dirlabpersona, $otrodestlabpersona, $dirotrodestlabpersona, $tyc, $numhijdispersona,$fecingpersona,$entepersona,$tipdiscpersona, $gdodiscpersona, 
         $numcarnetdiscpersona, $telhabpersona, $correoconpersona, $telmovconpersona, $admantpersona1, $cgoantpersona1, $fecingantpersona1, $fecfinantpersona1, $admantpersona2, 
         $cgoantpersona2, $fecingantpersona2, $fecfinantpersona2, $admantpersona3, $cgoantpersona3, $fecingantpersona3, $fecfinantpersona3) {
         
//          echo "[($nacpersona, $cedpersona, $nompersona, $apepersona, $genpersona, $fecnacpersona, $edocivpersona, $correopersona, $numhijmenpersona, $numhijmay, $tel2dompersona, $telmov1persona, $telmov2persona, $discpersona, $descdiscpersona, $facepersona, $instpersona, $twtpersona, $wapppersona, $munhabpersona, $parhabpersona, $dirpersona, $nacconpersona, $cedconpersona, $nomconpersona, $apeconpersona, $genconpersona, $fecnacconpersona, $tiplabpersona, $munlabpersona, $parlabpersona, $dirlabpersona, $otrodestlabpersona, $dirotrodestlabpersona, $tyc, $numhijdispersona
// ,$fecingpersona,$entepersona,$tipdiscpersona, $gdodiscpersona, $numcarnetdiscpersona, $telhabpersona, $correoconpersona, $telmovconpersona, $admantpersona1, $cgoantpersona1, $fecingantpersona1, $fecfinantpersona1, $admantpersona2, $cgoantpersona2, $fecingantpersona2, $fecfinantpersona2, $admantpersona3, $cgoantpersona3, $fecingantpersona3, $fecfinantpersona3)]";
//          die(); 
        //		$idPersona = parent::prepareParam ( $idPersona, Query::DATATYPE_INTEGER );
//         $idEdoCivil = parent::prepareParam ( $idEdoCivil, Query::DATATYPE_INTEGER );
//         $idEdoRegistro = parent::prepareParam ( $idEdoRegistro, Query::DATATYPE_INTEGER );
//         $cedPersona = parent::prepareParam ( $cedPersona, Query::DATATYPE_STRING, 0 );
//         $rifPersona = parent::prepareParam ( $rifPersona, Query::DATATYPE_STRING, 0 );
//         $genPersona = parent::prepareParam ( $genPersona, Query::DATATYPE_INTEGER );
//         $nomPersona = parent::prepareParam ( $nomPersona, Query::DATATYPE_STRING, 0 );
//         $apePersona = parent::prepareParam ( $apePersona, Query::DATATYPE_STRING, 0 );
//         $correoPersona = parent::prepareParam ( $correoPersona, Query::DATATYPE_STRING, 0 );
//         $pesoPersona = parent::prepareParam ( $pesoPersona, Query::DATATYPE_STRING, 0 );
//         $altPersona = parent::prepareParam ( $altPersona, Query::DATATYPE_STRING, 0 );
//         $telPersona = parent::prepareParam ( $telPersona, Query::DATATYPE_STRING, 0 );
//         $mov1Persona = parent::prepareParam ( $mov1Persona, Query::DATATYPE_STRING, 0 );
//         $mov2Persona = parent::prepareParam ( $mov2Persona, Query::DATATYPE_STRING, 0 );
//         $numCasaPersona = parent::prepareParam ( $numCasaPersona, Query::DATATYPE_STRING, 0 );
//         $dirPersona = parent::prepareParam ( $dirPersona, Query::DATATYPE_STRING, 0 );
//         $obsPersona = parent::prepareParam ( $obsPersona, Query::DATATYPE_STRING, 0 );
         $params = array ($nacpersona, $cedpersona, $nompersona, $apepersona, $genpersona, $fecnacpersona, $edocivpersona, $correopersona, $numhijmenpersona, $numhijmay,
             $tel2dompersona, $telmov1persona, $telmov2persona, $discpersona, $descdiscpersona, $facepersona, $instpersona, $twtpersona, $wapppersona, $munhabpersona, $parhabpersona,
             $dirpersona, $nacconpersona, $cedconpersona, $nomconpersona, $apeconpersona, $genconpersona, $fecnacconpersona,
             $tiplabpersona, $munlabpersona, $parlabpersona, $dirlabpersona, $otrodestlabpersona, $dirotrodestlabpersona, $tyc, $numhijdispersona,$fecingpersona,$entepersona,$tipdiscpersona, $gdodiscpersona,
             $numcarnetdiscpersona, $telhabpersona, $correoconpersona, $telmovconpersona, $admantpersona1, $cgoantpersona1, $fecingantpersona1, $fecfinantpersona1, $admantpersona2,
             $cgoantpersona2, $fecingantpersona2, $fecfinantpersona2, $admantpersona3, $cgoantpersona3, $fecingantpersona3, $fecfinantpersona3);
        return parent::executeRetId ( SQLPersona::AGREGAR_PERSONA, $params );
    }
    function actualizarPersona($idEdoCivil, $idEdoRegistro, $cedPersona, $rifPersona, $genPersona, $nomPersona, $apePersona, $correoPersona, $fecNacPersona, $pesoPersona, $altPersona, $telPersona, $mov1Persona, $mov2Persona, $numCasaPersona, $dirPersona, $obsPersona, $fecIngPersona, $idPersona) {
        $idPersona = parent::prepareParam ( $idPersona, Query::DATATYPE_INTEGER );
        $idEdoCivil = parent::prepareParam ( $idEdoCivil, Query::DATATYPE_INTEGER );
        $idEdoRegistro = parent::prepareParam ( $idEdoRegistro, Query::DATATYPE_INTEGER );
        $cedPersona = parent::prepareParam ( $cedPersona, Query::DATATYPE_STRING, 0 );
        $rifPersona = parent::prepareParam ( $rifPersona, Query::DATATYPE_STRING, 0 );
        $genPersona = parent::prepareParam ( $genPersona, Query::DATATYPE_INTEGER );
        $nomPersona = parent::prepareParam ( $nomPersona, Query::DATATYPE_STRING, 0 );
        $apePersona = parent::prepareParam ( $apePersona, Query::DATATYPE_STRING, 0 );
        $correoPersona = parent::prepareParam ( $correoPersona, Query::DATATYPE_STRING, 0 );
        $pesoPersona = parent::prepareParam ( $pesoPersona, Query::DATATYPE_STRING, 0 );
        $altPersona = parent::prepareParam ( $altPersona, Query::DATATYPE_STRING, 0 );
        $telPersona = parent::prepareParam ( $telPersona, Query::DATATYPE_STRING, 0 );
        $mov1Persona = parent::prepareParam ( $mov1Persona, Query::DATATYPE_STRING, 0 );
        $mov2Persona = parent::prepareParam ( $mov2Persona, Query::DATATYPE_STRING, 0 );
        $numCasaPersona = parent::prepareParam ( $numCasaPersona, Query::DATATYPE_STRING, 0 );
        $dirPersona = parent::prepareParam ( $dirPersona, Query::DATATYPE_STRING, 0 );
        $obsPersona = parent::prepareParam ( $obsPersona, Query::DATATYPE_STRING, 0 );
        $params = array ($idEdoCivil, $idEdoRegistro, $cedPersona, $rifPersona, $genPersona, $nomPersona, $apePersona, $correoPersona, $fecNacPersona, $pesoPersona, $altPersona, $telPersona, $mov1Persona, $mov2Persona, $numCasaPersona, $dirPersona, $obsPersona, $fecIngPersona, $idPersona );
        return parent::execute ( SQLPersona::ACTUALIZAR_PERSONA, $params );
    }
    function consultarPersona() {
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA );
    }
    function consultarMunicipios() {
        return parent::executeQuery ( SQLPersona::CONSULTAR_MUNICIPIOS);
    }
    function consultarParroquiasXidMunicipio($idMunicipio) {
        $params = array ($idMunicipio);
        return parent::executeQuery ( SQLPersona::CONSULTAR_PARROQUIAS_POR_ID_MUNICIPIOS, $params );
    }
    function consultarPersonaXnumCasa($numCasa) {
        $numCasa = 'casa'.$numCasa;
        $params = array ($numCasa );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NUM_CASA_PERSONA, $params );
    }
    function eliminarPersona($id_persona) {
        $params = array ($id_persona );
        return parent::execute ( SQLPersona::ELIMINAR_PERSONA, $params );
    }
    //------------------------------
    function consultarPersonaXidPersona($idPersona) {
        $params = array ($idPersona );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_IDPERSONA, $params );
    }
    function existePersonaXidPersona($idPersona) {
        $params = array ($idPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_IDPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXidEdoCivil($idEdoCivil) {
        $params = array ($idEdoCivil );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_IDEDOCIVIL, $params );
    }
    function existePersonaXidEdoCivil($idEdoCivil) {
        $params = array ($idEdoCivil );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_IDEDOCIVIL, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXidEdoRegistro($idEdoRegistro) {
        $params = array ($idEdoRegistro );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_IDEDOREGISTRO, $params );
    }
    function existePersonaXidEdoRegistro($idEdoRegistro) {
        $params = array ($idEdoRegistro );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_IDEDOREGISTRO, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXcedPersona($cedPersona) {
        $params = array ("%$cedPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_CEDPERSONA, $params );
    }
    function consultarPersonaXcedPersonaAprox($cedPersona) {
        $params = array ("%$cedPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_CEDPERSONA_APROX, $params );
    }
    function existePersonaXcedPersona($cedPersona) {
        $params = array ($cedPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_CEDPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXrifPersona($rifPersona) {
        $params = array ("%$rifPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_RIFPERSONA, $params );
    }
    function consultarPersonaXrifPersonaAprox($rifPersona) {
        $params = array ("%$rifPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_RIFPERSONA_APROX, $params );
    }
    function existePersonaXrifPersona($rifPersona) {
        $params = array ($rifPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_RIFPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXgenPersona($genPersona) {
        $params = array ($genPersona );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_GENPERSONA, $params );
    }
    function existePersonaXgenPersona($genPersona) {
        $params = array ($genPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_GENPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXnomPersona($nomPersona) {
        $params = array ("%$nomPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NOMPERSONA, $params );
    }
    function consultarPersonaXnomPersonaAprox($nomPersona) {
        $params = array ("%$nomPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NOMPERSONA_APROX, $params );
    }
    function existePersonaXnomPersona($nomPersona) {
        $params = array ($nomPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NOMPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXapePersona($apePersona) {
        $params = array ("%$apePersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_APEPERSONA, $params );
    }
    function consultarPersonaXapePersonaAprox($apePersona) {
        $params = array ("%$apePersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_APEPERSONA_APROX, $params );
    }
    function existePersonaXapePersona($apePersona) {
        $params = array ($apePersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_APEPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXcorreoPersona($correoPersona) {
        $params = array ("%$correoPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_CORREOPERSONA, $params );
    }
    function consultarPersonaXcorreoPersonaAprox($correoPersona) {
        $params = array ("%$correoPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_CORREOPERSONA_APROX, $params );
    }
    function existePersonaXcorreoPersona($correoPersona) {
        $params = array ($correoPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_CORREOPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXfecNacPersona($fecNacPersona) {
        $params = array ($fecNacPersona );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_FECNACPERSONA, $params );
    }
    function existePersonaXfecNacPersona($fecNacPersona) {
        $params = array ($fecNacPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_FECNACPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXpesoPersona($pesoPersona) {
        $params = array ("%$pesoPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_PESOPERSONA, $params );
    }
    function consultarPersonaXpesoPersonaAprox($pesoPersona) {
        $params = array ("%$pesoPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_PESOPERSONA_APROX, $params );
    }
    function existePersonaXpesoPersona($pesoPersona) {
        $params = array ($pesoPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_PESOPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXaltPersona($altPersona) {
        $params = array ("%$altPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_ALTPERSONA, $params );
    }
    function consultarPersonaXaltPersonaAprox($altPersona) {
        $params = array ("%$altPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_ALTPERSONA_APROX, $params );
    }
    function existePersonaXaltPersona($altPersona) {
        $params = array ($altPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_ALTPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXtelPersona($telPersona) {
        $params = array ("%$telPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_TELPERSONA, $params );
    }
    function consultarPersonaXtelPersonaAprox($telPersona) {
        $params = array ("%$telPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_TELPERSONA_APROX, $params );
    }
    function existePersonaXtelPersona($telPersona) {
        $params = array ($telPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_TELPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXmov1Persona($mov1Persona) {
        $params = array ("%$mov1Persona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_MOV1PERSONA, $params );
    }
    function consultarPersonaXmov1PersonaAprox($mov1Persona) {
        $params = array ("%$mov1Persona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_MOV1PERSONA_APROX, $params );
    }
    function existePersonaXmov1Persona($mov1Persona) {
        $params = array ($mov1Persona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_MOV1PERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXmov2Persona($mov2Persona) {
        $params = array ("%$mov2Persona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_MOV2PERSONA, $params );
    }
    function consultarPersonaXmov2PersonaAprox($mov2Persona) {
        $params = array ("%$mov2Persona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_MOV2PERSONA_APROX, $params );
    }
    function existePersonaXmov2Persona($mov2Persona) {
        $params = array ($mov2Persona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_MOV2PERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXnumCasaPersona($numCasaPersona) {
        $params = array ("%$numCasaPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NUMCASAPERSONA, $params );
    }
    function consultarPersonaXnumCasaPersonaAprox($numCasaPersona) {
        $params = array ("%$numCasaPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NUMCASAPERSONA_APROX, $params );
    }
    function existePersonaXnumCasaPersona($numCasaPersona) {
        $params = array ($numCasaPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_NUMCASAPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXdirPersona($dirPersona) {
        $params = array ("%$dirPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_DIRPERSONA, $params );
    }
    function consultarPersonaXdirPersonaAprox($dirPersona) {
        $params = array ("%$dirPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_DIRPERSONA_APROX, $params );
    }
    function existePersonaXdirPersona($dirPersona) {
        $params = array ($dirPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_DIRPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXobsPersona($obsPersona) {
        $params = array ("%$obsPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_OBSPERSONA, $params );
    }
    function consultarPersonaXobsPersonaAprox($obsPersona) {
        $params = array ("%$obsPersona%" );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_OBSPERSONA_APROX, $params );
    }
    function existePersonaXobsPersona($obsPersona) {
        $params = array ($obsPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_OBSPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    function consultarPersonaXfecIngPersona($fecIngPersona) {
        $params = array ($fecIngPersona );
        return parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_FECINGPERSONA, $params );
    }
    function existePersonaXfecIngPersona($fecIngPersona) {
        $params = array ($fecIngPersona );
        $tabla = parent::executeQuery ( SQLPersona::CONSULTAR_PERSONA_POR_FECINGPERSONA, $params );
        if (count ( $tabla ) > 0) {
            return true;
        }
        return false;
    }
    //------------------------------
    //INICIO COMBOS
    //FIN COMBOS
}
?>