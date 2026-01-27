<?php /* Smarty version 2.6.30, created on 2021-09-21 16:51:19
         compiled from C:%5Cxampp%5Chtdocs%5Cformulario/app/vista/persona/persona.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'C:\\xampp\\htdocs\\formulario/app/vista/persona/persona.tpl', 42, false),array('modifier', 'date_format', 'C:\\xampp\\htdocs\\formulario/app/vista/persona/persona.tpl', 224, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
<!--validar(\'cedPersona\',\'Cédula\',REQUERIDO);-->
validar(\'nomPersona\',\'Nombres\',REQUERIDO);
validar(\'apePersona\',\'Apellidos\',REQUERIDO);
validar(\'correoPersona\',\'Correo Electrónico\',REQUERIDO);
validar(\'mov1Persona\',\'Teléfono Móvil\',REQUERIDO);
<!--validar(\'dirPersona\',\'N° Apartamento / Casa\',REQUERIDO);-->

validar(\'idRol\',\'Rol\',REQUERIDO);
validar(\'idEdoRegistroUsu\',\'Estado del Usuario\',REQUERIDO);
'; ?>

<?php if ($this->_tpl_vars['opt'] == 'g'): ?>
<?php echo '
validar(\'cuentaUsuario\',\'Nombre Usuario\',REQUERIDO);
validar(\'contrasenaUsuario\',\'Clave\',REQUERIDO);
'; ?>

<?php endif; ?>
<?php echo '
<!--validar(\'pregSecreta\',\'Preg. Secreta\',REQUERIDO);-->
<!--validar(\'respPregSecreta\',\'Resp, Preg. Secreta\',REQUERIDO);-->
</script>
'; ?>

<div class='pagina'>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
		<div class='line-title'>
			<h4><?php if ($this->_tpl_vars['opt'] == 'g'): ?> Agregar <?php elseif ($this->_tpl_vars['opt'] == 'm' || $this->_tpl_vars['opt'] == 'mr'): ?> Modificar <?php endif; ?> Persona</h4>
		</div>
		<a id='ancla' href='#'></a>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplError.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 		<div class='container-fluid'>
 			<p class='p-black'>Los campos marcados con <span class='label-red'>*</span> son requeridos</p>
 			<div class="row contenidoVer" style="width:100%">
 				<input type='hidden' id='opcion' name='opcion'  value='' readonly>
 				<div class="form-group col-md-12"> 
 					<label class="control-label"> Datos personales:</label>
 				</div>		
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Nacionalidad</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>  				
				<div class="form-group col-md-3">
					<label class="control-label"> Cédula</label>
					<input id='cedPersona' name='cedPersona' value='<?php echo $this->_tpl_vars['cedPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>				 
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Nombres</label>
					<input id='nomPersona' name='nomPersona' value='<?php echo $this->_tpl_vars['nomPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Apellidos</label>
						<input id='apePersona' name='apePersona' value='<?php echo $this->_tpl_vars['apePersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Género</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Fecha de Nacimiento</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>  		
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Estado civil</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>  		
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Teléfono Móvil</label>
					<input id='mov1Persona' name='mov1Persona' value='<?php echo $this->_tpl_vars['mov1Persona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Otro número Móvil</label>
					<input id='mov2Persona' name='mov2Persona' value='<?php echo $this->_tpl_vars['mov2Persona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Correo Electrónico</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> ¿Presenta alguna discapacidad?</label>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					  <label class="form-check-label" for="inlineRadio1">1</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  <label class="form-check-label" for="inlineRadio2">2</label>
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Describa la discapacidad</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Facebook</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Instagram</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Twitter</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
			</div>
			<div class="row contenidoVer" style="width:100%">
 				<div class="form-group col-md-12"> 
 					<label class="control-label"> Información de Habitación:</label>
 				</div>		
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Municipio</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>		
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Parroquia</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>
				<div class="form-group col-md-6">
					<label class="control-label"><span class='label-red'>*</span> Dirección</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
			</div>

			<div class="row contenidoVer" style="width:100%">
 				<div class="form-group col-md-12"> 
 					<label class="control-label"> Personas que depende del empleado:</label>
 				</div>						
			</div>
			
			<div class="row contenidoVer" style="width:100%">
 				<div class="form-group col-md-12"> 
 					<label class="control-label"> Antecedentes Laborales:</label>
 				</div>						
			</div>
			
			<div class="row contenidoVer" style="width:100%">
 				<div class="form-group col-md-12"> 
 					<label class="control-label"> Información Laboral:</label>
 				</div>						
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Municipio</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>		
 				<div class="form-group col-md-3"> 
 					<label class="control-label"><span class='label-red'>*</span> Parroquia</label> 
 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> 
 						<option value=''>-Seleccione-</option> 
 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 
 					</select> 
 				</div>
				
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span> Dirección</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
			</div>
 				
 				
 				
				<div class="form-group col-md-3">
					<label class="control-label"><span class='label-red'>*</span>N° de hijos</label>
					<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Teléfono Casa</label>
					<input id='telPersona' name='telPersona' value='<?php echo $this->_tpl_vars['telPersona']; ?>
' maxlength='64' class='form-control input-sm' />
				</div>
<!--				<div class="form-group col-md-3">
					<label class="control-label">Teléfono Oficina</label>
					<input id='telOfiPersona' name='telOfiPersona' value='<?php echo $this->_tpl_vars['telOfiPersona']; ?>
' maxlength='64' class='form-control input-sm' />
 				</div> -->
				<?php if ($this->_tpl_vars['admin'] == 'true'): ?>
<!-- 				<div class="form-group col-md-3"> -->
<!-- 					<label class="control-label"><span class='label-red'>*</span> Edo. Registro</label> -->
<!-- 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> -->
<!-- 						<option value=''>-Seleccione-</option> -->
<!-- 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 -->
<!-- 					</select> -->
<!-- 				</div> -->
				<?php else: ?>
<!-- 				<div class="form-group col-md-3"> -->
<!-- 					<label class="control-label"><span class='label-red'>*</span> Edo. Registro</label> -->
<!-- 					<input type="hidden" readonly id='idEdoRegistroPer' name='idEdoRegistroPer' value='<?php echo $this->_tpl_vars['idEdoRegistroPer']; ?>
' maxlength='64' class='form-control input-sm' /> -->
<!-- 					<select id='idEdoRegistroPerCombo' name='idEdoRegistroPerCombo' class='form-control input-sm' disabled> -->
<!-- 						<option value=''>-Seleccione-</option> -->
<!-- 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoregistro'],'selected' => $this->_tpl_vars['idEdoRegistroPer']), $this);?>
 -->
<!-- 					</select> -->
<!-- 				</div> -->
				<?php endif; ?>
<!--******************************************************-->


<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="col-lg-3 control-label">Edo. Civil</label> -->
<!-- 	<select id='idEdoCivil' name='idEdoCivil' class='form-control input-sm'> -->
<!-- 		<option value=''>-Seleccione-</option> -->
<!-- 		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdocivil'],'selected' => $this->_tpl_vars['idEdoCivil']), $this);?>
 -->
<!-- 	</select> -->
<!-- </div> -->
<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="col-lg-3 control-label">Género</label> -->
<!-- 	<input id='genPersona' name='genPersona' value='<?php echo $this->_tpl_vars['genPersona']; ?>
' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="control-label">Fec. Nacimiento (dd/mm/aaaa)</label> -->
<!-- 	<input id='fecNacPersona' name='fecNacPersona' class='form-control input-sm' type='text' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['fecNacPersona'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' maxlength='10' ondblclick='this.value=""'> -->
<!-- </div> -->
<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="control-label">Peso</label> -->
<!-- 	<input id='pesoPersona' name='pesoPersona' value='<?php echo $this->_tpl_vars['pesoPersona']; ?>
' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="control-label">Altura</label> -->
<!-- 	<input id='altPersona' name='altPersona' value='<?php echo $this->_tpl_vars['altPersona']; ?>
' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<div class="form-group col-md-3">
	<label class="control-label">Observación</label>
	<textarea id='obsPersona' name='obsPersona' class='form-control input-sm'><?php echo $this->_tpl_vars['obsPersona']; ?>
</textarea>
</div>
<div class="form-group col-md-3">
	<label class="control-label">Fec. Ingreso</label>
	<input id='fecIngPersona' name='fecIngPersona' class='form-control input-sm' type='text' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['fecIngPersona'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' maxlength='10' ondblclick='this.value=""' readonly>
</div>

<!--******************************************************-->
<!--********************** MODULO USUARIO ********************************-->
<div class="form-group col-md-3">
	<label class="control-label"><span class='label-red'>*</span> Nombre Usuario</label><br>
	<?php if ($this->_tpl_vars['opt'] == 'g'): ?>
		<input id='cuentaUsuario' name='cuentaUsuario' value='<?php echo $this->_tpl_vars['cuentaUsuario']; ?>
' maxlength='64' class='form-control input-sm' />
	<?php else: ?>
		<?php echo $this->_tpl_vars['cuentaUsuario']; ?>

		<input type="hidden" id='cuentaUsuario' name='cuentaUsuario' value='<?php echo $this->_tpl_vars['cuentaUsuario']; ?>
' maxlength='64' class='form-control input-sm' />
	<?php endif; ?>			
</div>
<div class="form-group col-md-3">
	<label class="control-label"><span class='label-red'>*</span> Clave</label><br>
		<?php if ($this->_tpl_vars['opt'] == 'g'): ?>
			<input type="password" class="form-control input-sm" id="contrasenaUsuario" name="contrasenaUsuario" placeholder="6 caracteres" value="">
		<?php else: ?>
<!--			<input value="Actualizar" class="btn btn-primary" type="button" onClick="xajax_vntActClave();">-->
			<input id="contrasenaUsuario" value="Cambiar" class="btn btn-primary" type="button">
		<?php endif; ?>
</div>
<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="control-label"><span class='label-red'>*</span> Preg. Secreta</label> -->
<!-- 	<input id='pregSecreta' name='pregSecreta' value='<?php echo $this->_tpl_vars['pregSecreta']; ?>
' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<!-- <div class="form-group col-md-3"> -->
<!-- 	<label class="control-label"><span class='label-red'>*</span> Resp, Preg. Secreta</label> -->
<!-- 	<input id='respPregSecreta' name='respPregSecreta' value='<?php echo $this->_tpl_vars['respPregSecreta']; ?>
' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<?php if ($this->_tpl_vars['admin'] == 'true'): ?>
<div class="form-group col-md-3">
	<label class="control-label"><span class='label-red'>*</span> Rol</label>
	<select id='idRol' name='idRol' class='form-control input-sm'>
		<option value=''>-Seleccione-</option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaRol'],'selected' => $this->_tpl_vars['idRol']), $this);?>

	</select>
</div>
<div class="form-group col-md-3">
	<label class="control-label"><span class='label-red'>*</span> Estado del Usuario</label>
	<select id='idEdoRegistroUsu' name='idEdoRegistroUsu' class='form-control input-sm'>
		<option value=''>-Seleccione-</option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoRegistro'],'selected' => $this->_tpl_vars['idEdoRegistroUsu']), $this);?>

	</select>
</div>
<?php else: ?>
	<input type='hidden' id='idRol' name='idRol' value='<?php echo $this->_tpl_vars['idRol']; ?>
' readonly/>
	<input type='hidden' id='idEdoRegistroUsu' name='idEdoRegistroUsu' value='<?php echo $this->_tpl_vars['idEdoRegistroUsu']; ?>
' readonly/>
<?php endif; ?>
<!--********************** MODULO USUARIO ********************************-->
			<input type='hidden' id='opt' name='opt' value='<?php echo $this->_tpl_vars['opt']; ?>
' readonly/>
			<input type='hidden' id='idMovimiento' name='idMovimiento' value='<?php echo $this->_tpl_vars['idMovimiento']; ?>
' readonly/>
			<input id='ids' name='ids' type='hidden' value='' readonly/>
			<input type='hidden' id='fecCreacion' name='fecCreacion' value='<?php echo $this->_tpl_vars['fecCreacion']; ?>
' maxlength='64' class='form-control input-sm' readonly/>
			<input id='idTipoMovimiento' name='idTipoMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idTipoMovimiento']; ?>
' readonly>
			<input id='idEdoMovimiento' name='idEdoMovimiento' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idEdoMovimiento']; ?>
' readonly>
			<input id='idUsuario' name='idUsuario' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idUsuario']; ?>
' readonly>
			<input id='idPersona' name='idPersona' class='form-control input-sm' type='hidden' value='<?php echo $this->_tpl_vars['idPersona']; ?>
' readonly>
			</div>
		</div>	
	</form>
</div>
<?php echo '
<script>
jQuery(\'#contrasenaUsuario\').on(\'click\',function(){
//	alert("aca");
	jQuery(\'.modal-body\').load(\''; ?>
<?php echo $this->_tpl_vars['URLSIST']; ?>
app/cont/sesion/actclave.php<?php echo '\',function(){
        jQuery(\'#tituloModal\').html(\'Actualizar Clave\');
        jQuery(\'#modalEmergentes\').modal({show:true});
    });
});
</script>
'; ?>