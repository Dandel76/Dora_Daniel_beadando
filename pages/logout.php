<?php
session_start(); // Mindig hívd meg session_start()-ot

if(isset($_SESSION["felnev"])){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    die;
} else {
    // Ha nincs $_SESSION["felnev"]
    header("Location: ../index.php");
    die;
}
?>