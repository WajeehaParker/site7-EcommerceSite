
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
 
</head>

<body>
<div class="container-fluid">


 <?php    
include("header.php");
?>
 <!--Applied User Table -->
 <?php
	include('db.php');
		 $query = "SELECT * FROM `registered_users` WHERE res_status = 'Inactive'";
        $result = mysqli_query($con,$query);
?>
Welcome to dashboard 
     
      <?php    
include("footer.php");
?>
     </div><!--container end-->

</body>
</html>