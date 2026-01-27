<?php 
/**
* Metodo: 	FechaEs2En
* Autor: 	Carlos Iturralde
* Funcion:	Transforma una fecha en formato español(dd/mm/YYYY) 
*			a formato ingles(YYYY-mm-dd)
* Retorna:  Fecha en formato inlges
* Param:	$fecha
* Fecha:
**/
 	
function FechaEs2En($fecha="")
{
	if (empty($fecha))
		return NULL;
	else{
	   $trozos = explode("/",$fecha,3);
	   return $trozos[2]."-".$trozos[1]."-".$trozos[0]; 
	 }
}
//////////////////////// FIN DE: FechaEs2En /////////////////////////

/**
* Metodo: 	FechaEn2Es
* Autor: 	Carlos Iturralde
* Funcion:	Transforma una fecha en formato ingles(YYYY-mm-dd)
*			a formato español(dd/mm/YYYY) 
* Retorna:  Fecha en formato español
* Param:	$fecha
* Fecha:
**/
 	
function FechaEn2Es($fecha="")
{
	return (empty($fecha) ? NULL : date("d/m/Y",strtotime($fecha)));
} 
//////////////////////// FIN DE: FechaEn2Es /////////////////////////

/**
 * Contar los dias entre dos fechas
 * @autor 		Carlos Iturralde
 * @access 		public
 * @param		date	$desde
 *				date	$hasta
 * @return		integer	nuemro de dias entre las fechas
 * @version		18/06/2015
 */
function total_dias($desde='', $hasta='')
{
	if ( empty($desde) || empty($hasta) ) return 0;
	if ($desde > $hasta){
		$r 		= $desde;
		$desde 	= $hasta;
		$hasta 	= $r;
	}
	$datetime1 = new DateTime($desde);
	$datetime2 = new DateTime($hasta);
	return $datetime1->diff($datetime2)->format('%a');
}
/////////////////// FIN DE: total_dias ////////////////

/**
 * Contar los dias x que hay entre dos fechas
 * @autor 		Carlos Iturralde
 * @access 		public
 * @param		interger	$dia	dia de la semana a contar
 *									0 (domingo) hasta 6 (sábado)
 * 				date		$desde
 *				date		$hasta
 * @version		18/06/2015
 */
function cantidad_dias($dia=0, $desde='', $hasta='')
{
	if ( empty($desde) || empty($hasta) ) return 0;
	if ($desde > $hasta){
		$r 		= $desde;
		$desde 	= $hasta;
		$hasta 	= $r;
	}
	$a = new DateTime($desde);
	$b = new DateTime($hasta);
	$total 	= 0;
	while($a->getTimestamp() <= $b->getTimestamp()){
		if ( $a->format('w') == $dia )
			$total++;
		$a->add(new DateInterval('P1D'));
	}
	return $total;
}
/////////////////// FIN DE: cantidad_dias ////////////////

/**
 * Añadir n dias a una fecha determinada
 * @autor 		Carlos Iturralde
 * @access 		public
 * @param		date		$fecha
 * 				integer		$ndias	numero de dias a agregar
 * @return		date		nueva fecha
 * @version		25/06/2015
 */
function add_dias($fecha, $ndias)
{
	$fecha = new DateTime($fecha);
	$fecha->add(new DateInterval('P'.$ndias.'D'));
	return $fecha->format('Y-m-d');
}
/////////////////// FIN DE: add_dias ////////////////
