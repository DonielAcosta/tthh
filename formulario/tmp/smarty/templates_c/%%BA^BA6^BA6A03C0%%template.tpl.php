<?php /* Smarty version 2.6.30, created on 2021-09-22 02:52:05
         compiled from template.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  	<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_tpl_vars['CHARSET']; ?>
" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?php echo $this->_tpl_vars['NOM_PROYECTO']; ?>
</title>
	<link type="text/css" href="<?php echo $this->_tpl_vars['PATH_CSS']; ?>
styleV2.css" rel="stylesheet">
<!--Inicio Librerias js-->	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PATH_JS_SIST']; ?>
funciones.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PATH_JS']; ?>
xajax05/xajax_js/xajax_core_uncompressed.js"></script>	
	<script type='text/javascript' src="<?php echo $this->_tpl_vars['PATH_JS']; ?>
validar.js"></script>
	
	<!-- jquery-1.11.3.js -->
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['PATH_JS']; ?>
jquery.min.js"></script>
    <script>jQuery.noConflict();</script>
    
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['PATH_JS']; ?>
sha1.js"></script>
<!--Fin Librerias js-->	

<!--     Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap441/js/bootstrap.min.js"></script>
	<link type="text/css" href="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap441/css/bootstrap.min.css" rel="stylesheet">    

<!--     Bootstrap Calendar-->
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap4-datetimepicker/build/js/Moment.js"></script>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link type="text/css" href="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">    
<!--<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">-->
<!--<script src="js/bootstrap-datetimepicker.min.js"></script>	-->
    <!-- Librerias propias del sistema -->
    
<!--    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
css/cssSist.css" type="text/css" media="screen" charset="<?php echo $this->_tpl_vars['CHARSET']; ?>
">-->
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
css/nuevo.css" type="text/css" media="screen" charset="<?php echo $this->_tpl_vars['CHARSET']; ?>
">    
</head>
<body>
	<div id="encabezado" class="marco-cabecera">	
		<div id="barraEncabezado" class=''>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
	<div id="contenedor" class="marco-centro">
		<div id="barraMenuOpciones" class="menuOpciones">
			<?php if ($this->_tpl_vars['desactivarOpciones'] != true): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../../../app/comun/botoneraH.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
			<?php endif; ?>		
		</div>	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['pagina']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<div id="piePagina" class="marco-pie">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplModal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>