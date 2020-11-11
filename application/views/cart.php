<!DOCTYPE html>
<html lang="en">
<head>
    <title> Welcome to PizzaNow!</title>
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

                echo "<li class='nav-item active-tab'><a href='/PizzaNow/HomePage'>Home</a></li>";
                echo "<li class='nav-item'><a href='/PizzaNow/HomePage/menu'>Menu</a></li>";
                echo "<li class='nav-item'><a href=''>About Us</a></li>";
                echo "<li class='nav-item'><a href='#contact'>Contact</a></li>";
                echo "<li class='nav-item cta cta-colored active'><a href='/PizzaNow/Cart/' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span> &nbsp;0 items - Rs.0.00</a></li>";

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
                            <?php if(!empty($pizza) || !empty($side)) { ?>
                                <table class="table table-hover">
                                    <thead >
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th class="text-center" scope="col">Unit Price (Rs.)</th>
                                        <th class="text-center" scope="col">Qty</th>
                                        <th class="text-center" scope="col">Total (Rs.)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php  foreach ($pizza as $item) { ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $item['name'].' Pizza'; ?></th>
                                        <td><?php echo $item['price']; ?></td>
                                        <td>
                                            <button class="btn"  type="button" onclick="decrementQty(<?php echo $item['id'];?>)" ><span class='glyphicon glyphicon-minus'></span></button>
                                            <input  id="<?php echo 'product_qty'.$item["id"]; ?>" type="number" name="text" value="<?php echo $item['quantity'];?>" readonly="true">
                                            <button class="btn" type="button" onclick="incrementQty(<?php echo $item['id'];?>)" ><span class='glyphicon glyphicon-plus'></span></button>
                                        </td>
                                        <td><?php echo $item['quantity']*$item['price']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('Cart/removePizza/'. $item['id']);?>" class="btn btn-warning">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                   <?php  foreach ($side as $item) { ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $item['name']; ?></th>
                                        <td><?php echo $item['price']; ?></td>
                                        <td>
                                            <button class="btn decrement"  type="button")" ><span class='glyphicon glyphicon-minus'></span></button>
                                            <input  id="<?php echo 'product_qty'.$item["id"]; ?>" type="number" name="text" value="<?php echo $item['quantity'];?>" readonly="true">
                                            <button class="btn increment" type="button" ><span class='glyphicon glyphicon-plus'></span></button>
                                        </td>
                                        <td><?php echo $item['quantity']*$item['price']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('Cart/removeSide/'. $item['id']);?>" class="btn btn-warning">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                   <?php } ?>
                                    </tbody>
                                </table>
                            <?php }else{ ?>
                                <p class="text-center">Your cart is empty...</p>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <a type="button" href='/PizzaNow/HomePage/menu' class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Continue Shopping</a>
            </div>

            <div class="col-sm-4">
                <h3>Order Summary</h3><hr>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Sub total</td>
                                <td>Rs.0.00</td>
                            </tr>
                            <tr>
                                <td>Service charge (5.00%)</td>
                                <td>Rs.0.00</td>
                            </tr>
                            <tr>
                                <td>Net Amount</td>
                                <td>Rs.0.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn checkout-btn"> Checkout &nbsp;<span class="glyphicon glyphicon-arrow-right"></span> </button>
                </div>
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

<script>
    $(function() {

        //increment the quantity
        $('.increment').click(function () {
            document.getElementById("product_qty").stepUp(1);
            $("#total_price").val(parseFloat(parseFloat(fixedPrice)*parseFloat($("#product_qty").val())).toFixed(2));
        });

        //decrement the quantity
        $('.decrement').click(function () {
            let quantity = document.getElementById("product_qty").value;

            if(quantity && quantity > 1){
                document.getElementById("product_qty").stepDown(1);
            }else{
                quantity = 1;
            }

            $("#total_price").val(parseFloat(parseFloat(fixedPrice)*parseFloat($("#product_qty").val())).toFixed(2));
        })
    }
    // let tag_id = 'product_qty';
    //
    // function incrementQty($id){
    //     document.getElementById(tag_id.concat($id)).stepUp(1);
    // }
    //
    // function decrementQty($id){
    //     let quantity = document.getElementById(tag_id.concat($id)).value;
    //
    //     if(quantity>1){
    //         document.getElementById(tag_id.concat($id)).stepDown(1);
    //     }else{
    //         quantity = 1;
    //     }
    // }
    // // Update item quantity
    // function updateCartItem(obj, rowid){
    //    console.log(obj);
    //    console.log(rowid);
    // }
</script>

</body>
</html>

