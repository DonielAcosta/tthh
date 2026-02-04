# Base de datos territorial Venezuela (tthh)

Esquema de división político-territorial de Venezuela instalado en la base de datos **tthh**.

## Estructura

- **estados** (24) → **municipios** (335) → **parroquias** (1.136)  
- **estados** → **ciudades**

## Archivos en este directorio

| Archivo | Descripción |
|---------|-------------|
| `venezuela_territorial_schema.sql` | Schema ejecutado (tablas, índices, vistas, funciones, triggers). |
| `venezuela_consultas_ejemplo.sql` | Consultas de ejemplo para explorar los datos. |

## Cargar los datos (estados, municipios, parroquias, ciudades)

El esquema ya está instalado; las tablas están vacías hasta que importes el JSON.

1. **Obtener el archivo JSON** con la estructura territorial (por ejemplo `venezuela.json` con la forma que esperan los scripts del paquete original).

2. **Colocar el JSON** en `storage/data/venezuela.json` o en la ruta que quieras.

3. **Instalar dependencia Python** (si no la tienes):
   ```bash
   pip install psycopg2-binary
   ```

4. **Ejecutar el script de importación** desde la raíz del proyecto:
   ```bash
   cd /var/www/html/tthh/scripts
   python venezuela_import_simple.py
   ```
   O indicando la ruta del JSON:
   ```bash
   python venezuela_import_simple.py /ruta/a/venezuela.json
   ```

   Variables de entorno opcionales: `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, `DB_PORT`, `VENEZUELA_JSON`.

## Consultas útiles (tras cargar datos)

```sql
-- Estados
SELECT * FROM estados ORDER BY nombre;

-- Municipios de un estado
SELECT * FROM municipios WHERE id_estado = (SELECT id_estado FROM estados WHERE nombre = 'Miranda') ORDER BY nombre;

-- Parroquias de un municipio
SELECT * FROM parroquias WHERE id_municipio = 1 ORDER BY nombre;

-- Vista jerárquica
SELECT * FROM vista_jerarquia_territorial WHERE estado = 'Miranda';

-- Buscar territorio
SELECT * FROM buscar_territorio('San');
SELECT * FROM obtener_jerarquia_parroquia(1);
```

Más ejemplos en `venezuela_consultas_ejemplo.sql`.
