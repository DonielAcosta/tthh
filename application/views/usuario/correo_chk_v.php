<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->entorno->nombre_min; ?></title>
</head>

<body style="text-align: center">
  <img src="<?php echo base_url('/img/logo01.jpg');?>" width="30%" heigth="30%">
  <?php echo br(3);?>
  Bienvenido(a) <b><?php echo $nombre;?></b>, haz completado correctamente tu Registro.
  <?php echo br(2);?>
  <a href="<?php echo base_url();?>" title="Iniciar sesión">Pulsa el link para iniciar tu sesión</a>
</body>
</html>
