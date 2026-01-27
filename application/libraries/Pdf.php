<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

// Incluimos el archivo tcpdf
require "vendor/autoload.php";

// Extendemos la clase TCPDF
class Pdf extends TCPDF 
{
	// se debe imprimir el pie de la hoja?
	public $imprimir_pie = TRUE;

	// pie del pdf
	private $_pie;

	// constructor
	public function __construct()
	{
		parent::__construct();
		$this->header_margin = 10;
		$this->setCreator('Sistema para el Control de Talento Humano');
		$this->setAuthor('Carlos Iturralde <iturraldec@gmail.com>');
		$this->_pie = 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages();
	}

	// header
	public function Header()
	{
        $html = '<table align="center"><tr>
    		<td><img src="'.base_url('img/escudo.png').'" height="60" width="60"></td>
    		<td><b><font size="8">GOBERNACION DEL ESTADO BOLIVARIANO <br>DE MERIDA <br>DIRECCION DEL PODER POPULAR <br>DE RECURSOS HUMANOS</font></b></td>
    		<td><img src="'.base_url('img/logo03.jpg').'" height="80" width="80"></td>
        	</tr></table>';
        $this->writeHTML($html, true, false, false, false, 'C');
	}

    // Page footer
    public function Footer() 
    {		
		if ($this->imprimir_pie) {
			$this->SetY(-10);
			$this->SetFont('times', 'B', 8);
			$this->MultiCell(195, 0, $this->_pie, 0, 'C', 0, 0, '', '', true);
		}
    }

    /**
    * Establecer el "pie" del pdf.
    *
    * @access       public
    * @param 		string 	pie del pdf
    * @autor        Carlos Iturralde <iturraldec@gmail.com>
    * @version      22/01/2019
    */

    public function set_footer($cadena = '')
    {
    	$this->_pie = $cadena;
    }
    ///////////////////////// FIN DE: set_footer //////////////////////

}

// fin del archivo Pdf.php
// path: application/libraries
