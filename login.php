<?php
	if(!isset($_SESSION)){session_start();}
	
	$usemerror = "";
	$jelszoerror = "";
	if(isset($_SESSION["message"])){
		$keys = array_keys($_SESSION["message"]);
		for($i=0; $i < count($_SESSION["message"]); $i++) {
			
			if ($keys[$i] == 'usem') {
				$usemerror .= $_SESSION["message"][$keys[$i]] . ' ';
			}
			if ($keys[$i] == 'jelszo') {
				$jelszoerror .= $_SESSION["message"][$keys[$i]] . ' ';
			}
		}
		
		// After we got the message, set it to null, so it doesn't linger in the system indefinitely.
		unset($_SESSION["message"]);
	} 
	
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
						echo "<li class='nav-item'><a class='nav-link' href='profil.php'>Profil</a></li>";
						echo "<li class='nav-item'><form action='logout.php' method='post'><button type='submit' class='btn btn-danger'>Logout</button></form></li>"; 
					} else {
						echo "<li class='nav-item active'><a class='nav-link' href='login.php'>Login</a></li>";
					}
					?>    
            </ul>
        </div>
    </nav>

<form action="login_check.php" method="POST" class="formocska">
  <div>
	<h1>Bejelentkezés</h1>
	<?php
		if(strlen($usemerror)>0){
			echo '<div class="warning">';
			echo $usemerror;
			echo "</div>";
		}
	?>
	Felhasználónév/Email
	<br>
    <input type="text" placeholder="Felhasználónév/Email" id="usem" name="usem" size="30" required>
	<p></p>
	<?php
		if(strlen($jelszoerror)>0){
			echo '<div class="warning">';
			echo $jelszoerror;
			echo "</div>";
		}
	?>
	Jelszó
	<br>
    <input type="password" placeholder="Jelszó" id="jelszo" name="jelszo" size="30" required>
	<p>Nincs fiókod? <a href="register.php"> Regisztrálj!</a></p>
	
  </div>

  <div>
   <input type="button" value="Mégsem" onclick="location.href = 'index.php';">
   <input type="submit" value="Bejelenkezés">
  </div>
</form>

</body>
</html>