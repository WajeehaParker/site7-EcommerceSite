<!-- start category menu -->
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
                     <li><a href="" ></a></li>
                    
<?php
 $sql = "SELECT * FROM tbl_category ORDER BY `cat_id`";  
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
     {
        $cat_id=$row["cat_id"]; 
?>
          <li><a href="products.php?param=<?=$cat_id?>" ><?php echo   $row["cat_name"];  ?></a></li>   
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
        </div>
    </div> <!-- end category menu -->


    <br>
<br>
<div class="container">
            <div class="col-md-12 col-lg-12 col-sm-12">
      <form action="" method="post"><div style="display:none">

</div>                  <div class="input-group input-group-lg">
                        <input type="text" class="form-control" value="" name="Search" type="submit"placeholder="Search&hellip;">
                        <span class="input-group-btn">
                            <select name="Cat" class="btn btn-default">
                                <option value="0" >All Categories</option>
                                 
                                 <?php
$sql = "SELECT * FROM tbl_category"; 
$result = mysqli_query($con, $sql);

if (count($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result))
{

?>

<option href="subcategory.php" value='' class="first"><?php echo $row["cat_name"]; ?></option> 

<?php 
//  echo $row["cat_name"];
}
} 
else
{
echo "0 results";
}

//mysqli_close($con);
?>


</select>
     
      </span>
         
          <span class="input-group-btn">
           

  <button name="btn_search" class="btn btn-default" type="submit">
                                    Search
                                </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    <br>
<br>    <br>




<center>
<div class="headline style-2">
                            
                           
                 <img src="assest/img/br.png" width="400" height="200">
                            
                        </div>
                      </center>