<?php
require_once '../../../config/config.php';
require_once MOD . 'Movimiento.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['fileToUpload']['type'])) {
    return;
}

$errors   = array();
$ruta    = date('Y') . '/' . date('m') . '/';
$carpeta = PUBSIST . 'upload/' . $ruta;

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

$file      = $_FILES['fileToUpload'];
$tipoArchivo = str_replace('image/', '', $file['type']);
$infoDestino  = isset($_POST['infoDestino']) ? $_POST['infoDestino'] : '';
$matInfoDestino = explode(':', $infoDestino);
$nomArchivo    = isset($matInfoDestino[0]) ? $matInfoDestino[0] . '_' . date('Ymd_H_m') : date('Ymd_His');
$idMovimiento  = isset($matInfoDestino[1]) ? $matInfoDestino[1] : null;
$nombreArchivo = $carpeta . $nomArchivo . '.' . $tipoArchivo;

$extensionesPermitidas = array('jpg', 'jpeg', 'png', 'gif');
$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if (!in_array($extension, $extensionesPermitidas) && !in_array($tipoArchivo, $extensionesPermitidas)) {
    $errors[] = 'Solo se permiten imágenes (JPG, PNG, GIF).';
}

if (isset($_POST['submit'])) {
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        $errors[] = 'El archivo no es una imagen válida.';
    }
}

if (file_exists($nombreArchivo)) {
    $errors[] = 'Ya existe un archivo con ese nombre.';
}

$maxBytes = 10 * 1024 * 1024; // 10 MB
if ($file['size'] > $maxBytes) {
    $errors[] = 'El archivo es demasiado grande. Tamaño máximo: 10 MB.';
}

if ($file['error'] !== UPLOAD_ERR_OK) {
    $errors[] = 'Error en la subida del archivo (código ' . $file['error'] . ').';
}

if (!empty($errors)) {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    echo '<strong>Error!</strong>';
    foreach ($errors as $error) {
        echo '<p>' . htmlspecialchars($error) . '</p>';
    }
    echo '</div>';
    return;
}

if (move_uploaded_file($file['tmp_name'], $nombreArchivo)) {
    $rutaRelativa = $ruta . $nomArchivo . '.' . $tipoArchivo;
    $objMovimiento = new Movimiento();
    $objMovimiento->actualizarMovimientoImagen($rutaRelativa, $idMovimiento);
    $objMovimiento->cerrarConexion();
    echo $rutaRelativa;
} else {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    echo '<strong>Error!</strong><p>No se pudo guardar el archivo en el servidor.</p>';
    echo '</div>';
}
