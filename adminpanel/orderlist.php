 <?php    
include("header.php");
		 $query = "SELECT DISTINCT(order_details.order_no),tbl_order.* FROM `tbl_order` JOIN order_details on tbl_order.order_id = order_details.order_id";
    $result = mysqli_query($con,$query);
if(isset($_GET['$r']))
{
	echo $id = $r;
	echo "<br>";
echo $val = $_GET['$rt'];
	echo "<br>";
echo $update = "UPDATE `tbl_order` SET `status_id`= '$val' WHERE $id";
	echo "<br>";
    $resulting = mysqli_query($con,$update);
echo "updated";
}

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
                            	<form action="orderlist.php" method="get">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Order Id</th>
                                            <th>Date</th>                                        
                                            <th>Person Name</th>
                                              <th>Address</th>
                                            <th>Phone No</th>
                                            <th>Billing Address</th>                                             
                                              <th>Total Amount</th>
                                                <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

<tbody>
 <tr>
                                           <?php while($row = mysqli_fetch_array($result)){ ?>
                                           
   <td ><?php echo  $row[1];  ?></td>
      <td><?php echo $row[2];  ?></td>
   <td><?php echo $row[3];  ?></td>
     <td><?php echo $row[4];  ?></td>
       <td><?php echo $row[5];  ?></td>
         <td><?php echo $row[6];  ?></td>
         <td><?php echo $row[7];  ?></td>
 
<td>  <select name="<?php echo $rt= $row[1]; ?>">
         	 <?php
    $query1="select * from order_status";
$sql =mysqli_query($con,$query1);
         	  while($ord = mysqli_fetch_array($sql)){ ?>
         	<option  value="<?php echo $ord[0]; ?>"> <?php echo $ord[1]; ?></option>
         	 <?php } ?>
               	  </select></td> 
        
    <td>    	
    <input type="submit" name="<?php echo $r= $row[1]; ?>" class="btn btn-success btn-sm" value="Update"> 
    <br><br><a href="Ordersview.php?order_details_id= <?php echo $row[1]; ?>"><button type="submit" name="order_details_id" class="btn btn-primary btn-sm"> Order Details</button></a>	
    	   	
    </td>  
     </tr>
   <?php }?> 
   </tbody>       
</table>
 </form>                            </div>
                        </div>
                    </div>
                      </div>
            </div><!-- .animated -->
        </div><!-- .content -->

 <?php include('footer.php'); ?>