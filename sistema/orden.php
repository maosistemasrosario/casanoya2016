<?php 

	include("cnx.php");
	$str = "SELECT * FROM marca;";
	$consulta=mysql_query($str);	
	while($registro=mysql_fetch_array($consulta)){
		echo "aaa";
	}
?> 