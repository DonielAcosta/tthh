-- ============================================================
-- CONSULTAS ÚTILES - BASE DE DATOS VENEZUELA
-- ============================================================

-- ============================================================
-- CONSULTAS BÁSICAS DE EXPLORACIÓN
-- ============================================================

-- 1. Ver todos los estados ordenados alfabéticamente
SELECT 
    id_estado,
    iso_31662,
    nombre,
    capital
FROM estados
ORDER BY nombre;

-- 2. Contar el total de registros en cada tabla
SELECT 
    'Estados' AS tabla,
    COUNT(*) AS total
FROM estados
UNION ALL
SELECT 
    'Municipios',
    COUNT(*)
FROM municipios
UNION ALL
SELECT 
    'Parroquias',
    COUNT(*)
FROM parroquias
UNION ALL
SELECT 
    'Ciudades',
    COUNT(*)
FROM ciudades;

-- 3. Ver los primeros 10 municipios con sus estados
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    m.capital AS capital_municipio
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
ORDER BY e.nombre, m.nombre
LIMIT 10;

-- ============================================================
-- CONSULTAS POR ESTADO
-- ============================================================

-- 4. Todos los municipios de Miranda
SELECT 
    m.nombre AS municipio,
    m.capital
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
WHERE e.nombre = 'Miranda'
ORDER BY m.nombre;

-- 5. Estados con más de 20 municipios
SELECT 
    e.nombre AS estado,
    COUNT(m.id_municipio) AS total_municipios
FROM estados e
INNER JOIN municipios m ON e.id_estado = m.id_estado
GROUP BY e.id_estado, e.nombre
HAVING COUNT(m.id_municipio) > 20
ORDER BY total_municipios DESC;

-- 6. Top 10 estados con más parroquias
SELECT 
    e.nombre AS estado,
    COUNT(DISTINCT m.id_municipio) AS municipios,
    COUNT(p.id_parroquia) AS parroquias
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
GROUP BY e.id_estado, e.nombre
ORDER BY parroquias DESC
LIMIT 10;

-- ============================================================
-- CONSULTAS JERÁRQUICAS
-- ============================================================

-- 7. Jerarquía completa de un estado específico (Ejemplo: Zulia)
SELECT 
    e.nombre AS estado,
    e.capital AS capital_estado,
    m.nombre AS municipio,
    m.capital AS capital_municipio,
    p.nombre AS parroquia
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
WHERE e.nombre = 'Zulia'
ORDER BY m.nombre, p.nombre;

-- 8. Encontrar todas las capitales de municipios llamadas "Caracas"
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    m.capital
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
WHERE m.capital ILIKE '%caracas%'
ORDER BY e.nombre;

-- 9. Parroquias que contienen "Bolívar" en su nombre
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    p.nombre AS parroquia
FROM parroquias p
INNER JOIN municipios m ON p.id_municipio = m.id_municipio
INNER JOIN estados e ON m.id_estado = e.id_estado
WHERE p.nombre ILIKE '%bolívar%'
ORDER BY e.nombre, m.nombre;

-- ============================================================
-- CONSULTAS DE BÚSQUEDA
-- ============================================================

-- 10. Buscar "San Juan" en cualquier nivel territorial
SELECT 
    'Estado' AS tipo,
    nombre,
    capital AS detalles,
    NULL AS pertenece_a
FROM estados
WHERE nombre ILIKE '%san juan%' OR capital ILIKE '%san juan%'

UNION ALL

SELECT 
    'Municipio' AS tipo,
    m.nombre,
    m.capital AS detalles,
    e.nombre AS pertenece_a
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
WHERE m.nombre ILIKE '%san juan%' OR m.capital ILIKE '%san juan%'

UNION ALL

SELECT 
    'Parroquia' AS tipo,
    p.nombre,
    m.nombre AS detalles,
    e.nombre AS pertenece_a
FROM parroquias p
INNER JOIN municipios m ON p.id_municipio = m.id_municipio
INNER JOIN estados e ON m.id_estado = e.id_estado
WHERE p.nombre ILIKE '%san juan%'

UNION ALL

SELECT 
    'Ciudad' AS tipo,
    c.nombre,
    e.capital AS detalles,
    e.nombre AS pertenece_a
FROM ciudades c
INNER JOIN estados e ON c.id_estado = e.id_estado
WHERE c.nombre ILIKE '%san juan%'
ORDER BY tipo, nombre;

-- 11. Municipios cuya capital es diferente de su nombre
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    m.capital
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
WHERE m.nombre != m.capital
ORDER BY e.nombre, m.nombre;

-- ============================================================
-- CONSULTAS ESTADÍSTICAS
-- ============================================================

-- 12. Distribución de municipios por estado
SELECT 
    e.nombre AS estado,
    COUNT(m.id_municipio) AS total_municipios,
    ROUND(COUNT(m.id_municipio) * 100.0 / SUM(COUNT(m.id_municipio)) OVER (), 2) AS porcentaje
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
GROUP BY e.id_estado, e.nombre
ORDER BY total_municipios DESC;

-- 13. Promedio de parroquias por municipio por estado
SELECT 
    e.nombre AS estado,
    COUNT(DISTINCT m.id_municipio) AS municipios,
    COUNT(p.id_parroquia) AS parroquias,
    ROUND(COUNT(p.id_parroquia)::NUMERIC / NULLIF(COUNT(DISTINCT m.id_municipio), 0), 2) AS promedio_parroquias_por_municipio
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
GROUP BY e.id_estado, e.nombre
ORDER BY promedio_parroquias_por_municipio DESC;

-- 14. Municipios con más parroquias
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    COUNT(p.id_parroquia) AS total_parroquias
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
GROUP BY e.nombre, m.id_municipio, m.nombre
ORDER BY total_parroquias DESC
LIMIT 15;

-- ============================================================
-- CONSULTAS DE CIUDADES
-- ============================================================

-- 15. Ver todas las ciudades por estado
SELECT 
    e.nombre AS estado,
    STRING_AGG(c.nombre, ', ' ORDER BY c.nombre) AS ciudades
FROM estados e
LEFT JOIN ciudades c ON e.id_estado = c.id_estado
GROUP BY e.id_estado, e.nombre
ORDER BY e.nombre;

-- 16. Estados sin ciudades registradas
SELECT 
    e.nombre AS estado,
    e.capital
FROM estados e
LEFT JOIN ciudades c ON e.id_estado = c.id_estado
WHERE c.id_ciudad IS NULL
ORDER BY e.nombre;

-- ============================================================
-- CONSULTAS DE VALIDACIÓN
-- ============================================================

-- 17. Verificar integridad: municipios sin parroquias
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    COUNT(p.id_parroquia) AS total_parroquias
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
GROUP BY e.nombre, m.id_municipio, m.nombre
HAVING COUNT(p.id_parroquia) = 0
ORDER BY e.nombre;

-- 18. Buscar nombres duplicados en parroquias
SELECT 
    p.nombre AS parroquia,
    COUNT(*) AS veces_repetido,
    STRING_AGG(DISTINCT e.nombre, ', ') AS estados
FROM parroquias p
INNER JOIN municipios m ON p.id_municipio = m.id_municipio
INNER JOIN estados e ON m.id_estado = e.id_estado
GROUP BY p.nombre
HAVING COUNT(*) > 1
ORDER BY veces_repetido DESC, parroquia;

-- ============================================================
-- CONSULTAS PARA REPORTES
-- ============================================================

-- 19. Reporte completo de un estado (ej: Carabobo)
WITH estado_info AS (
    SELECT 
        e.id_estado,
        e.nombre,
        e.capital,
        e.iso_31662
    FROM estados e
    WHERE e.nombre = 'Carabobo'
)
SELECT 
    ei.nombre AS estado,
    ei.iso_31662,
    ei.capital AS capital_estado,
    (SELECT COUNT(*) FROM municipios WHERE id_estado = ei.id_estado) AS total_municipios,
    (SELECT COUNT(*) FROM parroquias p 
     INNER JOIN municipios m ON p.id_municipio = m.id_municipio 
     WHERE m.id_estado = ei.id_estado) AS total_parroquias,
    (SELECT COUNT(*) FROM ciudades WHERE id_estado = ei.id_estado) AS total_ciudades
FROM estado_info ei;

-- 20. Lista de todos los municipios con su número de parroquias
SELECT 
    e.nombre AS estado,
    m.nombre AS municipio,
    m.capital,
    COUNT(p.id_parroquia) AS total_parroquias,
    STRING_AGG(p.nombre, ', ' ORDER BY p.nombre) AS parroquias
FROM municipios m
INNER JOIN estados e ON m.id_estado = e.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
GROUP BY e.nombre, m.id_municipio, m.nombre, m.capital
ORDER BY e.nombre, m.nombre;

-- ============================================================
-- CONSULTAS PARA EXPORTACIÓN
-- ============================================================

-- 21. Exportar jerarquía completa en formato CSV-friendly
SELECT 
    e.iso_31662,
    e.nombre AS estado,
    e.capital AS capital_estado,
    m.nombre AS municipio,
    m.capital AS capital_municipio,
    p.nombre AS parroquia
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
ORDER BY e.nombre, m.nombre, p.nombre;

-- 22. Obtener árbol de navegación para frontend
SELECT 
    json_build_object(
        'estado', e.nombre,
        'iso', e.iso_31662,
        'municipios', json_agg(
            json_build_object(
                'nombre', m.nombre,
                'capital', m.capital,
                'total_parroquias', (
                    SELECT COUNT(*) 
                    FROM parroquias 
                    WHERE id_municipio = m.id_municipio
                )
            ) ORDER BY m.nombre
        )
    ) AS estructura
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
GROUP BY e.id_estado, e.nombre, e.iso_31662
ORDER BY e.nombre;

-- ============================================================
-- CONSULTAS DE ANÁLISIS GEOGRÁFICO
-- ============================================================

-- 23. Estados fronterizos o costeros (basado en nombres)
SELECT 
    nombre,
    capital,
    CASE 
        WHEN nombre IN ('Zulia', 'Táchira', 'Apure', 'Amazonas', 'Bolívar', 'Delta Amacuro') 
            THEN 'Fronterizo'
        WHEN nombre IN ('Nueva Esparta', 'Vargas', 'Falcón', 'Carabobo', 'Aragua', 'Miranda', 'Anzoátegui', 'Sucre', 'Monagas', 'Delta Amacuro', 'Zulia')
            THEN 'Costero'
        ELSE 'Interior'
    END AS tipo
FROM estados
ORDER BY tipo, nombre;

-- 24. Resumen general de la división territorial
SELECT 
    'Total Estados' AS categoria,
    COUNT(*)::TEXT AS valor
FROM estados
UNION ALL
SELECT 
    'Total Municipios',
    COUNT(*)::TEXT
FROM municipios
UNION ALL
SELECT 
    'Total Parroquias',
    COUNT(*)::TEXT
FROM parroquias
UNION ALL
SELECT 
    'Total Ciudades Registradas',
    COUNT(*)::TEXT
FROM ciudades
UNION ALL
SELECT 
    'Estado con más Municipios',
    e.nombre || ' (' || COUNT(m.id_municipio)::TEXT || ')'
FROM estados e
INNER JOIN municipios m ON e.id_estado = m.id_estado
GROUP BY e.nombre
ORDER BY COUNT(m.id_municipio) DESC
LIMIT 1;
