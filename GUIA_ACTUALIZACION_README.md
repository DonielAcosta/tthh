# Guía para Actualizar el README

Esta guía te ayudará a mantener el README.md actualizado cuando realices cambios en el sistema.

---

## 📋 Cuándo Actualizar el README

Actualiza el README cuando:

- ✅ Agregues nuevas funcionalidades o módulos
- ✅ Cambies tecnologías o dependencias
- ✅ Modifiques la estructura del proyecto
- ✅ Agregues o cambies configuraciones importantes
- ✅ Publiques una nueva versión
- ✅ Cambies información de contacto o organización
- ✅ Modifiques procesos de instalación o configuración

---

## 📝 Secciones a Actualizar

### 1. **Changelog** (en README.md y CHANGELOG.md)

**Cuándo actualizar**: Cada vez que hagas un release o cambio significativo

**Qué agregar**:
```markdown
### Versión X.X.X (YYYY-MM-DD)
- ✅ Nueva funcionalidad agregada
- 🔧 Bug corregido
- 🔄 Cambio en funcionalidad existente
```

**Ejemplo**:
```markdown
### Versión 1.0.2 (2026-02-15)
- ✅ Agregado módulo de reportes avanzados
- 🔧 Corregido error en generación de constancias
- 🔄 Mejorada interfaz de usuario
```

---

### 2. **Funcionalidades Detalladas**

**Cuándo actualizar**: Al agregar nuevos módulos o funcionalidades

**Formato**:
```markdown
### Módulo Nuevo (`Controlador_c`)
- **Funcionalidad 1**: Descripción breve
- **Funcionalidad 2**: Descripción breve
```

**Ejemplo**:
```markdown
### Módulo de Reportes (`Reportes_c`)
- **Reportes de nómina**: Generación de reportes mensuales
- **Estadísticas**: Dashboard con métricas de RRHH
```

---

### 3. **Tecnologías Utilizadas**

**Cuándo actualizar**: Al cambiar o agregar tecnologías

**Qué actualizar**:
- Versiones de PHP, frameworks, librerías
- Nuevas dependencias
- Cambios en base de datos

**Ejemplo**:
```markdown
### Backend
- **PHP 8.3**: Lenguaje de programación principal
- **CodeIgniter 3.x**: Framework MVC
- **PostgreSQL 16**: Sistema de gestión de base de datos
- **Redis 7.0**: Sistema de caché (NUEVO)
```

---

### 4. **Estructura del Proyecto**

**Cuándo actualizar**: Al agregar o reorganizar directorios importantes

**Qué agregar**:
- Nuevos directorios principales
- Cambios en organización de archivos
- Nuevos módulos o componentes

**Ejemplo**:
```markdown
├── api/                    # API REST (NUEVO)
│   ├── controllers/        # Controladores de API
│   └── middleware/        # Middleware de autenticación
```

---

### 5. **Requisitos del Sistema**

**Cuándo actualizar**: Al cambiar requisitos mínimos

**Qué actualizar**:
- Versiones mínimas de PHP, base de datos, etc.
- Nuevas extensiones PHP requeridas
- Cambios en requisitos del servidor

**Ejemplo**:
```markdown
- **PHP**: 8.3 o superior (actualizado de 8.1)
- **Extensiones PHP requeridas**:
  - pgsql
  - redis (NUEVO)
```

---

### 6. **Instalación**

**Cuándo actualizar**: Al cambiar pasos de instalación

**Qué actualizar**:
- Nuevos comandos de instalación
- Cambios en configuración inicial
- Nuevos requisitos previos

**Ejemplo**:
```markdown
### 2. Instalar dependencias del servidor
```bash
# Instalar Redis (NUEVO)
sudo apt-get install -y redis-server
```
```

---

### 7. **Configuración**

**Cuándo actualizar**: Al agregar nuevas configuraciones

**Qué agregar**:
- Nuevos archivos de configuración
- Nuevas variables de entorno
- Cambios en configuraciones existentes

**Ejemplo**:
```markdown
### Configuración de Caché
Editar `application/config/cache.php`:
```php
$config['cache_driver'] = 'redis';
$config['redis_host'] = 'localhost';
```
```

---

### 8. **Uso del Sistema**

**Cuándo actualizar**: Al agregar nuevas funcionalidades para usuarios

**Qué agregar**:
- Nuevos flujos de trabajo
- Nuevas opciones en menús
- Cambios en procesos existentes

**Ejemplo**:
```markdown
5. **Generar Reportes**
   - Ir a "Reportes" → "Nómina"
   - Seleccionar período
   - Descargar reporte en Excel
```

---

## 🔄 Proceso de Actualización

### Paso 1: Identificar Cambios
- Revisa qué se modificó en el código
- Identifica nuevas funcionalidades
- Revisa cambios en configuración

### Paso 2: Actualizar Secciones Relevantes
- Ve a la sección correspondiente en README.md
- Agrega o modifica la información
- Mantén el formato consistente

### Paso 3: Actualizar Changelog
- Agrega entrada en CHANGELOG.md
- Agrega resumen en README.md (sección Changelog)
- Incluye fecha y versión

### Paso 4: Revisar
- Lee el README completo
- Verifica que la información sea clara
- Asegúrate de que los ejemplos funcionen

### Paso 5: Actualizar Fecha
- Cambia "Última actualización" al final del README
- Actualiza "Próxima revisión" si es necesario

---

## 📌 Buenas Prácticas

### ✅ Hacer
- Mantener el formato markdown consistente
- Usar ejemplos claros y actualizados
- Incluir fechas en los cambios
- Ser específico en las descripciones
- Actualizar todas las secciones relacionadas

### ❌ Evitar
- Información desactualizada
- Ejemplos que no funcionan
- Secciones incompletas
- Fechas incorrectas
- Información contradictoria

---

## 🎯 Checklist de Actualización

Antes de considerar el README actualizado, verifica:

- [ ] Changelog actualizado con fecha y versión
- [ ] Funcionalidades nuevas documentadas
- [ ] Tecnologías actualizadas si hubo cambios
- [ ] Estructura del proyecto actualizada
- [ ] Requisitos del sistema revisados
- [ ] Pasos de instalación verificados
- [ ] Configuraciones nuevas documentadas
- [ ] Guías de uso actualizadas
- [ ] Fecha de "Última actualización" cambiada
- [ ] Información de contacto verificada

---

## 📝 Plantillas Rápidas

### Agregar Nueva Funcionalidad
```markdown
### Módulo de [Nombre] (`Controlador_c`)
- **[Funcionalidad]**: Descripción breve de qué hace
- **[Otra funcionalidad]**: Otra descripción
```

### Agregar Nueva Tecnología
```markdown
- **[Nombre]**: Versión - Descripción breve
```

### Agregar Paso de Instalación
```markdown
### X. [Título del paso]
```bash
# Comando o instrucción
```
```

### Agregar al Changelog
```markdown
## [X.X.X] - YYYY-MM-DD

### ✅ Agregado
- Nueva funcionalidad X
- Nueva característica Y

### 🔧 Corregido
- Bug en módulo Z
```

---

## 🔗 Referencias

- [README.md](./README.md) - Documento principal
- [CHANGELOG.md](./CHANGELOG.md) - Historial de cambios
- [MEJORAS_PENDIENTES.md](./MEJORAS_PENDIENTES.md) - Mejoras futuras

---

**Mantener el README actualizado ayuda a todos los desarrolladores y usuarios del sistema.**

**Última actualización de esta guía**: 2026-01-26
