<?php

function connection()
{
	return $con = mysqli_connect("localhost","root","","db_ecommerce");
}

function insert($values,$table_name)
{
$con = connection();

echo $sql = "insert into ".$table_name." values (".$values.")";

if ($res = mysqli_query($con,$sql)) {
    $last_id = mysqli_insert_id($con);
	echo "<script> alert('data inserted successfully') </script>";
		}
		else
		{
	echo "<script> alert('data not inserted ') </script>";
		}
		return $last_id;		
}

function fetch_record($table_name)
{
$con = connection();
 $sql = "select * from ".$table_name;
$res = mysqli_query($con,$sql);
return $res;
}
?>