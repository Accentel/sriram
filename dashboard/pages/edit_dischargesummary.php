<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/insert_dischargesummary.php');

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
                                <div class="page-title">Discharge Summary Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Discharge Summary Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Discharge Summary Details</header>
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
                                <div class="card-body" id="bar-parent">
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										
										
										 <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <!--   <input type="text" name="umrno" data-required="1"  id="umrno" placeholder="Enter UMR NO" class="form-control" onChange="showHint52()" required/> -->
													 <input id="umrno" list=\"city21\" value="<?php echo $k1['mrno']; ?>" class="form-control" name="umrno"  onChange="showHint52()"  >
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
                                            
											<label class="control-label col-md-2">Date
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="date" value="<?php echo $k1['date']; ?>" name="bdate" id="bdate">
														 <input class="form-control " size="16"  type="hidden" value="<?php echo $ses; ?>" name="ses" id="ses">
		                                                 <input class="form-control " size="16"  type="hidden" value="<?php echo $k1['id']; ?>" name="id" id="id">
	                                            
	                                            </div>
											</div>
										
                                        <div class="form-group row">
                                                  <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patname" data-required="1" value="<?php echo $k1['pname']; ?>" id="patname" placeholder="Enter Patient Name" class="form-control " required/>
													
													</div>
											<label class="control-label col-md-2">IP No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patno" data-required="1" id="patno" placeholder="Enter Patient No" class="form-control" value="<?php echo $k1['patno']; ?>" />
													
													</div>
                                            
											
											</div>
											
											<div class="form-group row">
                                              
													<label class="control-label col-md-2">Age/Sex
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="age" data-required="1" id="age" value="<?php echo $k1['age']; ?>" placeholder="Enter Age " class="form-control" required/> 
													
													</div>
													<div class="col-md-2">
                                                     <input type="text" name="sex" data-required="1" id="sex" value="<?php echo $k1['sex']; ?>" placeholder="Enter Sex " class="form-control" required/> 
	                                            
	                                            </div>
                                            
	                                             <label class="control-label col-md-2">DOA
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Date of Birth" type="date" value="<?php echo $k1['doa']; ?>" name="doa" id="doa">
		                                                
	                                            
	                                            </div>
                                                
											
											</div>
											
											
											
											<div class="form-group row">
											<label class="control-label col-md-2">DOOP
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="date" value="<?php echo $k1['dop']; ?>" name="doop" id="doop">
		                                                
	                                            	
	                                            
	                                            </div>
                                                
                                           <label class="control-label col-md-2">DOD
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="date" value="<?php echo $k1['dod']; ?>" name="dichargedate" id="dichargedate">
		                                                
	                                            
	                                            </div>
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                           <label class="control-label col-md-2">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <textarea  name="address" id="address" placeholder=" Address" class="form-control-textarea" rows="3" ><?php echo $k1['addr']; ?></textarea>
                                               	</div>
											<label class="control-label col-md-2">Doctor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <select name="dname" id="dname" class="form-control">
													 <option value="">Select Doctor Name</option>
													 <?php
													 $q=mysqli_query($link,"select * from doct_infor") or die(mysqli_error($link));
													 while($r=mysqli_fetch_array($q)){
													 ?>
													 <option value="<?php echo $r['dname1'] ?>" <?php if($k1['doctor']==$r['dname1']){ echo 'selected';} ?>><?php echo $r['dname1'] ?></option>
													 <?php }?>
													 </select>
                                               
		                                                
		                                                
	                                            	</div>
											</div>
											
											                                                   
                                                
											<div class="form-group row">
                                                <label class="control-label col-md-2">Diagnosis
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="diagsnosis" id="diagsnosis"  class="form-control ckeditor" rows="10" ><?php echo $k1['diagsnosis']; ?></textarea>
                                                </div>
												 
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Complaints
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="complaints" id="complaints"  class="form-control ckeditor" rows="10" ><?php echo $k1['complaints']; ?></textarea>
                                                </div>
												 
                                            </div>
                                           <div class="form-group row">
                                                <label class="control-label col-md-2">Clinical Findings
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="findings" id="findings"  class="form-control ckeditor" rows="10" ><?php echo $k1['cfindings']; ?></textarea>
                                                   </div>
												 
                                            </div>
											
                                                  <div class="form-group row">
                                                <label class="control-label col-md-2">Investigations
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="investigations" id="investigations"  class="form-control ckeditor" rows="3" ><?php echo $k1['investigations']; ?></textarea>
                                                   </div>
												 
                                            </div>
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Course in Hospital
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="chospital" id="chospital"  class="form-control ckeditor" rows="3" ><?php echo $k1['course']; ?></textarea>
                                                   </div>
												 
                                            </div>
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Condition at Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="conhospital" id="conhospital"  class="form-control ckeditor" rows="3" ><?php echo $k1['condischarge']; ?></textarea>
                                                   </div>
												 
                                            </div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Treatment advice at Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                     <textarea name="treatment" id="treatment"  class="form-control ckeditor" rows="3" ><?php echo $k1['tdischarge']; ?></textarea>
                                                   </div>
												 
                                            </div>
											</div>
											
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="update" class="btn btn-info">Update</button>
                                                    <a href="dischargesummarylist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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