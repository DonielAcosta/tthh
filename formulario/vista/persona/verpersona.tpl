<div class='pagina'>
	<div class="btn-group" role="group" aria-label="...">
	<div style="margin-top: 5px;" id='cancelar' onclick="cerrarvntPequena();" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>
	<div class='line-title-con'>
<!-- 			<h4>Consultar Persona</h4> -->
		</div>
	</div>
 			<div class="row contenidoVer" style="width:100%">
 				<input type='hidden' id='opcion' name='opcion'  value='' readonly>
				<div class="form-group col-md-6">
					<label class="control-label"> Cédula</label>
					<input id='cedPersona' name='cedPersona' value='{$cedPersona}' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-6">
					<label class="control-label"><span class='label-red'>*</span> N° Casa</label>
					<input id='numCasaPersona' name='numCasaPersona' value='{$numCasaPersona}' maxlength='64' class='form-control input-sm' />
				</div>
<!-- 				<div class="form-group col-md-6"> -->
<!-- 					<label class="control-label"> Rif</label> -->
<!-- 					<input id='rifPersona' name='rifPersona' value='{$rifPersona}' maxlength='64' class='form-control input-sm' /> -->
<!-- 				</div> 				 -->
				<div class="form-group col-md-6">
					<label class="control-label"><span class='label-red'>*</span> Nombres</label>
					<input id='nomPersona' name='nomPersona' value='{$nomPersona}' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-6">
					<label class="control-label"><span class='label-red'>*</span> Apellidos</label>
						<input id='apePersona' name='apePersona' value='{$apePersona}' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-6">
					<label class="control-label"><span class='label-red'>*</span> Correo Electrónico</label>
					<input id='correoPersona' name='correoPersona' value='{$correoPersona}' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-6">
					<label class="control-label"><span class='label-red'>*</span> Teléfono Móvil</label>
					<input id='mov1Persona' name='mov1Persona' value='{$mov1Persona}' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Otro número Móvil</label>
					<input id='mov2Persona' name='mov2Persona' value='{$mov2Persona}' maxlength='64' class='form-control input-sm' />
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Teléfono Casa</label>
					<input id='telPersona' name='telPersona' value='{$telPersona}' maxlength='64' class='form-control input-sm' />
				</div>
<!--				<div class="form-group col-md-6">
					<label class="control-label">Teléfono Oficina</label>
					<input id='telOfiPersona' name='telOfiPersona' value='{$telOfiPersona}' maxlength='64' class='form-control input-sm' />
 				</div> -->
				{if $admin=='true'}
<!-- 				<div class="form-group col-md-6"> -->
<!-- 					<label class="control-label"><span class='label-red'>*</span> Edo. Registro</label> -->
<!-- 					<select id='idEdoRegistroPer' name='idEdoRegistroPer' class='form-control input-sm'> -->
<!-- 						<option value=''>-Seleccione-</option> -->
<!-- 						{html_options options=$tablaEdoregistro selected=$idEdoRegistroPer} -->
<!-- 					</select> -->
<!-- 				</div> -->
				{else}
<!-- 				<div class="form-group col-md-6"> -->
<!-- 					<label class="control-label"><span class='label-red'>*</span> Edo. Registro</label> -->
<!-- 					<input type="hidden" readonly id='idEdoRegistroPer' name='idEdoRegistroPer' value='{$idEdoRegistroPer}' maxlength='64' class='form-control input-sm' /> -->
<!-- 					<select id='idEdoRegistroPerCombo' name='idEdoRegistroPerCombo' class='form-control input-sm' disabled> -->
<!-- 						<option value=''>-Seleccione-</option> -->
<!-- 						{html_options options=$tablaEdoregistro selected=$idEdoRegistroPer} -->
<!-- 					</select> -->
<!-- 				</div> -->
				{/if}
<!--******************************************************-->


<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="col-lg-3 control-label">Edo. Civil</label> -->
<!-- 	<select id='idEdoCivil' name='idEdoCivil' class='form-control input-sm'> -->
<!-- 		<option value=''>-Seleccione-</option> -->
<!-- 		{html_options options=$tablaEdocivil selected=$idEdoCivil} -->
<!-- 	</select> -->
<!-- </div> -->
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="col-lg-3 control-label">Género</label> -->
<!-- 	<input id='genPersona' name='genPersona' value='{$genPersona}' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="control-label">Fec. Nacimiento (dd/mm/aaaa)</label> -->
<!-- 	<input id='fecNacPersona' name='fecNacPersona' class='form-control input-sm' type='text' value='{$fecNacPersona|date_format:"%d/%m/%Y"}' maxlength='10' ondblclick='this.value=""'> -->
<!-- </div> -->
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="control-label">Peso</label> -->
<!-- 	<input id='pesoPersona' name='pesoPersona' value='{$pesoPersona}' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="control-label">Altura</label> -->
<!-- 	<input id='altPersona' name='altPersona' value='{$altPersona}' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<div class="form-group col-md-12">
	<label class="control-label">Observación</label>
	<textarea id='obsPersona' name='obsPersona' class='form-control input-sm'  rows="2" cols="2">{$obsPersona}</textarea>
</div>
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="control-label">Fec. Ingreso</label> -->
<!-- 	<input id='fecIngPersona' name='fecIngPersona' class='form-control input-sm' type='text' value='{$fecIngPersona|date_format:"%d/%m/%Y"}' maxlength='10' ondblclick='this.value=""' readonly> -->
<!-- </div> -->

<!--******************************************************-->
<!--********************** MODULO USUARIO ********************************-->
<div class="form-group col-md-6">
	<label class="control-label"><span class='label-red'>*</span> Nombre Usuario</label><br>
	{if $opt=='g'}
		<input id='cuentaUsuario' name='cuentaUsuario' value='{$cuentaUsuario}' maxlength='64' class='form-control input-sm' />
	{else}
		{$cuentaUsuario}
		<input type="hidden" id='cuentaUsuario' name='cuentaUsuario' value='{$cuentaUsuario}' maxlength='64' class='form-control input-sm' />
	{/if}			
</div>
<div class="form-group col-md-6">
	<label class="control-label"><span class='label-red'>*</span> Clave</label><br>
		*****
</div>
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="control-label"><span class='label-red'>*</span> Preg. Secreta</label> -->
<!-- 	<input id='pregSecreta' name='pregSecreta' value='{$pregSecreta}' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
<!-- <div class="form-group col-md-6"> -->
<!-- 	<label class="control-label"><span class='label-red'>*</span> Resp, Preg. Secreta</label> -->
<!-- 	<input id='respPregSecreta' name='respPregSecreta' value='{$respPregSecreta}' maxlength='64' class='form-control input-sm' /> -->
<!-- </div> -->
{if $admin=='true'}
<div class="form-group col-md-6">
	<label class="control-label"><span class='label-red'>*</span> Rol</label>
	<select id='idRol' name='idRol' class='form-control input-sm'>
		<option value=''>-Seleccione-</option>
		{html_options options=$tablaRol selected=$idRol}
	</select>
</div>
<div class="form-group col-md-6">
	<label class="control-label"><span class='label-red'>*</span> Estado del Usuario</label>
	<select id='idEdoRegistroUsu' name='idEdoRegistroUsu' class='form-control input-sm'>
		<option value=''>-Seleccione-</option>
		{html_options options=$tablaEdoRegistro selected=$idEdoRegistroUsu}
	</select>
</div>
{/if}
			</div>	
</div>
