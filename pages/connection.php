<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "lolbuild";

	if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
	{
		die("Connection failed");
	}
?>