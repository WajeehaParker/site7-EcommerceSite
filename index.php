<?php include 'sub_header/head.php' ; ?>
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-phone"></i>
                        <p>CALL US NOW</p>
                        <p style="font-size: 16px;">0333 2279021</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>FREE SHIPPING</p>
                       <p style="font-size: 16px;">All over the Pakistan</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>SECURE PAYMENTS</p>
                        <p style="font-size: 18px;">100% Secure</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-shopping-cart"></i>
                        <p>SHOPPING CART</p>
                        <p style="font-size: 18px;">Easy To Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Recent Product</h2>
                        <div class="product-carousel">
     <?php
//Run a select query to get my latest 6 items.

$sql = "select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id ORDER BY pro.product_id DESC LIMIT 10 ";
$result = mysqli_query($con, $sql);
 $r = mysqli_num_rows($result);
//print_r(mysqli_fetch_assoc($result));
//echo count($result);
if ($r  > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        //echo "string";exit();
        $id = $row["product_id"];
        $product_name = $row["pro_name"];
        $price = $row["unit_price"];
        $image = $row["image_path"];
        //$date_added = strftime("%b %d, %y", strtotime($row["date_added"]));
 ?>


                      <!--  -->
                             <div class="single-product" style="height: 80%; width: 200px;">
                                <div class="product-f-image" >
                                <input type="hidden" id="m_id" name="p_id" value="">
                                    <img src="<?php echo 'adminpanel\\'.$image ?>" alt="" width="80%" height="50% border="1">
                                    <div class="product-hover">
                                      <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Shop Now</a>
            <a href="detail.php?param=<?=$id?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <center>
                                <h2><a href=""><?=$product_name?></a></h2>
                               
                                <div class="product-carousel-price">
                                   <div class="product-wid-rating"> <ins style="font-size: 18px"><?=$price?></ins>   
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                                </div> 
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" class="btn btn-info" value="Add to Cart" />
      </form>
    

                                      <a href="detail.php?param=<?=$id?>" class="btn btn-warning">See Deatils</a>
                                 </center>
                            </div>
                            <!--  -->
                           
     <?php  

    }
}
else
{
    echo "You have no products listed in our store yet.";
}
//mysqli_close();
?>                        
                      

                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>

<!-- Our Birds -->
<br><br><br><br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sale Product</h2>
                        <div class="product-carousel">

 <?php
//Run a select query to get my latest 6 items.

$sql = "select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id WHERE type=1";
$result = mysqli_query($con, $sql);
$r = mysqli_num_rows($result);
//print_r(mysqli_fetch_assoc($result));
//echo count($result);
if ($r > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        //echo "string";exit();
        $id = $row["product_id"];
        $product_name = $row["pro_name"];
        $price = $row["unit_price"];
        $image = $row["image_path"];
        //$date_added = strftime("%b %d, %y", strtotime($row["date_added"]));
 ?>
 
                        <!--  -->
                             <div class="single-product">
                                <div class="product-f-image">
                                <input type="hidden" id="m_id" name="p_id" value="">
                                    <img src="<?php echo 'adminpanel\\'.$image ?>" alt="">
                                    <div class="product-hover">
                                      <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Shop Now</a>
            <a href="detail.php?param=<?=$id?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <center>
                                <h2><a href=""><?=$product_name?></a></h2>
                               
                                <div class="product-carousel-price">
                                   <div class="product-wid-rating"> <ins style="font-size: 18px"><?=$price?></ins>   
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                                </div> 
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" class="btn btn-info" value="Add to Cart" />
      </form>
    

                                      <a href="detail.php?param=<?=$id?>" class="btn btn-warning">See Deatils</a>
                                 </center>
                            </div>
                            <!--  -->
                           
                            
                   
<?php  

    }
}
else
{
    echo "You have no products listed in our store yet.";
}
//mysqli_close();
?>                        
                      

                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>

     <!--    our fedds -->
<br><br><br><br><br><br>
           <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Feature Product</h2>
                        <div class="product-carousel">

                            
 <?php
//Run a select query to get my latest 6 items.

$sql = "select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id WHERE type=2";
$result = mysqli_query($con, $sql);
$r = mysqli_num_rows($result);
//print_r(mysqli_fetch_assoc($result));
//echo count($result);
if ($r > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        //echo "string";exit();
        $id = $row["product_id"];
        $product_name = $row["pro_name"];
        $price = $row["unit_price"];
        $image = $row["image_path"];
        //$date_added = strftime("%b %d, %y", strtotime($row["date_added"]));
 ?>
 
                        <!--  -->
                             <div class="single-product">
                                <div class="product-f-image">
                                <input type="hidden" id="m_id" name="p_id" value="">
                                    <img src="<?php echo 'adminpanel\\'.$image ?>" alt="">
                                    <div class="product-hover">
                                      <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Shop Now</a>
            <a href="detail.php?param=<?=$id?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <center>
                                <h2><a href=""><?=$product_name?></a></h2>
                               
                                <div class="product-carousel-price">
                                   <div class="product-wid-rating"> <ins style="font-size: 18px"><?=$price?></ins>   
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                                </div> 
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" class="btn btn-info" value="Add to Cart" />
      </form>
    

                                      <a href="detail.php?param=<?=$id?>" class="btn btn-warning">See Deatils</a>
                                 </center>
                            </div>
                            <!--  -->
                           
                            
                   
<?php  

    }
}
else
{
    echo "You have no products listed in our store yet.";
}
//mysqli_close();
?>                     

                           
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Brands</h2>
                        <div class="brand-list">
                            <img src="assest/img/services_logo__1.png" alt="">
                            <img src="assest/img/services_logo__2.jpg"  alt="">
                            <img src="assest/img/services_logo__3.jpg"   alt="">
                            <img src="assest/img/services_logo__4.jpg"   alt="">
                            <img src="assest/img/services_logo__1.png" alt="">
                            <img src="assest/img/services_logo__2.jpg"   alt="">
                            <img src="assest/img/services_logo__3.jpg"  alt="">
                            <img src="assest/img/services_logo__4.jpg"  alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    
    
    <?php include 'sub_header/footer.php' ; ?>
      
