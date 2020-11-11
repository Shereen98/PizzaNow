<!DOCTYPE html>
<html lang="en">
<head>
    <title>PizzaNow Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/menupage.css')?>">
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
                    echo "<li class='nav-item active'><a href='/PizzaNow/HomePage/menu'>Menu</a></li>";
                    echo "<li class='nav-item cta cta-colored'><a href='/PizzaNow/Cart/' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span> &nbsp; Cart</a></li>";
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navigation bar -->

<!-- header -->
<div class="jumbotron">
    <div class="">
    </div>
    <h1>Menu</h1>
</div>
<!-- /header -->

<!-- menu-content-->
    <div class="container">
        <br>
        <!-- menu-category -->
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="pill" href="#deals">Meal deals</a></li>
            <li><a data-toggle="pill" href="#pizza">Pizza</a></li>
            <li><a data-toggle="pill" href="#appetizers">Appetizers</a></li>
            <li><a data-toggle="pill" href="#desserts">Desserts</a></li>
            <li><a data-toggle="pill" href="#beverages">Beverages</a></li>
        </ul>

        <!--category-content -->
        <div class="tab-content">

            <!-- deals -->
            <div id="deals" class="tab-pane fade in active">
                <br>
                <div class="well">
                    <div class="row">
                        <br>
                        <?php if(!empty($mealDeals)){ foreach($mealDeals as $row){ ?>
                        <div class="col-sm-6 menu-data">
                            <div class="thumbnail">
                                <h3><?php echo $row["deal_name"]; ?></h3>
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['deal_image']); ?>" />
                                    <div class="caption">
                                        <p><?php echo $row["deal_description"]; ?></p>
                                        <p id="price"> <?php echo 'Rs.'.$row["price"]?></p>

                                        <div class="item-qty text-center">
                                            <button class="btn btn-danger" onclick="decrementQty(<?php echo $row["deal_id"]; ?>)" type="button" ><span class='glyphicon glyphicon-minus'></span></button>
                                            <input id="<?php echo 'product_qty'.$row["deal_id"]; ?>" type="number" name="text" value="1" readonly="true">
                                            <button class="btn btn-success" onclick="incrementQty(<?php echo $row["deal_id"]; ?>)" type="button"><span class='glyphicon glyphicon-plus'></span></button>
                                        </div>
                                        <br>

                                        <div class="text-center">
                                            <button type="button" onclick="addMealToCart(<?php echo $row["deal_id"]; ?>)" style="width: 50%" class="btn menu-btn">Add to cart</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <?php } }else{ ?>
                            <p>Deals(s) not found...</p>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- pizza -->
            <div id="pizza" class="tab-pane fade">
                <br>
                <div class="well">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a data-toggle="tab" href="#nonVeg">Non Vegetarian Pizza</a></li>
                        <li><a data-toggle="tab" href="#veg">Vegetarian Pizza</a></li>
                    </ul>

                    <!-- veg pizza -->
                    <div class="tab-content">
                        <div id="nonVeg" class="tab-pane fade in active">
                            <div class="row">
                                <br>
                                <?php if(!empty($nonVegPizza)){ foreach($nonVegPizza as $row){ ?>
                                <div class="col-sm-4 menu-data">
                                    <div class="thumbnail">
                                        <h3><?php echo $row["pizza_name"]; ?></h3>
                                        <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['pizza_image']); ?>" />
                                        <div class="caption">
                                            <p><?php echo substr($row["pizza_description"],0,45).'...'; ?></p>
                                            <p id="price">R - <?php echo 'Rs.'.$row["regular_pizza_price"]?> | M - <?php echo 'Rs.'.$row["medium_pizza_price"]?> | L - <?php echo 'Rs.'.$row["large_pizza_price"]?></p>
                                            <div class="text-center">
                                                <a href="<?php echo base_url('MenuPage/customizePizza/'.$row['pizza_id']); ?>" class="btn menu-btn">Customize now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } }else{ ?>
                                    <p>Pizza(s) not found...</p>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- non veg pizza -->
                        <div id="veg" class="tab-pane fade">
                            <div class="row">
                                <br>
                                <?php if(!empty($vegPizza)){ foreach($vegPizza as $row){ ?>
                                    <div class="col-sm-4 menu-data">
                                        <div class="thumbnail">
                                            <h3><?php echo $row["pizza_name"]; ?></h3>
                                            <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['pizza_image']); ?>" />
                                            <div class="caption">
                                                <p><?php echo substr($row["pizza_description"],0,45).'...'; ?></p>
                                                <p id="price">R - <?php echo 'Rs.'.$row["regular_pizza_price"]?> | M - <?php echo 'Rs.'.$row["medium_pizza_price"]?> | L - <?php echo 'Rs.'.$row["large_pizza_price"]?></p>
                                                <div class="text-center">
                                                    <a href="<?php echo base_url('MenuPage/customizePizza/'.$row['pizza_id']); ?>" class="btn menu-btn">Customize now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } }else{ ?>
                                    <p>Pizza(s) not found...</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- appetizer -->
            <div id="appetizers" class="tab-pane fade">
                <br>
                <div class="well">
                    <div class="row">
                        <br>
                        <?php if(!empty($appetizer)){ foreach($appetizer as $row){ ?>
                            <div class="col-sm-4 menu-data">
                                <div class="thumbnail">
                                    <h3><?php echo $row["side_name"]; ?></h3>
                                    <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['side_image']); ?>" />
                                    <div class="caption">
                                        <p><?php echo substr($row["side_description"],0,40).'...'; ?></p>
                                        <p id="price"> <?php echo $row["side_portion"].' | Rs.'.$row["price"]?> </p>

                                        <div class="item-qty text-center">
                                            <button class="btn btn-danger" onclick="decrementQty(<?php echo $row["side_id"]; ?>)" type="button" ><span class='glyphicon glyphicon-minus'></span></button>
                                            <input id="<?php echo 'product_qty'.$row["side_id"]; ?>" type="number" name="text" value="1" readonly="true">
                                            <button class="btn btn-success" onclick="incrementQty(<?php echo $row["side_id"]; ?>)" type="button"><span class='glyphicon glyphicon-plus'></span></button>
                                        </div>

                                        <br>
                                        <div class="text-center">
                                            <button onclick="addToCart(<?php echo $row["side_id"]; ?>)" type="button" class="btn menu-btn">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } }else{ ?>
                            <p>Appetizer(s) not found...</p>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- dessert -->
            <div id="desserts" class="tab-pane fade">
                <br>
                <div class="well">
                    <div class="row">
                        <br>
                        <?php if(!empty($dessert)){ foreach($dessert as $row){ ?>
                            <div class="col-sm-4 menu-data">
                                <div class="thumbnail">
                                    <h3><?php echo $row["side_name"]; ?></h3>
                                    <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['side_image']); ?>" />
                                    <div class="caption">
                                        <p><?php echo substr($row["side_description"],0,40).'...'; ?></p>
                                        <p id="price"> <?php echo $row["side_portion"].' | Rs.'.$row["price"]?> </p>

                                        <div class="item-qty text-center">
                                            <button class="btn btn-danger" onclick="decrementQty(<?php echo $row["side_id"]; ?>)" type="button" ><span class='glyphicon glyphicon-minus'></span></button>
                                            <input id="<?php echo 'product_qty'.$row["side_id"]; ?>" type="number" name="text" value="1" readonly="true">
                                            <button class="btn btn-success" onclick="incrementQty(<?php echo $row["side_id"]; ?>)" type="button"><span class='glyphicon glyphicon-plus'></span></button>
                                        </div>

                                        <br>
                                        <div class="text-center">
                                            <button onclick="addToCart(<?php echo $row["side_id"]; ?>)" type="button" class="btn menu-btn">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } }else{ ?>
                            <p>Dessert(s) not found...</p>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- beverage -->
            <div id="beverages" class="tab-pane fade">
                <br>
                <div class="well">
                    <div class="row">
                        <br>
                        <?php if(!empty($beverage)){ foreach($beverage as $row){ ?>
                            <div class="col-sm-4 menu-data">
                                <div class="thumbnail">
                                    <h3><?php echo $row["side_name"]; ?></h3>
                                    <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['side_image']); ?>" />
                                    <div class="caption">
                                        <p id="price"> <?php echo 'Rs.'.$row["price"]?></p>

                                        <div class="item-qty text-center ">
                                            <button class="btn btn-danger" onclick="decrementQty(<?php echo $row["side_id"]; ?>)" type="button" ><span class='glyphicon glyphicon-minus'></span></button>
                                            <input id="<?php echo 'product_qty'.$row["side_id"]; ?>" type="number" name="text" value="1" readonly="true">
                                            <button class="btn btn-success" onclick="incrementQty(<?php echo $row["side_id"]; ?>)" type="button"><span class='glyphicon glyphicon-plus'></span></button>
                                        </div>

                                        <br>
                                        <div class="text-center">
                                            <button onclick="addToCart(<?php echo $row["side_id"]; ?>)" type="button" class="btn menu-btn">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } }else{ ?>
                            <p>Beverages(s) not found...</p>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<!-- /menu-content -->

<!--success modal-->
<div class="modal fade" id="success-modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Successfully added to the cart!</h5>
            </div>
            <div class="modal-footer text-center">
                <button type="button" style="background-color: maroon;color: white" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="navbar-static-bottom">
   <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://mdbootstrap.com/"> pizzanow.com</a><p>
    </div>
</footer>
<!-- /Footer-->

<script>
    let tag_id = 'product_qty';

    function incrementQty($id){
        document.getElementById(tag_id.concat($id)).stepUp(1);
    }

    function decrementQty($id){
        let quantity = document.getElementById(tag_id.concat($id)).value;

        if(quantity>1){
            document.getElementById(tag_id.concat($id)).stepDown(1);
        }else{
            quantity = 1;
        }
    }

    function addToCart($id)
    {

        let qty = $("#product_qty"+$id).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Cart/addSide');?>",
            data: "id="+$id+"&qty="+qty,
            success: function(response){
                $('#success-modal').modal('show');
            }
        });

    }

    function addMealToCart($id)
    {

        let qty = $("#product_qty"+$id).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Cart/addMeal');?>",
            data: "id="+$id+"&qty="+qty,
            success: function(response){
                $('#success-modal').modal('show');
            }
        });

    }

</script>

</body>
</html>


