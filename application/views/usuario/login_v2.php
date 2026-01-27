<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->entorno->nombre_min; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css');?>">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css');?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/dist/css/google-fonts.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">

</head>
<body class="hold-transition login-page">
<div class="row contHome">
	<div class="col-md-12">
		<img src="<?php echo base_url($this->entorno->logo);?>" width="80%"><br><br>
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-7">
		<h1>SisTTHH</h1>
		<h3>
		El sistema de Talento Humano SisTTHH es una aplicación web desarrollada con el objetivo de brindarle a los trabajadores activos y jubilados, una 
		herramienta tecnológica que le permita obtener su Constancia de Trabajo y sus Recibos de Pago.
		<br><br>
		El sistema podrá ser accedido desde cualquier lugar, en cualquier momento usando el dispositivo de su preferencia 
		(Computador, portatiles, tablet y télefonos inteligentes) que posean conexión a internet.
		</h3>
	</div>
	<div class="col-md-3">
	  <div class="login-box-body">
	    <p class="login-box-msg"><br>Logueate para iniciar tu sesión</p>
	    <div class="form-group has-feedback">
	      <input type="email" id="correo" class="form-control" placeholder="Correo Electrónico">
	      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	    </div>
	    <div class="form-group has-feedback">
	      <input type="password" id="clave" class="form-control" placeholder="Clave de Usuario">
	      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	    </div>
	    <div class="row">
	      <div class="col-xs-2"></div>
	      <div class="col-xs-8">
		<button type="button" id="login" class="btn btn-primary btn-block btn-flat">Ingresar</button>
	      </div>
	      <div class="col-xs-2"></div>
	    </div>

	    <div class="row">
		<p></p>
		<div class="col-xs-6">
		  <a href="<?php echo base_url('Usuario_c/olvide_clave'); ?>">Olvide mi clave!</a><br>
		</div>
		<div class="col-xs-6">
		  <p class="text-right"><a href="<?php echo base_url('Usuario_c/nuevo'); ?>" class="text-right">Nuevo Usuario</a></p>
		</div>
	    </div>
	  </div>
	  <!-- /.login-box-body -->
	</div>
	<div class="col-md-1">
	</div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- funciones personales -->
<script src="<?php echo base_url('js/funciones.js');?>"></script>

<script type="text/javascript">
// valida los campos
function valida_campos() 
{
  // valido que los campos tengan datos
  if (is_empty($("#correo").val())) {
      alert('Error: El campo Correo Electrónico debe tener datos.');
      return false;
  }

  if ($("#clave").val().length < 5 || $("#clave").val().length > 10) {
      alert('Error: El campo Clave de Usuario debe tener datos.');
      return false;
  }
  return true;
}

//
$(document).ready(function () {
  // simulo un submit
  $('#login').click(function(event) {
    event.preventDefault();
    if (valida_campos()) {
       $.ajax({
         url    : '<?php echo base_url("Usuario_c/login");?>',
         data   : { 'correo' : $("#correo").val(),
                    'clave'  : $("#clave").val()
                  }, 
         type   : 'post',
         dataType : 'json',
         success  : function(resp) {
            if (resp.success) 
              $(location).attr("href","<?php echo base_url();?>");
            else
              alert(resp.mensaje);
         }
       })
    }
  });
});
</script>

</body>
</html>
