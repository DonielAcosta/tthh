<?php
 
// Include Composer autoloader if not already done.
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
include 'Smalot/PdfParser/Element/ElementXRef.php';
include 'Smalot/PdfParser/Element/ElementName.php';
include 'Smalot/PdfParser/Element/ElementNumeric.php';
include 'Smalot/PdfParser/Element/ElementArray.php';
include 'Smalot/PdfParser/Element/ElementString.php';
include 'Smalot/PdfParser/Element/ElementDate.php';
include 'Smalot/PdfParser/Element/ElementMissing.php';
include 'Smalot/PdfParser/Header.php';
 
/*
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('constancias/constanciaTest.pdf');
// $pdf    = $parser->parseFile('constancias/ConstanciasTrabajoGob.pdf');
 
// Recupere todas las páginas del archivo pdf.
$pages  = $pdf->getPages();

// Recupere el número de páginas contando la matriz
$totalPages = count($pages);

$customPageNumber = 1;

    if(isset($pages[$customPageNumber + 1])){
       
        // Como cada matriz comienza con 0, agregue +1
        $pageNumberTwo = $pdf->getPages()[$customPageNumber + 1];
        
        // Extrae el texto de la página # 2
        $text = $pageNumberTwo->getText();
        
        // Envía el texto como respuesta en el controlador.
        echo ($text);
        
        $posIni =  strpos($text,'Cédula');
        $posFin =  strpos($text,'Banco');
        $tam = $posFin - $posIni;
        
        $cadAux = substr($text, $posIni, $tam);
        $cadAux = substr($cadAux, 45,8);
        
        echo "--- [$totalPages] ($posIni, $posFin, $tam) [$cadAux] <br>";
        
        
    }else{
        echo "Lo sentimos, la página # $customPageNumber no existe";
    }
*/


// $text = $pdf->getText();
// echo $text;

// $res = fromFile($pdf);
// var_dump($res);


function split_pdf($filename, $mes, $dir = false) {
    require_once('fpdf/fpdf.php');
    require_once('fpdf/fpdi.php');
    
    $dir = $dir ? $dir : './';
    $filename = $dir.$filename;
    $pdf = new FPDI();
    $pagecount = $pdf->setSourceFile($dir.$filename);
    echo "pagecount : $pagecount <br>";
//     $i = 1;
    // Split each page into a new PDF
    for ($i = 1; $i <= $pagecount; $i++) {
        $new_pdf = new FPDI();
        $new_pdf->AddPage();
        $new_pdf->setSourceFile($filename);
        $contenido = $new_pdf->useTemplate($new_pdf->importPage($i));
        
//         $contenido2 = $new_pdf->importPage($i);
        
        echo "<br><br>ini----".
        $new_pdf->currentParser->getContent()
        ."---fin<br><br>";
        
        $nombre = buscarNombre($filename,$i);
        echo "creando [$nombre] pag = [$i]<br>";
        try {
//             $new_filename = $dir.str_replace('.pdf','', $filename).'_'.$i.".pdf";
            $new_filename = 'constancias/'.$mes.'/'.$nombre.".pdf";
            $new_pdf->Output($new_filename, "F");
//             echo "Page ".$i." split into ".$new_filename."<br />\n";
//             echo "Contenido ".var_dump($contenido)."<br />\n";
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
function buscarNombre($archivo,$hoja){
    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile($archivo);
    // $pdf    = $parser->parseFile('constancias/ConstanciasTrabajoGob.pdf');
    
    // Recupere todas las páginas del archivo pdf.
    $pages  = $pdf->getPages();
    
    // Recupere el número de páginas contando la matriz
    $totalPages = count($pages);
    
    $customPageNumber = $hoja-1;
    
    // Si la página existe, extraiga el texto
    // Como cada matriz comienza con 0, agregue +1´
//     if(isset($pages[$customPageNumber + 1])){        
    if(isset($pages[$customPageNumber])){        
        // Como cada matriz comienza con 0, agregue +1
//         $pageNumberTwo = $pdf->getPages()[$customPageNumber + 1];
        $pageNumberTwo = $pdf->getPages()[$customPageNumber];
        
        // Extrae el texto de la página # 2
        $text = $pageNumberTwo->getText();
        
        // Envía el texto como respuesta en el controlador.
        echo ($text);
        
        $posIni =  strpos($text,'Cédula');
        $posFin =  strpos($text,'Banco');
        $tam = $posFin - $posIni;
        
        $cadAux = substr($text, $posIni, $tam);
        $cadAux = substr($cadAux, 45,8);
        
        echo "--- [$totalPages] ($posIni, $posFin, $tam) [$cadAux] <br>";
        
        
    }else{
//         echo "Lo sentimos, la página # $customPageNumber no existe";
        $cadAux = "Lo sentimos, la página # $customPageNumber no existe";
    }
    return $cadAux;
}
function buscarNombre2($archivo,$hoja){
    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile($archivo);
    // $pdf    = $parser->parseFile('constancias/ConstanciasTrabajoGob.pdf');
    
    // Recupere todas las páginas del archivo pdf.
    $pages  = $pdf->getPages();
    
    // Recupere el número de páginas contando la matriz
    $totalPages = count($pages);
    
    $customPageNumber = $hoja-1;
    
    // Si la página existe, extraiga el texto
    // Como cada matriz comienza con 0, agregue +1´
//     if(isset($pages[$customPageNumber + 1])){        
    if(isset($pages[$customPageNumber])){        
        // Como cada matriz comienza con 0, agregue +1
//         $pageNumberTwo = $pdf->getPages()[$customPageNumber + 1];
        $pageNumberTwo = $pdf->getPages()[$customPageNumber];
        
        // Extrae el texto de la página # 2
        $text = $pageNumberTwo->getText();
        
        // Envía el texto como respuesta en el controlador.
        echo ($text);
        
        $posIni =  strpos($text,'Cédula');
        $posFin =  strpos($text,'Banco');
        $tam = $posFin - $posIni;
        
        $cadAux = substr($text, $posIni, $tam);
        $cadAux = substr($cadAux, 45,8);
        
        echo "--- [$totalPages] ($posIni, $posFin, $tam) [$cadAux] <br>";
        
        
    }else{
//         echo "Lo sentimos, la página # $customPageNumber no existe";
        $cadAux = "Lo sentimos, la página # $customPageNumber no existe";
    }
    return $cadAux;
}
// // split_pdf("ficheros/espai_unity.pdf");
split_pdf("constancias/constanciaTest.pdf", '06');
// split_pdf("constancias/ConstanciasTrabajoGob.pdf",'06');
?>