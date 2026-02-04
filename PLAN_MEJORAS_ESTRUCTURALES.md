# Plan de Mejoras Estructurales Profesionales

**Fecha**: 2026-01-26  
**Desarrollador**: Ing. Doniel Acosta  
**Versión del Plan**: 1.0

---

## 📋 Índice

1. [Reorganización de Directorios](#1-reorganización-de-directorios)
2. [Estándares de Codificación](#2-estándares-de-codificación)
3. [Configuración y Entornos](#3-configuración-y-entornos)
4. [Gestión de Assets](#4-gestión-de-assets)
5. [Separación de Concerns](#5-separación-de-concerns)
6. [Documentación de Código](#6-documentación-de-código)
7. [Testing y Calidad](#7-testing-y-calidad)
8. [Seguridad](#8-seguridad)
9. [Rendimiento](#9-rendimiento)
10. [Versionado y Control](#10-versionado-y-control)

---

## 1. Reorganización de Directorios

### Estructura Propuesta

```
tthh/
├── .env.example                    # Plantilla de variables de entorno
├── .env                            # Variables de entorno (NO en git)
├── .gitignore                      # Archivos ignorados por git
├── .htaccess                       # Configuración Apache
├── composer.json                   # Dependencias PHP (si se usa)
├── package.json                    # Dependencias JS (si se usa)
│
├── application/                    # Código de la aplicación
│   ├── config/                    # Configuraciones
│   │   ├── database.php
│   │   ├── config.php
│   │   ├── routes.php
│   │   └── environments/         # Configuraciones por entorno
│   │       ├── development.php
│   │       ├── testing.php
│   │       └── production.php
│   │
│   ├── controllers/               # Controladores
│   │   ├── Base/                 # Controladores base
│   │   │   └── BaseController.php
│   │   ├── Api/                  # API REST (futuro)
│   │   └── Web/                  # Controladores web
│   │       ├── Usuario_c.php
│   │       ├── Trabajador_c.php
│   │       └── ...
│   │
│   ├── models/                    # Modelos
│   │   ├── Base/                 # Modelos base
│   │   │   └── BaseModel.php
│   │   ├── Entity/               # Entidades de dominio
│   │   └── Repository/           # Repositorios (futuro)
│   │
│   ├── views/                     # Vistas
│   │   ├── layouts/             # Layouts base
│   │   │   ├── main.php
│   │   │   ├── admin.php
│   │   │   └── empty.php
│   │   ├── components/          # Componentes reutilizables
│   │   │   ├── header.php
│   │   │   ├── footer.php
│   │   │   └── sidebar.php
│   │   ├── errors/              # Páginas de error
│   │   └── [módulos]/          # Vistas por módulo
│   │
│   ├── libraries/                # Librerías personalizadas
│   │   ├── Auth/                # Autenticación
│   │   ├── Validator/           # Validación
│   │   └── ...
│   │
│   ├── helpers/                 # Helpers
│   ├── core/                    # Clases base personalizadas
│   ├── middleware/              # Middleware (futuro)
│   ├── services/               # Servicios de negocio
│   ├── exceptions/             # Excepciones personalizadas
│   │
│   ├── cache/                   # Cache de aplicación
│   ├── logs/                    # Logs de aplicación
│   └── uploads/                # Archivos subidos
│
├── assets/                       # Recursos estáticos
│   ├── css/                     # Estilos
│   │   ├── main.css
│   │   ├── admin.css
│   │   └── vendor/              # CSS de terceros
│   ├── js/                      # JavaScript
│   │   ├── app.js              # JS principal
│   │   ├── modules/            # Módulos JS
│   │   └── vendor/             # JS de terceros
│   ├── img/                     # Imágenes
│   │   ├── icons/
│   │   ├── logos/
│   │   └── uploads/
│   └── fonts/                   # Fuentes
│
├── public/                       # Archivos públicos (nuevo)
│   ├── index.php               # Punto de entrada público
│   ├── .htaccess
│   └── assets/                 # Enlace simbólico a assets/
│
├── storage/                      # Almacenamiento
│   ├── app/                    # Archivos de aplicación
│   │   ├── public/            # Archivos públicos
│   │   └── private/           # Archivos privados
│   ├── cache/                 # Cache
│   ├── logs/                  # Logs
│   ├── sessions/              # Sesiones
│   └── uploads/               # Subidas de usuarios
│
├── database/                     # Base de datos
│   ├── migrations/             # Migraciones
│   ├── seeds/                 # Seeders
│   ├── backups/               # Backups SQL
│   └── schemas/               # Esquemas
│
├── tests/                        # Tests
│   ├── unit/                   # Tests unitarios
│   ├── integration/           # Tests de integración
│   └── fixtures/              # Datos de prueba
│
├── docs/                         # Documentación
│   ├── api/                    # Documentación de API
│   ├── development/            # Guías de desarrollo
│   ├── deployment/             # Guías de despliegue
│   └── user/                   # Manual de usuario
│
├── scripts/                      # Scripts de utilidad
│   ├── deployment/             # Scripts de despliegue
│   ├── maintenance/           # Scripts de mantenimiento
│   └── database/              # Scripts de BD
│
├── vendor/                       # Dependencias de terceros
├── system/                       # Core de CodeIgniter
│
└── [archivos raíz]              # README, CHANGELOG, etc.
```

### Acciones Inmediatas

- [ ] Crear directorio `storage/` y mover cache/logs allí
- [ ] Crear directorio `public/` para archivos públicos
- [ ] Organizar assets en estructura modular
- [ ] Separar configuraciones por entorno
- [ ] Crear directorio `database/migrations/`

---

## 2. Estándares de Codificación

### PSR-12 (PHP Standards Recommendations)

#### Implementar:

- [ ] **PSR-1**: Estándares básicos de codificación
  - Usar `<?php` sin etiqueta de cierre
  - Una clase por archivo
  - Namespaces y autoloading

- [ ] **PSR-12**: Estilo de código extendido
  - Indentación: 4 espacios
  - Líneas máximas: 120 caracteres
  - Nombres de clases: PascalCase
  - Nombres de métodos: camelCase
  - Constantes: UPPER_SNAKE_CASE

- [ ] **PSR-4**: Autoloading
  - Namespaces según estructura de directorios
  - Autoloader estándar

### Ejemplo de Refactorización

**Antes**:
```php
class Usuario_m extends MY_Model
{
    public function login($usuario, $password)
    {
        // código...
    }
}
```

**Después**:
```php
<?php

namespace App\Models;

use App\Core\BaseModel;

/**
 * Modelo de Usuario
 * 
 * @package App\Models
 * @author Ing. Doniel Acosta
 */
class UsuarioModel extends BaseModel
{
    /**
     * Autentica un usuario en el sistema
     * 
     * @param string $email Correo electrónico del usuario
     * @param string $password Contraseña del usuario
     * @return bool True si la autenticación es exitosa
     * @throws AuthenticationException Si las credenciales son inválidas
     */
    public function authenticate(string $email, string $password): bool
    {
        // código mejorado...
    }
}
```

### Herramientas

- [ ] Instalar PHP_CodeSniffer
- [ ] Configurar reglas PSR-12
- [ ] Integrar en pre-commit hooks

---

## 3. Configuración y Entornos

### Variables de Entorno

**Crear `.env.example`**:
```env
# Entorno
APP_ENV=development
APP_DEBUG=true

# Base de Datos
DB_HOST=localhost
DB_PORT=5432
DB_NAME=tthh
DB_USER=datasis
DB_PASSWORD=password
DB_DRIVER=postgre

# Aplicación
APP_URL=http://localhost/tthh
APP_NAME="Sistema TTHH"
APP_VERSION=1.0.1

# Seguridad
ENCRYPTION_KEY=tu_clave_secreta_aqui
SESSION_DRIVER=files
SESSION_LIFETIME=7200

# Email
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=tu_email@gmail.com
MAIL_PASSWORD=tu_password
MAIL_ENCRYPTION=ssl

# Logs
LOG_LEVEL=debug
LOG_CHANNEL=file
```

**Crear `.env`** (no versionado):
- Copiar desde `.env.example`
- Llenar con valores reales

### Configuración por Entorno

**application/config/environments/development.php**:
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://localhost/tthh/';
$config['log_threshold'] = 4; // Todos los logs
$config['db_debug'] = TRUE;
```

**application/config/environments/production.php**:
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'https://tthh.merida.gob.ve/';
$config['log_threshold'] = 1; // Solo errores
$config['db_debug'] = FALSE;
```

### Acciones

- [ ] Crear sistema de carga de `.env`
- [ ] Separar configuraciones por entorno
- [ ] Mover credenciales a variables de entorno
- [ ] Crear `.env.example` como plantilla

---

## 4. Gestión de Assets

### Estructura Propuesta

```
assets/
├── css/
│   ├── main.css                 # Estilos principales
│   ├── admin.css                # Estilos de admin
│   ├── components/              # Estilos de componentes
│   │   ├── buttons.css
│   │   ├── forms.css
│   │   └── tables.css
│   └── vendor/                  # CSS de terceros
│
├── js/
│   ├── app.js                   # JS principal
│   ├── modules/                 # Módulos JS
│   │   ├── auth.js
│   │   ├── grid.js
│   │   └── forms.js
│   └── vendor/                  # JS de terceros
│
└── img/
    ├── icons/                   # Iconos
    ├── logos/                   # Logos
    └── uploads/                 # Imágenes subidas
```

### Build Process (Futuro)

- [ ] Configurar Webpack o Vite
- [ ] Minificar y combinar CSS/JS
- [ ] Optimizar imágenes
- [ ] Versionado de assets (cache busting)

---

## 5. Separación de Concerns

### Arquitectura MVC Mejorada

#### Controladores
- **Responsabilidad**: Solo coordinar entre modelo y vista
- **No debe**: Contener lógica de negocio
- **Debe**: Validar entrada, llamar servicios, renderizar vista

#### Modelos
- **Responsabilidad**: Acceso a datos
- **No debe**: Contener lógica de negocio compleja
- **Debe**: Consultas, relaciones, validaciones básicas

#### Servicios (Nuevo)
- **Responsabilidad**: Lógica de negocio
- **Ubicación**: `application/services/`
- **Ejemplo**: `UsuarioService`, `NominaService`

### Ejemplo de Refactorización

**Antes** (lógica en controlador):
```php
public function login()
{
    $correo = $this->input->post('correo');
    $clave = $this->input->post('clave');
    
    // Lógica de negocio en el controlador (MALO)
    $hash = md5($clave);
    $user = $this->db->where('correo', $correo)
                     ->where('clave', $hash)
                     ->get('usuario_view')
                     ->row();
    // ...
}
```

**Después** (separación correcta):
```php
// Controller
public function login()
{
    $email = $this->input->post('correo');
    $password = $this->input->post('clave');
    
    try {
        $user = $this->authService->authenticate($email, $password);
        $this->session->set_userdata('user', $user);
        $this->jsonResponse(['success' => true]);
    } catch (AuthenticationException $e) {
        $this->jsonResponse(['success' => false, 'message' => $e->getMessage()]);
    }
}

// Service: application/services/AuthService.php
class AuthService
{
    public function authenticate(string $email, string $password): User
    {
        // Lógica de negocio aquí
    }
}
```

### Acciones

- [ ] Crear directorio `application/services/`
- [ ] Mover lógica de negocio a servicios
- [ ] Crear excepciones personalizadas
- [ ] Implementar DTOs (Data Transfer Objects)

---

## 6. Documentación de Código

### PHPDoc Estándar

**Ejemplo**:
```php
/**
 * Autentica un usuario en el sistema
 *
 * @param string $email Correo electrónico del usuario
 * @param string $password Contraseña en texto plano
 * @return User|null Usuario autenticado o null si falla
 * @throws InvalidArgumentException Si el email no es válido
 * @throws AuthenticationException Si las credenciales son incorrectas
 * @since 1.0.1
 * @author Ing. Doniel Acosta
 */
public function authenticate(string $email, string $password): ?User
{
    // implementación
}
```

### Acciones

- [ ] Documentar todos los métodos públicos
- [ ] Agregar @throws donde corresponda
- [ ] Documentar propiedades de clases
- [ ] Crear README por módulo

---

## 7. Testing y Calidad

### Estructura de Tests

```
tests/
├── unit/                         # Tests unitarios
│   ├── Models/
│   ├── Services/
│   └── Libraries/
├── integration/                  # Tests de integración
│   ├── Controllers/
│   └── Database/
└── fixtures/                     # Datos de prueba
    └── users.php
```

### Configuración PHPUnit

**phpunit.xml**:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit>
    <testsuites>
        <testsuite name="Unit">
            <directory>tests/unit</directory>
        </testsuite>
        <testsuite name="Integration">
            <directory>tests/integration</directory>
        </testsuite>
    </testsuites>
    <coverage>
        <include>
            <directory>application</directory>
        </include>
    </coverage>
</phpunit>
```

### Acciones

- [ ] Instalar PHPUnit
- [ ] Crear tests básicos para modelos críticos
- [ ] Configurar coverage mínimo del 60%
- [ ] Integrar en CI/CD

---

## 8. Seguridad

### Mejoras de Seguridad

- [ ] **Input Validation**
  - Validar todas las entradas
  - Sanitizar datos antes de guardar
  - Usar prepared statements siempre

- [ ] **Autenticación**
  - Implementar hash seguro (bcrypt/argon2)
  - Rate limiting en login
  - Logout automático por inactividad

- [ ] **Autorización**
  - Middleware de permisos
  - Verificar permisos en cada acción
  - Roles y permisos granulares

- [ ] **Protección de Datos**
  - Encriptar datos sensibles
  - Ocultar información en logs
  - Headers de seguridad (CSP, X-Frame-Options)

### Acciones Inmediatas

- [ ] Crear clase `SecurityHelper`
- [ ] Implementar CSRF tokens
- [ ] Agregar validación estricta
- [ ] Configurar headers de seguridad

---

## 9. Rendimiento

### Optimizaciones

- [ ] **Caché**
  - Caché de consultas frecuentes
  - Caché de vistas
  - OPcache configurado

- [ ] **Base de Datos**
  - Índices optimizados
  - Consultas optimizadas
  - Connection pooling

- [ ] **Assets**
  - Minificación de CSS/JS
  - Compresión gzip
  - CDN para assets estáticos

- [ ] **Código**
  - Lazy loading
  - Autoloading optimizado
  - Eliminar código muerto

---

## 10. Versionado y Control

### Git

**`.gitignore` mejorado**:
```
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
/storage/logs/*

# Archivos temporales
*.tmp
*.log
*.cache

# IDE
.idea/
.vscode/
*.swp
*.swo

# Sistema
.DS_Store
Thumbs.db

# Backups
*.sql
*.backup
*.bak

# Uploads
/storage/uploads/*
!/storage/uploads/.gitkeep
/src/constancias/*.pdf
```

### Acciones

- [ ] Configurar `.gitignore` completo
- [ ] Crear estructura de branches
- [ ] Documentar proceso de merge
- [ ] Configurar pre-commit hooks

---

## 📊 Priorización de Implementación

### Fase 1 (Esta Semana) - Crítico
1. ✅ Variables de entorno (.env)
2. ✅ Reorganización básica de directorios
3. ✅ Estándares de codificación básicos
4. ✅ Documentación PHPDoc

### Fase 2 (Este Mes) - Importante
1. Separación de concerns (Servicios)
2. Testing básico
3. Seguridad mejorada
4. Optimización de consultas

### Fase 3 (Próximos Meses) - Mejoras
1. Arquitectura completa
2. CI/CD
3. Monitoreo
4. Performance avanzado

---

## 🛠 Herramientas Recomendadas

### Desarrollo
- **PHPStorm** o **VS Code** con extensiones PHP
- **PHP_CodeSniffer** para estándares
- **PHPStan** o **Psalm** para análisis estático
- **Xdebug** para debugging

### Testing
- **PHPUnit** para tests
- **Codeception** para tests E2E (opcional)

### Build
- **Composer** para dependencias PHP
- **NPM/Yarn** para assets (si se necesita)
- **Webpack** o **Vite** para bundling (futuro)

### CI/CD
- **GitHub Actions** o **GitLab CI**
- **Docker** para contenedores (opcional)

---

## 📝 Checklist de Implementación

### Estructura
- [ ] Crear directorio `storage/`
- [ ] Crear directorio `public/`
- [ ] Reorganizar `assets/`
- [ ] Crear `database/migrations/`
- [ ] Crear `application/services/`

### Configuración
- [ ] Crear `.env.example`
- [ ] Implementar carga de `.env`
- [ ] Separar configs por entorno
- [ ] Mover credenciales a `.env`

### Código
- [ ] Aplicar PSR-12
- [ ] Agregar namespaces
- [ ] Documentar con PHPDoc
- [ ] Crear servicios de negocio
- [ ] Implementar excepciones

### Testing
- [ ] Instalar PHPUnit
- [ ] Crear tests básicos
- [ ] Configurar coverage

### Seguridad
- [ ] Implementar hash seguro
- [ ] Agregar CSRF tokens
- [ ] Validación estricta
- [ ] Headers de seguridad

---

**Este plan debe implementarse gradualmente para no interrumpir el funcionamiento del sistema.**

**Última actualización**: 2026-01-26
