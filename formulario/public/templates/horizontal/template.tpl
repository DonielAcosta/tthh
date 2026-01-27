<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  	<meta http-equiv="Content-Type" content="text/html;charset={$CHARSET}" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>{$NOM_PROYECTO}</title>
	<link type="text/css" href="{$PATH_CSS}styleV2.css" rel="stylesheet">
<!--Inicio Librerias js-->	
	<script type="text/javascript" src="{$PATH_JS_SIST}funciones.js"></script>
	<script type="text/javascript" src="{$PATH_JS}xajax05/xajax_js/xajax_core_uncompressed.js"></script>	
	<script type='text/javascript' src="{$PATH_JS}validar.js"></script>
	
	<!-- jquery-1.11.3.js -->
    <script type="text/javascript" src="{$PATH_JS}jquery.min.js"></script>
    <script>jQuery.noConflict();</script>
    
    <script type="text/javascript" src="{$PATH_JS}sha1.js"></script>
<!--Fin Librerias js-->	

<!--     Bootstrap core JavaScript-->
    <script type="text/javascript" src="{$PUB_URL}bootstrap441/js/bootstrap.min.js"></script>
	<link type="text/css" href="{$PUB_URL}bootstrap441/css/bootstrap.min.css" rel="stylesheet">    

<!--     Bootstrap Calendar-->
    <script type="text/javascript" src="{$PUB_URL}bootstrap4-datetimepicker/build/js/Moment.js"></script>
    <script type="text/javascript" src="{$PUB_URL}bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link type="text/css" href="{$PUB_URL}bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">    
<!--<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">-->
<!--<script src="js/bootstrap-datetimepicker.min.js"></script>	-->
    <!-- Librerias propias del sistema -->
    
<!--    <link rel="stylesheet" href="{$PUB_URLSIST}css/cssSist.css" type="text/css" media="screen" charset="{$CHARSET}">-->
	<link rel="stylesheet" href="{$PUB_URLSIST}css/nuevo.css" type="text/css" media="screen" charset="{$CHARSET}">    
</head>
<body>
	<div id="encabezado" class="marco-cabecera">	
		<div id="barraEncabezado" class=''>
			{include file="cabecera.tpl"}
		</div>
	</div>
	<div id="contenedor" class="marco-centro">
		<div id="barraMenuOpciones" class="menuOpciones">
			{if $desactivarOpciones != true}
				{include file='../../../app/comun/botoneraH.tpl'}	
			{/if}		
		</div>	
		{include file="$pagina"}
	</div>
	<div id="piePagina" class="marco-pie">
		{include file="pie.tpl"}
	</div>	
	{include file="../../../app/comun/tplModal.tpl"}
</body>
</html>