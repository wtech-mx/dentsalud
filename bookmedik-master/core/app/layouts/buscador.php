      <?php

	include ("../../controller/Database.php");

	$codigo = $_POST['codigo'];

	mysql_select_db($db,$con) or die("Error al conectar base de datos");
	$registros =  mysql_query("SELECT * FROM datos WHERE codigo = '$codigo'")
	
while ($registros=mysql_fetch_array($registros)) {
	echo $registros['name'] ."". $registros['title']." ". $registros['useername'];
      ?>