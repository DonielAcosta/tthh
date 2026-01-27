<?php /* Smarty version 2.6.30, created on 2021-09-19 18:24:38
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/gasto/listargasto.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'C:\\xampp\\htdocs\\condvilla/app/vista/gasto/listargasto.tpl', 37, false),)), $this); ?>
<div class='pagina'>
		<div class='line-title'>
			<h4>Relación de gastos</h4>
		</div>
		<br>
       	<center>
			<h4><?php if ($this->_tpl_vars['opt'] == 'g'): ?> Agregar <?php elseif ($this->_tpl_vars['opt'] == 'm' || $this->_tpl_vars['opt'] == 'mr'): ?> Modificar <?php endif; ?> </h4>		
<!--  				<div class="form-group col-lg-12" style="position:fixed;background-color: azure;"> -->
 				<div class="form-group col-lg-12" style="">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
<!-- 					  <li class="nav-item"> -->
<!-- 					    <a class="nav-link active" data-toggle="tab" href="#home">2018</a> -->
<!-- 					  </li> -->
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="tab" href="#menu1" >2019</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="tab" href="#menu2" >2020</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="tab" href="#menu3" >2021</a>
					  </li>
					</ul>
				</div>
<!-- ***************************************************************				 -->

					<!-- Tab panes -->
					<div class="tab-content">
<!-- 					  	<div class="tab-pane container active row" id="home"> -->
<!-- 						  	<div class="row"> -->
<!-- 								<div class="form-group col-lg-3"> -->
<!-- 					       		<table border="0"> -->
<!-- 									<tr>		 -->
<!-- 										<?php $_from = $this->_tpl_vars['archivos2018']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['noticia']):
?> -->
<!-- 											<tr> -->
<!-- 												<td id="idTd<?php echo smarty_function_counter(array(), $this);?>
" name="idTd<?php echo smarty_function_counter(array(), $this);?>
" class="<?php echo $this->_tpl_vars['valClase']; ?>
"> -->
<!-- 													* <a href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
pdf/Relacion/<?php echo $this->_tpl_vars['noticia']; ?>
" download="<?php echo $this->_tpl_vars['noticia']; ?>
"><?php echo $this->_tpl_vars['noticia']; ?>
</a> -->
<!-- 												</td> -->
<!-- 											</tr> -->
<!-- 										<?php endforeach; endif; unset($_from); ?>		 -->
<!-- 										</td> -->
<!-- 									</tr> -->
<!-- 								</table> -->
<!-- 								</div>								 -->
<!-- 							</div> -->
<!-- 						</div> -->
					  <div class="tab-pane container fade" id="menu1">
						  <div class="row">
							<div class="form-group col-lg-3">
					       		<table border="0">
									<tr>		
										<?php $_from = $this->_tpl_vars['archivos2019']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['noticia']):
?>
											<tr>
												<td id="idTd<?php echo smarty_function_counter(array(), $this);?>
" name="idTd<?php echo smarty_function_counter(array(), $this);?>
" class="<?php echo $this->_tpl_vars['valClase']; ?>
">
													* <a href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
pdf/Relacion/<?php echo $this->_tpl_vars['noticia']; ?>
" download="<?php echo $this->_tpl_vars['noticia']; ?>
"><?php echo $this->_tpl_vars['noticia']; ?>
</a>
												</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>		
										</td>
									</tr>
								</table>
							</div>						  
						  </div>
					  </div>
					  <div class="tab-pane container fade" id="menu2">
						<div class="row">
							<div class="form-group col-lg-3">
					       		<table border="0">
									<tr>		
										<?php $_from = $this->_tpl_vars['archivos2020']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['noticia']):
?>
											<tr>
												<td id="idTd<?php echo smarty_function_counter(array(), $this);?>
" name="idTd<?php echo smarty_function_counter(array(), $this);?>
" class="<?php echo $this->_tpl_vars['valClase']; ?>
">
													* <a href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
pdf/Relacion/<?php echo $this->_tpl_vars['noticia']; ?>
" download="<?php echo $this->_tpl_vars['noticia']; ?>
"><?php echo $this->_tpl_vars['noticia']; ?>
</a>
												</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>		
										</td>
									</tr>
								</table>
							</div>
						</div>				  
					  </div>
					  <div class="tab-pane container fade" id="menu3">
						<div class="row">
							<div class="form-group col-lg-3">
					       		<table border="0">
									<tr>		
										<?php $_from = $this->_tpl_vars['archivos2021']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['noticia']):
?>
											<tr>
												<td id="idTd<?php echo smarty_function_counter(array(), $this);?>
" name="idTd<?php echo smarty_function_counter(array(), $this);?>
" class="<?php echo $this->_tpl_vars['valClase']; ?>
">
													* <a href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
pdf/Relacion/<?php echo $this->_tpl_vars['noticia']; ?>
" download="<?php echo $this->_tpl_vars['noticia']; ?>
"><?php echo $this->_tpl_vars['noticia']; ?>
</a>
												</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>		
										</td>
									</tr>
								</table>
							</div>
						</div>				  
					  </div>
					</div>	
<!-- ***************************************************************				 -->
					                    	
        </center>
</div>