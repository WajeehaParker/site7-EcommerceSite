<?php include 'sub_header/head.php' ; ?>

<?php 
$update_arr = array();
$dataarr = array();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
  $wasFound = false;
  $i = 0;
  // If the cart session variable is not set or cart array is empty
  if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
      // RUN IF THE CART IS EMPTY OR NOT SET
    $_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
  } else {
    // RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
    foreach ($_SESSION["cart_array"] as $each_item) { 
          $i++;
          while (list($key, $value) = each($each_item)) {
          if ($key == "item_id" && $value == $pid) {
            // That item is in cart already so let's adjust its quantity using array_splice()
            array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
            $wasFound = true;
          } // close if condition
          } // close while loop
         } // close foreach loop
       if ($wasFound == false) {
         array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
       }
  }

}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



?>


    
    
        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>

<center><h2>You Have <?php 
if(isset($_SESSION["cart_array"]))
{
  if(count($_SESSION["cart_array"]) <= 1)
  {
    echo count($_SESSION["cart_array"])." item";
  }
  else if(count($_SESSION["cart_array"]) > 1)
  {
    echo count($_SESSION["cart_array"])." items";
  }
}
else
{
   echo '0 item';
} 

?> In Your Cart</h2></center>
   
   <center>
<div class="headline style-2">
                            
 <img src="assest/img/br.png" width="400" height="200">
                            
    </div>
   </center>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
             
  </div>
      </div>
    </div>
                  
                
      <div class="col-md-8">
      <div class="product-content-right">
    <div class="woocommerce">
  <!-- alert -->
                     


  <!-- alert -->    
 <form action="" method="post">         
   <table cellspacing="0" class="shop_table cart">
   <thead>
       <tr>
      <th class="product-remove">&nbsp;</th>

         <th class="product-thumbnail">Product Image</th>
         <th class="product-name">Product Name</th>
         <th class="product-price">Price</th>
         <th class="product-quantity">Quantity</th>
         <th class="product-subtotal">Total</th>
         </tr>
          </thead>
         <tbody>
                                    <!-- start -->
 <?php
//print_r($_POST['qtys']);
 $count = 0;
 if (!empty($_SESSION["cart_array"])) {
   foreach ($_SESSION["cart_array"] as $each_item) { 
$update_arr[$count]['item'] = $each_item['item_id'];
$count++;
   }
 }
 

//print_r($update_arr);

/*foreach ($update_arr as $key => $value) {
  echo $key.'-'.$value['item'].'-'.$value['qty'].'<br>';
}*/

if (isset($_POST['adjustBtn']) && $_POST['adjustBtn'] != "") {
    // execute some code
foreach ($update_arr as $key => $value) {

  $item_to_adjust = $value['item'];
  $quantity = $_POST['qtys'][$key];
  $quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
  if ($quantity >= 100) { $quantity = 99; }
  if ($quantity < 1) { $quantity = 1; }
  if ($quantity == "") { $quantity = 1; }
  $i = 0;
  foreach ($_SESSION["cart_array"] as $each_item) { 
          $i++;
          while (list($key, $value) = each($each_item)) {
          if ($key == "item_id" && $value == $item_to_adjust) {
            // That item is in cart already so let's adjust its quantity using array_splice()
            array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
          } // close if condition
          } // close while loop
  } // close foreach loop
}

}
?> 



     <form action="cart.php" method="post">                           
<?php
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {

$qq = array();
$cart_remove = 0;
  // Start the For Each loop
  $i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 

    $item_id = $each_item['item_id'];
    $sql = mysqli_query($con, "select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id where pro.product_id=".$item_id." LIMIT 1");
    while ($row = mysqli_fetch_assoc($sql)) {
        $product_name = $row["pro_name"];
        $price = $row["unit_price"];
        $image = $row["image_path"];
    }
    $myquantity =$each_item['quantity'];
    $pricetotal = $price * $myquantity;
    @$cartTotal = $pricetotal + $cartTotal;
    $pricetotal = $pricetotal;
    // Dynamic Checkout Btn Assembly
    $x = $i + 1; 

     
?>                                 
          <tr class="cart_item">
          <td class="product-remove">
       
          <a href="remove.php?index_to_remove=<?=$cart_remove?>" class="remove">X</a>
    
                            <!-- <a title="Remove this item" class="remove" href="">×</a> --> 
         </td>
     
                                            <td class="product-thumbnail">

         <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"  src="<?php echo 'adminpanel\\'.$image ?>">
                                            </td>

                                            <td class="product-name">
                               
          <a href=""><?=$product_name?></a>


                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?=$price?></span> 
                                            </td>
  
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                              
                    <input type="number" name="qtys[]" value="<?=$each_item['quantity']?>">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?=$pricetotal?></span> 
                                            </td>
                                        </tr>


<?php
$dataarr[] = $each_item['quantity'];
$dataarr[] = $qq;
$count .= $item_id.'-'.$each_item['quantity'].'<br>';
$cart_remove++;
}
}
//print_r($_SESSION["cart_array"]);
//echo $dataarr[0];
?>
<!-- end -->                                 <!-- update -->
<tr>
<td class="actions" colspan="6">
  <input name="adjustBtn" type="submit" class="add_to_cart_button" value="Update">      
</form>
</td>
 </tr>
                                    </tbody>
                                </table>
                          
</form>



 <div class="cart-collaterals">

 <div class="cart_totals">
    <h2>Cart Totals</h2>
<table cellspacing="0">
 <tbody>
                                       
 <tr class="shipping">
   <th>Delivery and Handling</th>
  <td>Free Delivery</td>
    </tr>
 <tr class="order-total">
    <th>Order Total</th>
    <td><strong><span class="amount"><?php echo $cartTotal; ?></span></strong> </td>
    </tr>
    <tr>
    
 <tr>
    
     <td class="actions" colspan="6">
        <form method="post">
 <?php
				 if(!isset($_SESSION['reg_id']))
				 {
					 if(isset($_SESSION["cart_array"]))
					 {
						if(count($_SESSION["cart_array"]) < 1)
						{
							?>
                              
<a href=""  onClick="alert('Please add some item in your basket');"  class="btn-info add_to_cart_button">PROCEED TO CHECKOUT</a>

							
							<?php
						}
						else
						{
							?>
                            
<a href="" data-toggle="modal" data-target="#myModal"class="btn-info add_to_cart_button">PROCEED TO CHECKOUT</a>

                            
                            <?php
							
						}
			     ?>       
                 	
                 <?php
					 }
					 else
					 {
						 ?>
                                                       
<a href="" onClick="alert('Please add some item in your basket');"  class="btn-info add_to_cart_button">PROCEED TO CHECKOUT</a>
						 

                         <?php
					 }
				 }
				 else
				 {
			     ?>
                 <a href="" type="submit" data-toggle="modal" name="sub" data-target="#myModal"  class="btn-info add_to_cart_button">PROCEED TO CHECKOUT</a>
				 	 
				 <?php	 
				 }
				 ?>           
                 </form>
                  </td></tr>
     </tbody>
    </table>
    </div>
 </div>
</div>                        
 </div>                    
  </div>
   </div>
    <tr>
                                           
  </div>
  </div>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Checkout</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
    <div class="form-group">
      <label for="usr">Name:</label>
   <input type="text" name="name" class="form-control" value="" id="usr">
   <div class="error"></div>
    </div>
    <div class="form-group">
      <label for="pwd">Phone Number:</label>
      <input type="text" name="mobile" class="form-control" value="" id="pwd">
      <div class="error"></div>
    </div>
    <div class="form-group">
      <label for="pwd">Email Address:</label>
      <input type="text" name="add" class="form-control" value="" id="pwd">
      <div class="error"></div>
    </div>
     <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" name="add2" class="form-control" value="" id="pwd">
      <div class="error"></div>
    </div>
     <div class="form-group">
      <label for="pwd"> Billing Address:</label>
      <input type="text" name="add3" class="form-control" value="" id="pwd">
      <div class="error"></div>
    </div>
     <p>Make your payment is secure. Please use your Order ID as the payment reference. Your order won’t be Delivered until the funds have cleared in our account.</p>
      <div class="form-group">

      <input type="submit" name="submit" class="btn btn-default" id="pwd">
    </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="add_to_cart_button" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <?php
if(isset($_POST['submit']))
{
	if(isset($_SESSION["cart_array"]))
	{
		if(count($_SESSION["cart_array"]) < 1)
		{
			echo "<script>alert('Please add some item in your basket');</script>";
		}
// 		else
// 		{
// $un_name=strtolower(trim($_POST['name']));$un_mob=strtolower(trim($_POST['mobile']));$un_add=strtolower(trim($_POST['add']));$un_add=strtolower(trim($_POST['add2']));
// if(!empty($un_name) && !empty($un_mob) && !empty($un_add))
// {
// $success = $valid->check_for_valid($un_name, "anaya","anaya@gmail.com","02134999100",$un_mob,"karachi","1","1");
 
// 	if($success=="success")
// 	{
// 	$time=date('H:i:s');
// 	$aid = $response["order_id"];
// 	foreach($_SESSION["cart_array"] as $inert)
// 	{
// 		$p_id = $inert['item_id'];
// 		$quantity = $inert['o_ammount'];
// 		$response=$master->insert("order_details",array('pro_fk_id'=>$p_id,  'quantity'=>$quantity, 'status_id'=>$aid));
					
						
// }
// unset($_SESSION["cart_array"]);
// echo "<script>alert('Your order has been successfully placed we will contact you in a minute');window.location='cart.php';</script>";
// }
// else
// {
// echo "<script>alert('$success');</script>";
// }
// }
// else
// {
// 	echo "<script>alert('Empty Fields');</script>";
// }
			
// }
		
}
else
{
		echo "<script>alert('Please add some item in your basket');</script>";
}

}
?>   
<!-- Modal -->
  <div class="modal fade" id="show" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Checkout</h4>
        </div>
        <div class="modal-body">
        
         <div class="alert alert-danger">
    <strong>Warning !</strong> Your Cart Is Empty Please Add An Item.
    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="add_to_cart_button" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="show1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Checkout</h4>
        </div>
        <div class="modal-body">
        
         <div class="alert alert-danger">
    <strong>Warning !</strong> Please Make Your Online Order Total Greater Than 500.
    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="add_to_cart_button" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<?php
if (isset($_POST['submit'])) {
$name= $_POST['name'];
$addres= $_POST['add2'];
$phone=$_POST['mobile'];
$email=$_POST['add'];
$billngadres=$_POST['add3'];
$totalamount = $cartTotal;  
$status = 2;
$query ="INSERT INTO `tbl_order` (`order_id`, `o_date`, `o_person_name`, `o_person_address`, `o_phone`, `sec_address`, `o_amount`, `status_id`) VALUES (NULL, NOW(), '$name', '$addres', '$phone', '$billngadres', '$totalamount', '$status')";
  $res = mysqli_query($con, $query);
 $last_id = mysqli_insert_id($con); 
 $order_no = rand();
  foreach($_SESSION["cart_array"] as $inert)
 {
 $p_id = $inert['item_id'];
$myquantity =$inert['quantity'];
$q = "SELECT `unit_price` FROM `tbl_product` WHERE product_id = '$p_id'";
$q1= mysqli_query($con,$q);
$q2= mysqli_fetch_assoc($q1);
 $price = $q2['unit_price'];
 $totalprQt =  $myquantity * $price; 
 $orderquery ="INSERT INTO `order_details` (`order_detail_id`, `order_no`, `order_id`, `pro_price`, `pro_quantity`, `pro_amount`, `pro_fk_id`) VALUES (NULL, '$order_no', '$last_id', '$price', '$myquantity', '$totalprQt', '$p_id')";
      $res1 = mysqli_query($con, $orderquery);    
            
}
 unset($_SESSION["cart_array"]);
 echo "<script>alert('Your order has been successfully placed we will contact you in a minute');window.location='cart.php';</script>";
}
?>
    <?php include 'sub_header/footer.php' ; ?>

