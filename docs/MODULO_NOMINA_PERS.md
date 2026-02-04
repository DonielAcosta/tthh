# Módulo de Nómina - Controlador Pers

**Fecha**: 2026-01-28  
**Desarrollador**: Ing. Doniel Acosta

---

## 📋 Descripción

Se ha creado el módulo de **Nómina** con el controlador **Pers** que replica la funcionalidad del controlador `pers.php` del sistema proteoerp, adaptado para funcionar en el sistema TTHH.

---

## 🗂 Estructura Creada

```
application/
├── controllers/
│   └── nomina/
│       └── Pers.php          # Controlador principal
└── views/
    └── nomina/
        ├── pers_grid_v.php   # Vista del grid principal
        └── pers_form_modal_v.php  # Vista del formulario modal
```

---

## 🎯 Funcionalidades Implementadas

### Controlador Pers.php

#### Métodos Principales:

1. **`index()`**
   - Función principal que redirige a la vista del grid
   - Ejecuta la instalación inicial

2. **`jqdatag()`**
   - Vista principal con grid de trabajadores
   - Muestra lista de trabajadores en formato de tabla interactiva

3. **`getdata()`**
   - Obtiene datos de trabajadores para el grid (AJAX)
   - Soporta paginación, ordenamiento y filtrado
   - Formatea respuesta en formato jqGrid

4. **`setData()`**
   - Guarda/actualiza/elimina trabajadores (AJAX)
   - Maneja operaciones: `add`, `edit`, `del`
   - Valida movimientos antes de eliminar

5. **`obtener_trabajador()`**
   - Obtiene datos completos de un trabajador para el modal
   - Retorna JSON con todos los campos de la tabla `pers`

6. **`variables()`**
   - Actualiza las variables (vari1-vari6) de un trabajador

7. **`depto($divi)`**
   - Obtiene departamentos según división (AJAX)
   - Para dropdowns dependientes

8. **`tabla($id)`**
   - Muestra foto del trabajador seleccionado
   - Panel lateral con información adicional

9. **`dataedit()`**
   - Carga el formulario modal para crear/editar
   - Reutiliza el modal de trabajador existente

10. **`instalar()`**
    - Verifica y crea campos necesarios en la tabla trabajador
    - Función de instalación inicial

---

## 📊 Vista del Grid (pers_grid_v.php)

### Características:

- **Grid interactivo** usando jqGrid
- **Columnas visibles**:
  - Código, Nombre, Apellido, Nacionalidad, Cédula
  - Frecuencia, Estatus, Nacimiento, Teléfono
  - Sexo, División, Estado Civil, Departamento
  - Ingreso, Cargo, Moneda, Sueldo
  - Profesión, Nivel Formación, Cuenta
  - Días Libres, Contrato, Carnet, Enlace, Vencimiento

- **Funcionalidades**:
  - Búsqueda y filtrado en tiempo real
  - Paginación configurable (10, 20, 30, 50, 100 registros)
  - Ordenamiento por cualquier columna
  - Coloreado de filas según estatus:
    - Rojo: Retirado/Inactivo
    - Amarillo: Vacaciones/Permiso
    - Verde: Moneda USD

- **Botones de acción**:
  - Agregar: Abre modal para crear nuevo trabajador
  - Editar: Abre modal con datos del trabajador seleccionado
  - Eliminar: Elimina trabajador (con validación de movimientos)

- **Panel lateral**:
  - Muestra foto del trabajador seleccionado
  - Información adicional

---

## 🎨 Modal de Trabajador

El módulo reutiliza el modal completo creado anteriormente (`admin/trabajador_modal_v.php`) que incluye:

### Tabs Organizados:

1. **Relación Laboral**
   - Datos básicos del trabajador
   - Dirección completa (direc1, direc2, direc3)
   - Estado, Municipio, Parroquia, Código Postal
   - Email, Sexo, División, Sucursal
   - Departamento, Estado Civil, Nacimiento
   - Es Evaluador, Aut Permiso, Evaluador
   - Dependencias (Origen y Adscrita)

2. **Valores**
   - Fechas de Ingreso y Retiro
   - Estatus, Días Libres/Laborables
   - Datos bancarios (Tipo Cuenta, Banco, Nro. Cuenta)
   - Nro. SSO, Nro. Carnet, Enlace
   - Profesión, Nivel Educativo, Título, Educación
   - Último Aumento

3. **Variables**
   - Variable 1-6
   - Cuota Fija, Cesta Ticket
   - MAC, UUID

4. **Horarios**
   - Turno (Diurno/Nocturno)
   - Horarios Mañana (Desde/Hasta)
   - Horarios Tarde (Desde/Hasta)

5. **Salud**
   - Alergias, Enfermedades
   - Antecedentes Familiares
   - Discapacidad, Habilidad Motriz
   - Tipo de Sangre

6. **Contacto**
   - 5 Familiares (Tipo, Cédula, Nombre, Teléfono)
   - Observaciones

---

## 🔧 Campos de la Tabla Pers

El sistema maneja **TODOS** los campos de la tabla `pers`:

### Datos Básicos:
- `codigo`, `nacional`, `cedula`, `nombre`, `apellido`
- `direc1`, `direc2`, `direc3`, `telefono`, `email`
- `nacimi`, `sexo`, `civil`, `rif`

### Datos Laborales:
- `cargo`, `tipo`, `contrato`, `vence`
- `ingreso`, `retiro`, `status`
- `dialib`, `dialab`, `xdialab`
- `sueldo`, `moneda`, `gsal`
- `sso`, `carnet`, `enlace`

### Ubicación:
- `estado`, `municipio`, `parroquia`, `cpostal`
- `sucursal`, `divi`, `depto`

### Variables:
- `vari1`, `vari2`, `vari3`, `vari4`, `vari5`, `vari6`
- `cuotafija`, `cestaticket`, `uaumento`

### Horarios:
- `turno`, `horame`, `horams`, `horate`, `horats`

### Salud:
- `alergias`, `enfermedades`, `antefam`
- `discapacidad`, `hmotriz`, `tsangre`

### Familiares:
- `tipofamil1-5`, `cifamil1-5`, `nombref1-5`, `tlffamil1-5`

### Otros:
- `profes`, `niveled`, `titulo`, `educacion`
- `evalua`, `evaluador`, `autoriza`
- `banco`, `cuenta`, `cuentab`, `cutipo`
- `mac`, `uuid`, `observa`, `formato`

---

## 🚀 Cómo Acceder

### URL del Módulo:
```
http://localhost/tthh/nomina/pers
http://localhost/tthh/nomina/pers/jqdatag
```

### Requisitos:
- Usuario con rol **Administrador**
- Tabla `trabajador` con todos los campos de `pers`
- Tabla `persona` relacionada

---

## 📝 Notas de Implementación

### Adaptaciones Realizadas:

1. **Librerías**:
   - Se reemplazó `rapyd` y `jqdatagrid` de proteoerp por:
     - jqGrid desde CDN
     - Modal Bootstrap existente
     - jQuery UI para tabs

2. **Estructura de Datos**:
   - El sistema TTHH usa `trabajador` + `persona` (relación)
   - ProteoERP usa tabla única `pers`
   - Se adaptaron las consultas para trabajar con ambas tablas

3. **Vistas**:
   - Se reutilizó el modal completo de trabajador
   - Se creó vista de grid específica para nómina
   - Compatible con el sistema existente

4. **Funcionalidades Pendientes**:
   - Consulta RIF en SENIAT (placeholder)
   - Gestión de fotos de trabajadores
   - Formularios de profesiones, cargos, divisiones, etc.
   - Gestión de reposo, vacaciones, hijos
   - Cálculo de bonos
   - Adjuntos de documentos

---

## 🔄 Integración con Sistema Existente

El módulo está completamente integrado:

- ✅ Usa los mismos modelos (`Trabajador_m`, `Persona_m`)
- ✅ Reutiliza el modal de trabajador existente
- ✅ Compatible con la estructura de base de datos actual
- ✅ Respeta los permisos del sistema (solo Administradores)

---

## 📌 Próximos Pasos

Para completar la funcionalidad completa del controlador original:

1. Crear formularios de gestión para:
   - Profesiones (`profeform`)
   - Cargos (`cargoform`)
   - Grupos Salariales (`gsalform`)
   - Divisiones (`diviform`)
   - Departamentos (`depaform`)

2. Implementar funcionalidades adicionales:
   - Gestión de reposo (`reposoform`)
   - Gestión de vacaciones (`vacaform`)
   - Gestión de hijos (`hijosform`)
   - Gestión de discapacidades (`discaform`)
   - Gestión de títulos (`tituform`)
   - Gestión de educación (`eduform`)

3. Funcionalidades de nómina:
   - Cálculo de bonos (`cbonos`, `cbonosde`, `cbonosca`)
   - Gestión de fotos (`persfot`)
   - Gestión de adjuntos (`adjuntos`)

---

**Última actualización**: 2026-01-28
