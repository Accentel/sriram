<?php 
include("../db/connection.php");
if(isset($_POST['Submit'])){
	$umrno = ($_POST['umrno']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
	
	$dichargedate1 = str_replace('/', '-', ($_POST['dichargedate']));
    $dichargedate=date('Y-m-d', strtotime($dichargedate1));

$age= ($_POST['age']);
$sex= ($_POST['sex']);
//$dob= ($_POST['dob']);

$doa1 = str_replace('/', '-', ($_POST['doa']));
    $doa=date('Y-m-d', strtotime($doa1));

$address= ($_POST['address']);
$doctors= ($_POST['doctors']);
$lab= ($_POST['lab']);
$lab1= ($_POST['lab1']);

$user=$_POST['user'];
$treetment=$_POST['treetment'];
$room_days=$_POST['room_days'];
$room_rent=$_POST['room_rent'];
$room_charges=$_POST['room_charges'];
$nurs_days=$_POST['nurs_days'];
$nurs_rent=$_POST['nurs_rent'];
$nurs_charges=$_POST['nurs_charges'];
$prof_days=$_POST['prof_days'];											
$prof_rent=$_POST['prof_rent'];		
$prof_charges=$_POST['prof_charges'];									
$inv_days=$_POST['inv_days'];	
$inv_rent=$_POST['inv_rent'];
$inv_charges=$_POST['inv_charges'];	
$phr_days=$_POST['phr_days'];	
$phr_rent=$_POST['phr_rent'];
$phr_charges=$_POST['phr_charges'];
$tot_amt=$_POST['tot_amt'];
$discount=$_POST['discount'];
$net=$_POST['net'];
					

 $a="INSERT INTO `final_bill`( `mrno`, `patno`,
		`pname`, `fname`, `age`, `sex`, `mobile`, `doa`, `dichargedate`, `address`, 
		`doctors`, `final_diefg`, `treetment`, `room_days`, `room_rent`, `room_charges`, 
		`nurs_days`, `nurs_rent`, `nurs_charges`, `prof_days`, `prof_rent`, `prof_charges`, `inv_days`,
		`inv_rent`, `inv_charges`, `phr_days`, `phr_rent`, `phr_charges`, `tot_amt`, `discount`, `net`)
		VALUES ('$umrno','$patno','$patname','$fname','$age','$sex','','$doa','$dichargedate','$address',
		'$doctors','$lab','$treetment','$room_days', '$room_rent', '$room_charges', 
		'$nurs_days', '$nurs_rent', '$nurs_charges', '$prof_days', '$prof_rent', '$prof_charges', '$inv_days',
		'$inv_rent', '$inv_charges', '$phr_days', '$phr_rent', '$phr_charges', '$tot_amt', '$discount', '$net')	";
					
		$sq=mysqli_query($link,$a);							
											
											
										
					print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='finalbilllist.php';";
			print "</script>";						
											
											
}									
																			
											
											
											
		if(isset($_POST['update'])){
	$umrno = ($_POST['umrno']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
	
	$dichargedate1 = str_replace('/', '-', ($_POST['dichargedate']));
    $dichargedate=date('Y-m-d', strtotime($dichargedate1));

$age= ($_POST['age']);
$sex= ($_POST['sex']);
//$dob= ($_POST['dob']);

$doa1 = str_replace('/', '-', ($_POST['doa']));
    $doa=date('Y-m-d', strtotime($doa1));

$address= ($_POST['address']);
$doctors= ($_POST['doctors']);
$lab= ($_POST['lab']);
$lab1= ($_POST['lab1']);

$user=$_POST['user'];
$treetment=$_POST['treetment'];
$room_days=$_POST['room_days'];
$room_rent=$_POST['room_rent'];
$room_charges=$_POST['room_charges'];
$nurs_days=$_POST['nurs_days'];
$nurs_rent=$_POST['nurs_rent'];
$nurs_charges=$_POST['nurs_charges'];
$prof_days=$_POST['prof_days'];											
$prof_rent=$_POST['prof_rent'];		
$prof_charges=$_POST['prof_charges'];									
$inv_days=$_POST['inv_days'];	
$inv_rent=$_POST['inv_rent'];
$inv_charges=$_POST['inv_charges'];	
$phr_days=$_POST['phr_days'];	
$phr_rent=$_POST['phr_rent'];
$phr_charges=$_POST['phr_charges'];
$tot_amt=$_POST['tot_amt'];
$discount=$_POST['discount'];
$net=$_POST['net'];
$id=$_POST['id'];
					

 $a="update  `final_bill` set  `mrno`='$umrno', `patno`='$patno',
		`pname`='$patname', `fname`='$fname', `age`='$age', `sex`='$sex', `doa`='$doa', `dichargedate`='$dichargedate',
		`address`='$address', 
		`doctors`='$doctors', `final_diefg`='$lab', `treetment`='$treetment', `room_days`='$room_days',
		`room_rent`='$room_rent', `room_charges`='$room_charges', 
		`nurs_days`='$nurs_days', `nurs_rent`='$nurs_rent', `nurs_charges`='$nurs_charges', `prof_days`='$prof_days',
		`prof_rent`='$prof_rent', `prof_charges`='$prof_charges', `inv_days`='$inv_days',
		`inv_rent`='$inv_rent', `inv_charges`='$inv_charges', `phr_days`='$phr_days', `phr_rent`='$phr_rent',
		`phr_charges`='$phr_charges', `tot_amt`='$tot_amt', `discount`='$discount', `net`='$net' where id='$id'	";
					
		$sq=mysqli_query($link,$a);							
											
											
										
					print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='finalbilllist.php';";
			print "</script>";						
											
											
}									
										
											
	
?>
