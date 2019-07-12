
<?php include 'sub_header/head.php' ; ?>
    
    
        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Product</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'sub_header/categoryheader.php' ; ?>







<div class="container">
 <div class="row">


  <input type="hidden" id="m_id" name="p_id" value="">
    <?php
//Run a select query to get my latest 6 items.
 $param = $_GET['param'];
$sql ="select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id where pro.cat_fk_id='$param'"; 

$result = mysqli_query($con,$sql);
//print_r(mysqli_fetch_assoc($result));
//echo count($result);
if ($result) {
    
    while($row = mysqli_fetch_assoc($result))
    {        //echo "string";exit();
        $cat_id=$row["cat_fk_id"];
        $id = $row["product_id"];
        $product_name = $row["pro_name"];
        $price = $row["unit_price"];
        $image = $row["image_path"];
        //$date_added = strftime("%b %d, %y", strtotime($row["date_added"]));
 ?><div class="col-sm-4 col-md-4" style="height: 400px;">
                              <center>
                                <h2><?php echo $product_name ?></h2>
                               <img src="<?php echo 'adminpanel\\'.$image ?>" width="100" height="300 border="1">
                                 <h4> PRICE :<?php echo $price ?></h4>
                                       <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <br>
        <input type="submit" class="btn btn-info" value="Add to Cart" />
      </form><br>
     <a href="detail.php?param=<?php echo $id ?>" class="btn btn-warning">See Details</a>
                                 </center>
                            </div>
                              <?php  

    }?>
</div>


 </div>     
                              
                      
                           
     <?php  

   
}
else
{
    echo "You have no products listed in our store yet.";
}
//mysqli_close();
?>                                    
         
                
              
            <br> <br> <br>
           

  <?php include 'sub_header/footer.php' ; ?>
