<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-20 13:07:00 --> 404 Page Not Found: Trabajador_c/Trabajador_c
ERROR - 2019-11-20 15:40:43 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(20649) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-11-20 15:40:43 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(20649) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('20649',  E'{"fecha":"20\\/11\\/2019","ingreso":"84.114,72","ct":"150.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'CtmFV')
