<?php
/**
 * @file Enumerado.php
 * Metodos para procesar los datos y sean compatibles con Smarty (Para los combos)
 * @version V 2.0
 */
class Enumerado {
	
	static function tipoEntero($limsup, $liminf = 1, $masde = true) {
		if ($limsup == null) {
			return null;
		}
		$enteros = array ();
		for($i = $liminf; $i <= $limsup; $i ++) {
			$enteros [$i] = $i;
		}
		
		if ($masde) {
			$enteros [$i] = "Más de " . ($i - 1);
		}
		
		return $enteros;
	}
	
	static function valorEnumerado($tipoenum, $key) {
		if (count ( $tipoenum ) == 0) {
			return null;
		}
		
		for($i = 1; $i <= count ( $tipoenum ); $i ++) {
			if ($i == $key) {
				return $tipoenum [$i];
			}
		}
		
		return null;
	}
	
	static function tabla2enumerado($tabla, $colvalue = 1, $colid = 0) {
//		dump($tabla);die();
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		foreach ( $tabla as $fila ) {
//			echo "[$colid]---".$fila[$colvalue] . "--<br>";
//			$enumerado [$fila [$colid]] = $fila [$colvalue];
			$enumerado [$fila [$colid]] = utf8_encode($fila [$colvalue]);
		}
		return $enumerado;
	}
	static function tabla2enumeradoSelect($tabla, $colvalue = 1, $colid = 0) {
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		$enumerado [0] = '-Seleccione-';
		foreach ( $tabla as $fila ) {
			//			echo $fila['id_tipo_benef'] . "--<br>";
			$enumerado [$fila [$colid]] = $fila [$colvalue];
		}
		return $enumerado;
	}
	static function tabla2enumeradoSelectUTF8($tabla, $colvalue = 1, $colid = 0) {
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		$enumerado [0] = '-Seleccione-';
		foreach ( $tabla as $fila ) {
			//			echo $fila['id_tipo_benef'] . "--<br>";
//			$enumerado [$fila [$colid]] = $fila [$colvalue];
			$enumerado [$fila [$colid]] = utf8_encode($fila [$colvalue]);
		}
		return $enumerado;
	}
	static function tabla2enumeradoDosCampos($tabla, $colvalue1, $colvalue2, $colid) {
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		foreach ( $tabla as $fila ) {
//						echo utf8_encode($fila[$colvalue2]) . "--<br>";
			$enumerado [$fila [$colid]] = utf8_encode($fila [$colvalue1]) . ' - ' . utf8_encode($fila [$colvalue2]);
		}
		return $enumerado;
	}
	static function tabla2enumeradoDosCamposDosValores($tabla, $colvalue1, $colvalue2, $colid1, $colid2) {
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		foreach ( $tabla as $fila ) {
//						echo utf8_encode($fila[$colvalue2]) . "--<br>";
			$enumerado [$fila [$colid1].':'.$fila [$colid2]] = utf8_encode($fila [$colvalue1]) . ' - ' . utf8_encode($fila [$colvalue2]);
		}
		return $enumerado;
	}
	static function tabla2enumeradoSybase($tabla, $colvalue, $colid) {
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		foreach ( $tabla as $fila ) {
			if (CHARSET != 'utf-8') {
				$enumerado [$fila [$colid]] = utf8_encode ( $fila [$colvalue] );
			} else {
				$enumerado [$fila [$colid]] = $fila [$colvalue];
			}
		}
		return $enumerado;
	}
	static function tabla2enumeradoSybaseDosCampos($tabla, $colvalue1, $colvalue2, $colid) {
		if ($tabla == null) {
			return null;
		}
		$enumerado = array ();
		foreach ( $tabla as $fila ) {
			//			echo $fila['id_tipo_benef'] . "--<br>";
			$enumerado [$fila [$colid]] = $fila [$colvalue1] . ' - ' . $fila [$colvalue2];
		}
		return $enumerado;
	}
}
?>