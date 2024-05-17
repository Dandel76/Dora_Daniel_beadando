<?php
if(!isset($_SESSION)){session_start();}
include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = $_SESSION['felnev'];
	
    // Update user's name and email in database
    $name = mysqli_real_escape_string($con, $_POST['felnev']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
	$jelszo = mysqli_real_escape_string($con, $_POST['jelszo']);
	$jelszoero = mysqli_real_escape_string($con, $_POST['jelszoero']);
		
	$problems = array();	
		
		if(is_numeric($name)){
			$problems['felnev'] = 'A felhasználónévnek tartalmaznia kell betűket!';
		}
		if(!empty($jelszo) and strlen($jelszo)<6){
			$problems['jelszo'] = 'A jelszó legalább 6 karakter hosszú legyen!';
		}
		if(!empty($jelszo) and $jelszo != $jelszoero){
			$problems['jelszoero'] = 'A jelszavak nem egyeznek meg!';
		}
	
		// Check if we have this username already
		$query = "select * from users where username = '$name' limit 1";
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
		
		//profile picture
		if(isset($_FILES["profile_picture"])&& $_FILES["profile_picture"]["error"] == 0) {
		$target_dir = "../img/profilepic/";
		$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
		//check the extension
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Check file size
		//1 mb max
		if ($_FILES["profile_picture"]["size"] > 1024000) {
			$problems['profilepic'] = 'A kép mérete maximum 1 mb lehet!';
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$problems['profilepic'] = 'A kép kiterjesztése nem megfelelő!';
		}
		}
		
		// If there is no problem, update database
		if(count($problems)==0){
			if(!empty($target_file)){
				if(move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)){
					// Save file path to the database
					$profile_picture = $target_file;
					$update_profile_query = "UPDATE users SET profilepic = '$profile_picture' WHERE username='$username'";
					mysqli_query($con, $update_profile_query);
				}else{
					$problems['profilepic'] = 'A fájl feltöltése sikertelen';
				}	
			}
			if(!empty($name) and !$name==0 and !is_numeric($name)){
				$update_profile_query = "UPDATE users SET username='$name' WHERE username='$username'";
				$update_build_query = "UPDATE builds SET user='$name' WHERE user='$username'";
				$update_chat_from_query = "UPDATE messages SET from_user='$name' WHERE from_user='$username'";
				$update_chat_to_query = "UPDATE messages SET to_user='$name' WHERE to_user='$username'";
				$_SESSION['felnev'] = $name;
				$username=$name;
				mysqli_query($con, $update_profile_query);
				mysqli_query($con, $update_build_query);
				mysqli_query($con, $update_chat_from_query);
				mysqli_query($con, $update_chat_to_query);
			}
			if(!empty($jelszo)){
				$jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
				$update_profile_query = "UPDATE users SET pswd='$jelszo' WHERE username='$username'";
				mysqli_query($con, $update_profile_query);
			}
			if(!empty($email)){
				$update_profile_query = "UPDATE users SET email='$email' WHERE username='$username'";
				mysqli_query($con, $update_profile_query);
			}
			
			header('Location: ../index.php?program=profil');
			mysqli_close($con);
			die;
		}
		else{
			$_SESSION["message"] = $problems;
			header('Location: ../index.php?program=profil');
			mysqli_close($con);
			die;
		}
	
	
	
	

}else{
		# close the database connection
		mysqli_close($con);
	}
?>