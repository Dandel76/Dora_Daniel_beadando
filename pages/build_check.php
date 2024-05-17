<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// There was a POST
	$felnev = $_SESSION['felnev'];
	$champ = $_POST['champion'];
	$role = $_POST['role'];
	$item1 = $_POST['item1'];
	$item2 = $_POST['item2'];
	$item3 = $_POST['item3'];
	$item4 = $_POST['item4'];
	$item5 = $_POST['item5'];
	$item6 = $_POST['item6'];
	$item7 = $_POST['item7'];
	
		$query = "insert into builds (user,champion,role,item1,item2,item3,item4,item5,item6,item7) values('$felnev', '$champ', '$role', '$item1', '$item2', '$item3', '$item4', '$item5', '$item6', '$item7')";
		mysqli_query($con, $query);
		header('Location: ../index.php?program=build');
		mysqli_close($con);
		die;
	}else{
		# TODO
		# close the database connection
		mysqli_close($con);
	}
	

?>