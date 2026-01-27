#!/bin/bash
# Script para renombrar el directorio de tthh123 a tthh
# Ejecutar con: sudo bash rename_to_tthh.sh

cd /var/www/html
if [ -d "tthh123" ] && [ ! -d "tthh" ]; then
    echo "Renombrando tthh123 a tthh..."
    mv tthh123 tthh
    echo "Directorio renombrado exitosamente!"
    echo "Ahora puedes acceder a la aplicación en: http://localhost/tthh/"
else
    if [ -d "tthh" ]; then
        echo "El directorio 'tthh' ya existe. Por favor elimínalo primero o renombra tthh123 manualmente."
    else
        echo "El directorio 'tthh123' no existe."
    fi
fi
