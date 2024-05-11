<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id = $_POST['id'];
		$query = "delete from builds where id = '$id'";
		mysqli_query($con, $query);
		header('location: build.php');
		die;
	}
	else{
		header('location: build.php');
		die;
	}
?>