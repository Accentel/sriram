<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
//include('../db/insert_dischargesummary.php');

include("header.php");?>
<script>
function showHint52()
{
var str=document.getElementById("umrno").value;
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
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("patno").value=strar[1];
	
	document.getElementById("patname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	document.getElementById("age").value=strar[4];
	document.getElementById("sex").value=strar[5];
	document.getElementById("doa").value=strar[6];
	document.getElementById("dichargedate").value=strar[7];
	document.getElementById("address").value=strar[8];
	document.getElementById("doctors").value=strar[9];
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search67.php?q="+str,true);
xmlhttp.send();
}
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("labre").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","search31.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Final Bill Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Final Bill Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Final Bill Details</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                </div>
								<?php 
								
								 $id=$_GET['id'];
								 $sq=mysqli_query($link,"select * from final_bill where id='$id'");
								 $r=mysqli_fetch_array($sq);
								?>
                                <div class="card-body" id="bar-parent">
								
                                    <form action="final_bill.php" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <!--   <input type="text" name="umrno" data-required="1"  id="umrno" placeholder="Enter UMR NO" class="form-control" onChange="showHint52()" required/> -->
													 <input id="umrno" list=\"city21\" class="form-control" name="umrno" value="<?php echo $r['mrno'];?>"  onChange="showHint52()"  >
<datalist id=\"city21\" >

<?php 

$sql="select distinct PAT_REGNO from ip_pat_admit where DIS_STATUS='ADMITTED' ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[PAT_REGNO]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";

?>	
													 
													 
													 <strong class="required"><?php if(isset($errorecode)){ echo $errorecode;} ?> </strong></div>
                                            
											<label class="control-label col-md-2">Pat No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patno" data-required="1" id="patno" placeholder="Enter Patient No" class="form-control" value="<?php echo $r['patno'];?>" />
													
													</div>
                                            
											
											</div>
											
											
											
										 <input type="hidden" name="id" data-required="1" id="id" placeholder="Enter Patient No" class="form-control" value="<?php echo $r['id'];?>" />	
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="age" data-required="1" id="age" value="<?php echo $r['age'];?>" placeholder="Enter Age " class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Sex
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <input type="text" name="sex" data-required="1" id="sex" value="<?php echo $r['sex'];?>" placeholder="Enter Sex " class="form-control" required/> 
	                                            
	                                            </div>
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                            <label class="control-label col-md-2">Date of Admission
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Date of Birth" type="date" value="<?php echo $r['doa']; ?>" name="doa" id="doa">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            
	                                            </div>
											<label class="control-label col-md-2">Date of Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="date" value="<?php echo $r['dichargedate']; ?>" name="dichargedate" id="dichargedate">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            
	                                            </div>
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patname" data-required="1" value="<?php  echo $r['pname']; ?>" id="patname" placeholder="Enter Patient Name" class="form-control " required/>
													
													</div>
                                            <label class="control-label col-md-2">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <textarea  name="address" id="address" placeholder=" Address" class="form-control-textarea" rows="5" ><?php  echo $r['address']; ?></textarea>
                                               
		                                                <input class="form-control " value="<?php  echo $r['fname']; ?>" style="display:none;" size="16" placeholder="Father Name" type="text"  name="fname" id="fname">
		                                                
	                                            	</div>
	                                            
											
											</div>
											
											
											
											
										
											
                                                   
                                                    <textarea name="doctors" style="display:none;" id="doctors" placeholder="Consultant Name" value="<?php  echo $r['doctors']; ?>" class="form-control-textarea" rows="5" ></textarea>
                                                
											<div class="form-group row">
                                                <label class="control-label col-md-2">Final  Diagnosis
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="lab" id="result"  class="form-control ckeditor" rows="10" ><?php  echo $r['final_diefg']; ?></textarea>
                                                </div>
												 
                                            </div>
                                          	<div class="form-group row">
                                                <label class="control-label col-md-2">Treetment
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="treetment" id="treetment"  class="form-control " rows="5" ><?php  echo $r['treetment']; ?></textarea>
                                                </div>
												 
                                            </div>
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">No.of Days
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" value="<?php echo $r['room_days'];?>" name="room_days" id="room_days" onchange="krk(this.value)" onkeyup='nett1x();'   class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
													
											
												<label class="control-label col-md-1"> Rent
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" value="<?php echo $r['room_rent'];?>" name="room_rent" id="room_rent" onchange="krk(this.value)" onkeyup='nett1x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2">Room Charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="room_charges" value="<?php echo $r['room_charges'];?>" id="room_charges"  class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											
											
											
											
											
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">Nursing Charges(Days)
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="nurs_days" value="<?php echo $r['nurs_days'];?>" id="nurs_days" onchange="krk(this.value)" onkeyup='nett2x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">Rate
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="nurs_rent" value="<?php echo $r['nurs_rent'];?>" id="nurs_rent" onchange="krk(this.value)" onkeyup='nett2x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2">Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="nurs_charges" value="<?php echo $r['nurs_charges'];?>"  id="nurs_charges"  class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											
											
											
											
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">Profissional Charges(Days)
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="prof_days" value="<?php echo $r['prof_days'];?>" id="prof_days" onchange="krk(this.value)" onkeyup='nett4x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">Rate
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="prof_rent" value="<?php echo $r['prof_rent'];?>" id="prof_rent" onchange="krk(this.value)" onkeyup='nett4x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2">Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="prof_charges"  value="<?php echo $r['prof_charges'];?>" id="prof_charges"  class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">Investgation Charges(Days)
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="inv_days" value="<?php echo $r['inv_days'];?>" id="inv_days" onchange="krk(this.value)" onkeyup='nett3x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">Rate
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="inv_rent" value="<?php echo $r['inv_rent'];?>" id="inv_rent" onchange="krk(this.value)" onkeyup='nett3x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2">Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="inv_charges"  value="<?php echo $r['inv_charges'];?>" id="inv_charges"  class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											
											
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">Pharmacy Charges(Days)
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="phr_days" value="<?php echo $r['phr_days'];?>" id="phr_days" onchange="krk(this.value)" onkeyup='nett5x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">Rate
                                                    <span class="required"> * </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="phr_rent" value="<?php echo $r['phr_rent'];?>" id="phr_rent" onchange="krk(this.value)" onkeyup='nett5x();'  class="form-control changesNo2">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2">Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="phr_charges" value="<?php echo $r['phr_charges'];?>" id="phr_charges"  class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											
											
											
											
											
											
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">
                                                    <span class="required">  </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                              
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">
                                                    <span class="required">  </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                              
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2"><b>Total Amount</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="tot_amt" id="tot_amt" value="<?php echo $r['tot_amt'];?>" class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">
                                                    <span class="required">  </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                              
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">
                                                    <span class="required">  </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                              
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2"><b>Discount</b>
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="discount" id="discount" value="<?php echo $r['discount'];?>"  onkeyup="krk5(this.value)" class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
                                                 
												 
												 
												 
												 
											<div class="form-group row">
                                                
                                            
												  <label class="control-label col-md-3">
                                                    <span class="required">  </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                              
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
												<label class="control-label col-md-1">
                                                    <span class="required"> </span>
                                                </label>
												 <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                              
	                                            	</div>
	                                            
	                                            </div>
												
												<label class="control-label col-md-2"><b>Net Amount</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                               <input type="text" name="net" id="net" value="<?php echo $r['net'];?>"  class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            </div>
												
												
											
											</div>
											</div>
											
											
											
											
											
											
											
											
											
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="update" class="btn btn-info">Update</button>
                                                    <a href="finalbilllist.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
	<script>
function nett1x(str){
							  var o_dis=document.getElementById("room_days").value;
							 
							  var nettotal=document.getElementById("room_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("room_charges").value=eval(sumk).toFixed(2);
							
						
							
							  }
							  krk();
							  </script>	
							  
							  	<script>
function nett2x(str){
							  var o_dis=document.getElementById("nurs_days").value;
							 
							  var nettotal=document.getElementById("nurs_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("nurs_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  <script>
function nett3x(str){
							  var o_dis=document.getElementById("inv_days").value;
							 
							  var nettotal=document.getElementById("inv_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("inv_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  <script>
function nett4x(str){
							  var o_dis=document.getElementById("prof_days").value;
							 
							  var nettotal=document.getElementById("prof_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("prof_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  <script>
function nett5x(str){
							  var o_dis=document.getElementById("phr_days").value;
							 
							  var nettotal=document.getElementById("phr_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("phr_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  
								<script>
function krk(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("room_charges").value;
							   var nurse=document.getElementById("nurs_charges").value;
							   	   var prof=document.getElementById("prof_charges").value;
								    var inv=document.getElementById("inv_charges").value;
									 var phr=document.getElementById("phr_charges").value;
							
							   sumk=(eval(room_charges))+(eval(nurse))+(eval(prof))+(eval(inv))+(eval(phr));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							 
							 
				function krk1(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("nurs_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }			 
							 function krk2(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("prof_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							  function krk3(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("inv_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							  function krk4(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("phr_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							 
							 
							  function krk5(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("discount").value;
							
							   sumk=(eval(o_dis))-(eval(room_charges));

							   document.getElementById("net").value=eval(sumk).toFixed(2);
							
							  }
							 
							  </script>	  
							     
		
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    

	      <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
            </script>
			 <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result1');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
            </script>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>