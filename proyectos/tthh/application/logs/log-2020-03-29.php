<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-03-29 17:15:24 --> Severity: Warning --> fsockopen(): unable to connect to ssl://smtp.gmail.com:465 (Connection timed out) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/libraries/Email.php 2055
ERROR - 2020-03-29 17:22:45 --> Severity: Warning --> fsockopen(): unable to connect to ssl://smtp.gmail.com:465 (Connection timed out) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/libraries/Email.php 2055
ERROR - 2020-03-29 22:00:02 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(20622) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-03-29 22:00:02 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(20622) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('20622',  E'{"fecha":"29\\/03\\/2020","ingreso":"369.750,00","ct":"200.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'IIbNM')
