<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-02-02 01:15:42 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-02-02 01:15:42 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (2012, null, {&quot;fecha&quot;:&quot;02\/02\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., wFzbw). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-02-02 01:15:42 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (2012, null, {"fecha":"02\/02\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., wFzbw). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"02\\/02\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'wFzbw')
ERROR - 2019-02-02 01:15:42 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-02-02 02:57:30 --> 404 Page Not Found: Index2html/index
ERROR - 2019-02-02 08:10:10 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19740) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-02-02 08:10:10 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19740) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19740',  E'{"fecha":"02\\/02\\/2019","ingreso":"1.863,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'L2bba')
ERROR - 2019-02-02 10:18:50 --> 404 Page Not Found: Index2html/index
ERROR - 2019-02-02 10:20:49 --> 404 Page Not Found: Index2html/index
ERROR - 2019-02-02 10:21:44 --> 404 Page Not Found: Index2html/index
ERROR - 2019-02-02 13:23:00 --> 404 Page Not Found: Index2html/index
ERROR - 2019-02-02 14:15:25 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19919) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-02-02 14:15:26 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19919) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19919',  E'{"fecha":"02\\/02\\/2019","ingreso":"2.407,50","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'D4UDH')
ERROR - 2019-02-02 14:18:21 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19919) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-02-02 14:18:21 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19919) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19919',  E'{"fecha":"02\\/02\\/2019","ingreso":"2.407,50","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'agLGI')
ERROR - 2019-02-02 18:25:56 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-02-02 18:26:20 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-02-02 18:26:51 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-02-02 18:27:01 --> 404 Page Not Found: Vendor/almasaeed2010
