<div class='pagina'>
<div class="btn-group" role="group" aria-label="...">
<div style="margin-top: 5px;" id='cancelar' onclick="cerrarvntPequena();" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left btn-verde"></div>
<div class='line-title-con'>
		<h4>Ficha </h4>
	</div>
</div>
	<form name='form' id='form' method='post' action='{$valorForm}'>
		<div class='line-title'>
			<h4>{if $opt == 'g'} Agregar {elseif $opt == 'm' || $opt == 'mr'} Modificar {/if} </h4>
		</div>
		<a id='ancla' href='#'></a>
		<input type='hidden' id='opcion' name='opcion'  value='' readonly>
		<div id='errores'>
			{if $error != ''}<div id='msg-error' class='msg-red'>{$error}</div>{/if}
			{if $exito != ''}<div id='msg-exito' class='msg-green'>{$exito}</div>{/if}
			{if $info  != ''}<div id='msg-info' class='msg-blue'>{$info}</div>{/if}
		</div>
		<fieldset>
 		<div class='container-fluid'>
 			<div class="row contenidoVer" style="width:60%">
<div class="form-group col-lg-12">
	<label class="col-lg-3 control-label">IdEdoCivil edocivil</label>
	<div class="col-lg-3">
		{$idEdoCivil}	</div>
</div>
<div class="form-group col-lg-12">
	<label class="col-lg-3 control-label">NomEdoCivil edocivil</label>
	<div class="col-lg-3">
		{$nomEdoCivil}	</div>
</div>
<div class="form-group col-lg-12">
	<label class="col-lg-3 control-label">DescEdoCivil edocivil</label>
	<div class="col-lg-3">
		{$descEdoCivil}	</div>
</div>
		</div>
</div>
		</fieldset>
	<br />
		<input type='hidden' id='opt' name='opt' value='{$opt}' readonly/>
		<input type='hidden' id='idedocivil' name='idedocivil' value='{$idedocivil}' readonly/>
		<input id='ids' name='ids' type='hidden' value='' readonly/>

	</form>
</div>
