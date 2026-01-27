# Changelog - Sistema TTHH

Todos los cambios notables en este proyecto serán documentados en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/),
y este proyecto adhiere a [Semantic Versioning](https://semver.org/lang/es/).

---

## [1.0.1] - 2026-01-26

**Desarrollador**: Ing. Doniel Acosta

### ✅ Agregado
- Documentación completa del sistema (README.md)
- Documentación de mejoras pendientes (MEJORAS_PENDIENTES.md)
- Lista de tareas inmediatas (TAREAS_INMEDIATAS.md)
- Script de análisis de compatibilidad (scripts/analizar_compatibilidad.php)
- Script de instalación de extensión PostgreSQL (instalar_pgsql.sh)
- Script de backup de base de datos (scripts/backup_database.sh)
- Documentación de PostgreSQL (README_POSTGRESQL.md)

### 🔧 Corregido
- Compatibilidad con PHP 8.3
- Tipos de retorno en `Session_files_driver` para cumplir con `SessionHandlerInterface`
- Warnings de propiedades dinámicas agregando `#[\AllowDynamicProperties]` a:
  - Clases core: `CI_URI`, `CI_Router`, `CI_Controller`, `CI_Loader`, `CI_DB_driver`
  - Clases de modelo: `CI_Model`, `MY_Model`, `Usuario_m`, `Persona_m`, `Rol_m`
  - Librerías: `CI_Email`, `MY_Email`
- Conexión a base de datos PostgreSQL
- Configuración de usuario `datasis` con permisos adecuados

### 🔄 Cambiado
- Migración de base de datos a PostgreSQL
- Actualización de configuración de base de datos
- Mejora en estructura de documentación

### 📝 Documentación
- README principal con descripción completa del sistema
- Guías de instalación y configuración
- Documentación de funcionalidades
- Changelog detallado

---

## [1.0.0] - Fecha de lanzamiento inicial

### ✅ Agregado
- Sistema de autenticación y autorización
- Gestión de usuarios y trabajadores
- Módulo de constancias de trabajo
- Módulo de comprobantes de pago
- Sistema de solicitudes
- Gestión de nóminas
- Integración con sistema PREMIUM
- Generación de documentos PDF
- Dashboard principal
- Sistema de roles y permisos

### 🔧 Características Iniciales
- Login/Logout de usuarios
- Registro de nuevos usuarios
- Consulta de comprobantes de pago
- Generación de constancias de trabajo
- Gestión de información personal
- Administración de dependencias
- Sistema de solicitudes en línea

---

## Formato de Entradas

### Tipos de Cambios
- **✅ Agregado**: Para nuevas funcionalidades
- **🔄 Cambiado**: Para cambios en funcionalidades existentes
- **🔧 Corregido**: Para correcciones de bugs
- **🗑️ Eliminado**: Para funcionalidades removidas
- **🔒 Seguridad**: Para vulnerabilidades corregidas
- **📝 Documentación**: Para cambios en documentación

---

## Notas

- Las fechas están en formato YYYY-MM-DD
- Los cambios se organizan por versión
- Se incluyen enlaces a issues/PRs cuando sea relevante
- Se mantiene un registro de breaking changes

---

**Mantener este archivo actualizado es importante para el seguimiento del proyecto.**
