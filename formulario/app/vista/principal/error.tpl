<div class="pagina">
	<a id='ancla' href='#'></a>
	<div class="line-title">
		<h1>{$etiquetaModulo}</h1>
	</div>
	<div id="errores">
		{if $error != ""}<div id="msg-error" class="msg-red">{$error}</div>{/if}
		{if $exito != ""}<div id="msg-exito" class="msg-green">{$exito}</div>{/if}
		{if $info  != ""}<div id="msg-info" class="msg-blue">{$info}</div>{/if}
	</div>			
	<center class="line-title">
		<div id="msg-error" class="msg-red">{$msgError}</div>
	</center>			
</div>