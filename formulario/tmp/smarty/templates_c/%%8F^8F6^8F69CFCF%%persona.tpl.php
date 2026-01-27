<?php /* Smarty version 2.6.30, created on 2021-09-30 21:56:53
         compiled from /home/admin/web/tthh.merida.gob.ve/public_html/formulario/app/vista/persona/persona.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', '/home/admin/web/tthh.merida.gob.ve/public_html/formulario/app/vista/persona/persona.tpl', 89, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
//validar(\'nacpersona\',\'Nacionalidad\',REQUERIDO);
validar(\'nacpersona\',\'Nacionalidad\',REQUERIDO_RADIO);


validar(\'cedpersona\',\'Cédula\',REQUERIDO);
validar(\'cedpersona\',\'Cédula\',ENTERO);
validar(\'nompersona\',\'Nombres\',REQUERIDO);
validar(\'nompersona\',\'Nombres\',NOMBRE);
validar(\'apepersona\',\'Apellidos\',REQUERIDO);
validar(\'apepersona\',\'Apellidos\',NOMBRE);
validar(\'genpersona\',\'Género\',REQUERIDO);
validar(\'fecnacpersona\',\'Fecha de Nacimiento\',REQUERIDO);
validar(\'edocivpersona\',\'Edo. civil\',REQUERIDO);
validar(\'correopersona\',\'Correo Electrónico\',REQUERIDO);
validar(\'correopersona\',\'Correo Electrónico\',EMAIL);
validar(\'numhijmay\',\'N° de hijos mayores de 18 años\',REQUERIDO);
validar(\'numhijmay\',\'N° de hijos mayores de 18 años\',ENTERO);
validar(\'numhijmenpersona\',\'N° de hijos menores de 18 años\',REQUERIDO);
validar(\'numhijmenpersona\',\'N° de hijos menores de 18 años\',ENTERO);
validar(\'telmov1persona\',\'Teléfono Móvil\',REQUERIDO);
validar(\'telmov1persona\',\'Teléfono Móvil\',TELEFONO);
//validar(\'telmov2persona\',\'Otro número Móvil\',REQUERIDO);
validar(\'telmov2persona\',\'Otro número Móvil\',TELEFONO);
validar(\'discpersona\',\'¿Presenta alguna discapacidad?\',REQUERIDO);
validar(\'munhabpersona\',\'Municipio\',REQUERIDO);
validar(\'parhabpersona\',\'Parroquia\',REQUERIDO);

validar(\'cedconpersona\',\'Cédula del cónyuge\',ENTERO);
validar(\'nomconpersona\',\'Nombres del cónyuge\',NOMBRE);
validar(\'apeconpersona\',\'Apellidos del cónyuge\',NOMBRE);
validar(\'dirpersona\',\'Dirección del cónyuge\',REQUERIDO);


validar(\'tiplabpersona\',\'Tipo de trabajador\',REQUERIDO);
validar(\'munlabpersona\',\'Municipio Laboral\',REQUERIDO);
validar(\'parlabpersona\',\'Parroquia Laboral\',REQUERIDO);
validar(\'dirlabpersona\',\'Dirección Laboral\',REQUERIDO);

validar(\'otrodestlabpersona\',\'Otro destino laboral\',REQUERIDO_RADIO);

validar(\'confirmo\',\'Doy fe\',REQUERIDO_CHECKBOX);
validar(\'tyc\',\'Términos y condiciones\',REQUERIDO_CHECKBOX);


</script>
'; ?>

<div class='pagina'>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
		<a id='ancla' href='#'></a>
		<input type='hidden' id='opcion' name='opcion'  value='' readonly>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplError.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- ************************************************************ contenido **********************************************-->
				<div class="col-xs-12 col-lg-12">
					<div class="card">
				  		<div class="card-header">
					    	Datos personales		
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
								<div class="form-group col-md-3"> 
				 					<label class="control-label"><span class='label-red'>*</span> Nacionalidad</label><br> 
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="nacpersona" id="nacpersona" value="1">
									  <label class="form-check-label" for="nacpersona">V</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="nacpersona" id="nacpersona" value="2">
									  <label class="form-check-label" for="nacpersona">E</label>
									</div>
				 				</div>  				
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Cédula</label>
									<input id='cedpersona' name='cedpersona' value='<?php echo $this->_tpl_vars['cedPersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="sólo números" />
								</div>				 
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Nombres</label>
									<input id='nompersona' name='nompersona' value='<?php echo $this->_tpl_vars['nompersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Nombres completos"/>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Apellidos</label>
										<input id='apepersona' name='apepersona' value='<?php echo $this->_tpl_vars['apepersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Apellidos completos" />
								</div>
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"><span class='label-red'>*</span> Género</label> 
				 					<select id='genpersona' name='genpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaGenero'],'selected' => $this->_tpl_vars['genpersona']), $this);?>
 
				 					</select> 
				 				</div>
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Fecha de Nacimiento</label>
									<input type="date" name="fecnacpersona" id="fecnacpersona" class='form-control input-sm' >
								</div>  		
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"><span class='label-red'>*</span> Estado civil</label> 
				 					<select id='edocivpersona' name='edocivpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaEdoCivil'],'selected' => $this->_tpl_vars['edocivpersona']), $this);?>
 
				 					</select> 
				 				</div>
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Correo Electrónico</label>
									<input id='correopersona' name='correopersona' value='<?php echo $this->_tpl_vars['correopersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>  		
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> N° de hijos mayores de 18 años</label>
									<input id='numhijmay' name='numhijmay' value='<?php echo $this->_tpl_vars['numhijmay']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Sólo números"/>
								</div>				 				
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> N° de hijos menores de 18 años</label>
									<input id='numhijmenpersona' name='numhijmenpersona' value='<?php echo $this->_tpl_vars['numhijmenpersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Sólo números"/>
								</div>				 				
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Teléfono Móvil</label>
									<input id='telmov1persona' name='telmov1persona' value='<?php echo $this->_tpl_vars['telmov1persona']; ?>
' maxlength='64' class='form-control input-sm'/>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Otro número Móvil</label>
									<input id='telmov2persona' name='telmov2persona' value='<?php echo $this->_tpl_vars['telmov2persona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> ¿Presenta alguna discapacidad?</label>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="discpersona" id="discpersona" value="1">
									  <label class="form-check-label" for="inlineRadio1">Sí</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="discpersona" id="discpersona" value="2">
									  <label class="form-check-label" for="inlineRadio2">No</label>
									</div>
								</div>
								<div class="form-group col-md-3">
									<div id="" class="infoDiscapacidad">
										<label class="control-label"><span class='label-red'>*</span> Tipo de Discapacidad</label> 
					 					<select id='tipdiscpersona' name='tipdiscpersona' class='form-control input-sm'> 
					 						<option value=''>-Seleccione-</option> 
					 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaTipoDiscapacidad'],'selected' => $this->_tpl_vars['tipdiscpersona']), $this);?>
 
					 					</select> 
									</div>		
								</div>
								<div class="form-group col-md-3">
									<div id="" class="infoDiscapacidad">
									<label class="control-label"><span class='label-red'>*</span> Grado de discapacidad</label>
					 					<select id='gdodiscpersona' name='gdodiscpersona' class='form-control input-sm'> 
					 						<option value=''>-Seleccione-</option> 
					 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaGradoDiscapacidad'],'selected' => $this->_tpl_vars['gdodiscpersona']), $this);?>
 
					 					</select> 
									</div>
								</div>
								<div class="form-group col-md-3">
									<div id="" class="infoDiscapacidad">
									<label class="control-label"><span class='label-red'>*</span> N° de carnet de Conapdis</label>
									<input id='numcarnetdiscpersona' name='numcarnetdiscpersona' value='<?php echo $this->_tpl_vars['numcarnetdiscpersona']; ?>
' maxlength='64' class='form-control input-sm' />
									</div>		
								</div>								
								<!--
								<div class="form-group col-md-9">
									<label class="control-label"> Describa la discapacidad</label>
									<input id='descdiscpersona' name='descdiscpersona' value='<?php echo $this->_tpl_vars['descdiscpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								-->
								<div class="form-group col-md-3">
									<label class="control-label"> Facebook</label>
									<input id='facepersona' name='facepersona' value='<?php echo $this->_tpl_vars['facepersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Instagram</label>
									<input id='instpersona' name='instpersona' value='<?php echo $this->_tpl_vars['instpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Twitter</label>
									<input id='twtpersona' name='twtpersona' value='<?php echo $this->_tpl_vars['twtpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>							
								<div class="form-group col-md-3">
									<label class="control-label"> WhatsApp</label>
									<input id='wapppersona' name='wapppersona' value='<?php echo $this->_tpl_vars['wapppersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>							
				  			</div>
						</div>		
					</div>
				</div>	 
				<div class="col-xs-12 col-lg-12">
					<div class="card">
				  		<div class="card-header">
					    	Información de Habitación		
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"> N° Teléfono de habitación</label> 
				 					<input id='telhabpersona' name='telhabpersona' value='<?php echo $this->_tpl_vars['telhabpersona']; ?>
' maxlength='64' class='form-control input-sm' />
				 				</div>		
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"><span class='label-red'>*</span> Municipio</label> 
				 					<select id='munhabpersona' name='munhabpersona' class='form-control input-sm' onChange="xajax_llenarComboParroquias(xajax.$('munhabpersona').value,'parhabpersona');"> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMunicipio'],'selected' => $this->_tpl_vars['imunhabpersona']), $this);?>
 
				 					</select> 
				 				</div>		
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"><span class='label-red'>*</span> Parroquia</label>
									<div id="divparhabpersona">
				 					<select id='parhabpersona' name='parhabpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 					</select>									
									</div>
				 				</div>
								<div class="form-group col-md-3">
								</div>		
								<div class="form-group col-md-12">
									<label class="control-label"><span class='label-red'>*</span> Dirección</label>
									<input id='dirpersona' name='dirpersona' value='<?php echo $this->_tpl_vars['dirpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>							
				  			</div>
						</div>		
					</div>
				</div>	 	
				<div class="col-xs-12 col-lg-12">
					<div class="card">
				  		<div class="card-header">
					    	Información del Cónyuge o Pareja		
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
								<div class="form-group col-md-3"> 
				 					<label class="control-label"> Nacionalidad</label><br> 
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="nacconpersona" id="nacconpersona" value="1">
									  <label class="form-check-label" for="nacconpersona">V</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="nacconpersona" id="nacconpersona" value="2">
									  <label class="form-check-label" for="nacconpersona">E</label>
									</div> 
				 				</div>  				
								<div class="form-group col-md-3">
									<label class="control-label"> Cédula</label>
									<input id='cedconpersona' name='cedconpersona' value='<?php echo $this->_tpl_vars['cedconpersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Sólo números"/>
								</div>				 
								<div class="form-group col-md-3">
									<label class="control-label"> Nombres</label>
									<input id='nomconpersona' name='nomconpersona' value='<?php echo $this->_tpl_vars['nomconpersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Nombres completos"/>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Apellidos</label>
										<input id='apeconpersona' name='apeconpersona' value='<?php echo $this->_tpl_vars['apeconpersona']; ?>
' maxlength='64' class='form-control input-sm' placeholder="Apellidos completos"/>
								</div>
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"> Género</label> 
				 					<select id='genconpersona' name='genconpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaGenero'],'selected' => $this->_tpl_vars['igenconpersona']), $this);?>
 
				 					</select> 
				 				</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Nacimiento</label>
									<input type="date" name="fecnacconpersona" id="fecnacconpersona" class='form-control input-sm' >
								</div>			 				
								<div class="form-group col-md-3">
									<label class="control-label"> Teléfono Móvil</label>
									<input id='telmovconpersona' name='telmovconpersona' value='<?php echo $this->_tpl_vars['telmovconpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Correo Electrónico</label>
									<input id='correoconpersona' name='correoconpersona' value='<?php echo $this->_tpl_vars['correoconpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
				  			</div>
						</div>		
					</div>
				</div>	 	
				<div class="col-xs-12 col-lg-12">
					<div class="card">
				  		<div class="card-header">
					    	Antecedentes de Servicio		
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
								<div class="form-group col-md-3">
									<label class="control-label"> Administración</label><br> 
				 					<select id='admantpersona1' name='admantpersona1' class='form-control input-sm' onChange="xajax_llenarComboParroquias(xajax.$('munhabpersona').value,'parhabpersona');"> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaAdministracion'],'selected' => $this->_tpl_vars['admantpersona1']), $this);?>
 
				 					</select> 
								</div>						
								<div class="form-group col-md-3">
									<label class="control-label"> Cargo</label>
									<input id='cgoantpersona1' name='cgoantpersona1' value='<?php echo $this->_tpl_vars['cgoantpersona1']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Ingreso</label>
									<input type="date" name="fecingantpersona1" id="fecingantpersona1" class='form-control input-sm' >
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Egreso</label>
									<input type="date" name="fecfinantpersona1" id="fecfinantpersona1" class='form-control input-sm' >
								</div>							
								<div class="form-group col-md-3">
									<label class="control-label"> Administración</label><br> 
				 					<select id='admantpersona2' name='admantpersona2' class='form-control input-sm' onChange="xajax_llenarComboParroquias(xajax.$('munhabpersona').value,'parhabpersona');"> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaAdministracion'],'selected' => $this->_tpl_vars['admantpersona2']), $this);?>
 
				 					</select> 
								</div>						
								<div class="form-group col-md-3">
									<label class="control-label"> Cargo</label>
									<input id='cgoantpersona2' name='cgoantpersona2' value='<?php echo $this->_tpl_vars['cgoantpersona2']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Ingreso</label>
									<input type="date" name="fecingantpersona2" id="fecingantpersona2" class='form-control input-sm' >
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Egreso</label>
									<input type="date" name="fecfinantpersona2" id="fecfinantpersona2" class='form-control input-sm' >
								</div>							
								<div class="form-group col-md-3">
									<label class="control-label"> Administración</label><br> 
				 					<select id='admantpersona3' name='admantpersona3' class='form-control input-sm' onChange="xajax_llenarComboParroquias(xajax.$('munhabpersona').value,'parhabpersona');"> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaAdministracion'],'selected' => $this->_tpl_vars['admantpersona3']), $this);?>
 
				 					</select> 
								</div>						
								<div class="form-group col-md-3">
									<label class="control-label"> Cargo</label>
									<input id='cgoantpersona3' name='cgoantpersona3' value='<?php echo $this->_tpl_vars['cgoantpersona3']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Ingreso</label>
									<input type="date" name="fecingantpersona3" id="fecingantpersona3" class='form-control input-sm' >
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"> Fecha de Egreso</label>
									<input type="date" name="fecfinantpersona3" id="fecfinantpersona3" class='form-control input-sm' >
								</div>							
				  			</div>
						</div>		
					</div>
				</div>	 	
				<div class="col-xs-12 col-lg-12">
					<div class="card">
				  		<div class="card-header">
					    	Información Laboral		
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"> Tipo de trabajador</label> 
				 					<select id='tiplabpersona' name='tiplabpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaTipLabPersona'],'selected' => $this->_tpl_vars['tiplabpersona']), $this);?>
 
				 					</select> 
				 				</div>
								<div class="form-group col-md-3">
									<div id="" class="tallas">
										<label class="control-label"> Talla calzado</label>
										<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
									</div>		
								</div>
								<div class="form-group col-md-3">
									<div id="" class="tallas">
									<label class="control-label"> Talla pantalón</label>
									<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
									</div>
								</div>
								<div class="form-group col-md-3">
									<div id="" class="tallas">
									<label class="control-label"> Talla camisa</label>
									<input id='correoPersona' name='correoPersona' value='<?php echo $this->_tpl_vars['correoPersona']; ?>
' maxlength='64' class='form-control input-sm' />
									</div>		
								</div>		
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Fecha de Ingreso</label>
									<input type="date" name="fecingpersona" id="fecingpersona" class='form-control input-sm' >
								</div>
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"> Municipio</label>
				 					<select id='munlabpersona' name='munlabpersona' class='form-control input-sm' onChange="xajax_llenarComboParroquias(xajax.$('munlabpersona').value,'parlabpersona');"> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMunicipio'],'selected' => $this->_tpl_vars['munlabpersona']), $this);?>
 
				 					</select> 
				 				</div>		
				 				<div class="form-group col-md-4"> 
				 					<label class="control-label"> Parroquia</label>
									<div id="divparlabpersona">						 
					 					<select id='parlabpersona' name='parlabpersona' class='form-control input-sm'> 
					 						<option value=''>-Seleccione-</option>  
					 					</select> 
									</div>
				 				</div>		
								<!--									 
				 					<select id='munlabpersona' name='munlabpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaMunicipio'],'selected' => $this->_tpl_vars['munlabpersona']), $this);?>
 
				 					</select> 
				 				</div>		
				 				<div class="form-group col-md-3"> 
				 					<label class="control-label"> Parroquia</label> 
				 					<select id='parlabpersona' name='parlabpersona' class='form-control input-sm'> 
				 						<option value=''>-Seleccione-</option> 
				 						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaParroquia'],'selected' => $this->_tpl_vars['parlabpersona']), $this);?>
 
				 					</select> 
				 				</div>
							-->
								<div class="form-group col-md-6">
									<label class="control-label"> Ente en el cual labora</label>
									<input id='entepersona' name='entepersona' value='<?php echo $this->_tpl_vars['entepersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-6">
									<label class="control-label"> Dirección</label>
									<input id='dirlabpersona' name='dirlabpersona' value='<?php echo $this->_tpl_vars['dirlabpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>
								<div class="form-group col-md-3">
									<label class="control-label"><span class='label-red'>*</span> Otro destino laboral</label><br>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="otrodestlabpersona" id="otrodestlabpersona" value="1">
									  <label class="form-check-label" for="otrodestlabpersona">Sí</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="otrodestlabpersona" id="otrodestlabpersona" value="2">
									  <label class="form-check-label" for="otrodestlabpersona">No</label>
									</div>
								</div>		
								<div class="form-group col-md-6">
									<label class="control-label"> Ente - Dirección del otro destino laboral</label>
									<input id='dirotrodestlabpersona' name='dirotrodestlabpersona' value='<?php echo $this->_tpl_vars['dirotrodestlabpersona']; ?>
' maxlength='64' class='form-control input-sm' />
								</div>					
				  			</div>
						</div>		
					</div>
				</div>	 
				<br><br>
				<div class="form-group col-md-12"> 
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="1" id="confirmo" name="confirmo">
					  <label class="form-check-label" for="flexCheckDefault">
					    Doy fe de que toda la información dada es voluntaria, completa y correcta.
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="1" id="tyc" name="tyc">
					  <label class="form-check-label" for="flexCheckChecked">
					    <a href="http://tthh.merida.gob.ve/formulario/base/persona/tyc" target="_blank">He leído y acepto la Política de privacidad</a>
					  </label>
					</div>
 				</div>  								
<!-- ************************************************************ contenido **********************************************-->
	
	</form>
</div>
<?php echo '
<script>
if(jQuery( "#tiplabpersona" ).val()==\'\'){
	jQuery(\'.tallas\').hide();
}
//alert(jQuery(\'input:radio[name=discpersona]:checked\').val())
if(jQuery(\'input:radio[name=discpersona]:checked\').val()==undefined){
	jQuery(\'.infoDiscapacidad\').hide();
}

jQuery( "#tiplabpersona" ).change(function() {
valor = jQuery( this ).val()
//alert( "Valor = " + valor );
switch(valor) {
  case \'3\':
	jQuery(\'.tallas\').show();
    break;
  default:
    jQuery(\'.tallas\').hide();
}
});

jQuery("input[name=discpersona]").change(function () {	 
	var valor = jQuery(this).val();
//	alert( "Valor = " + valor );
	switch(valor) {
	  case \'1\':
		jQuery(\'.infoDiscapacidad\').show();
	    break;
	  default:
	    jQuery(\'.infoDiscapacidad\').hide();
	}	
});
		
/*
jQuery(\'#discpersona\').on(\'click\',function(){
valor = jQuery( this ).val()
var valor = jQuery(\'input:radio[name=discpersona]:checked\').val();
alert( "Valor = " + valor );
switch(valor) {
  case \'1\':
	jQuery(\'.tallas\').show();
    break;
  default:
    jQuery(\'.tallas\').hide();
}
});
*/
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
 				