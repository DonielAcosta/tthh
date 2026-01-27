<?php 
require_once('config/config.php');
session_unset();          
session_destroy();
class IndexAction extends Action {	
	function IndexAction(){
		parent::Action();
	}
	function main($session){
		if (isset($session['usuarioid'])) {
			session_destroy();					
		}
		$this->redirect('app/cont/sesion/sesion.php');
	}
}
$action = new IndexAction();
$action->main(@$_SESSION);

?>