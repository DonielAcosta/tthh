<?php
require_once ('../../../config/config.php');
require_once (MOD . 'Movimiento.php');
//echo count($_FILES["file0"]["name"]);exit;
if ($_SERVER ['REQUEST_METHOD'] == "POST" && isset ( $_FILES ["fileToUpload"] ["type"] )) {
	//$target_dir = "upload/";
	$ruta = date ( 'Y' ) . '/' . date ( 'm' ) . '/';
	$target_dir = PUBSIST . "upload/" . $ruta;
	$carpeta = $target_dir;
	if (! file_exists ( $carpeta )) {
		mkdir ( $carpeta, 0777, true );
	}
	// EL NOMBRE DEL ARCHIVO ES: ID_USUARIO - ID_MOVIMIENTO - AÑO_MES_DIA - H - M
	//dump($_FILES["fileToUpload"]);
	//dump($_POST["infoDestino"]);
	$tipoArchivo = str_replace ( 'image/', '', $_FILES ["fileToUpload"] ["type"] );
	$infoDestino = $_POST ["infoDestino"];
	$matInfoDestino = explode ( ':', $infoDestino );
	$nomArchivo = $matInfoDestino [0] . '_' . date ( 'Ymd_H_m' );
	$idMovimiento = $matInfoDestino [1];
	//dump($matInfoDestino);
	$nombreArchivo = $target_dir . $nomArchivo . '.' . $tipoArchivo;
	//echo "*****[$idMovimiento]*****";
	//dump($_FILES["fileToUpload"]);die();
	$target_file = $carpeta . basename ( $_FILES ["fileToUpload"] ["name"] );
	//$target_file = $carpeta . basename($_POST["infoDestino"].'.'.$tipoArchivo);
	//$target_file = $carpeta . $_POST["infoDestino"].'.'.$tipoArchivo;
	$uploadOk = 1;
	$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
	// Check if image file is a actual image or fake image
	if (isset ( $_POST ["submit"] )) {
		$check = getimagesize ( $_FILES ["fileToUpload"] ["tmp_name"] );
		if ($check !== false) {
			$errors [] = "El archivo es una imagen - " . $check ["mime"] . ".";
			$uploadOk = 1;
		} else {
			$errors [] = "El archivo no es una imagen.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists ( $target_file )) {
		$errors [] = "Lo sentimos, archivo ya existe.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES ["fileToUpload"] ["size"] > 1024288) {
		$errors [] = "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 10 MB";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		//if($imageFileType != "xls" && $imageFileType != "xlsx") {
		//    $errors[]= "Lo sentimos, sólo archivos XLS & XLSX son permitidos.";
		$errors [] = "Lo sentimos, sólo imagenes son permitidos.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$errors [] = "Lo sentimos, tu archivo no fue subido.";
		// if everything is ok, try to upload file
	} else {
		//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		if (move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $nombreArchivo )) {
			//    if (move_uploaded_file($nombreArchivo, $target_file)) {
			$messages [] = "El Archivo ha sido subido correctamente.";
			$objMovimiento = new Movimiento ();
			$tablaResultado = $objMovimiento->actualizarMovimientoImagen ( $ruta . $nomArchivo . '.' . $tipoArchivo, $idMovimiento );
			$objMovimiento->cerrarConexion ();
		} else {
			$errors [] = "Lo sentimos, hubo un error subiendo el archivo.";
		}
	}
	if (isset ( $errors )) {
		?>
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert"
	aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Error!</strong> 
	  <?php
		foreach ( $errors as $error ) {
			echo "<p>$error</p>";
		}
		?>
	</div>
<?php
	}
	if (isset ( $messages )) {
		echo $ruta . $nomArchivo . '.' . $tipoArchivo;
		//	$btnContinuar='<a href="mispagos">
	//	<button id="buyButton" type="button" class="btn btn-primary">Continuar</button></a>';
	}
}
?>