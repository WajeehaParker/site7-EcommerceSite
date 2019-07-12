<?php

ob_start();
?>
<?php
include('header.php');
  $msg="";
if(isset($_POST['insert']) && !isset($_GET['attribute_id'])  )
{	
    if(!empty($_POST['attribute_name']))
    {
$attribute_name = $_POST['attribute_name'];
$query = mysqli_query($con,"select attribute_id from attributes WHERE attribute_name = '$attribute_name'");

$numrows = mysqli_num_rows($query);
	if($numrows > 0)
	{
 $msg = "Category Already Exist";

	}
	else{
$query ="INSERT INTO `attributes`(`attribute_id`, `attribute_name`) VALUES (NULL,'$attribute_name');";
	$res = mysqli_query($con, $query);
	if($res)
	{
$msg = " Data Inserted";
header("location:addattribute.php");
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
if(isset($_POST['insert']) && isset($_GET['attribute_id']))
{
    $idd = $_GET['attribute_id'];
  $attribute_name = $_POST['attribute_name'];  
     $CreateSQL = "UPDATE `attributes` SET `attribute_name` = '$attribute_name' WHERE `attribute_id` = '$idd';";
    $res12 = mysqli_query($con, $CreateSQL);
    if($res12)
    {
    $msg = 'Data Successfully Updated ';
    header("location:addattribute.php");
    
    }
    else{
        
$msg = 'Data Not Updated ';
    }

}

?>

<?php
  //get data table
    if(isset($_GET['attribute_id'])){
    $id = $_GET['attribute_id'];
    $SelectSQl = "select * from attributes where attribute_id = $id";
        $res = mysqli_query($con, $SelectSQl);
    $r = mysqli_fetch_assoc($res);
    }
?>
<?php
//delete data
if(isset($_GET['delcatid'])  )
{
     $idd = $_GET['delcatid'];
     $CreateSQL = "DELETE FROM `attributes` WHERE attribute_id = $idd";

    $res = mysqli_query($con, $CreateSQL);
    if($res)
    {
header("location:addattribute.php");

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

                            <div class="card-header ">
                                <strong>Add Attribute</strong>  
                               
                            </div>

                            <div class="card-body card-block">
                                <form  method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-5"><label  class=" form-control-label">Attribute Name:	</label></div>
  <div class="col-12 col-md-7"><input type="text" name="attribute_name" placeholder="Add Attribute" class="form-control" value="<?php if(!empty($r)){ echo $r["attribute_name"]; } ?>"/></div><span style="color:red;"><?php echo $msg; ?></span>
                                    </div>
                                   
                               
                            </div>
                            <div class="card-footer">
 <button type="submit" name="insert" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i>   <?php if(isset($_GET['attribute_id'])){ echo 'Update'; } else {  echo 'Insert'; }?>

 </button>  
                                  
                               
                           </form>
                            </div>
                        </div>

</div>
<?php
$catList="";
$query = "select * from attributes";
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
              <button class="btn btn-primary mb-1"><a href="addattribute.php"  style="color:black;">Insert Attribute</a></button>
	  <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                          Attribute Values
                      </button>
                             <!--    <ul class="breadcrumb text-right">
                       <li><strong><a href="addattribute.php">Insert Attribute</a></strong></li>
                  
                                </ul> -->
                           
                            </div>
                      
                    </div>
                            </div>
                          
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Attribute Name</th>
                                        
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
<tbody>
                                        <tr>
                                           <?php while($row = mysqli_fetch_array($sql)){ ?>
    <td><?php echo $row[0];  ?></td>
   <td><?php echo $row[1];  ?></td>
    <td>
    <a href="addattribute.php?attribute_id= <?php echo $row[0]; ?>"><button type="submit" class="btn btn-success btn-sm"> Update</button></a>
  <a href="addattribute.php?delcatid= <?php echo $row[0]; ?>" onclick='javascript:confirmationDelete($(this));return false;'><button type="submit" class="btn btn-danger btn-sm"> Delete</button></a> 
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
	<?php
include ('crudclass.php');

$query="select * from attributes";
$sql =mysqli_query($con,$query);

?>


            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Attribute Specifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                             <div class="col-xs-11 col-sm-11">


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Select Attributes</strong>
                            </div>
                            <div class="card-body">
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
 <select required="required" name="attId" data-placeholder="Choose Your Attributes From Here..." class="standardSelect" tabindex="0">
                               <?php while($row = mysqli_fetch_array($sql)){ ?> 
                                  <option  label="--select--"></option>
                               <option  value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>

                           <?php } ?>
                            </select>
                        </div>
                    </div>

                        <div class="card">
                            <div class="card-header">
                                <strong>Attribute Specification</strong>
                            </div>
                     <div class="card-body card-block">
                   <div class="row form-group">
      <div class="col col-md-4"><label for="text-input" class=" form-control-label"><strong>Attribute Value</strong></label></div>
     <div class="col-12 col-md-9"><input type="text" required  name="attName" placeholder="Type Here" class="form-control"></div>
   </div></div> </div>
    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button  type="submit" name="insert" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div
                          </form>
 <?php
if(isset($_POST['insert']))
{ 
 $name= $_POST['attName'];
 $attId = $_POST['attId'];
 $last= insert("'null','$name','$attId'","attributes_value");
  header('location:addattribute.php');

}
                            ?>
            

 <?php include('footer.php'); ?>
<script src="assets/js/lib/chosen/chosen.jquery.min.js">
</script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

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