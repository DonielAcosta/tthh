<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-03 18:41:16 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19656) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-06-03 18:41:16 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19656) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19656',  E'{"fecha":"03\\/06\\/2019","ingreso":"134.060,42","ct":"1.800,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'M8UZH')
