<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns='http://www.w3.org/1999/xhtml'><link rel='stylesheet' type='text/css' href='{$PATH_CSS}botonera.css'/><!--{literal}--><div id="groupBtn" class="btn-group" role="group" aria-label="..."><!--{/literal}-->{if $opt eq ''}	{if $btnNuevo == ''}		{literal}<!--			<div id='ingresar' name='ingresar' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-default glyphicon glyphicon-plus-sign btn-verde" title="Nuevo"></div>-->			<div id='ingresar' name='ingresar' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-outline-success my-2 my-sm-0" title="Nuevo">Nuevo</div>		{/literal}
	{/if}
	{if $btnEliminar == ''}
		{literal}
			<div id='eliminar' onclick="form.opcion.value=this.id;return eliminarSeleccionados('', true);form.submit()" type="button" class="btn btn-default glyphicon glyphicon-trash btn-rojo"></div>
		{/literal}
	{/if}
	{if $urlImp != ''}
		{literal}
			<div  target='_blank' onclick="xajax_imprimir(xajax.getFormValues('form'),'','Reporte');" type="button" class="btn btn-default glyphicon glyphicon-print btn-gris"></div>
		{/literal}
	{/if}
	{if $btnVolver == ''}
		{literal}
			<div id='cancelar' onclick="window.location='{/literal}{$URLSIST}base/{literal}principal';" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>				
		{/literal}
	{/if}
{else}
	{if $btnNuevo == ''}
		{if $opt eq 'g'}
			{literal}
<!--				<div id='guardar' name='guardar' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-default glyphicon glyphicon-floppy-disk btn-verde" title="Guardar"></div>-->
				<div id='guardar' name='guardar' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-outline-success my-2 my-sm-0" title="Guardar">Guardar</div>
			{/literal}
		{/if}
	{/if}
	{if $opt eq 'mr'}
		{if $btnAct == ''}
			{literal}
<!--				<div id='actualizar' name='actualizar' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-default glyphicon glyphicon-pencil btn-azul" title="Actualizar"></div>-->
				<div id='actualizar' name='actualizar' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-outline-success my-2 my-sm-0" title="Actualizar">Actualizar</div>
			{/literal}
		{/if}
	{/if}
	{if $btnVolverPrincipal != true}
		{if $opt eq 'vr' and $vntEmerg != false}
<!--			<div id='cancelar' onclick="cerrarvntPequena();" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>-->
			<div id='cancelar' onclick="cerrarvntPequena();" type="button" class="btn btn-default">Cancelar2</div>
		{else}			
			<div id='cancelar' onclick="window.location='{$URLSIST}base/{$MOD}';" type="button" class="btn btn-outline-success my-2 my-sm-0">Cancelar</div>
		{/if}	
	{else}
		{literal}
<!--			<div id='cancelar' onclick="window.location='{/literal}{$URLSIST}base/{literal}principal';" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>				-->
			<div id='cancelar' onclick="window.location='{/literal}{$URLSIST}base/{literal}principal';" type="button" class="btn btn-default">Cancelar3</div>				
		{/literal}	
	{/if}
	{if $urlImp != ''}
		{literal}
		<div id='imprimir' name='imprimir' onclick='form.opcion.value=this.id;if(validarFormulario()){form.submit();}' type="button" class="btn btn-default glyphicon glyphicon-plus-sign btn-verde" title="Imprimir"></div>
		<div id='ingresar' class="botonera-contenedor" onmouseover="this.className='botonera-contenedorActivado';" onmouseout="this.className='botonera-contenedor';" title="Imprimir">
			<img src="{/literal}{$PUB_URL}{literal}img/iconos/imprimir.png" class="botonera-icono a-href">
			Imprimir					
		</div>
		{/literal}
	{/if}
{/if}
</div>