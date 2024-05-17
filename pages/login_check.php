<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// There was a POST
		//sql inject counter
		$username = mysqli_real_escape_string($con, $_POST['usem']);
		$pswd = mysqli_real_escape_string($con, $_POST['jelszo']);
		
		$problems = array();
		
		if(empty($username) or $username==0 or is_numeric($username)){
			// collect problem
			$problems['usem'] = 'Szükséges!';
		}
		if(empty($pswd) or $pswd==0){
			$problems['jelszo'] = 'Szükséges!';
		}
		
		// If there is no problem, read the data from the database
		if(count($problems)==0){
			
			$query = "select * from users where username = '$username' OR email = '$username' limit 1";
			$query_result = mysqli_query($con, $query);
			
			// Check if we got a valid data row
			if($query_result && mysqli_num_rows($query_result) > 0){
				$user_data = mysqli_fetch_assoc($query_result);
				
				// Check the password
				if(password_verify($pswd, $user_data["pswd"])){
					$_SESSION["felnev"] = $user_data["username"];
					$_SESSION["jog"] = $user_data["jog"];
					header("Location: ../index.php");
					mysqli_close($con);
					die;
				}
				else{
					$problems['jelszo'] = 'Téves jelszó!';
					$_SESSION["message"] = $problems;
					header('Location: ../index.php?program=login');
					mysqli_close($con);
					die;
				}
			}
			else{
				$problems['usem'] = 'A felhasználónév vagy email nem található!';
				$_SESSION["message"] = $problems;
				header('Location: ../index.php?program=login');
				mysqli_close($con);
				die;
			}
		}
		else{
			$_SESSION["message"] = $problems;
			header('Location: ../index.php?program=login');
			mysqli_close($con);
			die;
		}
	}
	else{
		# TODO
		mysqli_close($con);
	}
?>