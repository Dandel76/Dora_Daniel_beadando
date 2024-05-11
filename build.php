<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
	$sqlb = "SELECT b.id, b.user, b.champion, b.role, r.longname AS role_name, 
       i1.id AS item1_id, i1.name AS item1_name, 
       i2.id AS item2_id, i2.name AS item2_name, 
       i3.id AS item3_id, i3.name AS item3_name, 
       i4.id AS item4_id, i4.name AS item4_name, 
       i5.id AS item5_id, i5.name AS item5_name, 
       i6.id AS item6_id, i6.name AS item6_name, 
       i7.id AS item7_id, i7.name AS item7_name, 
       u.profilepic
		FROM builds b
		INNER JOIN users u ON b.user = u.username 
		INNER JOIN roles r ON b.role = r.shortname 
		INNER JOIN items i1 ON b.item1 = i1.id 
		INNER JOIN items i2 ON b.item2 = i2.id 
		INNER JOIN items i3 ON b.item3 = i3.id 
		INNER JOIN items i4 ON b.item4 = i4.id 
		INNER JOIN items i5 ON b.item5 = i5.id 
		INNER JOIN items i6 ON b.item6 = i6.id 
		INNER JOIN items i7 ON b.item7 = i7.id";
	
	$sqli = "SELECT id, name FROM items order by name";
	$sqlc = "SELECT name FROM champions order by name";
	$sqlr = "SELECT * FROM roles";
	$resultb = mysqli_query($con, $sqlb);
	$resulti = mysqli_query($con, $sqli);
	$resultc = mysqli_query($con, $sqlc);
	$resultr = mysqli_query($con, $sqlr);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildek</title>
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
                <li class="nav-item active">
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
<?php
		while ($row = mysqli_fetch_assoc($resultb)) :
			echo "<div class='flex-container'>";
				echo "<div>By:</div>";
				echo '<div><img src="' . $row['profilepic'] . '" title="' .$row['user']. '" alt="' .$row['user']. '"></div>';
				echo '<div><img src="img/champions/'.$row['champion'].'.png" title="' . $row['champion'] . '" alt="' . $row['champion'] . '"></div>';
				echo '<div><img src="img/roles/' . $row['role'] . '.png" title="' . $row['role_name'] . '" alt="' . $row['role_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item1_id'] . '.png" title="' . $row['item1_name'] . '" alt="' . $row['item1_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item2_id'] . '.png" title="' . $row['item2_name'] . '" alt="' . $row['item2_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item3_id'] . '.png" title="' . $row['item3_name'] . '" alt="' . $row['item3_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item4_id'] . '.png" title="' . $row['item4_name'] . '" alt="' . $row['item4_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item5_id'] . '.png" title="' . $row['item5_name'] . '" alt="' . $row['item5_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item6_id'] . '.png" title="' . $row['item6_name'] . '" alt="' . $row['item6_name'] . '"></div>';
				echo '<div><img src="img/items/' . $row['item7_id'] . '.png" title="' . $row['item7_name'] . '" alt="' . $row['item7_name'] . '"></div>';
				if(isset($_SESSION["felnev"]) && ($_SESSION['felnev']== $row['user'] || $_SESSION['jog']=="admin")) {
					echo '<form action="build_delete.php" method="POST">
						<input type="hidden" name="id" value="' . $row['id'] . '">
						<input class="addbbt" type="submit" name="btn_delete_build" value="-" title="Törlés">
					</form>';
				}
			echo "</div>";
		endwhile;
?>
</div>
<footer>
<?php
		if(isset($_SESSION["felnev"])){
		echo "<form class='formocska' action='build_check.php' method='POST'>";
		echo "<div class='builddiv'>";
		echo "Build készítés. A saját builded elkészítéséhez válaszd ki a neked tetsző elemeket a listákból majd kattints a + gombra.";
		echo "<div>";
		echo "<select name='champion'>";
			while ($row = mysqli_fetch_assoc($resultc)) :
			echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
			endwhile;
		echo "</select>";
		echo "</div>";
		echo "<div>";
		echo "<select name='role'>";
			while ($row = mysqli_fetch_assoc($resultr)) :
			echo '<option value="' . $row['shortname'] . '">' . $row['longname'] . '</option>';
			endwhile;
		echo "</select>";
		echo "</div>";
		for ($i = 1; $i <= 6; $i++) :
		echo "<div class='selectitem'>";
			echo "<select name='item" . $i . "'>";
				while ($row = mysqli_fetch_assoc($resulti)) :
					echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
				endwhile;
				//Az elejére teszi a resulti indexét, hogy a következő selectnél is betudja járni
				mysqli_data_seek($resulti, 0);
			echo "</select>";
		echo "</div>";
		endfor;
		echo "<select name='item7'>";
			echo "<option value='3340'>Totem Ward</option>";
			echo "<option value='3364'>Control Ward</option>";
			echo "<option value='3363'>Farsight Ward</option>";
		echo "</select>";
		echo "<br>";
		echo "<button type='submit' class='addbbt' title='Mentés'>+</button>";
		echo "</div>";
		echo "</form>";
		}
?> 
</footer>
</body>
</html>