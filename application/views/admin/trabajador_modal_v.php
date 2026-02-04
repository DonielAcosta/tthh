<!-- Modal para Trabajador -->
<div class="modal fade" id="modalTrabajador" tabindex="-1" role="dialog" aria-labelledby="modalTrabajadorLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 95%; max-width: 1400px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #3c8dbc; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; opacity: 0.8;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalTrabajadorLabel" style="font-weight: bold;">
                    Agregar/Editar Registro
                </h4>
            </div>
            <div class="modal-body" style="padding: 15px; background-color: #f9f9f9;">
                <form id="formTrabajadorModal" method="post">
                    <input type="hidden" name="trabajador_id" id="trabajador_id">
                    <input type="hidden" name="persona_id" id="persona_id">
                    
                    <!-- Datos del Trabajador -->
                    <fieldset style="border: 1px outset #8A0808; background: #FFFBE9; padding: 10px; margin-bottom: 15px;">
                        <legend class="subtitulotabla" style="font-weight: bold; padding: 0 10px; color: #8A0808;">Datos del Trabajador</legend>
                        <table style="width:100%; border-collapse:collapse; padding:0px;">
                            <tr>
                                <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: middle;">Código:</td>
                                <td style="width: 18%; padding: 5px;">
                                    <input type="text" name="codigo" id="codigo" class="form-control" maxlength="15" style="width: 100%;">
                                </td>
                                <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: middle;">Nombre:</td>
                                <td style="width: 28%; padding: 5px;">
                                    <input type="text" name="nombre1" id="nombre1" class="form-control" maxlength="30" style="width: 100%;">
                                </td>
                                <td style="width: 30%; padding: 5px;">
                                    <input type="text" name="nombre2" id="nombre2" class="form-control" maxlength="30" style="width: 100%;" placeholder="Segundo Nombre">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Cédula:</td>
                                <td style="padding: 5px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="padding: 0; width: 40%;">
                                                <select name="nacionalidad" id="nacionalidad" class="form-control" style="width: 100%;">
                                                    <option value="V">Venezolano</option>
                                                    <option value="E">Extranjero</option>
                                                </select>
                                            </td>
                                            <td style="padding: 0; width: 60%;">
                                                <input type="text" name="cedula" id="cedula" class="form-control" maxlength="10" style="width: 100%;" placeholder="Cédula">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Apellidos:</td>
                                <td colspan="2" style="padding: 5px;">
                                    <input type="text" name="apellido1" id="apellido1" class="form-control" maxlength="30" style="width: 100%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">RIF:</td>
                                <td style="padding: 5px;">
                                    <input type="text" name="rif" id="rif" class="form-control" maxlength="15" style="width: 100%;">
                                </td>
                                <td colspan="2" style="padding: 5px;">
                                    <a href="javascript:consulrif();" title="Consultar RIF en el SENIAT" style="color: #3c8dbc; text-decoration: underline;">Consultar RIF en el SENIAT</a>
                                </td>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Teléfono:</td>
                                <td style="padding: 5px;">
                                    <input type="text" name="telefono" id="telefono" class="form-control" maxlength="30" style="width: 100%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Contrato:</td>
                                <td style="padding: 5px;">
                                    <select name="contrato" id="contrato" class="form-control" style="width: 100%;">
                                        <option value="">Ninguno</option>
                                    </select>
                                </td>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Vencimiento:</td>
                                <td style="padding: 5px;">
                                    <input type="date" name="vence" id="vence" class="form-control" style="width: 100%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Cargo:</td>
                                <td style="padding: 5px;">
                                    <select name="cargo" id="cargo" class="form-control" style="width: 100%;">
                                        <option value="">- Seleccione -</option>
                                    </select>
                                </td>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Frecuencia:</td>
                                <td style="padding: 5px;">
                                    <select name="tipo" id="tipo" class="form-control" style="width: 100%;">
                                        <option value="">- Seleccione -</option>
                                        <option value="Q">Quincenal</option>
                                        <option value="M">Mensual</option>
                                        <option value="S">Semanal</option>
                                        <option value="B">BiSemanal</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Sueldo:</td>
                                <td style="padding: 5px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="padding: 0; width: 70%;">
                                                <input type="number" step="0.01" name="sueldo" id="sueldo" class="form-control" style="width: 100%;">
                                            </td>
                                            <td style="padding: 0; width: 30%;">
                                                <select name="moneda" id="moneda" class="form-control" style="width: 100%;">
                                                    <option value="VES">Bolivares</option>
                                                    <option value="USD">US dolares</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Grupo Salarial:</td>
                                <td style="padding: 5px;">
                                    <select name="gsal" id="gsal" class="form-control" style="width: 100%;">
                                        <option value="">Ninguno</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    
                    <!-- Tabs -->
                    <div id="maintabcontainer" style="margin-top: 15px;">
                        <ul style="background-color: #f4f4f4; border-bottom: 2px solid #ddd;">
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
                                        <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: middle;">Estado:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <select name="estado" id="estado" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                            </select>
                                        </td>
                                        <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: middle;">Municipio:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <select name="municipio" id="municipio" class="form-control" style="width: 100%;">
                                                <option value="">Seleccione un Estado primero</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Parroquia:</td>
                                        <td style="padding: 5px;">
                                            <select name="parroquia" id="parroquia" class="form-control" style="width: 100%;">
                                                <option value="">Seleccione un municipio primero</option>
                                            </select>
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Codigo postal:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="cpostal" id="cpostal" class="form-control" maxlength="30" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: top;">Dirección:</td>
                                        <td colspan="3" style="padding: 5px;">
                                            <textarea name="direc1" id="direc1" class="form-control" rows="2" style="width: 100%;"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                            
                            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr>
                                        <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: middle;">Email:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <input type="email" name="correo" id="correo" class="form-control" maxlength="100" style="width: 100%;">
                                        </td>
                                        <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: middle;">Sexo:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <select name="sexo" id="sexo" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                                <option value="O">Otro</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">División:</td>
                                        <td style="padding: 5px;">
                                            <select name="divi" id="divi" class="form-control" style="width: 100%;">
                                                <option value="">Seleccionar</option>
                                            </select>
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Sucursal:</td>
                                        <td style="padding: 5px;">
                                            <select name="sucursal" id="sucursal" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Departamento:</td>
                                        <td style="padding: 5px;">
                                            <select name="depto" id="depto" class="form-control" style="width: 100%;">
                                                <option value="">Seleccione un Division</option>
                                            </select>
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Estado Civil:</td>
                                        <td style="padding: 5px;">
                                            <select name="civil" id="civil" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                                <option value="S">Soltero</option>
                                                <option value="C">Casado</option>
                                                <option value="D">Divorciado</option>
                                                <option value="V">Viudo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Nacimiento:</td>
                                        <td style="padding: 5px;">
                                            <input type="date" name="nacimi" id="nacimi" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Es Evaluador:</td>
                                        <td style="padding: 5px;">
                                            <select name="evalua" id="evalua" class="form-control" style="width: 100%;">
                                                <option value="N">No</option>
                                                <option value="S">Sí</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Aut Permiso:</td>
                                        <td style="padding: 5px;">
                                            <select name="autoriza" id="autoriza" class="form-control" style="width: 100%;">
                                                <option value="">Ninguna</option>
                                            </select>
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Evaluador:</td>
                                        <td style="padding: 5px;">
                                            <select name="evaluador" id="evaluador" class="form-control" style="width: 100%;">
                                                <option value="">Ninguna</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Dependencia Origen:</td>
                                        <td colspan="3" style="padding: 5px;">
                                            <select name="dp_adm_fk" id="dp_adm_fk" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                                <?php if (isset($dependencias)): ?>
                                                    <?php foreach ($dependencias as $id => $organismo): ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $organismo; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Dependencia Adscrita:</td>
                                        <td colspan="3" style="padding: 5px;">
                                            <select name="dp_ads_fk" id="dp_ads_fk" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                                <?php if (isset($dependencias)): ?>
                                                    <?php foreach ($dependencias as $id => $organismo): ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $organismo; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        
                        <div id="tab2" style="background:#EEFFFF; padding: 15px;">
                            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Fecha de Ingreso:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <input type="date" name="fingreso" id="fingreso" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Fecha de Retiro:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <input type="date" name="retiro" id="retiro" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Estatus:</td>
                                        <td style="width: 15%; padding: 5px;">
                                            <select name="status" id="status" class="form-control" style="width: 100%;">
                                                <option value="A">Activo</option>
                                                <option value="V">Vacaciones</option>
                                                <option value="R">Retirado</option>
                                                <option value="I">Inactivo</option>
                                                <option value="P">Permiso</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Días Libres:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="dialib" id="dialib" class="form-control" maxlength="2" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Días Laborables:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="dialab" id="dialab" class="form-control" maxlength="2" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">X Días Laborables:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="xdialab" id="xdialab" class="form-control" maxlength="2" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Tipo Cuenta:</td>
                                        <td style="padding: 5px;">
                                            <select name="cutipo" id="cutipo" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                                <option value="A">Ahorro</option>
                                                <option value="C">Corriente</option>
                                            </select>
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Banco:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="banco" id="banco" class="form-control" maxlength="15" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Nro. Cuenta:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="cuenta" id="cuenta" class="form-control" maxlength="15" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Cuenta Bancaria:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="cuentab" id="cuentab" class="form-control" maxlength="20" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Nro. SSO:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="sso" id="sso" class="form-control" maxlength="11" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Nro. Carnet:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="carnet" id="carnet" class="form-control" maxlength="10" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Enlace:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="enlace" id="enlace" class="form-control" maxlength="5" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Profesión:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="profes" id="profes" class="form-control" maxlength="8" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Nivel Educativo:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="niveled" id="niveled" class="form-control" maxlength="2" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Título:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="titulo" id="titulo" class="form-control" maxlength="50" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Educación:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="educacion" id="educacion" class="form-control" maxlength="50" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Último Aumento:</td>
                                        <td style="padding: 5px;">
                                            <input type="number" step="0.01" name="uaumento" id="uaumento" class="form-control" style="width: 100%;">
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        
                        <div id="tab3" style="background:#EEFFFF; padding: 15px;">
                            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Variable 1:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <input type="number" step="0.01" name="vari1" id="vari1" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Variable 2:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <input type="number" step="0.01" name="vari2" id="vari2" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Variable 3:</td>
                                        <td style="width: 15%; padding: 5px;">
                                            <input type="number" step="0.01" name="vari3" id="vari3" class="form-control" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Variable 4:</td>
                                        <td style="padding: 5px;">
                                            <input type="number" name="vari4" id="vari4" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Variable 5:</td>
                                        <td style="padding: 5px;">
                                            <input type="date" name="vari5" id="vari5" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Variable 6:</td>
                                        <td style="padding: 5px;">
                                            <input type="number" step="0.01" name="vari6" id="vari6" class="form-control" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Cuota Fija:</td>
                                        <td style="padding: 5px;">
                                            <input type="number" step="0.01" name="cuotafija" id="cuotafija" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Cesta Ticket:</td>
                                        <td style="padding: 5px;">
                                            <input type="number" step="0.01" name="cestaticket" id="cestaticket" class="form-control" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">MAC:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="mac" id="mac" class="form-control" maxlength="20" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">UUID:</td>
                                        <td colspan="5" style="padding: 5px;">
                                            <input type="text" name="uuid" id="uuid" class="form-control" maxlength="100" style="width: 100%;">
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        
                        <div id="tab4" style="background:#EEFFFF; padding: 15px;">
                            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr>
                                        <td style="width: 15%; padding: 5px; font-weight: bold; vertical-align: middle;">Turno:</td>
                                        <td style="width: 20%; padding: 5px;">
                                            <select name="turno" id="turno" class="form-control" style="width: 100%;">
                                                <option value="">- Seleccione -</option>
                                                <option value="D">Diurno</option>
                                                <option value="N">Nocturno</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Turno Mañana Desde:</td>
                                        <td style="padding: 5px;">
                                            <input type="time" name="horame" id="horame" class="form-control" maxlength="10" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Turno Mañana Hasta:</td>
                                        <td style="padding: 5px;">
                                            <input type="time" name="horams" id="horams" class="form-control" maxlength="10" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Turno Tarde Desde:</td>
                                        <td style="padding: 5px;">
                                            <input type="time" name="horate" id="horate" class="form-control" maxlength="10" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Turno Tarde Hasta:</td>
                                        <td style="padding: 5px;">
                                            <input type="time" name="horats" id="horats" class="form-control" maxlength="10" style="width: 100%;">
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        
                        <div id="tab5" style="background:#EEFFFF; padding: 15px;">
                            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr>
                                        <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: top;">Alergias:</td>
                                        <td style="width: 38%; padding: 5px;">
                                            <textarea name="alergias" id="alergias" class="form-control" rows="3" style="width: 100%;"></textarea>
                                        </td>
                                        <td style="width: 12%; padding: 5px; font-weight: bold; vertical-align: top;">Enfermedades:</td>
                                        <td style="width: 38%; padding: 5px;">
                                            <textarea name="enfermedades" id="enfermedades" class="form-control" rows="3" style="width: 100%;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: top;">Antecedentes Familiares:</td>
                                        <td colspan="3" style="padding: 5px;">
                                            <textarea name="antefam" id="antefam" class="form-control" rows="3" style="width: 100%;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Discapacidad:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="discapacidad" id="discapacidad" class="form-control" maxlength="50" style="width: 100%;">
                                        </td>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Habilidad Motriz:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="hmotriz" id="hmotriz" class="form-control" maxlength="50" style="width: 100%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: middle;">Tipo de Sangre:</td>
                                        <td style="padding: 5px;">
                                            <input type="text" name="tsangre" id="tsangre" class="form-control" maxlength="8" style="width: 100%;">
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        
                        <div id="tab6" style="background:#EEFFFF; padding: 15px;">
                            <fieldset style="border: 1px outset #8A0808; padding: 10px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr style="background-color: #f0f0f0;">
                                        <th style="padding: 8px; font-weight: bold; text-align: left; border: 1px solid #ddd;">Tipo</th>
                                        <th style="padding: 8px; font-weight: bold; text-align: left; border: 1px solid #ddd;">Cédula</th>
                                        <th style="padding: 8px; font-weight: bold; text-align: left; border: 1px solid #ddd;">Nombre</th>
                                        <th style="padding: 8px; font-weight: bold; text-align: left; border: 1px solid #ddd;">Teléfono</th>
                                    </tr>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <tr>
                                        <td style="padding: 5px; border: 1px solid #ddd;">
                                            <input type="text" name="tipofamil<?php echo $i; ?>" id="tipofamil<?php echo $i; ?>" class="form-control" maxlength="50" style="width: 100%;" placeholder="Tipo Familiar <?php echo $i; ?>">
                                        </td>
                                        <td style="padding: 5px; border: 1px solid #ddd;">
                                            <input type="text" name="cifamil<?php echo $i; ?>" id="cifamil<?php echo $i; ?>" class="form-control" maxlength="50" style="width: 100%;" placeholder="Cédula">
                                        </td>
                                        <td style="padding: 5px; border: 1px solid #ddd;">
                                            <input type="text" name="nombref<?php echo $i; ?>" id="nombref<?php echo $i; ?>" class="form-control" maxlength="200" style="width: 100%;" placeholder="Nombre Completo">
                                        </td>
                                        <td style="padding: 5px; border: 1px solid #ddd;">
                                            <input type="text" name="tlffamil<?php echo $i; ?>" id="tlffamil<?php echo $i; ?>" class="form-control" maxlength="50" style="width: 100%;" placeholder="Teléfono">
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </table>
                            </fieldset>
                            
                            <fieldset style="border: 1px outset #8A0808; padding: 10px; margin-top: 15px;">
                                <table style="width:100%; border-collapse:collapse; padding:0px;">
                                    <tr>
                                        <td style="padding: 5px; font-weight: bold; vertical-align: top;">Observaciones:</td>
                                        <td style="padding: 5px;">
                                            <textarea name="observa" id="observa" class="form-control" rows="4" style="width: 100%;"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background-color: #f9f9f9; border-top: 1px solid #ddd;">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-primary" id="btnGuardarModal">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<!-- jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<style>
#maintabcontainer .ui-tabs-nav {
    background-color: #f4f4f4;
    border-bottom: 2px solid #ddd;
    padding: 0;
    margin: 0;
}
#maintabcontainer .ui-tabs-nav li {
    margin: 0;
    padding: 0;
}
#maintabcontainer .ui-tabs-nav li a {
    padding: 8px 15px;
    color: #555;
    text-decoration: none;
}
#maintabcontainer .ui-tabs-nav li.ui-tabs-active a {
    background-color: #EEFFFF;
    color: #3c8dbc;
    font-weight: bold;
    border-bottom: 2px solid #3c8dbc;
}
#maintabcontainer .ui-tabs-panel {
    padding: 15px;
    background-color: #EEFFFF;
}
</style>

<script>
// Selector Estado / Municipio / Parroquia (réplica proteoerp)
function estado_change_modal(mun, par) {
    mun = parseInt(mun, 10) || 0;
    par = parseInt(par, 10) || 0;
    $.post("<?php echo base_url('ajax/traemunicipio'); ?>", { estado: $("#estado").val() }, function(data) {
        $("#municipio").html(data);
        if (mun > 0) $("#municipio").val(mun);
        if (par > 0) municipio_change_modal(par);
    });
}
function municipio_change_modal(par) {
    par = parseInt(par, 10) || 0;
    $.post("<?php echo base_url('ajax/traeparroquia'); ?>", { municipio: $("#municipio").val() }, function(data) {
        $("#parroquia").html(data);
        if (par > 0) $("#parroquia").val(par);
    });
}

$(document).ready(function() {
    // Inicializar tabs
    $("#maintabcontainer").tabs();
    
    // Cargar estados (Estado / Municipio / Parroquia)
    $.get("<?php echo base_url('ajax/traeestado'); ?>", function(data) {
        $("#estado").html(data);
    });
    $("#estado").off("change").on("change", function() { estado_change_modal(0, 0); });
    $("#municipio").off("change").on("change", function() { municipio_change_modal(0); });
    
    // Función para consultar RIF (placeholder)
    window.consulrif = function() {
        var rif = $("#rif").val();
        if (rif.length == 0) {
            alert("Por favor ingrese un RIF");
            return;
        }
        // Aquí iría la lógica para consultar el RIF en el SENIAT
        alert("Función de consulta RIF - Pendiente de implementar");
    };
    
    // Función para cargar datos del trabajador en el modal
    window.cargarTrabajadorModal = function(trabajadorId) {
        // Determinar la URL según el contexto
        var url = '<?php echo base_url("Admin_c/obtener_trabajador"); ?>';
        // Si estamos en el módulo nomina, usar esa URL
        if (window.location.pathname.indexOf('/nomina/pers') !== -1) {
            url = '<?php echo base_url("nomina/pers/obtener_trabajador"); ?>';
        }
        
        $.ajax({
            url: url,
            type: 'POST',
            data: { trabajador_id: trabajadorId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var t = response.trabajador;
                    var p = response.persona;
                    
                    // Datos básicos
                    $('#trabajador_id').val(t.id || '');
                    $('#persona_id').val(p.id || '');
                    $('#codigo').val(t.codigo || '');
                    $('#nombre1').val(p.nombre1 || '');
                    $('#nombre2').val(p.nombre2 || '');
                    $('#apellido1').val(p.apellido1 || '');
                    $('#nacionalidad').val(p.nacionalidad || 'V');
                    $('#cedula').val(p.cedula || '');
                    $('#rif').val(t.rif || p.rif || '');
                    $('#telefono').val(p.telefono || '');
                    
                    // Datos laborales
                    $('#contrato').val(t.contrato || '');
                    $('#vence').val(t.vence ? t.vence.split(' ')[0] : '');
                    $('#cargo').val(t.cargo || '');
                    $('#tipo_fk').val(t.tipo_fk || '');
                    $('#tipo').val(t.tipo || '');
                    $('#sueldo').val(t.sueldo || '');
                    $('#moneda').val(t.moneda || 'VES');
                    $('#gsal').val(t.gsal || '');
                    $('#fingreso').val(t.fingreso ? t.fingreso.split(' ')[0] : '');
                    $('#retiro').val(t.retiro ? t.retiro.split(' ')[0] : '');
                    $('#status').val(t.status || 'A');
                    $('#dp_adm_fk').val(t.dp_adm_fk || '');
                    $('#dp_ads_fk').val(t.dp_ads_fk || '');
                    
                    // Datos adicionales
                    $('#sexo').val(t.sexo || p.sexo || '');
                    $('#civil').val(t.civil || p.civil || '');
                    $('#nacimi').val(t.nacimi ? t.nacimi.split(' ')[0] : (p.nacimi ? p.nacimi.split(' ')[0] : ''));
                    $('#correo').val(p.correo || '');
                    $('#direc1').val(t.direc1 || p.direc1 || '');
                    $('#direc2').val(t.direc2 || '');
                    $('#direc3').val(t.direc3 || '');
                    $('#estado').val(t.estado || '');
                    $('#cpostal').val(t.cpostal || '');
                    // Cascada Estado -> Municipio -> Parroquia (como en proteoerp)
                    estado_change_modal(t.municipio || 0, t.parroquia || 0);
                    $('#divi').val(t.divi || '');
                    $('#sucursal').val(t.sucursal || '');
                    $('#depto').val(t.depto || '');
                    $('#evalua').val(t.evalua || 'N');
                    $('#evaluador').val(t.evaluador || '');
                    $('#autoriza').val(t.autoriza || '');
                    
                    // Valores
                    $('#banco').val(t.banco || '');
                    $('#cuenta').val(t.cuenta || '');
                    $('#cuentab').val(t.cuentab || '');
                    $('#cutipo').val(t.cutipo || '');
                    $('#sso').val(t.sso || '');
                    $('#carnet').val(t.carnet || '');
                    $('#enlace').val(t.enlace || '');
                    $('#profes').val(t.profes || '');
                    $('#niveled').val(t.niveled || '');
                    $('#titulo').val(t.titulo || '');
                    $('#educacion').val(t.educacion || '');
                    $('#uaumento').val(t.uaumento || '');
                    $('#dialib').val(t.dialib || '');
                    $('#dialab').val(t.dialab || '');
                    $('#xdialab').val(t.xdialab || '');
                    
                    // Variables
                    $('#vari1').val(t.vari1 || '');
                    $('#vari2').val(t.vari2 || '');
                    $('#vari3').val(t.vari3 || '');
                    $('#vari4').val(t.vari4 || '');
                    $('#vari5').val(t.vari5 ? t.vari5.split(' ')[0] : '');
                    $('#vari6').val(t.vari6 || '');
                    $('#cuotafija').val(t.cuotafija || '');
                    $('#cestaticket').val(t.cestaticket || '');
                    $('#mac').val(t.mac || '');
                    $('#uuid').val(t.uuid || '');
                    
                    // Horarios
                    $('#turno').val(t.turno || '');
                    $('#horame').val(t.horame || '');
                    $('#horams').val(t.horams || '');
                    $('#horate').val(t.horate || '');
                    $('#horats').val(t.horats || '');
                    
                    // Salud
                    $('#alergias').val(t.alergias || '');
                    $('#enfermedades').val(t.enfermedades || '');
                    $('#antefam').val(t.antefam || '');
                    $('#discapacidad').val(t.discapacidad || '');
                    $('#hmotriz').val(t.hmotriz || '');
                    $('#tsangre').val(t.tsangre || '');
                    
                    // Familiares
                    for (var i = 1; i <= 5; i++) {
                        $('#tipofamil' + i).val(t['tipofamil' + i] || '');
                        $('#cifamil' + i).val(t['cifamil' + i] || '');
                        $('#nombref' + i).val(t['nombref' + i] || '');
                        $('#tlffamil' + i).val(t['tlffamil' + i] || '');
                    }
                    
                    // Observaciones
                    $('#observa').val(t.observa || t.observacion || '');
                    
                    $('#modalTrabajador').modal('show');
                } else {
                    alert('Error al cargar los datos del trabajador');
                }
            },
            error: function() {
                alert('Error al cargar los datos del trabajador');
            }
        });
    };
    
    // Guardar cambios - función por defecto (puede ser sobrescrita)
    if (!$('#btnGuardarModal').data('custom-handler')) {
        $('#btnGuardarModal').click(function() {
            var formData = $('#formTrabajadorModal').serialize();
            var url = '<?php echo base_url("Admin_c/actualizar_trabajador"); ?>';
            
            // Si estamos en el módulo nomina, usar esa URL
            if (window.location.pathname.indexOf('/nomina/pers') !== -1) {
                url = '<?php echo base_url("nomina/pers/setData"); ?>';
                var trabajadorId = $('#trabajador_id').val();
                var oper = trabajadorId ? 'edit' : 'add';
                formData += "&oper=" + oper;
                if (trabajadorId) {
                    formData += "&id=" + trabajadorId;
                }
                // Mapear campos
                formData = formData.replace(/nombre1=/g, 'nombre=');
                formData = formData.replace(/apellido1=/g, 'apellido=');
                formData = formData.replace(/nacionalidad=/g, 'nacional=');
                formData = formData.replace(/fingreso=/g, 'ingreso=');
                formData = formData.replace(/correo=/g, 'email=');
            }
            
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (typeof response === 'string') {
                        alert(response);
                    } else if (response.success) {
                        alert('Trabajador actualizado exitosamente');
                    } else {
                        alert('Error: ' + (response.mensaje || 'Error desconocido'));
                    }
                    $('#modalTrabajador').modal('hide');
                    if (typeof $(gridPers) !== 'undefined') {
                        $(gridPers).trigger("reloadGrid");
                    } else {
                        location.reload();
                    }
                },
                error: function() {
                    alert('Error al actualizar el trabajador');
                }
            });
        });
    }
});
</script>
