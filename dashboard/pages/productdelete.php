<?php
include("../db/connection.php");
$id=$_REQUEST['id'];
$lrid=$_REQUEST['lrid'];

$q="select * from phr_purinv_dtl where inv_id='$id'";
$q1=mysqli_fetch_array($q);
$value=$q1['VALUE'];


$q10="select * from phr_purinv_mast where LR_NO='$lrid'";
$q11=mysqli_fetch_array($q10);
$total=$q11['TOTAL'];

$tamt=$total-$value;

mysqli_query($link,"update phr_purinv_mast set TOTAL='$tamt',bal='$tamt'  where LR_NO='$lrid'") or die(mysqli_error($link));

$u=mysqli_query($link,"delete from phr_purinv_dtl where inv_id='$id'") or die(mysqli_error($link));
if($u){
    
    print "<script>";
	print "alert('successfully deleted');";
	print "self.location='view_purchase_invoice.php?id=$lrid'";
	print "</script>";
    
}

?>