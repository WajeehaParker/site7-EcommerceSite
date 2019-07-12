<?php 
ob_start();
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
                   
                      
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    
   <!-- Foam Css --> 
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background:  rgb( 71,143,143);
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid  rgb( 71,143,143);
}

/* Set a style for the submit button */
.btn {
  background-color:  rgb( 71,143,143);
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

.default {background-color: #e7e7e7; color: black;} /* Gray */ 
.default:hover {background: #ddd;}
</style>
   <!-- Foam Css End --> 

        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>User Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    
<center>
<br>

  <h2>Login Form</h2>
  <br>
  
<div class="headline style-2">
                            
                           
                 <img src="assest/img/br.png" width="400" height="200">
                            
                        </div>
                      </center>
                      <br>
                      <br>
                      
         <!-- Login Start-->                 
<?php
	

    // If form submitted, insert values into the database.
 if (isset($_POST['button'])){
		
	echo	$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		//$password = md5(stripslashes($_REQUEST['password']));
		//$password = mysqli_real_escape_string($con,$password);
		echo $password = md5('12');
	//Checking is user existing in the database or not
        echo $query = "SELECT * FROM `registered_users` WHERE reg_email='$username' and reg_password= '$password'";
        //$query = "SELECT * FROM registered_users WHERE reg_email='$username'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		 $rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
           echo "success";
			header("location: user_Dashboard.php"); // Redirect user to index.php
            }
			else{
				echo "<script>alert('Username & Password is incorrect..!');</script>";
             echo md5($password);
				}
    }
	else
	{
?>
    <!-- Modal content-->
 


      <form action="User_login.php" method="post" style="max-width:500px;margin:auto">

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="username">
  </div>

 
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password">
  </div>
  
   <button type="submit" name="button" class="btn">Sign in</button>
   <br>
   <br>
  
 

</form>

 

 <?php
 } 
 ?>
     <!-- Login End-->
     <div class="container">
    <br>
            


<a href="#" title="Edit Your Information"  class="btn btn-danger pm_tip_static_top btn-lg" id="myBtn1"><span class="glyphicon glyphicon-edit"></span> Create An Account</a>
    
               <br>
               </div>
     <!-- Registeration Foam-->
     
     <?php

       
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])){
		$username = stripslashes($_REQUEST['reg_name']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['reg_email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['reg_password']);
		$password = mysqli_real_escape_string($con,$password);
		$address = stripslashes($_REQUEST['reg_address']);
		$address = mysqli_real_escape_string($con,$address);
		$city = stripslashes($_REQUEST['reg_city']);
		$city = mysqli_real_escape_string($con,$city);
		$phone = stripslashes($_REQUEST['reg_phone_no']);
		$phone = mysqli_real_escape_string($con,$phone);
	
        $query = "INSERT INTO `registered_users` (`reg_id`, `reg_name`, `reg_email`, `reg_password`, `reg_address`, `reg_city`, `reg_phone_no`, `registration_date`,`res_status`) VALUES (NULL, '$username', '$email', '".md5($password)."', '$address', '$city', '$phone', NOW(),'Inactive')";
        $result = mysqli_query($con,$query);
        if($result){
			echo "<script>alert('Your Foam Has Been Submitted It Will Be Approve Soon. Thankyou..!');</script>";
            
        }
    }
	else
	
	{
?>
 
 <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
 <br><br><br><br><br><br>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <span style="alignment-adjust:central"><h4 class="modal-title">Registeration</h4></span>
      </div>
      <div class="modal-body">


        <p>  <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_name" class="form-control" 
                        id="" placeholder="Enter Your Name*" value=""/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_email" class="form-control"
                            id="" placeholder="Enter Your Email*" value=""/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password.</label>
                    <div class="col-sm-10">
                        <input type="password" name="reg_password" class="form-control"
                            id="" placeholder="Enter Your Password*" value=""/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Address.</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_address" class="form-control"
                            id="" placeholder="Enter Address*" value=""/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >City</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_city" class="form-control"
                            id="" placeholder="Enter City Name*" value=""/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="reg_phone_no" class="form-control"
                            id="" placeholder="Enter Phone no"/>
                    </div>
                  </div>
                  
       </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-default">Registered</button>
        </form>
      </div>
    </div>

  </div>
</div>      
<?php
	 
 } 
	  
 ?>
 
  


               <br>  

<script>
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#myModal1").modal();
    });
});
    </script>


<?php include 'sub_header/footer.php';
ob_flush() ; ?>