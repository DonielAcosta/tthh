<div class="row">
  <div class="col-md-12">
    
    <!-- Datos Personales -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> Datos Personales</h3>
      </div>
      <div class="box-body">
        <dl class="dl-horizontal">
          <dt>Nombre Completo:</dt>
          <dd>
            <?php 
              if (method_exists($trabajador->persona, 'get_nombre_full')) {
                echo trim($trabajador->persona->get_nombre_full()) ?: 'No disponible';
              } else {
                $nombreCompleto = trim($trabajador->persona->nombre1 . ' ' . $trabajador->persona->nombre2 . ' ' . 
                                      $trabajador->persona->apellido1 . ' ' . $trabajador->persona->apellido2);
                echo $nombreCompleto ?: 'No disponible';
              }
            ?>
          </dd>
          
          <dt>Cédula de Identidad:</dt>
          <dd>
            <?php 
              $nacionalidad = ($trabajador->persona->nacionalidad == 'V' || $trabajador->persona->nacionalidad == '1') ? 'V' : 'E';
              echo $nacionalidad . '-' . number_format($trabajador->persona->cedula, 0, ',', '.');
            ?>
          </dd>
          
          <?php if (!empty($trabajador->persona->correo)): ?>
          <dt>Correo Electrónico:</dt>
          <dd><?php echo $trabajador->persona->correo; ?></dd>
          <?php endif; ?>
          
          <?php if (!empty($trabajador->persona->telefono)): ?>
          <dt>Teléfono:</dt>
          <dd><?php echo $trabajador->persona->telefono; ?></dd>
          <?php endif; ?>
        </dl>
      </div>
    </div>

    <!-- Datos Laborales -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-briefcase"></i> Datos Laborales</h3>
      </div>
      <div class="box-body">
        <dl class="dl-horizontal">
          <dt>Código del Trabajador:</dt>
          <dd><strong><?php echo !empty($trabajador->codigo) ? $trabajador->codigo : 'No disponible'; ?></strong></dd>
          
          <dt>Cargo Actual:</dt>
          <dd><?php echo !empty($trabajador->cargo) ? $trabajador->cargo : 'No disponible'; ?></dd>
          
          <dt>Tipo de Trabajador:</dt>
          <dd>
            <?php 
              if ($trabajador->tipo && isset($trabajador->tipo->tipo)) {
                echo $trabajador->tipo->tipo;
              } else {
                echo 'No disponible';
              }
            ?>
          </dd>
          
          <dt>Fecha de Ingreso:</dt>
          <dd>
            <?php 
              if (!empty($trabajador->sfingreso)) {
                echo $trabajador->sfingreso;
              } elseif (!empty($trabajador->fingreso)) {
                echo date('d/m/Y', strtotime($trabajador->fingreso));
              } else {
                echo 'No disponible';
              }
            ?>
          </dd>
          
          <?php if ($trabajador->dp_origen && isset($trabajador->dp_origen->organismo)): ?>
          <dt>Dependencia de Origen:</dt>
          <dd><?php echo $trabajador->dp_origen->organismo; ?></dd>
          <?php endif; ?>
          
          <?php if ($trabajador->dp_ads && isset($trabajador->dp_ads->organismo)): ?>
          <dt>Dependencia Adscrita:</dt>
          <dd><?php echo $trabajador->dp_ads->organismo; ?></dd>
          <?php endif; ?>
          
          <?php if (!empty($trabajador->banco)): ?>
          <dt>Banco:</dt>
          <dd><?php echo $trabajador->banco; ?></dd>
          <?php endif; ?>
          
          <?php if (!empty($trabajador->cuenta)): ?>
          <dt>Número de Cuenta:</dt>
          <dd><?php echo $trabajador->cuenta; ?></dd>
          <?php endif; ?>
          
          <?php if (!empty($trabajador->observacion)): ?>
          <dt>Observaciones:</dt>
          <dd><?php echo nl2br($trabajador->observacion); ?></dd>
          <?php endif; ?>
        </dl>
      </div>
    </div>

    <!-- Historial de Cargos -->
    <?php if (!empty($cargos) && is_array($cargos) && count($cargos) > 0): ?>
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-history"></i> Historial de Cargos</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cargo</th>
                <th>Dependencia</th>
                <th>Fecha de Ingreso</th>
                <th>Tipo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cargos as $cargo): ?>
              <tr>
                <td><?php echo isset($cargo['cargo']) ? $cargo['cargo'] : 'N/A'; ?></td>
                <td><?php echo isset($cargo['organismo']) ? $cargo['organismo'] : 'N/A'; ?></td>
                <td>
                  <?php 
                    if (isset($cargo['sfingreso']) && !empty($cargo['sfingreso'])) {
                      echo $cargo['sfingreso'];
                    } elseif (isset($cargo['fingreso']) && !empty($cargo['fingreso'])) {
                      echo date('d/m/Y', strtotime($cargo['fingreso']));
                    } else {
                      echo 'N/A';
                    }
                  ?>
                </td>
                <td>
                  <?php 
                    if (isset($cargo['tipo']) && !empty($cargo['tipo'])) {
                      echo $cargo['tipo'];
                    } else {
                      echo 'N/A';
                    }
                  ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <!-- Acciones Rápidas -->
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cog"></i> Acciones Disponibles</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo base_url('Trabajador_c/constancia_trabajo');?>" class="btn btn-primary btn-block">
              <i class="fa fa-file-pdf-o"></i> Generar Constancia de Trabajo
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?php echo base_url('Trabajador_c/comprobante_pago');?>" class="btn btn-success btn-block">
              <i class="fa fa-money"></i> Ver Comprobantes de Pago
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?php echo base_url('Servicios_c/solicitud');?>" class="btn btn-info btn-block">
              <i class="fa fa-envelope"></i> Realizar Solicitud
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
