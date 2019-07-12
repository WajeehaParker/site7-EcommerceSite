
<?php
	include('db.php');

		 $query = "SELECT * FROM `registered_users` WHERE res_status = 'Inactive'";
        $result = mysqli_query($con,$query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Applied Users</title>

</head>

<body>
<?php include("header.php"); ?>
<table width="692" height="172" border="1" class="table table-striped">
  <thead>
<tr>    <td> Id</td>
    <th>User Name</th>
    <th>Password</th>
     <th>Address</th>
     <th>City</th>
     <th>Email</th>
 <th>Contact No</th>
     <th>Date Of Registration</th>
 <th>Status</th>
     <th>Actions</th>
  </tr>
  </thead>
  <tr>
  <?php
  if($result== '0')
  {
	 echo "No Data to show";
	  
  }
  else
  {while($row = mysqli_fetch_array($result)){ ?>
    <td><?php echo $row[0];  ?></td>
   <td><?php echo $row[1];  ?></td>
   <td><?php echo $row[3];  ?></td>
      <td><?php echo $row[4];  ?></td>
   <td><?php echo $row[5];  ?></td>
     <td><?php echo $row[2];  ?></td>
      <td><?php echo $row[6];  ?></td>
    <td><?php echo $row[7];  ?></td>
   <td><?php echo $row[8];  ?></td>
    <td>
    
   <a href="edit.php"> Edit</a> 
    <a href="delete.php"> Delete</a>
    <a href="view.php"> View</a>
    </td>
    
   
  </tr>
   <?php }} ?>
</table>
</body>
</html>