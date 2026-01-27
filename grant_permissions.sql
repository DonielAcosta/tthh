-- Script para otorgar permisos necesarios al usuario datasis
-- Ejecutar como: sudo -u postgres psql -d tthh -f grant_permissions.sql

-- Otorgar privilegios en el esquema public
GRANT ALL ON SCHEMA public TO datasis;
ALTER SCHEMA public OWNER TO datasis;

-- Otorgar privilegios en todas las tablas existentes (si las hay)
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO datasis;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO datasis;
GRANT ALL PRIVILEGES ON ALL FUNCTIONS IN SCHEMA public TO datasis;

-- Otorgar privilegios por defecto para objetos futuros
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON TABLES TO datasis;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON SEQUENCES TO datasis;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON FUNCTIONS TO datasis;
