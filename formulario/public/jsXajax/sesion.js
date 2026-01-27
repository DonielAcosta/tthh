function reloadCaptcha() {
//	jQuery('#siimage').prop('src',dominioJS + '../libDsiaV3/lib/securimage/securimage_show.php?sid='+ Math.random());
	jQuery('#siimage').prop('src',dominioJS_LIB + 'libDsiaV3/lib/securimage/securimage_show.php?sid='+ Math.random());
//	jQuery('#siimage').prop('src','https://lila.adm.ula.ve/libDsiaV3/lib/securimage/securimage_show.php?sid='+ Math.random());
}
function verificarCaptcha() {
	objForm = xajax.getFormValues('form');
	captchacode = objForm.captchacode;
	alert(captchacode);
}
function xajax_iniciarSesion() {
	// alert('aca xajax js '+login+ ' ** ' +password);
	password = '"' + password + '"';
	return xajax.request({
		xjxfun : "iniciarSesion"
	}, {
		URI : dominioJS + "app/cont/sesion/sesion.xajax.php",
		parameters : [ login, password, captchacode ]
	});
}
function iniciarSesion() {
	// alert('aca');
	inicializarValidador();
	validar('login', 'Usuario', REQUERIDO);
	validar('password', 'Clave', REQUERIDO);
//	validar('captchacode', 'Código', REQUERIDO);

	validarFormulario();
	if (validarFormulario()) {
		// alert('aca con '+xajax.getFormValues('form').login);
		// login = document.getElementById('login').value;
		objForm = xajax.getFormValues('form');
		login = objForm.login;
		password = objForm.password;
		captchacode = objForm.captchacode;
		if (password != '' && login != '') {
			password = CryptoJS.SHA1(password);
			// xajax_iniciarSesion(login, '"' + password + '"');
			xajax_iniciarSesion(login, password, captchacode);
		} else {
			// alert("passwords diferentes, por favor reingrese los passwords");
		}
	} else {
		reloadCaptcha();
	}
}
function limpiar() {
	document.getElementById('login').value = '';
	document.getElementById('password').value = '';
}
function xajax_modificarPassword() {
	// xajax.xajaxRequestUri = dominioJS + "app/cont/sesion/sesion.xajax.php";
	// return xajax.call("modificarPassword", arguments);
	return xajax.request({
		xjxfun : "modificarPassword"
	}, {
		URI : dominioJS + "app/cont/sesion/sesion.xajax.php",
		parameters : [ login, password ]
	});
}
function modificarPassword() {
	password = document.getElementById('Act_Password').value;
	password1 = document.getElementById('Re_Act_Password').value;
	if (password == password1 && password != '') {
		id = document.getElementById('usuarioId').value;
		password = CryptoJS.SHA1(password);
		// document.getElementById('Act_Password').value = "";
		// document.getElementById('Re_Act_Password').value = "";
		xajax_modificarPassword(id, '"' + password + '"');
	} else {
		ventanaAlerta('Claves diferentes, por favor reingrese las claves',
				'Alerta')
		// alert("Claves diferentes, por favor reingrese las claves");
		document.getElementById('Act_Password').value = "";
		document.getElementById('Act_Password').focus;
	}
}
function vntActClave() {
	new Jx.Button({
		label : 'Actualizar Clave',
		tooltip : 'Actualizar Clave',
		onClick : function() {
			// vntPequena('../sesion/actclave.php', 'Actualizar clave');
			// vntPequena('../sesion/actclave.php', 'Actualizar clave');
			vntPequena('../../../app/cont/sesion/actclave.php',
					'Actualizar clave');
		}
	}).addTo('btnActClave');
}
function cancelarRecuperar() {
	document.getElementById('divLogin').className = 'divLogin';
	document.getElementById('divRecuperar').className = 'invisible';
	document.getElementById('divNuevoUsuario').className = 'invisible';
	document.getElementById('errores').innerHTML = "";
}
function xajax_solicitarClave() {
	// xajax.xajaxRequestUri="https://lila.adm.ula.ve/glori/rh/app/cont/sesion/sesion.xajax.php";
	xajax.xajaxRequestUri = dominioJS + "app/cont/sesion/sesion.xajax.php";
	return xajax.call("solicitarClave", arguments);
}
function solicitarClave() {
	inicializarValidador();
	validar('cedula', 'Cédula', REQUERIDO);
	validar('email', 'Correo Electrónico', REQUERIDO);
	validarFormulario();

	cedula = document.getElementById('cedula').value;
	email = document.getElementById('email').value;

	if (validarFormulario()) {
		xajax_solicitarClave(cedula, email);
	}
}
function vtnRecuperar() {
	document.getElementById('divLogin').className = 'invisible';
	document.getElementById('divRecuperar').className = 'divLogin';
	document.getElementById('errores').innerHTML = "";
}
function vtnNuevoUsuario() {
	document.getElementById('divLogin').className = 'invisible';
	document.getElementById('divRecuperar').className = 'invisible';
	document.getElementById('divNuevoUsuario').className = 'divLogin';
	document.getElementById('errores').innerHTML = "";
}
function xajax_registrarNuevoUsuario() {
	// return xajax.request({xjxfun:"iniciarSesion"},{URI: dominioJS +
	// "app/cont/sesion/sesion.xajax.php",parameters:[login,password]});
	password = '"' + password + '"';
	// alert(cedula);
	// xajax.xajaxRequestUri = dominioJS +
	// "app/cont/sesion/sesion.xajax.php",parameters:[cedula,fechaIngreso,email,password]};
	return xajax.request({
		xjxfun : "registrarNuevoUsuario"
	}, {
		URI : dominioJS + "app/cont/sesion/sesion.xajax.php",
		parameters : [ cedula, numCtaNomina, email, emailAlt, password,pregSecRec,respPregSec ]
	});
	// xajax.xajaxRequestUri = dominioJS + "app/cont/sesion/sesion.xajax.php";
	// return xajax.call("registrarNuevoUsuario", arguments);
}
function registrarNuevoUsuario() {
	inicializarValidador();
	validar('cedulaNuevo', 'Cédula', REQUERIDO);
	// validar('fechaIngresoNuevo', 'Fecha de Ingreso', REQUERIDO);
	validar('numCtaNomina', 'Cuenta Nómina', REQUERIDO);
	validar('numCtaNomina', 'Cuenta Nómina', ENTERO);
	// validar('emailNuevo', 'Correo Electrónico', REQUERIDO);
//	validar('emailNuevo', 'Correo Electrónico', EMAILULA);
	validar('emailAlt', 'Correo Electrónico Alternativo', EMAIL);
//	validar('pregSecRec', 'Pregunta Secreta', REQUERIDO);
//	validar('respPregSec', 'Respuesta a la Pregunta Secreta', REQUERIDO);	
	validar('passwordNuevo', 'Clave', REQUERIDO);
	validar('passwordNuevo', 'Clave', PASSWORD);
	validar('confPasswordNuevo', 'Confirmar Clave', REQUERIDO);
	comparar('confPasswordNuevo', 'Clave', 'passwordNuevo', 'Confirmar Clave',
			IGUALQUE);
	validarFormulario();
	nacionalidad = jQuery("input[name='nacionalidadNuevo']:checked").val();
	cedula = document.getElementById('cedulaNuevo').value;

	while (cedula.length < 9) {
		cedula = '0' + cedula;
	}
	cedula = nacionalidad + cedula;
	// alert(cedula);
	// return
	// fechaIngreso = document.getElementById('fechaIngresoNuevo').value;
	numCtaNomina = document.getElementById('numCtaNomina').value;
	cuenta = document.getElementById('cuentaNuevo').value;
//	email = document.getElementById('emailNuevo').value;
	email = '';
	emailAlt = document.getElementById('emailAlt').value;
	password = document.getElementById('passwordNuevo').value;

	password = CryptoJS.SHA1(password);
//	pregSecRec = document.getElementById('pregSecRec').value;
//	respPregSec = document.getElementById('respPregSec').value;	
	pregSecRec = '';
	respPregSec = '';	

	if (validarFormulario()) {
		xajax_registrarNuevoUsuario(cedula, numCtaNomina, email, emailAlt, '"'
				+ password + '"',pregSecRec,respPregSec);
	}
}
function xajax_consultarCorreoUla() {
	// return xajax.request({xjxfun:"iniciarSesion"},{URI: dominioJS +
	// "app/cont/sesion/sesion.xajax.php",parameters:[login,password]});
	//password = '"' + password + '"';
	// alert(cedula);
	// xajax.xajaxRequestUri = dominioJS +
	// "app/cont/sesion/sesion.xajax.php",parameters:[cedula,fechaIngreso,email,password]};
	return xajax.request({
		xjxfun : "consultarCorreoUla"
	}, {
		URI : dominioJS + "app/cont/sesion/sesion.xajax.php",
		parameters : [ cedula ]
	});
	// xajax.xajaxRequestUri = dominioJS + "app/cont/sesion/sesion.xajax.php";
	// return xajax.call("registrarNuevoUsuario", arguments);
}
function consultarCorreoUla() {
	inicializarValidador();
	validar('cedulaNuevo', 'Cédula', REQUERIDO);
	validar('cedulaNuevo', 'Cédula', ENTERO);
	validarFormulario();
	nacionalidad = jQuery("input[name='nacionalidadNuevo']:checked").val();
	cedula = document.getElementById('cedulaNuevo').value;
	
	while (cedula.length < 9) {
		cedula = '0' + cedula;
	}
	cedula = nacionalidad + cedula;
	
	if (validarFormulario()) {
		xajax_consultarCorreoUla(cedula);
	}
}
function xajax_consultarNombre() {
	return xajax.request({
		xjxfun : "consultarNombre"
	}, {
		URI : dominioJS + "app/cont/sesion/sesion.xajax.php",
		parameters : [ cedula ]
	});
	// xajax.xajaxRequestUri = dominioJS + "app/cont/sesion/sesion.xajax.php";
	// return xajax.call("registrarNuevoUsuario", arguments);
}
function consultarNombre() {
	nacionalidad = jQuery("input[name='nacionalidadNuevo']:checked").val();
	cedula = document.getElementById('cedulaNuevo').value;
	if(cedula.length>0){
		while (cedula.length < 9) {
			cedula = '0' + cedula;
		}
		cedula = nacionalidad + cedula;
	
		if (validarFormulario()) {
			xajax_consultarNombre(cedula);
		}
	}
}
function seleccionarCedula(){
	nacionalidad = jQuery("input[name='nacionalidadNuevo']:checked").val();
	cedula = document.getElementById('cedulaNuevo').value;
	if(cedula.length>0){
		while (cedula.length < 9) {
			cedula = '0' + cedula;
		}
		cedula = nacionalidad + cedula;	
		document.getElementById('cuentaNuevo').value = cedula;
	}
}