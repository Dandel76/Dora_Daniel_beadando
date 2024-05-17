<?php
    if(!isset($_SESSION)){session_start();}
    if (empty($_SESSION['felnev'])) {
        header('location: ?program=login');
        die;
    }
    include("pages/message_functions.php"); // Adjuk hozzá a megfelelő elérési utat
    
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
        $message_array = get_messages($_SESSION["felnev"], $partner); // Adjuk hozzá a szükséges paramétereket
    }
?>


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
                
                <form id="chat-partnet-selector" action="pages/select_chat_partner.php" method="POST">
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
                <iframe class="message-box" src="pages/message_box.php" ></iframe>
                
                <form id="chat" action="pages/message_loader.php" method="POST">
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