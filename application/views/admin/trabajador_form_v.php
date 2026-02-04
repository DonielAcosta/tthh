<?php if (isset($errores)): ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Errores de Validación</h4>
    <?php echo $errores; ?>
</div>
<?php endif; ?>

<?php if (isset($mensaje) && !isset($errores)): ?>
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Atención</h4>
    <?php echo $mensaje; ?>
</div>
<?php endif; ?>

<form action="<?php echo base_url('Admin_c/guardar_trabajador');?>" method="post" id="form_trabajador">
    
    <!-- Datos Personales -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> Datos del Trabajador</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Código <span class="text-red">*</span></label>
                        <input type="text" name="codigo" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->codigo : ''; ?>" 
                               required maxlength="15" placeholder="Código del trabajador">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nacionalidad <span class="text-red">*</span></label>
                        <select name="nacionalidad" class="form-control" required>
                            <option value="V" <?php echo (isset($trabajador) && $trabajador && $trabajador->persona->nacionalidad == 'V') ? 'selected' : ''; ?>>V</option>
                            <option value="E" <?php echo (isset($trabajador) && $trabajador && $trabajador->persona->nacionalidad == 'E') ? 'selected' : ''; ?>>E</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Cédula <span class="text-red">*</span></label>
                        <input type="text" name="cedula" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->cedula : ''; ?>" 
                               required maxlength="20" placeholder="Solo números">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Primer Nombre <span class="text-red">*</span></label>
                        <input type="text" name="nombre1" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->nombre1 : ''; ?>" 
                               required maxlength="30">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Primer Apellido <span class="text-red">*</span></label>
                        <input type="text" name="apellido1" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->apellido1 : ''; ?>" 
                               required maxlength="30">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Segundo Nombre</label>
                        <input type="text" name="nombre2" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->nombre2 : ''; ?>" 
                               maxlength="30">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Segundo Apellido</label>
                        <input type="text" name="apellido2" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->apellido2 : ''; ?>" 
                               maxlength="30">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>RIF</label>
                        <input type="text" name="rif" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->persona->rif) ? $trabajador->persona->rif : ''; ?>" 
                               maxlength="13" placeholder="J-12345678-9">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Sexo</label>
                        <select name="sexo" class="form-control">
                            <option value="">- Seleccione -</option>
                            <option value="M" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->sexo) && $trabajador->persona->sexo == 'M') ? 'selected' : ''; ?>>Masculino</option>
                            <option value="F" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->sexo) && $trabajador->persona->sexo == 'F') ? 'selected' : ''; ?>>Femenino</option>
                            <option value="O" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->sexo) && $trabajador->persona->sexo == 'O') ? 'selected' : ''; ?>>Otro</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Estado Civil</label>
                        <select name="civil" class="form-control">
                            <option value="">- Seleccione -</option>
                            <option value="S" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->civil) && $trabajador->persona->civil == 'S') ? 'selected' : ''; ?>>Soltero</option>
                            <option value="C" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->civil) && $trabajador->persona->civil == 'C') ? 'selected' : ''; ?>>Casado</option>
                            <option value="D" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->civil) && $trabajador->persona->civil == 'D') ? 'selected' : ''; ?>>Divorciado</option>
                            <option value="V" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->persona->civil) && $trabajador->persona->civil == 'V') ? 'selected' : ''; ?>>Viudo</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" name="nacimi" class="form-control" 
                               value="<?php 
                                   if (isset($trabajador) && $trabajador && isset($trabajador->persona->nacimi) && $trabajador->persona->nacimi) {
                                       echo date('Y-m-d', strtotime($trabajador->persona->nacimi));
                                   }
                               ?>">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" name="correo" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->correo : ''; ?>" 
                               maxlength="50">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->telefono : ''; ?>" 
                               maxlength="30">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea name="direc1" class="form-control" rows="2" maxlength="255"><?php echo isset($trabajador) && $trabajador && isset($trabajador->persona->direc1) ? $trabajador->persona->direc1 : ''; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Datos Laborales -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-briefcase"></i> Relación Laboral</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Contrato</label>
                        <input type="text" name="contrato" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->contrato) ? $trabajador->contrato : ''; ?>" 
                               maxlength="50">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Vencimiento</label>
                        <input type="date" name="vencimiento" class="form-control" 
                               value="<?php 
                                   if (isset($trabajador) && $trabajador && isset($trabajador->vencimiento) && $trabajador->vencimiento) {
                                       echo date('Y-m-d', strtotime($trabajador->vencimiento));
                                   }
                               ?>">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Cargo <span class="text-red">*</span></label>
                        <input type="text" name="cargo" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->cargo : ''; ?>" 
                               required maxlength="255">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo <span class="text-red">*</span></label>
                        <select name="tipo_fk" class="form-control" required>
                            <option value="">- Seleccione -</option>
                            <?php if (isset($tipos_trabajador)): ?>
                                <?php foreach ($tipos_trabajador as $id => $tipo): ?>
                                    <option value="<?php echo $id; ?>" 
                                        <?php echo (isset($trabajador) && $trabajador && $trabajador->tipo && $trabajador->tipo->trabajador_tp_id == $id) ? 'selected' : ''; ?>>
                                        <?php echo $tipo; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sueldo</label>
                        <input type="number" step="0.01" name="sueldo" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->sueldo) ? $trabajador->sueldo : ''; ?>">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Moneda</label>
                        <select name="moneda" class="form-control">
                            <option value="VES" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->moneda) && $trabajador->moneda == 'VES') ? 'selected' : 'selected'; ?>>Bolívares</option>
                            <option value="USD" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->moneda) && $trabajador->moneda == 'USD') ? 'selected' : ''; ?>>US Dólares</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Fecha de Ingreso <span class="text-red">*</span></label>
                        <input type="date" name="fingreso" class="form-control" 
                               value="<?php 
                                   if (isset($trabajador) && $trabajador && $trabajador->fingreso) {
                                       echo date('Y-m-d', strtotime($trabajador->fingreso));
                                   } else {
                                       echo date('Y-m-d');
                                   }
                               ?>" required>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Fecha de Retiro</label>
                        <input type="date" name="retiro" class="form-control" 
                               value="<?php 
                                   if (isset($trabajador) && $trabajador && isset($trabajador->retiro) && $trabajador->retiro) {
                                       echo date('Y-m-d', strtotime($trabajador->retiro));
                                   }
                               ?>">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Estatus</label>
                        <select name="status" class="form-control">
                            <option value="A" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'A') ? 'selected' : 'selected'; ?>>Activo</option>
                            <option value="V" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'V') ? 'selected' : ''; ?>>Vacaciones</option>
                            <option value="R" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'R') ? 'selected' : ''; ?>>Retirado</option>
                            <option value="I" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'I') ? 'selected' : ''; ?>>Inactivo</option>
                            <option value="P" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'P') ? 'selected' : ''; ?>>Permiso</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Dependencia de Origen <span class="text-red">*</span></label>
                        <select name="dp_adm_fk" class="form-control" required>
                            <option value="">- Seleccione -</option>
                            <?php if (isset($dependencias)): ?>
                                <?php foreach ($dependencias as $id => $organismo): ?>
                                    <option value="<?php echo $id; ?>" 
                                        <?php echo (isset($trabajador) && $trabajador && $trabajador->dp_origen && $trabajador->dp_origen->id == $id) ? 'selected' : ''; ?>>
                                        <?php echo $organismo; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Dependencia Adscrita <span class="text-red">*</span></label>
                        <select name="dp_ads_fk" class="form-control" required>
                            <option value="">- Seleccione -</option>
                            <?php if (isset($dependencias)): ?>
                                <?php foreach ($dependencias as $id => $organismo): ?>
                                    <option value="<?php echo $id; ?>" 
                                        <?php echo (isset($trabajador) && $trabajador && $trabajador->dp_ads && $trabajador->dp_ads->id == $id) ? 'selected' : ''; ?>>
                                        <?php echo $organismo; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo de Cuenta</label>
                        <select name="tipocuent" class="form-control">
                            <option value="">- Seleccione -</option>
                            <option value="A" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->tipocuent) && $trabajador->tipocuent == 'A') ? 'selected' : ''; ?>>Ahorro</option>
                            <option value="C" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->tipocuent) && $trabajador->tipocuent == 'C') ? 'selected' : ''; ?>>Corriente</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Banco</label>
                        <input type="text" name="banco" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->banco : ''; ?>" 
                               maxlength="255">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Número de Cuenta</label>
                        <input type="text" name="cuenta" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador ? $trabajador->cuenta : ''; ?>" 
                               maxlength="40">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Observaciones</label>
                        <textarea name="observacion" class="form-control" rows="3" maxlength="1000"><?php echo isset($trabajador) && $trabajador ? $trabajador->observacion : ''; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar Trabajador
        </button>
        <a href="<?php echo base_url('Admin_c/trabajadores');?>" class="btn btn-default">
            <i class="fa fa-times"></i> Cancelar
        </a>
    </div>
</form>

<script>
// Validación básica del formulario
document.getElementById('form_trabajador').addEventListener('submit', function(e) {
    var cedula = document.querySelector('input[name="cedula"]').value;
    if (!/^\d+$/.test(cedula)) {
        alert('La cédula debe contener solo números');
        e.preventDefault();
        return false;
    }
});
</script>
