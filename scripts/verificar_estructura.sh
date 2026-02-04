#!/bin/bash
# Script para verificar la nueva estructura del proyecto
# Ejecutar con: bash scripts/verificar_estructura.sh

set -e

BASE_DIR="/var/www/html/tthh"
cd "$BASE_DIR"

echo "=== Verificación de Estructura del Proyecto ==="
echo ""

# Colores
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Contador de errores
ERRORS=0

# Función para verificar
check() {
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✓${NC} $1"
    else
        echo -e "${RED}✗${NC} $1"
        ERRORS=$((ERRORS + 1))
    fi
}

# 1. Verificar enlaces simbólicos
echo "1. Verificando enlaces simbólicos..."
[ -L css ] && check "Enlace simbólico css/ existe"
[ -L js ] && check "Enlace simbólico js/ existe"
[ -L img ] && check "Enlace simbólico img/ existe"
echo ""

# 2. Verificar directorios assets
echo "2. Verificando directorios assets..."
[ -d assets/css ] && check "assets/css/ existe"
[ -d assets/js ] && check "assets/js/ existe"
[ -d assets/img ] && check "assets/img/ existe"
echo ""

# 3. Verificar archivos movidos
echo "3. Verificando archivos movidos..."
[ -f assets/css/style.css ] && check "assets/css/style.css existe"
[ -f assets/js/funciones.js ] && check "assets/js/funciones.js existe"
[ -f assets/js/menu.js ] && check "assets/js/menu.js existe"
echo ""

# 4. Verificar storage
echo "4. Verificando directorios storage..."
[ -d storage/cache ] && check "storage/cache/ existe"
[ -d storage/logs ] && check "storage/logs/ existe"
[ -d storage/uploads ] && check "storage/uploads/ existe"
echo ""

# 5. Verificar nuevos directorios
echo "5. Verificando nuevos directorios..."
[ -d database/migrations ] && check "database/migrations/ existe"
[ -d tests/unit ] && check "tests/unit/ existe"
[ -d docs/development ] && check "docs/development/ existe"
echo ""

# 6. Verificar helper de assets
echo "6. Verificando helper de assets..."
[ -f application/helpers/assets_helper.php ] && check "assets_helper.php existe"
grep -q "asset_url" application/helpers/assets_helper.php && check "Función asset_url() definida"
echo ""

# 7. Verificar configuración
echo "7. Verificando configuración..."
grep -q "storage/logs" application/config/config.php && check "log_path configurado correctamente"
grep -q "assets" application/config/autoload.php && check "Helper assets en autoload"
echo ""

# 8. Verificar permisos de storage
echo "8. Verificando permisos de storage..."
if [ -w storage/cache ] && [ -w storage/logs ]; then
    check "storage/ tiene permisos de escritura"
else
    echo -e "${YELLOW}⚠${NC} storage/ puede necesitar permisos de escritura"
    echo "   Ejecutar: chmod -R 775 storage/"
fi
echo ""

# Resumen
echo "=== Resumen ==="
if [ $ERRORS -eq 0 ]; then
    echo -e "${GREEN}✓ Todas las verificaciones pasaron${NC}"
    echo ""
    echo "La estructura está correctamente organizada."
    exit 0
else
    echo -e "${RED}✗ Se encontraron $ERRORS error(es)${NC}"
    echo ""
    echo "Revisa los errores anteriores y corrígelos."
    exit 1
fi
