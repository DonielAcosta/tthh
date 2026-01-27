<?php
/**
 * Archivo de configuracion para establecer conexion con la base de datos
 * 
 * @param String SERVER Nombre del servido en que se encuentra la BD
 * @param String USER Nombre del usuario de conexion
 * @param String PASSWORDBD Clave de conexion
 * @param String DATABASE Nombre de la base de datos
 * 
 * @return Boolean 0: Conexion fallida; 1: Conexion exitosa
 */

define("SERVER","localhost");
//define("DRIVER","mysql");
define("DRIVER","pgsql");
define("USER","gilbert");
define("PASSWORDBD",'123456789+');
//define('DATABASE','retencionesOld');
// define('DATABASE','cond_villaveronica');
//define('DATABASE','cond_kennedy');
// define('DATABASE','condvillaserv');
define('DATABASE','formu');
define('PUERTO','5432');

//define("SERVER","localhost");
//define("DRIVER","mysqli");
//define("USER","solinfco_chequeo");
//define("PASSWORDBD",'chequeo2017');
//define('DATABASE','solinfco_nefrosoft');
//define('PUERTO','5000');
?>