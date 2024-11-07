<?php
include_once("connection.php");



//getting id of the data from url
$id = $_GET['id'];
$id1=$_GET['id1'];

//deleting the row from table
$result1 = mysqli_query($link,"DELETE FROM login WHERE name1='$id'");
$result = mysqli_query($link,"DELETE FROM hr_user WHERE emp_id=$id1");
//$result = $crud->delete($id, 'hospital_tarrif');
if($result1){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/userview.php';";
			
			
			print "</script>";
}

?>