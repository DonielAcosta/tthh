<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->entorno->nombre_min; ?> | Registro</title>

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

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-box-body">
    <img src="<?php echo base_url($this->entorno->logo);?>" width="50%">
    <p class="login-box-msg"><br>Solicitud de Ingreso</p>
    <div class="form-group has-feedback">
      <input type="text" id="cedula" class="form-control" placeholder="Cédula de Identidad">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="email" id="correo" class="form-control" placeholder="Correo Electrónico">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" id="clave1" class="form-control" placeholder="Clave de Usuario">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" id="clave2" class="form-control" placeholder="Repite Clave de Usuario">
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-4">
        <button type="button" id="cancelar" class="btn btn-block btn-danger">Cancelar</button>
      </div>
      <div class="col-xs-4"></div>
      <!-- /.col -->
      <div class="col-xs-4">
        <button type="button" id="nuevo" class="btn btn-primary btn-block btn-flat">Enviar</button>
      </div>
      <!-- /.col -->
    </div>

    <!-- mensaje de espera -->
    <div id="msg_espera" class="row hide">
      <div class="col-xs-12 text-center">
        <div class="box box-danger box-solid">
          <div class="box-header">
            <h3 class="box-title">Procesando solicitud</h3>
          </div>
          <div class="box-body">
            Estamos procesando tu solicitud de ingreso...
          </div>
          <!-- /.box-body -->
          <!-- Loading (remove the following to stop the loading)-->
          <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
          <!-- end loading -->
        </div>
      </div>
    </div> <!-- mensaje de espera -->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- funciones personales -->
<script src="<?php echo base_url('js/funciones.js');?>"></script>

<script type="text/javascript">
// valida los campos
function valida_campos() {
  if (is_empty($("#cedula").val())) {
      alert('Error: El Campo Cédula de Identidad debe tener datos.');
      return false;
  }

  if (is_empty($("#correo").val())) {
      alert('Error: El campo Correo Electrónico debe tener datos.');
      return false;
  }

  if ($("#clave1").val().length < 5 || $("#clave1").val().length > 10) {
      alert('Error: El campo Clave de Usuario debe tener al menos 5 caracteres y máximo 10.');
      return false;
  }

  if($("#clave1").val() != $("#clave2").val()) {
     alert('Error: Los valores de la Clave de Usuario no coincide.');
    return false;
  }
  return true;
}

//
$(document).ready(function () {
  // cancelo la solicitud de ingreso
  $('#cancelar').click(function(event) {
    event.preventDefault();
    if (confirmar("Seguro de quere cancelar la Solicitud de Ingreso?"))
      $(location).attr("href","<?php echo base_url('Usuario_c/login');?>");
  })

  // simulo un submit
  $('#nuevo').click(function(event) {
    event.preventDefault();
    if (valida_campos()) {
       $.ajax({
         url    : '<?php echo base_url("Usuario_c/nuevo");?>', 
         data   : { 'cedula' : $("#cedula").val(),
                    'correo' : $("#correo").val(),
                    'clave'  : $("#clave1").val(),
                    'rol'    : 4
                  }, 
         type   : 'post',
         dataType : 'json',
         beforeSend : function(xhr) {
            $('#msg_espera').removeClass('hide');
            $('#msg_espera').addClass('show');
         },
         success  : function(resp) {
            $('#msg_espera').removeClass('show');
            $('#msg_espera').addClass('hide');
            alert(resp.mensaje);
            if (resp.success)
              $(location).attr("href","<?php echo base_url();?>");
         }
       })
    }
  });
});
</script>

</body>
</html>
