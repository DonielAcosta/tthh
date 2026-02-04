# Guía de Estructura del Proyecto

## 📁 Organización de Directorios

### application/
Contiene todo el código de la aplicación siguiendo el patrón MVC de CodeIgniter.

#### controllers/
- **Base/**: Controladores base y abstractos
- **Web/**: Controladores para la interfaz web
- **Api/**: Controladores para API REST (futuro)

**Convenciones**:
- Nombres en PascalCase con sufijo `_c`
- Ejemplo: `Usuario_c.php`, `Trabajador_c.php`

#### models/
- **Base/**: Modelos base
- **Entity/**: Entidades de dominio (futuro)
- **Repository/**: Repositorios de datos (futuro)

**Convenciones**:
- Nombres en PascalCase con sufijo `_m`
- Ejemplo: `Usuario_m.php`, `Persona_m.php`

#### views/
- **layouts/**: Plantillas base
- **components/**: Componentes reutilizables
- **errors/**: Páginas de error personalizadas
- **[módulo]/**: Vistas organizadas por módulo

#### services/
Servicios de negocio que contienen la lógica de aplicación.

**Convenciones**:
- Nombres en PascalCase con sufijo `Service`
- Ejemplo: `AuthService.php`, `NominaService.php`

#### libraries/
Librerías personalizadas del proyecto.

#### helpers/
Helpers personalizados.

---

## 🎨 Estándares de Nomenclatura

### Clases
- **Controladores**: `Usuario_c`, `Trabajador_c`
- **Modelos**: `Usuario_m`, `Persona_m`
- **Servicios**: `AuthService`, `NominaService`
- **Librerías**: `Utilidades`, `MY_Email`

### Métodos
- **Públicos**: `camelCase` - `getUser()`, `createNomina()`
- **Protegidos**: `camelCase` con `_` - `_validateInput()`
- **Privados**: `camelCase` con `_` - `_calculateTotal()`

### Variables
- **Públicas**: `camelCase` - `$userName`, `$totalAmount`
- **Protegidas/Privadas**: `camelCase` con `_` - `$_internalData`

### Constantes
- **UPPER_SNAKE_CASE** - `MAX_LOGIN_ATTEMPTS`, `DEFAULT_PAGE_SIZE`

---

## 📝 Convenciones de Código

### PHPDoc
Todos los métodos públicos deben tener documentación:

```php
/**
 * Descripción breve del método
 * 
 * Descripción detallada si es necesario
 * 
 * @param string $param1 Descripción del parámetro
 * @param int $param2 Descripción del parámetro
 * @return bool Descripción del valor de retorno
 * @throws Exception Cuando ocurre un error
 * @since 1.0.1
 * @author Ing. Doniel Acosta
 */
public function methodName(string $param1, int $param2): bool
{
    // implementación
}
```

### Indentación
- Usar 4 espacios (no tabs)
- Alinear código relacionado

### Líneas
- Máximo 120 caracteres por línea
- Dividir líneas largas de forma legible

### Comentarios
- Comentar código complejo
- Explicar "por qué", no "qué"
- Mantener comentarios actualizados

---

## 🔒 Seguridad

### Validación
- Validar TODA la entrada del usuario
- Sanitizar antes de mostrar
- Usar prepared statements siempre

### Autenticación
- Verificar autenticación en cada acción
- Usar métodos del controlador base
- Implementar rate limiting

### Autorización
- Verificar permisos antes de acciones
- Usar `requireRole()` del controlador base
- No confiar solo en el frontend

---

## 🧪 Testing

### Estructura
```
tests/
├── unit/          # Tests unitarios
├── integration/   # Tests de integración
└── fixtures/      # Datos de prueba
```

### Convenciones
- Un test por método
- Nombres descriptivos
- Arrange-Act-Assert pattern

---

## 📚 Documentación

### README por Módulo
Cada módulo importante debe tener su README:
- Propósito
- Uso básico
- Ejemplos
- Dependencias

### Código
- PHPDoc en todas las clases públicas
- Comentarios en código complejo
- README en directorios importantes

---

**Última actualización**: 2026-01-26
