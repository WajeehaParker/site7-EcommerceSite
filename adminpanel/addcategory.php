<?php

ob_start();
?>
<?php
include('header.php');
  $msg="";
if(isset($_POST['insert']) && !isset($_GET['catid'])  )
{	
    if(!empty($_POST['catname']))
    {
$catname = $_POST['catname'];
$query = mysqli_query($con,"select cat_id from tbl_category WHERE cat_name = '$catname'");

$numrows = mysqli_num_rows($query);
	if($numrows > 0)
	{
 $msg = "Category Already Exist";

	}
	else{
$query ="INSERT INTO `tbl_category`(`cat_id`, `cat_name`) VALUES (NULL,'$catname');";
	$res = mysqli_query($con, $query);
	if($res)
	{
$msg = " Data Inserted";
	}
}
}
else
{
$msg = "No Record To Insert";
}
}
		
?>

<?php
if(isset($_POST['insert']) && isset($_GET['catid']))
{
    $idd = $_GET['catid'];
  $catname = $_POST['catname'];  
     $CreateSQL = "UPDATE `tbl_category` SET `cat_name` = '$catname' WHERE `cat_id` = '$idd';";
    $res12 = mysqli_query($con, $CreateSQL);
    if($res12)
    {
    $msg = 'Data Successfully Updated ';
    
    }
    else{
        
$msg = 'Data Not Updated ';
    }

}

?>

<?php
  //get data table
    if(isset($_GET['catid'])){
    $id = $_GET['catid'];
    $SelectSQl = "select * from tbl_category where cat_id = $id";
        $res = mysqli_query($con, $SelectSQl);
    $r = mysqli_fetch_assoc($res);
    }
?>
<?php
//delete data
if(isset($_GET['delcatid'])  )
{
     $idd = $_GET['delcatid'];
     $CreateSQL = "DELETE FROM `tbl_category` WHERE cat_id = $idd";

    $res = mysqli_query($con, $CreateSQL);
    if($res)
    {
header("location:addcategory.php");

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
<title>Add Category Item</title>
</head>

<body>
 <br />
<br />
<div class="container" >
      <div class="col-lg-6">
                        <div class="card" >
                            <div class="card-header">
                                <strong>Add Category</strong> 
                            </div>
                            <div class="card-body card-block">
                                <form  method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-5"><label  class=" form-control-label">Category Name:	</label></div>
  <div class="col-12 col-md-7"><input type="text" name="catname" placeholder="Add Category" class="form-control" value="<?php if(!empty($r)){ echo $r["cat_name"]; } ?>"/></div><span style="color:red;"><?php echo $msg; ?></span>
                                    </div>
                                   
                               
                            </div>
                            <div class="card-footer">
 <button type="submit" name="insert" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i>   <?php if(isset($_GET['catid'])){ echo 'Update'; } else {  echo 'Insert'; }?>

 </button>  
                                  
                               
                           </form>
                            </div>
                        </div>

</div>
<?php
$catList="";
$query = "select * from tbl_category";
$sql= mysqli_query($con,$query);

?>
<!-- table of ctaegory -->
  <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                                      
                        <div class="float-right">
                            <div class="page-title">
                                <ul class="breadcrumb text-right">
                                    <li><strong><a href="addcategory.php">Insert Category</a></strong></li>
                                  
                                </ul>
                            </div>
                      
                    </div>
                            </div>
                          
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                        
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
<tbody>
                                        <tr>
                                           <?php while($row = mysqli_fetch_array($sql)){ ?>
    <td><?php echo $row[0];  ?></td>
   <td><?php echo $row[1];  ?></td>
    <td>
    <a href="addcategory.php?catid= <?php echo $row[0]; ?>"><button type="submit" class="btn btn-success btn-sm"> Update</button></a>
  <a href="addcategory.php?delcatid= <?php echo $row[0]; ?>" onclick='javascript:confirmationDelete($(this));return false;'><button type="submit" class="btn btn-danger btn-sm"> Delete</button></a> 
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
 <script>
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>

<?php
ob_end_flush();
?>

</body>
</html> 