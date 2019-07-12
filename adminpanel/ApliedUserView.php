 <?php    
	include('db.php');
if(isset($_GET['UserId'])){
	$msg="";
	$ID = $_GET['UserId'];
 $query = "SELECT * FROM `registered_users` WHERE reg_id='$ID'";
  $result = mysqli_query($con,$query);
$res = mysqli_fetch_assoc($result);
}
if(isset($_POST['accept']))
{
	 $userid= $_POST['userid'];
	$username= $_POST['username'];
	$useremail= $_POST['useremail'];
	$pass= $_POST['password'];
	$add= $_POST['address'];
	$city= $_POST['city'];
	$phone= $_POST['phone'];
	$rdate= $_POST['r_date'];

$query = "UPDATE `registered_users` SET `reg_name`='$username',`reg_email`='$useremail',`reg_password`='$pass',`reg_address`='$add',`reg_city`='$city',`reg_phone_no`='$phone',`registration_date`='$rdate',`res_status`='active' WHERE reg_id= '$userid';";
$result= mysqli_query($con,$query);
	if($result)
	{
		//echo "Updated";
header('Location: RegisteredUserList.php');	
	} 
	else
	{
		$msg= "Data Not Updated";
	}
}
if(isset($_POST['decline']))
{
	$userid= $_POST['userid'];
	$username= $_POST['username'];
	$useremail= $_POST['useremail'];
	$pass= $_POST['password'];
	$add= $_POST['address'];
	$city= $_POST['city'];
	$phone= $_POST['phone'];
	$rdate= $_POST['r_date'];

$query = "UPDATE `registered_users` SET `reg_name`='$username',`reg_email`='$useremail',`reg_password`='$pass',`reg_address`='$add',`reg_city`='$city',`reg_phone_no`='$phone',`registration_date`='$rdate',`res_status`='Pending' WHERE reg_id= '$userid';";
$result= mysqli_query($con,$query);
	if($result)
	{
		//echo "Updated";
header('Location: RegisteredUserList.php');	
	} 
	else
	{
		$msg= "Data Not Updated";
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User View</title>

</head>

<body>
<?php include("header.php"); ?>
<div class="container">
<div class="row">
<div class="col-md-12">

 <form   method="post" >
 
 <h2> USER DETAILS</h2>
  <div class="form-group">
         <div class="input-group">
   <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
      <input type="text" id="userid" name="userid"  class="form-control" value=" <?php echo $res['reg_id']; ?>">
        </div>
      </div>
      
      <div class="form-group">
         <div class="input-group">
   <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="text" id="userid" name="username"  class="form-control" value=" <?php echo $res['reg_name']; ?>">
        </div>
      </div>
                                <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
              <input type="email" id="email" name="useremail" placeholder="Email" value=" <?php echo $res['reg_email']; ?>" class="form-control">
               </div> </div>
                   <div class="form-group">
              <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                      <input type="text" id="password" name="password"  value=" <?php echo $res['reg_password']; ?>" class="form-control">   </div>   </div>
                      
                        <div class="form-group">
              <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-address-card-o"></i></div>
                      <input type="text" id="address" name="address"  value="<?php echo $res['reg_address']; ?>" class="form-control">   </div>   </div>
                      
                        <div class="form-group">
              <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-address-book"></i></div>
                      <input type="text" id="city" name="city"  value=" <?php echo $res['reg_city']; ?>" class="form-control">   </div>   </div>
                      
                           <div class="form-group">
              <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                      <input type="text" name="phone"  value=" <?php echo $res['reg_phone_no']; ?>" class="form-control">   </div>   </div>
                      
                           <div class="form-group">
              <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                      <input type="text" name="r_date"  value=" <?php echo $res['registration_date']; ?>" class="form-control">   </div>   </div>
                          <div class="form-group">
              <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-star-half-empty"></i></div>
                      <input type="text" name="status"  value=" <?php echo $res['res_status']; ?>" class="form-control">   </div>   </div>
      <span class="form-actions form-group"><button type="submit" name="accept" class="btn btn-success btn-sm">Accept</button></span>
  
      <span class="form-actions form-group"><button type="submit" name="decline" class="btn btn-danger btn-sm">Decline</button></span>
      
      <a href="index.php"><p style="text-align:right">Back To List</p></a> 
               </form><br />

</div>
</div>
</div> 
<?php include("footer.php"); ?>
</body>
</html>