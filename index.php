<?php
    if(!isset($_SESSION)){session_start();}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdőlap</title>
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
                <li class="nav-item active">
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
						echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
					}
					?>    
            </ul>
        </div>
    </nav>

	<div class="main">
    <div class="container">
        <div class="row">
            <div class="col">
				<div class="col-md-12 text-center">
					<h1>Üdvözöllek idéző!</h1>
					<br>
					<video class="video" controls>
						<source src="video/welcomepl.mp4" type="video/mp4">
						A böngésződ nem támgatja a video tag-et!
					</video>
                </div>
				<div class="text-center">
					<div class="col-md-12">
						<br>
						<br>
						<h2>Oldal célja, hogy segítsük egymást!</h2>
						<p>Szeretnéd megosztani a barátaiddal, hogy milyen felszereléseket kell venni a hősökre?</p>
						<p>Közben pedig akár csevegni is velük?</p>
						<p>Akkor ne habozz! Regisztrálás után már meg is teheted!</p>
					</div>
					<div class="col-md-12 order-md-last">
						<img src="img/teemostart.png" class="img-fluid" alt="Teemo kapitány">
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>