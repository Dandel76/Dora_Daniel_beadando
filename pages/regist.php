<?php
	if(!isset($_SESSION)){session_start();}
	
	
	$felnev_error = "";
	$jelszo_error = "";
	$jelszoero_error = "";
	$email_error = "";
	$szuldat_error = "";
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
			if ($keys[$i] == 'szuldat') {
				$szuldat_error .= $_SESSION["message"][$keys[$i]] . ' ';
			}
		}
		
		// After we got the message, set it to null, so it doesn't linger in the system indefinitely.
		unset($_SESSION["message"]);
	} 
	

?>

	<form class="formocska" action="pages/regist_check.php" method="POST">
  <div class="container">
    <h1>Regisztráció</h1>
    <p>Kérjük, töltse ki ezt az űrlapot a fiók létrehozásához!</p>
    
    <hr>
    <?php
      if(strlen($felnev_error)>0){
        echo '<div class="alert alert-danger">';
        echo $felnev_error;
        echo "</div>";
      }
    ?>
    (Tartalmazzon legalább 1 betűt!)<br>
    <div class="form-group">
      <label for="felnev"><b>Felhasználónév</b></label>
      <input type="text" class="form-control" placeholder="Felhasználónév" id="felnev" name="felnev" required>
    </div>
    <p></p>
    <?php
      if(strlen($email_error)>0){
        echo '<div class="alert alert-danger">';
        echo $email_error;
        echo "</div>";
      }
    ?>
    (Valódi email cím legyen, tartalmazza a @-ot!)<br>
    <div class="form-group">
      <label for="email"><b>Email</b></label>
      <input type="email" class="form-control" placeholder="Email cím" id="email" name="email" required>
    </div>
    <p></p>
    <?php
      if(strlen($szuldat_error)>0){
        echo '<div class="alert alert-danger">';
        echo $szuldat_error;
        echo "</div>";
      }
    ?>
    <label for="szuldat"><b>Születési dátum</b></label>
    <input type="date" class="form-control" id="szuldat" name="szuldat" required>
    <p></p>
    <?php
      if(strlen($jelszo_error)>0){
        echo '<div class="alert alert-danger">';
        echo $jelszo_error;
        echo "</div>";
      }
    ?>
    (Legalább 6 karakter hosszúnak kell lennie!)<br>
    <div class="form-group">
      <label for="jelszo"><b>Jelszó</b></label>
      <input type="password" class="form-control" placeholder="Jelszó" id="jelszo" name="jelszo" required>
    </div>
    <p></p>
    <?php
      if(strlen($jelszoero_error)>0){
        echo '<div class="alert alert-danger">';
        echo $jelszoero_error;
        echo "</div>";
      }
    ?>
    (A két jelszó egyezzen meg!)<br>
    <div class="form-group">
      <label for="jelszoero"><b>Jelszó megerősítése</b></label>
      <input type="password" class="form-control" placeholder="Jelszó megerősítése" id="jelszoero" name="jelszoero" required>
    </div>
    <p></p>
    Neme:<br>
    <div class="form-group">
      <input type="radio" id="ferfi" name="gender" value="ferfi">
      <label for="ferfi">Férfi</label>
      <input type="radio" id="no" name="gender" value="no">
      <label for="no">Nő</label>
      <input type="radio" id="egyebb" name="gender" value="egyebb" checked>
      <label for="egyebb">Egyéb</label>
    </div>
    <p></p>
    <div class="row">
      <div class="col-sm-4">
        <input type="reset" class="btn btn-secondary btn-block" value="Alapértelmezettbe állítás">
      </div>
      <div class="col-sm-4">
        <a href="?program=login" class="btn btn-primary btn-block">Már van fiókom</a>
      </div>
      <div class="col-sm-4">
        <input type="submit" class="btn btn-success btn-block" value="Regisztrálok">
      </div>
    </div>
  </div>
</form>

</body>
</html>	