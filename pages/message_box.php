<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("message_functions.php");
    $message_array = get_messages();
?>

<div class="message-iframe">
        <?php
            if (isset($message_array) and count($message_array) > 0) {
                $keys = array_keys($message_array);
                rsort($keys);
                
                for ($i = 0; $i < count($keys); $i++) {
                    if (!isset($message_array[$keys[$i]]["received"])) {
                        continue;
                    }
                    
                    if ($message_array[$keys[$i]]["received"]) {
                        echo '<div class="msg-received-row"><p class="msg-received">' . $message_array[$keys[$i]]["msg"] . '</p></div>';
                    } else {
                        echo '<div class="msg-sent-row"><p class="msg-sent">' . $message_array[$keys[$i]]["msg"] . '</p></div>';
                    }
                }
            }
        ?>
    </div>