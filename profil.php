<?php
	if(!isset($_SESSION)){session_start();}
	if (empty($_SESSION['felnev'])) {
		header('location: login.php');
		die;
	}
	include("connection.php");
	
	$felnev_error = "";
	$jelszo_error = "";
	$jelszoero_error = "";
	$email_error = "";
	$profilepic_error = "";
	if(isset($_SESSION["message"])){
		$keys = array_keys($_SESSION["message"]);
		for($i=0; $i < count($_SESSION["message"]); $i++) {
			
			if ($keys[$i] == 'felnev') {
				$felnev_error .= $_SESSION["message"][$keys[$i]] . ' ';
			}
			if ($keys[$i] == 'jelszo') {
				$jelszo_error .= $_SESSION["message"][$keys[$i]] . ' ';
			}
			if ($keys[$i] == 'jelszoero') {
				$jelszoero_error .= $_SESSION["message"][$keys[$i]] . ' ';
			}
			if ($keys[$i] == 'email') {
				$email_error .= $_SESSION["message"][$keys[$i]] . ' ';
			}
			if ($keys[$i] == 'profilepic') {
				$profilepic_error .= $_SESSION["message"][$keys[$i]] . ' ';
			}
		}
		
		// After we got the message, set it to null, so it doesn't linger in the system indefinitely.
		unset($_SESSION["message"]);
	} 

// Get the user's ID from the session
$user_name = $_SESSION['felnev'];

// Query the database to fetch the user's profile information
$query = "SELECT * FROM users WHERE username = '$user_name'";
$result = mysqli_query($con, $query);

// Check if the query was successful
if(mysqli_num_rows($result) == 1) {
    // Fetch the user's profile data as an associative array
    $user_data = mysqli_fetch_assoc($result);
} else {
    // Handle the case where the user's profile could not be found
    echo "Error: could not fetch user data from database";
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="img/lol.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="img/lol.png" alt="Logo" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bemutato.php">A játékról</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="build.php">Buildek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="info.php">Karakterek</a>
                </li>
				<?php
					if(isset($_SESSION["felnev"])){
						echo "<li class='nav-item'><a class='nav-link' href='message/message_page.php'>Csevegő</a></li>";
						echo "<li class='nav-item active'><a class='nav-link' href='profil.php'>Profil</a></li>";
						echo "<li class='nav-item'><form action='logout.php' method='post'><button type='submit' class='btn btn-danger'>Logout</button></form></li>"; 
					} else {
						echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
					}
					?>    
            </ul>
        </div>
    </nav>

	<div class="main text-center">
    <h1>Profil:</h1>
    <img src="<?php echo $user_data['profilepic']; ?>" class="profilepic img-fluid" alt="Profile Picture"><br>
    <?php
    echo $user_data['username'] . "<br>";
    echo $user_data['email'] . "<br>";
    echo $user_data['szuldat'] . "<br>";
    echo $user_data['nem'] . "<br>";
    ?>
    <form id="deleteprofil" action="profil_delete.php" method="POST">
        <button type="submit" class="btn btn-danger deletepf" name="btn_delete_build">Profil Törlése</button>
    </form>
    <hr>
    <form class="formocska" action="profile_check.php" method="post" enctype="multipart/form-data">
        <?php
        if (strlen($profilepic_error) > 0) {
            echo '<div class="alert alert-danger">';
            echo $profilepic_error;
            echo "</div>";
        }
        ?>
        (Csak jpg, png, jpeg kiterjesztéső és max 1 mb nagyságú képeket töltse fel!)<br>
        <div class="form-group">
            <label for="profile_picture">Profilkép feltöltése</label>
            <input type="file" id="profile_picture" name="profile_picture">
        </div>
        <p></p>
        <?php
        if (strlen($felnev_error) > 0) {
            echo '<div class="alert alert-danger">';
            echo $felnev_error;
            echo "</div>";
        }
        ?>
        (Tartalmazzon legalább 1 betűt!)<br>
        <div class="form-group">
            <label for="felnev">Új Felhasználónév</label>
            <input type="text" id="felnev" name="felnev" placeholder="Felhasználónév">
        </div>
        <p></p>
        <?php
        if (strlen($email_error) > 0) {
            echo '<div class="alert alert-danger">';
            echo $email_error;
            echo "</div>";
        }
        ?>
        (Valódi email cím legyen, tartalmazza a @-ot!)<br>
        <div class="form-group">
            <label for="email">Új Email</label>
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
        <p></p>
        <?php
        if (strlen($jelszo_error) > 0) {
            echo '<div class="alert alert-danger">';
            echo $jelszo_error;
            echo "</div>";
        }
        ?>
        (Legalább 6 karakter hosszúnak kell lennie!)<br>
        <div class="form-group">
            <label for="jelszo">Új Jelszó</label>
            <input type="password" id="jelszo" name="jelszo" placeholder="Jelszó">
        </div>
        <p></p>
        <?php
        if (strlen($jelszoero_error) > 0) {
            echo '<div class="alert alert-danger">';
            echo $jelszoero_error;
            echo "</div>";
        }
        ?>
        (A két jelszó egyezzen meg!)<br>
        <div class="form-group">
            <label for="jelszoero">Új Jelszó megerősítése</label>
            <input type="password" id="jelszoero" name="jelszoero" placeholder="Jelszó megerősítése">
        </div>
        <p></p>
        <button type="submit" class="btn btn-primary" name="submit">Változtatások mentése</button>
    </form>
</div>
</body>
</html>	