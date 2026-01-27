<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-04-26 13:24:41 --> Severity: error --> Exception: Call to undefined function pg_connect() C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 154
ERROR - 2020-04-26 13:31:01 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.102.8&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 154
ERROR - 2020-04-26 13:31:01 --> Unable to connect to the database
ERROR - 2020-04-26 14:17:51 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM &quot;usuario_view&quot;
             ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 14:17:51 --> Query error: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM "usuario_view"
             ^ - Invalid query: SELECT *
FROM "usuario_view"
WHERE "correo" = '15921341@demo.com'
AND "clave" = 'e10adc3949ba59abbe56e057f20f883e'
 LIMIT 1
ERROR - 2020-04-26 15:03:07 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM &quot;usuario_view&quot;
             ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:03:07 --> Query error: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM "usuario_view"
             ^ - Invalid query: SELECT *
FROM "usuario_view"
WHERE "correo" = '15921341@demo.com'
AND "clave" = 'e10adc3949ba59abbe56e057f20f883e'
 LIMIT 1
ERROR - 2020-04-26 15:08:05 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM &quot;usuario_view&quot;
             ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:08:05 --> Query error: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM "usuario_view"
             ^ - Invalid query: SELECT *
FROM "usuario_view"
WHERE "correo" = '15921341@demo.com'
AND "clave" = 'e10adc3949ba59abbe56e057f20f883e'
 LIMIT 1
ERROR - 2020-04-26 15:19:23 --> Severity: Notice --> Undefined property: Usuario_c::$vistaa C:\xampp7\htdocs\tthh\system\core\Model.php 77
ERROR - 2020-04-26 15:19:23 --> Severity: Warning --> pg_query(): Query failed: ERROR:  SELECT * sin especificar tablas no es válido
LINE 1: SELECT *
               ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:19:23 --> Query error: ERROR:  SELECT * sin especificar tablas no es válido
LINE 1: SELECT *
               ^ - Invalid query: SELECT *
WHERE "correo" = '15921341@demo.com'
AND "clave" = 'e10adc3949ba59abbe56e057f20f883e'
 LIMIT 1
ERROR - 2020-04-26 15:19:41 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM &quot;usuario_view&quot;
             ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:19:41 --> Query error: ERROR:  no existe la relación «usuario_view»
LINE 2: FROM "usuario_view"
             ^ - Invalid query: SELECT *
FROM "usuario_view"
WHERE "correo" = '15921341@demo.com'
AND "clave" = 'e10adc3949ba59abbe56e057f20f883e'
 LIMIT 1
ERROR - 2020-04-26 15:31:51 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario»
LINE 22:    FROM usuario a
                 ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:31:51 --> Query error: ERROR:  no existe la relación «usuario»
LINE 22:    FROM usuario a
                 ^ - Invalid query: SELECT a.id,
    a.persona_fk,
    a.rol_fk,
    a.clave,
    a.correo_clave,
    a.correo_chk,
    a.ultimo_acceso,
    b.nacionalidad,
    b.cedula,
    b.nombre1,
    b.nombre2,
    b.apellido1,
    b.apellido2,
    b.correo,
    b.telefono,
    c.rol,
    c.admin,
    c.add,
    c.upd,
    c.del,
    c.menu
   FROM usuario a
     JOIN persona b ON a.persona_fk = b.id
     JOIN rol c ON a.rol_fk = c.id
  ORDER BY b.apellido1, b.apellido2, b.nombre1, b.nombre2
		
ERROR - 2020-04-26 15:32:28 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario»
LINE 2:    FROM usuario
                ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:32:28 --> Query error: ERROR:  no existe la relación «usuario»
LINE 2:    FROM usuario
                ^ - Invalid query: SELECT *
   FROM usuario
		
ERROR - 2020-04-26 15:32:49 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «'usuario'»
LINE 2:    FROM 'usuario'
                ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:32:49 --> Query error: ERROR:  error de sintaxis en o cerca de «'usuario'»
LINE 2:    FROM 'usuario'
                ^ - Invalid query: SELECT *
   FROM 'usuario'
		
ERROR - 2020-04-26 15:33:46 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «public.usuario»
LINE 2:    FROM public.usuario
                ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:33:46 --> Query error: ERROR:  no existe la relación «public.usuario»
LINE 2:    FROM public.usuario
                ^ - Invalid query: SELECT *
   FROM public.usuario
		
ERROR - 2020-04-26 15:38:56 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «public.usuario»
LINE 2:    FROM public.usuario
                ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:38:56 --> Query error: ERROR:  no existe la relación «public.usuario»
LINE 2:    FROM public.usuario
                ^ - Invalid query: SELECT *
   FROM public.usuario
		
ERROR - 2020-04-26 15:39:21 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «usuario»
LINE 2:    FROM usuario
                ^ C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-04-26 15:39:21 --> Query error: ERROR:  no existe la relación «usuario»
LINE 2:    FROM usuario
                ^ - Invalid query: SELECT *
   FROM usuario
		
ERROR - 2020-04-26 16:21:07 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: could not translate host name &quot;localhost:5433&quot; to address: Unknown host C:\xampp7\htdocs\tthh\system\database\drivers\postgre\postgre_driver.php 154
ERROR - 2020-04-26 16:21:07 --> Unable to connect to the database
ERROR - 2020-04-26 16:21:45 --> Severity: Notice --> Undefined property: stdClass::$apellido1 C:\xampp7\htdocs\tthh\application\models\Usuario_m.php 253
ERROR - 2020-04-26 16:21:45 --> Severity: Notice --> Undefined property: stdClass::$nombre1 C:\xampp7\htdocs\tthh\application\models\Usuario_m.php 253
ERROR - 2020-04-26 16:21:45 --> Severity: Notice --> Undefined property: stdClass::$rol C:\xampp7\htdocs\tthh\application\models\Usuario_m.php 254
ERROR - 2020-04-26 16:23:13 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:25:32 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:25:36 --> Severity: Warning --> include(C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php): failed to open stream: No such file or directory C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:25:36 --> Severity: Warning --> include(): Failed opening 'C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php' for inclusion (include_path='C:\xampp7\php\PEAR') C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:25:36 --> Severity: Error --> Class 'TCPDF' not found C:\xampp7\htdocs\tthh\application\libraries\Pdf.php 7
ERROR - 2020-04-26 16:25:52 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:26:08 --> Severity: Warning --> include(C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php): failed to open stream: No such file or directory C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:26:08 --> Severity: Warning --> include(): Failed opening 'C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php' for inclusion (include_path='C:\xampp7\php\PEAR') C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:26:08 --> Severity: Error --> Class 'TCPDF' not found C:\xampp7\htdocs\tthh\application\libraries\Pdf.php 7
ERROR - 2020-04-26 16:26:15 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:26:21 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:26:26 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:26:47 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 16:27:00 --> Severity: Warning --> include(C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php): failed to open stream: No such file or directory C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:27:00 --> Severity: Warning --> include(): Failed opening 'C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php' for inclusion (include_path='C:\xampp7\php\PEAR') C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:27:00 --> Severity: Error --> Class 'TCPDF' not found C:\xampp7\htdocs\tthh\application\libraries\Pdf.php 7
ERROR - 2020-04-26 16:27:13 --> Severity: Warning --> include(C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php): failed to open stream: No such file or directory C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:27:13 --> Severity: Warning --> include(): Failed opening 'C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php' for inclusion (include_path='C:\xampp7\php\PEAR') C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 444
ERROR - 2020-04-26 16:27:13 --> Severity: Error --> Class 'TCPDF' not found C:\xampp7\htdocs\tthh\application\libraries\Pdf.php 7
ERROR - 2020-04-26 16:29:56 --> Severity: Warning --> include(C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php): failed to open stream: No such file or directory C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 445
ERROR - 2020-04-26 16:29:56 --> Severity: Warning --> include(): Failed opening 'C:\xampp7\htdocs\tthh\vendor\composer/../tecnickcom/tcpdf/tcpdf.php' for inclusion (include_path='C:\xampp7\php\PEAR') C:\xampp7\htdocs\tthh\vendor\composer\ClassLoader.php 445
ERROR - 2020-04-26 16:29:56 --> Severity: Error --> Class 'TCPDF' not found C:\xampp7\htdocs\tthh\application\libraries\Pdf.php 7
ERROR - 2020-04-26 16:56:28 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp7\htdocs\tthh\vendor\composer\autoload_static.php 7
ERROR - 2020-04-26 17:06:49 --> Severity: error --> Exception: Call to undefined function dump() C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 72
ERROR - 2020-04-26 17:15:00 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:15:07 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:16:04 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:16:06 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:16:15 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:16:34 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:18:13 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:19:23 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:19:27 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:20:11 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 17:56:34 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 22:04:07 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Undefined offset: 0 C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 72
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 100
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 105
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 105
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 110
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 110
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 115
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 120
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 125
ERROR - 2020-04-26 22:10:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp7\htdocs\tthh\application\controllers\Trabajador_c.php 130
ERROR - 2020-04-26 22:10:57 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 22:11:01 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-04-26 22:16:37 --> 404 Page Not Found: Vendor/almasaeed2010
