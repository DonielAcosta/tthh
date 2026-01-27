<?php
require_once ('../../../config/config.php');

class principalPrincipal extends Controller
{

    private $opt;

    function principalPrincipal()
    {
        parent::__construct();
        $this->campos = 'nombrespersona,apellidospersona,cedulapersona,direccionpersona,generopersona,correopersona,telefonopersona,movilpersona,idpersona';
        $this->modelo = 'persona';
        $this->modulo = 'Persona';
        $this->setParameterPath('etiquetaPaciente', ' ');
        $this->setParameterPath('activarExamenes', false);
        $this->setTemplateDir(TEMPLATE);
        $this->asignarConstantes();
        $this->setParameterPath('desactivarOpciones', true);
    }

    function listar($request, $session)
    {
        $pagina = 'principal.tpl';
        if ($_SESSION['rolId'] == 1) {
            $pagina = 'principalAdmin.tpl';
        }
        $this->setParameterPath('activarExamenes', false);
        $this->setParameter('etiquetaModulo', 'Bienvenido');
        $this->ver($pagina);
    }

    function cancelar($request, $session)
    {
        $this->listar($request, $session);
    }

    function home($request, $session)
    {
        $this->verEditar('../principal/principal.php');
    }

//     function ver($pagina)
//     {
//         $this->visualizar('principal/' . $pagina);
//     }
    function ver($pagina, $formatoImpresion = false) {
        if ($formatoImpresion) {
            $this->setTemplateDir ( VISTA . 'principal/' );
            $this->goForward ( $pagina );
        } else {
            $this->visualizar ( 'principal/' . $pagina );
        }
    }

    function infoPago()
    {
//         echo "aca";die();
//         $pagina = 'infoPago.tpl';
//         $this->ver($pagina, TRUE);
        $this->ver ( 'infoPago.tpl', TRUE );
    }
}
?>