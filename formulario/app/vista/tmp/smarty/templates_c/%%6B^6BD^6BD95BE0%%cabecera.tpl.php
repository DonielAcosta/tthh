<?php /* Smarty version 2.6.30, created on 2021-09-09 01:48:01
         compiled from cabecera.tpl */ ?>
<div class="encabezado">
	<div class='container'>
		<div class="row">			
			<div class="col-md-2 col-xs-2">
				<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/<?php echo $this->_tpl_vars['LOGO_PROYECTO']; ?>
" class="imgLogo">
			</div>
			<div class="col-md-8 col-xs-2 nomCondominio">
				<?php echo $this->_tpl_vars['NOM_PROYECTO']; ?>

			</div>
			<div class="col-md-2 col-xs-12">
				<div class="divInfoUsuario"><?php if ($this->_tpl_vars['NOMBRE_USUARIO'] != ''): ?><?php echo $this->_tpl_vars['NOMBRE_USUARIO']; ?>
<?php endif; ?><br><?php echo $this->_tpl_vars['FECHA_SISTEMA']; ?>
</div>
			</div>
		</div>
	</div>
</div>
<!--
<div class="encabezado">
	<div class="col-md-2 encabezado-left">
		<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/logo.jpeg" width="100px;">
	</div>
	<div class="col-md-8 encabezado-center">
		centro
	</div>
	<div class="col-md-2 encabezado-right">
		<div class="divInfoUsuario"><?php if ($this->_tpl_vars['NOMBRE_USUARIO'] != ''): ?><?php echo $this->_tpl_vars['NOMBRE_USUARIO']; ?>
<?php endif; ?><br><?php echo $this->_tpl_vars['FECHA_SISTEMA']; ?>
</div>
		<?php echo $this->_tpl_vars['LINE1_ENCABEZADO']; ?>
 <?php echo $this->_tpl_vars['LINE2_ENCABEZADO']; ?>
 <?php echo $this->_tpl_vars['LINE3_ENCABEZADO']; ?>

	</div>
</div>