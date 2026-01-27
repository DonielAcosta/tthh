<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-16 00:30:56 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 02:54:39 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-16 08:15:53 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19740) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 08:15:53 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19740) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19740',  E'{"fecha":"16\\/01\\/2019","ingreso":"1.863,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'slmJz')
ERROR - 2019-01-16 12:19:20 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-01-16 12:21:16 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-01-16 12:21:16 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (1185, null, {&quot;fecha&quot;:&quot;16\/01\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., HQghf). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 12:21:16 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (1185, null, {"fecha":"16\/01\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., HQghf). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'HQghf')
ERROR - 2019-01-16 12:21:16 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-01-16 12:24:07 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-01-16 12:24:07 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (1186, null, {&quot;fecha&quot;:&quot;16\/01\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., JvXP7). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 12:24:07 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (1186, null, {"fecha":"16\/01\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., JvXP7). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'JvXP7')
ERROR - 2019-01-16 12:24:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-01-16 12:36:07 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-01-16 12:36:07 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (1187, null, {&quot;fecha&quot;:&quot;16\/01\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., 5UOFb). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 12:36:07 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (1187, null, {"fecha":"16\/01\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., 5UOFb). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '5UOFb')
ERROR - 2019-01-16 12:36:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-01-16 12:37:21 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-01-16 12:37:21 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (1188, null, {&quot;fecha&quot;:&quot;16\/01\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., McCxj). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 12:37:21 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (1188, null, {"fecha":"16\/01\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., McCxj). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'McCxj')
ERROR - 2019-01-16 12:37:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-01-16 13:31:31 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19490) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 13:31:31 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19490) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19490',  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'fGqkB')
ERROR - 2019-01-16 13:31:49 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19490) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 13:31:49 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19490) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19490',  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'Cs1tf')
ERROR - 2019-01-16 13:32:14 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19490) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 13:32:14 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19490) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19490',  E'{"fecha":"16\\/01\\/2019","ingreso":"0,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '6HvhB')
ERROR - 2019-01-16 14:55:39 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 14:58:01 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 14:58:07 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 14:58:19 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 14:59:16 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 14:59:23 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 15:00:16 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19134) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 15:00:16 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19134) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19134',  E'{"fecha":"16\\/01\\/2019","ingreso":"6.830,21","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '5mIEX')
ERROR - 2019-01-16 15:04:38 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 15:04:44 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-01-16 18:59:18 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-16 18:59:23 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-16 18:59:25 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-16 19:08:57 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19251) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-16 19:08:57 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19251) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19251',  E'{"fecha":"16\\/01\\/2019","ingreso":"540,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'mwdYu')
ERROR - 2019-01-16 21:35:56 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-16 21:35:57 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-16 21:36:15 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-16 21:39:20 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-16 21:39:55 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-16 21:39:56 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-16 21:40:38 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-16 21:51:40 --> 404 Page Not Found: Index2html/index
