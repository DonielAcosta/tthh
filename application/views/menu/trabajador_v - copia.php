<!-- Optionally, you can add icons to the links -->
<li><a href="<?php echo base_url('Home_c');?>"><i class="fa fa-link"></i> <span>Inicio</span></a></li>
<li><a href="<?php echo base_url('Trabajador_c/comprobante_pago');?>"><i class="fa fa-link"></i> <span>Comprobante de Pago</span></a></li>
<li><a href="<?php echo base_url('Trabajador_c/constancia_trabajo');?>"><i class="fa fa-link"></i> <span>Constancia de Trabajo</span></a></li>

<li class="treeview">
  <a href="#"><i class="fa fa-link"></i> <span>Actualiza tus Datos</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="<?php echo base_url('Usuario_c/cambia_correo');?>">Modifica tu Correo</a></li>
    <li><a href="<?php echo base_url('Usuario_c/cambia_clave');?>">Modifica tu Clave</a></li>
  </ul>
</li>

<li><a href="<?php echo base_url('Home_c/acerca_de');?>"><i class="fa fa-link"></i> <span>Acerca de...</span></a></li>
<li><a href="<?php echo base_url('Usuario_c/logout');?>"><i class="fa fa-link"></i> <span>Salir</span></a></li>
