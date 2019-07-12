<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product Item</title>

</head>

<body>
	<?php
include('header.php');
include ('crudclass.php');

$query="select * from tbl_category";
$sql =mysqli_query($con,$query);
$query1="select * from attributes";
$sql1 =mysqli_query($con,$query1);
$num = mysqli_num_rows($sql1);

$indstart =1;
$indend =1;
?>
<br>
<br>
 <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Select Category</strong>
                            </div>
                            <div class="card-body">
  <form action="addProduct.php" method="post" enctype="multipart/form-data" class="form-horizontal">
 <select required="required" name="catId" data-placeholder="Choose Your Category From Here..." class="standardSelect" tabindex="0">
                               <?php while($row = mysqli_fetch_array($sql)){ ?> 
                                  <option  label="--select--"></option>
                               <option  value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>

                           <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>


<div class="container">

<div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <strong>PRODUCT DETAILS</strong>
                            </div>
                            <div class="card-body card-block">
                              
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" required  name="proName" placeholder="Type Here" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label  class=" form-control-label">Unit Price</label></div>
                                        <div class="col-12 col-md-9"><input type="text" required  name="proPrice" placeholder="digits only" class="form-control"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Quantity</label></div>
             <div class="col-12 col-md-9"><input type="text" name="proQuantity" required placeholder="digits only" class="form-control"></div>
                      </div>
                       <?php while($row = mysqli_fetch_array($sql1)){
                        $countselector =count($row);
                        $attribute_id = $row[0];

                        ?> 
                                 <div class="row form-group">
                           <div class="col col-md-3"><label class="form-control-label"><?php echo $row[1] ?></label></div>
                             <div class="col-12 col-md-9">                  
<?php for ($i=$indstart; $i <= $indend ; $i++) { 
$query2="select * from attributes_value where attribute_name_id = '$row[0]'";
$sql2 =mysqli_query($con,$query2); ?>
                 <select name="<?php echo $r= $row[0] ?>" id="select" class="form-control">
                 <option value="0" >---select--</option>           
               <?php while($row = mysqli_fetch_array($sql2)){ ?>
                <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ; } ?> </option>
             </select>    <?php } 
            
             $indstart++;
             $indend++;?> 

         </div>
     </div>
 <?php  } ?>
 <div class="row form-group">
 	<div class="col col-md-3"><label class=" form-control-label"></label></div>
 	<div class="col col-md-9">
 		<div class="form-check-inline form-check">
 			<label name="avail" class="form-check-label">
<input type="checkbox" name="avail" value="<?php if(true){echo 'Available';} ?>" class="form-check-input">Availability
      </label>
    </div>
  </div> 
 </div>
</div>
<div class="card-footer">
  <button type="Submit" name="submit" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i> Submit
 </button>
  </div>
</div>
</div>
</form>  
  
<!-- <?php
if(isset($_POST['submit']))
{ $last_id;
 $name= $_POST['proName'];
 $fname= $_POST['proPrice'];
 $quantity= $_POST['proQuantity'];
 $catId = $_POST['catId'];
  if(empty($_POST['avail']))
 {
 	$_POST['avail'] = "Unavailable";
 	 $avail = $_POST['avail'];
 }
 else
 {$avail = $_POST['avail'];}
$last_id = insert("null,'$name','2','$avail','$fname','$quantity','$catId'","tbl_product");
 $qry=mysqli_query($con,"SELECT * FROM `attributes`");
 while($row = mysqli_fetch_array($qry)){
 $product_Id = $last_id;
  $ComboName = $row[0];
  echo "<br>";
  $ComboID = $row[0];
if(isset($_POST[$ComboName]))
{
$attribute_id  = $_POST[$ComboName];
if($attribute_id != 0){
insert("null,'$last_id','$ComboID' , '$attribute_id'" , "product_info"); 
}}
insert("null,'$last_id','$attribute_id','$attribute_value'","product_info"); 
}
//header("location:addProduct.php");
}
?> -->



<?php
if(isset($_POST['submit']))
{ 
 $name= $_POST['proName'];
 $fname= $_POST['proPrice'];
 $quantity= $_POST['proQuantity'];
 $catId = $_POST['catId'];
  if(empty($_POST['avail']))
 {
  $_POST['avail'] = "Unavailable";
   $avail = $_POST['avail'];
 }
 else
 {$avail = $_POST['avail'];}
$last_id = insert("null,'$name','2','$avail','$fname','$quantity','$catId'","tbl_product");

$qry=mysqli_query($con,"SELECT * FROM `attributes`");
 while($row = mysqli_fetch_array($qry)){
  $ComboName = "Cmb".$row[0];
  echo "<br>";
  $ComboID = $row[0];
echo "abc ".$_POST[$ComboName];
if(isset($_POST[$ComboName]))
{
$attribute_id  = $_POST[$ComboName];

if($attribute_id != 0){
insert("null,'$last_id','$ComboID' , '$attribute_id'" , "product_info"); 
}
}
  echo "<br>";
    echo "<br>";

 }
  } 

?>

<?php
include('footer.php');?>

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
<?php
ob_end_flush();
?>
</body>
</html>