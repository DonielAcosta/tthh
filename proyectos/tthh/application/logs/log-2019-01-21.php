<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 00:17:19 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'ct_plantilla' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 246
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'nombre1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'nombre2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'apellido1' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'apellido2' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 247
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 248
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'organismo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 250
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'tipo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 251
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Undefined property: Trabajador_c::$sfingreso /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Model.php 77
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'cesta_ticket' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 256
ERROR - 2019-01-21 00:19:06 --> Severity: Notice --> Trying to get property 'id' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 285
ERROR - 2019-01-21 00:19:06 --> Severity: Warning --> pg_query(): Query failed: ERROR:  null value in column &quot;trabajador_fk&quot; violates not-null constraint
DETAIL:  Failing row contains (1345, null, {&quot;fecha&quot;:&quot;21\/01\/2019&quot;,&quot;ingreso&quot;:&quot;0,00&quot;,&quot;ct&quot;:0,&quot;avala&quot;:&quot;ABG. AN..., GlBr9). /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-21 00:19:06 --> Query error: ERROR:  null value in column "trabajador_fk" violates not-null constraint
DETAIL:  Failing row contains (1345, null, {"fecha":"21\/01\/2019","ingreso":"0,00","ct":0,"avala":"ABG. AN..., GlBr9). - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES (NULL,  E'{"fecha":"21\\/01\\/2019","ingreso":"0,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'GlBr9')
ERROR - 2019-01-21 00:19:06 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Common.php 570
ERROR - 2019-01-21 00:19:39 --> 404 Page Not Found: Trabajador_c/Trabajador_c
ERROR - 2019-01-21 00:19:53 --> 404 Page Not Found: Trabajador_c/Documento_TP_c
ERROR - 2019-01-21 00:20:00 --> 404 Page Not Found: Trabajador_c/Documento_OD_c
ERROR - 2019-01-21 00:20:08 --> 404 Page Not Found: Trabajador_c/Documento_c
ERROR - 2019-01-21 00:20:18 --> 404 Page Not Found: Trabajador_c/PS_c
ERROR - 2019-01-21 00:40:17 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 00:40:30 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 00:41:32 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 00:42:19 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 01:18:01 --> 404 Page Not Found: Home_c/Trabajador_c
ERROR - 2019-01-21 14:46:11 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 14:46:12 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 14:48:37 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-21 16:23:49 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 16:26:43 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 18:57:17 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 20:03:30 --> 404 Page Not Found: Trabajador_c/Trabajador_c
ERROR - 2019-01-21 21:52:02 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 21:52:03 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-21 21:52:09 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19511) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-01-21 21:52:09 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19511) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19511',  E'{"fecha":"21\\/01\\/2019","ingreso":"0,00","ct":"450,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '5GoRW')
ERROR - 2019-01-21 21:59:27 --> 404 Page Not Found: Index2html/index
ERROR - 2019-01-21 23:51:56 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 23:51:57 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 23:52:29 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2019-01-21 23:53:10 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2019-01-21 23:53:10 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2019-01-21 23:53:10 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 23:53:10 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2019-01-21 23:53:11 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 23:53:11 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2019-01-21 23:53:11 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2019-01-21 23:53:11 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2019-01-21 23:53:11 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2019-01-21 23:53:11 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
