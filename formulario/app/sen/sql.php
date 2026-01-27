<?PHP
INCLUDE ("../../config/databases.ini.php");
//require_once ('../../../libDsiaV3/lib/adodb5/adodb.inc.php');

echo "datos";
function Conectarse() {
	if (! $link = sybase_connect ( SERVER, USER, PASSWORDBD )) {
		echo "En estos momentos, no hay conexión con la base de datos.";
		echo "Intentelo más tarde.";
		exit ();
	}
	if (! sybase_select_db ( DATABASE, $link )) {
		echo "Error seleccionando la base de datos.";
		exit ();
	}
	return $link;
}
$sent = "";
$sentencia1 = "";
if (isset ( $_POST ['sentencia'] ) == true) {
	$sent = $_POST ['sentencia'];
	$sentencia1 = $_POST ['sentencia'];
}
$sentencia1 = (str_replace ( "\'", "'", $sentencia1 ));
?>
<form method="post" action="sql.php">
<center>
Esta pagina permite ejecutar sentencias SQL sobre el sistema <br>
Ejemplo: SELECT campo1,campo2 FROM TU_TABLA where FECHA = '20140916'<br> 
<br>
<input type="text" name="sentencia" size="160" value="<? echo $sentencia1 ?>">
<br>
<br>
<input type="submit" name="Ejecutar SQL"> <br>
<br>	
<?
echo "##########";
echo get_magic_quotes_gpc ();
echo "##########";
//	$sentencia1=$_POST[sentencia];


//	$sentencia1=strtoupper(str_replace("\'"," ' ",$sentencia1));

if ($sentencia1 != "") {
	$cone = Conectarse ();
	//  	$cone=$DB->connect;						
	$res = sybase_query ( $sentencia1, $cone );
	echo "-- $res --<br>";
	if ($res == false) {
		echo "<br>--- ERROR ---<br>";
	}
	
	//  		$ok=strstr($sentencia1,"SELECT");
	//  		$ok=strstr($sentencia1,"select");
	$ok = true;
	echo "<b>Sentencia ejecutada: </b> $sentencia1 <br>";
	if ($ok != false) {
		$filas = sybase_num_rows ( $res );
		$columnas = sybase_num_fields ( $res );
		
		echo "<b>Total de registros: </b> $filas <br><br>";
		echo "<table border=1>";
		if ($filas > 0) {
			echo "<tr>";
			for($j = 0; $j < $columnas; $j ++) {
				$info = sybase_fetch_field ( $res, $j );
				$nombre = $info->name;
				echo "<td><b>$nombre</b></td>";
			}
			echo "</tr>";
			for($i = 0; $i < $filas; $i ++) {
				echo "<tr>";
				for($k = 0; $k < $columnas; $k ++) {
					$info = sybase_fetch_field ( $res, $k );
					$nombre = $info->name;
					$contenido = sybase_result ( $res, $i, $nombre );
					echo "<td>$contenido</td>";
				}
				echo "</tr>";
			}
		}
	}
	echo "</table>";
	sybase_close ();
} else {
	echo "<br>Debe ingresar una sentencia<br>";
}
?>


</form>
</center>