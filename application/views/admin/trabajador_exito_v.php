<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> ¡Éxito!</h4>
    <?php echo $mensaje; ?>
</div>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Trabajador Creado</h3>
    </div>
    <div class="box-body">
        <p><strong>El trabajador ha sido registrado exitosamente en el sistema.</strong></p>
        
        <?php if (isset($trabajador_id)): ?>
        <p><strong>ID del Trabajador:</strong> <?php echo $trabajador_id; ?></p>
        <?php endif; ?>
        
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6">
                <a href="<?php echo base_url('Admin_c/crear_trabajador');?>" class="btn btn-primary btn-block">
                    <i class="fa fa-plus"></i> Crear Otro Trabajador
                </a>
            </div>
            <div class="col-md-6">
                <a href="<?php echo base_url('Admin_c/trabajadores');?>" class="btn btn-default btn-block">
                    <i class="fa fa-list"></i> Ver Lista de Trabajadores
                </a>
            </div>
        </div>
    </div>
</div>
