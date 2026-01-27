<?php /* Smarty version 2.6.30, created on 2021-09-19 18:25:20
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/reporte/repMovimiento.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'C:\\xampp\\htdocs\\condvilla/app/vista/reporte/repMovimiento.tpl', 20, false),)), $this); ?>
<div class='pagina'>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
		<a id='ancla' href='#'></a>
		<div class='line-title'>
			<h4>Listado de Reportes</h4>
		</div>		
		<div id='errores'>
			<?php if ($this->_tpl_vars['error'] != ''): ?><div id='msg-error' class='msg-red'><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
			<?php if ($this->_tpl_vars['exito'] != ''): ?><div id='msg-exito' class='msg-green'><?php echo $this->_tpl_vars['exito']; ?>
</div><?php endif; ?> 
			<?php if ($this->_tpl_vars['info'] != ''): ?><div id='msg-info' class='msg-blue'><?php echo $this->_tpl_vars['info']; ?>
</div><?php endif; ?>
		</div>	
		<fieldset>
			<br>
			<center>
				<div class="container-fluid">
					<div class="col-lg-6">
<!--						Reporte de pagos por validar -->
<!--						<select id='idMotivo' name='idMotivo' class='form-control input-sm'>-->
<!--							<option value=''>-Seleccione-</option>-->
<!--							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMotivo']), $this);?>
-->
<!--						</select>-->
<!--						<br>-->
<!--						<button type="button" class="btn btn-primary" onclick="xajax_generarReporte(xajax.getFormValues('form'));">Generar</button>-->
<!--						<br><br>-->
						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/imprimirMov"><h3>Pagos Pendientes por Validar</h3></a>
						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/pagosMes"><h3>Pagos del Mes</h3></a>
<!-- 						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/tablaResumen"><h3>Tabla Resumen</h3></a> -->
<!-- 						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/tablaResumenFull"><h3>Tabla Resumen (Actualizando los registros)</h3></a> -->
						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/tablaResumenFull/2021"><h3>Tabla Resumen 2021</h3></a>
						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/tablaResumenFullFalt/2021"><h3>Tabla Resumen (Pagos Pendientes 2021)</h3></a>
						<br><br>
						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/tablaResumenFull/2020"><h3>Tabla Resumen 2020</h3></a>
						<a id="enlace" name="enlace" target="_blank" href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/tablaResumenFullFalt/2020"><h3>Tabla Resumen (Pagos Pendientes 2020)</h3></a>
					</div>
				</div>
			</center>
    	</fieldset>
	</form>
</div>