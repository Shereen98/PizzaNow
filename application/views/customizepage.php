
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Customize you pizza!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/css/customizepage.css')?>" rel="stylesheet">
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
                    echo "<li class='nav-item'><a href='/PizzaNow/index.php/HomePage'>Home</a></li>";
                    echo "<li class='nav-item active'><a href='/PizzaNow/index.php/HomePage/menu'>Menu</a></li>";
                    echo "<li class='nav-item cta cta-colored'><a href='/PizzaNow/index.php/Cart/' class='nav-link'><span class='glyphicon glyphicon-shopping-cart'></span> &nbsp; Cart</a></li>";
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
                                <input type="radio" name="size" value="<?php echo $pizza["regular_pizza_price"]; ?>" checked>
                            </label>
                            <label class="btn btn-default pizzaSize">
                                <div class="size">
                                    <p>Medium Pizza</p>
                                    <p><?php echo $pizza["medium_pizza_price"]; ?></p>
                                </div>
                                <input type="radio" name="size" value="<?php echo $pizza["medium_pizza_price"]; ?>">
                            </label>
                            <label class="btn btn-default pizzaSize">
                                <div class="size">
                                    <p>Large Pizza</p>
                                    <p><?php echo $pizza["large_pizza_price"]; ?></p>
                                </div>
                                <input type="radio" name="size" value="<?php echo $pizza["large_pizza_price"]; ?>">
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
                                                <input type="checkbox" class="topping" id="<?php echo $row["topping_id"]; ?>" autocomplete="off" name="topping" value="<?php echo $row["price"]; ?>">
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
                                                <input type="checkbox" class="topping" name="topping" id="<?php echo $row["topping_id"]; ?>"  value="<?php echo $row["price"]; ?>" autocomplete="off">
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
            <div class="text-left">
                <a type="button" href='/PizzaNow/index.php/HomePage/menu' class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left"></span></a>
            </div>
            <?php if(!empty($pizza)){ ?>
            <div class="thumbnail" id="model-thumbnail">
                <h3><?php echo $pizza["pizza_name"] ?></h3>
                <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($pizza['pizza_image']); ?>" />
                <div class="caption">
                    <p><?php echo $pizza["pizza_description"] ?></p>
                    <h2 class="text-center">Rs.<input id="total_price" type="number" name="text" value="<?php echo $pizza["regular_pizza_price"]; ?>" readonly="true"></h2>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-danger decrement"  type="button" ><span class='glyphicon glyphicon-minus'></span></button>
                            <input id="product_qty" type="number" name="text" value="1" readonly="true">
                            <input id="unit_price" type="number" name="text" value="1" hidden="true">
                        <button class="btn btn-success increment"  type="button"><span class='glyphicon glyphicon-plus'></span></button>
                        &nbsp;
                        <button class="btn menu-btn" onclick="addtocart(<?php echo $pizza['pizza_id']?>)" type="button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- /Content -->

<!--success modal-->
<div class="modal fade" id="success-modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Successfully added to the cart!</h5>
            </div>
            <div class="modal-footer text-center">
                <a type="button" style="background-color: maroon;color: white" class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="navbar-static-bottom">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>© 2020 Copyright: <a href="https://pizzanow.com/"> pizzanow.com</a><p>
    </div>
</footer>
<!-- /Footer-->

<script>
    $(function() {

        $('input[name=size]:first').attr('checked', true);
        let total = $('input[name=size]:checked').val();
        let fixedPrice = 0;

        //change price according to the selected size
        $('input[name=size]').change(function()  {

            total = $('input[name=size]:checked').val();


            if($(".topping").is(":checked")){
                let toppingPrice = 0;
                $("input[name=topping]:checked").each(function (){
                    toppingPrice = (parseFloat(toppingPrice) + parseFloat($(this).val())).toFixed(2);
                })
                total = parseFloat(parseFloat(toppingPrice)+parseFloat(total)).toFixed(2);
                fixedPrice = total;
                $("#unit_price").val(fixedPrice);
                alert(total)
            }else{
                total = $('input[name=size]:checked').val();
                fixedPrice = total;
            }

            $("#total_price").val(parseFloat(parseFloat(total)*parseFloat($("#product_qty").val())).toFixed(2));
            fixedPrice = total;
            $("#unit_price").val(fixedPrice);

        }).change();

        //change price according to the topping selected
        $(".topping").change(function (){
            let amountToAdd = 0;
            $(".topping").each(function (){
                if($(this).is(":checked")){
                    amountToAdd = (parseFloat(amountToAdd) + parseFloat($(this).val())).toFixed(2);
                }
            });
            fixedPrice = parseFloat(parseFloat(amountToAdd)+parseFloat(total)).toFixed(2);
            $("#unit_price").val(fixedPrice);
            $("#total_price").val(parseFloat(parseFloat(amountToAdd)+parseFloat(total)).toFixed(2));
        }).change();

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

    });

    function addtocart($id)
    {

        let qty = $("#product_qty").val();
        let price = $("#unit_price").val();
        let sub_total = $('#total_price').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/Cart/addPizza');?>",
            data: "id="+$id+"&qty="+qty+"&price="+price+"&sub_total="+sub_total,
            success: function(response){
                $('#success-modal').modal('show');
            }
        });

    }
</script>

</body>
</html>