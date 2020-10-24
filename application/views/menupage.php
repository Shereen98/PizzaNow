<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        PizzaNow Menu
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/menupage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default navbar-static-top" data-spy="affix">
    <div class="container-fluid">
        <div class="navbar-header">

            <?php
            echo "<a class='navbar-brand' href='#'><img class='img-rounded img-responsive card-img-overlay' id='logo' src='public/images/logo.png' alt='PizzaNow'></a>";
            ?>
        </div>
        <ul class="nav navbar-nav">
            <?php

            echo "<li class='nav-item active-tab'><a href='/PizzaNow/index.php'>Home</a></li>";
            echo "<li class='nav-item'><a href='/PizzaNow/index.php/HomePage/menu'>Menu</a></li>";
            echo "<li class='nav-item'><a href=''>About Us</a></li>";
            echo "<li class='nav-item'><a href=''>Contact</a></li>";
            echo "<li class='nav-item cta cta-colored'><a href='' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span></a></li>";

            ?>
        </ul>
    </div>
</nav>
</body>
</html>
