
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>MART.PK</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/BirdZoneKarachi/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories </h2>
                        <ul>
                                                
<?php
 $sql = "SELECT * FROM tbl_category ORDER BY `cat_id`";  
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
     {
         
?>
          <li><a href="subcategory.php" ><?php echo   $row["cat_name"];  ?></a></li>   
<?php   
        //  echo   $row["cat_name"];
    }
} 
else
 {
    echo "0 results";
}


?>

                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation</h2>
                        <ul>
                          <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Category</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                           
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <br><br><br><br><br>
                    <div class="copyright">
                        <p>&copy; 2019 Mart.pk . All Rights Reserved. </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                  
                <h2><span style="color: #fff;">Mart.pk</span></h2>
                  <h4  style="color: #fff;">Online Shopping</h4></center>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="assest/js/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="assest/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="assest/js/owl.carousel.min.js"></script>
    <script src="assest/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="assest/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="assest/js/main.js"></script>

  </body>
</html>    