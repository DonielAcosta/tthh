<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Trabajadores</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo base_url('Admin_c/crear_trabajador');?>" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Nuevo Trabajador
            </a>
        </div>
    </div>
    <div class="box-body">
        <?php if (!empty($trabajadores)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre Completo</th>
                        <th>Código</th>
                        <th>Cargo</th>
                        <th>Dependencia</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trabajadores as $trab): ?>
                    <tr>
                        <td><?php echo isset($trab['cedula']) ? $trab['cedula'] : 'N/A'; ?></td>
                        <td>
                            <?php 
                                $nombre = trim(($trab['nombre1'] ?? '') . ' ' . ($trab['nombre2'] ?? '') . ' ' . 
                                            ($trab['apellido1'] ?? '') . ' ' . ($trab['apellido2'] ?? ''));
                                echo $nombre ?: 'N/A';
                            ?>
                        </td>
                        <td><?php echo isset($trab['codigo']) ? $trab['codigo'] : 'N/A'; ?></td>
                        <td><?php echo isset($trab['cargo']) ? $trab['cargo'] : 'N/A'; ?></td>
                        <td><?php echo isset($trab['organismo']) ? $trab['organismo'] : 'N/A'; ?></td>
                        <td><?php echo isset($trab['tipo']) ? $trab['tipo'] : 'N/A'; ?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-xs" onclick="cargarTrabajadorModal(<?php echo isset($trab['trabajador_id']) ? $trab['trabajador_id'] : (isset($trab['id']) ? $trab['id'] : '0'); ?>)" title="Ver/Editar">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> No se encontraron trabajadores registrados.
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('admin/trabajador_modal_v'); ?>
