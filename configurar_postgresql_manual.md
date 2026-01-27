# Guía para instalar y configurar PostgreSQL

## Paso 1: Instalar PostgreSQL

Ejecuta los siguientes comandos en la terminal:

```bash
sudo apt update
sudo apt install -y postgresql postgresql-contrib
```

## Paso 2: Iniciar el servicio

```bash
sudo systemctl start postgresql
sudo systemctl enable postgresql
```

## Paso 3: Verificar que está corriendo

```bash
sudo systemctl status postgresql
```

## Paso 4: Configurar PostgreSQL para aceptar conexiones TCP/IP

### 4.1 Editar postgresql.conf

Primero, encuentra la versión de PostgreSQL instalada:
```bash
ls /etc/postgresql/
```

Luego edita el archivo de configuración (reemplaza X.X con tu versión):
```bash
sudo nano /etc/postgresql/X.X/main/postgresql.conf
```

Busca la línea:
```
#listen_addresses = 'localhost'
```

Y cámbiala por:
```
listen_addresses = '*'
```

Guarda el archivo (Ctrl+O, Enter, Ctrl+X)

### 4.2 Editar pg_hba.conf

```bash
sudo nano /etc/postgresql/X.X/main/pg_hba.conf
```

Agrega al final del archivo:
```
# Permitir conexiones desde cualquier host
host    all             all             0.0.0.0/0               md5
```

Guarda el archivo.

## Paso 5: Reiniciar PostgreSQL

```bash
sudo systemctl restart postgresql
```

## Paso 6: Crear la base de datos tthh

```bash
sudo -u postgres psql -c "CREATE DATABASE tthh;"
```

## Paso 7: (Opcional) Crear un usuario específico

```bash
# Crear usuario
sudo -u postgres psql -c "CREATE USER tu_usuario WITH PASSWORD 'tu_contraseña';"

# Dar permisos
sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE tthh TO tu_usuario;"
```

## Paso 8: Configurar DBeaver

1. Abre DBeaver
2. Clic en "Nueva conexión" (icono de enchufe)
3. Selecciona "PostgreSQL"
4. Configuración:
   - **Host**: localhost
   - **Puerto**: 5432
   - **Base de datos**: tthh
   - **Usuario**: postgres (o el usuario que creaste)
   - **Contraseña**: (la contraseña del usuario)
5. Clic en "Test Connection" para verificar
6. Clic en "Finish"

## Solución de problemas

### Si sigue dando error de conexión:

1. Verifica que el servicio esté corriendo:
   ```bash
   sudo systemctl status postgresql
   ```

2. Verifica que el puerto esté escuchando:
   ```bash
   sudo netstat -tlnp | grep 5432
   ```

3. Verifica el firewall:
   ```bash
   sudo ufw status
   sudo ufw allow 5432/tcp
   ```

4. Revisa los logs de PostgreSQL:
   ```bash
   sudo tail -f /var/log/postgresql/postgresql-X.X-main.log
   ```

### Cambiar contraseña del usuario postgres:

```bash
sudo -u postgres psql
ALTER USER postgres WITH PASSWORD 'nueva_contraseña';
\q
```
