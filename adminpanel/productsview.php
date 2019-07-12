 <?php    
	include('db.php');
if(isset($_GET['product_id'])){
	$msg="";
	$ID = $_GET['product_id'];
 $query = "SELECT * FROM `tbl_product` JOIN tbl_category on tbl_category.cat_id = tbl_product.cat_fk_id JOIN product_image on product_image.product_id = tbl_product.product_id WHERE tbl_product.product_id = '$ID'";
  $result = mysqli_query($con,$query);
  $res = mysqli_fetch_assoc($result);
}
if(isset($_POST['accept']))
{
	 $userid= $_POST['product_id'];
	$username= $_POST['pro_name'];
	$availability= $_POST['availability'];
	$unit_price= $_POST['unit_price'];
	$stock= $_POST['stock'];
$query = "UPDATE `tbl_product` SET `pro_name`='$username',`cat_fk_id`='52',`availability`='$availability',`unit_price`='$unit_price',`stock`='$stock' WHERE product_id= '$userid';";
$result= mysqli_query($con,$query);
}
if(isset($_POST['decline']))
{
	 $idd = $_POST['product_id'];
     $CreateSQL = "DELETE FROM `tbl_product` WHERE product_id = $idd";  
    $res = mysqli_query($con, $CreateSQL);
    if($res)
    { 

  $id_to_delete = $idd;
  $result5= mysqli_query($con,"SELECT `Image_Name` FROM `product_image` WHERE product_id = '$id_to_delete'");
  $res2 = mysqli_fetch_assoc($result5);
  echo $pic= $res2['Image_Name'];
    //  echo "<script> alert('$pic');</script>";
  $sql = mysqli_query($con,"DELETE FROM `product_image` WHERE `product_id`='$id_to_delete'") ;

$newFileName = substr($pic, 0 , (strrpos($pic, ".")));

$pictodelete = ("proimage/$newFileName.png");
   //echo "<script> alert('$pictodelete');</script>";
  if(file_exists($pictodelete))
   {
   unlink($pictodelete);
  }
 header("Location:ListOfProducts.php");
    }
    else{
        echo "<script> alert('Data Not Deleted');</script>";
    }
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product View</title>

</head>

<body>
<?php include("header.php"); ?>
 <div class="container">
 <form   method="post" >
<div class="coupon">
  <div class="container">
     <h2> PRODUCT DETAILS</h2>
  </div>
<?php


?>
  <img src="<?php  echo $res['image_path']; ?>"  alt="Avatar"  border="1" style="width:70%; height: 400px;">
  <br>
  <br>
  <div class="form-group">
   <div class="input-group">
   <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
  
      <input type="text" id="product_id" name="product_id"  class="form-control" value=" <?php echo $res['product_id']; ?>">
        </div>
      </div>
      
      <div class="form-group">
         <div class="input-group">
        <div class="input-group-addon">Product Name:</div>
 <input type="text" id="pro_name" name="pro_name" class="form-control" value=" <?php echo $res['pro_name']; ?>">
        </div>
      </div>
                                <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Available</div>
         <input type="text" id="email" name="availability" placeholder="availability" value=" <?php echo $res['availability']; ?>" class="form-control">
               </div> </div>
           <div class="form-group">
              <div class="input-group">
            <div class="input-group-addon">Price</div>
        <input type="text" id="unit_price" name="unit_price"  value=" <?php echo $res['unit_price']; ?>" class="form-control">   </div>   </div>
      <div class="form-group">
              <div class="input-group">
     <div class="input-group-addon">Quantity</div>
                      <input type="text"  name="stock"  value="<?php echo $res['stock']; ?>" class="form-control">   </div>   </div>

</div>
<br>
<style>
.coupon {

  
  border-radius: 15px;
  margin: 0 auto;
  max-width: 900px;
  width: 70%;
  
}

.container {

  padding: 2px 16px;
  background-color: #f1f1f1;
}

.promo {
  background: #ccc;
  padding: 3px;
}

.expire {
  color: red;
}
</style>
   
   <div class="row form-group">
        <div class="col col-md-3"><input type="file" name="file[]" size="50" multiple="multiple"></div>
                       </div>
      <span class="form-actions form-group"><button type="submit" name="accept" class="btn btn-success btn-sm">UPDATE</button></span>
  
      <span class="form-actions form-group"><button type="submit" name="decline" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure You Want To Delete This Product?')">DELETE</button></span>
      
      <a href="ListOfProducts.php"><p style="text-align:right">Back To List</p></a> 
               </form><br />

</div>
<?php include("footer.php"); ?>

</body>
</html>