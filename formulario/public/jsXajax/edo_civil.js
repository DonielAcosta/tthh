function llenarGridEdo_civil(){
	xajax_llenarGridEdo_civil('','','');
}
function xajax_llenarGridEdo_civil(){
	xajax.xajaxRequestUri='../edo_civil/edo_civil.xajax.php';
	return xajax.call('llenarGridEdo_civil', arguments);
}
function llenarGridEdo_civilPag(valor){
	opcion = '';
	campoBusqueda = '';
//	variable = document.getElementById('XXXXX').value;
//	campoBusqueda = variable;
	xajax_llenarGridEdo_civil(opcion,campoBusqueda,valor);
}
