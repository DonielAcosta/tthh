-- Script para crear el usuario datasis en PostgreSQL
-- Ejecutar como: sudo -u postgres psql -f crear_usuario_datasis.sql

-- Crear el usuario datasis con contraseña
CREATE USER datasis WITH PASSWORD '1q2w3e..-';

-- Otorgar privilegios (ajustar según necesidades)
-- Privilegios básicos: puede crear bases de datos y roles
ALTER USER datasis WITH CREATEDB CREATEROLE;

-- Otorgar todos los privilegios en la base de datos tthh (si existe)
GRANT ALL PRIVILEGES ON DATABASE tthh TO datasis;

-- Verificar que el usuario fue creado
\echo '========================================'
\echo 'Usuario datasis creado exitosamente'
\echo '========================================'
\du datasis

\echo ''
\echo 'Usuario: datasis'
\echo 'Contraseña: 1q2w3e..-'
\echo '========================================'
