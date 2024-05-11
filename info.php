<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
$query = "SELECT * FROM champions ORDER BY name ASC";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karakterek</title>
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
                <li class="nav-item active">
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
    <?php
    // Create an array to hold the champions grouped by starting letter
    $champions_by_letter = array();

    // Group champions by starting letter
    while($row = $result->fetch_assoc()) {
        $first_letter = strtoupper(substr($row["name"], 0, 1));
        if (!isset($champions_by_letter[$first_letter])) {
            $champions_by_letter[$first_letter] = array();
        }
        $champion_name = $row["name"];
        $champion_tags = $row["tags"];
        $champion_combine = '<img src="img/champions/'.$champion_name.'.png" title="'.$champion_name.': '.$champion_tags.'" alt="'.$champion_name.': '.$champion_tags.'">';

        array_push($champions_by_letter[$first_letter], $champion_combine);
    }

    echo "<div class='table-responsive kartable'>";
    echo "<table class='table'>";
    foreach (range('A', 'Z') as $letter) {
        // Check if there are any champions that start with the current letter
        if (isset($champions_by_letter[$letter])) {
            echo "<tr><th>$letter</th>";
            echo "<td>";
            foreach ($champions_by_letter[$letter] as $champion) {
                echo "$champion ";
            }
            echo "</td></tr>";
        }
    }
    echo "</table>";
    echo "</div>";
    ?>
</div>
</body>
</html>