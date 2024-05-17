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

<form action="pages/login_check.php" method="POST" class="formocska">
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
	<p>Nincs fiókod? <a href="?program=regist"> Regisztrálj!</a></p>
	
  </div>

  <div>
   <input type="button" value="Mégsem" onclick="location.href = 'index.php';">
   <input type="submit" value="Bejelenkezés">
  </div>
</form>

</body>
</html>