<?php
//including the database connection file
include_once("connection.php");
if(isset($_POST['Submit'])) {	
	$umrno = ($_POST['umrno']);
	$date = ($_POST['bdate']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
	$dod = $_POST['dichargedate'];
	$age= ($_POST['age']);
	$sex= ($_POST['sex']);
	$dop= ($_POST['doop']);
    $doa =$_POST['doa'];
	$address= ($_POST['address']);
	$diagsnosis= ($_POST['diagsnosis']);
	$findings= ($_POST['findings']);
	$user=$_POST['user'];
	$investigations=$_POST['investigations'];
	$complaints=$_POST['complaints'];
	$chospital=$_POST['chospital'];
	$treatment=$_POST['treatment'];
	$conhospital=$_POST['conhospital'];
	$treatment=$_POST['treatment'];
	$dname=$_POST['dname'];
	// checking empty fields
	
	$sq="INSERT INTO discharge(mrno,patno,pname,age,sex,doa,dod,addr,dop,diagsnosis,
	cfindings,investigations ,course,condischarge,tdischarge,user,date,doctor,complaints)
	VALUES('$umrno','$patno','$patname','$age','$sex','$doa','$dod','$address',
	'$dop','$diagsnosis','$findings','$investigations','$chospital','$conhospital','$treatment','$user',
	'$date','$dname','$complaints')";
    	$result = mysqli_query($link,$sq) or die(mysqli_error($link));

	$sq=mysqli_query($link,"select * from ip_pat_bed where patno='$patno'");
		$r=mysqli_fetch_array($sq);
		//echo $BED_NO=$r['BED_NO'];
		//$room_no=$r['room_no'];
		//$room_type=$r['room_type'];
		 $fd="select * from ip_pat_admit where PAT_NO='$patno'";
		$sq1=mysqli_query($link,$fd);
		$r1=mysqli_fetch_array($sq1);
		$room_loc=$r1['room_loc'];
		$BED_NO=$r1['BED_NO'];
		$room_loc=$r1['room_loc'];
		$room_type=$r1['room_type'];
		$room_no=$r1['room_no'];
		date_default_timezone_set('Asia/Kolkata');
		 $d=date('Y-m-d');
		 $t=date('H:i:s');
			$dname=$_POST['dname'];
       $a="update beds set status='in' where id='$BED_NO' and roomno='$room_no' and rtype='$room_type' and ltype='$room_loc' ";
		$qry = mysqli_query($link,$a);	
		  $b="update ip_pat_admit set DIS_STATUS='DISCHARGED',Discharge_date='$dichargedate',Discharge_Time='$t' where PAT_NO='$patno'  ";
         $qry = mysqli_query($link,$b);	
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='dischargesummarylist.php';";
			print "</script>";
		}
		
	
}

if(isset($_POST['update'])) {	
	$umrno = ($_POST['umrno']);
	$date = ($_POST['bdate']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
	$dod = $_POST['dichargedate'];
	$age= ($_POST['age']);
	$sex= ($_POST['sex']);
	$dop= ($_POST['doop']);
    $doa =$_POST['doa'];
	$address= ($_POST['address']);
	$diagsnosis= ($_POST['diagsnosis']);
	$findings= ($_POST['findings']);
	$user=$_POST['user'];
	$investigations=$_POST['investigations'];
	$dname=$_POST['dname'];
	$chospital=$_POST['chospital'];
	$treatment=$_POST['treatment'];
	$conhospital=$_POST['conhospital'];
	$treatment=$_POST['treatment'];
	$id=$_POST['id'];
	$complaints=$_POST['complaints'];
	// checking empty fields
	
	$sq="update discharge set mrno='$umrno',patno='$patno',pname='$patname',age='$age',sex='$sex',doa='$doa',dod='$dod',addr='$address',dop='$dop',diagsnosis='$diagsnosis',
	cfindings='$findings',investigations='$investigations',course='$chospital',condischarge='$conhospital',tdischarge='$treatment',user='$user',date='$date',doctor='$dname',complaints='$complaints' where id='$id' ";
    	$result = mysqli_query($link,$sq) or die(mysqli_error($link));

	
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='dischargesummarylist.php';";
			print "</script>";
		}
		
	
}else{
	$id=$_GET['id'];
	$k=mysqli_query($link,"select * from discharge where id='$id'") or die(mysqli_error($link));
	$k1=mysqli_fetch_array($k);
}
	
	
?>
