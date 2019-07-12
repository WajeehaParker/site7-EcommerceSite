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

$query="select * from attributes";
$sql =mysqli_query($con,$query);

?>
<br>
<br>
 <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Select Attributes</strong>
                            </div>
                            <div class="card-body">
  <form action="Attributevalues.php" method="post" enctype="multipart/form-data" class="form-horizontal">
 <select required="required" name="attId" data-placeholder="Choose Your Attributes From Here..." class="standardSelect" tabindex="0">
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
                                <strong>Attribute Specification</strong>
                            </div>
                     <div class="card-body card-block">
                   <div class="row form-group">
      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Attribute Value</label></div>
     <div class="col-12 col-md-9"><input type="text" required  name="attName" placeholder="Type Here" class="form-control"></div>
   </div>


                                  </div>
                                </div>
                                <input type="submit" name="insert" class="btn btn-success">

                              </div>
                              <br>
                            </div>

                          </form>
                            <?php
if(isset($_POST['insert']))
{ 
 $name= $_POST['attName'];
 $attId = $_POST['attId'];
 $last= insert("'null','$name','$attId'","attributes_value");
 header('location:Attributevalues.php');

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