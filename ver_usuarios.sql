-- Script para ver usuarios de PostgreSQL y sus permisos
-- Ejecutar como: sudo -u postgres psql -f ver_usuarios.sql

-- Ver todos los usuarios con sus permisos básicos
\echo '========================================'
\echo 'USUARIOS DE POSTGRESQL'
\echo '========================================'
\du

\echo ''
\echo '========================================'
\echo 'DETALLES DE USUARIOS'
\echo '========================================'
SELECT 
    u.usename AS usuario,
    CASE WHEN u.usesuper THEN 'Sí' ELSE 'No' END AS es_superusuario,
    CASE WHEN u.usecreatedb THEN 'Sí' ELSE 'No' END AS puede_crear_bd,
    CASE WHEN u.usecanlogin THEN 'Sí' ELSE 'No' END AS puede_conectarse,
    CASE 
        WHEN u.valuntil IS NULL THEN 'Sin expiración'
        ELSE u.valuntil::text
    END AS cuenta_expira,
    CASE 
        WHEN a.rolpassword IS NULL THEN 'Sin contraseña'
        ELSE 'Tiene contraseña (hash MD5)'
    END AS estado_contraseña
FROM pg_user u
LEFT JOIN pg_authid a ON u.usename = a.rolname
ORDER BY u.usename;

\echo ''
\echo '========================================'
\echo 'BASES DE DATOS Y SUS PROPIETARIOS'
\echo '========================================'
SELECT 
    datname AS base_de_datos,
    pg_catalog.pg_get_userbyid(datdba) AS propietario
FROM pg_catalog.pg_database
WHERE datistemplate = false
ORDER BY datname;

\echo ''
\echo '========================================'
\echo 'NOTA: Las contraseñas están hasheadas'
\echo 'y no se pueden ver en texto plano.'
\echo 'Para cambiar una contraseña usa:'
\echo 'ALTER USER nombre_usuario WITH PASSWORD ''nueva_contraseña'';'
\echo '========================================'
