<?php
if (empty($trabajador) || $trabajador->persona === null):
?>
<div class="alert alert-danger">
    <i class="fa fa-exclamation-triangle"></i> No se encontró información del trabajador.
</div>
<div>
    <a href="<?php echo base_url('Admin_c/trabajadores');?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Volver a la lista</a>
</div>
<?php return; endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="box-tools pull-right" style="margin-bottom: 10px;">
            <a href="<?php echo base_url('Admin_c/trabajadores');?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Volver a la lista</a>
            <button type="button" class="btn btn-info btn-sm" onclick="cargarTrabajadorModal(<?php echo (int) $trabajador->id; ?>); $('#modalTrabajador').modal('show');"><i class="fa fa-pencil"></i> Editar</button>
        </div>

        <!-- Datos Personales -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> Datos Personales</h3>
            </div>
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Nombre Completo:</dt>
                    <dd><?php echo method_exists($trabajador->persona, 'get_nombre_full') ? trim($trabajador->persona->get_nombre_full()) : trim($trabajador->persona->nombre1 . ' ' . ($trabajador->persona->nombre2 ?? '') . ' ' . ($trabajador->persona->apellido1 ?? '') . ' ' . ($trabajador->persona->apellido2 ?? '')); ?></dd>
                    <dt>Cédula de Identidad:</dt>
                    <dd><?php $n = $trabajador->persona->nacionalidad ?? 'V'; echo ($n === 'V' || $n === '1') ? 'V' : 'E'; ?>-<?php echo number_format($trabajador->persona->cedula, 0, ',', '.'); ?></dd>
                    <?php if (!empty($trabajador->persona->correo)): ?>
                    <dt>Correo Electrónico:</dt>
                    <dd><?php echo htmlspecialchars($trabajador->persona->correo); ?></dd>
                    <?php endif; ?>
                    <?php if (!empty($trabajador->persona->telefono)): ?>
                    <dt>Teléfono:</dt>
                    <dd><?php echo htmlspecialchars($trabajador->persona->telefono); ?></dd>
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
                    <dd><strong><?php echo !empty($trabajador->codigo) ? htmlspecialchars($trabajador->codigo) : 'No disponible'; ?></strong></dd>
                    <dt>Cargo Actual:</dt>
                    <dd><?php echo !empty($trabajador->cargo) ? htmlspecialchars($trabajador->cargo) : 'No disponible'; ?></dd>
                    <dt>Tipo de Trabajador:</dt>
                    <dd><?php echo ($trabajador->tipo && isset($trabajador->tipo->tipo)) ? htmlspecialchars($trabajador->tipo->tipo) : 'No disponible'; ?></dd>
                    <dt>Fecha de Ingreso:</dt>
                    <dd><?php echo !empty($trabajador->sfingreso) ? $trabajador->sfingreso : (!empty($trabajador->fingreso) ? date('d/m/Y', strtotime($trabajador->fingreso)) : 'No disponible'); ?></dd>
                    <?php if (!empty($trabajador->dp_origen) && isset($trabajador->dp_origen->organismo)): ?>
                    <dt>Dependencia de Origen:</dt>
                    <dd><?php echo htmlspecialchars($trabajador->dp_origen->organismo); ?></dd>
                    <?php endif; ?>
                    <?php if (!empty($trabajador->dp_ads) && isset($trabajador->dp_ads->organismo)): ?>
                    <dt>Dependencia Adscrita:</dt>
                    <dd><?php echo htmlspecialchars($trabajador->dp_ads->organismo); ?></dd>
                    <?php endif; ?>
                    <?php if (!empty($trabajador->banco)): ?>
                    <dt>Banco:</dt>
                    <dd><?php echo htmlspecialchars($trabajador->banco); ?></dd>
                    <?php endif; ?>
                    <?php if (!empty($trabajador->cuenta)): ?>
                    <dt>Número de Cuenta:</dt>
                    <dd><?php echo htmlspecialchars($trabajador->cuenta); ?></dd>
                    <?php endif; ?>
                    <?php if (!empty($trabajador->observacion)): ?>
                    <dt>Observaciones:</dt>
                    <dd><?php echo nl2br(htmlspecialchars($trabajador->observacion)); ?></dd>
                    <?php endif; ?>
                </dl>
            </div>
        </div>

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
                                <td><?php echo isset($cargo['cargo']) ? htmlspecialchars($cargo['cargo']) : 'N/A'; ?></td>
                                <td><?php echo isset($cargo['organismo']) ? htmlspecialchars($cargo['organismo']) : 'N/A'; ?></td>
                                <td><?php echo !empty($cargo['sfingreso']) ? $cargo['sfingreso'] : (!empty($cargo['fingreso']) ? date('d/m/Y', strtotime($cargo['fingreso'])) : 'N/A'); ?></td>
                                <td><?php echo !empty($cargo['tipo']) ? htmlspecialchars($cargo['tipo']) : 'N/A'; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('admin/trabajador_modal_v'); ?>
