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

  <!-- Owl Carousel 2 (CDN) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- jQuery 3 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>

  <!-- Owl Carousel 2 (CDN) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  
</head>
<body class="hold-transition login-page">
<div class="row contHome">
  <div class="col-md-3">
    <!-- <img src="<?php echo base_url($this->entorno->logo);?>" width="40%" style="height:92px;width:auto;"><br><br> -->
    <img src="<?php echo base_url($this->entorno->logo);?>" style="height:50px;width:initial;"><br><br>
  </div>
  <div class="col-md-6">
    <H1>Sistema de Recursos Humanos</H1>
  </div>
  <div class="col-md-3" style="margin-bottom: 20px;">
    <!-- <img src="<?php echo base_url('img/recursos_humanos.png');?>" width="100%" style="height:92px;width:auto;"><br><br> -->
    <img src="<?php echo base_url('img/recursos_humanos.png');?>" style="height:50px;width:100%;"><br><br>
  </div>    
<!-- 	inicio carrusel -->
        <div id='divCarrusel' class="col-md-9 divCarrusel">
          <div class="owl-carousel owl-theme d-xs-none">          
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/13.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/12.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/1.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/2.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/3.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/4.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/5.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/6.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/8.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/9.jpg');?>'>
            </div>
            <div class="item">
              <img class='imgC' src='<?php echo base_url('img/imgC/11.jpg');?>'>
            </div>
          </div> 
        </div>
<!-- 	fin carrusel -->	

  <div class="col-md-3">
    <div class="login-box-body">
      <p class="login-box-msg"><br>Iniciar sesión</p>
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
		<div class="col-xs-12" style="z-index: 10000;">
		  Sí no puede recuperar la clave, pulse en el siguiente <a href="https://forms.gle/uWmp7ZhTTpUB5yHTA" target="_blank">enlace</a><br>
		</div>
      </div>
    </div>
    <!-- /.login-box-body -->
  </div>
  <div class="col-md-9"></div>
  <div class="col-md-2" style="margin-top: 20px;"></div>
  <div class="col-md-9" style="margin-top: 0px;font-family:Lato", Sans-serif>
		<!--<label class="textTitulo">Sistema de Recursos Humanos</label>-->
		
<!-- 			<p style="font-size:20px;"><h3 class="textHome">El sistema de Recursos Humanos SisRRHH es un portal web que ofrece a los trabajadores activos, jubilados y pensionados -->
<!-- 			la posibilidad de acceder mediante internet a los servicios que brinda la Dirección. </h3></p> -->
        
		El sistema de Recursos Humanos SisRRHH es un portal web que ofrece a los trabajadores activos, jubilados y pensionados
		la posibilidad de acceder mediante internet a los servicios que brinda la Dirección.	
		<br><br>
        <div style="text-align:left;" class="textHome">
        	<p class="textHome">
        		Los servicios que se ofrecen son:
        		<br><br>          
        		- Constancias de Trabajo.<br>
        		- Recibos de Pago.<br> 
        		- Asistencia a distancia, realice sus consultas a nuestros analistas sin necesidad de asistir a las instalaciones.<br>
        	</p>
        </div>
    </p>
<!--     <strong> -->
<!--     El sistema se accede desde cualquier lugar y en cualquier momento, utilizando para ello el dispositivo de su preferencia tales como computadoras, portátiles, tabletas o teléfonos inteligentes que posean conexión a internet.  -->
<!--     </strong> -->
    El sistema se accede desde cualquier lugar y en cualquier momento, utilizando para ello el dispositivo de su preferencia tales como computadoras, 
    portátiles, tabletas o teléfonos inteligentes que posean conexión a internet. 
	<br><br>
    
<!--  El sistema de Recursos Humanos SisRRHH es un portal web que facilita a los trabajadores activos y jubilados el acceder en línea a los servicios que brinda la Dirección.
<br><br>
  El sistema de Recursos Humanos SisRRHH es un portal web que facilita el acceso a los servicios que brinda la Dirección, tanto a los trabajadores activos como jubilados de la Gobernación del Estado Bolivariano de Mérida. 
    <br><br>
    El sistema de Recursos Humanos SisRRHH es un portal web que facilita a los trabajadores activos y jubilados, de un instrumento para acceder a determinados servicios que ofrece la Dirección, sin necesidad de asistir a nuestras instalaciones. 
    <br><br>
    Los servicios que se ofrecen son:
    <br><br>
    <div style="text-align: left;">
        - Constancias de Trabajo.<br>
        - Recibos de Pago.<br> 
        - Asistencia a distancia.<br>
        </div>
    <br><br>
    El sistema se accede desde cualquier lugar y en cualquier momento, utilizando para ello el dispositivo de su preferencia tales como computadoras, portátiles, tabletas o teléfonos inteligentes que posean conexión a internet. 
    <br><br>

		Los servicios ofrecidos son:
		<br><br>
		<div style="text-align: left;">
        -	Constancias de Trabajo.<br>
        -	Recibos de Pago.<br> 
        -	Asistencia a distancia.<br>
        </div>
		<br><br>
		El sistema podrá ser accedido desde cualquier lugar, en cualquier momento, usando el dispositivo de su preferencia (Computador, portátil, tablet o teléfonos inteligentes) que posean conexión a internet. 
		</h3>-->
	</div>
</div>

    <div class="col-md-4 fot-prov fot-prov-l">
  © Gobernación del Estado Bolivariano de Mérida<br>
  RIF G-20000156-9 <br>
  Desarrollado por el Departamento de Informática<br>
  Todos los derechos reservados 2020
    </div>   
    <div class="col-md-4 fot-prov">Información de Contacto<br>
      Palacio de gobierno, Calle 23 Vargas, Entre Av 3 y 4 frente a la Plaza Bolívar <br>
    </div>   
    <div class="col-md-4 fot-prov">
      <img src="<?php echo base_url('img/escudo.png');?>" class="iconoDesktop-barra">
    </div>       
  


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- funciones personales -->
<script src="<?php echo base_url('js/funciones.js');?>"></script>

<script>
$(document).ready(function() {
  var owl = $('.owl-carousel');
  if (typeof owl.owlCarousel === 'function') {
    owl.owlCarousel({
      items: 3,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsiveClass: true,
      responsive: {
        0: { items: 1, nav: true },
        600: { items: 3, nav: false },
        1000: { items: 3, nav: true, loop: false }
      }
    });
    $('.play').on('click', function() { owl.trigger('play.owl.autoplay', [1000]); });
    $('.stop').on('click', function() { owl.trigger('stop.owl.autoplay'); });
  }
});
</script>

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
  <style>
    body {
      color:#596a5c!important;
    }
    .textHome{
      color:#596a5c!important;
    }
    /*#demos .owl-carousel .item {*/
    .owl-carousel .item {
        /*height: 425px;*/
        background: #fff;
        padding: 0rem;
        border: 2px solid;
        border-radius: 15px;
        opacity: 0.8;        
    }  
    .row {
        margin: 0 auto;
        max-width: max-content;
        width: 100%;
    }
    .imgC{
        border-radius:inherit;
    }    
    .imgB{
        height: 30px;
    }
    .fot-prov{
      background: #f0f0f0;
      height:155px;  
      /*width: 100%;*/
      padding: 10px;
      text-align: center;
    }
    .fot-prov-l{
      background: #f0f0f0;
      text-align: left;
      padding-top: 20px;
      padding-left: 50px;

    }
    .rotarImagen{
         -moz-transform: rotate(-10deg);
         -o-transform: rotate(-10deg);
         -webkit-transform: rotate(-10deg);
         transform: rotate(-10deg);
    }    
    @keyframes rotate {from {transform: rotate(0deg);}
        to {transform: rotate(360deg);}}
    @-webkit-keyframes rotate {from {-webkit-transform: rotate(0deg);}
      to {-webkit-transform: rotate(360deg);}}
    .imgr{ 
        -webkit-animation: 3s rotate linear infinite;
        animation: 3s rotate linear infinite;
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
    }
    #imgr2 {
         -webkit-animation-direction: reverse;
         animation-direction: reverse;
    }    
.login-box-body, .register-box-body {
    background: #f0f0f0;
    padding: 20px;
    border-top: 0;
    color: #666;
    border: 0px solid;
    border-radius: 15px;
    height:342px;
}      
h1, h2, h3, h4, h5, h6 {
    margin-bottom: 0px;
    margin-top: 0px;
}
.login-box-body, .register-box-body {
    background: #f0f0f0;
    padding: 10px;
    border-top: 0;
    color: #666;
    border: 0px solid;
    border-radius: 15px;
    height: 240px;
    padding-top: 0px;
    padding-bottom: 0px;
}
.login-box-msg, .register-box-msg {
    margin: 0;
    text-align: center;
    padding: 0 20px 0px 20px;
}
    @media (max-width:767px) {
        .owl-carousel .item {
            height: 275px;
            background: #fff;
            padding: 0rem;
            border: 0px solid;
            border-radius: 15px;
            opacity: 0.8;        
        }
        .divCarrusel{
            /*display:none;*/
        }
        .login-page, .register-page {
            height: auto;
        }        
        .fot-prov-l {
            background: #f0f0f0;
            text-align: center;
            padding-top: 15px;
            padding-left: 15px;
        }        
        .fot-prov {
            background: #f0f0f0;
            height: 130px;
            /* width: 100%; */
            padding: 10px;
            text-align: center;
        }        
    }  
  </style>
</html>