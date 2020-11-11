<!DOCTYPE html>
<html lang="en">
<head>
    <title> Checkout </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/cartpage.css')?>" rel="stylesheet">
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
                    echo "<li class='nav-item'><a href='/PizzaNow/HomePage'>Home</a></li>";
                    echo "<li class='nav-item'><a href='/PizzaNow/HomePage/menu'>Menu</a></li>";
                    echo "<li class='nav-item'><a href=''>About Us</a></li>";
                    echo "<li class='nav-item'><a href='#contact'>Contact</a></li>";
                    echo "<li class='nav-item cta cta-colored'><a href='/PizzaNow/Cart/' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span> &nbsp; Cart</a></li>";
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
            <div class="col-sm-7">
                <h3>Order Summary</h3>
                <hr>

                <!-- Side Cart -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($pizza) || !empty($side) || !empty($meal)) { ?>
                                <table class="table cart-table">
                                    <thead >
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th class="text-center" scope="col">Unit Price (Rs.)</th>
                                        <th class="text-center" scope="col">Qty</th>
                                        <th class="text-center" scope="col">Total (Rs.)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if(!empty($pizza)) { foreach ($pizza as $item) { ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $item['name'].' Pizza'; ?></th>
                                            <td><?php echo $item['price']; ?></td>
                                            <td>
                                                <?php echo $item['quantity'];?>
                                            </td>
                                            <td id="pizza_price"><?php echo $item['quantity']*$item['price'].'.00'; ?></td>
                                        </tr>
                                    <?php }} ?>

                                    <?php if(!empty($side)) { foreach ($side as $item) { ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $item['name']; ?></th>
                                            <td><?php echo $item['price']; ?></td>
                                            <td>
                                                <?php echo $item['quantity'];?>
                                            </td>
                                            <td id="side_price"><?php echo $item['quantity']*$item['price'].'.00'; ?></td>
                                        </tr>
                                    <?php }} ?>

                                    <?php if(!empty($meal)) { foreach ($meal as $item) { ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $item['name']; ?></th>
                                            <td><?php echo $item['price']; ?></td>
                                            <td>
                                                <?php echo $item['quantity'];?>
                                            </td>
                                            <td id="meal_price"><?php echo $item['quantity']*$item['price'].'.00'; ?></td>
                                        </tr>
                                    <?php }} ?>

                                    <br>

                                    <?php if(!empty($cart)) { foreach ($cart as $item) { ?>
                                         <tr class="text-right">
                                             <td></td>
                                             <td></td>
                                             <th><h4 style="font-weight: bold">Net Amount</h4> </th>
                                             <th class="text-center" ><h4 style="font-weight: bold"><?php echo $item["price"].'.00'; ?></h4></th>
                                        </tr>
                                    <?php }} ?>

                                    </tbody>
                                </table>

                            <?php }else{ ?>
                                <p class="text-center">Your cart is empty...</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <a type="button" href='/PizzaNow/Cart/' style="background-color: #ffce33;font-weight: bold!important;color: black;border-radius: 10px!important;" class="btn "><span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Back to cart</a>
            </div>

            <div class="col-sm-5">
                <h3>Enter your contact information</h3><hr>
                <form action="<?php echo site_url('Checkout/confirmOrder/');?>" method="post">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <label for="Name"><h5 style="font-weight: bold">Name*</h5></label>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <input class="form-control input-sm" placeholder="First Name" name="first_name" type="text" required>
                                </div>
                                <div class="col-xs-6">
                                    <input class="form-control input-sm" placeholder="Last Name" name="last_name" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-body">
                            <label for="Address"><h5 style="font-weight: bold">Address*</h5></label>
                            <div class="form-group row">
                                <div class="col-xs-3">
                                    <input class="form-control input-sm" placeholder="No" name="street_no" type="text" required>
                                </div>
                                <div class="col-xs-9">
                                    <input class="form-control input-sm" placeholder="Street Name, City" name="city" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <label for="Mobile"><h5 style="font-weight: bold">Phone Number*</h5></label>
                            <div class="form-group row">
                                <div class="col-xs-7">
                                    <input class="form-control input-sm" type="tel" id="mobile" name="mobile" placeholder="Ex : 0771 456 234" pattern="(0)\d{9}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit"style="width:100%;background-color: darkred;font-weight: bold!important;color: white;border-radius: 10px!important;" data-toggle="modal" data-target="#myModal" class="btn btn-danger"> Confirm Order</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<footer class="navbar-static-bottom navbar-fixed-bottom ">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://mdbootstrap.com/"> pizzanow.com</a><p>
    </div>
</footer>
<!-- /Footer-->


</body>
</html>
