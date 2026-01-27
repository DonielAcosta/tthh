# Ver y gestionar usuarios de PostgreSQL

## Ver todos los usuarios de PostgreSQL

### Opción 1: Desde la línea de comandos

```bash
# Conectarse como usuario postgres
sudo -u postgres psql

# Una vez dentro de psql, ejecutar:
\du

# O con más detalles:
SELECT usename, usecreatedb, usesuper, usecanlogin, valuntil 
FROM pg_user 
ORDER BY usename;

# Ver usuarios con información de roles
SELECT 
    r.rolname AS usuario,
    r.rolsuper AS es_superusuario,
    r.rolinherit AS hereda_privilegios,
    r.rolcreaterole AS puede_crear_roles,
    r.rolcreatedb AS puede_crear_bd,
    r.rolcanlogin AS puede_conectarse,
    r.rolreplication AS puede_replicar,
    r.rolconnlimit AS limite_conexiones,
    ARRAY(SELECT b.rolname FROM pg_catalog.pg_auth_members m JOIN pg_catalog.pg_roles b ON (m.roleid = b.oid) WHERE m.member = r.oid) AS miembros_de
FROM pg_catalog.pg_roles r
WHERE r.rolname NOT IN ('pg_signal_backend', 'pg_read_all_settings', 'pg_read_all_stats', 'pg_stat_scan_tables', 'pg_read_server_files', 'pg_write_server_files', 'pg_execute_server_program', 'pg_monitor')
ORDER BY 1;
```

### Opción 2: Consulta SQL directa

```bash
sudo -u postgres psql -c "\du"
```

O con más detalles:
```bash
sudo -u postgres psql -c "SELECT usename, usecreatedb, usesuper, usecanlogin FROM pg_user ORDER BY usename;"
```

## Ver información de autenticación (hashes de contraseñas)

**IMPORTANTE**: Las contraseñas en PostgreSQL están almacenadas como hashes MD5 y NO se pueden ver en texto plano. Solo puedes ver el hash:

```sql
-- Conectarse como superusuario
sudo -u postgres psql

-- Ver los hashes de contraseñas (solo para referencia, no son útiles)
SELECT rolname, rolpassword FROM pg_authid WHERE rolpassword IS NOT NULL;
```

## Cambiar o establecer contraseña de un usuario

### Cambiar contraseña del usuario postgres:
```bash
sudo -u postgres psql -c "ALTER USER postgres WITH PASSWORD 'nueva_contraseña';"
```

### Cambiar contraseña de cualquier usuario:
```bash
sudo -u postgres psql -c "ALTER USER nombre_usuario WITH PASSWORD 'nueva_contraseña';"
```

### Desde psql:
```sql
-- Conectarse
sudo -u postgres psql

-- Cambiar contraseña
ALTER USER nombre_usuario WITH PASSWORD 'nueva_contraseña';
```

## Crear un nuevo usuario

```bash
# Crear usuario con contraseña
sudo -u postgres psql -c "CREATE USER nuevo_usuario WITH PASSWORD 'contraseña_segura';"

# Crear usuario con privilegios
sudo -u postgres psql -c "CREATE USER nuevo_usuario WITH PASSWORD 'contraseña_segura' CREATEDB CREATEROLE;"
```

## Ver permisos de un usuario específico

```sql
-- Ver permisos en bases de datos
SELECT 
    datname AS base_de_datos,
    pg_catalog.pg_get_userbyid(datdba) AS propietario
FROM pg_catalog.pg_database
ORDER BY datname;

-- Ver permisos de un usuario en una base de datos específica
\c nombre_base_datos
\dp

-- Ver roles y privilegios
SELECT 
    grantee AS usuario,
    privilege_type AS tipo_privilegio,
    is_grantable AS puede_otorgar
FROM information_schema.role_table_grants 
WHERE grantee = 'nombre_usuario';
```

## Script completo para ver todos los usuarios y sus permisos

```sql
SELECT 
    u.usename AS usuario,
    u.usesuper AS es_superusuario,
    u.usecreatedb AS puede_crear_bd,
    u.usecanlogin AS puede_conectarse,
    CASE 
        WHEN u.valuntil IS NULL THEN 'Sin expiración'
        ELSE u.valuntil::text
    END AS expira,
    CASE 
        WHEN a.rolpassword IS NULL THEN 'Sin contraseña'
        ELSE 'Tiene contraseña (hash MD5)'
    END AS estado_contraseña
FROM pg_user u
LEFT JOIN pg_authid a ON u.usename = a.rolname
ORDER BY u.usename;
```

## Verificar conexión de un usuario

```bash
# Probar conexión con un usuario
psql -h localhost -U nombre_usuario -d nombre_base_datos
```

## Eliminar un usuario

```bash
sudo -u postgres psql -c "DROP USER nombre_usuario;"
```

## Notas importantes

1. **Las contraseñas NO se pueden ver en texto plano** - Solo puedes ver si un usuario tiene contraseña o no, pero no la contraseña misma.

2. **Para resetear una contraseña olvidada**, simplemente usa `ALTER USER` con una nueva contraseña.

3. **El usuario `postgres`** es el superusuario por defecto y tiene todos los privilegios.

4. **Para verificar si un usuario puede conectarse**, revisa la columna `usecanlogin` en `pg_user`.
