<?php include 'sub_header/head.php' ; ?>
    

    
        <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Product Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
  <?php
    $sql = mysqli_query($con, "select pro.*,img.image_path from tbl_product as pro inner join product_image as img on pro.product_id = img.product_id where pro.product_id=".$_GET['param']." LIMIT 1");
    $row = mysqli_fetch_assoc($sql);
    $id = $row["product_id"];
    $product_name = $row["pro_name"];
    $price = $row["unit_price"];
    $image = $row["image_path"];

    // $details=$row["Details"];
  ?>            

 <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
               <!--      <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div> -->
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>



                    </div>
                    
                  
                </div>
      
                    <div class="product-content-right">
                       
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img" height="240" width="240" >
                                       <img src="<?php echo 'adminpanel\\'.$image ?>" width="100" height="300 border="1">
                                   </div>
                                    
                                   
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $product_name?></h2>
                                    <div class="product-inner-price">
                                       <ins style="font-size: 18px">Rs. <span id="upper_price"><?php echo $price ?></span></ins>
                                      
                                  </div>    
                               
        


       <form method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <div class="quantity">
        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" max="10">
        </div>
         <input type="submit" class="add_to_cart_button" value="Add to Cart" />
       
                                   </form>      
                                    
                             <br>
                             <br> 
                                
                       <div role="tabpanel">
                  <ul class="product-tab" role="tablist">
 <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
        </ul>
   <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>No Reviews</h2>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        

                            </div>
               
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php include 'sub_header/footer.php' ; ?>
