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
	<div class="form-group col-md-6">
		<label class="control-label"><span class='label-red'>*</span> Casa N°</label>
		<div class="input-group mb-3">
			<input type='text' class="form-control input-sm" id='numCasa' name='opt' value=''/>
		  	<div class="input-group-append">
		    	<button type="button" class="btn btn-primary" onclick="xajax_llenarGridPersona(xajax.$('numCasa').value,0);">Buscar</button>
		  	</div>
		</div>
	</div>			
			<br>
		<fieldset>
        <script>xajax_llenarGridPersona('','');</script>
<center>
<div id='paginacion'></div>
<div id='boxPersona' class='div-grid-consulta'></div>
<div id='paginacion1'></div>
</center>
        <!-- Grid -->
        <script>
                gridPersona = new dhtmlXGridObject('boxPersona');
                gridPersona.setDelimiter('|');
                gridPersona.setHeader('|Ver|Editar|Cédula|Nombres y Apellidos|Login|N° Apart.|Correo|Rol|Edo');
                gridPersona.enableColumnAutoSize(true);
                gridPersona.setInitWidths('25|60|60|100|*|80|100|*|100|60');
                gridPersona.setColAlign('center|center|center|center|left|left|center|center|left|center|center');
//              gridPersona.attachEvent('onRowDblClicked',eliminarCondicion);
                gridPersona.setColTypes('ro|ro|ro|ro|ro|ro|ro|ro|ro|ro|ro');
                gridPersona.setColSorting('str|str|str|str|str|str|str|str|str|str|str');
                gridPersona.setImagePath('../../rec/img/grid/');
                gridPersona.enableMultiselect(false);
                gridPersona.enableLightMouseNavigation(true);
                gridPersona.init();
//			   gridPersona.attachHeader('A,B,C');
        </script>
        <!-- Fin de Grid -->
		</fieldset>
	<br />
		<input type='hidden' id='opt' name='opt' value='{$opt}' readonly/>
		<input type='hidden' id='personaid' name='personaid' value='{$personaid}' readonly/>
		<input id='ids' name='ids' type='hidden' value='' readonly/>

	</form>
</div>
