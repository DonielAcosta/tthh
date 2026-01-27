<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-05-02 18:47:52 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21043) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-05-02 18:47:52 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21043) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21043',  E'{"fecha":"02\\/05\\/2020","ingreso":"1.998.400,00","ct":"200.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'G627A')
