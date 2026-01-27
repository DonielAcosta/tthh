#!/bin/bash
# Script para crear el usuario datasis en PostgreSQL
# Ejecutar con: bash crear_usuario_datasis.sh

echo "Creando usuario datasis en PostgreSQL..."

# Crear el usuario con contraseña
sudo -u postgres psql -c "CREATE USER datasis WITH PASSWORD '1q2w3e..-';"

# Otorgar privilegios
sudo -u postgres psql -c "ALTER USER datasis WITH CREATEDB CREATEROLE;"

# Otorgar privilegios en la base de datos tthh (si existe)
sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE tthh TO datasis;" 2>/dev/null || echo "Base de datos tthh no existe aún, se otorgarán permisos cuando se cree."

# Verificar creación
echo ""
echo "=========================================="
echo "Verificando usuario creado:"
echo "=========================================="
sudo -u postgres psql -c "\du datasis"

echo ""
echo "=========================================="
echo "Usuario datasis creado exitosamente!"
echo "=========================================="
echo "Usuario: datasis"
echo "Contraseña: password"
echo "=========================================="
