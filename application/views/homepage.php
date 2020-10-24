<!DOCTYPE html>
<html lang="en">
<head>
    <title>PizzaNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top" data-spy="affix">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img class="img-rounded img-responsive card-img-overlay" id="logo" src="public/images/logo.png" alt="PizzaNow"></a>
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

<!-- Carousel -->
<div id="myCarousel" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active" data-interval="100">
            <img class="first-slide " src="public/images/slide1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item" data-interval="100">
            <img class="second-slide" src="public/images/slide2.jpg" height="30%" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item" data-interval="100">
            <img class="third-slide" src="public/images/slide3.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- /.carousel -->

<div class="container">
    <div class="jumbotron home-about ">
        <img class="img-responsive img-icon " src="public/images/icon_new.png" alt="pizza icon">
        <div class="col-md-7">
        <h2>Welcome to PizzaNow!</h2>
        <p class="text-danger font-italic">Our chefs are working 24/7 and are ready to accept visitors and at any time of the day and night.</p> <br>
            <p class="text-warning">We would like to take this opportunity to welcome you at our Pizza House. We are offering a warm, friendly atmosphere to share a meal with family and friends at any time of the day or evening.</p>

            <div class="text-center">
                <button type="button" class="btn btn-more">See more</button>
            </div>

        </div>

        <div class="col-md-5">
            <img class="img-fluid img-responsive" src="public/images/pizzanow.png" alt="pizza icon">
        </div>
    </div>
</div>

<div class="jumbotron home-menu">
    <h3>Order online now</h3>
    <h1>Our delicious Pizzas</h1>
    <div class="container home-menu-items">
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid img-responsive align-content-center" src="public/images/product_1.png" alt="pizza icon">
                <h3>Margherita Pizza</h3>
            </div>
            <div class="col-sm-4">
                <img class="img-fluid img-responsive align-content-center" src="public/images/product_2.png" alt="pizza icon">
                <h3>Pepperoni Pizza</h3>
            </div>
            <div class="col-sm-4">
                <img class="img-fluid img-responsive align-content-center" src="public/images/product_3.png" alt="pizza icon">
                <h3>Mexican Pizza</h3>
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-menu">View more</button>
        </div>

    </div>
</div>

<div class="container ">
    <div class="jumbotron contact-info ">
        <div class="col-md-7 col-md-push-5">
            <h2>Get in touch with us !</h2>
            <h1>Contact Information</h1> <br>
            <div class="well">
                <p><span class="glyphicon glyphicon-envelope"></span>  shereenpreena1998@gmail.com</p>
            </div>
            <div class="well">
                <p><span class="glyphicon glyphicon-map-marker"></span>  76/3/c, Pahala Karagahamuna, Kadawatha</p>
            </div>
            <div class="well">
                <p><span class="glyphicon glyphicon-earphone"></span>  0773178370/p>
            </div>
        </div>

        <div class="col-md-5 col-md-pull-7">
            <div class="card-body card-body-cascade text-center">

                <!--Google map-->
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="390" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=ragama%20road&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://mdbootstrap.com/"> pizzanow.com</a><p>

    </div>
</footer>
<!--<div class="row featurette">-->
<!--    <div class="col-md-7 col-md-push-5">-->
<!--        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>-->
<!--        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>-->
<!--    </div>-->
<!--    <div class="col-md-5 col-md-pull-7">-->
<!--        <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">-->
<!--    </div>-->
<!--</div>-->
    <!-- FOOTER -->
<!--    <footer>-->
<!--        <p class="pull-right"><a href="#">Back to top</a></p>-->
<!--        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
<!--    </footer>-->
</body>
</html>
