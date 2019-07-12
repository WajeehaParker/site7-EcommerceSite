
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>

</head>

<body>
 <?php    
include("header.php");
		 $query = "SELECT * FROM `tbl_product` JOIN tbl_category on tbl_category.cat_id = tbl_product.cat_fk_id JOIN product_image on product_image.product_id = tbl_product.product_id";
    $result = mysqli_query($con,$query);
?>
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>                                        
                                            <th>Availability</th>
                                              <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>                                             
                                              <th>Product Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
<tbody>
 <tr>
                                           <?php while($row = mysqli_fetch_array($result)){ ?>
    <td><?php echo $row[0];  ?></td>
   <td><?php echo $row[1];  ?></td>
      <td><?php echo $row[2];  ?></td>
   <td><?php echo $row[3];  ?></td>
     <td><?php echo $row[4];  ?></td>
      <td><?php echo $row[7];  ?></td>
         <td><img src="<?php  echo $row[11]; ?>" alt="'.$product_name.'" width="40" height="52" border="1"/></td>
    <td><a href="productsview.php?product_id= <?php echo $row[0]; ?>"><button type="submit" class="btn btn-success btn-sm"> Update</button></a>
    </td>  
        
   </tr>
   <?php }?> 
   </tbody>       
</table>
                            </div>
                        </div>
                    </div>
                      </div>
            </div><!-- .animated -->
        </div><!-- .content -->

 <?php include('footer.php'); ?>

      
</body>
</html>