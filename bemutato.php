<?php
	if(!isset($_SESSION)){session_start();}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Játékról</title>
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
                <li class="nav-item active">
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
        <div class="bemdiv row">
            <div class="col-md-12">
                <h1 class="micim">MI AZ A LEAGUE OF LEGENDS?</h1>
                <p>A League of Legends egy csapatközpontú stratégiai játék, ahol nagy erejű hősök két ötfős csapata próbálja lerombolni egymás bázisát. 140 hősből válogatva indíthatsz látványos akciókat, győzhetsz le ellenfeleket és pusztíthatsz el tornyokat a győzelem felé vezető úton.</p>
                <p>VÁLASSZ ÖSVÉNYT</p>
                <p>A játék javasolt csapat-összeállítása öt szerepet foglal magában. Mindegyik ösvényről elmondható, hogy bizonyos hősök és szerepkörök számára ideális.</p>
                <ul class="list-unstyled">
                    <li><img src="img/roles/top.png" title="felső ösvény" alt="felső ösvény" class="roles"> FELSŐ ÖSVÉNY</li>
                    <li><img src="img/roles/jg.png" title="dzsungel" alt="dzsungel" class="roles"> DZSUNGEL</li>   
                    <li><img src="img/roles/mid.png" title="középső ösvény" alt="középső ösvény" class="roles"> KÖZÉPSŐ ÖSVÉNY</li>
                    <li><img src="img/roles/adc.png" title="alsó ösvény" alt="alsó ösvény" class="roles"> ALSÓ ÖSVÉNY</li>
                    <li><img src="img/roles/sup.png" title="támogató" alt="támogató" class="roles"> TÁMOGATÓ</li>    
                </ul>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXZqfuJ9Zps" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>