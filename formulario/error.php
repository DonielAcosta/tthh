<?php
require_once('config/config.php');
/*
session_unset();          
session_destroy();
*/
if (CONSEGURA==1) {
	$domSeg = 'https';
}else{
	$domSeg = 'http';
}
//$url = $domSeg.'//'.DOMINIO.'/'.NOMSIST; 
$url = DOMINIO.'/'.NOMSIST; 
?>
<H1>
	ACCESO RESTRINGIDO
</H1>
<br><br>
Pulse
<?php
if (CONSEGURA==1) {
	?> 
	<a href='https://<?php echo $url?>'>
	<?php
}else{
	?> 
	<a href='http://<?php echo $url?>'>
	<?php
}
?> 
aquí
</a>
para loguearse en el sistema