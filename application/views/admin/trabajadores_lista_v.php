<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> Cargar y ver información de trabajadores</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo base_url('Admin_c/trabajadores');?>" class="btn btn-primary btn-sm" title="Actualizar lista">
                <i class="fa fa-refresh"></i> Cargar / Actualizar lista
            </a>
            <a href="<?php echo base_url('Admin_c/crear_trabajador');?>" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Nuevo Trabajador
            </a>
        </div>
    </div>
    <div class="box-body">
        <?php if (!empty($trabajadores)): ?>
        <p class="text-muted"><small>Se muestran hasta 100 trabajadores. Use "Ver" para abrir el detalle en modal o "Ficha" para ver la información completa en página.</small></p>
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
                        <th style="width: 120px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trabajadores as $trab): 
                        $tid = isset($trab['trabajador_id']) ? $trab['trabajador_id'] : (isset($trab['id']) ? $trab['id'] : 0);
                    ?>
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
                            <a href="<?php echo base_url('Admin_c/ver_trabajador/' . $tid);?>" class="btn btn-default btn-xs" title="Ver ficha completa">
                                <i class="fa fa-user"></i> Ficha
                            </a>
                            <button type="button" class="btn btn-info btn-xs" onclick="cargarTrabajadorModal(<?php echo (int) $tid; ?>)" title="Ver/Editar en modal">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> No se encontraron trabajadores registrados. Use <strong>Cargar / Actualizar lista</strong> para refrescar o <strong>Nuevo Trabajador</strong> para agregar uno.
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('admin/trabajador_modal_v'); ?>
