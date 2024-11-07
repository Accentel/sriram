<?php
//including the database connection file
include_once("connection.php");
if(isset($_POST['Submit'])) {	
//$mrno = $crud->escape_string($_POST['mrno']);
	$mrno = ($_POST['mrno']);
	
	$bdate = $_POST['bdate'];
    //$bdate=date('Y-m-d', strtotime($bdate1));
	$pname= ($_POST['pname']);
	$age= ($_POST['age']);
	$gender= ($_POST['gender']);
	$dname= ($_POST['dname']);
	$mobile= ($_POST['mobile']);
	$ptype= ($_POST['ptype']);
	$time= ($_POST['time']);
	$tamount= ($_POST['tamount']);
	$discount= ($_POST['discount']);
	$namount= ($_POST['namount']);
	$pamount= ($_POST['pamount']);
	$balamount= ($_POST['balamount']);
	$remarks= ($_POST['remarks']);
	$user= ($_POST['user']);
	$paymenttype= ($_POST['paymenttype']);
	$id=$_POST['regid'];
	
	$damount= ($_POST['damount']);
	$ramount= ($_POST['ramount']);
	
	$paidamount=$pamount+$damount;
	//$bdate1=date('Y-m-d');

	$dtn=date('Y-m-d');
	$k="select * from daily_amount where date(date1)='$dtn'";
	$sq = mysqli_query($link,$k);
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
	$aa="insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
	 values('Patient Register Due Bill','$damount','$cnt','$mrno','$user','$paymenttype','$ndate','Patient Register Due Bill')";
	mysqli_query($link,$aa);
	
	
	
	
		$ts1="insert into duepatient(mrno,bdate,pname,mobile,pamount,user,reg_id,time) values('$mrno','$bdate','$pname','$mobile','$damount','$user','$id','$time')";
		mysqli_query($link,$ts1) or die(mysqli_error($link));
		//$crud->execute($ts1)
		 $ts="update patientregister set paid='$paidamount',due='$ramount' where reg_id='$id'";
		$result = mysqli_query($link,$ts) or die(mysqli_error($link));
		
		
		
	
		
	
		if($result){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='reg_card.php';";
			print "</script>";
		}
	}	
	

?>

