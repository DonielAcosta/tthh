<?php 
function construirComboOpciones($id){
	//$comboTipo='<select id='.$id.' onChange=asignarValor(this.id,this.value)>
	$comboTipo='<select name='.$id.' id=comboTipo'.$id.' onChange=xajax_asignarValor(this.name,this.value)>
				<option value=0>Seleccione</option>
				<option value=1>Constante</option>
				<option value=2>Campo BD</option>
				<option value=3>Fecha</option>
			</select>';
	return $comboTipo;
}
function construirComboOpcionesNew($id,$valor){
	$matDatos = array(0=>'Selecciones',1=>'Constante',2=>'Campo BD',3=>'Fecha');
	$i=0;
//	$comboTipo='<select name='.$id.' id=comboTipo'.$id.' onChange=asignarValor(this.name,this.value)>';// comentado por actualizacion a xajax 0.5
	$comboTipo='<select name='.$id.' id=comboTipo'.$id.' onChange=xajax_asignarValor(this.name,this.value)>';	
	foreach ($matDatos as $ite) {
//		echo "($i==$valor)";   
		if ($i==$valor) {
			$comboTipo.="<option value=".$i." selected>".$ite."</option>";
		}else{
			$comboTipo.="<option value=".$i.">".$ite."</option>";
		}
		$i++;
	}
	$comboTipo.='</select>';
	//$comboTipo='<select id='.$id.' onChange=asignarValor(this.id,this.value)>
	/*
	$comboTipo='<select name='.$id.' id=comboTipo'.$id.' onChange=asignarValor(this.name,this.value)>
				<option value=0>Seleccione</option>
				<option value=1>Constante</option>
				<option value=2>Campo BD</option>
				<option value=3>Fecha</option>
			</select>';
	*/
	return $comboTipo;
}
function comboTiposFecha($id,$valorCombo){
	$n=8;
	for ($i = 0; $i < $n; $i++) {
		eval("\$sel$i = \"\";");
	}	
	eval("\$sel$valorCombo = \"Selected\";");
	$comboTipo='<select id=comboFecha'.$id.'>
				<option value=0 '.$sel0.'>Seleccione</option>
				<option value=1 '.$sel1.'>Fecha (dd/mm/YYYY)</option>
				<option value=2 '.$sel2.'>Día (Número)</option>
				<option value=3 '.$sel3.'>Día (Letras)</option>
				<option value=4 '.$sel4.'>Mes (Número)</option>
				<option value=5 '.$sel5.'>Mes (Letras)</option>
				<option value=6 '.$sel6.'>Año (Número)</option>
				<option value=7 '.$sel7.'>Año (Letras)</option>
				
			</select>';
	//$comboTipo = utf8_encode($comboTipo);
	$comboTipo = ($comboTipo);
	return $comboTipo;
}
function comboCamposBdTradicional($id){
	/*
	 $Reporte = new Reporte();
	$resultado = $Reporte->consultarCamposTablaReporte();
	$Reporte->cerrarConexion();

	$Reporte = new Reporte();
	$resultado = $Reporte->consultarCamposTablaPersona();
	$Reporte->cerrarConexion();
	*/
	//var_dump($resultado);

	$resultado = array('CEDULA','APENOMTRAB','DESCRIPDEP','DESCRIPDPT','DENOMINACION','DEDICACION','FECHAINGRESO',
		'SUELDO',
		'SUELDOBASE',
		'SUELDONORMAL',
		'SUELDOINTEGRAL',
		'BONOVACACIONAL',
		'BONO_ASISTENCIAL',
		'AGUINALDO',
		'DIRHABITACION',
		'DESC_CONDICION',
		'DESC_ESTRUCTURA',
		'ANIO',
		'MES',
		'PRIMASSALARIALES'
	);
	$resultadoEtiquetas = array('Cédula','Nombre','Desc. Dependencia','Desc. Departamento','Denominación','Dedicación','Fecha Ingreso',
			'Sueldo',
			'Sueldo Base',
			'Sueldo Normal',
			'Sueldo Integral',
			'Bono Vacacional',
			'Bono Asistencial',
			'Aguinaldo',
			'Dir. Habitación',
			'Letra Expediente',
			'Estructura',
			'Año Nómina',
			'Mes Nómina',
			'Primas Salariales'			
	);
	
	$i=0;
	foreach ($resultado as $ite) {
		//$datos[utf8_encode($ite)] = array(utf8_encode($resultadoEtiquetas[$i])); 
		$datos[] = array('id'=>($ite),'valor'=>($resultadoEtiquetas[$i])); 
		$i++;
	}
	//var_dump($datos);
	asort($datos);
	//var_dump($datos);
	$comboTipo='<select id=comboBd'.$id.' onChange=xajax_asignarValor(this.id,this.value)>';
	$comboTipo.='<option value=0>Seleccione</option>';
	$i=0;
	foreach ($datos as $ite) {
		//$comboTipo.=utf8_encode('<option value='.$ite['id'].'>'.$ite['valor'].'</option>');
		$comboTipo.=('<option value='.$ite['id'].'>'.$ite['valor'].'</option>');
		$i++;
	}
	$comboTipo.='</select>';	
	
	/*
$comboTipo='<select id=comboBd'.$id.' onChange=asignarValor(this.id,this.value)>';
	$comboTipo.='<option value=0>Seleccione</option>';
	$i=0;
	foreach ($resultado as $ite) {
		$comboTipo.=utf8_encode('<option value='.$ite.'>'.$resultadoEtiquetas[$i].'</option>');
		$i++;
	}
	$comboTipo.='</select>';
	 */

	return $comboTipo;
}
function comboCamposBd($id,$valorBD=''){
	/*
	 $Reporte = new Reporte();
	$resultado = $Reporte->consultarCamposTablaReporte();
	$Reporte->cerrarConexion();

	$Reporte = new Reporte();
	$resultado = $Reporte->consultarCamposTablaPersona();
	$Reporte->cerrarConexion();
	*/
	//var_dump($resultado);

	$resultado = array('CEDULA','APENOMTRAB','DESCRIPDEP','DESCRIPDPT','DENOMINACION','DEDICACION','FECHAINGRESO',
		'SUELDO',
		'SUELDOBASE',
		'SUELDONORMAL',
		'SUELDOINTEGRAL',
		'BONOVACACIONAL',
		'BONO_ASISTENCIAL',
		'AGUINALDO',
		'FECHAUTLMOV',
		'FECHAPENULTMOV',
		'DIRHABITACION',
		'DESC_CONDICION',
		'DESC_ESTRUCTURA',
		'ANIO',
		'MES',
		'DESC_CONDICION',
		'PRIMASSALARIALES'
	);
	$resultadoEtiquetas = array('Cédula','Nombre','Desc. Dependencia','Desc. Departamento','Denominación','Dedicación','Fecha Ingreso',
			'Sueldo',
			'Sueldo Base',
			'Sueldo Normal',
			'Sueldo Integral',
			'Bono Vacacional',
			'Bono Asistencial',
			'Aguinaldo',
			'Fecha Ult. Mov.',
			'Fecha Pen. Mov.',
			'Dir. Habitación',
			'Letra Expediente',
			'Estructura',
			'Año Nómina',
			'Mes Nómina',
			'CONDICION',
			'Primas Salariales'				
	);
	
	$i=0;
	foreach ($resultado as $ite) {
		//$datos[utf8_encode($ite)] = array(utf8_encode($resultadoEtiquetas[$i])); 
		$datos[] = array('id'=>($ite),'valor'=>($resultadoEtiquetas[$i])); 
		$i++;
	}
	//var_dump($datos);
	asort($datos);
	//var_dump($datos);
	$comboTipo='<select id=comboBd'.$id.' onChange=xajax_asignarValor(this.id,this.value)>';
	$comboTipo.='<option value=0>Seleccione</option>';
	$i=0;
	foreach ($datos as $ite) {
		//$comboTipo.=utf8_encode('<option value='.$ite['id'].'>'.$ite['valor'].'</option>');
		if($ite['id']==$valorBD){
			$comboTipo.=('<option selected value='.$ite['id'].'>'.$ite['valor'].'</option>');
		}else{
			$comboTipo.=('<option value='.$ite['id'].'>'.$ite['valor'].'</option>');
		}
		
		$i++;
	}
	$comboTipo.='</select>';	
	
	/*
$comboTipo='<select id=comboBd'.$id.' onChange=asignarValor(this.id,this.value)>';
	$comboTipo.='<option value=0>Seleccione</option>';
	$i=0;
	foreach ($resultado as $ite) {
		$comboTipo.=utf8_encode('<option value='.$ite.'>'.$resultadoEtiquetas[$i].'</option>');
		$i++;
	}
	$comboTipo.='</select>';
	 */

	return $comboTipo;
}
?>