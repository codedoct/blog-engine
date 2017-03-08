<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "test";

	$db=mysql_connect($servername,$username,$password);
	mysql_select_db($dbname,$db);
?>