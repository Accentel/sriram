	<?php //include('config.php');
session_start();

if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('opdigital_insert.php');
include('../db/connection.php');
include("header.php");?>
<script>

for(var i=1;i<=10;i++){
	//var sy="showHint()"+i;
	//alert(sy);
function showHint(i)
{
var str=document.getElementById('tname'+i).value;
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
	
	document.getElementById("amount"+i).value=strar[1];
	var cost = document.getElementById("cost1").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search116.php?q="+str,true);
xmlhttp.send();
}

}


function showHint5(str)
{
//var str=document.getElementById('mrno').value;
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
	document.getElementById("gender").value=strar[3];
	document.getElementById("dname").value=strar[4];
	document.getElementById("mobile").value=strar[5];
	document.getElementById("ptype").value=strar[6];
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search216.php?q="+str,true);
xmlhttp.send();
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

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('time').value=" "+nhour+":"+nmin+":"+nsec+ap+"";

setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
<script>
function showuser(str){
	//alert(str);
	if(str=="general"){
		document.getElementById('mid').style.display="none";
		document.getElementById('d1').style.display="none";
		document.getElementById('d2').style.display="none";
		
	}
	if(str=="OP"){
		document.getElementById('mid').style.display="";
		document.getElementById('d1').style.display="";
		document.getElementById('d2').style.display="";
		
	}
	if(str=="IP"){
		document.getElementById('mid').style.display="";
		document.getElementById('d1').style.display="";
		document.getElementById('d2').style.display="";
		
	}
	
}
</script>
	<script type="text/javascript">
   function showUser1111(str){
	//alert(str);
	if(str == "Free"){
	

		document.getElementById("balamount").value="0";
		//document.getElementById("rec_type1").style.display='none';
		
		
		//alert(val);
	}else {
	
		var val=document.getElementById("con_fee1").value;
		//alert(val);
		document.getElementById("balamount").value=val;
			
		
	}
	
}
		</script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<?php 
include('../db/connection.php');
$reg=$_GET['reg'];
$y=mysqli_query($link,"select * from opdigitalform where id='$reg' ") or die(mysqli_error($link));
$y1=mysqli_fetch_array($y);
?>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Op Digital Form</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Appointment</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Op Digital Form</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Op Digital Form</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        
                                </div>
                                <div class="card-body" id="bar-parent">
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										
										
										<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text"  name="ptype" id="ptype" class="form-control" value="<?php echo $y1['optype']; ?>" required />
																			
													
													</div>
											                                   
											 <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mrno"  value="<?php echo $y1['mrno']; ?>" id="mrno" placeholder="Enter MRNO" class="form-control mrno"   />
													 <input type="hidden" name="id"  value="<?php echo $y1['id']; ?>" id="id"    />
                                                    
													 </div>
											</div>
											
											
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pname" data-required="1" value="<?php echo $y1['pname']; ?>" id="pname"  placeholder="Enter Patient Name" class="form-control" required/> 
													
													</div>
												<label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="age" data-required="1" id="age" value="<?php echo $y1['age']; ?>"  placeholder="Enter Age" class="form-control" required/> 
                                              </div>
											
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="gender" data-required="1" id="gender" value="<?php echo $y1['sex']; ?>"   placeholder="Enter Gender" class="form-control" required/> 
													
													</div>
													
                                            <label class="control-label col-md-2" id="d1" >Doctor Name</label>
                                                <div class="col-md-4" id="d2">
                                                    <input type="text" name="dname" data-required="1" id="dname" value="<?php echo $y1['consult_doct']; ?>" placeholder="Enter Doctor Name" class="form-control" /> 
													</div>
                                           		</div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Provisional Diagnosis
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="pdiagnosis" data-required="1" id="pdiagnosis"    placeholder="Enter Provisional Diagnosis" class="form-control" ></textarea> 
													
													</div>
													
                                            <label class="control-label col-md-2" id="d1" >Final Diagnosis</label>
                                                <div class="col-md-4" id="d2">
                                                    <textarea name="fdiagnosis" data-required="1" id="fdiagnosis"    placeholder="Enter Final Diagnosis" class="form-control" ></textarea> 
													</div>
                                           
											
											</div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Clinical History
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="chistory" data-required="1" id="chistory"    placeholder="Enter Clinical History" class="form-control" ></textarea> 
													
													</div>
													</div>
											
											<h2>At The Time of Examination</h2>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Pulse Rate
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pulse" data-required="1"  id="pulse"  placeholder="Enter Pulse Rate" class="form-control" /> 
													
													</div>
												<label class="control-label col-md-2">BP
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="bp" data-required="1" id="bp"   placeholder="Enter BP" class="form-control" /> 
                                              </div>
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Temperature
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="temperature" data-required="1"  id="temperature"  placeholder="Enter Temperature" class="form-control" /> 
													
													</div>
												<label class="control-label col-md-2">Repository Rate
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="repository" data-required="1" id="repository"   placeholder="Enter Repository Rate" class="form-control" /> 
                                              </div>
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Heart
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="heart" data-required="1"  id="heart"  placeholder="Enter Heart" class="form-control" /> 
													
													</div>
												<label class="control-label col-md-2">Lungs
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="lungs" data-required="1" id="lungs"   placeholder="Enter Lungs" class="form-control" /> 
                                              </div>
											
											</div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">P/A
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pa" data-required="1"  id="pa"  placeholder="Enter P/A" class="form-control" /> 
													
													</div>
												<label class="control-label col-md-2">CNS
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="cns" data-required="1" id="cns"   placeholder="Enter cns" class="form-control" /> 
                                              </div>
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Local Examination Findings
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea  name="localexamination" data-required="1"  id="localexamination"  placeholder="Enter Local Examination Findings" class="form-control" ></textarea> 
													
													</div>
												
											
											</div>
											
											<div align="left">
	<b>Advised Investigations</b>
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>										
											
											<div class="form-group row">
											<div class="col-md-12">
											<table class=" full-width" id="table" >
					                                        <thead>
					                                            <tr>
					                                            	<th></th>
																	 <th> Test Name </th>
					                                             
														        </tr>
					                                        </thead>
					                                        <tbody>
					                                            <tr>
												   <td><input type='checkbox' class='case'/></td>
   
	
	<td><input type='text' name='tname[]'    id='tname1' data-row='1' value='' class='form-control col-md-4 tname1' onkeyup="callus(1)"/></td>
	
												        
   
    </tr>
															 <tr>
					                                            	
														        
															</tbody>
											</table>
											
											</div>
                                            </div>
                                           <div align="left">
	<b>Medications Advised</b>
<button type="button" class='btn btn-success addmore1'>+</button>
<button type="button" class='btn btn-danger delete1'>-</button>
	</div>										
											
											<div class="form-group row">
											<div class="col-md-12">
											<table class=" full-width" id="table1" >
					                                        <thead>
					                                            <tr>
					                                            	<th></th>
																	<th> Drug Type </th>
																	<th> Drug Name </th>
																	<th> Generic</th>
																    <th> Dose Time</th>
																    <th> Route</th>
																    <th> Days</th>
																	<th> Qty</th>
																	<th> Indication</th>
														        </tr>
					                                        </thead>
					                                        <tbody>
					                                            <tr>
												   <td><input type='checkbox' class='case'/></td>
   
	
	<td><select name='dtype[]' id='dtype1'   class='form-control' >
	<?php
$u=mysqli_query($link,"select * from phr_prdtype_mast") or die(mysqli_error($link));
while($u1=mysqli_fetch_array($u)){
	?>
	<option value="<?php echo $u1['REP'] ?>"><?php echo $u1['REP'] ?></option>
<?php }?>
	</select></td>
	<td><input type='text' name='dname[]'    id='dname1' onkeyup="callus1(1)" data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='generic[]'    id='generic1' data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='dtime[]'    id='dtime1' data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='dadmin[]'    id='dadmin1' data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='route[]'    id='route1' data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='days[]'    id='days1' data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='qty[]'    id='qty1' data-row='1' size="8" class='form-control' /></td>
	<td><input type='text' name='indication[]'    id='indication1' data-row='1' size="8" class='form-control' /></td>
	
												        
   
    </tr>
															 <tr>
					                                            	
														        
															</tbody>
											</table>
											
											</div>
                                            </div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Other procedure/Suggestions
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea  name="suggestions" data-required="1"  id="suggestions"  placeholder="Enter Other Procedure" class="form-control" ></textarea> 
													
													</div>
												
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Review Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="date"  name="rdate" id="rdate"  value="<?php echo date('Y-m-d'); ?>" class="form-control" /> 
													
													</div>
												
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Outside Report Attachment
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="file"  name="image" id="image"   class="form-control" /> 
													
													</div>
												
											
											</div>
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="opdigitalform.php"><button type="button" class="btn btn-default">Cancel</button></a>
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
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	   
	   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".mrno").autocomplete({
        source: "set9.php",
        minLength: 1
    });    


;})
function callus(i)
{
    
    //autocomplete
    $(".tname"+i).autocomplete({
        source: "set1999.php",
        minLength: 1
    });  
   
	
}

function callus1(i)
{
    
    //autocomplete
    $("#dname"+i).autocomplete({
        source: "set2999.php",
        minLength: 1
    });  
   
	
}
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTotal2();
});
$(".txt").each(function(){
$(this).keyup(function(){
calculateTotal2();
});
});


var i=2;
$(".addmore").on('click',function(){
	
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td><input type='text' name='tname[]' id='tname"+i+"' data-row='"+i+"' value='' class='form-control col-md-4 tname"+i+"' onkeyup='callus("+i+")' /></td>";
	
												        
   
    data +="</tr>";
												   
	$('#table ').append(data).find('#table>tbody>tr:nth-child(2)');
	
	i++;
});


var j=2;
$(".addmore1").on('click',function(){
	
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td><select name='dtype[]' id='dtype"+j+"'  class='form-control'   ><?php $u=mysqli_query($link,"select * from phr_prdtype_mast") or die(mysqli_error($link));while($u1=mysqli_fetch_array($u)){?><option value='<?php echo $u1['REP'] ?>'><?php echo $u1['REP'] ?></option><?php }?></select></td>";
	 data +="<td><input type='text' name='dname[]'    id='dname"+j+"'  data-row='"+j+"' size='8' onkeyup='callus1("+j+")' class='form-control' /></td>";
	 data +="<td><input type='text' name='generic[]'    id='generic"+j+"' data-row='"+j+"' size='8' class='form-control' /></td>";
	 data +="<td><input type='text' name='dtime[]'    id='dtime"+j+"' data-row='"+j+"' size='8' class='form-control' /></td>";
	 data +="<td><input type='text' name='dtime[]'    id='dtime"+j+"' data-row='"+j+"' size='8' class='form-control' /></td>";
	 data +="<td><input type='text' name='route[]'    id='route"+j+"' data-row='"+j+"' size='8' class='form-control' /></td>";
	 data +="<td><input type='text' name='days[]'    id='days"+j+"' data-row='"+j+"' size='8' class='form-control' /></td>";
	 data +="<td><input type='text' name='indication[]'    id='indication"+j+"' data-row='"+j+"' size='8' class='form-control' /></td>";
												        
   
    data +="</tr>";
												   
	$('#table1').append(data).find('#table>tbody>tr:nth-child(2)');
	
	j++;
});
	   </script>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}


?>