<?php
// require_once (LIB . 'tcpdf/config/lang/eng.php');
// require_once (LIB . 'tcpdf/tcpdf.php');
require_once (LIB . 'TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
	public $texto1;
	public $texto2;
	
	public $tam_fuente_cab;
	
	static function crearPdf($orientacion = 'P', $tamHoja = 'A4') {
		$pdf = new MYPDF ( $orientacion, PDF_UNIT, $tamHoja, true, 'UTF-8', false );
		$pdf->SetMargins ( PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT );
		$pdf->SetHeaderMargin ( PDF_MARGIN_HEADER );
		//		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetFooterMargin ( 10 );
		//set auto page breaks
		//		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);		
		$pdf->SetAutoPageBreak ( TRUE, 15 );
		return $pdf;
	}
	static function crearPdfCertificado($orientacion = 'P', $tamHoja = 'A4') {
		$pdf = new MYPDF ( $orientacion, PDF_UNIT, $tamHoja, true, 'UTF-8', false );
//		$pdf->SetMargins ( PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT );
		$pdf->SetMargins ( 18, 15, PDF_MARGIN_RIGHT );
		$pdf->SetHeaderMargin ( PDF_MARGIN_HEADER );
		//		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetFooterMargin ( 0 );
		//set auto page breaks
		//		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);		
		$pdf->SetAutoPageBreak ( TRUE, 10 );
		return $pdf;
	}
	function Encabezado() {
//		$this->SetHeaderData ( 'home/'.PDF_HEADER_LOGO, ANCHO_LOGO, PDF_HEADER_TITLE, PDF_HEADER_STRING );
		$this->SetHeaderData ( 'home/' . PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING );
	}	
	function EncabezadoDobleLogo() {
		$this->SetHeaderData ( 'home/'.PDF_HEADER_LOGO_DOBLE, ANCHO_LOGO_HORIZONTAL, PDF_HEADER_TITLE, PDF_HEADER_STRING );
	}	
	public function encabezado_def($tamImagen = 17, $imagen = null, $texto1 = null, $texto2 = null,
	$marg_cab = null, $marg_pie = null, $fuente_cab = null, 
	$tam_fuente_cab = null, $fuente_pie = null, $tam_fuente_pie = null
	) {		
		if ($marg_cab == null)
			$marg_cab = "10";
		if ($marg_pie == null)
			$marg_pie = "13";		
		if ($tam_fuente_cab == null)
			$tam_fuente_cab = "10";
		if ($tam_fuente_pie == null)
			$tam_fuente_pie = "8";
		if ($imagen == null)
			$imagen = PDF_HEADER_LOGO;
		if ($texto1 == null)
			$texto1 = utf8_encode ( L1_REPORTE );
		if ($texto2 == null) {
			$texto2 = utf8_encode ( L2_REPORTE );
		}		
		$this->SetHeaderMargin ( $marg_cab );
		$this->SetFooterMargin ( $marg_pie );
		$this->setHeaderFont ( Array ($fuente_cab, '', $tam_fuente_cab ) );
		$this->setFooterFont ( Array ($fuente_pie, '', $tam_fuente_pie ) );
		
		$imagen = 'home/'.$imagen;
		$this->SetHeaderData ( $imagen, $tamImagen, $texto1, $texto2 );
	}	
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY ( - 25 );
		// Set font
		$this->SetFont ( 'helvetica', 'I', 6 );
//		$url = DOMSEG . DOMINIO . '/verificar';
//		$textoPie = "Para validar por favor dirigirse a $url e ingresar el código de validación";
		$borderTest = 0;
		$textoPie = PIE_PAGINA1;
		$opcionPie = OPCION_PIE;
		switch ($opcionPie) {
			case 1:
				$varImg = '<img width="500px;" src="'.PUB_URLSIST.'img/home/pieModelo.png"/>';
				$varImg .= '<br/>Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages();
				$this->writeHTMLCell(0,10,10,$this->y,$varImg,$borderTest,0,false,true,'C');
//				$this->writeHTMLCell(0,10,10,$this->y,'Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),$borderTest,0,false,true,'C');
//				$this->Cell(0, 30, 'Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
			break;
			
			default:
				$this->Cell(0, 15, 'Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
			break;
		}	
//		if ($textoPie=='') {
//			$this->Cell(0, 10, 'Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
//		}else{
//			$borderTest = 0;			
//			$this->writeHTMLCell(0,10,10,$this->y,$textoPie,$borderTest,0,false,true,'C');			
//			$this->writeHTMLCell(14,10,190,$this->y,'Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),$borderTest);
//		}
	}

	public function procesandoDatos($datos, $campos) {
		$res1 = "";
		$i = 0;
		//		var_dump($datos);
		foreach ( $datos as $ite ) {
			foreach ( $campos as $ite1 ) {
				if ($ite1 != "" and $ite1 != "#") {
					//					echo "$ite1 <br>";
					//					if ($ite1=="codparcela") {
					//						$cad = $datos[$i]['codbloque']."-".$datos[$i]['codsubbloque']."-".$datos[$i]['codsubsubbloque']."-".$datos[$i]['codparcela'];
					//					}else{
					//echo $ite1."<br>";
					$cad = $datos [$i] [$ite1];
					$cad = str_replace("'",'´',$cad);
					//					}
					$res1 = $res1 . "'" . $cad . "'" . ",";
				} else {
					$res1 = $res1 . "'#'" . ",";
				}
			}
			$res1 = $res1 . "|";
			$res1 = str_replace ( ',|', '', $res1 );
//			$res1 = str_replace ( "'", '´', $res1 );
			$cadAux = "\$data[] = array($res1);";
//			$cadAux = addslashes($cadAux);
//			echo "$cadAux <br>";
			eval ( $cadAux );
			$res1 = "";
			$i ++;
		}
		return $data;
	}
	
	// Colored table
	public function llenarTabla($header, $data, $campos, $alineacion, $anchoColumnas, $repetirEncabezado = true, $tamFont = 7, $altoFilas = 3) {
		// Inicio construccion del encabezado de la tabla
		// Colores, ancho de linea y fuente para el encabezado de las tablas
		$this->SetFillColor ( 212, 208, 200 );
		$this->SetTextColor ( 0 );
		$this->SetDrawColor ( 0, 0, 0 );
		$this->SetLineWidth ( 0.3 );
		$this->SetFont ( '', 'B', $tamFont );
				
		$w = $anchoColumnas;
		for($i = 0; $i < count ( $header ); $i ++) {
			if ($header [$i] != "") {
				$headerAux = str_replace ( '<br>', ' ', $header [$i] );
//				$headerAux = utf8_encode ( $headerAux );
				$this->MultiCell ( $w [$i], 3, $headerAux, 1, 'C', 1, 0, '', '', true );
			}
		}
		$this->Ln ();
		// Fin construccion del encabezado de la tabla
		
		// Inicio construccion del cuerpo de la tabla
		// Colores, ancho de linea y fuente para el cuerpo de la tabla
		$this->SetFillColor ( 256, 256, 256 );
		$this->SetTextColor ( 0 );
		$this->SetFont ( '', '', $tamFont );

		$fill = 0;
		$j = 1;
		$nb = 0;
		$cont=1;
		foreach ( $data as $row ) {
			$i = 0;
			$h=4*$nb;
			if ($this->checkPageBreak($h+$tamFont) and $repetirEncabezado) { //Detecta si en la proxima linea va a ocurrir un salto de pagina, 
				//de ser verdadero
				// imprime el encabezado y luego continua con el contenido
				// Colores, ancho de linea y fuente para el encabezado de las tablas
				$this->SetFillColor ( 212, 208, 200 );
				$this->SetTextColor ( 0 );
				$this->SetDrawColor ( 0, 0, 0 );
				$this->SetLineWidth ( 0.3 );
				$this->SetFont ( '', 'B', $tamFont );
						
				$w = $anchoColumnas;
				for($i = 0; $i < count ( $header ); $i ++) {
					if ($header [$i] != "") {
						$headerAux = str_replace ( '<br>', ' ', $header [$i] );
//						$headerAux = utf8_encode ( $headerAux );
						$this->MultiCell ( $w [$i], 3, $headerAux, 1, 'C', 1, 0, '', '', true );
					}
				}
				$this->Ln ();
				$i = 0;		

							// Color and font restoration
				//		$this->SetFillColor(212,208,200);
				$this->SetFillColor ( 256, 256, 256 );
				$this->SetTextColor ( 0 );
				$this->SetFont ( '', '', $tamFont );				
				foreach ( $campos as $ite1 ) {
					if ($ite1 != "" and $ite1 != "#") {
//						$cad = $row [$i];
//						$cad = utf8_encode ( $cad );
						$cad = utf8_encode ($row[$i]); 
						// 					$this->Cell($w[$i], 6, $cad, 'LR', 0, $alineacion[$i], $fill);
						//					$pdf->MultiCell(40, 5, 'A test multicell line 1 test multicell line 2 test multicell line 3', 1, 'L', 1, 0, '', '', true);
						$this->MultiCell ( $w [$i], $altoFilas, $cad, 1, $alineacion [$i], 1, 0, '', '', true );
						$i ++;
					} else {
						$this->MultiCell ( $w [$i], $altoFilas, $j, 1, $alineacion [$i], 1, 0, '', '', true );
						$i ++;
					}
				}				
			}else{

				// Color and font restoration
				//		$this->SetFillColor(212,208,200);
				$this->SetFillColor ( 256, 256, 256 );
				$this->SetTextColor ( 0 );
				$this->SetFont ( '', '', $tamFont );				
				foreach ( $campos as $ite1 ) {
					if ($ite1 != "" and $ite1 != "#") {
//						$cad = $row [$i];
//						$cad = utf8_encode ( $cad );
						$cad = utf8_encode ($row[$i]);
						// 					$this->Cell($w[$i], 6, $cad, 'LR', 0, $alineacion[$i], $fill);
						//					$pdf->MultiCell(40, 5, 'A test multicell line 1 test multicell line 2 test multicell line 3', 1, 'L', 1, 0, '', '', true);
						$this->MultiCell ( $w [$i], $altoFilas, $cad, 1, $alineacion [$i], 1, 0, '', '', true );
						$i ++;
					} else {
						$this->MultiCell ( $w [$i], $altoFilas, $j, 1, $alineacion [$i], 1, 0, '', '', true );
						$i ++;
					}
				}
			}
			$this->Ln ();
			$fill = ! $fill;
			$j ++;
		}
		// Fin construccion del cuerpo de la tabla
		$this->Ln ( 5 );
		$this->Cell ( array_sum ( $w ), 0, '', 'T' );
	}
	public function llenarTablaVertical($header, $data, $campos, $alineacion, $anchoColumnas, $borde = 1) {
		// Colors, line width and bold font
		$this->SetFillColor ( 207, 240, 166 );
		$this->SetTextColor ( 0 );
		$this->SetDrawColor ( 128, 0, 0 );
		$this->SetLineWidth ( 0.3 );
		$this->SetFont ( '', 'B' );
		// Header
		//		$w = array(40, 40, 40, 45);
		$w = $anchoColumnas;
		for($i = 0; $i < count ( $header ); $i ++) {
			if ($header [$i] != "") {
				$this->SetFillColor ( 207, 240, 166 );
				$this->SetTextColor ( 0 );
				$this->SetDrawColor ( 128, 0, 0 );
				$this->SetLineWidth ( 0.3 );
				$this->SetFont ( '', '<b>', 9 );
				//echo $header[$i] . "-- $i --x<br>";
				$headerAux = str_replace ( '<br>', ' ', $header [$i] );
				//				$this->Cell($w[$i], 7, $headerAux, 1, 0, 'C', 1);
				//				$this->MultiCell($w[$i], 6, $cad	  , 1, $alineacion[$i], 1, 0, '', '', true);
				//				$this->MultiCell($w[$i], 7, $headerAux, 1, 'L'			  , 0, 0, '', '', true);
				$this->MultiCell ( 35, 4, $headerAux, $borde, 'L', 0, 0, '', '', true );
			}
			$j = 0;
			$fill = 0;
			foreach ( $data as $row ) {
				$this->SetFillColor ( 224, 235, 255 );
				$this->SetTextColor ( 0 );
				$this->SetLineWidth ( 0.3 );
				$this->SetFont ( 'Helvetica', '', 8.5 );
				//$this->SetFont('');
				foreach ( $campos as $ite1 ) {
					if ($ite1 != "") {
						$cad = $row [$i];
						//							$this->MultiCell($w[$i], 10, $cad, 1, $alineacion[$i], 0, 1, '', '', true);
						$this->MultiCell ( 230, 1, $cad, $borde, $alineacion [$i], 0, 1, '', '', true );
						//$j++;
						break;
					}
				}
				//$this->Ln();
				$fill = ! $fill;
			}
		}
		//		$this->Ln();
		// Color and font restoration
		$this->SetFillColor ( 224, 235, 255 );
		$this->SetTextColor ( 0 );
		$this->SetFont ( '' );
	}
	
	function Salto() {
		$this->Ln ();
	}
	function remplazarParametros($contenido, $datosRemplazo) {
		$contenidoRes = $contenido;
		$i = 0;
		foreach ( $datosRemplazo as $ite ) {
			$contenidoRes = str_replace ( '$parametro' . $i . '$', '<b>' . $ite . '</b>', $contenidoRes );
			$i ++;
		}
		return $contenidoRes;
	}
	function verificarPagNueva($h=0, $tamFont) {
		return $this->checkPageBreak($h+$tamFont);
	}
}
?>