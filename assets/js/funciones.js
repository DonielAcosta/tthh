//maximizar la ventana actual
function max_ventana(){
	window.moveTo(0,0);
	window.resizeTo(screen.width,screen.height);
}

// funcion que establece el formato de un numero
function set_formato_numero(numero, decimales, separador_decimal, separador_miles){
	numero = parseFloat(numero);
	if(isNaN(numero))
		return "";
	
	// establecemos el numero de decimales
	if(decimales !== undefined)
		numero = numero.toFixed(decimales);

	// Convertimos el punto en separador_decimal
	numero = numero.toString().replace(".", separador_decimal !== undefined ? separador_decimal : ",");

	// Añadimos los separadores de miles
	if(separador_miles){
		var miles = new RegExp("(-?[0-9]+)([0-9]{3})");
        		
		while(miles.test(numero))
			numero = numero.replace(miles, "$1" + separador_miles + "$2");
	}
	return numero;
}
		
// quita el formato a un numero			
function unset_formato_numero(numero){
	var valor = numero.replace(".", "");

	return valor.replace(",", ".");
}

// la cadena recibida tiene caracteres?
function is_empty(valor)
{
	return (valor == null || valor.length == 0 || /^\s+$/.test(valor)) ? true : false;
}

// confirmar una accion
function confirmar(cadena)
{
	return confirm(cadena);
}

// pasar una cadena a mayusculas
function toUpper(cadena)
{
	return cadena.toUpperCase();
} 

// pasa una fecha en formato 'dd/mm/aaaa' a 'aaaa-mm-dd'
function fechaEs2En(fecha)
{
	fecha_array = fecha.split("/");
	valor = fecha_array[2] + "-" + fecha_array[1] + "-" + fecha_array[0];
	return valor;
}

// crea un archivo CVS (reconocido por excel) de un array de objetos json
function DownloadJSON2CSV(objArray)
{
	var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;

	var str = '';

	for (var i = 0; i < array.length; i++) {
		var line = '';

		for (var index in array[i]) {
			line += array[i][index] + ';';
		}

		// Here is an example where you would wrap the values in double quotes
		// for (var index in array[i]) {
		//    line += '"' + array[i][index] + '",';
		// }

		line.slice(0,line.Length-1); 

		str += line + '\r\n';
	}
	window.open( "data:text/csv;charset=utf-8," + escape(str))
}
