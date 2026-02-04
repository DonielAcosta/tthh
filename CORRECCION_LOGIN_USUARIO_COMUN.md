# Corrección del Login para Usuario Comun

**Fecha**: 2026-01-26  
**Desarrollador**: Ing. Doniel Acosta

## Problema Identificado

El usuario `comun@gmail.com` no podía iniciar sesión a pesar de que:
- ✅ El usuario existe en la base de datos
- ✅ La contraseña está correctamente hasheada (MD5)
- ✅ El correo está validado (correo_chk = TRUE)
- ✅ La consulta SQL directa funciona correctamente

## Causa del Problema

El problema estaba en cómo CodeIgniter Query Builder construía la consulta con múltiples `where()`. En algunos casos, especialmente con vistas que tienen `ORDER BY`, el Query Builder puede tener problemas.

## Solución Implementada

### 1. Cambio en el Método `login()` del Modelo

**Archivo**: `application/models/Usuario_m.php`

**Antes**:
```php
$r = $this->db->where('correo', $usuario)
     ->where('clave', $this->utilidades->hash($password))
     ->limit(1)
     ->get($this->vista);
```

**Después**:
```php
// Limpiar y normalizar entrada
$usuario = trim(strtolower($usuario));
$password = trim($password);
$clave_hash = $this->utilidades->hash($password);

// Usar consulta SQL directa con prepared statements
$sql = "SELECT * FROM usuario_view WHERE LOWER(TRIM(correo)) = ? AND clave = ? LIMIT 1";
$r = $this->db->query($sql, array($usuario, $clave_hash));
```

### 2. Mejora en el Controlador

**Archivo**: `application/controllers/Usuario_c.php`

**Mejoras**:
- Normalización del correo (trim + lowercase)
- Validación de campos vacíos
- Limpieza de la clave

```php
// Limpiar y normalizar entrada
$correo = trim(strtolower($this->input->post('correo')));
$clave = trim($this->input->post('clave'));

// Validar que los campos no estén vacíos
if (empty($correo) || empty($clave)) {
    $this->utilidades->json_output(array(
        'success' => FALSE,
        'mensaje' => 'Error: El correo y la clave son requeridos.'
    ));
    return;
}
```

## Beneficios de la Solución

1. ✅ **Más robusto**: Usa prepared statements (protección contra SQL injection)
2. ✅ **Más confiable**: Consulta SQL directa evita problemas del Query Builder
3. ✅ **Normalización**: Maneja correctamente espacios y mayúsculas/minúsculas
4. ✅ **Validación**: Valida campos vacíos antes de procesar

## Verificación

El usuario ahora puede iniciar sesión con:
- **Correo**: `comun@gmail.com`
- **Clave**: `123456789`

## Estado

✅ **CORREGIDO Y FUNCIONAL**

El login ahora funciona correctamente para el usuario `comun@gmail.com` y para todos los demás usuarios del sistema.

---

**Última actualización**: 2026-01-26
