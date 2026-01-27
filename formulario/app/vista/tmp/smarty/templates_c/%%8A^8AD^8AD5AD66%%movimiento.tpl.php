<?php /* Smarty version 2.6.30, created on 2021-09-09 01:48:15
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/movimiento/movimiento.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'C:\\xampp\\htdocs\\condvilla/app/vista/movimiento/movimiento.tpl', 34, false),array('modifier', 'date_format', 'C:\\xampp\\htdocs\\condvilla/app/vista/movimiento/movimiento.tpl', 48, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
//validar(\'idMovimiento\',\'idMovimiento\',REQUERIDO);
validar(\'idFormaPago\',\'Forma de Pago\',REQUERIDO);
validar(\'idTipoMovimiento\',\'Tipo Movimiento\',REQUERIDO);
<!--validar(\'idDeuda\',\'Motivo\',REQUERIDO);-->
validar(\'idEdoMovimiento\',\'Edo. Movimiento\',REQUERIDO);
validar(\'idBanco\',\'Banco\',REQUERIDO);
//validar(\'idUsuario\',\'Usuario\',REQUERIDO);
validar(\'fecMovimiento\',\'Fecha Depósito / Transferencia\',REQUERIDO);
validar(\'refMovimiento\',\'N° de Referencia\',REQUERIDO);
validar(\'montoMovimiento\',\'Monto Movimiento\',REQUERIDO);
//validar(\'captureMovimiento\',\'Capture\',REQUERIDO);
//validar(\'obsMovimiento\',\'obsMovimiento\',REQUERIDO);
//validar(\'fecEdoMovimiento\',\'Fecha Edo. Movimiento\',REQUERIDO);
</script>
'; ?>

<div class='pagina'>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
		<div class='line-title'>
			<h4><?php if ($this->_tpl_vars['opt'] == 'g'): ?> Agregar <?php elseif ($this->_tpl_vars['opt'] == 'm' || $this->_tpl_vars['opt'] == 'mr'): ?> Modificar <?php endif; ?> Depósito / Transferencia</h4>
		</div>
		<a id='ancla' href='#'></a>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplError.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 		<div class='container-fluid'>
 			<p class='p-black'>Los campos marcados con <span class='label-red'>*</span> son obligatorios</p>
 			<div class="row contenidoVer" style="width:100%">
 				<input type='hidden' id='opcion' name='opcion'  value='' readonly>
					<div class="form-group col-md-6">
						<label class="control-label"><span class='label-red'>*</span> Usuario</label><br>
						<!-- <select id='idUsuario' name='idUsuario' class='form-control input-sm' onChange="xajax_consultarDeudasXidUsuario(this.value);"> -->
						<select id='idUsuario' name='idUsuario' class='form-control input-sm'>
							<option value=''>-Seleccione-</option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaUsuario'],'selected' => $this->_tpl_vars['idUsuario']), $this);?>

						</select>
					</div>
					<div class="form-group col-md-3">
						<label class="control-label"><span class='label-red'>*</span> Forma de Pago</label>
							<select id='idFormaPago' name='idFormaPago' class='form-control input-sm'>
								<option value=''>-Seleccione-</option>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaFormaPago'],'selected' => $this->_tpl_vars['idFormaPago']), $this);?>

							</select>
					</div>
			        <div class='form-group col-sm-3'>
			        	<label class="control-label">Fecha del Pago</label>
			                <div class='input-group date' id='datetimepicker1'>
<!--			                    <input type='text' class="form-control" />-->
			                    <input id='fecMovimiento' name='fecMovimiento' class='form-control input-sm' type='text' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['fecMovimiento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
'>
			                    <span class="input-group-addon">
			                    	<span class='icono'>
			                    		<img width="25px;" class='cursor' id='fecMovimiento' name="fecMovimiento" src='<?php echo $this->_tpl_vars['PUB_URL']; ?>
img/iconos/calendario.gif' align='top'>
			                    	</span>
<!--			                        <span class="glyphicon glyphicon-calendar"></span>-->
			                    </span>
			                </div>
			        </div>
					<div class="form-group col-md-6">
						<label class="control-label"><span class='label-red'>*</span> Banco origen</label>
						<select id='idBanco' name='idBanco' class='form-control input-sm'>
							<option value=''>-Seleccione-</option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaBanco'],'selected' => $this->_tpl_vars['idBanco']), $this);?>

						</select>
					</div>
					<div class="form-group col-md-3">
						<label class="control-label"><span class='label-red'>*</span> N° Ref. del Depósito / Transf.</label>
						<input id='refMovimiento' name='refMovimiento' class='form-control input-sm' type='text' value='<?php echo $this->_tpl_vars['refMovimiento']; ?>
'>
					</div>
					<div class="form-group col-md-3">
						<label class="control-label"><span class='label-red'>*</span> Monto Pago</label>
						<input id='montoMovimiento' name='montoMovimiento' class='form-control input-sm' type='text' value='<?php echo $this->_tpl_vars['montoMovimiento']; ?>
'>
					</div>
<!-- 					<div class="form-group col-md-6"> -->
<!-- 						<label class="control-label">Tipo Movimiento</label> -->
<!-- 						<select id='idTipoMovimiento' name='idTipoMovimiento' class='form-control input-sm'> -->
<!-- 							<option value=''>-Seleccione-</option> -->
<!-- 							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaTipoMovimiento'],'selected' => $this->_tpl_vars['idTipoMovimiento']), $this);?>
 -->
<!-- 						</select> -->
<!-- 					</div> -->
<!-- 					<div class="form-group col-md-6"> -->
<!-- 						<label class="control-label"><span class='label-red'>*</span> Motivo</label> -->
<!-- 							<div id="divMotivo"> -->
<!-- 							<select id='idMotivoCmb' name='idMotivoCmb' class='form-control input-sm'> -->
<!-- 								<option value=''>-Seleccione-</option> -->
<!-- 								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMotivo'],'selected' => $this->_tpl_vars['idMotivoCmb']), $this);?>
 -->
<!-- 							</select> -->
<!-- 							</div> -->
<!-- 					</div> -->
			        <?php echo '
			        <script type="text/javascript">
			            jQuery(function () {
			            	jQuery(\'#datetimepicker1\').datetimepicker({
			            		format: \'DD-MM-YYYY\'
			            	}).on(\'changeDate\', function(e){
			            	    $(this).datepicker(\'hide\');
			            	});
			            });
			        </script>
			        '; ?>

<!-- 					<div class="form-group col-md-3"> -->
<!-- 						<label class="control-label"><span class='label-red'>*</span> Monto Deuda</label> -->
<!-- 						<input id='saldoDeuda' name='saldoDeuda' class='form-control input-sm' type='text' value='<?php echo $this->_tpl_vars['saldoDeuda']; ?>
' readonly> -->
<!-- 						<input type='hidden' id='idDeuda' name='idDeuda' value='<?php echo $this->_tpl_vars['idDeuda']; ?>
' readonly/> -->
<!-- 					</div> -->
					<div class="form-group col-md-6">
						<label class="control-label">Edo. Depósito / Transferencia
						</label>
						<select id='idEdoMovimiento' name='idEdoMovimiento' class='form-control input-sm'>
							<option value=''>-Seleccione-</option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoMovimiento'],'selected' => $this->_tpl_vars['idEdoMovimiento']), $this);?>

						</select>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label">Año del Ejercicio (<?php echo $this->_tpl_vars['anioDeudaMovimiento']; ?>
)
						</label>
						<select id='anioDeudaMovimiento' name='anioDeudaMovimiento' class='form-control input-sm'>
							<option value=''>-Seleccione-</option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['anioDeuda'],'selected' => $this->_tpl_vars['anioDeudaMovimiento']), $this);?>

						</select>
					</div>
<!-- 					<div class="form-group col-md-6"> -->
<!-- 						<label class="control-label">Capture</label> -->
<!-- 						<?php if ($this->_tpl_vars['opt'] == 'g'): ?>  -->
<!-- 						<div class="form-check"> -->
<!-- 						  <input class="form-check-input" type="checkbox" value="true" id="captureMovimiento" name="captureMovimiento"> -->
<!-- 						  <label class="form-check-label" for="defaultCheck1"> -->
<!-- 						    Active la casilla si desea adjuntar el capture de la transferencia -->
<!-- 						  </label> -->
<!-- 						</div>			 -->
<!-- 						<?php elseif ($this->_tpl_vars['opt'] == 'm' || $this->_tpl_vars['opt'] == 'mr'): ?>  -->
<!-- 							<script type="text/javascript">xajax_consultarDeudasXidUsuario(xajax.$('idUsuario').value,'<?php echo $this->_tpl_vars['idDeuda2']; ?>
');</script> -->
<!-- 							<input readonly id='captureMovimiento' name='captureMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['captureMovimiento']; ?>
'> -->
<!-- 							<div id="divImgCapture"> -->
<!-- 								<?php if ($this->_tpl_vars['captureMovimiento'] == ''): ?> -->
<!-- 									<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/sinCapture.png" class="imgCapture"> -->
<!-- 								<?php else: ?> -->
<!-- 									<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
/upload/<?php echo $this->_tpl_vars['captureMovimiento']; ?>
" class="imgCapture"> -->
<!-- 								<?php endif; ?>							 -->
<!-- 							</div> -->
<!-- 								<div id="divCapture" name="divCapture" class="form-group col-lg-12"> -->
<!-- 								<br> -->
<!-- 									<label class="col-lg-3 control-label">Capture</label> -->
<!-- 									<div class="col-lg-3"> -->
<!-- 									  	<div class="form-group"> -->
<!-- 											<center><input type="file"  id="fileToUpload" onchange="upload_image();"></center> -->
<!-- 											<input type='hidden' id='nameTmp' name='nameTmp' value='<?php echo $this->_tpl_vars['nameTmp']; ?>
' readonly/> -->
<!-- 									  	</div> -->
<!-- 									</div> -->
<!-- 								</div>	 -->
<!-- 								<div class="upload-msg"></div> -->
<!-- 						<?php endif; ?> -->
<!-- 					</div> -->
					<div class="form-group col-md-12">
						<label class="control-label">Mes o meses que se están pagando (De ser varios meses separarlos con un guion (-) Ejemplo: Enero-Febrero-Marzo, de ser un Abono colocar: "Abono al mes de")</label>
<!--  						<div class="form-check form-check-inline"> -->
<!--  							<input class="form-check-input" type="checkbox" value="01" id="Mes1" name="Mes1"> -->
<!-- 							<label class="form-check-label" for="Mes1">Ene</label> -->
<!-- 						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="02" id="Mes2" name="Mes2"> -->
<!-- 							<label class="form-check-label" for="Mes2">Feb</label> -->
<!-- 						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="03" id="Mes3" name="Mes3"> -->
<!-- 						  	<label class="form-check-label" for="Mes3">Mar</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="04" id="Mes4" name="Mes4"> -->
<!-- 						  	<label class="form-check-label" for="Mes4">Abr</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="05" id="Mes5" name="Mes5"> -->
<!-- 						  	<label class="form-check-label" for="May5">May</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="06" id="Mes6" name="Mes6"> -->
<!-- 						  	<label class="form-check-label" for="Jun6">Jun</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="07" id="Mes7" name="Jul7"> -->
<!-- 						  	<label class="form-check-label" for="Jul7">Jul</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="08" id="Mes8" name="Ago8"> -->
<!-- 						  	<label class="form-check-label" for="Ago8">Ago</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="09" id="Mes9" name="Mes9"> -->
<!-- 						  	<label class="form-check-label" for="Sep9">Sep</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="10" id="Mes10" name="Mes10"> -->
<!-- 						  	<label class="form-check-label" for="Oct10">Oct</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="11" id="Mes11" name="Mes11"> -->
<!-- 						  	<label class="form-check-label" for="Nov11">Nov</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="12" id="Mes12" name="Mes12"> -->
<!-- 						  	<label class="form-check-label" for="Dic12">Dic</label> -->
<!--  						</div> -->
<!-- 						<div class="form-check form-check-inline"> -->
<!-- 							<input class="form-check-input" type="checkbox" value="13" id="Mes13" name="Mes13"> -->
<!-- 						  	<label class="form-check-label" for="Abo">Abono</label> -->
<!--  						</div> -->
							 						 													
						<textarea id='obsMovimiento' name='obsMovimiento' class='form-control input-sm'><?php echo $this->_tpl_vars['obsMovimiento']; ?>
</textarea>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label">Fec. Actualización</label>
						<input id='fecEdoMovimiento' name='fecEdoMovimiento' class='form-control input-sm' type='text' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['fecEdoMovimiento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' maxlength='10' readonly>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label">N° de Recibo</label>
						<input id='numFactMovimiento' name='numFactMovimiento' class='form-control input-sm' type='text' value='<?php echo $this->_tpl_vars['numFactMovimiento']; ?>
' maxlength='10' readonly>
					</div>
			<input type='hidden' id='opt' name='opt' value='<?php echo $this->_tpl_vars['opt']; ?>
' readonly/>
			<input type='hidden' id='idMovimiento' name='idMovimiento' value='<?php echo $this->_tpl_vars['idMovimiento']; ?>
' readonly/>
			
			<input id='ids' name='ids' type='hidden' value='' readonly/>
			
			<input id='idTipoMovimiento' name='idTipoMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idTipoMovimiento']; ?>
' readonly>
<!--			<input id='idEdoMovimiento' name='idEdoMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idEdoMovimiento']; ?>
' readonly>-->
<!--			<input id='idUsuario' name='idUsuario' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idUsuario']; ?>
' readonly>-->
			</div>
		</div>	
	</form>
</div>
<?php echo '
<script>
	function upload_image(){//Funcion encargada de enviar el archivo via AJAX
				jQuery(".upload-msg").text(\'Cargando...\');
				var inputFileImage = document.getElementById("fileToUpload");
				var nameTmp = document.getElementById("nameTmp").value;
				var idDeuda = document.getElementById("idDeuda").value;
				var idMovimiento = document.getElementById("idMovimiento").value;

				nameTmp1 = nameTmp +\':\'+idMovimiento;
				var file = inputFileImage.files[0];
				var data = new FormData();
//				tipoArchivo = file[\'type\'];
//				tipoArchivo = tipoArchivo.replace(\'image/\', \'\'); 
//				alert(file[\'type\']+\'-\'+file[\'name\']);
//				alert(file[\'tmp_name\']);
//				return;
				data.append(\'fileToUpload\',file);
				data.append(\'infoDestino\',nameTmp1);
				
				/*jQuery.each(jQuery(\'#fileToUpload\')[0].files, function(i, file) {
					data.append(\'file\'+i, file);
				});*/			
				jQuery.ajax({
					url: dominioJS+"app/cont/movimiento/upload.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
					mensaje = \'<div class="alert alert-success alert-dismissible" role="alert">\'+
						  \'<strong>Resultado!</strong><p>El Archivo ha sido subido correctamente.</p>\'+
						  \'</div>\';
						jQuery(".upload-msg").html(mensaje);
//						jQuery("#divCapture").css("display", "none");
						valImagen = \'<img src="\'+dominioJS+\'public/upload/\'+data+\'" class="imgCapture">\';
						jQuery("#divImgCapture").html(valImagen);
						jQuery("#captureMovimiento").val(data);
//						window.setTimeout(function() {
//						jQuery(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
//						jQuery(this).remove();
//						});	}, 5000);
					}
				});				
			}
</script>
'; ?>