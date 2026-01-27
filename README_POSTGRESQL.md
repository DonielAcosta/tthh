# Archivos de configuración PostgreSQL para TTHH

Este directorio contiene todos los scripts y documentación relacionados con la configuración de PostgreSQL para el proyecto TTHH.

## Archivos incluidos

### Scripts SQL

1. **crear_bd_tthh.sql**
   - Crea la base de datos `tthh` en PostgreSQL
   - Ejecutar: `sudo -u postgres psql -f crear_bd_tthh.sql`

2. **crear_usuario_datasis.sql**
   - Crea el usuario `datasis` con contraseña `1q2w3e..-`
   - Otorga privilegios en la base de datos tthh
   - Ejecutar: `sudo -u postgres psql -f crear_usuario_datasis.sql`

3. **ver_usuarios.sql**
   - Muestra todos los usuarios de PostgreSQL y sus permisos
   - Ejecutar: `sudo -u postgres psql -f ver_usuarios.sql`

### Scripts Bash

4. **crear_usuario_datasis.sh**
   - Script bash para crear el usuario datasis
   - Ejecutar: `bash crear_usuario_datasis.sh`
   - Requiere permisos de ejecución: `chmod +x crear_usuario_datasis.sh`

### Documentación

5. **configurar_postgresql_manual.md**
   - Guía completa paso a paso para instalar y configurar PostgreSQL
   - Incluye solución de problemas

6. **ver_usuarios_postgresql.md**
   - Guía detallada para ver y gestionar usuarios de PostgreSQL
   - Comandos útiles y ejemplos

## Orden de ejecución recomendado

1. **Instalar PostgreSQL** (ver `configurar_postgresql_manual.md`)
2. **Crear la base de datos**: `sudo -u postgres psql -f crear_bd_tthh.sql`
3. **Crear el usuario**: `sudo -u postgres psql -f crear_usuario_datasis.sql`
4. **Verificar usuarios**: `sudo -u postgres psql -f ver_usuarios.sql`

## Configuración de conexión

Para conectarse desde DBeaver o cualquier cliente PostgreSQL:

- **Host**: localhost
- **Puerto**: 5432
- **Base de datos**: tthh
- **Usuario**: datasis
- **Contraseña**: 1q2w3e..-

## Notas importantes

- Todos los scripts requieren ejecutarse como usuario `postgres` o con `sudo`
- Las contraseñas están en texto plano en los scripts por conveniencia
- Para producción, considera usar variables de entorno o archivos de configuración seguros
