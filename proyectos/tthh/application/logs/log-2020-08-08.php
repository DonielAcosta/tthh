<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-08-08 08:02:11 --> 404 Page Not Found: Index2html/index
ERROR - 2020-08-08 08:02:30 --> 404 Page Not Found: Index2html/index
ERROR - 2020-08-08 08:02:36 --> 404 Page Not Found: Index2html/index
ERROR - 2020-08-08 11:10:41 --> Severity: Warning --> imagecreatefrompng(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7039
ERROR - 2020-08-08 11:10:41 --> Severity: Warning --> imagecreatefrompng(http://tthh.merida.gob.ve/proyectos/tthh/img/escudo.png): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7039
ERROR - 2020-08-08 11:10:56 --> Severity: Warning --> getimagesize(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/include/tcpdf_images.php 171
ERROR - 2020-08-08 11:10:56 --> Severity: Warning --> getimagesize(http://tthh.merida.gob.ve/proyectos/tthh/img/logo03.jpg): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/include/tcpdf_images.php 171
ERROR - 2020-08-08 11:11:01 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/core/Exceptions.php:271) /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/vendor/tecnickcom/tcpdf/tcpdf.php 7651
ERROR - 2020-08-08 11:11:24 --> Severity: Warning --> pg_query(): Query failed: ERROR:  insert or update on table &quot;trabajadores_ct&quot; violates foreign key constraint &quot;trabajadores_ct_trabajador_fk_fkey&quot;
DETAIL:  Key (trabajador_fk)=(20189) is not present in table &quot;trabajador&quot;. /home/admin/web/tthh.merida.gob.ve/public_html/proyectos/tthh/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2020-08-08 11:11:24 --> Query error: ERROR:  insert or update on table "trabajadores_ct" violates foreign key constraint "trabajadores_ct_trabajador_fk_fkey"
DETAIL:  Key (trabajador_fk)=(20189) is not present in table "trabajador". - Invalid query: INSERT INTO "trabajadores_ct" ("trabajador_fk", "capture", "codigo") VALUES ('20189',  E'{"fecha":"08\\/08\\/2020","ingreso":"0,00","ct":"200.000,00","avala":"ABG. ANTONIO JOSE DIAZ GARCIA"}', 'xCCI5')
