<?php
include_once("connection.php");
//getting id of the data from url
$id =$_GET['id'];

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = mysqli_query($link,"delete from labtest1 where id='$id'") or die(mysqli_error($link));
if($result){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/labtestdetails.php';";
			print "</script>";
}
?>