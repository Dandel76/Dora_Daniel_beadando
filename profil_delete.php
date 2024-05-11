<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
	if(isset($_SESSION["felnev"])){
		$felnev = $_SESSION["felnev"];
		$query1 = "delete from users where username = '$felnev'";
		$query2 = "delete from builds where user = '$felnev'";
		$query2 = "delete from messages where from_user = '$felnev' or to_user = '$felnev'";
		mysqli_query($con, $query1);
		mysqli_query($con, $query2);
		mysqli_query($con, $query3);
		
		session_unset();
		session_destroy();
		header('location: index.php');
		die;
	}
	else{
		header('location: index.php');
		die;
	}
?>