<?php
	include 'Smalot/PdfParser/Config.php';
	include 'Smalot/PdfParser/Parser.php';
	include 'Smalot/PdfParser/RawData/RawDataParser.php';
	include 'Smalot/PdfParser/RawData/FilterHelper.php';
	include 'Smalot/PdfParser/Document.php';
	include 'Smalot/PdfParser/PDFObject.php';
	include 'Smalot/PdfParser/Element.php';
	include 'Smalot/PdfParser/Font.php';
	include 'Smalot/PdfParser/Pages.php';
	include 'Smalot/PdfParser/Page.php';
	include 'Smalot/PdfParser/XObject/Form.php';
	include 'Smalot/PdfParser/Element/ElementXRef.php';
	include 'Smalot/PdfParser/Element/ElementName.php';
	include 'Smalot/PdfParser/Element/ElementNumeric.php';
	include 'Smalot/PdfParser/Element/ElementArray.php';
	include 'Smalot/PdfParser/Element/ElementString.php';
	include 'Smalot/PdfParser/Element/ElementDate.php';
	include 'Smalot/PdfParser/Element/ElementMissing.php';
	include 'Smalot/PdfParser/Header.php';
	// include 'Smalot/PdfParser/Encodingr.php';
	include 'Smalot/PdfParser/Encoding.php';
	
	require_once('fpdf/fpdf.php');
	require_once('fpdf/fpdi.php');
// 	require('fpdf/PdfParser.php');
	
    set_time_limit(300);

	function leer_pdf($filename){
		$parser = new PdfParser();
// 		$parser = new \Smalot\PdfParser\Parser();
		$pdf  = $parser->parseFile($filename);	
		return $pdf;
	}

	function leer_dni($archivo){
// 	    echo "+++++++++++ [$archivo] <br>";

	    $parser = new \Smalot\PdfParser\Parser();
	    $pdf    = $parser->parseFile($archivo);
	    
	    // Recupere todas las páginas del archivo pdf.
	    $pages  = $pdf->getPages();
	    
	    // Recupere el número de páginas contando la matriz
	    $totalPages = count($pages);
	    
// 	    $customPageNumber = $hoja-1;
	    $customPageNumber = 0;
	    
	    // Si la página existe, extraiga el texto
	    // Como cada matriz comienza con 0, agregue +1´
	    //     if(isset($pages[$customPageNumber + 1])){
	    if(isset($pages[$customPageNumber])){
	        // Como cada matriz comienza con 0, agregue +1
	        //         $pageNumberTwo = $pdf->getPages()[$customPageNumber + 1];
	        $pageNumberTwo = $pdf->getPages()[$customPageNumber];	        
	        // Extrae el texto de la página # 2
	        $text = $pageNumberTwo->getText();
	        
	        $posIni =  strpos($text,'Cédula');
	        $posFin =  strpos($text,'Banco');
	        $tam = $posFin - $posIni;	        
	        $cadAux = substr($text, $posIni, $tam);
	        $cadAux = substr($cadAux, 45,8);
	        
// 	        echo "--- [$totalPages] ($posIni, $posFin, $tam) [$cadAux] <br>";
	        
	        
	    }else{
	        //         echo "Lo sentimos, la página # $customPageNumber no existe";
	        $cadAux = "Lo sentimos, la página # $customPageNumber no existe";
	    }
	    return $cadAux;
	}

	function renombrar_fichero($ruta,$new_filename,$dni){
// 		$nuevo = substr($new_filename, 0, strlen($new_filename)-5).$dni.".pdf";
		$nuevo = 'rec_'.$dni.".pdf";
		rename($ruta.$new_filename, $ruta.$nuevo);
		return $nuevo; 
	}

	 function leer_nombre($pdf,$inicio,$fin){
                $r = explode($inicio, $pdf);	   
                if (isset($r[1])){
                    $r = explode($fin, $r[1]);
                    return $r[0];
                }
                return '';
	}

//         $filename="NOMINASENERO.pdf";
//         $filename="constanciaTest.pdf";
//         $filename = "ConstanciasTrabajoGob.pdf";
//         $filenameSource = "constancias/ConstanciasTrabajoGob.pdf"; 

	
// 	$filename = "MI_1.pdf";
// 	$nomCarpeta = 'doc_con';
// 	$filename = "DE_1.pdf";
// 	$nomCarpeta = 'doc_fij';
// 	$filename = "2DAQUINCENA.pdf";
// 	$nomCarpeta = 'emp_con';
// 	$filename = "1RAQUINCENA.pdf";
// 	$nomCarpeta = 'emp_fij';
// 	$filename = "JB.pdf";
// 	$nomCarpeta = 'jub_bom';
// 	$filename = "JM.pdf";
// 	$nomCarpeta = 'jub_doc';
// 	$filename = "JE.pdf";
// 	$nomCarpeta = 'jub_emp';
	$filename = "JH.pdf";
	$nomCarpeta = 'jub_hos';
// 	$filename = "JE_MED.pdf";
// 	$nomCarpeta = 'jub_med_mus';
// 	$filename = "JA.pdf";
// 	$nomCarpeta = 'jub_obr';
// 	$filename = "JP.pdf";
// 	$nomCarpeta = 'jub_pol';
// 	$filename = "JA_SINTRA.pdf";
// 	$nomCarpeta = 'jub_sim';
// 	$filenameSource = "constancias/09/1q/$nomCarpeta/$filename";
// 	$filename = "JO.pdf";
// 	$nomCarpeta = 'jub_sin_con';
// 	$filename = "JU.pdf";
// 	$nomCarpeta = 'jub_suo';
// 	$filename = "JU_CLAU-40.pdf";
// 	$nomCarpeta = 'jub_suo40';
// 	$filename = "BEDELES.pdf";
// 	$nomCarpeta = 'obr_con';
// 	$filename = "FIJOS.pdf";
// 	$nomCarpeta = 'obr_fij';
// 	$filename = "PE.pdf";
// 	$nomCarpeta = 'pen_esp';
// 	$filename = "PG.pdf";
// 	$nomCarpeta = 'pen_gra';
// 	$filename = "PS.pdf";
// 	$nomCarpeta = 'pen_sob';
// 	$filename = "SUPLENCIAS.pdf";
// 	$nomCarpeta = 'sub_obr';
	
	
	$filenameSource = "constancias/11/2q/$nomCarpeta/$filename";
	$ruta = "11/2q/$nomCarpeta/";
	
        echo "Inicio: " . date('H:m:s') . "[$filenameSource]<br>"; 
	$pdf = new FPDI();
	$pagecount = $pdf->setSourceFile($filenameSource); // How many pages?

	// Split each page into a new PDF     

	
	$valIni = 1;
	$pagecount = 639;
// 	$valIni = 995;
// 	$pagecount = 1730;
	for ($i = $valIni; $i <= $pagecount; $i++) {
		///dividmos pdf en 1 hoja
		$new_pdf = new FPDI();
		$new_pdf->AddPage();
		$new_pdf->setSourceFile($filenameSource);
		$new_pdf->useTemplate($new_pdf->importPage($i));
		
		try {
// 			$new_filename = $end_directory.str_replace('.pdf', '', $filename).'_'.$i.".pdf"; 
			$new_filename = str_replace('.pdf', '', $filename).'_'.$i.".pdf";
			$new_pdf->Output('constancias/'.$ruta.$new_filename, "F");
// 			echo "Page ".$i." split into ".$new_filename."<br />\n";
			

// 			$pdf = leer_pdf($new_filename);
// 			$dni = leer_dni($pdf,$i);
			$dni = leer_dni('constancias/'.$ruta.$new_filename);
// 			$nombre = leer_nombre($pdf,'Treballador/a','NIF');
			$nuevo = renombrar_fichero('constancias/'.$ruta,$new_filename,$dni);


// 			echo " DNI: ".$dni." Archivo:".$nuevo."<br />\n";
			

// 			if ($i==5) {
// 			    break;
// 			}

		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

	}
	echo " - Fin: " . date('H:m:s') . " procesando de $valIni a $i";
	
	//echo "<script language='javascript'>window.location='errores_envio.php'</script>";
	
// Create and check permissions on end directory!

?>