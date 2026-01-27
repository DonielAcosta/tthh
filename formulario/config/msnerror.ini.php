<?php
/**
 * Clase de Mensajes
 *
 */
class Messages {
	const EXITO_REGISTRAR = "Se han registrado los datos correctamente";
	const ERROR_REGISTRAR = "No se han podido registrar los datos. Por favor, intente de nuevo";
	const EXITO_INGRESAR = "Se han ingresado los datos correctamente";
	const ERROR_INGRESAR = "No se han podido ingresar los datos. Por favor, intente de nuevo";
	const EXITO_ACTUALIZAR = "Se han actualizado los datos correctamente";
	const ERROR_ACTUALIZAR = "No se han podido actualizar los datos. Por favor, intente de nuevo";
	const EXITO_ELIMINAR = "Se han eliminado los datos correctamente";
	const ERROR_ELIMINAR = "No se han podido eliminar los datos. Por favor, intente de nuevo";
	const ERROR_ELIMINAR_POR_ASOCIACION = "No se han podido eliminar los datos debido a que se encuentra asociado a otras tablas";
	const ERROR_EXISTE_CODIGO = "El código de %subject% ya existe. Por favor, intente de nuevo cambiando el código";
	const ERROR_EXISTE_NOMBRE = "El nombre de %subject% ya existe. Por favor, intente de nuevo cambiando el nombre";
	const ERROR_EXISTE_NOMINA = "La nomina perteneciente al mes seleccionado ya ha sido creada. Por favor, intente de nuevo cambiando el mes";
	const ERROR_INICIOSESION = "Ha ocurrido un error al tratar de iniciar la sesión. Por favor, intente de nuevo";
	const ERROR_NOAUTORIZADO = "Ud. no se encuentra autorizado para ingresar al sistema. Por favor, pongase en contacto con el administrador del sistema";
	const ERROR_LOGINPASS = "El campo Usuario o Contraseña son inválidos";
	const INFO_BUSQUEDA_NOEXITOSA = "No se ha encontrado ningún registro según el criterio de consulta seleccionado";
	const ERROR_EXISTE_CEDULA = "El nro. de cédula ya se encuentra registrado. Por favor, verifique los datos";
	const ERROR_EXISTE_RIF = "El nro. de Rif %subject% ya se encuentra registrado. Por favor, verifique los datos";
	const EXITO_INGRESAR_DESCRIPCION = "ingreso %subject% realizado satisfactoriamente.";
	const EXITO_ACTUALIZAR_DESCRIPCION = "modificaci�n de %subject% realizado satisfactoriamente.";
	const ERROR_EXISTE_DESCRIPCION = "Est� tratando de ingresar %subject% que ya existe. Por favor, intente de nuevo cambiando la descripci�n";
	const ERROR_EXISTE_VALOR = "Está tratando de ingresar %subject% que ya existe. Por favor, intente de nuevo cambiando el número";
	static function replaceMessage($strReplace, $constMessage) {
		return str_replace ( "%subject%", $strReplace, $constMessage );
	}
}
?>