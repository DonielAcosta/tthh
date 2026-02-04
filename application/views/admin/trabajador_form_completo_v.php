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

<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<!-- jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<form action="<?php echo base_url('Admin_c/guardar_trabajador');?>" method="post" id="form_trabajador">
    
    <!-- Datos del Trabajador -->
    <fieldset style="border: 1px outset #8A0808; background: #FFFBE9; padding: 10px; margin-bottom: 15px;">
        <legend class="subtitulotabla" style="font-weight: bold; padding: 0 10px;">Datos del Trabajador</legend>
        <table style="width:100%; border-collapse:collapse; padding:0px;">
            <tr>
                <td style="width: 10%; padding: 5px; font-weight: bold;">Código:</td>
                <td style="width: 15%; padding: 5px;">
                    <input type="text" name="codigo" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->codigo : ''; ?>" 
                           required maxlength="15">
                </td>
                <td style="width: 10%; padding: 5px; font-weight: bold;">Nacionalidad:</td>
                <td style="width: 10%; padding: 5px;">
                    <select name="nacionalidad" class="form-control" required>
                        <option value="V" <?php echo (isset($trabajador) && $trabajador && $trabajador->persona->nacionalidad == 'V') ? 'selected' : ''; ?>>V</option>
                        <option value="E" <?php echo (isset($trabajador) && $trabajador && $trabajador->persona->nacionalidad == 'E') ? 'selected' : ''; ?>>E</option>
                    </select>
                </td>
                <td style="width: 10%; padding: 5px;">
                    <input type="text" name="cedula" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->cedula : ''; ?>" 
                           required maxlength="10" placeholder="Cédula">
                </td>
                <td style="width: 15%; padding: 5px; font-weight: bold;">Nombre:</td>
                <td style="width: 20%; padding: 5px;">
                    <input type="text" name="nombre1" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->nombre1 : ''; ?>" 
                           required maxlength="30">
                </td>
                <td style="width: 20%; padding: 5px;">
                    <input type="text" name="nombre2" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->nombre2 : ''; ?>" 
                           maxlength="30" placeholder="Segundo Nombre">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">RIF:</td>
                <td style="padding: 5px;">
                    <input type="text" name="rif" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->rif) ? $trabajador->rif : ''; ?>" 
                           maxlength="15">
                </td>
                <td style="padding: 5px; font-weight: bold;">Apellido:</td>
                <td colspan="2" style="padding: 5px;">
                    <input type="text" name="apellido1" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->apellido1 : ''; ?>" 
                           required maxlength="30">
                </td>
                <td style="padding: 5px;">
                    <input type="text" name="apellido2" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->apellido2 : ''; ?>" 
                           maxlength="30" placeholder="Segundo Apellido">
                </td>
                <td style="padding: 5px; font-weight: bold;">Teléfono:</td>
                <td style="padding: 5px;">
                    <input type="text" name="telefono" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->telefono : ''; ?>" 
                           maxlength="30">
                </td>
            </tr>
        </table>
    </fieldset>
    
    <!-- Relación Laboral -->
    <fieldset style="border: 1px outset #8A0808; background: #FFFBE9; padding: 10px; margin-bottom: 15px;">
        <table style="width:100%; border-collapse:collapse; padding:0px;">
            <tr>
                <td style="width: 15%; padding: 5px; font-weight: bold;">Contrato:</td>
                <td style="width: 15%; padding: 5px;">
                    <input type="text" name="contrato" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->contrato) ? $trabajador->contrato : ''; ?>" 
                           maxlength="5">
                </td>
                <td style="width: 15%; padding: 5px; font-weight: bold;">Vencimiento:</td>
                <td style="width: 15%; padding: 5px;">
                    <input type="date" name="vence" class="form-control" 
                           value="<?php 
                               if (isset($trabajador) && $trabajador && isset($trabajador->vence) && $trabajador->vence) {
                                   echo date('Y-m-d', strtotime($trabajador->vence));
                               }
                           ?>">
                </td>
                <td style="width: 15%; padding: 5px; font-weight: bold;">Cargo:</td>
                <td style="width: 25%; padding: 5px;">
                    <input type="text" name="cargo" class="form-control" 
                           value="<?php echo isset($trabajador) && $trabajador ? $trabajador->cargo : ''; ?>" 
                           required maxlength="8">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">Tipo:</td>
                <td style="padding: 5px;">
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
                </td>
                <td style="padding: 5px; font-weight: bold;">Frecuencia:</td>
                <td style="padding: 5px;">
                    <select name="tipo" class="form-control">
                        <option value="">- Seleccione -</option>
                        <option value="Q" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->tipo) && $trabajador->tipo == 'Q') ? 'selected' : ''; ?>>Quincenal</option>
                        <option value="M" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->tipo) && $trabajador->tipo == 'M') ? 'selected' : ''; ?>>Mensual</option>
                        <option value="S" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->tipo) && $trabajador->tipo == 'S') ? 'selected' : ''; ?>>Semanal</option>
                        <option value="B" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->tipo) && $trabajador->tipo == 'B') ? 'selected' : ''; ?>>BiSemanal</option>
                    </select>
                </td>
                <td style="padding: 5px; font-weight: bold;">Sueldo:</td>
                <td style="padding: 5px;">
                    <div class="input-group">
                        <input type="number" step="0.01" name="sueldo" class="form-control" 
                               value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->sueldo) ? $trabajador->sueldo : ''; ?>">
                        <span class="input-group-addon">
                            <select name="moneda" class="form-control" style="width: auto; border: none; padding: 0;">
                                <option value="VES" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->moneda) && $trabajador->moneda == 'VES') ? 'selected' : 'selected'; ?>>VES</option>
                                <option value="USD" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->moneda) && $trabajador->moneda == 'USD') ? 'selected' : ''; ?>>USD</option>
                            </select>
                        </span>
                    </div>
                </td>
            </tr>
        </table>
    </fieldset>

    <!-- Tabs -->
    <div id="maintabcontainer">
        <ul>
            <li><a href="#tab1">Relación Laboral</a></li>
            <li><a href="#tab2">Valores</a></li>
            <li><a href="#tab3">Variables</a></li>
            <li><a href="#tab4">Horarios</a></li>
            <li><a href="#tab5">Salud</a></li>
            <li><a href="#tab6">Contacto</a></li>
        </ul>
        
        <div id="tab1" style="background:#EEFFFF; padding: 15px;">
            <fieldset style="border: 1px outset #8A0808; padding: 10px; margin-bottom: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Estado:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="text" name="estado" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->estado) ? $trabajador->estado : ''; ?>" 
                                   maxlength="200">
                        </td>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Municipio:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="text" name="municipio" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->municipio) ? $trabajador->municipio : ''; ?>" 
                                   maxlength="200">
                        </td>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Parroquia:</td>
                        <td style="width: 15%; padding: 5px;">
                            <input type="text" name="parroquia" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->parroquia) ? $trabajador->parroquia : ''; ?>" 
                                   maxlength="200">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Código Postal:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="cpostal" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->cpostal) ? $trabajador->cpostal : ''; ?>" 
                                   maxlength="30">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Sucursal:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="sucursal" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->sucursal) ? $trabajador->sucursal : ''; ?>" 
                                   maxlength="2">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">División:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="divi" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->divi) ? $trabajador->divi : ''; ?>" 
                                   maxlength="8">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Departamento:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="depto" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->depto) ? $trabajador->depto : ''; ?>" 
                                   maxlength="8">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Dependencia Origen:</td>
                        <td colspan="3" style="padding: 5px;">
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
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Dependencia Adscrita:</td>
                        <td colspan="5" style="padding: 5px;">
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
                        </td>
                    </tr>
                </table>
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Dirección 1:</td>
                        <td style="padding: 5px;">
                            <textarea name="direc1" class="form-control" rows="2"><?php echo isset($trabajador) && $trabajador && isset($trabajador->direc1) ? $trabajador->direc1 : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Dirección 2:</td>
                        <td style="padding: 5px;">
                            <textarea name="direc2" class="form-control" rows="2"><?php echo isset($trabajador) && $trabajador && isset($trabajador->direc2) ? $trabajador->direc2 : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Dirección 3:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="direc3" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->direc3) ? $trabajador->direc3 : ''; ?>" 
                                   maxlength="30">
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Email:</td>
                        <td style="width: 25%; padding: 5px;">
                            <input type="email" name="correo" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador ? $trabajador->persona->correo : ''; ?>" 
                                   maxlength="100">
                        </td>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Sexo:</td>
                        <td style="width: 15%; padding: 5px;">
                            <select name="sexo" class="form-control">
                                <option value="">- Seleccione -</option>
                                <option value="M" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->sexo) && $trabajador->sexo == 'M') ? 'selected' : ''; ?>>Masculino</option>
                                <option value="F" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->sexo) && $trabajador->sexo == 'F') ? 'selected' : ''; ?>>Femenino</option>
                                <option value="O" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->sexo) && $trabajador->sexo == 'O') ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </td>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Estado Civil:</td>
                        <td style="width: 15%; padding: 5px;">
                            <select name="civil" class="form-control">
                                <option value="">- Seleccione -</option>
                                <option value="S" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->civil) && $trabajador->civil == 'S') ? 'selected' : ''; ?>>Soltero</option>
                                <option value="C" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->civil) && $trabajador->civil == 'C') ? 'selected' : ''; ?>>Casado</option>
                                <option value="D" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->civil) && $trabajador->civil == 'D') ? 'selected' : ''; ?>>Divorciado</option>
                                <option value="V" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->civil) && $trabajador->civil == 'V') ? 'selected' : ''; ?>>Viudo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Fecha Nacimiento:</td>
                        <td style="padding: 5px;">
                            <input type="date" name="nacimi" class="form-control" 
                                   value="<?php 
                                       if (isset($trabajador) && $trabajador && isset($trabajador->nacimi) && $trabajador->nacimi) {
                                           echo date('Y-m-d', strtotime($trabajador->nacimi));
                                       }
                                   ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Nro. SSO:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="sso" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->sso) ? $trabajador->sso : ''; ?>" 
                                   maxlength="11">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Nro. Carnet:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="carnet" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->carnet) ? $trabajador->carnet : ''; ?>" 
                                   maxlength="10">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
        <div id="tab2" style="background:#EEFFFF; padding: 15px;">
            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Fecha de Ingreso:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="date" name="fingreso" class="form-control" 
                                   value="<?php 
                                       if (isset($trabajador) && $trabajador && $trabajador->fingreso) {
                                           echo date('Y-m-d', strtotime($trabajador->fingreso));
                                       } else {
                                           echo date('Y-m-d');
                                       }
                                   ?>" required>
                        </td>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Fecha de Retiro:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="date" name="retiro" class="form-control" 
                                   value="<?php 
                                       if (isset($trabajador) && $trabajador && isset($trabajador->retiro) && $trabajador->retiro) {
                                           echo date('Y-m-d', strtotime($trabajador->retiro));
                                       }
                                   ?>">
                        </td>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Estatus:</td>
                        <td style="width: 20%; padding: 5px;">
                            <select name="status" class="form-control">
                                <option value="A" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'A') ? 'selected' : 'selected'; ?>>Activo</option>
                                <option value="V" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'V') ? 'selected' : ''; ?>>Vacaciones</option>
                                <option value="R" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'R') ? 'selected' : ''; ?>>Retirado</option>
                                <option value="I" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'I') ? 'selected' : ''; ?>>Inactivo</option>
                                <option value="P" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->status) && $trabajador->status == 'P') ? 'selected' : ''; ?>>Permiso</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Días Libres:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="dialib" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->dialib) ? $trabajador->dialib : ''; ?>" 
                                   maxlength="2">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Días Laborables:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="dialab" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->dialab) ? $trabajador->dialab : ''; ?>" 
                                   maxlength="2">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">X Días Laborables:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="xdialab" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->xdialab) ? $trabajador->xdialab : ''; ?>" 
                                   maxlength="2">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Tipo Cuenta:</td>
                        <td style="padding: 5px;">
                            <select name="cutipo" class="form-control">
                                <option value="">- Seleccione -</option>
                                <option value="A" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->cutipo) && $trabajador->cutipo == 'A') ? 'selected' : ''; ?>>Ahorro</option>
                                <option value="C" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->cutipo) && $trabajador->cutipo == 'C') ? 'selected' : ''; ?>>Corriente</option>
                            </select>
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Banco:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="banco" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador ? $trabajador->banco : ''; ?>" 
                                   maxlength="15">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Nro. Cuenta:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="cuenta" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador ? $trabajador->cuenta : ''; ?>" 
                                   maxlength="15">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Cuenta Bancaria:</td>
                        <td colspan="5" style="padding: 5px;">
                            <input type="text" name="cuentab" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->cuentab) ? $trabajador->cuentab : ''; ?>" 
                                   maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Enlace:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="enlace" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->enlace) ? $trabajador->enlace : ''; ?>" 
                                   maxlength="5">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Grupo Salarial:</td>
                        <td style="padding: 5px;">
                            <input type="number" name="gsal" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->gsal) ? $trabajador->gsal : ''; ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Último Aumento:</td>
                        <td style="padding: 5px;">
                            <input type="number" step="0.01" name="uaumento" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->uaumento) ? $trabajador->uaumento : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Profesión:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="profes" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->profes) ? $trabajador->profes : ''; ?>" 
                                   maxlength="8">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Nivel Educativo:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="niveled" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->niveled) ? $trabajador->niveled : ''; ?>" 
                                   maxlength="2">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Título:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="titulo" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->titulo) ? $trabajador->titulo : ''; ?>" 
                                   maxlength="50">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Educación:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="educacion" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->educacion) ? $trabajador->educacion : ''; ?>" 
                                   maxlength="50">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Evalúa:</td>
                        <td style="padding: 5px;">
                            <select name="evalua" class="form-control">
                                <option value="N" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->evalua) && $trabajador->evalua == 'N') ? 'selected' : 'selected'; ?>>No</option>
                                <option value="S" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->evalua) && $trabajador->evalua == 'S') ? 'selected' : ''; ?>>Sí</option>
                            </select>
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Evaluador:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="evaluador" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->evaluador) ? $trabajador->evaluador : ''; ?>" 
                                   maxlength="15">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Autoriza:</td>
                        <td style="padding: 5px;">
                            <input type="number" name="autoriza" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->autoriza) ? $trabajador->autoriza : ''; ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Formato:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="formato" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->formato) ? $trabajador->formato : ''; ?>" 
                                   maxlength="10">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Escritura:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="escritura" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->escritura) ? $trabajador->escritura : ''; ?>" 
                                   maxlength="25">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
        <div id="tab3" style="background:#EEFFFF; padding: 15px;">
            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Variable 1:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="number" step="0.01" name="vari1" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->vari1) ? $trabajador->vari1 : ''; ?>">
                        </td>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Variable 2:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="number" step="0.01" name="vari2" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->vari2) ? $trabajador->vari2 : ''; ?>">
                        </td>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Variable 3:</td>
                        <td style="width: 20%; padding: 5px;">
                            <input type="number" step="0.01" name="vari3" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->vari3) ? $trabajador->vari3 : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Variable 4:</td>
                        <td style="padding: 5px;">
                            <input type="number" name="vari4" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->vari4) ? $trabajador->vari4 : ''; ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Variable 5:</td>
                        <td style="padding: 5px;">
                            <input type="date" name="vari5" class="form-control" 
                                   value="<?php 
                                       if (isset($trabajador) && $trabajador && isset($trabajador->vari5) && $trabajador->vari5) {
                                           echo date('Y-m-d', strtotime($trabajador->vari5));
                                       }
                                   ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Variable 6:</td>
                        <td style="padding: 5px;">
                            <input type="number" step="0.01" name="vari6" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->vari6) ? $trabajador->vari6 : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Cuota Fija:</td>
                        <td style="padding: 5px;">
                            <input type="number" step="0.01" name="cuotafija" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->cuotafija) ? $trabajador->cuotafija : ''; ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Cesta Ticket:</td>
                        <td style="padding: 5px;">
                            <input type="number" step="0.01" name="cestaticket" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->cestaticket) ? $trabajador->cestaticket : ''; ?>">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">MAC:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="mac" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->mac) ? $trabajador->mac : ''; ?>" 
                                   maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">UUID:</td>
                        <td colspan="5" style="padding: 5px;">
                            <input type="text" name="uuid" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->uuid) ? $trabajador->uuid : ''; ?>" 
                                   maxlength="100">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
        <div id="tab4" style="background:#EEFFFF; padding: 15px;">
            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="width: 20%; padding: 5px; font-weight: bold;">Turno:</td>
                        <td style="width: 20%; padding: 5px;">
                            <select name="turno" class="form-control">
                                <option value="">- Seleccione -</option>
                                <option value="D" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->turno) && $trabajador->turno == 'D') ? 'selected' : ''; ?>>Diurno</option>
                                <option value="N" <?php echo (isset($trabajador) && $trabajador && isset($trabajador->turno) && $trabajador->turno == 'N') ? 'selected' : ''; ?>>Nocturno</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Turno Mañana Desde:</td>
                        <td style="padding: 5px;">
                            <input type="time" name="horame" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->horame) ? $trabajador->horame : ''; ?>" 
                                   maxlength="10">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Turno Mañana Hasta:</td>
                        <td style="padding: 5px;">
                            <input type="time" name="horams" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->horams) ? $trabajador->horams : ''; ?>" 
                                   maxlength="10">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Turno Tarde Desde:</td>
                        <td style="padding: 5px;">
                            <input type="time" name="horate" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->horate) ? $trabajador->horate : ''; ?>" 
                                   maxlength="10">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Turno Tarde Hasta:</td>
                        <td style="padding: 5px;">
                            <input type="time" name="horats" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->horats) ? $trabajador->horats : ''; ?>" 
                                   maxlength="10">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
        <div id="tab5" style="background:#EEFFFF; padding: 15px;">
            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Alergias:</td>
                        <td style="width: 35%; padding: 5px;">
                            <textarea name="alergias" class="form-control" rows="3"><?php echo isset($trabajador) && $trabajador && isset($trabajador->alergias) ? $trabajador->alergias : ''; ?></textarea>
                        </td>
                        <td style="width: 15%; padding: 5px; font-weight: bold;">Enfermedades:</td>
                        <td style="width: 35%; padding: 5px;">
                            <textarea name="enfermedades" class="form-control" rows="3"><?php echo isset($trabajador) && $trabajador && isset($trabajador->enfermedades) ? $trabajador->enfermedades : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Antecedentes Familiares:</td>
                        <td colspan="3" style="padding: 5px;">
                            <textarea name="antefam" class="form-control" rows="3"><?php echo isset($trabajador) && $trabajador && isset($trabajador->antefam) ? $trabajador->antefam : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Discapacidad:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="discapacidad" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->discapacidad) ? $trabajador->discapacidad : ''; ?>" 
                                   maxlength="50">
                        </td>
                        <td style="padding: 5px; font-weight: bold;">Habilidad Motriz:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="hmotriz" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->hmotriz) ? $trabajador->hmotriz : ''; ?>" 
                                   maxlength="50">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Tipo de Sangre:</td>
                        <td style="padding: 5px;">
                            <input type="text" name="tsangre" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->tsangre) ? $trabajador->tsangre : ''; ?>" 
                                   maxlength="8">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
        <div id="tab6" style="background:#EEFFFF; padding: 15px;">
            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <th style="padding: 5px; font-weight: bold;">Tipo</th>
                        <th style="padding: 5px; font-weight: bold;">Cédula</th>
                        <th style="padding: 5px; font-weight: bold;">Nombre</th>
                        <th style="padding: 5px; font-weight: bold;">Teléfono</th>
                    </tr>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <tr>
                        <td style="padding: 5px;">
                            <input type="text" name="tipofamil<?php echo $i; ?>" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->{'tipofamil'.$i}) ? $trabajador->{'tipofamil'.$i} : ''; ?>" 
                                   maxlength="50" placeholder="Tipo Familiar <?php echo $i; ?>">
                        </td>
                        <td style="padding: 5px;">
                            <input type="text" name="cifamil<?php echo $i; ?>" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->{'cifamil'.$i}) ? $trabajador->{'cifamil'.$i} : ''; ?>" 
                                   maxlength="50" placeholder="Cédula">
                        </td>
                        <td style="padding: 5px;">
                            <input type="text" name="nombref<?php echo $i; ?>" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->{'nombref'.$i}) ? $trabajador->{'nombref'.$i} : ''; ?>" 
                                   maxlength="200" placeholder="Nombre Completo">
                        </td>
                        <td style="padding: 5px;">
                            <input type="text" name="tlffamil<?php echo $i; ?>" class="form-control" 
                                   value="<?php echo isset($trabajador) && $trabajador && isset($trabajador->{'tlffamil'.$i}) ? $trabajador->{'tlffamil'.$i} : ''; ?>" 
                                   maxlength="50" placeholder="Teléfono">
                        </td>
                    </tr>
                    <?php endfor; ?>
                </table>
            </fieldset>
            
            <fieldset style="border: 1px outset #8A0808; padding: 10px; margin-top: 15px;">
                <table style="width:100%; border-collapse:collapse; padding:0px;">
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Observaciones:</td>
                        <td style="padding: 5px;">
                            <textarea name="observa" class="form-control" rows="4"><?php echo isset($trabajador) && $trabajador && isset($trabajador->observa) ? $trabajador->observa : ''; ?></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </div>
    
    <!-- Botones -->
    <div style="margin-top: 20px; text-align: right;">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar Trabajador
        </button>
        <a href="<?php echo base_url('Admin_c/trabajadores');?>" class="btn btn-default">
            <i class="fa fa-times"></i> Cancelar
        </a>
    </div>
</form>

<script>
$(document).ready(function() {
    // Inicializar tabs
    $("#maintabcontainer").tabs();
    
    // Validación básica del formulario
    $("#form_trabajador").on('submit', function(e) {
        var cedula = $('input[name="cedula"]').val();
        if (!/^\d+$/.test(cedula)) {
            alert('La cédula debe contener solo números');
            e.preventDefault();
            return false;
        }
    });
});
</script>
