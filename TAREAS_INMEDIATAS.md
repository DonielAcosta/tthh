# Tareas Inmediatas - Sistema TTHH

**Prioridad:** 🔴 Alta  
**Fecha:** 2026-01-26

---

## 🚨 Tareas Críticas (Esta Semana)

### 1. Completar Compatibilidad PHP 8.3

#### 1.1 Revisar otros drivers de sesión
```bash
# Archivos a revisar:
- system/libraries/Session/drivers/Session_database_driver.php
- system/libraries/Session/drivers/Session_memcached_driver.php
- system/libraries/Session/drivers/Session_redis_driver.php
```

**Acción:** Agregar `#[\ReturnTypeWillChange]` y tipos de retorno a métodos:
- `open($save_path, $name): bool`
- `close(): bool`
- `read($session_id): string|false`
- `write($session_id, $session_data): bool`
- `destroy($session_id): bool`
- `gc($maxlifetime): int|false`

#### 1.2 Revisar todos los modelos
```bash
# Buscar todos los modelos
find application/models/ -name "*_m.php" -type f
```

**Acción:** Agregar `#[\AllowDynamicProperties]` a cada modelo que cree propiedades dinámicamente.

**Modelos conocidos a revisar:**
- [ ] `Dependencia_m.php`
- [ ] `Solicitud_m.php`
- [ ] `EdoSolicitud_m.php`
- [ ] `Trabajador_m.php` (si existe)
- [ ] `Nomina_m.php` (si existe)
- [ ] Otros modelos encontrados

#### 1.3 Revisar otras librerías personalizadas
```bash
# Buscar librerías personalizadas
find application/libraries/ -name "MY_*.php" -type f
```

**Acción:** Agregar `#[\AllowDynamicProperties]` donde sea necesario.

---

### 2. Seguridad - Gestión de Contraseñas

#### 2.1 Mover credenciales a variables de entorno
**Archivo:** `application/config/database.php`

**Acción:**
1. Crear archivo `.env` en la raíz del proyecto
2. Mover credenciales de base de datos a `.env`
3. Agregar `.env` a `.gitignore`
4. Crear `.env.example` como plantilla

**Ejemplo `.env`:**
```env
DB_HOST=localhost
DB_PORT=5432
DB_USERNAME=datasis
DB_PASSWORD=password
DB_DATABASE=tthh
DB_DRIVER=postgre
```

**Ejemplo `.env.example`:**
```env
DB_HOST=localhost
DB_PORT=5432
DB_USERNAME=your_username
DB_PASSWORD=your_password
DB_DATABASE=your_database
DB_DRIVER=postgre
```

#### 2.2 Implementar hash seguro para contraseñas
**Archivos a modificar:**
- `application/models/Usuario_m.php`
- `application/controllers/Usuario_c.php`

**Acción:**
- Cambiar de almacenamiento en texto plano a `password_hash()` con `PASSWORD_BCRYPT`
- Usar `password_verify()` para validar contraseñas
- Crear script de migración para hashear contraseñas existentes

#### 2.3 Eliminar contraseñas de scripts SQL
**Archivos a revisar:**
- `crear_usuario_datasis.sh`
- `crear_usuario_datasis.sql`
- Cualquier otro script con credenciales

**Acción:** Usar variables de entorno o solicitar contraseña de forma segura.

---

### 3. Seguridad - Validación y Sanitización

#### 3.1 Revisar validación en controladores
**Controladores a revisar:**
- `application/controllers/Usuario_c.php`
- `application/controllers/Servicios_c.php`
- Todos los demás controladores

**Acción:**
- Agregar validación estricta en todos los métodos que reciben input
- Usar `filter_input()` o `filter_var()` para validar
- Sanitizar datos antes de guardar en BD

#### 3.2 Revisar uso de consultas SQL
**Acción:**
- Buscar uso de concatenación de strings en consultas SQL
- Reemplazar por prepared statements o Query Builder de CodeIgniter
- Buscar patrones como: `$this->db->query("SELECT * FROM ... WHERE id = $id")`

**Comando para buscar:**
```bash
grep -r "->query(" application/ --include="*.php" | grep -v "//"
```

---

### 4. Base de Datos - Backups

#### 4.1 Crear script de backup automático
**Archivo:** `backup_database.sh`

**Contenido sugerido:**
```bash
#!/bin/bash
# Script de backup automático de base de datos TTHH

BACKUP_DIR="/var/backups/tthh"
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_FILE="$BACKUP_DIR/tthh_backup_$DATE.sql"

# Crear directorio si no existe
mkdir -p $BACKUP_DIR

# Realizar backup
PGPASSWORD=password pg_dump -h localhost -p 5432 -U datasis -d tthh -F c -f "$BACKUP_FILE.backup"

# Comprimir
gzip "$BACKUP_FILE.backup"

# Eliminar backups antiguos (mantener últimos 30 días)
find $BACKUP_DIR -name "*.backup.gz" -mtime +30 -delete

echo "Backup completado: $BACKUP_FILE.backup.gz"
```

**Acción:**
1. Crear el script
2. Hacerlo ejecutable: `chmod +x backup_database.sh`
3. Configurar cron job para ejecutar diariamente
4. Probar el script manualmente

#### 4.2 Configurar cron job
```bash
# Agregar a crontab (crontab -e)
# Backup diario a las 2:00 AM
0 2 * * * /var/www/html/tthh/backup_database.sh >> /var/log/tthh_backup.log 2>&1
```

---

## 📋 Checklist Rápido

### Esta Semana
- [ ] Completar correcciones de compatibilidad PHP 8.3
- [ ] Mover credenciales a variables de entorno
- [ ] Implementar hash de contraseñas
- [ ] Crear script de backup automático
- [ ] Revisar y corregir validación en al menos 3 controladores principales

### Este Mes
- [ ] Implementar CSRF tokens
- [ ] Agregar logging de acciones críticas
- [ ] Optimizar al menos 5 consultas lentas
- [ ] Crear documentación básica de instalación
- [ ] Configurar tests unitarios básicos

---

## 🔧 Scripts Útiles

### Buscar propiedades dinámicas
```bash
# Buscar asignaciones de propiedades dinámicas en modelos
grep -r "\$this->[a-zA-Z_]*\s*=" application/models/ --include="*.php" | grep -v "protected\|private\|public"
```

### Buscar consultas SQL inseguras
```bash
# Buscar consultas con concatenación de variables
grep -r "->query.*\$" application/ --include="*.php" | grep -v "//"
```

### Listar todos los modelos
```bash
find application/models/ -name "*_m.php" -type f | sort
```

### Listar todos los controladores
```bash
find application/controllers/ -name "*_c.php" -type f | sort
```

---

## 📝 Notas de Implementación

### Para agregar `#[\AllowDynamicProperties]` a un modelo:
1. Abrir el archivo del modelo
2. Buscar la línea `class NombreModelo extends MY_Model`
3. Agregar `#[\AllowDynamicProperties]` justo antes de `class`
4. Guardar y probar

### Para agregar tipos de retorno a métodos de sesión:
1. Abrir el archivo del driver de sesión
2. Buscar el método (ej: `public function open($save_path, $name)`)
3. Agregar `#[\ReturnTypeWillChange]` antes de `public`
4. Agregar tipo de retorno después de los parámetros (ej: `: bool`)
5. Guardar y probar

---

**Última actualización:** 2026-01-26
