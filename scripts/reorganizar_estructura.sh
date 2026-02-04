#!/bin/bash
# Script para reorganizar la estructura del proyecto profesionalmente
# Ejecutar con: bash scripts/reorganizar_estructura.sh

set -e

BASE_DIR="/var/www/html/tthh"
cd "$BASE_DIR"

echo "=== Reorganización de Estructura del Proyecto ==="
echo ""

# Crear directorios nuevos
echo "1. Creando directorios nuevos..."
mkdir -p storage/{app/{public,private},cache,logs,sessions,uploads}
mkdir -p database/{migrations,seeds,backups,schemas}
mkdir -p tests/{unit/{Models,Services,Libraries},integration/{Controllers,Database},fixtures}
mkdir -p docs/{api,development,deployment,user}
mkdir -p scripts/{deployment,maintenance,database}
mkdir -p assets/{css/{components,vendor},js/{modules,vendor},img/{icons,logos,uploads},fonts}
mkdir -p application/config/environments
mkdir -p application/services
mkdir -p application/exceptions
mkdir -p application/middleware
mkdir -p application/views/{layouts,components,errors}

echo "   ✓ Directorios creados"
echo ""

# Mover archivos existentes
echo "2. Reorganizando archivos existentes..."

# Mover CSS
if [ -d "css" ]; then
    echo "   Moviendo CSS..."
    mv css/* assets/css/ 2>/dev/null || true
    rmdir css 2>/dev/null || true
fi

# Mover JS
if [ -d "js" ]; then
    echo "   Moviendo JS..."
    mv js/* assets/js/ 2>/dev/null || true
    rmdir js 2>/dev/null || true
fi

# Mover imágenes (solo estructura, no contenido)
echo "   Organizando imágenes..."
mkdir -p assets/img/icons
mkdir -p assets/img/logos

echo "   ✓ Archivos reorganizados"
echo ""

# Crear archivos .gitkeep
echo "3. Creando archivos .gitkeep..."
touch storage/app/public/.gitkeep
touch storage/app/private/.gitkeep
touch storage/cache/.gitkeep
touch storage/logs/.gitkeep
touch storage/sessions/.gitkeep
touch storage/uploads/.gitkeep
touch database/migrations/.gitkeep
touch database/seeds/.gitkeep
touch database/backups/.gitkeep
touch tests/fixtures/.gitkeep

echo "   ✓ Archivos .gitkeep creados"
echo ""

# Crear .env.example
echo "4. Creando .env.example..."
cat > .env.example << 'EOF'
# Entorno
APP_ENV=development
APP_DEBUG=true

# Base de Datos
DB_HOST=localhost
DB_PORT=5432
DB_NAME=tthh
DB_USER=datasis
DB_PASSWORD=your_password_here
DB_DRIVER=postgre

# Aplicación
APP_URL=http://localhost/tthh
APP_NAME="Sistema TTHH"
APP_VERSION=1.0.1

# Seguridad
ENCRYPTION_KEY=your_encryption_key_here
SESSION_DRIVER=files
SESSION_LIFETIME=7200

# Email
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=ssl

# Logs
LOG_LEVEL=debug
LOG_CHANNEL=file
EOF

echo "   ✓ .env.example creado"
echo ""

# Crear .gitignore mejorado
echo "5. Creando .gitignore..."
cat > .gitignore << 'EOF'
# Entornos
.env
.env.local
.env.*.local

# Dependencias
/vendor/
/node_modules/

# Cache y logs
/application/cache/*
!/application/cache/.gitkeep
/application/logs/*
!/application/logs/.gitkeep
/storage/cache/*
!/storage/cache/.gitkeep
/storage/logs/*
!/storage/logs/.gitkeep

# Archivos temporales
*.tmp
*.log
*.cache
*.swp
*.swo

# IDE
.idea/
.vscode/
*.sublime-*

# Sistema
.DS_Store
Thumbs.db

# Backups
*.sql
*.backup
*.bak
database/backups/*

# Uploads
/storage/uploads/*
!/storage/uploads/.gitkeep
/src/constancias/*.pdf

# Tests
/tests/fixtures/*.php
!/tests/fixtures/.gitkeep

# Composer
/vendor/
composer.lock

# NPM
/node_modules/
package-lock.json
EOF

echo "   ✓ .gitignore creado"
echo ""

# Crear estructura de servicios base
echo "6. Creando estructura de servicios..."
cat > application/services/BaseService.php << 'EOF'
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase base para servicios
 * 
 * @package App\Services
 * @author Ing. Doniel Acosta
 */
abstract class BaseService
{
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }
}
EOF

echo "   ✓ Servicios base creados"
echo ""

# Crear estructura de excepciones
echo "7. Creando excepciones personalizadas..."
cat > application/exceptions/AuthenticationException.php << 'EOF'
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excepción de autenticación
 * 
 * @package App\Exceptions
 * @author Ing. Doniel Acosta
 */
class AuthenticationException extends Exception
{
    public function __construct($message = "Error de autenticación", $code = 401)
    {
        parent::__construct($message, $code);
    }
}
EOF

cat > application/exceptions/ValidationException.php << 'EOF'
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excepción de validación
 * 
 * @package App\Exceptions
 * @author Ing. Doniel Acosta
 */
class ValidationException extends Exception
{
    protected $errors = [];
    
    public function __construct($message = "Error de validación", $errors = [], $code = 422)
    {
        parent::__construct($message, $code);
        $this->errors = $errors;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}
EOF

echo "   ✓ Excepciones creadas"
echo ""

# Crear configuraciones por entorno
echo "8. Creando configuraciones por entorno..."
cat > application/config/environments/development.php << 'EOF'
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Configuración para entorno de desarrollo
$config['base_url'] = 'http://localhost/tthh/';
$config['log_threshold'] = 4; // Todos los logs
$config['db_debug'] = TRUE;
$config['compress_output'] = FALSE;
EOF

cat > application/config/environments/production.php << 'EOF'
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Configuración para entorno de producción
$config['base_url'] = 'https://tthh.merida.gob.ve/';
$config['log_threshold'] = 1; // Solo errores
$config['db_debug'] = FALSE;
$config['compress_output'] = TRUE;
EOF

echo "   ✓ Configuraciones por entorno creadas"
echo ""

# Crear README para estructura
echo "9. Creando documentación de estructura..."
cat > docs/development/ESTRUCTURA.md << 'EOF'
# Estructura del Proyecto

## Organización de Directorios

### application/
Contiene todo el código de la aplicación siguiendo el patrón MVC de CodeIgniter.

### assets/
Recursos estáticos (CSS, JS, imágenes) organizados por tipo.

### storage/
Almacenamiento de archivos generados por la aplicación (cache, logs, uploads).

### database/
Scripts y archivos relacionados con la base de datos.

### tests/
Tests automatizados del sistema.

### docs/
Documentación del proyecto.

### scripts/
Scripts de utilidad para mantenimiento y despliegue.
EOF

echo "   ✓ Documentación creada"
echo ""

echo "=== Reorganización completada ==="
echo ""
echo "Próximos pasos:"
echo "1. Revisar y ajustar rutas en código"
echo "2. Actualizar configuraciones"
echo "3. Mover lógica de negocio a servicios"
echo "4. Aplicar estándares PSR-12"
echo ""
