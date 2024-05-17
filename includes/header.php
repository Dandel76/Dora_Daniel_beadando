<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Weboldal'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/message.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="img/lol.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="?program=fooldal"><img src="img/lol.png" alt="Logo" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="?program=fooldal">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?program=bemutato">A játékról</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?program=build">Buildek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?program=info">Karakterek</a>
                </li>
                <?php
                    if(isset($_SESSION["felnev"])){
                        echo "<li class='nav-item'><a class='nav-link' href='?program=message'>Csevegő</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='?program=profil'>Profil</a></li>";
                        echo "<li class='nav-item'><form action='pages/logout.php' method='post'><button type='submit' class='btn btn-danger'>Logout</button></form></li>"; 
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='?program=login'>Login</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">