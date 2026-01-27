<?php /* Smarty version 2.6.30, created on 2021-09-09 01:48:06
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/movimiento/listarmovimientoAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'C:\\xampp\\htdocs\\condvilla/app/vista/movimiento/listarmovimientoAdmin.tpl', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/libGrid.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class='pagina'>
	<form name='form' id='form' method='post' action='<?php echo $this->_tpl_vars['valorForm']; ?>
'>
		<div class='line-title'>
			<h4>Listar Pagos</h4>
		</div>	
		<a id='ancla' href='#'></a>
		<input type='hidden' id='opcion' name='opcion'  value='' readonly>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../app/comun/tplError.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<br>
<!--		**********************************************************************************-->
<div class="row contenidoVer" style="width:100%">
	<div class="form-group col-md-6">
		<label class="control-label"><span class='label-red'>*</span> Nombre del Usuario</label>
		<div class="input-group mb-3">
			<select id='idUsuario' name='idUsuario' class='form-control input-sm'>
				<option value=''>-Seleccione-</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tablaUsuario'],'selected' => $this->_tpl_vars['idUsuario']), $this);?>

			</select>
		  	<div class="input-group-append">
		    	<button type="button" class="btn btn-primary" onclick="xajax_llenarGridMovimientoGeneral(xajax.$('idUsuario').value,0);">Buscar</button>
		  	</div>
		</div>
	</div>
	<div class="form-group col-md-6">
		<label class="control-label"><span class='label-red'>*</span> Casa N°</label>
		<div class="input-group mb-3">
			<input type='text' class="form-control input-sm" id='numCasa' name='opt' value=''/>
		  	<div class="input-group-append">
		    	<button type="button" class="btn btn-primary" onclick="xajax_llenarGridMovimientoGeneralXnumCasa(xajax.$('numCasa').value,0);">Buscar</button>
		  	</div>
		</div>
	</div>
</div>
<!--		**********************************************************************************-->
		<fieldset>
        <script>xajax_llenarGridMovimientoGeneral('<?php echo $this->_tpl_vars['idUsuario']; ?>
','');</script>
		<center>
			<div id='paginacion' class="paginacion"></div>
			<div id='boxMovimiento' class='div-grid-consulta-grande'></div>
			<div id='paginacion1' class="paginacion"></div>
		</center>
        <!-- Grid -->
        <script>
                gridMovimiento = new dhtmlXGridObject('boxMovimiento');
                gridMovimiento.setDelimiter('|');
//                gridMovimiento.setHeader('|Imp|Ver|Editar|IdMovimiento|IdTipoMovimiento|IdMotivo|IdEdoMovimiento|IdBanco|IdUsuario|FecMovimiento|MontoMovimiento|CaptureMovimiento|ObsMovimiento|FecEdoMovimiento');
                gridMovimiento.setHeader('Ver|Editar|Usuario|Motivo|Banco|Fec. Mov.|Monto|Estado|Fec. Edo');
                gridMovimiento.enableColumnAutoSize(true);
                gridMovimiento.setInitWidths('60|60|182|182|182|80|80|120|80');
                gridMovimiento.setColAlign('center|center|left|left|left|center|right|left|center');
//              gridMovimiento.attachEvent('onRowDblClicked',eliminarCondicion);
                gridMovimiento.setColTypes('ro|ro|ro|ro|ro|ro|ro|ro|ro');
                gridMovimiento.setColSorting('str|str|str|str|str|int|int|int|int');
                gridMovimiento.setImagePath('../../rec/img/grid/');
                gridMovimiento.enableMultiselect(false);
                gridMovimiento.enableLightMouseNavigation(true);
                gridMovimiento.init();
//			   gridMovimiento.attachHeader('A,B,C');
        </script>
        <!-- Fin de Grid -->
		</fieldset>
		<br />
		<input type='hidden' id='opt' name='opt' value='<?php echo $this->_tpl_vars['opt']; ?>
' readonly/>
		<input type='hidden' id='movimientoid' name='movimientoid' value='<?php echo $this->_tpl_vars['movimientoid']; ?>
' readonly/>
		<input id='ids' name='ids' type='hidden' value='' readonly/>
	</form>
</div>