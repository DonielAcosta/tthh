# Sistema de Roles en TTHH

**Última actualización**: 2026-01-28

---

## 📋 ¿Qué son los Roles?

Los **roles** en el sistema TTHH son un mecanismo de **control de acceso** que determina qué funcionalidades y secciones puede ver y usar cada usuario según su tipo de cuenta.

---

## 🎭 Roles Disponibles en el Sistema

Según el código, el sistema maneja los siguientes roles:

### 1. **Administrador**
- **Acceso**: Completo al sistema
- **Permisos**: Todos los permisos habilitados
- **Características**:
  - ✅ Acceso a todas las funcionalidades
  - ✅ Puede agregar registros (`add = TRUE`)
  - ✅ Puede actualizar registros (`upd = TRUE`)
  - ✅ Puede eliminar registros (`del = TRUE`)
  - ✅ Acceso a todos los menús (`admin = TRUE`)

### 2. **Trabajador**
- **Acceso**: Limitado a funcionalidades de trabajador
- **Características**:
  - ✅ Menú específico para trabajadores
  - ✅ Acceso a servicios básicos
  - ✅ Puede modificar su correo y clave
  - ❌ Sin acceso a funciones administrativas

### 3. **Otros Roles** (por defecto)
- **Acceso**: Menú estándar
- **Características**:
  - ✅ Menú básico del sistema
  - ✅ Funcionalidades limitadas según configuración

---

## 🔐 Estructura de Permisos

Cada rol tiene los siguientes permisos configurados en la tabla `rol`:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INTEGER | ID único del rol |
| `rol` | VARCHAR | Nombre del rol (ej: "Administrador", "Trabajador") |
| `admin` | BOOLEAN | Acceso completo al sistema |
| `add` | BOOLEAN | Permiso para agregar registros |
| `upd` | BOOLEAN | Permiso para actualizar registros |
| `del` | BOOLEAN | Permiso para eliminar registros |
| `menu` | TEXT | Configuración de menú específica |

---

## 🚀 ¿Cómo Funcionan los Roles?

### 1. **Asignación de Rol al Usuario**

Cuando un usuario se registra o inicia sesión:

```php
// En Usuario_m.php - método login()
$this->session->rol_id = $r->rol_fk;      // ID del rol
$this->session->rol = $r->rol;            // Nombre del rol
```

El rol se obtiene de la vista `usuario_view` que incluye información del rol asociado.

### 2. **Control de Acceso en Controladores**

El sistema usa dos métodos principales para controlar el acceso:

#### **Método 1: BaseController (Nuevo)**
```php
// Requiere un rol específico
protected function requireRole($roles): void
{
    $this->requireAuth();
    
    $userRole = $this->session->userdata('rol');
    $requiredRoles = is_array($roles) ? $roles : [$roles];
    
    if (!in_array($userRole, $requiredRoles)) {
        show_error('No tiene permisos para acceder a esta sección', 403);
    }
}

// Uso en controladores:
public function admin_panel()
{
    $this->requireRole('Administrador');
    // Código del panel de administración
}
```

#### **Método 2: Verificación Manual**
```php
// Verificación manual del rol
if ($this->session->userdata('rol') !== 'Administrador') {
    redirect('Home_c');
    return;
}
```

### 3. **Menús Según Rol**

El sistema carga diferentes menús según el rol del usuario:

#### **En MY_Controller.php:**
```php
public function renderiza($template, $datos)
{
    // Cargar menú según rol
    switch ($this->session->rol) {
        case 'Trabajador':
            $datos['menu'] = $this->load->view('menu/trabajador_v', '', TRUE);
            break;
        
        default:
            $datos['menu'] = $this->load->view('menu/menu', '', TRUE);
            break;
    }
    
    $this->load->view($template, $datos);
}
```

#### **En BaseController.php (Mejorado):**
```php
protected function loadMenu(): void
{
    $rol = $this->session->userdata('rol');
    
    switch ($rol) {
        case 'Trabajador':
            $this->data['menu'] = $this->load->view('menu/trabajador_v', '', TRUE);
            break;
        case 'Administrador':
            $this->data['menu'] = $this->load->view('menu/admin_v', '', TRUE);
            break;
        default:
            $this->data['menu'] = $this->load->view('menu/menu', '', TRUE);
            break;
    }
}
```

---

## 📁 Archivos Relacionados con Roles

### Modelos
- **`application/models/Rol_m.php`**
  - Modelo para gestionar roles
  - Método `get_by_id()` para obtener datos de un rol

### Controladores Base
- **`application/core/MY_Controller.php`**
  - Controlador base original
  - Carga menús según rol

- **`application/core/BaseController.php`**
  - Controlador base mejorado
  - Métodos `requireRole()` y `loadMenu()`

### Vistas de Menú
- **`application/views/menu/menu.php`**
  - Menú estándar (rol por defecto)

- **`application/views/menu/trabajador_v.php`**
  - Menú específico para trabajadores

- **`application/views/menu/admin_v.php`** (si existe)
  - Menú para administradores

---

## 🔍 Ejemplos de Uso

### Ejemplo 1: Proteger una Función Administrativa

```php
class Usuario_c extends MY_Controller
{
    public function listar_usuarios()
    {
        // Verificar que sea administrador
        if ($this->session->userdata('rol') !== 'Administrador') {
            redirect('Home_c');
            return;
        }
        
        // Código para listar usuarios
        $this->load->model('Usuario_m');
        $usuarios = $this->Usuario_m->get_all();
        
        $datos['usuarios'] = $usuarios;
        $this->renderiza('template/empty_template', $datos);
    }
}
```

### Ejemplo 2: Usar BaseController con requireRole()

```php
class Admin_c extends BaseController
{
    public function dashboard()
    {
        // Requiere rol de Administrador
        $this->requireRole('Administrador');
        
        // Código del dashboard
        $this->render('admin/dashboard');
    }
    
    public function reportes()
    {
        // Permite múltiples roles
        $this->requireRole(['Administrador', 'Supervisor']);
        
        // Código de reportes
        $this->render('admin/reportes');
    }
}
```

### Ejemplo 3: Mostrar/Ocultar Elementos en Vistas

```php
<!-- En una vista -->
<?php if ($this->session->userdata('rol') === 'Administrador'): ?>
    <a href="<?php echo base_url('Admin_c/usuarios');?>">Gestionar Usuarios</a>
<?php endif; ?>

<?php if (in_array($this->session->userdata('rol'), ['Administrador', 'Trabajador'])): ?>
    <a href="<?php echo base_url('Servicios_c');?>">Servicios</a>
<?php endif; ?>
```

---

## 📊 Flujo de Autenticación y Roles

```
1. Usuario ingresa correo y clave
   ↓
2. Usuario_m->login() valida credenciales
   ↓
3. Se obtiene el rol desde usuario_view
   ↓
4. Se guarda en sesión:
   - $session->rol_id
   - $session->rol
   ↓
5. En cada petición:
   - Se verifica el rol en sesión
   - Se carga el menú correspondiente
   - Se valida acceso a funciones protegidas
```

---

## ⚠️ Consideraciones Importantes

### Seguridad
1. **Siempre validar en el servidor**: No confiar solo en validaciones del cliente
2. **Usar `requireRole()`**: Método recomendado para proteger funciones
3. **Verificar permisos específicos**: Además del rol, verificar permisos `add`, `upd`, `del` si es necesario

### Base de Datos
- Los roles se almacenan en la tabla `rol`
- Los usuarios tienen un `rol_fk` que referencia al rol
- La vista `usuario_view` incluye el nombre del rol para facilitar consultas

### Sesión
- El rol se guarda en la sesión al hacer login
- Se puede acceder con: `$this->session->userdata('rol')`
- El rol persiste durante toda la sesión del usuario

---

## 🛠️ Mejoras Futuras Recomendadas

1. **Sistema de Permisos Granulares**
   - Crear tabla de permisos específicos
   - Asignar permisos a roles de forma flexible
   - Validar permisos en cada acción

2. **Middleware de Roles**
   - Crear middleware para validación automática
   - Aplicar a rutas específicas

3. **Gestión de Roles desde Interfaz**
   - Panel administrativo para gestionar roles
   - Asignar roles a usuarios desde la interfaz

4. **Logs de Acceso**
   - Registrar intentos de acceso no autorizados
   - Auditoría de cambios según roles

---

## 📚 Referencias

- **Modelo de Rol**: `application/models/Rol_m.php`
- **Controlador Base**: `application/core/BaseController.php`
- **Controlador Base Original**: `application/core/MY_Controller.php`
- **Modelo de Usuario**: `application/models/Usuario_m.php`

---

**Última actualización**: 2026-01-28
