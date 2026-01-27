{include file="../../../app/comun/libGrid.tpl"}
<div class='pagina'>
	<form name='form' id='form' method='post' action='{$valorForm}'>
		<a id='ancla' href='#'></a>
		<input type='hidden' id='opcion' name='opcion'  value='' readonly>
		<div id='errores'>
			{if $error != ''}<div id='msg-error' class='msg-red'>{$error}</div>{/if}
			{if $exito != ''}<div id='msg-exito' class='msg-green'>{$exito}</div>{/if}
			{if $info  != ''}<div id='msg-info' class='msg-blue'>{$info}</div>{/if}
		</div>
			<br>
		<fieldset>
        <script>xajax_llenarGridEdocivil('','');</script>
<center>
<div id='paginacion'></div>
<div id='boxEdocivil' class='div-grid-consulta'></div>
<div id='paginacion1'></div>
</center>
        <!-- Grid -->
        <script>
                gridEdocivil = new dhtmlXGridObject('boxEdocivil');
                gridEdocivil.setDelimiter('|');
                gridEdocivil.setHeader('|Imp|Ver|Editar|Id|Nombre|Descripción');
                gridEdocivil.enableColumnAutoSize(true);
                gridEdocivil.setInitWidths('25|60|60|60|100|250|*');
                gridEdocivil.setColAlign('center|center|center|center|right|left|left');
//              gridEdocivil.attachEvent('onRowDblClicked',eliminarCondicion);
                gridEdocivil.setColTypes('ro|ro|ro|ro|ro|ro|ro');
                gridEdocivil.setColSorting('str|str|str|str|int|str|str');
                gridEdocivil.setImagePath('../../rec/img/grid/');
                gridEdocivil.enableMultiselect(false);
                gridEdocivil.enableLightMouseNavigation(true);
                gridEdocivil.init();
//			   gridEdocivil.attachHeader('A,B,C');
        </script>
        <!-- Fin de Grid -->
		</fieldset>
	<br />
		<input type='hidden' id='opt' name='opt' value='{$opt}' readonly/>
		<input type='hidden' id='edocivilid' name='edocivilid' value='{$edocivilid}' readonly/>
		<input id='ids' name='ids' type='hidden' value='' readonly/>

	</form>
</div>