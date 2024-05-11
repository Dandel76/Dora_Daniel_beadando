<?php
	if(!isset($_SESSION)){session_start();}
	if (empty($_SESSION['felnev'])) {
		header('location: ../login.php');
		die;
	}
	include("message_functions.php");
	
	// Select chat partner
	$partner_error = "";
	if(isset($_SESSION["message"])){
		if($_SESSION["message"] == -1){
			$partner_error = "Nincs ilyen felhasználó";
		}
		unset($_SESSION["message"]);
	}
	if(isset($_SESSION["chat-partner"])){
		$partner = $_SESSION["chat-partner"];
	}
	if(!isset($partner)) {
		$partner = null;
	}
	
	// <form> message handling
	$message_array = array();
	if(isset($_SESSION["message_array"])){
		$message_array = $_SESSION["message_array"];
		$partner = $_SESSION["chat-partner"];
		
		// Do not leave these in memory
		unset($_SESSION["message_array"]);
	}
	else {   // Update messages area when page is refreshed
		$message_array = get_messages();
	}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Csevegő</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="../css/message.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../img/lol.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="../img/lol.png" alt="Logo" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../bemutato.php">A játékról</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../build.php">Buildek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../info.php">Karakterek</a>
                </li>
				<?php
					if(isset($_SESSION["felnev"])){
						echo "<li class='nav-item active'><a class='nav-link' href='../message/message_page.php'>Csevegő</a></li>";
						echo "<li class='nav-item'><a class='nav-link' href='../profil.php'>Profil</a></li>";
						echo "<li class='nav-item'><form action='../logout.php' method='post'><button type='submit' class='btn btn-danger'>Logout</button></form></li>"; 
					} else {
						echo "<li class='nav-item'><a class='nav-link' href='../login.php'>Login</a></li>";
					}
					?>    
            </ul>
        </div>
    </nav>

<div class="main">
	<main>
		<div class="anti-collapse"></div>
		
		<div class="message-grid">
			<div class="friends-box">
				<?php
				echo "Felhasználó: " . $_SESSION["felnev"];
				if(isset($partner) and $partner and strlen($partner_error) == 0){
					echo '<br>Beszélgetés vele: ' . $partner;
				}
				?>
				
				<form id="chat-partnet-selector" action="select_chat_partner.php" method="POST">
					<?php 
						if(strlen($partner_error)>0){
							echo '<div style="color:red;">' . $partner_error . "</div>";
						}
						elseif( !isset($partner) or !$partner){
							echo '<div style="color:red;">Csevegő társat ki kell választani!</div>';
						} 
					?>
					<input type="text"  id="chat-partner" name="chat-partner" maxlength="200">
					<input type="submit" name="btn-submit"  value="Csevegőtárs kiválasztása">
					
				</form>
			</div>
		
			<div class="chat-stuff">
				<iframe class="message-box" src="message_box.php" ></iframe>
				
				<form id="chat" action="message_loader.php" method="POST">
					<input type="text" id="partner" name="partner" value=<?php echo '"' . $partner . '"'; ?> style="display: none;">
				
					<textarea id="chat-area" name="chat-input" rows="1" cols="50" maxlength="200"></textarea>
					<div class="chat-buttons">
						<input type="reset" name="btn-reset" value="Törlés">
						<input type="submit" name="btn-submit"  value="Elküldés">
					</div>
				</form>
			</div>
		</div>
	
	</main>
	<footer></footer>
</div>
</body>
</html>