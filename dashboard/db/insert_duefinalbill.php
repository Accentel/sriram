
<?php
//including the database connection file
include_once("connection.php");
if(isset($_POST['Submit'])) {	
//$mrno = $crud->escape_string($_POST['mrno']);
	$mrno = ($_POST['mrno']);
	$bno = ($_POST['bno']);
	$bdate = ($_POST['bdate']);
  
	$pname= ($_POST['pname']);
	$age= ($_POST['age']);
	$gender= ($_POST['gender']);
	$dname= ($_POST['dname']);
	$mobile= ($_POST['mobile']);
	$ptype= ($_POST['ptype']);
	$time= ($_POST['time']);

	$namount= ($_POST['namount']);
	$pamount= ($_POST['pamount']);
	$balamount= ($_POST['balamount']);
	$remarks= ($_POST['remarks']);
	$user= ($_POST['user']);
	$paymenttype= ($_POST['paymenttype']);
	$id=($_POST['id']);
	
	$damount= ($_POST['damount']);
	$ramount= $_POST['ramount'];
	
	$paidamount=$pamount+$damount;
	//$bdate1=date('Y-m-d');
	include('../db/connection.php');
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
	 values('Insurance Due Bill','$damount','$cnt','$mrno','$user','$paymenttype','$ndate','Insurance Due Bill')";
	mysqli_query($link,$aa);
	
	
	$ty="insert into duefinal(mrno,id1,paid,user,bdate,btime)values('$mrno','$id','$damount','$user','$bdate','$time')";
	mysqli_query($link,$ty) or die(mysqli_error($link));
		//$ts1="insert into duebill(mrno,billno,bdate,pname,mobile,pamount,user) values('$mrno','$bno','$bdate1','$pname','$mobile','$damount','$user')";
		//$crud->execute($ts1)
		 $ts="update final_bill_fin1 set new_paid='$paidamount',new_bal='$ramount' where id='$id'";
		$result = mysqli_query($link,$ts);
		
		
		
	
		
	
		if($result){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='finalbilllist.php';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
