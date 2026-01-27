#!/bin/bash
# Script para instalar la extensión PostgreSQL de PHP
# Ejecutar con: sudo bash instalar_pgsql.sh

echo "Instalando extensión PostgreSQL para PHP 8.3..."

# Actualizar lista de paquetes
apt-get update

# Instalar la extensión
apt-get install -y php8.3-pgsql

# Habilitar la extensión (generalmente se habilita automáticamente)
phpenmod pgsql

# Reiniciar Apache
systemctl restart apache2

echo ""
echo "=========================================="
echo "Verificando instalación:"
echo "=========================================="
php -m | grep -i pgsql

echo ""
echo "=========================================="
echo "Extensión PostgreSQL instalada!"
echo "=========================================="
