<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-01 20:31:55 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19600) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-09-01 20:31:55 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19600) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19600',  E'{"fecha":"01\\/09\\/2019","ingreso":"21.199,78","ct":"25.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'a5VQI')
