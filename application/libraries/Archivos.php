<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Gestión de archivos
 *
 * @author Gianny Josué Villarreal Bustos <josue.villarreal@gmail.com>
 * @version 1.0
 * @date 13/07/2020
 */
class Archivos{
    function __construct() {
//         parent::abrirConexion ();
    }
    /**
     * Permite crear un archivo
     *
     * @param String $nombre_archivo Nombre del archivo a crear
     *
     * @return Object $archivo Crea el archivo
     */
    function crearArchivo($nombre_archivo) {
        //	fopen($filename, 'a'))
        $archivo = fopen ( $nombre_archivo, 'a' );
        return $archivo;
    }
    /**
     * Permite abrir un archivo a modo de sólo lectura
     *
     * @param String $nombre_archivo Nombre del archivo
     * @param String $modo Modalidad
     *
     * @return Boolean
     */
    function abrir_archivo($nombre_archivo, $modo = 'r') {
        $archivo = fopen ( $nombre_archivo, $modo ) or die ( 'Archivo no encontrado' );
        return $archivo;
    }
    /**
     * Permite leer el archivo
     *
     * @param String $nombre_archivo Nombre del archivo
     * @param Integer $tam Indica el tamaño máximo que debe poseer el archivo
     *
     * @return Object $contArchivo Contenido del archivo
     */
    function leerArchivo($archivo, $tam = '1024') {
        $contArchivo = array ();
        while ( $linea = fgets ( $archivo, $tam ) ) {
            $contArchivo [] = trim ( $linea );
        }
        return $contArchivo;
    }
    /**
     * Permite escribir el archivo
     *
     * @param String $nombre_archivo Nombre del archivo
     * @param Object $contArchivo Contenido del archivo
     * @param String $salto Saldo de línea
     *
     * @return Object Archivo con el contenido indicado
     */
    function escribirArchivo($archivo, $contenido, $salto = "\n") {
        return fwrite ( $archivo, $contenido . $salto );
    }
    /**
     * Permite renonbrar un archivo
     *
     * @param String $archivoAnterior Nombre del archivo anterior
     * @param String $archivo Nuevo Nombre del archivo nuevo
     * @param String $path Ubicación física del archivo
     *
     * @return True: En caso de reemplazarlo exitosamente, False: En caso de no reemplazarlo
     */
    function renombrarArchivo($archivoAnterior, $archivoNuevo, $path = '') {
        if (Archivos::existeArchivo ( $archivoAnterior, $path )) {
            $archivoAnterior = $path . $archivoAnterior;
            $archivoNuevo = $path . $archivoNuevo;
            //	echo "existe -> ($archivoAnterior,$archivoNuevo)<br>";
            //	if (!rename($archivoAnterior,$archivoNuevo))
            {
                if (copy ( $archivoAnterior, $archivoNuevo )) {
                    unlink ( $archivoAnterior );
                    return true;
                }
                return false;
            }
            return true;
            
            //	$var = rename($path.$nomOriginal,$path.$nomNuevo);
            //	$var = rename("C:/ms4w/Apache/htdocs/Cobranza/arc/2009/11/pruebaBco.txt","C:/ms4w/Apache/htdocs/Cobranza/arc/2009/11/apro32009/1.txt");
            //	rename()
        } else {
            //	echo "---No existe<br>";
        }
    }
    /**
     * Permite subir un Archivo
     *
     * @param String $nombreArchivo Nombre del Archivo
     * @param String $tamanoArchivo Tamaño del Archivo
     * @param String $temporal Sitio temporal de almacenamiento del Archivo
     * @param String $path Ruta del archivo
     * @return String $mensaje Mensaje de la operación
     */
    function subirArchivo($nombreArchivo, $tamanoArchivo, $temporal,$extDeseada='', $path = '') {
        $res = false;
        $extension = explode ( ".", $nombreArchivo );
        $num = count ( $extension ) - 1;
        // 		if($extension[$num] == "jpg" || $extension[$num] == "JPG" || $extension [$num] == "txt" || $extension [$num] == "TXT"
        // 		|| $extension [$num] == "png" || $extension [$num] == "PNG"
        // 		){
        //         echo "[$extDeseada]<br>";die();
        switch ($extDeseada) {
            case 'excel':
                $extensiones = "'".$extension [$num] ."' == 'xls' || ".
                    "'".$extension [$num] ."' == 'XLS' || ".
                    "'".$extension [$num] ."' == 'xlsx' || ".
                    "'".$extension [$num] ."' == 'XLSX'";
                $tiposAceptados = ' .xls o .xlsx';
                break;
            default:
                $extensiones = 'default';
                $tiposAceptados = 'todos';
                break;
        }
        //         echo "[$extensiones]-[$tiposAceptados]-[$extDeseada]";die();
//         if ($extension [$num] == "xls" || $extension [$num] == "XLS" || $extension [$num] == "xlsx" || $extension [$num] == "XLSX") {
        if ($extension [$num] == "pdf" || $extension [$num] == "PDF" || $extension [$num] == "jpg" || $extension [$num] == "jpg") {
            // 		    echo 'if ['.$extension [$num]."[$extensiones]-[$tiposAceptados]-[$extDeseada]";die();
            //         if (eval($extensiones)) {
            //         $cad = 'if ('.$extensiones.') {$valor="true";}else{\$valor="true";}';
            //         $bandIf = eval($cad);
            //         echo "[$cad]--[$bandIf][$valor]";
            //         if($bandIf){
            // 		    echo "[$extensiones]-[$tiposAceptados]-[$extDeseada]";die();
            if ($tamanoArchivo < 1000000) {
                if (! move_uploaded_file ( $temporal, $path . $nombreArchivo )) {
                    echo "Error, al copiar el archivo";
                } else {
                    $res = true;
                    $mensaje = 'El archivo se ha subido correctamente';
                }
            } else {
                $mensaje = "Error, el archivo supera los 1000kb";
            }
        } else {
            // 		    echo 'else ['.$extension [$num]."[$extensiones]-[$tiposAceptados]-[$extDeseada]";die();
//             $mensaje = "Error, el formato de archivo no es valido, solo se aceptan $tiposAceptados";
            $mensaje = "Error, el formato de archivo no es valido";
        }
        // 		return $mensaje . "[$extensiones]-[$tiposAceptados]-[$extDeseada]";
        return array('res'=>$res,"mns"=>$mensaje);
    }
    /**
     * Verifica si existe un Archivo o Directorio
     *
     * @param String $nombreArchivo Nombre del Archivo o Directorio
     * @param String $path Ruta del directorio
     * @return Boolean True: Si existe el archivo, False: En otro caso
     */
    function existeArchivo($nombreArchivo, $path = '') {
        return file_exists ( $path . $nombreArchivo );
    }
    /**
     * Verifica si existe un directorio
     *
     * @param String $path Ruta del directorio
     * @return Boolean True: Si encuentra directorio, False: En otro caso
     */
    function existe_directorio($path) {
        if (is_dir ( $path )) {
            return true;
        }
        return false;
    }
    /**
     * Crea un directorio
     *
     * @param String $path Ruta del directorio
     *
     * @return Boolean True: Si lo crea, False: En otro caso
     */
    function crear_directorio($path) {
//         $path = 'public_html'.$path;
//         $path = '/home/admin/web/tthh.merida.gob.ve/public_html/'.$path;
//         echo "[$path]";
        if (! Archivos::existe_directorio ( $path )) {
            $res = mkdir ( $path );
            return true;
        }
        return false;
    }
    /**
     * Permite eliminar un archivo
     *
     * @param String $nombreArchivo Nombre del archivo
     * @param String $path Ruta del directorio
     * @return Boolean True si existe, false en otro caso
     */
    function eliminarArchivo($nombreArchivo, $path = '') {
        if ($this->existeArchivo ( $nombreArchivo )) {
            return unlink ( $path . $nombreArchivo );
        }
        return false;
    }
    /**
     * Cierra el archivo
     *
     * @param String $archivo Nombre del archivo
     *
     * @return Boolean True: Si lo cierra, False: En otro caso
     */
    function cerrar_archivo($archivo) {
        fclose ( $archivo );
    }
    /**
     * Permite descomponer la línea
     *
     * @param String $linea Contenido de la línea
     * @param String $separador Separador de la línea
     *
     * @return String $columnas Columnas
     */
    function descomponerLinea($linea, $separador) {
        $columnas = explode ( $separador, $linea );
        return $columnas;
    }
}
?>