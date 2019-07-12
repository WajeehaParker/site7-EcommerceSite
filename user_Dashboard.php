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
                         <li><a href="logout.php">Logout</a></li>
                   
                      
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->


<?php


if(isset($_POST['update']))

{ 
$id =['reg_id'];
$name = $_POST['reg_name'];
$email = $_POST['reg_email'];
$password = $_POST['reg_password'];
$address  = $_POST['reg_address'];
$city  = $_POST['reg_city'];
$phone = $_POST['reg_phone_no'];


	
	

$sql="UPDATE `registered_users` SET reg_name='$name', reg_email='$email', reg_password='$password',reg_address='$address',reg_phone_no='$phone', WHERE reg_id='$id'";
$res = mysqli_query($con, $sql);
  if($res)
  {
    //echo "Updated";
echo "<script>alert('Successfully Update'); window.location='user_Dashboard.php';</script>";
echo "<BR>";

  } 
else 
{
	echo "Data Not Updated";
}

  }
  if(isset($_GET['reg_id'])){
  $id = $_GET['reg_id'];
  $sql= "SELECT * `registered_users` FROM  WHERE reg_id = $id";
    $res = mysqli_query($con, $sql);
  $r = mysqli_fetch_assoc($res);
  }
?>




     <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
 <br><br><br><br><br><br>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <span style="alignment-adjust:central"><h4 class="modal-title">ACCOUNT INFORMATION</h4></span>
      </div>
      <div class="modal-body">


        <p>  <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_name" class="form-control" 
                         value="<?php if(!empty($res)){ echo $res["reg_name"]; } ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_email" class="form-control"
                         value="<?php if(!empty($res)){ echo $res["reg_email"]; } ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password.</label>
                    <div class="col-sm-10">
                        <input type="password" name="reg_password" class="form-control"
                        value="<?php if(!empty($res)){ echo $res["reg_password"]; } ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Address.</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_address" class="form-control"
                         value="<?php if(!empty($res)){ echo $res["reg_address"]; } ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >City</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_city" class="form-control"
                            value="<?php if(!empty($res)){ echo $res["reg_city"]; } ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_phone_no" class="form-control"
                         value="<?php if(!empty($res)){ echo $res["reg_phone_no"]; } ?>"/>
                    </div>
                  </div>
                  
       </div>
      <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
      </div>
    </div>

  </div>
</div>      


<!--Update code end from here-->

   <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color:rgb( 71,143,143);
    color: white;
}
</style> 

    
        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>User Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    
 <center>
<div class="headline style-2">
                            
 <img src="assest/img/br.png" width="400" height="200">
                            
    </div>
   </center>
   
   <br>
   <br>
    <div class="container">
    <br><br>
            <div class="row">
<h2><span style="color:#333">HI, </span>

<span style="float:right"><a href="#" title="Edit Your Information"  class="btn btn-danger pm_tip_static_top btn-lg" id="myBtn1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
     </span></h2>
               <br>  
    
   
</div>
        </div>
<script>
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#myModal1").modal();
    });
});
    </script>
     
    
    <?php include 'sub_header/footer.php' ; ?>