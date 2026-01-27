-- Script SQL para crear la base de datos tthh en PostgreSQL
-- Ejecutar como usuario postgres: psql -f crear_bd_tthh.sql

-- Crear la base de datos
CREATE DATABASE tthh
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'es_ES.UTF-8'
    LC_CTYPE = 'es_ES.UTF-8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

-- Comentario de la base de datos
COMMENT ON DATABASE tthh IS 'Base de datos tthh';

-- Conectarse a la base de datos para crear objetos adicionales
\c tthh

-- (Aquí puedes agregar tablas, secuencias, etc. según necesites)
