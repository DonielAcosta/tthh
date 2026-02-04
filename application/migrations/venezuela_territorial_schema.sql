-- ============================================================
-- ESQUEMA DE BASE DE DATOS PARA DATOS DE VENEZUELA
-- Sistema de División Político-Territorial
-- Instalado en base de datos tthh
-- ============================================================

-- ============================================================
-- TABLA: estados
-- Almacena los 24 estados de Venezuela
-- ============================================================
CREATE TABLE IF NOT EXISTS estados (
    id_estado INTEGER PRIMARY KEY,
    iso_31662 VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    capital VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

COMMENT ON TABLE estados IS 'Estados de Venezuela';
COMMENT ON COLUMN estados.id_estado IS 'ID único del estado';
COMMENT ON COLUMN estados.iso_31662 IS 'Código ISO 3166-2 (ej: VE-A)';
COMMENT ON COLUMN estados.nombre IS 'Nombre del estado';
COMMENT ON COLUMN estados.capital IS 'Capital del estado';

-- ============================================================
-- TABLA: municipios
-- Almacena los municipios por estado
-- ============================================================
CREATE TABLE IF NOT EXISTS municipios (
    id_municipio SERIAL PRIMARY KEY,
    id_estado INTEGER NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    capital VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_municipio_estado
        FOREIGN KEY (id_estado)
        REFERENCES estados(id_estado)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT uk_municipio_estado
        UNIQUE(id_estado, nombre)
);

COMMENT ON TABLE municipios IS 'Municipios de Venezuela organizados por estado';

-- ============================================================
-- TABLA: parroquias
-- Almacena las parroquias por municipio
-- ============================================================
CREATE TABLE IF NOT EXISTS parroquias (
    id_parroquia SERIAL PRIMARY KEY,
    id_municipio INTEGER NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_parroquia_municipio
        FOREIGN KEY (id_municipio)
        REFERENCES municipios(id_municipio)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT uk_parroquia_municipio
        UNIQUE(id_municipio, nombre)
);

COMMENT ON TABLE parroquias IS 'Parroquias de Venezuela organizadas por municipio';

-- ============================================================
-- TABLA: ciudades
-- Almacena las ciudades principales por estado
-- ============================================================
CREATE TABLE IF NOT EXISTS ciudades (
    id_ciudad SERIAL PRIMARY KEY,
    id_estado INTEGER NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_ciudad_estado
        FOREIGN KEY (id_estado)
        REFERENCES estados(id_estado)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT uk_ciudad_estado
        UNIQUE(id_estado, nombre)
);

COMMENT ON TABLE ciudades IS 'Ciudades principales de Venezuela organizadas por estado';

-- ============================================================
-- ÍNDICES
-- ============================================================
CREATE INDEX IF NOT EXISTS idx_municipios_estado ON municipios(id_estado);
CREATE INDEX IF NOT EXISTS idx_parroquias_municipio ON parroquias(id_municipio);
CREATE INDEX IF NOT EXISTS idx_ciudades_estado ON ciudades(id_estado);
CREATE INDEX IF NOT EXISTS idx_estados_iso ON estados(iso_31662);
CREATE INDEX IF NOT EXISTS idx_estados_nombre ON estados(nombre);
CREATE INDEX IF NOT EXISTS idx_municipios_nombre ON municipios(nombre);
CREATE INDEX IF NOT EXISTS idx_parroquias_nombre ON parroquias(nombre);
CREATE INDEX IF NOT EXISTS idx_ciudades_nombre ON ciudades(nombre);

-- ============================================================
-- VISTAS
-- ============================================================
CREATE OR REPLACE VIEW vista_jerarquia_territorial AS
SELECT
    e.id_estado,
    e.nombre AS estado,
    e.iso_31662,
    e.capital AS capital_estado,
    m.id_municipio,
    m.nombre AS municipio,
    m.capital AS capital_municipio,
    p.id_parroquia,
    p.nombre AS parroquia
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
ORDER BY e.nombre, m.nombre, p.nombre;

CREATE OR REPLACE VIEW vista_resumen_estados AS
SELECT
    e.id_estado,
    e.nombre AS estado,
    e.iso_31662,
    e.capital,
    COUNT(DISTINCT m.id_municipio) AS total_municipios,
    COUNT(DISTINCT p.id_parroquia) AS total_parroquias,
    COUNT(DISTINCT c.id_ciudad) AS total_ciudades
FROM estados e
LEFT JOIN municipios m ON e.id_estado = m.id_estado
LEFT JOIN parroquias p ON m.id_municipio = p.id_municipio
LEFT JOIN ciudades c ON e.id_estado = c.id_estado
GROUP BY e.id_estado, e.nombre, e.iso_31662, e.capital
ORDER BY e.nombre;

-- ============================================================
-- FUNCIONES
-- ============================================================
CREATE OR REPLACE FUNCTION obtener_jerarquia_parroquia(p_id_parroquia INTEGER)
RETURNS TABLE (
    estado VARCHAR(100),
    municipio VARCHAR(100),
    parroquia VARCHAR(200)
) AS $$
BEGIN
    RETURN QUERY
    SELECT
        e.nombre AS estado,
        m.nombre AS municipio,
        p.nombre AS parroquia
    FROM parroquias p
    INNER JOIN municipios m ON p.id_municipio = m.id_municipio
    INNER JOIN estados e ON m.id_estado = e.id_estado
    WHERE p.id_parroquia = p_id_parroquia;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION buscar_territorio(p_termino VARCHAR)
RETURNS TABLE (
    tipo VARCHAR(20),
    nombre VARCHAR(200),
    pertenece_a VARCHAR(100)
) AS $$
BEGIN
    RETURN QUERY
    SELECT 'Estado'::VARCHAR(20), e.nombre, ''::VARCHAR(100)
    FROM estados e WHERE e.nombre ILIKE '%' || p_termino || '%'
    UNION ALL
    SELECT 'Municipio'::VARCHAR(20), m.nombre, e.nombre
    FROM municipios m INNER JOIN estados e ON m.id_estado = e.id_estado
    WHERE m.nombre ILIKE '%' || p_termino || '%'
    UNION ALL
    SELECT 'Parroquia'::VARCHAR(20), p.nombre, m.nombre
    FROM parroquias p INNER JOIN municipios m ON p.id_municipio = m.id_municipio
    WHERE p.nombre ILIKE '%' || p_termino || '%'
    UNION ALL
    SELECT 'Ciudad'::VARCHAR(20), c.nombre, e.nombre
    FROM ciudades c INNER JOIN estados e ON c.id_estado = e.id_estado
    WHERE c.nombre ILIKE '%' || p_termino || '%';
END;
$$ LANGUAGE plpgsql;

-- ============================================================
-- TRIGGERS (EXECUTE PROCEDURE para compatibilidad PostgreSQL)
-- ============================================================
CREATE OR REPLACE FUNCTION actualizar_timestamp()
RETURNS TRIGGER AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS trigger_estados_updated_at ON estados;
CREATE TRIGGER trigger_estados_updated_at
    BEFORE UPDATE ON estados FOR EACH ROW EXECUTE PROCEDURE actualizar_timestamp();

DROP TRIGGER IF EXISTS trigger_municipios_updated_at ON municipios;
CREATE TRIGGER trigger_municipios_updated_at
    BEFORE UPDATE ON municipios FOR EACH ROW EXECUTE PROCEDURE actualizar_timestamp();

DROP TRIGGER IF EXISTS trigger_parroquias_updated_at ON parroquias;
CREATE TRIGGER trigger_parroquias_updated_at
    BEFORE UPDATE ON parroquias FOR EACH ROW EXECUTE PROCEDURE actualizar_timestamp();

DROP TRIGGER IF EXISTS trigger_ciudades_updated_at ON ciudades;
CREATE TRIGGER trigger_ciudades_updated_at
    BEFORE UPDATE ON ciudades FOR EACH ROW EXECUTE PROCEDURE actualizar_timestamp();
