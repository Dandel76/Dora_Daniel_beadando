<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// There was a POST
	$felnev = mysqli_real_escape_string($con, $_POST['felnev']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
	$szuldat = $_POST['szuldat'];
	$jelszo = mysqli_real_escape_string($con, $_POST['jelszo']);
	$jelszoero = mysqli_real_escape_string($con, $_POST['jelszoero']);
	$neme = $_POST['gender'];
		
		// Check if the data is valid
		$problems = array();
		
		if(empty($felnev) or $felnev==0 or is_numeric($felnev)){
			$problems['felnev'] = 'Szükséges!';
		}
		if(is_numeric($felnev)){
			$problems['felnev'] = 'A felhasználónévnek tartalmaznia kell betűket!';
		}
		if(strlen($jelszo)<6){
			$problems['jelszo'] = 'A jelszó legalább 6 karakter hosszú legyen!';
		}
		if($jelszo != $jelszoero){
			$problems['jelszoero'] = 'A jelszavak nem egyeznek meg!';
		}
		if(empty($email)){
			$problems['email'] = 'Szükséges!';
		}
		if(empty($szuldat)){
			$problems['szuldat'] = 'Szükséges!';
		}
		
		// Check if we have this username already
		$query = "select * from users where username = '$felnev' limit 1";
		$query_result = mysqli_query($con, $query);
		if($query_result && mysqli_num_rows($query_result) > 0){
			$problems['felnev'] = 'A felhasználónév foglalt!';
		}
		
		// Check if we have this email already
		$query = "select * from users where email = '$email' limit 1";
		$query_result = mysqli_query($con, $query);
		if($query_result && mysqli_num_rows($query_result) > 0){
			$problems['email'] = 'Ez az email már regisztrálva van.';
		}
		
		// If there is no problem, save to database
		if(count($problems)==0){
			// password hash
			$jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
			$query = "insert into users (username,email,pswd,nem,szuldat,profilepic,jog) values('$felnev', '$email', '$jelszo', '$neme', '$szuldat', '../img/lol.png', 'user')";
			mysqli_query($con, $query);
			$_SESSION["felnev"] = $felnev;
			$_SESSION["jog"] = "user";
			header("Location: ../index.php");
			mysqli_close($con);
			die;
		}
		else{
			$_SESSION["message"] = $problems;
            header('Location: ../index.php?program=regist');
			mysqli_close($con);
			die;
		}
	}
	else{
		# TODO
		# close the database connection
		mysqli_close($con);
	}
	

?>