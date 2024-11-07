<?php
//including the database connection file
include_once("connection.php");

	
if(isset($_POST['Submit'])) {	
//$mrno = $crud->escape_string($_POST['mrno']);
	$mrno = ($_POST['mrno']);
	$bno = ($_POST['bno']);
	$bdate = ($_POST['bdate']);
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
	$id=($_POST['id']);
	
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
	 values('Sales Due Bill','$damount','$cnt','$mrno','$user','$paymenttype','$ndate','Sales Due Bill')";
	mysqli_query($link,$aa) or die(mysqli_error($link));
	
	
	
	
		$ts1="insert into duesalebill(mrno,billno,bdate,pname,mobile,pamount,user,bill_num,time) values('$mrno','$bno','$bdate','$pname','$mobile','$damount','$user','$cnt','$time')";
		mysqli_query($link,$ts1) or die(mysqli_error($link));
		echo $ts="update phr_salent_mast set final_paid='$paidamount',bal='$ramount' where lr_no='$id'";
		
		$result = mysqli_query($link,$ts) or die(mysqli_error($link));
		
		
		
	
		
	
		if($result){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='salesentry_list.php'";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
