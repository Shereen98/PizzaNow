<!DOCTYPE html>
<html lang="en">
<head>
    <title> Cart </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/cartpage.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/checkoutpage.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script"/>
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
                <img class="img-rounded img-responsive" id="logo" src="<?php echo base_url('public/images/logo.png') ?>"
                     alt="PizzaNow">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                echo "<li class='nav-item active-tab'><a href='/PizzaNow/index.php/HomePage'>Home</a></li>";
                echo "<li class='nav-item'><a href='/PizzaNow/index.php/HomePage/menu'>Menu</a></li>";
                echo "<li class='nav-item'><a href=''>About Us</a></li>";
                echo "<li class='nav-item'><a href='#contact'>Contact</a></li>";
                echo "<li class='nav-item cta cta-colored active'><a href='/PizzaNow/index.php/Cart/' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span>&nbsp; Cart</a></li>";
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navigation bar -->
<br><br><br><br><br><br><br>

<!-- Content -->
<div class="container">
    <div class="well">
        <div class="row">
            <br>
            <div class="col-sm-8">
                <h3>Your basket</h3>
                <hr>

                <!-- Side Cart -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if (!empty($pizza) || !empty($side) || !empty($meal)) { ?>
                                <table class="table table-hover cart-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th class="text-center" scope="col">Unit Price (Rs.)</th>
                                        <th class="text-center" scope="col">Qty</th>
                                        <th class="text-center" scope="col">Total (Rs.)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if (!empty($pizza)) {
                                        foreach ($pizza as $item) { ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $item['name'] . ' Pizza'; ?></th>
                                                <td><?php echo $item['price']; ?></td>
                                                <td>
                                                    <a class="btn update-btn" style="color: black"
                                                       href="<?php echo base_url('index.php/Cart/updatePizzaCart/' . $item['id'] . '/decrement'); ?>"><span
                                                                class='glyphicon glyphicon-minus'></span></a>
                                                    <input id="<?php echo 'product_qty' . $item["id"]; ?>" type="number"
                                                           name="text" value="<?php echo $item['quantity']; ?>"
                                                           readonly="true">
                                                    <a class="btn update-btn" style="color: black" type="button"
                                                       href="<?php echo base_url('index.php/Cart/updatePizzaCart/' . $item['id'] . '/increment'); ?>"><span
                                                                class='glyphicon glyphicon-plus'></span></a>
                                                </td>
                                                <td id="pizza_price"><?php echo $item['quantity'] * $item['price'] . '.00'; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('index.php/Cart/removePizza/' . $item['id']); ?>"
                                                       class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>

                                    <?php if (!empty($side)) {
                                        foreach ($side as $item) { ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $item['name']; ?></th>
                                                <td><?php echo $item['price']; ?></td>
                                                <td>
                                                    <a class="btn update-btn" style="color: black"
                                                       href="<?php echo base_url('index.php/Cart/updateSideCart/' . $item['id'] . '/decrement'); ?>"><span
                                                                class='glyphicon glyphicon-minus'></span></a>
                                                    <input id="<?php echo 'product_qty' . $item["id"]; ?>" type="number"
                                                           name="text" value="<?php echo $item['quantity']; ?>"
                                                           readonly="true">
                                                    <a class="btn update-btn" style="color: black" type="button"
                                                       href="<?php echo base_url('index.php/Cart/updateSideCart/' . $item['id'] . '/increment'); ?>"><span
                                                                class='glyphicon glyphicon-plus'></span></a>
                                                </td>
                                                <td id="side_price"><?php echo $item['quantity'] * $item['price'] . '.00'; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('index.php/Cart/removeSide/' . $item['id']); ?>"
                                                       class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>

                                    <?php if (!empty($meal)) {
                                        foreach ($meal as $item) { ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $item['name']; ?></th>
                                                <td><?php echo $item['price']; ?></td>
                                                <td>
                                                    <a class="btn update-btn" style="color: black"
                                                       href="<?php echo base_url('index.php/Cart/updateMealCart/' . $item['id'] . '/decrement'); ?>"><span
                                                                class='glyphicon glyphicon-minus'></span></a>
                                                    <input id="<?php echo 'product_qty' . $item["id"]; ?>" type="number"
                                                           name="text" value="<?php echo $item['quantity']; ?>"
                                                           readonly="true">
                                                    <a class="btn update-btn" style="color: black" type="button"
                                                       href="<?php echo base_url('index.php/Cart/updateMealCart/' . $item['id'] . '/increment'); ?>"><span
                                                                class='glyphicon glyphicon-plus'></span></a>
                                                </td>
                                                <td id="meal_price"><?php echo $item['quantity'] * $item['price'] . '.00'; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('index.php/Cart/removeMeal/' . $item['id']); ?>"
                                                       class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <p class="text-center">Your cart is empty...</p>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <a type="button" href='/PizzaNow/index.php/HomePage/menu'
                   style="background-color: green;font-weight: bold!important;color: white;border-radius: 10px!important;"
                   class="btn "><span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Continue Shopping</a>
            </div>

            <div class="col-sm-4">
                <h3>Order Summary</h3>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php if (!empty($cart)) {
                            foreach ($cart as $item) { ?>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr
                                    ">
                                    <td>Sub total</td>
                                    <td class="text-right"><?php echo $item["sub_total"] . '.00'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Charge</td>
                                        <td class="text-right"><?php echo $item["delivery_charge"] . '.00'; ?></td>
                                    </tr>
                                    <tr style="font-weight: bold;font-size: 18px">
                                        <td>Net Amount</td>
                                        <td class="text-right"><?php echo 'Rs.' . $item["price"] . '.00'; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="text-right">
                    <a type="button" href="<?php echo base_url('index.php/Cart/checkout/'); ?>" class="btn"
                       style="background-color: darkred;font-weight: bold!important;color: white;border-radius: 10px!important;">
                        Checkout &nbsp;<span class="glyphicon glyphicon-arrow-right"></span> </a>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Footer -->
<footer class="navbar-static-bottom navbar-fixed-bottom ">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://pizzanow.com/"> pizzanow.com</a>
        <p>
    </div>
</footer>
<!-- /Footer-->

</body>
</html>

