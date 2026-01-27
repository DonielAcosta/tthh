<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-12-14 02:40:09 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-12-14 02:40:09 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (9661, null, {&quot;fecha&quot;:&quot;14\/12\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., EqQym). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-12-14 02:40:09 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (9661, null, {"fecha":"14\/12\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., EqQym). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"14\\/12\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'EqQym')
ERROR - 2019-12-14 02:40:09 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-12-14 03:29:31 --> 404 Page Not Found: Trabajador_c/Documento_TP_c
ERROR - 2019-12-14 03:30:05 --> 404 Page Not Found: Trabajador_c/Documento_OD_c
ERROR - 2019-12-14 03:41:49 --> 404 Page Not Found: Trabajador_c/Documento_c
ERROR - 2019-12-14 03:41:53 --> 404 Page Not Found: Trabajador_c/Documento_c
ERROR - 2019-12-14 03:44:32 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21043) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-12-14 03:44:32 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21043) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21043',  E'{"fecha":"14\\/12\\/2019","ingreso":"721.200,00","ct":"150.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'euGhv')
ERROR - 2019-12-14 03:46:05 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21043) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-12-14 03:46:05 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21043) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21043',  E'{"fecha":"14\\/12\\/2019","ingreso":"721.200,00","ct":"150.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'vStXJ')
ERROR - 2019-12-14 03:49:13 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21043) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-12-14 03:49:13 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21043) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21043',  E'{"fecha":"14\\/12\\/2019","ingreso":"721.200,00","ct":"150.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '5YuHS')
ERROR - 2019-12-14 17:02:58 --> 404 Page Not Found: Index2html/index
ERROR - 2019-12-14 17:03:04 --> 404 Page Not Found: Index2html/index
ERROR - 2019-12-14 23:38:53 --> Severity: Warning --> fsockopen(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/libraries/Email.php 2055
ERROR - 2019-12-14 23:38:53 --> Severity: Warning --> fsockopen(): unable to connect to ssl://smtp.gmail.com:465 (php_network_getaddresses: getaddrinfo failed: Name or service not known) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/libraries/Email.php 2055
