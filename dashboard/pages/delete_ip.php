<?php
include("../db/connection.php");
	$id=$_GET['id'];
	 $id;
	  $aa="select * from ip_pat_admit where PAT_ID='$id'";
	 $sq=mysqli_query($link,$aa) or die(mysqli_error($link));
	
$r=mysqli_fetch_array($sq);
	 
	// $inv_id=$r['inv_id'];
	 $bill_num=$r['bill_num'];
	$room_loc=$r['room_loc'];
	$room_type=$r['room_type'];
	$room_no=$r['room_no'];
	$BED_NO=$r['BED_NO'];
	 
	 echo	  $b="delete FROM ip_pat_admit where  PAT_ID='$id'";
	 	  mysqli_query($link,$b) or die(mysqli_error($link));

//$q71=mysqli_query($link,$b);
 $aaa="update beds set status='in' where id='$BED_NO' and roomno='$room_no' and rtype='$room_type' and ltype='$room_loc'";

$qry = mysqli_query($link,$aaa) or die(mysqli_error($link));	




	  $b1="delete FROM daily_amount where  bill_num='$bill_num'";

$q71=mysqli_query($link,$b1) or die(mysqli_error($link));


//exit;

	if($q71)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='inpatient.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='inpatient.php';";
		print "</script>";
	}
	
	
	
	
?>