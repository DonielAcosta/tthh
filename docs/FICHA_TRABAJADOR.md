# Ficha del Trabajador - Sistema TTHH

**Última actualización**: 2026-01-28

---

## 📋 ¿Qué es la Ficha del Trabajador?

La **ficha del trabajador** sería una vista consolidada que muestra toda la información personal y laboral de un trabajador en un solo lugar. Sin embargo, **actualmente esta funcionalidad no está completamente implementada** en el sistema principal TTHH.

---

## 🔍 Estado Actual

### ❌ No Existe una Vista Consolidada

En el sistema principal (`application/controllers/Trabajador_c.php`), **NO hay una función específica** que muestre una "ficha" completa del trabajador.

### ✅ Lo que SÍ Existe

El sistema tiene información del trabajador disponible, pero se muestra de forma fragmentada:

1. **Información Cargada en el Constructor**
   ```php
   // En Trabajador_c.php
   $this->trbm->get_by_persona($this->session->persona_id);
   ```
   Esto carga:
   - Datos personales (desde `Persona_m`)
   - Código del trabajador
   - Fecha de ingreso
   - Dependencia de origen y adscripción
   - Cargo
   - Banco y cuenta
   - Tipo de trabajador
   - Constancias

2. **Vistas Disponibles**
   - **Constancias de Trabajo**: `Trabajador_c/constancia_trabajo`
   - **Comprobantes de Pago**: `Trabajador_c/comprobante_pago`
   - **Solicitudes**: `Servicios_c/solicitud`

3. **Módulo Legacy (`formulario/`)**
   - Existe un módulo legacy que tiene una función `misDatos()`
   - Pero este módulo parece estar separado del sistema principal

---

## 📊 Información Disponible del Trabajador

Según el modelo `Trabajador_m.php`, la información que se puede obtener incluye:

### Datos Personales
- Nombre completo
- Cédula
- Correo electrónico
- Otros datos de la persona

### Datos Laborales
- **Código del trabajador**
- **Fecha de ingreso**
- **Cargo actual**
- **Dependencia de origen** (`dp_origen`)
- **Dependencia adscrita** (`dp_ads`)
- **Tipo de trabajador** (Empleado Fijo, Contratado, Obrero, etc.)
- **Banco**
- **Número de cuenta**
- **Observaciones**

### Historial Laboral
- Múltiples cargos (obtenido con `get_jobs_by_persona()`)
- Diferentes dependencias a lo largo del tiempo

---

## 🎯 ¿Dónde Ver la Información Actualmente?

### Opción 1: A través de Servicios

1. **Ir a Servicios**: `Servicios_c/` o desde el menú "Servicios"
2. **Acceder a**:
   - Constancias de Trabajo
   - Comprobantes de Pago
   - Solicitudes Varias

### Opción 2: Información en Constancias y Comprobantes

Cuando generas una constancia o comprobante, estos documentos incluyen:
- Nombre completo
- Cédula
- Código del trabajador
- Cargo
- Dependencia
- Fecha de ingreso
- Ingreso actual

---

## 💡 Cómo Implementar la Ficha del Trabajador

Si deseas crear una vista consolidada de la ficha del trabajador, aquí te muestro cómo hacerlo:

### Paso 1: Crear el Método en el Controlador

**Archivo**: `application/controllers/Trabajador_c.php`

```php
/**
 * Muestra la ficha completa del trabajador
 *
 * @access public
 * @return void
 */
public function ficha()
{
    // Los datos ya están cargados en el constructor
    $datos['page_encabezado'] = 'Mi Ficha de Trabajador';
    $datos['page_descripcion'] = 'Información personal y laboral';
    
    // Obtener todos los cargos del trabajador
    $datos['cargos'] = $this->cargos->get_jobs_by_persona($this->session->persona_id);
    
    // Datos del trabajador actual (ya cargados en constructor)
    $datos['trabajador'] = $this->trbm;
    
    // Cargar vista
    $datos['contenido'] = $this->load->view('trabajador/ficha_v', $datos, TRUE);
    $this->renderiza($this->entorno->empty_template, $datos);
}
```

### Paso 2: Crear la Vista

**Archivo**: `application/views/trabajador/ficha_v.php`

```php
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Personales</h3>
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>Nombre Completo:</dt>
            <dd><?php echo $trabajador->persona->get_nombre_full(); ?></dd>
            
            <dt>Cédula:</dt>
            <dd><?php echo $trabajador->persona->nacionalidad . '-' . $trabajador->persona->cedula; ?></dd>
            
            <dt>Correo:</dt>
            <dd><?php echo $trabajador->persona->correo; ?></dd>
        </dl>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Laborales</h3>
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>Código del Trabajador:</dt>
            <dd><?php echo $trabajador->codigo; ?></dd>
            
            <dt>Cargo:</dt>
            <dd><?php echo $trabajador->cargo; ?></dd>
            
            <dt>Tipo:</dt>
            <dd><?php echo $trabajador->tipo->tipo; ?></dd>
            
            <dt>Fecha de Ingreso:</dt>
            <dd><?php echo $trabajador->sfingreso; ?></dd>
            
            <dt>Dependencia de Origen:</dt>
            <dd><?php echo $trabajador->dp_origen->organismo; ?></dd>
            
            <dt>Dependencia Adscrita:</dt>
            <dd><?php echo $trabajador->dp_ads->organismo; ?></dd>
            
            <dt>Banco:</dt>
            <dd><?php echo $trabajador->banco; ?></dd>
            
            <dt>Número de Cuenta:</dt>
            <dd><?php echo $trabajador->cuenta; ?></dd>
        </dl>
    </div>
</div>

<?php if (!empty($cargos)): ?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Historial de Cargos</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cargo</th>
                    <th>Dependencia</th>
                    <th>Fecha Ingreso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cargos as $cargo): ?>
                <tr>
                    <td><?php echo $cargo['cargo']; ?></td>
                    <td><?php echo $cargo['organismo']; ?></td>
                    <td><?php echo $cargo['sfingreso']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
```

### Paso 3: Agregar al Menú

**Archivo**: `application/views/menu/trabajador_v.php`

Agregar después de la línea 20:

```php
<li><a href="<?php echo base_url('Trabajador_c/ficha');?>">
    <span class="icon-user"></span>Mi Ficha</a>
</li>
```

O agregar en la vista de servicios (`application/views/servicios/servicios_v.php`):

```php
<div class="form-group col-md-4 col-xs-6 divIconosCent">
    <a href="<?php echo base_url('Trabajador_c/ficha');?>">
        <img src="<?php echo base_url('img/misDatosNew.png');?>" class="iconoDesktop"><br>
        <label class="control-label">Mi Ficha</label>
    </a>
</div>
```

---

## 🔗 URLs Relacionadas

### Información Disponible Actualmente

- **Constancias**: `/Trabajador_c/constancia_trabajo`
- **Comprobantes**: `/Trabajador_c/comprobante_pago`
- **Solicitudes**: `/Servicios_c/solicitud`
- **Servicios**: `/Servicios_c/`

### Si Implementas la Ficha

- **Ficha del Trabajador**: `/Trabajador_c/ficha`

---

## 📝 Notas Importantes

1. **La información del trabajador se carga automáticamente** en el constructor de `Trabajador_c` cuando el usuario tiene sesión activa.

2. **Los datos están disponibles** en `$this->trbm` después del login.

3. **El modelo `Trabajador_m`** tiene métodos para obtener:
   - Datos por persona: `get_by_persona()`
   - Historial de cargos: `get_jobs_by_persona()`
   - Datos para constancias: `get_by_trabajador()`

4. **La vista `trabajador_view`** en la base de datos contiene toda la información consolidada del trabajador.

---

## 🚀 Recomendación

Para ver la información del trabajador actualmente, puedes:

1. **Generar una Constancia de Trabajo**: Contiene la mayoría de la información
2. **Ver un Comprobante de Pago**: Muestra datos laborales básicos
3. **Implementar la función `ficha()`** siguiendo los pasos anteriores

---

**Última actualización**: 2026-01-28
