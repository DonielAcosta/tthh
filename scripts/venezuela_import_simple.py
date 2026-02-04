#!/usr/bin/env python3
"""
Importar datos de Venezuela (estados, municipios, parroquias, ciudades) a PostgreSQL.
Configurado para la base de datos tthh.
Uso: python3 venezuela_import_simple.py [ruta/al/venezuela.json]

Si no tienes psycopg2, el script genera un .sql y lo ejecuta con psql (no requiere pip).
"""

import json
import os
import subprocess
import sys
import tempfile

USE_PSQL_FALLBACK = False
try:
    import psycopg2
except ImportError:
    USE_PSQL_FALLBACK = True

# Configuración para base de datos tthh (application/config/database.php)
DB_HOST = os.environ.get('DB_HOST', 'localhost')
DB_NAME = os.environ.get('DB_NAME', 'tthh')
DB_USER = os.environ.get('DB_USER', 'datasis')
DB_PASS = os.environ.get('DB_PASS', 'password')
DB_PORT = os.environ.get('DB_PORT', '5432')

SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
DEFAULT_JSON = os.path.join(SCRIPT_DIR, '..', 'storage', 'data', 'venezuela.json')


def esc_sql(s):
    """Escapar comilla simple para SQL."""
    if s is None:
        return 'NULL'
    return "'" + str(s).replace("'", "''") + "'"


def run_with_psql(datos):
    """Generar SQL y ejecutarlo con psql (sin necesidad de psycopg2)."""
    with tempfile.NamedTemporaryFile(mode='w', suffix='.sql', delete=False, encoding='utf-8') as f:
        f.write("-- Import Venezuela\nBEGIN;\n\n")
        # Estados
        for e in datos:
            f.write(
                "INSERT INTO estados (id_estado, iso_31662, nombre, capital)\n"
                "VALUES ({}, {}, {}, {})\n"
                "ON CONFLICT (id_estado) DO UPDATE SET iso_31662 = EXCLUDED.iso_31662, nombre = EXCLUDED.nombre, capital = EXCLUDED.capital;\n".format(
                    e['id_estado'], esc_sql(e.get('iso_31662')), esc_sql(e.get('estado')), esc_sql(e.get('capital'))
                )
            )
        f.write("\n")
        # Municipios y parroquias
        for e in datos:
            id_estado = e['id_estado']
            for m in e.get('municipios', []):
                nom_mun = m.get('municipio') or m.get('nombre')
                cap_mun = m.get('capital') or ''
                f.write(
                    "INSERT INTO municipios (id_estado, nombre, capital)\n"
                    "VALUES ({}, {}, {})\n"
                    "ON CONFLICT (id_estado, nombre) DO UPDATE SET capital = EXCLUDED.capital;\n".format(
                        id_estado, esc_sql(nom_mun), esc_sql(cap_mun)
                    )
                )
                for p in m.get('parroquias', []):
                    nom_par = p if isinstance(p, str) else p.get('nombre', '')
                    f.write(
                        "INSERT INTO parroquias (id_municipio, nombre)\n"
                        "SELECT id_municipio, {} FROM municipios WHERE id_estado = {} AND nombre = {} LIMIT 1\n"
                        "ON CONFLICT (id_municipio, nombre) DO NOTHING;\n".format(
                            esc_sql(nom_par), id_estado, esc_sql(nom_mun)
                        )
                    )
        # Ciudades
        for e in datos:
            id_estado = e['id_estado']
            for c in e.get('ciudades', []):
                nom_ciudad = c if isinstance(c, str) else c.get('nombre', '')
                f.write(
                    "INSERT INTO ciudades (id_estado, nombre)\n"
                    "VALUES ({}, {})\n"
                    "ON CONFLICT (id_estado, nombre) DO NOTHING;\n".format(id_estado, esc_sql(nom_ciudad))
                )
        f.write("\nCOMMIT;\n")
        sql_path = f.name

    env = os.environ.copy()
    env['PGPASSWORD'] = DB_PASS
    cmd = [
        'psql', '-h', DB_HOST, '-p', DB_PORT, '-U', DB_USER, '-d', DB_NAME,
        '-v', 'ON_ERROR_STOP=1', '-f', sql_path
    ]
    try:
        r = subprocess.run(cmd, env=env, capture_output=True, text=True, timeout=300)
        os.unlink(sql_path)
        if r.returncode != 0:
            print(r.stderr or r.stdout)
            return False
        return True
    except FileNotFoundError:
        print("✗ No se encontró 'psql'. Instala el cliente PostgreSQL o usa: pip install psycopg2-binary")
        return False
    except Exception as e:
        if os.path.isfile(sql_path):
            os.unlink(sql_path)
        print(f"✗ Error: {e}")
        return False


def main():
    json_file = sys.argv[1] if len(sys.argv) > 1 else os.environ.get('VENEZUELA_JSON', DEFAULT_JSON)
    json_file = os.path.abspath(json_file)

    print("\n" + "="*50)
    print("IMPORTACIÓN DE DATOS DE VENEZUELA → tthh")
    print("="*50)

    if not os.path.isfile(json_file):
        print(f"\n✗ No se encontró el archivo: {json_file}")
        sys.exit(1)

    print(f"\n→ JSON: {json_file}")
    with open(json_file, 'r', encoding='utf-8') as f:
        datos = json.load(f)
    print(f"✓ Cargados {len(datos)} estados")

    if USE_PSQL_FALLBACK:
        print("\n→ (Usando psql; no está instalado psycopg2)")
        print("→ Generando SQL y ejecutando con psql...")
        if run_with_psql(datos):
            print("\n✓ Importación completada con psql\n")
        else:
            sys.exit(1)
        return

    print("\n→ Conectando a PostgreSQL (tthh)...")
    try:
        conn = psycopg2.connect(
            host=DB_HOST,
            database=DB_NAME,
            user=DB_USER,
            password=DB_PASS,
            port=int(DB_PORT)
        )
        cursor = conn.cursor()
        print("✓ Conectado")
    except Exception as e:
        print(f"✗ Error de conexión: {e}")
        sys.exit(1)

    try:
        print("\n→ Insertando estados...")
        for estado in datos:
            cursor.execute("""
                INSERT INTO estados (id_estado, iso_31662, nombre, capital)
                VALUES (%s, %s, %s, %s)
                ON CONFLICT (id_estado) DO UPDATE SET
                    iso_31662 = EXCLUDED.iso_31662,
                    nombre = EXCLUDED.nombre,
                    capital = EXCLUDED.capital
            """, (
                estado['id_estado'],
                estado['iso_31662'],
                estado['estado'],
                estado['capital']
            ))
        conn.commit()
        print(f"✓ {len(datos)} estados")

        print("\n→ Insertando municipios y parroquias...")
        municipios_count = parroquias_count = 0
        for estado in datos:
            id_estado = estado['id_estado']
            for municipio in estado.get('municipios', []):
                cursor.execute("""
                    INSERT INTO municipios (id_estado, nombre, capital)
                    VALUES (%s, %s, %s)
                    ON CONFLICT (id_estado, nombre) DO UPDATE SET capital = EXCLUDED.capital
                    RETURNING id_municipio
                """, (id_estado, municipio['municipio'], municipio['capital']))
                id_municipio = cursor.fetchone()[0]
                municipios_count += 1
                for parroquia in municipio.get('parroquias', []):
                    cursor.execute("""
                        INSERT INTO parroquias (id_municipio, nombre)
                        VALUES (%s, %s)
                        ON CONFLICT (id_municipio, nombre) DO NOTHING
                    """, (id_municipio, parroquia))
                    parroquias_count += 1
        conn.commit()
        print(f"✓ {municipios_count} municipios, {parroquias_count} parroquias")

        print("\n→ Insertando ciudades...")
        ciudades_count = 0
        for estado in datos:
            id_estado = estado['id_estado']
            for ciudad in estado.get('ciudades', []):
                cursor.execute("""
                    INSERT INTO ciudades (id_estado, nombre)
                    VALUES (%s, %s)
                    ON CONFLICT (id_estado, nombre) DO NOTHING
                """, (id_estado, ciudad))
                ciudades_count += 1
        conn.commit()
        print(f"✓ {ciudades_count} ciudades")

        print("\n" + "="*50)
        print("RESUMEN")
        print("="*50)
        for tabla in ['estados', 'municipios', 'parroquias', 'ciudades']:
            cursor.execute(f"SELECT COUNT(*) FROM {tabla}")
            print(f"  {tabla}: {cursor.fetchone()[0]}")
        print("="*50)
        print("✓ Importación completada\n")
    except Exception as e:
        print(f"\n✗ Error: {e}")
        conn.rollback()
        sys.exit(1)
    finally:
        cursor.close()
        conn.close()


if __name__ == "__main__":
    main()
