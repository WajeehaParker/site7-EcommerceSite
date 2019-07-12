<?php 
include('config/database.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#45bbff" />
    <title>Mart.pk</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <!-- Bootstrap -->

<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assest/css/font-awesome.min.css">
    <link rel="icon" href='assest/img/fav.png' type="image/x-icon" sizes="16x16">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assest/css/owl.carousel.css">
    <link rel="stylesheet" href="assest/style.css">
    <link rel="stylesheet" href="assest/css/responsive.css">
<style type="text/css">
        .error{
        color:red;
    }
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

 
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
              <ul>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="">
                                <a data-toggle="" data-hover="" class="" href="tel:+0333 2279021"><span class="key"><i class="fa fa-phone"></i></span><span class="value"> &nbsp; 0333 2279021 </span></a>
                             
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"><i class="fa fa-envelope"></i></span><span class="value"> &nbsp;info@Martpk.com </span></a>
                              
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                       <img src="assest/img/logo1.jpg">
                       <!--  <h1><a href="index.html">e<span>Electronics</span></a></h1> -->
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart Amount - Rs. 
                        
                            <span class="cart-amunt">
     <?php                       
  //cartcount
$cartTotal = 0;
if(isset($_SESSION['cart_array']) AND is_array(@$_SESSION['cart_array'])){
    foreach($_SESSION['cart_array'] AS $each_item){

    $item_id = $each_item['item_id'];
    $sql = mysqli_query($con, "select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id where pro.product_id=".$item_id." LIMIT 1");
    while ($row = mysqli_fetch_assoc($sql)) {
        $product_name = $row["pro_name"];
        $price = $row["unit_price"];
        $image = $row["image_path"];
    }
    $myquantity =  $each_item['quantity'];
        $pricetotal = $price * $myquantity;
         $cartTotal = $pricetotal + $cartTotal;
    }
}
echo "(".number_format($cartTotal).")";
//cartcount
?>

                        </span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php
//cartcount
$cartCount = 0;
if(isset($_SESSION['cart_array']) AND is_array(@$_SESSION['cart_array'])){
    foreach($_SESSION['cart_array'] AS $each_item){
        $cartCount = $cartCount + $each_item['quantity'];
    }
}
echo "(".$cartCount.")";
//cartcount
?> </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Category</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="User_login.php">Login</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
