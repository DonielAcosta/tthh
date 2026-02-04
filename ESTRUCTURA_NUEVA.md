# Nueva Estructura del Proyecto TTHH

**Fecha de Reorganización**: 2026-01-28  
**Versión**: 2.0

---

## 📁 Estructura de Directorios

```
tthh/
├── application/              # Código de aplicación CodeIgniter
│   ├── config/              # Configuraciones
│   ├── controllers/         # Controladores
│   ├── models/              # Modelos
│   ├── views/               # Vistas
│   ├── services/            # Servicios de negocio ⭐ NUEVO
│   ├── exceptions/          # Excepciones personalizadas ⭐ NUEVO
│   ├── helpers/             # Helpers (incluye assets_helper.php ⭐ NUEVO)
│   └── core/                # Clases base personalizadas
│
├── assets/                  # Recursos estáticos organizados ⭐ NUEVO
│   ├── css/                 # Estilos CSS
│   │   ├── components/      # Componentes CSS
│   │   └── vendor/          # CSS de terceros
│   ├── js/                  # JavaScript
│   │   ├── modules/         # Módulos JS
│   │   └── vendor/          # JS de terceros
│   ├── img/                 # Imágenes
│   │   ├── icons/           # Iconos
│   │   ├── logos/           # Logos
│   │   └── uploads/         # Imágenes subidas
│   └── fonts/               # Fuentes
│
├── storage/                 # Almacenamiento ⭐ NUEVO
│   ├── app/                 # Archivos de aplicación
│   │   ├── public/          # Archivos públicos
│   │   └── private/        # Archivos privados
│   ├── cache/               # Cache (movido desde application/cache)
│   ├── logs/                # Logs (movido desde application/logs)
│   ├── sessions/            # Sesiones
│   └── uploads/             # Archivos subidos por usuarios
│
├── database/                # Base de datos ⭐ NUEVO
│   ├── migrations/          # Migraciones de BD
│   ├── seeds/               # Seeders
│   ├── backups/             # Backups SQL
│   └── schemas/             # Esquemas de BD
│
├── tests/                   # Tests ⭐ NUEVO
│   ├── unit/                # Tests unitarios
│   ├── integration/         # Tests de integración
│   └── fixtures/            # Datos de prueba
│
├── docs/                    # Documentación ⭐ NUEVO
│   ├── api/                 # Documentación de API
│   ├── development/         # Guías de desarrollo
│   ├── deployment/          # Guías de despliegue
│   └── user/                # Manual de usuario
│
├── scripts/                 # Scripts organizados ⭐ MEJORADO
│   ├── deployment/          # Scripts de despliegue
│   ├── maintenance/         # Scripts de mantenimiento
│   └── database/            # Scripts de BD
│
├── css/                     # ⚠️ Enlace simbólico a assets/css (compatibilidad)
├── js/                      # ⚠️ Enlace simbólico a assets/js (compatibilidad)
├── img/                     # ⚠️ Enlace simbólico a assets/img (compatibilidad)
│
├── system/                  # Core de CodeIgniter
├── vendor/                  # Dependencias de terceros
├── formulario/              # Módulo de formularios
├── proyectos/               # Proyectos relacionados
├── libComunP7/              # Librerías comunes
│
└── [archivos raíz]          # README, CHANGELOG, etc.
```

---

## 🔄 Cambios Realizados

### 1. Reorganización de Assets

**Antes:**
```
tthh/
├── css/
├── js/
└── img/
```

**Ahora:**
```
tthh/
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── css/ → (enlace simbólico a assets/css)
├── js/ → (enlace simbólico a assets/js)
└── img/ → (enlace simbólico a assets/img)
```

**Compatibilidad**: Se mantienen enlaces simbólicos para que el código existente siga funcionando.

### 2. Nuevo Helper de Assets

Se creó `application/helpers/assets_helper.php` con funciones útiles:

```php
// Obtener URL de un asset
asset_url('css/style.css')  // → /tthh/assets/css/style.css

// Funciones específicas
css_url('style.css')        // → /tthh/assets/css/style.css
js_url('app.js')            // → /tthh/assets/js/app.js
img_url('logo.png')         // → /tthh/assets/img/logo.png

// Ruta física
asset_path('css/style.css') // → /var/www/html/tthh/assets/css/style.css
```

**Uso recomendado en vistas:**
```php
<!-- Antes -->
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">

<!-- Ahora (recomendado) -->
<link rel="stylesheet" href="<?php echo css_url('style.css');?>">
```

### 3. Storage Centralizado

**Antes:**
```
application/
├── cache/
└── logs/
```

**Ahora:**
```
storage/
├── cache/     (movido desde application/cache)
├── logs/      (movido desde application/logs)
├── sessions/
└── uploads/
```

**Configuración actualizada:**
- `application/config/config.php`: `log_path` ahora apunta a `storage/logs/`

### 4. Nuevos Directorios

- ✅ `database/` - Para migraciones, seeds y backups
- ✅ `tests/` - Para tests automatizados
- ✅ `docs/` - Para documentación organizada
- ✅ `scripts/` - Scripts organizados por propósito

---

## 🚀 Cómo Usar la Nueva Estructura

### Para Desarrolladores

#### 1. Usar el Helper de Assets (Recomendado)

```php
// En vistas
<link rel="stylesheet" href="<?php echo css_url('style.css');?>">
<script src="<?php echo js_url('app.js');?>"></script>
<img src="<?php echo img_url('logo.png');?>" alt="Logo">
```

#### 2. Compatibilidad con Código Existente

El código existente sigue funcionando gracias a los enlaces simbólicos:

```php
// Esto sigue funcionando
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
```

#### 3. Agregar Nuevos Assets

```bash
# CSS personalizado
assets/css/components/mi-componente.css

# JavaScript modular
assets/js/modules/mi-modulo.js

# Imágenes organizadas
assets/img/icons/icono.png
assets/img/logos/logo.png
```

### Para Administradores

#### Logs

Los logs ahora están en `storage/logs/`:
```bash
tail -f storage/logs/log-2026-01-28.php
```

#### Cache

El cache está en `storage/cache/`:
```bash
# Limpiar cache
rm -rf storage/cache/*
```

---

## 📝 Migración Gradual

### Fase 1: ✅ Completada
- [x] Crear nueva estructura de directorios
- [x] Mover assets a `assets/`
- [x] Crear enlaces simbólicos para compatibilidad
- [x] Crear helper de assets
- [x] Mover cache y logs a `storage/`
- [x] Actualizar configuración

### Fase 2: Pendiente (Opcional)
- [ ] Actualizar vistas para usar `css_url()`, `js_url()`, `img_url()`
- [ ] Organizar imágenes en subdirectorios (icons, logos, uploads)
- [ ] Mover lógica de negocio a servicios
- [ ] Crear tests básicos

---

## ⚠️ Notas Importantes

1. **Compatibilidad**: Los enlaces simbólicos garantizan que el código existente siga funcionando.

2. **Logs**: La configuración de logs se actualizó automáticamente. Los nuevos logs se guardarán en `storage/logs/`.

3. **Cache**: Si tienes código que referencia `application/cache/`, deberás actualizarlo a `storage/cache/`.

4. **Permisos**: Asegúrate de que `storage/` tenga permisos de escritura:
   ```bash
   chmod -R 775 storage/
   chown -R www-data:www-data storage/
   ```

5. **Git**: Los directorios nuevos tienen archivos `.gitkeep` para mantenerlos en el repositorio.

---

## 🔍 Verificación

Para verificar que todo funciona:

1. **Verificar enlaces simbólicos:**
   ```bash
   ls -la css js img
   ```

2. **Verificar estructura:**
   ```bash
   tree -L 2 assets/ storage/ database/
   ```

3. **Probar aplicación:**
   - Acceder a la aplicación web
   - Verificar que CSS/JS se cargan correctamente
   - Verificar que las imágenes se muestran

---

## 📚 Referencias

- [PLAN_MEJORAS_ESTRUCTURALES.md](./PLAN_MEJORAS_ESTRUCTURALES.md) - Plan completo de mejoras
- [ESTRUCTURA_PROFESIONAL.md](./ESTRUCTURA_PROFESIONAL.md) - Estructura profesional propuesta
- [GUIA_ESTRUCTURA.md](./docs/development/GUIA_ESTRUCTURA.md) - Guía de desarrollo

---

**Última actualización**: 2026-01-28
