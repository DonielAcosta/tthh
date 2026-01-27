<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2020-12-17 19:00:32 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2020-12-17 19:00:32 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el valor null para la columna «trabajador_fk» viola la restricción not null
DETAIL:  La fila que falla contiene (12117, null, {&quot;fecha&quot;:&quot;17\/12\/2020&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., FjyeW). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-12-17 19:00:32 --> Query error: ERROR:  el valor null para la columna «trabajador_fk» viola la restricción not null
DETAIL:  La fila que falla contiene (12117, null, {"fecha":"17\/12\/2020","ingreso":"0,00","ct":0,"avala":"ABG. AN..., FjyeW). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"17\\/12\\/2020","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'FjyeW')
ERROR - 2020-12-17 19:00:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
