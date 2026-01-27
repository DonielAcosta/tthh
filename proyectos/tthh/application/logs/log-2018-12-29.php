<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-29 15:15:37 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19131) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-12-29 15:15:37 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19131) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19131',  E'{"fecha":"29\\/12\\/2018","ingreso":"7.968,58","ct":"180,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'eHCh2')
ERROR - 2018-12-29 15:45:12 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19322) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-12-29 15:45:12 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19322) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19322',  E'{"fecha":"29\\/12\\/2018","ingreso":"1.386,00","ct":"180,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'idIO0')
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2018-12-29 16:29:15 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2018-12-29 16:29:15 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (216, null, {&quot;fecha&quot;:&quot;29\/12\/2018&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., oQlND). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-12-29 16:29:15 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (216, null, {"fecha":"29\/12\/2018","ingreso":"0,00","ct":0,"avala":"ABG. AN..., oQlND). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"29\\/12\\/2018","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'oQlND')
ERROR - 2018-12-29 16:29:15 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2018-12-29 16:30:28 --> 404 Page Not Found: Trabajador_c/Trabajador_c
ERROR - 2018-12-29 23:44:40 --> 404 Page Not Found: Trabajador_c/Documento_TP_c
ERROR - 2018-12-29 23:45:01 --> 404 Page Not Found: Trabajador_c/Trabajador_c
ERROR - 2018-12-29 23:45:20 --> 404 Page Not Found: Trabajador_c/Documento_TP_c
