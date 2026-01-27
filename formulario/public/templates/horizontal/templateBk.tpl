<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset={$CHARSET}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{$NOM_PROYECTO}</title>
<!--Inicio Librerias Bootstrap-->
    <link href="{$PATH_CSS}jumbotron.css" rel="stylesheet">
	<link href="{$PATH_CSS}style.css" rel="stylesheet">
	<script src="{$PATH_JS}bootstrap/ie-emulation-modes-warning.js"></script>
<!--Fin Librerias Bootstrap-->
      
<!-- Inicio hojas de estilo -->
	<link rel="stylesheet" href="{$PATH_CSS}cssDsia.css" type="text/css" media="screen" charset="{$CHARSET}">	
	<link rel="stylesheet" type="text/css" href="{$PATH_TEMPLATE}marco.css" />
	<link rel="stylesheet" type="text/css" href="{$PATH_CSS}formularioMF.css" />
	<link rel="stylesheet" href="{$PUB_URL}themes/delicious/jxtheme.css" type="text/css" media="screen" charset="{$CHARSET}">
	
	<link rel="stylesheet" href="{$PUB_URL}css/estilo.css" type="text/css" media="screen" charset="{$CHARSET}">
<!--	<link rel="stylesheet" href="{$PUB_URL}css/estilo_div.css" type="text/css" media="screen" charset="{$CHARSET}">-->
<!--	<link rel="stylesheet" href="{$PUB_URL}css/estilo_div_tabs.css" type="text/css" media="screen" charset="{$CHARSET}">-->
<!--	<link rel="stylesheet" href="{$PUB_URL}css/estilo_div_tabs_plan.css" type="text/css" media="screen" charset="{$CHARSET}">-->
	<link rel="stylesheet" href="{$PUB_URL}css/estilo_php.css" type="text/css" media="screen" charset="{$CHARSET}">
<!-- Fin hojas de estilo -->
	
<!-- Inicio Configuracion del calendario -->
	<link rel='stylesheet' type='text/css' media='all' href='{$PATH_JS}jscalendar/calendar-blue.css' title='winter' />
	<script type='text/javascript' src='{$PATH_JS}jscalendar/calendar.js'></script>
	<script type='text/javascript' src='{$PATH_JS}jscalendar/lang/calendar-es.js'></script>
	<script type='text/javascript' src='{$PATH_JS}jscalendar/calendar-setup.js'></script>
<!-- Fin Configuracion del calendario -->

<!--Inicio Librerias grid-->
	<link rel='stylesheet' type='text/css' href='{$PATH_JS}grid2/dhtmlx.css'/>
	<script  src='{$PATH_JS}grid2/dhtmlx.js'></script>
<!--Fin Librerias grid-->

<!--Inicio Librerias js-->
	<script type='text/javascript' src='{$PATH_JS}combo.js'></script>
	<script type="text/javascript" src="{$PATH_JS}sha1.js"></script>
  	<script type="text/javascript" src="{$PATH_JS}jxlib.uncompressed.js"></script>
	<script type="text/javascript" src="{$PATH_JS_SIST}plantillaDsia1.js"></script>
	<script type="text/javascript" src="{$PATH_JS}xajax05/xajax_js/xajax_core_uncompressed.js"></script>	
	<script type='text/javascript' src="{$PATH_JS}validar.js"></script>
	{if $MENU_USU != ''}
		<script type='text/javascript' src="{$PATH_JS_SIST}{$MENU_USU}.js"></script>
	{/if}
	<!-- jquery-1.11.3.js -->
    <link type="text/css" href="{$PATH_JS}jquery-ui1.11.4/jquery-ui.css" rel="Stylesheet" />
    <script type="text/javascript" src="{$PATH_JS}jquery.min.js"></script>
<!--    <script type="text/javascript" src="{$PATH_JS}jquery-1.12.0.min.js"></script>-->
    <script>jQuery.noConflict();</script>
    <script type="text/javascript" src="{$PATH_JS}jquery-ui1.11.4/jquery-ui.min.js"></script>    
<!--Fin Librerias js-->	
</head>
<body>
	<div id="contenedor">
		<div id="encabezado">{include file="cabecera.tpl"}</div>
		<div id="perfil_usuario" class="perfil_usuario">{$PERFIL_USUARIO}</div>		
		<div id="barras"></div>
		<div id="barra1" class=''>
			{if $desactivar != true}
				 <div id="menu"></div>
			{/if}
		</div>
		<div id="barra2" class=""></div>		
		<div id="contenido" class="marco-centro">
			{include file="$pagina"}
		</div>
		<div id="barra3" >
			{if $desactivarOpciones != true}
				{include file='../../../app/comun/botoneraH.tpl'}	
			{/if}		
		</div>
		<div id="piePagina" class="barraEstado">
			{include file="pie.tpl"}
		</div>
	</div>
	{literal}
		<script type="text/javascript">
			configuracion();
		</script>
	{/literal}	
	{if $desactivar != true}	
		{literal}	
		<script type="text/javascript">
			menuPrincipal();
		</script>		
		{/literal}
	{/if}
	<div id='idVentanaEmergente'></div>	
<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="alertModalTitulo">Información</h4>
      </div>
      <div class="modal-body" id="alertModalContenido">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="alertModalBoton">Cerrar</button>
        <div id="contenedorBoton" name="contenedorBoton"></div>
      </div>
    </div>
  </div>
</div>	

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span>ENTRADA AL SISTEMA</h4>
        </div>
        <div class="modal-body">
				<form class="form-signin" role="form" name="formSignIn" id="formSignIn">				
					<div>
						<input id="login" name="login" type="text" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1">
					    <br>
						<input id="password" name="password" type="password" class="form-control" placeholder="Clave" aria-describedby="basic-addon1">
						<br>	
						<button type="button" class="btn btn-primary" onclick='iniciarSesion();'>Registrar</button>
						<button type="button" class="btn btn-default" onclick='limpiar();'>Limpiar</button>
<!--						<button type="submit" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Salir</button>-->
						<button type="submit" class="btn btn-default" data-dismiss="modal">Salir</button>
						<br><br>	
							<br>
					</div>
				  </form>
        </div>
      </div>
    </div>
  </div> 
</body>
</html>
<!--     Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$PATH_JS}bootstrap/bootstrap.min.js"></script>    
	<link href="{$PATH_CSS}bootstrap.min.css" rel="stylesheet">    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{$PATH_JS}bootstrap/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" href="{$PUB_URLSIST}css/cssSist.css" type="text/css" media="screen" charset="{$CHARSET}">
    
    {literal}
    <script>
    jQuery( "#contenedor" ).click(function() {
//      alert( "Handler for .click() called." );
//      xajax_edoSession();
    });
    </script>
    {/literal}    