<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/menupage.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<!-- Navigation bar -->
<nav class="navbar navbar-default navbar-static-top navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img class="img-rounded img-responsive" id="logo" src="<?php echo base_url('public/images/logo.png')?>" alt="PizzaNow">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php

                echo "<li class='nav-item active-tab'><a href='/PizzaNow'>Home</a></li>";
                echo "<li class='nav-item'><a href='/PizzaNow/HomePage/menu'>Menu</a></li>";
                echo "<li class='nav-item cta cta-colored cart-link'><a href='' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span> &nbsp;0 items - Rs.0.00</a></li>";

                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navigation bar -->

<div class="jumbotron">
    <div class="">
    </div>
    <h1>Menu</h1>
</div>

            <div class="container">
                <br>
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a data-toggle="pill" href="#deals">Meal deals</a></li>
                    <li><a data-toggle="pill" href="#pizza">Pizza</a></li>
                    <li><a data-toggle="pill" href="#appetizers">Appetizers</a></li>
                    <li><a data-toggle="pill" href="#desserts">Desserts</a></li>
                    <li><a data-toggle="pill" href="#beverages">Beverages</a></li>
                </ul>

                <div class="tab-content">
                    <div id="deals" class="tab-pane fade in active">
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="/w3images/lights.jpg" target="_blank">
                                        <img src="<?php echo base_url('public/images/logo.png')?>" alt="Lights" style="width:100%">
                                        <div class="caption">
                                            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="/w3images/nature.jpg" target="_blank">
                                        <img src="<?php echo base_url('public/images/logo.png')?>" alt="Nature" style="width:100%">
                                        <div class="caption">
                                            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="/w3images/fjords.jpg" target="_blank">
                                        <img src="<?php echo base_url('public/images/logo.png')?>" alt="Fjords" style="width:100%">
                                        <div class="caption">
                                            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pizza" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="appetizers" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div id="desserts" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div id="beverages" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div>




<!-- Footer -->
<footer class="navbar-static-bottom navbar-fixed-bottom">
   <!-- Copyright -->-->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://mdbootstrap.com/"> pizzanow.com</a><p>
    </div>
</footer>
<!-- /Footer-->

</body>
</html>


