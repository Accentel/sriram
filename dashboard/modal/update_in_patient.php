<?php
ob_start();
include("../db/connection.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
echo $pregno =$_POST['rnum'];
echo $pno=$_POST['patno'];
$sno = $_POST['sno'];
$adate=date("Y-m-d", strtotime($_POST['admitdate']));
//date("Y-m-d", strtotime($dateToday));
$atime=$_POST['time'];
//$ampm = $_POST['time1'];
//$atime1 = $atime." ".$ampm; 
echo $bedno=$_POST['bedsno'];
$dstatus='ADMITTED';
$bstatus='NOT PAID';
$cashcredit = $_POST['pat_type'];
if($cashcredit == "credit"){
	$ctype=$_POST['concession_type'];
	$concardno=$_POST['conce_card'];
	$insutype=$_POST['insutype'];
}else{
	$ctype="";
	$concardno="";
	$insutype="";
}
$amt=$_POST['adm_fee'];
$conamt=$_POST['conce_fee'];
$allotby = $_POST['emp_name'];
$aname = $_POST['emp_name'];
$doccode =$_POST['docname'];
$cashcredit = $_POST['pat_type'];
$dcost = $_POST['diet_cost'];
$mrcost = $_POST['mr_charge'];

$doccode =$_POST['docname'];
$cashcredit = $_POST['pat_type'];
$dcost = $_POST['diet_cost'];
$mrcost = $_POST['mr_charge'];

$advdate1 = $_POST['adv_date'];
$advdate = date("Y-m-d", strtotime($advdate1));
 $advamt = $_POST['rupees'];
 $roomrents=$_POST['roomrents'];
 $room_location=$_POST['room_location'];
 //$room_type=$_POST['room_type'];
 
 $adate=$_POST['admitdate'];
 $tot=$amt-$conamt+$mrcost+$dcost+$roomrents;
  $bal=$tot-$advamt; 
$adt=$_POST['admitdate'];
$pname=$_POST['pname'];
 $roomsno = $_POST['roomsno'];
 $room_type = $_POST['room_type'];
 $pkg="No";
  $pay_type=$_POST['pay_type'];
 $amt=$_POST['adm_fee'];

$qry9= mysqli_query($link,"select PAT_REGNO,BED_NO,room_loc,room_type,room_no from ip_pat_admit where pat_no='$pno'");
if($qry9)
{
	$row9 = mysqli_fetch_array($qry9);
	echo $oldbedno = $row9['BED_NO'];
	echo $oldregno = $row9['PAT_REGNO'];
	$old_room_loc=$row9['room_loc'];
	$old_room_type=$row9['room_type'];
	$old_room_no=$row9['room_no']; 
}
	if($bedno != $oldbedno && $oldregno!=$pregno){
		echo  $a="update beds set status='in' where id='$oldbedno' and ltype='$old_room_loc' and rtype='$old_room_type' and roomno='$old_room_no'"; 
		 

	$qry4= mysqli_query($link,$a);
	
	$qry5=mysqli_query($link,"update patientregister set pat_type='OP',status='' where registerno='$oldregno'");
	}else if($bedno != $oldbedno && $oldregno==$pregno){
		 echo $ax="update beds set status='in' where id='$oldbedno' and ltype='$old_room_loc' and rtype='$old_room_type' and roomno='$old_room_no'"; 
		 

	$qry41= mysqli_query($link,$ax);
	
	//$qry5=mysqli_query($link,"update patientregister set pat_type='OP',status='' where registerno='$oldregno'");
	}
	

		
	$qry= mysqli_query($link,"update ip_pat_admit set pat_regno='$pregno', ADMIT_DATE='$adate',ADMIT_TIME='$atime',BED_NO='$bedno',DIS_STATUS='ADMITTED',BILL_STATUS='NOT PAID',
	CONCESSION_TYPE='$ctype',CONCESSION_CARDNO='$concardno',AMOUNT='$amt',CONS_AMT='$conamt',ALLOT_BY='$allotby',CURRENTDATE=now(),AUTH_BY='$aname',doc_code='$doccode',cash_credit='$cashcredit',
	diet_cost='$dcost',MR_COST='$mrcost',room_loc='$room_location',room_type='$room_type',room_no='$roomsno',room_rent='$roomrents',tot='$tot',adv_amnt='$advamt',bal='$bal' where pat_no='$pno' ");
	if($qry){
	$qry1=mysqli_query($link,"update ip_pat_bed set BED_NO='$bedno',START_DATE='$adate',START_TIME='$atime',ALLOTED_BY='$allotby',CURRENTDATE=now(),AUTH_BY='$aname' where pat_no='$pno' and sno=$sno");
	if($qry1){
	
		
		echo $a1="update beds set status='out' where id='$bedno'  and ltype='$room_location' and rtype='$room_type' and roomno='$roomsno'";
		$qry2=mysqli_query($link,$a1);	

		
		if($qry2){
			print "<script>";
			print "alert('Successfully updated');";
			print "self.location='../pages/inpatient.php';";
			print "</script>";
		}else{
			print "<script>";
			print "alert('unable to update');";
			print "self.location='../pages/inpatient.php';";
			print "</script>";
	
	}		
	}
	}
}
else{
mysql_error();}

?>
<?php
ob_get_flush();
?>