<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
	
<script>
function calc(){
	var fee=document.getElementById('fee').value;
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>
<script>
function calc1(){
	var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc2(form){
	//var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
//damount=fee*doctshare;
//dtotal=fee-hamount;
hamount=document.getElementById('hamo').value;
damount=document.getElementById('doctoramount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount);
document.getElementById('total').value=tt;
}
</script>

<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();
mnt=nmonth+1;

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('intime').value=""+nhour+":"+nmin+":"+nsec+ap+"";
//document.getElementById('outtime').value=" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;

</script>
<script>
  function showUser(str)
{

if (str=="")

  {

  document.getElementById("state").innerHTML="";

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {
	var show=xmlhttp.responseText;

	document.getElementById("city").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data.php?q="+str,true);

xmlhttp.send();

}

</script>
<script>
  function showUser1(str)
{

if (str=="")

  {

  document.getElementById("city").innerHTML="";

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {
	var show=xmlhttp.responseText;

	document.getElementById("plac").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data1.php?q="+str,true);

xmlhttp.send();

}

</script>
<script>
function showHint1(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set100.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint2(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set101.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint01(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("con_fee").value=strar[1];
	document.getElementById("con_doct_mob").value=strar[2];
	document.getElementById("total").value=strar[3];
	}
  }
xmlhttp.open("GET","set010.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint011(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint012(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint013(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>




<script>
function showHint01345(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("token1").value=strar[1];
	}
  }
xmlhttp.open("GET","setn13.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint022(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("ref_mob").value=strar[1];
	}
  }
xmlhttp.open("GET","set022.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint0222(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("ser_amt").value=strar[1];
	document.getElementById("total").value=strar[2];
	}
  }
xmlhttp.open("GET","set0222.php?q="+str,true);
xmlhttp.send();
}
</script>

<script type="text/javascript">
   function funconce2(str){
	//alert(str);
	if(str == "Yes"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("insu2").style.display='';
		document.getElementById("insu3").style.display='';
		document.getElementById("insu4").style.display='';
		document.getElementById("insu5").style.display='';
		document.getElementById("insu6").style.display='';
		document.getElementById("insu7").style.display='';
		
		//document.getElementById("card1").style.display='none';
		//document.getElementById("cardk").style.display='none';
		
	}else if(str == "No"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		//document.getElementById("cardk").style.display='';
		//document.getElementById("card1").style.display='';
		document.getElementById("insu2").style.display='none';
		document.getElementById("insu3").style.display='none';
		document.getElementById("insu4").style.display='none';
		document.getElementById("insu5").style.display='none';
		document.getElementById("insu6").style.display='none';
		document.getElementById("insu7").style.display='none';
		
		
	}
}
		</script>
 <?php

//$abc=$_GET['id'];

$y=date('y');
$s=mysqli_query($link,"select distinct (`registerno`) as reg,registerdate from patientregister");
while($r1=mysqli_fetch_array($s)){
$new=$r1['reg'];
}
$qs=mysqli_query($link,"select max(`reg_no`) as id from patientregister ");
$r2=mysqli_fetch_array($qs);
   $new1=$r2['id'];
 if($new1!=''){
	 
	 $output = explode("-",$new1);
	 $da=$output[count($output)-1];
 $reg1=$da+1;
$reg=("RH-$y-".($reg1));

 }else {
	$reg= ("RH-$y-".($new1+101));
 }


	
	$abc=mysqli_query($link,"select distinct max(reg_id)+0,registerdate from patientregister");
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	 //$dd=date("Y-m-d", strtotime("$date"));
	 
	
	//date('Y-m-d' strtotime($date));

if($abc){
	
	
}
else
{
echo "allredy exit";

}
//$ddd=date('Y-m-d');
//echo $date = strtotime("-1 day", $ddd);
 $date=date('Y-m-d', strtotime('-1 days'));
  $xxx="select * from patientregister where registerdate='$date' and pat_type='OP'";
$abcd=mysqli_query($link,$xxx);
 $cnt=mysqli_num_rows($abcd);
	//$row1=mysql_fetch_array($abc);
	//echo $row1[0]+1;
	//$date=$row1['registerdate'];
	//echo $dd=date("Y-m-d", strtotime("$date"));

?><?php 
 $xxx1="SELECT * FROM `validity_days`";
$abcd1=mysqli_query($link,$xxx1);
 //$cnt=mysql_num_rows($abcd);
	$row2=mysqli_fetch_array($abcd1);
	 $valid_days=$row2['valid_days'];
	  $valid=date('Y-m-d', strtotime("+$valid_days days"));

?>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Appointment</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="book_appointment.php">Appointment</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Appointment</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>PATIENT REGISTRATION</header>
                                  <hr>
                                               
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        
                                </div>
                                
                                
                                
                                <?php 
      
         $r=$_GET['reg'];
        
         $xxx="select * from patientregister where reg_id='$r' ";
$abc=mysqli_query($link,$xxx);
 //$cnt=mysql_num_rows($abcd);
	$row1=mysqli_fetch_array($abc);
$registerno=$row1['registerno'];
$radte=$row1['date'];
$ptype=$row1['pat_type'];
$op_type=$row1['op_type'];
$ptype1=$row1['pat_type1'];
$doctorname=$row1['doctorname'];
$patientname=$row1['patientname'];
$age=$row1['age'];
$gaurdianname=$row1['gaurdianname'];
$gender=$row1['gender'];
$address=$row1['address'];
$phoneno=$row1['phoneno'];
$registerfee=$row1['registerfee'];
$remarks=$row1['remarks'];
$aadar=$row1['aadar'];
$ref_doc=$row1['ref_doc'];
$ref_doc_mob=$row1['ref_doc_mob'];
$con_doc_mob=$row1['con_doc_mob'];
$rel_type=$row1['rel_type'];
$tokenno=$row1['tokenno'];
$cons_fee=$row1['cons_fee'];
$total=$row1['total'];
$pat_type1=$row1['pat_type1'];
$pname_type=$row1['pname_type'];
$concession_type=$row1['concession_type'];
$dept=$row1['dept'];
 $validity=$row1['validity'];
  $appoint_type=$row1['opt_type'];
  $bill_num=$row1['bill_num'];
  $id=$row1['reg_id'];
  $state=$row1['state'];
$city=$row1['city'];
$mandal=$row1['mandal'];
$regdate=$row1['regdate'];
$regtime=$row1['regtime'];
$paid=$row1['paid'];
$due=$row1['due'];
$ageext=$row1['ageext'];
$op_type=$row1['op_type'];
//$pname_type=$row1['pname_type'];
$ageext=$row1['ageext'];
$insutype_name=$row1['insutype_name'];
$policy_no=$row1['policy_no'];
 $d=date('Y-m-d');
 $total=$row1['total'];

?>
								
								<form name="form" method="post" enctype="multipart/form-data" action="../modal/pat_update.php">
                                
								<input type="hidden" name="pid" value="<?php echo $id; ?>"/>
								<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>
<input type="hidden" name="ser" value="<?php echo $aname?>" />
<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>
			<input type="hidden" name="reg_no" value="<?php echo $new1?>" />
								<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-4 col-sm-4">
	                                        <!-- text input -->
	                                        <div class="form-group">
												<input type="hidden" class="form-control"  name="max" id="max" value="<?php echo $max;?>" />
	                                            <label><strong>New/Existing</label></strong>
<input type="radio" required="required"  name="new" id="new" value="New" <?php if($ptype1=="New"){echo 'checked';} ?> /> New 
<input type="radio" onclick="javascript:location.href='patientregister2.php'" required="required" <?php if($ptype1=="Existing"){echo 'checked';} ?>  name="new" id="new" value="Existing"/> Existing</td>
	                                        

	   <br />   <br />                                   
 </div>				
										 <div class="form-group">
	                                            <label><strong>Registration Date :</strong></label>
										</div><table width="100%"><tr><td>
  <input name="ApplicationDeadline" id="date" type="date" class="form-control"   size="20"  required="required"
 value="<?php echo $regdate; ?>" placeholder=""/></td><td>
 <input name="time"  value="<?php echo $regtime; ?>"  class="form-control"   size="20"  required="required"
 value="" placeholder=""/></td></tr></table>

											
											<div class="form-group">
	                                            <label>Patient Name :</label>
												
												<table width="100%"><tr><td>
												
												<select name="pname_type" required class="form-control" >
												    <option value="">Select</option>
<option value="Mr" <?php if($pname_type=="Mr"){echo 'selected';} ?>>Mr</option>
<option value="Mrs" <?php if($pname_type=="Mrs"){echo 'selected';} ?>>Mrs</option>
<option value="Miss" <?php if($pname_type=="Miss"){echo 'selected';} ?>>Miss</option>
<option value="Master" <?php if($pname_type=="Master"){echo 'selected';} ?>>Master</option>
<option value="Baby" <?php if($pname_type=="Baby"){echo 'selected';} ?>>Baby</option>
<option value="B/O" <?php if($pname_type=="B/O"){echo 'selected';} ?>>B/O</option>
</select></td><td>
												
												<input type="text" class="form-control"  name="pname" id="pname" required="required" value="<?php echo $patientname; ?>" /></td></tr></table>
 
 </div>
										
	<input name="token1" id="token1" readonly="readonly"  class="form-control" type="hidden"  size="20" 
 />									
										
											<div class="form-group">
											    <label>Age</label>
											    	<table width="100%"><tr><td>
                                            
	                                           <input type="text" class="form-control"  name="age" id="age" value="<?php echo $age; ?>" required="required" /></td><td>
	                                            <select name="ageext" class="form-control" id="ageext" required="required" >
	                                                <option value="Y" <?php if($ageext=="Y"){echo 'selected';} ?>>Years</option>
	                                                <option value="D" <?php if($ageext=="D"){echo 'selected';} ?>>Days</option>
	                                                <option value="M" <?php if($ageext=="M"){echo 'selected';} ?>>Months</option>
	                                                </select></td></tr></table>
                                        </div>
                                        <div class="form-group">
	                                            <label>Gender </label><br>
	                                         <input type="radio" class="" required="required" name="sex" id="sex1" value="male" <?php if($gender=="male"){echo 'checked';} ?>/> Male
											 <input type="radio" required="required" name="sex" id="sex2" value="female" <?php if($gender=="female"){echo 'checked';} ?>/> Female
                                              <input type="radio" required="required" name="sex" id="sex3" value="Others" <?php if($gender=="Others"){echo 'checked';} ?>/> Others
	                                        </div>
											<div class="form-group">
	                                            <label>Patient Mobile</label>
	                                            <input type="text" class="form-control" name="mobile" value="<?php echo $phoneno; ?>" id="mobile"  required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
	                                        </div>
									    <div class="form-group" >
                                            <label>Patient Category </label>
											<select  name="patientcategory" id="patientcategory" class="form-control"   >
<option value="">Select Patient Category</option>
<?php 

$sq2=mysqli_query($link,"select * from  insurance");
if($sq2){
while($row2=mysqli_fetch_array($sq2)){

$insname=$row2['ins_name'];
//$refcode=$row['refcode'];
?>
<option value="<?php echo $insname; ?>" <?php if($insutype_name==$insname){
echo 'selected';}?>><?php echo $insname; ?></option>
<?php } } ?>

</select>
                                         
											
									   </div>
											<div class="form-group"  >
                                                <label class="control-label ">Policy No
                                                  
                                                </label>
                                         
                                                  
												   <input type="text" name="policyno" id="policyno" class="form-control" value="<?php echo $policy_no; ?>">
                                        
                                            </div>
								
											
										
											
											
	                                    </div>
	                                    <div class="col-md-4 col-sm-4">
 <div class="form-group">
	                                            <label><strong>MR No :<?php echo $registerno; ?></strong></label><br>
	                                         
	                                            <input type="hidden" class="form-control" name="rnum" id="rnum" value="<?php echo $registerno; ?>" readonly >
                                           <br /></div>
													
												
										
									 <input type="hidden"  name="con_fee1"   id="con_fee1" class="form-control"/>
                                        	
								
	                                        <div class="form-group">
                                            <label>Village </label>
                                         
											<select  id="village"  name="village"  class="form-control" required onchange="showUser21(this.value)">
											    <option value="">Select Village</option>

<?php  
$sql="SELECT distinct vil_name FROM village";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) { ?>
<option value="<?php  echo $v=$row['vil_name'] ?>" <?php  if($address==$v){ echo 'selected';}?> ><?php echo $row['vil_name']; ?></option> 
<?php }
?>
</select>
									   </div>
									    <div class="form-group">
                                                <label class="control-label ">City/District
                                                  
                                                </label>
                                         
                                                  <!-- <select name="city" id="city" class="form-control" onchange="showUser1(this.value)">
												  
												   </select>-->
												   <input type="text" name="city" id="city" value="<?php echo $city; ?>"class="form-control">
                                        
                                            </div>
                                            	<div class="form-group">
	                                            <label>Mandal</label>
	                                            <!--<select name="plac"  id="plac" class="form-control" >
												   
												   </select> -->
												   
												   <input type="text" name="plac" id="plac" value="<?php echo $mandal; ?>" class="form-control"> </div>	
												   
												   	<div class="form-group">
	                                            <label>State</label>
	                                             

<input type="text" name="state" id="state" class="form-control" value="<?php echo $state; ?>">
												   </div>
	                                        
	                                       
                                          
											 
											<div class="form-group">
	                                            <label>Ref Doctor</label>
	                                       <select  name="ref_doc" id="ref_doc" class="form-control"   >
<option value="">Select Referal Doctor</option>
<?php 

$sq=mysqli_query($link,"select * from  referal_doctor");
if($sq){
while($row=mysqli_fetch_array($sq)){

$ref_docname=$row['ref_docname'];
$refcode=$row['refcode'];
?>
<option value="<?php echo $refd=$refcode; ?>" <?php if($ref_doc==$refd){echo 'selected';} ?>><?php echo $ref_docname; ?></option>
<?php } } ?>

</select>

	                                        </div>
											
											 <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="submit">
                                                    <button type="button" class="btn btn-danger" onclick="javascript:location.href='book_appointment.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
										
                                  
                                    </div>
									<div class="col-md-4 col-sm-4">
                                        
									   
									  <div class="form-group">
	                                            <label><b>Patient Type </b></label>
												
											
												<select name="type" id="type" required  onchange="showHint011(this.value)"  onclick="funconce1(this.value);"  class="form-control">
												<option value="">Select</option>
												<option value="OP" <?php if($ptype=="OP"){echo 'selected';} ?>>OP</option>
												<option value="IP"  <?php if($ptype=="IP"){echo 'selected';} ?>>IP</option>
												<option value="Insurance" <?php if($ptype=="Insurance"){echo 'selected';} ?>>Insurance</option>
												</select>
												
																				
												
	                                        </div>
										
										 <input name="token" id="token" readonly="readonly"  class="form-control" type="hidden"  size="20"  required="required"
 />
												
									<div class="form-group" >
	                                            <label>Op Type</label>
												<select name="op_type" id="op_type"  class="form-control">
												<option value="">Select</option>
												<option value="General" <?php if($op_type=="General"){echo 'selected';}?>>General</option>
												<option value="Emergency"<?php if($op_type=="Emergency"){echo 'selected';}?>>Emergency</option>
												
												</select></div>

									<div class="form-group">
	                                            <label>Consult Doct Name</label>
	                                          

<select id="doctorname"  name="doctorname" class="form-control" required  onfocus="showHint01(this.value)"  onChange="showHint01345(this.value)"  onblur="showHint01345(this.value)">
<option value="">Select Doctor</option>

<?php  
  $sql="select distinct dname1 from doct_infor ";  
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) { ?>
<option value="<?php echo $dd=$row['dname1'] ?>" <?php if($doctorname==$dd){ echo 'selected';} ?>><?php echo $row['dname1'] ?></option> 
<?php }


?>
</select>
											
                </div>
									   
									   
											 <div class="form-group">
	                                            <label>Consultation Fee</label>
	                                          <input type="text"  name="con_fee"    id="con_fee" class="form-control" value="<?php echo $total; ?>"/>
	                                        </div>
											 
									   
											
												  
												   
											
											
													  <div class="form-group" >
                                                <label class="control-label ">Paid Amount
                                                  
                                                </label>
                                         
                                                 
												   <input type="text" name="paid" id="paid" class="form-control" onKeyup="ptest()" readonly required value="<?php echo $paid; ?>">
                                        
                                            </div>
									
											  <div class="form-group" >
                                                <label class="control-label ">Due Amount
                                                  
                                                </label>
                                         
                                                  
												   <input type="text" name="due" id="due" class="form-control" value="<?php echo $due; ?>">
                                        
                                            </div>
										   
										   <div class="form-group" >
                                                <label class="control-label ">Payment Type
                                                  
                                                </label>
                                         
                                                  
												   <select name="paytype" id="paytype" class="form-control" required>
												       <option value="">Select Payment</option>
												       <option value="Cash" <?php if($concession_type=="Cash"){echo 'selected';} ?>>Cash</option>
												        <option value="Card"<?php if($concession_type=="Card"){echo 'selected';} ?>>Card</option>
												         <option value="Free"<?php if($concession_type=="Free"){echo 'selected';} ?>>Free</option>
												          <option value="Cheque"<?php if($concession_type=="Cheque"){echo 'selected';} ?>>Cheque</option>
												           <option value="Credit" <?php if($concession_type=="Credit"){echo 'selected';} ?>>Credit</option>
                                        </select>
                                            </div>
										   
										   
										
                                    </div>
                                	</div>
									
									
                                </div>
								
                            </div>
                        </div>
                    </div>
					
					</form>
		     
            <!-- end page content -->
            <!-- start chat sidebar -->
		  
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>