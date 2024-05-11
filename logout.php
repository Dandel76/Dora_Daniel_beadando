<?php
	if(!isset($_SESSION)){session_start();}
	if(isset($_SESSION["felnev"])){
		session_unset();
		session_destroy();
		header('location: index.php');
		die;
	}
	else{
		// What to do if there was no $_SESSION["felnev"]
		header('location: index.php');
		die;
	}
?>