<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-30 10:58:33 --> Severity: Notice --> Undefined offset: 0 /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 72
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'denominacion' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 100
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'fdesde' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'fhasta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 105
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'codigo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'cedula' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 110
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'fingreso' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 115
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'cargo' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 120
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'banco' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 125
ERROR - 2020-07-30 10:58:34 --> Severity: Notice --> Trying to get property 'cuenta' of non-object /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/application/controllers/Trabajador_c.php 130
ERROR - 2020-07-30 23:31:49 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21559) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-07-30 23:31:49 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21559) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21559',  E'{"fecha":"30\\/07\\/2020","ingreso":"662.500,00","ct":"200.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', '6T2Nu')
ERROR - 2020-07-30 23:32:39 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21559) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-07-30 23:32:39 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21559) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21559',  E'{"fecha":"30\\/07\\/2020","ingreso":"662.500,00","ct":"200.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'rW0Ds')
ERROR - 2020-07-30 23:33:39 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21559) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-07-30 23:33:39 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21559) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21559',  E'{"fecha":"30\\/07\\/2020","ingreso":"662.500,00","ct":"200.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'vCEFr')
