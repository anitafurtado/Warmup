<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warm up!</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./js/code.js" type=module defer></script>

</head>

<body>
    <p id="title">Warm up!</p>
    <nav id="nav">
         <!-- logo -->
        <ul>
            <li><a href='index.php'>Home</a></li>
            <li><a href='commonwarmups.php'>Common warmups</a></li>
            <li><a href='allwarmups.php'>All warmups</a></li>
            <?php
              if (isset($_SESSION["sessionUsername"])) {
                echo "<li><a href='mywarmups.php'>My Warmups</a></li>";
                echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
              }
              else {
                echo "<li><a href='signup.php'>Sign Up</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
              }
             ?>
        </ul>
    </nav>
