# Correcciones Realizadas en el Login

**Fecha**: 2026-01-26  
**Desarrollador**: Ing. Doniel Acosta

## Problemas Identificados y Corregidos

### 1. Manejo de `ultimo_acceso` NULL
**Problema**: Si `ultimo_acceso` es NULL, `new DateTime($r->ultimo_acceso)` causaba un error fatal en PHP 8.3.

**Solución**: Agregado manejo de excepciones y verificación de NULL:
```php
if (!empty($r->ultimo_acceso)) {
    try {
        $ua = new DateTime($r->ultimo_acceso);
        $this->session->ultimo_acceso = $ua->format('d/m/Y H:i:s');
    } catch (Exception $e) {
        $this->session->ultimo_acceso = 'Nunca';
    }
} else {
    $this->session->ultimo_acceso = 'Nunca';
}
```

### 2. Comparación de `correo_chk`
**Problema**: PostgreSQL puede devolver booleanos como 't'/'f' (string), true/false (boolean), o 1/0 (integer).

**Solución**: Comparación robusta que maneja todos los casos:
```php
$correo_validado = ($r->correo_chk === true || $r->correo_chk === 't' || $r->correo_chk === 1);
```

### 3. Actualización de `ultimo_acceso` en Base de Datos
**Problema**: Se estaba usando `'now()'` como string en lugar de función de PostgreSQL.

**Solución**: Uso correcto de `CURRENT_TIMESTAMP` sin comillas:
```php
$this->db->set('ultimo_acceso', 'CURRENT_TIMESTAMP', FALSE);
$this->db->update('usuario');
```

### 4. Configuración de Sesiones
**Problema**: El directorio de sesiones no estaba configurado explícitamente.

**Solución**: Configurado directorio de sesiones en `config.php`:
```php
$config['sess_save_path'] = sys_get_temp_dir() . '/ci_sessions';
```

Y creado el directorio con permisos adecuados:
```bash
mkdir -p /tmp/ci_sessions
chmod 777 /tmp/ci_sessions
```

## Archivos Modificados

1. `/var/www/html/tthh/application/models/Usuario_m.php`
   - Método `login()` corregido

2. `/var/www/html/tthh/application/config/config.php`
   - Configuración de sesiones actualizada

## Pruebas Realizadas

- ✅ Login con usuario válido y correo validado
- ✅ Manejo de `ultimo_acceso` NULL
- ✅ Comparación correcta de `correo_chk`
- ✅ Actualización de `ultimo_acceso` en base de datos
- ✅ Configuración de sesiones funcional

## Notas Adicionales

- El sistema ahora maneja correctamente usuarios nuevos que nunca han iniciado sesión
- La validación de correo es más robusta y compatible con diferentes formatos de PostgreSQL
- Las sesiones se almacenan en un directorio dedicado con permisos adecuados

---

**Estado**: ✅ Completado y probado
