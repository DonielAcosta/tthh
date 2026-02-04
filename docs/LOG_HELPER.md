# Log Helper - Sistema de Logging de Usuarios

**Fecha**: 2026-01-28  
**Desarrollador**: Ing. Doniel Acosta

---

## 📋 Descripción

Helper para registro de actividades de usuarios y eventos del sistema. Basado en `log_helper.php` de proteoerp, adaptado para funcionar con PostgreSQL y MySQL/MariaDB.

---

## 📁 Ubicación

```
application/helpers/log_helper.php
```

---

## 🔧 Funciones Disponibles

### 1. `logusu($modulo, $comentario)`

Registra una acción del usuario en el log principal.

**Parámetros:**
- `$modulo` (string): Nombre del módulo donde ocurre la acción
- `$comentario` (string): Descripción de la acción realizada

**Retorna:** `bool` - TRUE si se guardó correctamente, FALSE en caso contrario

**Ejemplo:**
```php
logusu('PERS', 'Personal TRABAJ001 INCLUIDO');
logusu('PERS', 'Personal TRABAJ001 MODIFICADO');
logusu('PERS', 'Personal TRABAJ001 ELIMINADO');
```

**Tabla:** `logusu`
- `id`: ID único del registro
- `usuario`: Usuario que realizó la acción
- `fecha`: Fecha de la acción
- `hora`: Hora de la acción
- `modulo`: Módulo donde ocurrió
- `comenta`: Comentario/descripción
- `conexion`: IP del cliente
- `created_at`: Timestamp de creación

---

### 2. `hlogusu($localiza, $observa1, $observa2 = '')`

Registra cambios por localización/habitación (específico para sistemas de hotel).

**Parámetros:**
- `$localiza` (string): Código de localización/habitación
- `$observa1` (string): Observación principal
- `$observa2` (string, opcional): Observación secundaria

**Retorna:** `bool` - TRUE si se guardó correctamente, FALSE en caso contrario

**Ejemplo:**
```php
hlogusu('HAB101', 'Limpieza realizada', 'Cambio de sábanas');
```

**Tabla:** `hlogusu`
- `id`: ID único del registro
- `localiza`: Código de localización
- `observa1`: Observación principal
- `observa2`: Observación secundaria
- `usuario`: Usuario que realizó la acción
- `fecha`: Fecha
- `hora`: Hora
- `created_at`: Timestamp de creación

---

### 3. `valorusu($modulo, $reporte, $variable, $valor)`

Guarda valores de configuración por usuario (preferencias de usuario).

**Parámetros:**
- `$modulo` (string): Nombre del módulo
- `$reporte` (string): Nombre del reporte
- `$variable` (string): Nombre de la variable
- `$valor` (string): Valor a guardar

**Retorna:** `bool` - TRUE si se guardó correctamente, FALSE en caso contrario

**Ejemplo:**
```php
valorusu('PERS', 'REPORTE1', 'filtro_estatus', 'A');
valorusu('NOMINA', 'REPORTE2', 'fecha_desde', '2026-01-01');
```

**Tabla:** `valuser`
- `id`: ID único del registro
- `usuario`: Usuario propietario
- `modulo`: Módulo
- `reporte`: Reporte
- `variable`: Nombre de la variable
- `valor`: Valor guardado
- `maquina`: IP del cliente
- `fecha`: Timestamp de creación
- `updated_at`: Timestamp de actualización

---

### 4. `traevalusu($modulo, $reporte, $variable)`

Obtiene un valor guardado por usuario.

**Parámetros:**
- `$modulo` (string): Nombre del módulo
- `$reporte` (string): Nombre del reporte
- `$variable` (string): Nombre de la variable

**Retorna:** `string|false` - Valor guardado o FALSE si no existe

**Ejemplo:**
```php
$filtro = traevalusu('PERS', 'REPORTE1', 'filtro_estatus');
if ($filtro !== false) {
    echo "Filtro guardado: " . $filtro;
}
```

---

### 5. `memowrite($comentario, $nfile = 'salida', $modo = 'wb')`

Escribe un comentario en un archivo de log.

**Parámetros:**
- `$comentario` (string): Texto a escribir
- `$nfile` (string): Nombre del archivo (sin extensión), por defecto 'salida'
- `$modo` (string): Modo de apertura ('wb' para sobrescribir, 'ab' para agregar)

**Retorna:** `bool` - TRUE si se escribió correctamente, FALSE en caso contrario

**Ejemplo:**
```php
memowrite('Error al procesar factura', 'errores', 'ab');
memowrite('Proceso iniciado', 'proceso', 'wb');
```

**Ubicación:** `application/logs/[nombre].log`

---

### 6. `memoborra($nfile = 'salida')`

Borra un archivo de log.

**Parámetros:**
- `$nfile` (string): Nombre del archivo (sin extensión), por defecto 'salida'

**Retorna:** `bool` - TRUE si se borró correctamente, FALSE en caso contrario

**Ejemplo:**
```php
memoborra('errores');
```

---

### 7. `logfact($modulo, $comentario, $status, $error, $numero, $tiempo, $tipodoc, $json)`

Registra logs de facturación/API.

**Parámetros:**
- `$modulo` (string): Nombre del módulo
- `$comentario` (string): Descripción de la acción
- `$status` (string): Estado de la operación
- `$error` (string): Mensaje de error (si aplica)
- `$numero` (string): Número de documento/factura
- `$tiempo` (string): Tiempo de respuesta
- `$tipodoc` (string): Tipo de documento
- `$json` (string): JSON enviado/recibido

**Retorna:** `bool` - TRUE si se guardó correctamente, FALSE en caso contrario

**Ejemplo:**
```php
logfact('FACTURACION', 'Factura enviada a API', 'OK', '', 'FAC-001', '1.5s', 'FACTURA', $json_data);
logfact('FACTURACION', 'Error al enviar factura', 'ERROR', 'Timeout', 'FAC-002', '30s', 'FACTURA', $json_data);
```

**Tabla:** `logfact`
- `id`: ID único del registro
- `fecha`: Fecha
- `hora`: Hora
- `modulo`: Módulo
- `status`: Estado (OK, ERROR, etc.)
- `error`: Mensaje de error
- `comenta`: Comentario
- `conexion`: IP del cliente
- `tiempo`: Tiempo de respuesta
- `numero`: Número de documento
- `tipodoc`: Tipo de documento
- `json`: JSON enviado/recibido
- `created_at`: Timestamp de creación

---

## 🚀 Uso

### Cargar el Helper

El helper se puede cargar de dos formas:

1. **En el controlador:**
```php
$this->load->helper('log');
```

2. **Auto-cargar en `application/config/autoload.php`:**
```php
$autoload['helper'] = array('url', 'assets', 'log');
```

### Ejemplos de Uso

```php
// En un controlador
class Pers extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('log');
    }
    
    function crear_trabajador() {
        // ... código para crear trabajador ...
        
        // Registrar en log
        logusu('PERS', 'Trabajador ' . $codigo . ' creado exitosamente');
    }
    
    function actualizar_trabajador() {
        // ... código para actualizar ...
        
        logusu('PERS', 'Trabajador ' . $codigo . ' actualizado');
    }
    
    function eliminar_trabajador() {
        // ... código para eliminar ...
        
        logusu('PERS', 'Trabajador ' . $codigo . ' eliminado');
    }
}
```

---

## 🗄️ Estructura de Tablas

Las tablas se crean automáticamente la primera vez que se usa cada función. El helper detecta automáticamente si se usa PostgreSQL o MySQL/MariaDB y crea las tablas con la sintaxis correcta.

### Tabla: `logusu`
```sql
-- PostgreSQL
CREATE TABLE logusu (
    id SERIAL PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL DEFAULT '',
    fecha DATE NOT NULL DEFAULT CURRENT_DATE,
    hora TIME NOT NULL DEFAULT CURRENT_TIME,
    modulo VARCHAR(50) NULL DEFAULT NULL,
    comenta TEXT NULL DEFAULT NULL,
    conexion VARCHAR(50) NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabla: `hlogusu`
```sql
CREATE TABLE hlogusu (
    id SERIAL PRIMARY KEY,
    localiza VARCHAR(50) NULL DEFAULT NULL,
    observa1 TEXT NULL DEFAULT NULL,
    observa2 TEXT NULL DEFAULT NULL,
    usuario VARCHAR(50) NULL DEFAULT NULL,
    fecha DATE NULL DEFAULT CURRENT_DATE,
    hora VARCHAR(8) NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabla: `valuser`
```sql
CREATE TABLE valuser (
    id SERIAL PRIMARY KEY,
    usuario VARCHAR(50) NULL DEFAULT NULL,
    modulo VARCHAR(50) NULL DEFAULT NULL,
    reporte VARCHAR(50) NULL DEFAULT NULL,
    variable VARCHAR(50) NULL DEFAULT NULL,
    valor VARCHAR(500) NULL DEFAULT NULL,
    maquina VARCHAR(50) NULL DEFAULT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabla: `logfact`
```sql
CREATE TABLE logfact (
    id SERIAL PRIMARY KEY,
    fecha DATE NOT NULL DEFAULT CURRENT_DATE,
    hora TIME NOT NULL DEFAULT CURRENT_TIME,
    modulo VARCHAR(50) NULL DEFAULT NULL,
    status VARCHAR(50) NULL DEFAULT NULL,
    error VARCHAR(500) NULL DEFAULT NULL,
    comenta TEXT NULL DEFAULT NULL,
    conexion VARCHAR(50) NULL DEFAULT NULL,
    tiempo VARCHAR(50) NULL DEFAULT NULL,
    numero VARCHAR(50) NULL DEFAULT NULL,
    tipodoc VARCHAR(50) NULL DEFAULT NULL,
    json TEXT NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🔍 Obtener Usuario de Sesión

El helper intenta obtener el usuario de la sesión en este orden:

1. `$CI->session->userdata('usuario')`
2. `$CI->session->userdata('username')`
3. `$CI->session->userdata('email')`
4. `$CI->session->userdata('id')`
5. `'#AU#'` (Usuario Anónimo) si no encuentra ninguno

---

## 📝 Notas

- Las tablas se crean automáticamente la primera vez que se usa cada función
- El helper detecta automáticamente PostgreSQL o MySQL/MariaDB
- Se registra automáticamente la IP del cliente (`REMOTE_ADDR` o `HTTP_X_FORWARDED_FOR`)
- Los índices se crean automáticamente para mejorar el rendimiento de las consultas

---

## ✅ Integración con Módulo Pers

El helper ya está integrado en el controlador `nomina/Pers.php`:

```php
// En setData()
logusu('PERS', "Personal " . $codigo . " INCLUIDO");
logusu('PERS', "Personal " . $codigo . " MODIFICADO");
logusu('PERS', "Personal " . $codigo . " ELIMINADO");

// En variables()
logusu('PERS', "Variables del trabajador ID $id actualizadas");
```

---

**Última actualización**: 2026-01-28
