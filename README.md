# Sistema de Gestión y Talento Humano (SisTTHH)

**Versión:** 1.0.1  
**Código:** Ana  
**Desarrollado para:** Gobernación del Estado Bolivariano de Mérida  
**Dirección de Recursos Humanos**  
**Desarrollador:** Ing. Doniel Acosta

---

## 📋 Tabla de Contenidos

- [Descripción General](#descripción-general)
- [Características Principales](#características-principales)
- [Tecnologías Utilizadas](#tecnologías-utilizadas)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Funcionalidades Detalladas](#funcionalidades-detalladas)
- [Uso del Sistema](#uso-del-sistema)
- [Mantenimiento](#mantenimiento)
- [Documentación Adicional](#documentación-adicional)
- [Desarrollo y Mantenimiento](#desarrollo-y-mantenimiento)
- [Changelog](#changelog)

---

## 📖 Descripción General

El **Sistema de Gestión y Talento Humano (SisTTHH)** es una aplicación web desarrollada para la **Dirección de Recursos Humanos de la Gobernación del Estado Bolivariano de Mérida**. 

El sistema permite gestionar de manera integral los recursos humanos de la institución, facilitando la administración de trabajadores, nóminas, constancias, comprobantes de pago y solicitudes.

### Objetivo

Proporcionar una plataforma centralizada para:
- Gestión de información de trabajadores
- Generación de constancias y comprobantes
- Administración de nóminas
- Gestión de solicitudes
- Consulta de información laboral

---

## ✨ Características Principales

### 👥 Gestión de Usuarios y Trabajadores
- Sistema de autenticación y autorización
- Gestión de roles y permisos
- Perfiles de usuario personalizados
- Modificación de datos personales y credenciales

### 📄 Constancias y Documentos
- **Constancias de Trabajo**: Generación automática de constancias laborales
- **Comprobantes de Pago**: Visualización y descarga de comprobantes de nómina
- Generación de documentos en formato PDF
- Historial de documentos generados

### 💰 Gestión de Nóminas
- Consulta de nóminas por período
- Visualización de conceptos de nómina (asignaciones y deducciones)
- Cálculo automático de montos
- Integración con sistema PREMIUM

### 📝 Solicitudes
- Sistema de solicitudes en línea
- Seguimiento de estado de solicitudes
- Gestión de destinos y estados de solicitud
- Historial de solicitudes

### 🏢 Gestión Organizacional
- Administración de dependencias
- Estructura organizativa
- Asignación de trabajadores a dependencias

---

## 🛠 Tecnologías Utilizadas

### Backend
- **PHP 8.3**: Lenguaje de programación principal
- **CodeIgniter 3.x**: Framework MVC
- **PostgreSQL 16**: Sistema de gestión de base de datos

### Frontend
- **HTML5 / CSS3**: Estructura y estilos
- **JavaScript / jQuery**: Interactividad
- **Bootstrap**: Framework CSS responsive
- **DataTables**: Tablas interactivas

### Librerías y Herramientas
- **TCPDF**: Generación de documentos PDF
- **FPDF**: Generación de PDFs adicionales
- **Smarty**: Motor de plantillas (en módulo formulario)

### Servidor
- **Apache**: Servidor web
- **PostgreSQL**: Base de datos

---

## 📦 Requisitos del Sistema

### Servidor
- **Sistema Operativo**: Linux (Ubuntu/Debian recomendado)
- **Servidor Web**: Apache 2.4+
- **PHP**: 8.3 o superior
- **Base de Datos**: PostgreSQL 16+
- **Extensiones PHP requeridas**:
  - pgsql
  - pdo_pgsql
  - mbstring
  - gd
  - zip
  - xml

### Cliente
- Navegador web moderno (Chrome, Firefox, Edge, Safari)
- JavaScript habilitado
- Resolución mínima: 1024x768

---

## 🚀 Instalación

### 1. Clonar o copiar el proyecto
```bash
cd /var/www/html/
# Copiar archivos del proyecto a /var/www/html/tthh
```

### 2. Instalar dependencias del servidor
```bash
# Instalar PostgreSQL
sudo apt-get update
sudo apt-get install -y postgresql postgresql-contrib

# Instalar extensión PHP para PostgreSQL
sudo apt-get install -y php8.3-pgsql

# Reiniciar Apache
sudo systemctl restart apache2
```

### 3. Configurar base de datos
```bash
# Crear base de datos
sudo -u postgres psql -c "CREATE DATABASE tthh;"

# Crear usuario (ver crear_usuario_datasis.sh)
bash crear_usuario_datasis.sh

# Restaurar backup (si existe)
pg_restore -h localhost -p 5432 -U datasis -d tthh --no-owner -v ~/backup.backup
```

### 4. Configurar permisos
```bash
# Dar permisos al directorio de la aplicación
sudo chown -R www-data:www-data /var/www/html/tthh
sudo chmod -R 755 /var/www/html/tthh

# Permisos de escritura para cache y logs
sudo chmod -R 777 /var/www/html/tthh/application/cache
sudo chmod -R 777 /var/www/html/tthh/application/logs
```

### 5. Configurar Apache
Crear virtual host o configurar en `/etc/apache2/sites-available/`:
```apache
<VirtualHost *:80>
    ServerName tthh.local
    DocumentRoot /var/www/html/tthh
    
    <Directory /var/www/html/tthh>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

---

## ⚙️ Configuración

### Configuración de Base de Datos
Editar `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'datasis',
    'password' => 'tu_contraseña',
    'database' => 'tthh',
    'dbdriver' => 'postgre',
    'port' => '5432',
);
```

### Configuración de la Aplicación
Editar `application/config/config.php`:
- `base_url`: URL base de la aplicación
- `encryption_key`: Clave de encriptación
- `sess_driver`: Driver de sesiones

### Configuración del Entorno
Editar `tthh.json` para personalizar:
- Nombre del sistema
- Información de la institución
- Configuraciones de UI
- Valores de cesta ticket

---

## 📁 Estructura del Proyecto

```
tthh/
├── application/              # Código de la aplicación
│   ├── config/              # Archivos de configuración
│   ├── controllers/          # Controladores (lógica de negocio)
│   ├── models/              # Modelos (acceso a datos)
│   ├── views/               # Vistas (interfaz de usuario)
│   ├── core/                # Clases base personalizadas
│   ├── libraries/           # Librerías personalizadas
│   └── helpers/             # Helpers personalizados
├── system/                  # Core de CodeIgniter
├── assets/                  # Recursos estáticos
│   ├── css/                # Hojas de estilo
│   ├── js/                 # Scripts JavaScript
│   └── img/                # Imágenes
├── src/                     # Recursos adicionales
│   ├── constancias/        # PDFs de constancias
│   └── fpdf/               # Librería FPDF
├── scripts/                # Scripts de utilidad
├── formulario/             # Módulo de formularios (legacy)
└── index.php               # Punto de entrada
```

---

## 🎯 Funcionalidades Detalladas

### Módulo de Usuarios (`Usuario_c`)
- **Login/Logout**: Autenticación de usuarios
- **Registro**: Creación de nuevas cuentas
- **Cambio de contraseña**: Modificación de credenciales
- **Cambio de correo**: Actualización de email
- **Gestión de perfiles**: Administración de datos personales

### Módulo de Trabajadores (`Trabajador_c`)
- **Consulta de información**: Datos laborales del trabajador
- **Comprobantes de pago**: Generación y descarga de comprobantes
- **Constancias de trabajo**: Solicitud y generación de constancias
- **Historial laboral**: Consulta de cargos y dependencias

### Módulo de Servicios (`Servicios_c`)
- **Constancias**: Gestión de constancias de trabajo
- **Comprobantes**: Visualización de comprobantes de pago
- **Solicitudes**: Consulta de solicitudes realizadas
- **Reportes**: Generación de reportes diversos

### Módulo de Solicitudes (`Solicitud_c`)
- **Crear solicitud**: Formulario de nuevas solicitudes
- **Consultar estado**: Seguimiento de solicitudes
- **Gestionar solicitudes**: Administración (admin)
- **Estados y destinos**: Configuración del flujo

### Módulo de Personas (`Persona_c`)
- **Gestión de personas**: CRUD de información personal
- **Validación de datos**: Verificación de cédulas y correos
- **Relaciones**: Vinculación con trabajadores y usuarios

### Módulo Home (`Home_c`)
- **Dashboard**: Página principal del sistema
- **Resumen**: Información general del usuario
- **Accesos rápidos**: Enlaces a funcionalidades principales

---

## 👤 Uso del Sistema

### Para Trabajadores

1. **Acceso al Sistema**
   - Ingresar a la URL del sistema
   - Iniciar sesión con cédula y contraseña

2. **Consultar Comprobantes de Pago**
   - Ir a "Servicios" → "Comprobantes de Pago"
   - Seleccionar año y mes
   - Visualizar o descargar PDF

3. **Solicitar Constancia de Trabajo**
   - Ir a "Servicios" → "Constancias"
   - Completar formulario
   - Descargar constancia generada

4. **Modificar Datos Personales**
   - Ir a "Modifica tu Correo" o "Modifica tu Clave"
   - Actualizar información
   - Guardar cambios

### Para Administradores

1. **Gestión de Usuarios**
   - Crear, editar y eliminar usuarios
   - Asignar roles y permisos
   - Gestionar accesos

2. **Gestión de Nóminas**
   - Cargar nóminas
   - Verificar cálculos
   - Generar reportes

3. **Gestión de Solicitudes**
   - Revisar solicitudes pendientes
   - Cambiar estados
   - Asignar destinos

---

## 🔧 Mantenimiento

### Backups
```bash
# Backup manual de base de datos
pg_dump -h localhost -p 5432 -U datasis -d tthh -F c -f backup_$(date +%Y%m%d).backup

# Ver script de backup automático
cat scripts/backup_database.sh
```

### Logs
- **Logs de aplicación**: `application/logs/`
- **Logs de Apache**: `/var/log/apache2/`
- **Logs de PostgreSQL**: `/var/log/postgresql/`

### Actualizaciones
1. Hacer backup completo
2. Revisar changelog
3. Aplicar cambios
4. Probar funcionalidades críticas
5. Restaurar backup si hay problemas

### Monitoreo
- Revisar logs regularmente
- Monitorear espacio en disco
- Verificar rendimiento de base de datos
- Revisar errores de PHP

---

## 📚 Documentación Adicional

- **[MEJORAS_PENDIENTES.md](./MEJORAS_PENDIENTES.md)**: Lista de mejoras y tareas pendientes
- **[TAREAS_INMEDIATAS.md](./TAREAS_INMEDIATAS.md)**: Tareas prioritarias
- **[README_MEJORAS.md](./README_MEJORAS.md)**: Guía de documentación de mejoras
- **[README_POSTGRESQL.md](./README_POSTGRESQL.md)**: Documentación de PostgreSQL
- **[configurar_postgresql_manual.md](./configurar_postgresql_manual.md)**: Guía de configuración de PostgreSQL

---

## 📝 Changelog

### Versión 1.0.1 (2026-01-26)
- ✅ Compatibilidad con PHP 8.3
- ✅ Corrección de tipos de retorno en drivers de sesión
- ✅ Agregado `#[\AllowDynamicProperties]` a clases core
- ✅ Migración a PostgreSQL completada
- ✅ Documentación de mejoras creada
- ✅ Scripts de utilidad agregados

### Versión 1.0.0
- 🎉 Versión inicial del sistema
- ✅ Módulos básicos implementados
- ✅ Sistema de autenticación
- ✅ Generación de constancias y comprobantes
- ✅ Gestión de nóminas

---

## 👥 Información de Contacto

**Dirección de Recursos Humanos**  
Gobernación del Estado Bolivariano de Mérida

- **Director**: ABG. ANTONIO JOSE DIAZ GARCIA
- **Email**: informatica.rrhh@gmail.com
- **Teléfono**: 0274-252.85.96/252.47.70/251.20.54
- **Dirección**: Calle 23 entre Av. 3 y 4 frente a la Plaza Bolívar, Palacio de Gobierno, planta baja

**R.I.F.**: G-20000156-9

---

## 👨‍💻 Desarrollo y Mantenimiento

**Desarrollador Principal**  
Ing. Doniel Acosta

- **Responsabilidades**: Desarrollo, mantenimiento y actualización del sistema
- **Versión actual**: 1.0.1
- **Última actualización**: 2026-01-26

---

## 📄 Licencia

Sistema desarrollado para uso interno de la Gobernación del Estado Bolivariano de Mérida.

---

## 🔄 Actualización de este Documento

Este README se actualiza regularmente. Para mantenerlo actualizado:

1. **Al agregar nuevas funcionalidades**: Actualizar sección "Funcionalidades Detalladas"
2. **Al cambiar tecnologías**: Actualizar sección "Tecnologías Utilizadas"
3. **Al modificar estructura**: Actualizar sección "Estructura del Proyecto"
4. **Al hacer releases**: Agregar entrada en "Changelog"
5. **Al cambiar configuración**: Actualizar sección "Configuración"

**Última actualización**: 2026-01-26  
**Próxima revisión**: 2026-02-26  
**Desarrollador**: Ing. Doniel Acosta

---

## 🆘 Soporte

Para reportar problemas o solicitar soporte:
1. Revisar documentación adicional
2. Consultar logs del sistema
3. Contactar al equipo de Informática de RRHH

---

**Sistema de Gestión y Talento Humano - Gobernación del Estado Bolivariano de Mérida**
