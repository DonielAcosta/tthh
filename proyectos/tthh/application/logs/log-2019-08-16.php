<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-08-16 00:00:21 --> 404 Page Not Found: Index2html/index
ERROR - 2019-08-16 00:04:01 --> 404 Page Not Found: Index2html/index
ERROR - 2019-08-16 14:17:10 --> 404 Page Not Found: Index2html/index
ERROR - 2019-08-16 14:19:56 --> 404 Page Not Found: Index2html/index
ERROR - 2019-08-16 14:50:17 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-08-16 14:50:28 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-08-16 14:50:35 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-08-16 16:58:40 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-08-16 16:58:40 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (8957, null, {&quot;fecha&quot;:&quot;16\/08\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., 13tib). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-08-16 16:58:40 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (8957, null, {"fecha":"16\/08\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., 13tib). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"16\\/08\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '13tib')
ERROR - 2019-08-16 16:58:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-08-16 18:38:35 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(20183) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-08-16 18:38:35 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(20183) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('20183',  E'{"fecha":"16\\/08\\/2019","ingreso":"0,00","ct":"25.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '5YfBL')
ERROR - 2019-08-16 18:53:36 --> 404 Page Not Found: Index2html/index
