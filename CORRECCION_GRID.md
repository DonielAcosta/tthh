# Corrección de Error phpGrid_Lite

**Fecha**: 2026-01-26  
**Desarrollador**: Ing. Doniel Acosta

## Problema Identificado

Error al cargar la vista de solicitudes:
```
Failed to open stream: No such file or directory
vendor/tecnickcom/phpGrid_Lite/conf.php
```

## Causa del Problema

1. **Archivo conf.php no existe**: El archivo `vendor/tecnickcom/phpGrid_Lite/conf.php` no existe en el sistema
2. **Librería no instalada**: phpGrid_Lite no está instalada en el proyecto
3. **Vista usa dhtmlxGrid**: La vista realmente usa `grid_gpl` (dhtmlxGrid), no phpGrid_Lite

## Solución Implementada

### 1. Comentado el require innecesario

**Archivo**: `application/views/servicios/solicitudcons_v.php`

**Cambio**:
```php
// Antes:
require "vendor/tecnickcom/phpGrid_Lite/conf.php";

// Después:
// phpGrid_Lite conf.php - Comentado porque no existe, la vista usa dhtmlx grid (grid_gpl)
// require "vendor/tecnickcom/phpGrid_Lite/conf.php";
```

### 2. Agregado fallback para grid_gpl

La vista ahora verifica si los archivos de grid_gpl existen localmente, y si no, usa CDN de dhtmlxGrid:

```php
<?php if (file_exists(FCPATH . 'vendor/tecnickcom/grid_gpl/codebase/grid.js')): ?>
	<!-- Usar archivos locales -->
<?php else: ?>
	<!-- Usar CDN de dhtmlxGrid -->
	<script src="https://cdn.dhtmlx.com/grid/6.5.1/grid.min.js"></script>
	<link rel="stylesheet" href="https://cdn.dhtmlx.com/grid/6.5.1/grid.min.css">
<?php endif; ?>
```

## Nota

La vista `solicitudcons_v.php` usa **dhtmlxGrid** (grid_gpl), no phpGrid_Lite. El require de phpGrid_Lite era innecesario y causaba el error.

## Estado

✅ **CORREGIDO**

La vista ahora carga correctamente sin el error de phpGrid_Lite.

---

**Última actualización**: 2026-01-26
