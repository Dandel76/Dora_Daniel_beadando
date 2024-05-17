<?php
    if(!isset($_SESSION)){session_start();}
    include("../pages/message_functions.php"); // Használj relatív útvonalat
    
    // save sent messages
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if( !empty($_POST['chat-input']) && !empty($_POST['partner'])){
            
            $chat_input = $_POST['chat-input'];
            $from_user = $_SESSION["felnev"];
            $to_user = $_POST['partner'];
            
            $message_array = save_messages($from_user, $to_user, $chat_input);
            
            $_SESSION["message_array"] = $message_array;
            $_SESSION["chat-partner"] = $to_user;
        }
    }
    header('location: ../index.php?program=message'); // Használj relatív útvonalat
    die;
?>