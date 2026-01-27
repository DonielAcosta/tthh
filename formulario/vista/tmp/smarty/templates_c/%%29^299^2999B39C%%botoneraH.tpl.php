<?php /* Smarty version 2.6.30, created on 2021-09-09 01:48:06
         compiled from ../../../app/comun/botoneraH.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns='http://www.w3.org/1999/xhtml'><link rel='stylesheet' type='text/css' href='<?php echo $this->_tpl_vars['PATH_CSS']; ?>
botonera.css'/><!--<?php echo '--><div id="groupBtn" class="btn-group" role="group" aria-label="..."><!--'; ?>
--><?php if ($this->_tpl_vars['opt'] == ''): ?>	<?php if ($this->_tpl_vars['btnNuevo'] == ''): ?>		<?php echo '<!--			<div id=\'ingresar\' name=\'ingresar\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-default glyphicon glyphicon-plus-sign btn-verde" title="Nuevo"></div>-->			<div id=\'ingresar\' name=\'ingresar\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-outline-success my-2 my-sm-0" title="Nuevo">Nuevo</div>		'; ?>

	<?php endif; ?>
	<?php if ($this->_tpl_vars['btnEliminar'] == ''): ?>
		<?php echo '
			<div id=\'eliminar\' onclick="form.opcion.value=this.id;return eliminarSeleccionados(\'\', true);form.submit()" type="button" class="btn btn-default glyphicon glyphicon-trash btn-rojo"></div>
		'; ?>

	<?php endif; ?>
	<?php if ($this->_tpl_vars['urlImp'] != ''): ?>
		<?php echo '
			<div  target=\'_blank\' onclick="xajax_imprimir(xajax.getFormValues(\'form\'),\'\',\'Reporte\');" type="button" class="btn btn-default glyphicon glyphicon-print btn-gris"></div>
		'; ?>

	<?php endif; ?>
	<?php if ($this->_tpl_vars['btnVolver'] == ''): ?>
		<?php echo '
			<div id=\'cancelar\' onclick="window.location=\''; ?>
<?php echo $this->_tpl_vars['URLSIST']; ?>
base/<?php echo 'principal\';" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>				
		'; ?>

	<?php endif; ?>
<?php else: ?>
	<?php if ($this->_tpl_vars['btnNuevo'] == ''): ?>
		<?php if ($this->_tpl_vars['opt'] == 'g'): ?>
			<?php echo '
<!--				<div id=\'guardar\' name=\'guardar\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-default glyphicon glyphicon-floppy-disk btn-verde" title="Guardar"></div>-->
				<div id=\'guardar\' name=\'guardar\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-outline-success my-2 my-sm-0" title="Guardar">Guardar</div>
			'; ?>

		<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['opt'] == 'mr'): ?>
		<?php if ($this->_tpl_vars['btnAct'] == ''): ?>
			<?php echo '
<!--				<div id=\'actualizar\' name=\'actualizar\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-default glyphicon glyphicon-pencil btn-azul" title="Actualizar"></div>-->
				<div id=\'actualizar\' name=\'actualizar\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-outline-success my-2 my-sm-0" title="Actualizar">Actualizar</div>
			'; ?>

		<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['btnVolverPrincipal'] != true): ?>
		<?php if ($this->_tpl_vars['opt'] == 'vr' && $this->_tpl_vars['vntEmerg'] != false): ?>
<!--			<div id='cancelar' onclick="cerrarvntPequena();" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>-->
			<div id='cancelar' onclick="cerrarvntPequena();" type="button" class="btn btn-default">Cancelar2</div>
		<?php else: ?>			
			<div id='cancelar' onclick="window.location='<?php echo $this->_tpl_vars['URLSIST']; ?>
base/<?php echo $this->_tpl_vars['MOD']; ?>
';" type="button" class="btn btn-outline-success my-2 my-sm-0">Cancelar</div>
		<?php endif; ?>	
	<?php else: ?>
		<?php echo '
<!--			<div id=\'cancelar\' onclick="window.location=\''; ?>
<?php echo $this->_tpl_vars['URLSIST']; ?>
base/<?php echo 'principal\';" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>				-->
			<div id=\'cancelar\' onclick="window.location=\''; ?>
<?php echo $this->_tpl_vars['URLSIST']; ?>
base/<?php echo 'principal\';" type="button" class="btn btn-default">Cancelar3</div>				
		'; ?>
	
	<?php endif; ?>
	<?php if ($this->_tpl_vars['urlImp'] != ''): ?>
		<?php echo '
		<div id=\'imprimir\' name=\'imprimir\' onclick=\'form.opcion.value=this.id;if(validarFormulario()){form.submit();}\' type="button" class="btn btn-default glyphicon glyphicon-plus-sign btn-verde" title="Imprimir"></div>
		<div id=\'ingresar\' class="botonera-contenedor" onmouseover="this.className=\'botonera-contenedorActivado\';" onmouseout="this.className=\'botonera-contenedor\';" title="Imprimir">
			<img src="'; ?>
<?php echo $this->_tpl_vars['PUB_URL']; ?>
<?php echo 'img/iconos/imprimir.png" class="botonera-icono a-href">
			Imprimir					
		</div>
		'; ?>

	<?php endif; ?>
<?php endif; ?>
</div>