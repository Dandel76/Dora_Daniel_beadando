<?php
	if(!isset($_SESSION)){session_start();}
	include("connection.php");
	
$query = "SELECT * FROM champions ORDER BY name ASC";
$result = mysqli_query($con, $query);

?>

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
