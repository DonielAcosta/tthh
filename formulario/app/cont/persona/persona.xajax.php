<?php
/**
 * @file persona.xajax.php
 *
 * Xajax de la Tabla Persona
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
require_once (MOD . 'Pdf.php');
require_once (APP . 'comun/grid.php');
$action = new Action ();
$arrayFunciones = Array ("llenarGridPersona", "clickPersona", "vntActClave","llenarComboParroquias" );
if (! isset ( $xajax )) {
    $action->iniciarXajax ( $arrayFunciones );
} else {
    $action->cargarFunciones ( $arrayFunciones, $xajax );
}
function llenarGridPersona($campoBusqueda, $indice) {
    global $objResponse;
    $objResponse = new xajaxResponse ();
    $nomPagina = 'persona'; // EDITABLE
    $resultado = null;
    $numPag = 0;
    $paginas = '';
    try {
        $objPersona = new Persona ();
        if ($campoBusqueda != '') {
            $resultado = $objPersona->consultarPersonaXnumCasa ( $campoBusqueda ); // EDITABLE
        } else {
            $resultado = $objPersona->consultarPersona (); // EDITABLE
        }
        $objPersona->cerrarConexion (); // EDITABLE
        // 		dump($resultado);
        /* INICIO PAGINACION */
        $action = new Action ();
        $numPag = $action->getPageNumbers ( $resultado );
        if ($numPag > 1) {
            $matRes = $action->paginado ( $objResponse, $numPag, $indice, 'xajax_llenarGridPersona', $campoBusqueda, $paginas, $resultado );
            $paginas = $matRes [0];
            $cad1 = $matRes [1];
            $cad2 = $matRes [2];
            $cad3 = $matRes [3];
            $resultado = $action->getPage ( $resultado, $indice );
            if ($indice == 0) {
                $indice = 1;
            }
            $paginas = "$cad1 $paginas $cad2  $cad3";
            $objResponse->assign ( 'paginacion', 'innerHTML', $paginas, '' );
            $objResponse->assign ( 'paginacion1', 'innerHTML', $paginas, '' );
        } else {
            $objResponse->assign ( 'paginacion', 'innerHTML', '', '' );
            $objResponse->assign ( 'paginacion1', 'innerHTML', '', '' );
        }
        /* FIN PAGINACION */
        // 		$etiquetas = array ('', 'Imp', 'Ver', 'Editar', 'idPersona', 'IdEdoCivil', 'IdEdoRegistro', 'CedPersona', 'RifPersona', 'GenPersona', 'NomPersona', 'ApePersona', 'CorreoPersona', 'FecNacPersona', 'PesoPersona', 'AltPersona', 'TelPersona', 'Mov1Persona', 'Mov2Persona', 'NumCasaPersona', 'DirPersona', 'ObsPersona', 'FecIngPersona' );
//         $etiquetas = array ('', 'Imp', 'Ver', 'Editar','Cédula', 'Nombres y Apellidos', 'Login', 'N° Apart.', 'Correo', 'Rol', 'Edo' );
        $etiquetas = array ('', 'Ver', 'Editar','Cédula', 'Nombres y Apellidos', 'Login', 'N° Casa.', 'Correo', 'Rol', 'Edo' );
        if ($resultado != null) {
            $chk = "<input type='checkbox' name='chkdel' id='\$campoClave' value='\$campoClave'/>";
            $img = "<img class='classHand' onclick='xajax_clickPersona(\$campoClave,1)' src='" . PUB_URL . "img/grid/consultar.gif' title='Consultar' border='0px'/>";
            $img1 = crearObjImagen ( $nomPagina, 'edi' );
            $img3 = "<a href='$nomPagina/impAri/\$campoClave' target='_blank'><img src='" . PUB_URL . "img/iconos/imprimir.png' title='Imprimir' border='0px'/></a>";
            // 			$campos = array ('obj_' . $chk, 'obj_' . $img3, 'obj_' . $img, 'obj_' . $img1, 'cedPersona', 'nomPersona', 'idEdoRegistro', 'cedPersona', 'rifPersona', 'genPersona', 'nomPersona', 'apePersona', 'correoPersona', 'fecNacPersona', 'pesoPersona', 'altPersona', 'telPersona', 'mov1Persona', 'mov2Persona', 'numCasaPersona', 'dirPersona', 'obsPersona', 'fecIngPersona' );
            $campos = array ('obj_' . $chk, 'obj_' . $img, 'obj_' . $img1, 'cedPersona', 'obj_cmp_[nomPersona*apePersona]', 'cuentaUsuario','numCasaPersona', 'correoPersona', 'nomRol', 'nomEdoRegistro' );
            llenar_grid ( $objResponse, 'gridPersona', $etiquetas, $resultado, $campos, 'idPersona', false );
            $msg = '';
        } else {
            limpiar_grid ( $objResponse, 'gridPersona', $etiquetas );
            $msg = 'No se encontraron registros, con las caracteristicas definidas por el usuario';
            $objResponse->call ( "ventanaAlerta('$msg','Alerta')" );
        }
    } catch ( exception $e ) {
        $objResponse->call ( "ventanaAlerta('Error de conexion','Alerta')" );
        return $objResponse;
    }
    return $objResponse;
}
function clickPersona($id, $ind) {
    global $objResponse;
    $objResponse = new xajaxResponse ();
    switch ($ind) {
        case 1 :
            $objResponse->script ( "vntConsultar('persona/consultar/$id', 'Consultar Persona');" );
            break;
        case 2 :
            ;
            break;
    }
    return $objResponse;
}
/* METODOS COPIADOS DE USUARIO */
function vntActClave() {
    global $objResponse;
    $objResponse = new xajaxResponse ();
    $objResponse->script ( "vntPequena('../../../app/cont/sesion/actclave.php', 'Actualizar clave');" );
    return $objResponse;
}
function modificarPassword($clave, $reClave, $id) {
    global $objResponse;
    $objResponse = new xajaxResponse ();
    //	$objResponse->call ( "ventanaAlerta('($clave, $reClave, $id)','Alerta')" );
    //	return $objResponse;
    if ($clave != $reClave) {
        $objResponse->call ( "ventanaAlerta('$id, $clave','Alerta')" );
        $objResponse->call ( "ventanaAlerta('Claves diferentes, por favor reingrese las claves','Alerta')" );
        $objResponse->call ( "document.getElementById('Act_Password').value = ''" );
        $objResponse->call ( "document.getElementById('Act_Password').focus" );
        return $objResponse;
    }
    $clave = str_replace ( '"', '', $clave );
    $rs = new Sesion ();
    $tabla = $rs->actualizarclaveUsuario ( $clave, $id );
    $rs->cerrarConexion ();
    $tabla = 1;
    if ($tabla) {
        $objResponse->script ( "cerrarvntPequena();" );
        $msg = 'Clave actualizada';
    } else {
        $msg = 'Error al intentar modificar la clave, por favor intentelo de nuevo';
    }
    $objResponse->call ( "ventanaAlerta('$msg','Alerta')" );
    return $objResponse;
}

function llenarComboParroquias($idMunicipio,$cmbDestino){
    global $objResponse;
    $objResponse = new xajaxResponse ();

    if ($idMunicipio=='') {
        $comboTipo='';
        $objResponse->assign ( 'div'.$cmbDestino, 'innerHTML', $comboTipo, '' );
        return $objResponse;
    }
    $rs = new Persona ();
    $tabla = $rs->consultarParroquiasXidMunicipio( $idMunicipio);
    $rs->cerrarConexion ();
//     $tabla = 1;
    if ($tabla) {
//         $tabla = $tabla[0];
//         $objResponse->script ( "cerrarvntPequena();" );
        $msg = 'Clave actualizada '.$idMunicipio;
        
        $comboTipo='<select name="'.$cmbDestino.'" id="'.$cmbDestino.'" class="form-control input-sm">';
        foreach ($tabla as $ite) {
            $id_parroquia = $ite['id_parroquia'];
            $nombre_parroquia = $ite['nombre_parroquia'];
            $comboTipo.="<option value=".$id_parroquia.">".$nombre_parroquia."</option>";
        }
        $comboTipo.='</select>';
        
//         echo "$comboTipo";
        
//         dump($tabla);
    } else {
        $comboTipo='';
        $msg = 'Error al intentar modificar la clave, por favor intentelo de nuevo';
    }
    $objResponse->assign ( 'div'.$cmbDestino, 'innerHTML', $comboTipo, '' );
//     $objResponse->call ( "ventanaAlerta('$msg','Alerta')" );
    return $objResponse;
}
?>
