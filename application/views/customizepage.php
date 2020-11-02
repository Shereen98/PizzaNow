
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Welcome to PizzaNow!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/menupage.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/customizepage.css')?>" rel="stylesheet">
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

                echo "<li class='nav-item active-tab'><a href='/PizzaNow/HomePage'>Home</a></li>";
                echo "<li class='nav-item'><a href='/PizzaNow/HomePage/menu'>Menu</a></li>";
                echo "<li class='nav-item cta cta-colored'><a href='/PizzaNow/Cart/' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span> &nbsp;0 items - Rs.0.00</a></li>";

                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navigation bar -->

<!-- Content -->
<div class="container">
    <br><br><br><br><br><br>
    <div class ="row">
        <div class="col-md-7 col-md-push-5">

            <!-- Size -->
            <div class="panel panel-default">
                <div class="panel-heading">Select Size</div>
                <div class="panel-body">
                    <div class="sizeWrap">
                        <div class="btn sizeButtonGroup btn-group-justified" data-toggle="buttons">
                            <?php if(!empty($pizza)){ ?>
                            <label class="btn btn-default pizzaSize active">
                                <div class="size">
                                    <p>Regular Pizza</p>
                                    <p><?php echo $pizza["regular_pizza_price"]; ?></p>
                                </div>
                                <input type="radio" name="options" checked>
                            </label>
                            <label class="btn btn-default pizzaSize">
                                <div class="size">
                                    <p>Medium Pizza</p>
                                    <p><?php echo $pizza["medium_pizza_price"]; ?></p>
                                </div>
                                <input type="radio" name="options">
                            </label>
                            <label class="btn btn-default pizzaSize">
                                <div class="size">
                                    <p>Large Pizza</p>
                                    <p><?php echo $pizza["large_pizza_price"]; ?></p>
                                </div>
                                <input type="radio" name="options">
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Toppings -->
            <div class="panel panel-default">
                <div class="panel-heading">Add Extra Toppings</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="pill" href="#vegTopping">Veg Toppings</a></li>
                        <li><a data-toggle="pill" href="#nonVegTopping">Non-Veg Toppings</a></li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div id="vegTopping" class="tab-pane fade in active">
                            <div class="row">
                                <?php if(!empty($vegTopping)){ foreach($vegTopping as $row){ ?>
                                    <div class="col-sm-6">
                                        <div class="btn" data-toggle="buttons">
                                            <label class="btn btn-default">
                                                <input type="checkbox" autocomplete="off" name="topping" value="<?php echo $row["topping_id"]; ?>">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <img class="media-object" style="width:60px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['topping_image']); ?>" />
                                                    </div>
                                                    <div class="media-body">
                                                        <p><?php echo $row["topping_name"]; ?></p>
                                                        <p><?php echo 'Rs.'.$row["price"]; ?></p>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                <?php }} ?>
                            </div>
                        </div>

                        <div id="nonVegTopping" class="tab-pane fade">
                            <div class="row">
                                <?php if(!empty($nonVegTopping)){ foreach($nonVegTopping as $row){ ?>
                                    <div class="col-sm-6">
                                        <div class="btn" data-toggle="buttons">
                                            <label class="btn btn-default">
                                                <input type="checkbox" autocomplete="off">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <img class="media-object" style="width:60px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['topping_image']); ?>" />
                                                    </div>
                                                    <div class="media-body">
                                                        <p><?php echo $row["topping_name"]; ?></p>
                                                        <p><?php echo 'Rs.'.$row["price"]; ?></p>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                <?php }} ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-5 col-md-pull-7">
            <?php if(!empty($pizza)){ ?>
            <div class="thumbnail" id="model-thumbnail">
                <h3><?php echo $pizza["pizza_name"] ?></h3>
                <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($pizza['pizza_image']); ?>" />
                <div class="caption">
                    <p><?php echo $pizza["pizza_description"] ?></p>
                    <br>
                    <div class="text-center">
<!--                        <a href="" class="btn btn-danger less_qty"><span class='glyphicon glyphicon-minus'></span></a>-->
                        <button class="btn btn-danger" onclick="decrementQty()" type="button" ><span class='glyphicon glyphicon-minus'></span></button>
                            <input id="product_qty" type="number" name="text" value="1" readonly="true">
                        <button class="btn btn-success" onclick="incrementQty()" type="button"><span class='glyphicon glyphicon-plus'></span></button>
<!--                        <a href="" class="btn btn-success add_qty"><span class='glyphicon glyphicon-plus'></span></a>-->
                        &nbsp;
                        <button class="btn menu-btn" type="button" product_id="<?php echo $pizza['pizza_id']?>">Add to Cart</button>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- /Content -->


<!-- Footer -->
<footer class="navbar-static-bottom">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://mdbootstrap.com/"> pizzanow.com</a><p>
    </div>
</footer>
<!-- /Footer-->
<script>

    function incrementQty(){
        document.getElementById("product_qty").stepUp(1);
    }

    function decrementQty(){
        let quantity = document.getElementById("product_qty").value;

        if(quantity && quantity > 1){
            document.getElementById("product_qty").stepDown(1);
        }else{
            quantity = 1;
        }
    }
</script>

</body>
</html>