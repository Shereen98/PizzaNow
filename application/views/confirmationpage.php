<!DOCTYPE html>
<html lang="en">
<head>
    <title> Order Confirmation </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/common.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="container">
    <?php if(!empty($customer)) { foreach ($customer as $item) { ?>
    <div class="jumbotron text-center" style="background-color: maroon">
        <h2 style="color: #ffce33;font-family: 'Dancing Script';font-size: 40px">Thank you <?php echo $item['first_name'].' '.$item['last_name']; ?>!</h2>
        <p style="color: white;font-family: 'Proza Libre';font-size: 20px">Your order will be delivered to <span ><?php echo $item['street_no'].', '.$item['city']; ?></span>. The estimated delivery time is <span><?php echo $delivery_time; ?></span>.</p>
        <a href="<?php echo base_url('index.php/Checkout/destroySession'); ?>" style="background-color: black;font-weight: bold!important;color: #ffce33;border-radius: 10px!important;" class="btn menu-btn">Go back to home</a>
    </div>
    <?php } }else{ ?>
        <p>Sorry Something is wrong!</p>
    <?php } ?>
</div>

</body>
</html>