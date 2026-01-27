<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-04 13:21:59 --> Severity: Warning --> imagecreatefrompng(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7039
ERROR - 2019-11-04 13:21:59 --> Severity: Warning --> imagecreatefrompng(http://tthh.merida.gob.ve/proyectos/tthh/img/escudo.png): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7039
ERROR - 2019-11-04 13:22:01 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7651
ERROR - 2019-11-04 19:14:36 --> Severity: Warning --> file_get_contents(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/include/tcpdf_images.php 209
ERROR - 2019-11-04 19:14:36 --> Severity: Warning --> file_get_contents(http://tthh.merida.gob.ve/proyectos/tthh/img/logo03.jpg): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/include/tcpdf_images.php 209
ERROR - 2019-11-04 19:14:36 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7651
ERROR - 2019-11-04 19:16:54 --> 404 Page Not Found: Index2html/index
ERROR - 2019-11-04 19:17:14 --> 404 Page Not Found: Index2html/index
ERROR - 2019-11-04 19:17:32 --> 404 Page Not Found: Index2html/index
ERROR - 2019-11-04 19:18:00 --> 404 Page Not Found: Index2html/index
ERROR - 2019-11-04 19:18:24 --> 404 Page Not Found: Index2html/index
ERROR - 2019-11-04 19:18:50 --> 404 Page Not Found: Index2html/index
ERROR - 2019-11-04 22:36:16 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(21536) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2019-11-04 22:36:17 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(21536) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('21536',  E'{"fecha":"04\\/11\\/2019","ingreso":"208.920,00","ct":0,"avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'B36yd')
