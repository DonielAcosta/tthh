<?php /* Smarty version 2.6.30, created on 2021-09-09 01:47:48
         compiled from C:%5Cxampp%5Chtdocs%5Ccondvilla/app/vista/sesion/sesion.tpl */ ?>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['PATH_JS_XAJAX']; ?>
sesion.js'></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['PATH_JS']; ?>
combo.js"></script>
<!DOCTYPE html>
<html lang="es">
<!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Condominio | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Condominio" name="description" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <body class="bodyLogin">
        <!-- BEGIN LOGO -->
        <div class="logo">
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" role="form" name="form" id="form" style="position: relative;top: 150px; left: auto;">
				<div class="container">
					<div class="d-flex justify-content-center h-100">
						<div class="card">
							<div class="card-header" style="text-align:center;">
								<h3>Junta de Admin. Del Manten. de la <br>Urb. Villas La Verónica</h3>
								<h4>Iniciar Sesión</h4>
								<div class="d-flex justify-content-end social_icon">
									<span><i class="fab fa-facebook-square"></i></span>
									<span><i class="fab fa-google-plus-square"></i></span>
									<span><i class="fab fa-twitter-square"></i></span>
								</div>
							</div>
							<div class="card-body">
				                <div class="" role="alert">
				                    <input type="hidden" id="ancla" name="ancla">
					                <div id="errores">
					                    <?php if ($this->_tpl_vars['error'] != ''): ?>
					                        <div id='msg-error' class='msg-red'><?php echo $this->_tpl_vars['error']; ?>
</div>
					                    <?php endif; ?> <?php if ($this->_tpl_vars['exito'] != ''): ?>
					                        <div id='msg-exito' class='msg-green'><?php echo $this->_tpl_vars['exito']; ?>
</div>
					                    <?php endif; ?> <?php if ($this->_tpl_vars['info'] != ''): ?>
					                        <div id='msg-info' class='msg-blue'><?php echo $this->_tpl_vars['info']; ?>
</div>
					                    <?php endif; ?>
					                </div>
				                </div>
								<form>
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input name="login" id="login" type="text" class="form-control" placeholder="Usuario">
										
									</div>
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña">
									</div>
<!--									<div class="row align-items-center remember">-->
<!--										<input type="checkbox">Remember Me-->
<!--									</div>-->
									<div class="form-group">
										<input type="button" onclick="iniciarSesion();" value="Ingresar" class="btn btn-primary">
									</div>
									<div class="form-group">
										<a href="<?php echo $this->_tpl_vars['PUB_URLSIST']; ?>
pdf/Manual_del_Usuario.pdf" download="Manual del Usuario">
											Ver Manual del Usuario
										</a>
									</div>
								</form>
							</div>
							<div class="card-footer">
						        <!-- BEGIN COPYRIGHT -->
						        <div class="copyright">SOLINF Condominio. © Copyright 2020.</div>
						        <!-- END COPYRIGHT -->
							</div>
						</div>
					</div>
				</div>
            </form>
            <!-- END LOGIN FORM -->
        

<!--     Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap441/js/bootstrap.min.js"></script>
	<link type="text/css" href="<?php echo $this->_tpl_vars['PUB_URL']; ?>
bootstrap441/css/bootstrap.min.css" rel="stylesheet">          
        <?php echo '
        <script>
            jQuery(\'#imgCorreo\').click(function(){
//                alert(\'Opción correo\');
            	if(jQuery(\'#divOpCorreo\').hasClass(\'visible\')){
            		jQuery(\'#divOpCorreo\').attr(\'class\', \'invisible\');
            	}else{
            		jQuery(\'#divOpCorreo\').attr(\'class\', \'visible\');
            	}
            });
        </script>
		'; ?>
 
    <?php echo '
    <style>
		.justify-content-center {
		    -ms-flex-pack: center!important;
		    justify-content: flex-end!important;
		}    
		@media (min-width: 1200px){
			.container, .container-lg, .container-md, .container-sm, .container-xl {
			    max-width: inherit!important;
			    width: 100%!important;
			}		
		}
    </style>
    '; ?>

</body>
</html>