<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php
//including the database connection file
include('connection.php');
include_once("Crud.php");
include_once("Validation.php");
$crud = new Crud();
$validation = new Validation();
			//include("config.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str20 = "BL-".$dt3."-";
			$tp="select count(distinct billno) as billcont from mfinalbill where billno like '$str20%'";
			$rst = $crud->getdata($tp);
	
if(isset($_POST['Submit'])) {	
	$mrno = $crud->escape_string($_POST['mrno']);
	$bno = $crud->escape_string($_POST['bno']);
	//$bdate1 = str_replace('/', '-', ());
    $bdate=$_POST['bdate'];
	$pname= $crud->escape_string($_POST['pname']);
	$age= $crud->escape_string($_POST['age']);
	$gender= $crud->escape_string($_POST['gender']);
	$dname= $crud->escape_string($_POST['dname']);
	$mobile= $crud->escape_string($_POST['mobile']);
	$ptype= $crud->escape_string($_POST['ptype']);
	$time= $crud->escape_string($_POST['time']);
	$tamount= $crud->escape_string($_POST['tamount']);
	$discount= $crud->escape_string($_POST['discount']);
	$namount= $crud->escape_string($_POST['namount']);
	$pamount= $crud->escape_string($_POST['pamount']);
	$balamount= $crud->escape_string($_POST['balamount']);
	$remarks= $crud->escape_string($_POST['remarks']);
	$user= $crud->escape_string($_POST['user']);
	$paymenttype= $crud->escape_string($_POST['paymenttype']);
		$reg_no= $crud->escape_string($_POST['reg_no']);
	
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
	 values('MFinal Bill','$pamount','$cnt','$mrno','$user','$paymenttype','$ndate','MFinal Bill')";
	
	
	$sql = $crud->execute($aa);
	
	
	
	
	
		$ts="INSERT INTO mfinalbill(mrno,billno,bdate,pname,age,gender,dname,mobile,ptype,time,tamount,discount,namount,pamount,bamount,remarks,user,paymenttype,reg_no)VALUES
		('$mrno','$bno','$bdate','$pname','$age','$gender','$dname','$mobile','$ptype','$time','$tamount','$discount','$namount','$pamount','$balamount','$remarks','$user','$paymenttype','$reg_no')";
    	$result = $crud->execute($ts);
	
		//echo $count=;
		//exit;
		for($t=0; $t<=count($_POST['tname']); $t++){
		 $tname= $_POST['tname'][$t];
		$amount= $_POST['amount'][$t];
			if($tname!=''){
				 $ts1="insert into mfinalbill1(bno,mrno,testname,amount,cdate)values('$bno','$mrno','$tname','$amount','$bdate')";
				$result1 = $crud->execute($ts1);
			}
			
		}
	//exit;
	$bno = $crud->my_simple_crypt($_POST['bno'],'e');
		
		if($result1){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='print_mfinal.php?id=$bno';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
