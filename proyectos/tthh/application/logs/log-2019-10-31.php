<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-31 11:55:47 --> 404 Page Not Found: Trabajador_c/PS_c
ERROR - 2019-10-31 15:36:30 --> 404 Page Not Found: Validacion%20de%20correo/index
ERROR - 2019-10-31 22:50:09 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(19646) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-10-31 22:50:09 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(19646) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('19646',  E'{"fecha":"31\\/10\\/2019","ingreso":"15.310,94","ct":"25.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'thJ0c')
