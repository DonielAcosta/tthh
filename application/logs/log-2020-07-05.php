<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-07-05 14:38:44 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 14:38:52 --> Severity: error --> Exception: Class 'Persona_m' not found C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 23
ERROR - 2020-07-05 14:39:17 --> Severity: error --> Exception: Class 'Persona_m' not found C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 23
ERROR - 2020-07-05 14:41:59 --> Severity: error --> Exception: Class 'Persona_m' not found C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 23
ERROR - 2020-07-05 14:42:59 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 14:43:06 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 14:43:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp7\htdocs\webtthh\application\controllers\Servicios_c.php 63
ERROR - 2020-07-05 14:43:09 --> Severity: Notice --> Undefined variable: dataEdo C:\xampp7\htdocs\webtthh\application\controllers\Servicios_c.php 67
ERROR - 2020-07-05 14:43:09 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 17:14:24 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 17:14:28 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 17:14:32 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 17:14:34 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 17:17:21 --> Severity: error --> Exception: Call to undefined method Servicios_m::nuevo() C:\xampp7\htdocs\webtthh\application\controllers\Servicios_c.php 107
ERROR - 2020-07-05 17:19:18 --> Severity: error --> Exception: Call to undefined method Servicios_m::nuevo() C:\xampp7\htdocs\webtthh\application\controllers\Servicios_c.php 107
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: asuntosolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 31
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: iddestsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 32
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: descsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 33
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: adjsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 34
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: fecregsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 35
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: adjsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 37
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: idUsuario C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 48
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: idSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 49
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: fecArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 50
ERROR - 2020-07-05 17:20:55 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 51
ERROR - 2020-07-05 17:20:55 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «Sol_Solicitud_EdoSolicitud»
LINE 1: INSERT INTO &quot;Sol_Solicitud_EdoSolicitud&quot; (&quot;idUsuario&quot;, &quot;idSo...
                    ^ C:\xampp7\htdocs\webtthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-07-05 17:20:55 --> Query error: ERROR:  no existe la relación «Sol_Solicitud_EdoSolicitud»
LINE 1: INSERT INTO "Sol_Solicitud_EdoSolicitud" ("idUsuario", "idSo...
                    ^ - Invalid query: INSERT INTO "Sol_Solicitud_EdoSolicitud" ("idUsuario", "idSolicitud", "fecArc_EdoSolicitud", "obsArc_EdoSolicitud") VALUES (NULL, NULL, NULL, NULL)
ERROR - 2020-07-05 17:20:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp7\htdocs\webtthh\system\core\Exceptions.php:271) C:\xampp7\htdocs\webtthh\system\core\Common.php 570
ERROR - 2020-07-05 17:25:52 --> Severity: Notice --> Undefined index: adjsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 34
ERROR - 2020-07-05 17:25:52 --> Severity: Notice --> Undefined index: adjsolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 37
ERROR - 2020-07-05 17:25:52 --> Severity: Warning --> pg_query(): Query failed: ERROR:  inserción o actualización en la tabla «sol_solicitud» viola la llave foránea «fk_sol_soli_reference_sol_dest»
DETAIL:  La llave (iddestsolicitud)=(1) no está presente en la tabla «sol_destsolicitud». C:\xampp7\htdocs\webtthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-07-05 17:25:52 --> Query error: ERROR:  inserción o actualización en la tabla «sol_solicitud» viola la llave foránea «fk_sol_soli_reference_sol_dest»
DETAIL:  La llave (iddestsolicitud)=(1) no está presente en la tabla «sol_destsolicitud». - Invalid query: INSERT INTO "sol_solicitud" ("asuntosolicitud", "iddestsolicitud", "descsolicitud", "adjsolicitud", "fecregsolicitud") VALUES ('mi asunto', '1', 'mi asunto dirigido a rrhh', NULL, '2020-07-05')
ERROR - 2020-07-05 17:33:14 --> Severity: Warning --> pg_query(): Query failed: ERROR:  inserción o actualización en la tabla «sol_solicitud» viola la llave foránea «fk_sol_soli_reference_sol_dest»
DETAIL:  La llave (iddestsolicitud)=(1) no está presente en la tabla «sol_destsolicitud». C:\xampp7\htdocs\webtthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-07-05 17:33:14 --> Query error: ERROR:  inserción o actualización en la tabla «sol_solicitud» viola la llave foránea «fk_sol_soli_reference_sol_dest»
DETAIL:  La llave (iddestsolicitud)=(1) no está presente en la tabla «sol_destsolicitud». - Invalid query: INSERT INTO "sol_solicitud" ("asuntosolicitud", "iddestsolicitud", "descsolicitud", "adjsolicitud", "fecregsolicitud") VALUES ('mi asunto', '1', 'mi asunto dirigido a rrhh', 'Manual_caclula_Nomina.pdf', '2020-07-05')
ERROR - 2020-07-05 17:46:50 --> Severity: Notice --> Undefined index: idUsuario C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 48
ERROR - 2020-07-05 17:46:50 --> Severity: Notice --> Undefined index: idSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 49
ERROR - 2020-07-05 17:46:50 --> Severity: Notice --> Undefined index: fecArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 50
ERROR - 2020-07-05 17:46:50 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 51
ERROR - 2020-07-05 17:46:50 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «Sol_Solicitud_EdoSolicitud»
LINE 1: INSERT INTO &quot;Sol_Solicitud_EdoSolicitud&quot; (&quot;idUsuario&quot;, &quot;idSo...
                    ^ C:\xampp7\htdocs\webtthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-07-05 17:46:50 --> Query error: ERROR:  no existe la relación «Sol_Solicitud_EdoSolicitud»
LINE 1: INSERT INTO "Sol_Solicitud_EdoSolicitud" ("idUsuario", "idSo...
                    ^ - Invalid query: INSERT INTO "Sol_Solicitud_EdoSolicitud" ("idUsuario", "idSolicitud", "fecArc_EdoSolicitud", "obsArc_EdoSolicitud") VALUES (NULL, NULL, NULL, NULL)
ERROR - 2020-07-05 17:46:50 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp7\htdocs\webtthh\system\core\Exceptions.php:271) C:\xampp7\htdocs\webtthh\system\core\Common.php 570
ERROR - 2020-07-05 17:51:06 --> Severity: Notice --> Undefined index: idSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 49
ERROR - 2020-07-05 17:51:06 --> Severity: Notice --> Undefined index: fecArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 50
ERROR - 2020-07-05 17:51:06 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 51
ERROR - 2020-07-05 17:51:06 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «Sol_Solicitud_EdoSolicitud»
LINE 1: INSERT INTO &quot;Sol_Solicitud_EdoSolicitud&quot; (&quot;idUsuario&quot;, &quot;idSo...
                    ^ C:\xampp7\htdocs\webtthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-07-05 17:51:06 --> Query error: ERROR:  no existe la relación «Sol_Solicitud_EdoSolicitud»
LINE 1: INSERT INTO "Sol_Solicitud_EdoSolicitud" ("idUsuario", "idSo...
                    ^ - Invalid query: INSERT INTO "Sol_Solicitud_EdoSolicitud" ("idUsuario", "idSolicitud", "fecArc_EdoSolicitud", "obsArc_EdoSolicitud") VALUES ('483', NULL, NULL, NULL)
ERROR - 2020-07-05 19:00:35 --> Severity: error --> Exception: Call to a member function success() on integer C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 51
ERROR - 2020-07-05 19:04:02 --> Severity: error --> Exception: Call to a member function success() on integer C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 51
ERROR - 2020-07-05 19:05:29 --> Severity: error --> Exception: Call to a member function success() on integer C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 51
ERROR - 2020-07-05 19:19:47 --> Severity: error --> Exception: Call to a member function success() on integer C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 52
ERROR - 2020-07-05 19:34:16 --> Severity: error --> Exception: Call to a member function success() on integer C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 52
ERROR - 2020-07-05 19:35:56 --> Severity: Notice --> Undefined index: fecArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 53
ERROR - 2020-07-05 19:35:56 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 54
ERROR - 2020-07-05 19:35:56 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 57
ERROR - 2020-07-05 19:37:19 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 54
ERROR - 2020-07-05 19:37:19 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 57
ERROR - 2020-07-05 19:39:18 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 54
ERROR - 2020-07-05 19:39:18 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 57
ERROR - 2020-07-05 19:42:27 --> Severity: Notice --> Undefined index: obsArc_EdoSolicitud C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 54
ERROR - 2020-07-05 19:42:27 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 57
ERROR - 2020-07-05 19:43:28 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 58
ERROR - 2020-07-05 19:45:00 --> Severity: error --> Exception: Call to undefined method Servicios_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 59
ERROR - 2020-07-05 19:49:09 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 58
ERROR - 2020-07-05 19:51:02 --> Severity: Notice --> Undefined index: idusuario C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 41
ERROR - 2020-07-05 19:51:02 --> Severity: Notice --> Undefined index: idedosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 42
ERROR - 2020-07-05 19:51:02 --> Severity: Notice --> Undefined index: idsolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 43
ERROR - 2020-07-05 19:51:02 --> Severity: Notice --> Undefined index: fecarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 44
ERROR - 2020-07-05 19:51:02 --> Severity: Notice --> Undefined index: obsarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 45
ERROR - 2020-07-05 19:51:02 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 47
ERROR - 2020-07-05 19:51:02 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp7\htdocs\webtthh\system\core\Exceptions.php:271) C:\xampp7\htdocs\webtthh\system\core\Common.php 570
ERROR - 2020-07-05 19:52:02 --> Severity: Notice --> Undefined index: idedosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 42
ERROR - 2020-07-05 19:52:02 --> Severity: Notice --> Undefined index: idsolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 43
ERROR - 2020-07-05 19:52:02 --> Severity: Notice --> Undefined index: fecarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 44
ERROR - 2020-07-05 19:52:02 --> Severity: Notice --> Undefined index: obsarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 45
ERROR - 2020-07-05 19:52:02 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 47
ERROR - 2020-07-05 19:53:20 --> Severity: Notice --> Undefined index: idsolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 43
ERROR - 2020-07-05 19:53:20 --> Severity: Notice --> Undefined index: fecarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 44
ERROR - 2020-07-05 19:53:20 --> Severity: Notice --> Undefined index: obsarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 45
ERROR - 2020-07-05 19:53:20 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 47
ERROR - 2020-07-05 19:54:28 --> Severity: Notice --> Undefined index: fecarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 44
ERROR - 2020-07-05 19:54:28 --> Severity: Notice --> Undefined index: obsarc_edosolicitud C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 45
ERROR - 2020-07-05 19:54:28 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 47
ERROR - 2020-07-05 19:54:56 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 47
ERROR - 2020-07-05 20:59:55 --> Severity: error --> Exception: Call to undefined method Servicios_m::nuevoEdoSol() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 60
ERROR - 2020-07-05 21:02:38 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Solicitud_edosolicitud_m.php 47
ERROR - 2020-07-05 21:07:35 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 61
ERROR - 2020-07-05 21:19:10 --> Severity: error --> Exception: Call to undefined method Solicitud_edosolicitud_m::upd() C:\xampp7\htdocs\webtthh\application\models\Servicios_m.php 62
ERROR - 2020-07-05 21:22:35 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «idUsuario» en la relación «sol_solicitud_edosolicitud»
LINE 1: INSERT INTO &quot;sol_solicitud_edosolicitud&quot; (&quot;idUsuario&quot;, &quot;idso...
                                                  ^ C:\xampp7\htdocs\webtthh\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2020-07-05 21:22:35 --> Query error: ERROR:  no existe la columna «idUsuario» en la relación «sol_solicitud_edosolicitud»
LINE 1: INSERT INTO "sol_solicitud_edosolicitud" ("idUsuario", "idso...
                                                  ^ - Invalid query: INSERT INTO "sol_solicitud_edosolicitud" ("idUsuario", "idsolicitud", "idedosolicitud", "fecarc_edosolicitud", "obsarc_edosolicitud") VALUES ('483', 27, 1, '2020-07-05', '')
ERROR - 2020-07-05 22:58:08 --> 404 Page Not Found: Vendor/tecnickcom
ERROR - 2020-07-05 22:58:15 --> 404 Page Not Found: Vendor/tecnickcom
ERROR - 2020-07-05 23:49:07 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 23:49:13 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 23:49:16 --> 404 Page Not Found: Vendor/almasaeed2010
ERROR - 2020-07-05 23:57:27 --> 404 Page Not Found: Vendor/almasaeed2010
