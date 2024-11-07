   
    <?php
include("../db/connection.php");
//include("config.php");
if(isset($_POST['submit'])){
//error_reporting(E_ALL);
$doct=$_POST['rnum'];
$ApplicationDeadline=$_POST['ApplicationDeadline'];
$time=$_POST['time']; 
//$doct2=$_POST['tknum'];
$regtime=$_POST['time']; 
 $did=$_POST['doctorname'];
$pname=$_POST['pname'];
$fname=$_POST['fname'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$ageext=$_POST['ageext'];
$mobile=$_POST['mobile'];
$ref_doc=$_POST['ref_doc'];
$ref_mob=$_POST['ref_mob'];
$doctorname=$_POST['doctorname'];
$con_doct_mob=$_POST['con_doct_mob'];
 $concession_type=$_POST['concession_type'];
$fee=$_POST['fee'];
$addr=$_POST['addr'];
$rmarks=$_POST['rmarks'];
$image=$_POST['image'];
$rec_no=$_POST['rec_no'];
$have_ref=$_POST['have_ref'];
$village=$_POST['village'];
$city=$_POST['city'];
$plac=$_POST['plac'];
$state=$_POST['state'];
$op_type=$_POST['op_type'];
//$addr=$village;

$inamek = $_POST['namek'];
$inamek1 = $_POST['name1'];
 

 
  $type=$_POST['type']; 
$rel=$_POST['rel'];
$date=date('Y-m-d');
$token=$_POST['token'];
  $con_fee=$_POST['con_fee']; 
  $reg_no=$_POST['reg_no']+1;
//$total=$_POST['total'];

if($type=='OP'){
$sdec="Patient Register";	
 $con_fee=$_POST['con_fee']; 
} else if($type=='IP') {
	$sdec="In Patient";
}else{
    
}


$serv_name=$_POST['serv_name'];

$ser_amt=$_POST['ser_amt'];
$pid=$_POST['pid'];
     $total=$con_fee+$fee+$ser_amt;  
$new=$_POST['new'];
 $pname_type=$_POST['pname_type'];

 //$payment_type=$_POST['payment_type']; 
$dept=$_POST['dept'];
$insutype=$_POST['insutype'];
$policy=$_POST['policy'];
$chq_num=$_POST['chq_num'];
$bank=$_POST['bank'];
$chq_date=$_POST['chq_date'];
 $time= date("h:i:sa");
 $d=date('d-m-Y');

 $insutype_name=$_POST['patientcategory'];
 $policy_no=$_POST['policy_no'];
 $pkg_amt=$_POST['pkg_amt'];
 $req_amt=$_POST['req_amt'];
 $req_no=$_POST['req_no'];
 $apr_date=$_POST['apr_date'];
  $ins_type=$_POST['ins_type'];
  $token1=$_POST['token1'];
  $ser=$_POST['ser'];
 $appoint_type=$_POST['appoint_type'];
 $pay_type=$_POST['pay_type'];
 
$docid = mysqli_query($link,"select dname1 from doct_infor where id = '$did'");
if($docid)
{
	$row1 = mysqli_fetch_array($docid);
	$doct3 = $row1['dname1'];

}

    $ff="update `patientregister` set  `doctorname`='$did', regdate='$ApplicationDeadline',regtime='$regtime',`patientname`='$pname', `age`='$age', 
 `gender`='$sex', `address`='$village', `phoneno`='$mobile', `registerfee`='$fee', `remarks`='$rmarks', `pat_type`='$type',
   `aadar`='$aadhar', `ref_doc`='$ref_doc', `ref_doc_mob`='$ref_mob',
   
  `con_doc_mob`='$con_doct_mob',`rel_type`='$rel',`cons_fee`='$con_fee',`total`='$total',`pat_type1`='$new',  

`insutype`='$ins_type'
  ,`policy`='$policy_no',`chq_num`='$chq_num',`bank`='$bank',`chq_date`='$chq_date', `insutype_name`='$insutype_name', `policy_no`='$policy_no', 
  `pkg_amt`='$pkg_amt', `req_amt`='$req_amt', `req_no`='$req_no', `apr_date`='$apr_date', `ins_type`='$ins_type',`token_num`='$token',
  `auth_by`='$ser',bill_num='$bill_num',opt_type='$appoint_type',date='$reg_date',`pname_type`='$pname_type',pcancel='$pcancel'
  where reg_id='$pid' ";
 //exit;
   $sq=mysqli_query($link,$ff) or die(mysqli_error($link));
    $ff2="update `patientregister` set   `patientname`='$pname', `age`='$age', `gender`='$sex', `address`='$addr',
	`phoneno`='$mobile',state='$state',city='$city',mandal='$plac',pcancel='$pcancel',regdate='$regdate',regtime='$regtime' where registerno='$rnum'";
 
  $sq=mysqli_query($link,$ff2);
  
  
    $ff1="update `patientregister1` set  `doctorname`='$doct3', `patientname`='$pname', `age`='$age', `gaurdianname`='$fname',
 `gender`='$sex', `address`='$addr', `phoneno`='$mobile', `registerfee`='$fee', `remarks`='$rmarks', `pat_type`='$type',
   `aadar`='$aadhar', `ref_doc`='$ref_doc', `ref_doc_mob`='$ref_mob',
  `con_doc_mob`='$con_doct_mob',`rel_type`='$rel',`cons_fee`='$con_fee',`total`='$total',`pat_type1`='$new',regdate='$regdate',regtime='$regtime' where reg_id='$pid' ";
//$sq1=mysql_query($ff1);
if($sq)
		{
//header("location:patient-reg.php");
print "<script>";
			print "alert('Successfully Updated');";
			print "self.location='../pages/book_appointment.php';";
			print "</script>";

}
}
?>