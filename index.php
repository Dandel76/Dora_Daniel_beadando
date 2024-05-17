<?php
if (!isset($_SESSION)) {
    session_start();
}

$allowed_pages = [
    'fooldal' => 'pages/fooldal.php',
    'bemutato' => 'pages/bemutato.php',
    'build' => 'pages/build.php',
    'info' => 'pages/info.php',
    'profil' => 'pages/profil.php',
    'message' => 'pages/message_page.php',
    'login' => 'pages/login.php',
    'regist' => 'pages/regist.php'
];

$page = isset($_GET['program']) ? $_GET['program'] : 'fooldal';

if (!array_key_exists($page, $allowed_pages)) {
    $page = 'fooldal';
}

$page_title = ucfirst($page); // Dinamikus oldal cím beállítása

include 'includes/header.php';
include $allowed_pages[$page];
include 'includes/footer.php';
?>