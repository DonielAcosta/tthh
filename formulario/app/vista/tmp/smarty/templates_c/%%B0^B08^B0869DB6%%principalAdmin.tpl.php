<?php /* Smarty version 2.6.30, created on 2021-09-09 01:48:01
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/principal/principalAdmin.tpl */ ?>
<div class='pagina'>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplError.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
		<h3>Bienvenido <?php echo $this->_tpl_vars['NOMBRE_USUARIO']; ?>
</h3>
		<br>
 		<div class='container-fluid'>
 			<div class="row contenidoVer" style="width:100%">
				<div class="form-group col-md-3 divIconosCent">
					<a href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/movimiento/ingresar">
						<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/transfBanc.png" class="iconoDesktop"><br>
						<label class="control-label">Ingresar Pago</label>
					</a>
				</div>
				<div class="form-group col-md-3 divIconosCent">
					<a href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/movimiento">
						<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/misPagos.png" class="iconoDesktop"><br>
						<label class="control-label">Consultar Pagos</label>
					</a>
				</div>
				<div class="form-group col-md-3 divIconosCent">
					<a href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/reporte/movimiento/mispagos">
						<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/reportes.png" class="iconoDesktop"><br>
						<label class="control-label">Reportes</label>
					</a>
				</div>
				<div class="form-group col-md-3 divIconosCent">
					<a href="<?php echo $this->_tpl_vars['URLSIST']; ?>
base/persona">
						<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/misDatos.png" class="iconoDesktop"><br>
						<label class="control-label">Usuarios</label>
					</a>
				</div>
				<div class="form-group col-md-3 divIconosCent" onclick="vntConsultar('principal/infoPago', 'Información para las Transferencias');">
						<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/Banco.png" class="iconoDesktop"><br>
						<label class="control-label">Información para las Transferencias</label>
				</div>
				<div class="form-group col-md-3 divIconosCent">
						<a href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
pdf/DocVillasVeronica.pdf" download="Reglamento Interno">
							<img src="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
img/home/pdf.jpg" class="iconoDesktop" style="max-width:200px;"><br>
							<label class="control-label">Reglamento Interno</label>
						</a>
				</div>
			</div>
		</div>	
	</form>
</div>