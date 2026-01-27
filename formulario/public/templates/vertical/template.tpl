<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{$NOM_PROYECTO}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$CHARSET}" />
	<link rel="stylesheet" type="text/css" href="{$PATH_TEMPLATE}marco.css" />
	
	<link rel="stylesheet" type="text/css" href="{$PATH_CSS}formulario.css" />
	
	<link rel="stylesheet" type="text/css" href="{$PATH_CSS}menu.css" />
	<script type='text/javascript' src='{$PATH_JS}menu.js'></script>
	<script type='text/javascript' src='{$PATH_JS}validar.js'></script>
	<!-- validaciones javascript -->
<!--	<script type="text/javascript">
		validar('login', 'Usuario', REQUERIDO);
		validar('password', 'Contraseña', REQUERIDO);
		validar('inventarioid', 'Inventario', REQUERIDO);
	</script>-->
</head>
<body>

<div class="marco-principal">inicio marco-principal-vertical
	{include file="cabecera.tpl"}
	{include file="barra.tpl"}

	<div class="marco-contenido">inicio marco-contenido
		<center>
		{include file='$PATH_MENUmenu.tpl'}
		<div class="marco-centro-">
		inicio marco-centro
			<a id='ancla' href='#'></a>
			<div class="line-title">
				<h1>BIENVENIDOS</h1>
			</div>
			<div id="errores">
				{if $error != ""}<div id="msg-error" class="msg-red">{$error}</div>{/if}
				{if $exito != ""}<div id="msg-exito" class="msg-green">{$exito}</div>{/if}
				{if $info  != ""}<div id="msg-info" class="msg-blue">{$info}</div>{/if}
			</div>
			{include file="$pagina"}
		fin marco-centro			
		</div>	
		</center>	
	marco-contenido
	</div>
	{include file="pie.tpl"}
	fin marco-principal
</div>

</body>
</html>