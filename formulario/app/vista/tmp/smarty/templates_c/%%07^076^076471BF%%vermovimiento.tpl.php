<?php /* Smarty version 2.6.30, created on 2021-09-19 18:32:39
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/movimiento/vermovimiento.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'C:\\xampp\\htdocs\\condvilla/app/vista/movimiento/vermovimiento.tpl', 36, false),array('modifier', 'date_format', 'C:\\xampp\\htdocs\\condvilla/app/vista/movimiento/vermovimiento.tpl', 64, false),array('modifier', 'number_format', 'C:\\xampp\\htdocs\\condvilla/app/vista/movimiento/vermovimiento.tpl', 72, false),)), $this); ?>
<div class='pagina'>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
 		<div class='container-fluid'>
 				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplError.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 			<div class="row contenidoVer" style="width:100%">
 				<input type='hidden' id='opcion' name='opcion'  value='' readonly>
					<div class="form-group col-md-12" id='resElim' name="resElim"></div>
					<div class="form-group col-md-12">
						<div class="botoneraImp">
							<div id="divImp" style="float: left;">
								<a href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/imprimirComprobante/<?php echo $this->_tpl_vars['idMotivo']; ?>
:<?php echo $this->_tpl_vars['idMovimiento']; ?>
" target="_blank">
									<img src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
img/iconos/imprimir.png" class="imgImp">
								</a>
							</div>
							<div id="divEnv" style="float: left;margin-left:10px;">
								<a href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/enviarComprobante/<?php echo $this->_tpl_vars['idMotivo']; ?>
:<?php echo $this->_tpl_vars['idMovimiento']; ?>
" target="_blank">
									<img src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
img/iconos/solAceptada.png" class="imgEnv">
								</a>
							</div>
							<?php if ($this->_tpl_vars['actElim'] == 1): ?>
							<div id="divEnv" style="float: right;" onClick="alertEliminar();">
								<img src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
img/iconos/eliminar.png" class="imgEnv">
							</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label class="control-label">Usuario</label><br>
						<?php echo $this->_tpl_vars['nomPersona']; ?>
 <?php echo $this->_tpl_vars['apePersona']; ?>

<!--						<?php echo $this->_tpl_vars['NOMBRE_USUARIO']; ?>
-->
					</div>
					<div class="form-group col-md-4">
						<label class="control-label"><span class='label-red'>*</span> Forma de Pago</label>
							<select id='idFormaPago' name='idFormaPago' class='form-control input-sm' disabled>
								<option value=''>-Seleccione-</option>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaFormaPago'],'selected' => $this->_tpl_vars['idFormaPago']), $this);?>

							</select>
					</div>
<!-- 					<div class="form-group col-md-6"> -->
<!-- 						<label class="control-label"><span class='label-red'>*</span> Motivo</label> -->
<!-- 							<div id="divMotivo"> -->
<!-- 							<select id='idMotivoCmb' name='idMotivoCmb' class='form-control input-sm' disabled> -->
<!-- 								<option value=''>-Seleccione-</option> -->
<!-- 								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMotivo'],'selected' => $this->_tpl_vars['idDeuda2']), $this);?>
 -->
<!-- 							</select> -->
<!-- 							</div> -->
<!-- 					</div>				 -->
<!--					<div class="form-group col-md-4">-->
<!--						<label class="control-label">Motivo</label>-->
<!--							<select id='idMotivo' name='idMotivo' class='form-control input-sm' disabled>-->
<!--								<option value=''>-Seleccione-</option>-->
<!--								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMotivo'],'selected' => $this->_tpl_vars['idMotivo']), $this);?>
-->
<!--							</select>-->
<!--					</div>-->
					<div class="form-group col-md-4">
						<label class="control-label">Banco origen</label>
						<select id='idBanco' name='idBanco' class='form-control input-sm'' disabled>
							<option value=''>-Seleccione-</option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaBanco'],'selected' => $this->_tpl_vars['idBanco']), $this);?>

						</select>
					</div>
			        <div class='form-group col-md-4'>
			        	<label class="control-label">Fecha Transacción</label><br>
			        	<?php echo ((is_array($_tmp=$this->_tpl_vars['fecMovimiento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

			        </div>
					<div class="form-group col-md-4">
						<label class="control-label">N° Referencia Transacción</label><br>
						<?php echo $this->_tpl_vars['refMovimiento']; ?>

					</div>
					<div class="form-group col-md-4">
						<label class="control-label">Monto</label><br>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['montoMovimiento'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ',', '.') : number_format($_tmp, 2, ',', '.')); ?>

					</div>
					<div class="form-group col-md-4">
						<label class="control-label">Edo. Depósito / Transferencia</label>
						<select id='idEdoMovimiento' name='idEdoMovimiento' class='form-control input-sm' disabled>
							<option value=''>-Seleccione-</option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoMovimiento'],'selected' => $this->_tpl_vars['idEdoMovimiento']), $this);?>

						</select>
					</div>
					<div class="form-group col-md-4">
						<label class="control-label">Fec. Actualización</label><br>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['fecEdoMovimiento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

					</div>
					<div class="form-group col-md-4">
						<label class="control-label">Mes o meses que se están pagando</label><br>
						<?php echo $this->_tpl_vars['obsMovimiento']; ?>

					</div>
<!-- 					<div class="form-group col-md-4"> -->
<!-- 						<label class="control-label">Capture</label><br> -->
<!-- 						<?php if ($this->_tpl_vars['captureMovimiento'] == ''): ?> -->
<!-- 							<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/sinCapture.png" class="imgCapture"> -->
<!-- 						<?php else: ?> -->
<!-- 							<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
upload/<?php echo $this->_tpl_vars['captureMovimiento']; ?>
" class="imgCapture"> -->
<!-- 						<?php endif; ?>						 -->
<!-- 					</div> -->
					
			<input type='hidden' id='opt' name='opt' value='<?php echo $this->_tpl_vars['opt']; ?>
' readonly/>
			<input type='hidden' id='idMovimiento' name='idMovimiento' value='<?php echo $this->_tpl_vars['idMovimiento']; ?>
' readonly/>
			<input id='ids' name='ids' type='hidden' value='' readonly/>
			
			<input id='idTipoMovimiento' name='idTipoMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idTipoMovimiento']; ?>
' readonly>
			<input id='idEdoMovimiento' name='idEdoMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idEdoMovimiento']; ?>
' readonly>
			<input id='idUsuarioVer' name='idUsuarioVer' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idUsuario']; ?>
' readonly>
			</div>
		</div>	
	</form>
</div>
<script type="text/javascript">xajax_consultarDeudasXidUsuario(<?php echo $this->_tpl_vars['idUsuario']; ?>
,'<?php echo $this->_tpl_vars['idDeuda2']; ?>
');</script>
<?php echo '
<script>
	//Funcion encargada de eliminar un registro via AJAX
	function eliminarRegistro(){			
				var idMovimiento = document.getElementById("idMovimiento").value;
				var idUsuario = document.getElementById("idUsuarioVer").value;
				//alert("En eliminar con idMovimiento: "+idMovimiento+\' [\'+idUsuario+\']\');	
				var data = new FormData();
				data.append(\'idMovimiento\',idMovimiento);
				data.append(\'idUsuario\',idUsuario);
					//url: dominioJS+"app/cont/movimiento/listarmovimiento.php",        // Url to which the request is send
				jQuery.ajax({
					url: dominioJS+"base/movimiento/eliminarMovimiento",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(res)   // A function to be called if request succeeds
					{
						if(res){
							mensaje = \'El Registro se eliminó correctamente.\';
							xajax_llenarGridMovimientoGeneral(idUsuario,\'\');
							jQuery("#imagen").html(mensaje);
						}else{
							mensaje = \'Error al eliminar\';
							jQuery("#resElim").html(mensaje);
						}
						
						alert(mensaje);
					}
				});				
	}

function alertEliminar()
    {
    var mensaje;
    var opcion = confirm("¿Seguro que desea eliminar este registro?");
    if (opcion == true) {
        mensaje = "¿Seguro que desea eliminar este registro?";
        eliminarRegistro();
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	//document.getElementById("ejemplo").innerHTML = mensaje;
	//alert(mensaje)
}	
</script>
'; ?>