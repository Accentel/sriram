<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/update_labbill1.php');
include("header.php");?>
<script>

//for(var i=1;i<=10;i++){
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
calculateSum();
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search117.php?q="+str,true);
xmlhttp.send();
}

//}


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
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Procedure Lab Bill</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Procedure Bill</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Procedure Bill</header>
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
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <?php	foreach($rst as $key => $res){
											//$bdate1 = str_replace('-', '/', ());
											$bdate=$res['bdate'];
											$tamount=$res['tamount'];
											$discount=$res['discount'];
											$namount=$res['namount'];
											$pamount=$res['pamount'];
											$bamount=$res['bamount'];
											$remarks=$res['remarks'];
											$paymenttype=$res['paymenttype'];
											$ptype=$res['ptype'];
												$cancel=$res['cancel'];
									$patient_category=$res['patient_category'];
											?>
										<div class="form-body">
										
										
										<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select  name="ptype" id="ptype" class="form-control" required onchange="showuser(this.value);">
													<option value="">Select patient Type</option>
													<option value="general" <?php if($ptype=="general"){echo 'selected';} ?>>General</option>
													<option value="OP" <?php if($ptype=="OP"){echo 'selected';} ?>>OP</option>
													<option value="IP" <?php if($ptype=="IP"){echo 'selected';} ?>>IP</option>
													</select>													
													
													</div>
											                                   
											
											</div>
										
										
										
										<?php if($ptype!='general'){ ?>
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mrno"   id="mrno" placeholder="Enter MRNO" class="form-control mrno" readonly value="<?php echo $mrno=$res['mrno']; ?>" required onChange="showHint5(this.value)"/> 
													 </div>
                                     	
											</div>
										<?php }else{}?>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Bill No
                                                    <span class="required"> * </span>
                                                </label>
												
											
                                                <div class="col-md-4">
												
                                                    <input type="text" name="bno" data-required="1" id="bno" placeholder="Enter Bill No" class="form-control" value="<?php echo $bno1=$res['billno']; ?>" readonly/>
													 <input type="hidden" name="user"  id="user"  class="form-control" value="<?php echo $ses; ?>" />
													 <input type="hidden" name="id"  id="id"  class="form-control" value="<?php echo $crud->my_simple_crypt($res['id'],'e'); ?>" />
													</div>
											
												<label class="control-label col-md-2">Bill Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   
		                                                <input class="form-control " size="16" placeholder="Bill Date" type="date" value="<?php
		                                                
		                                               echo  $fdate1=$bdate;
		                                                
		                                                
		                                               ?>" name="bdate" id="bdate">
		                                                
	                                            	</div>
	                                           
												</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pname" data-required="1" id="pname"  placeholder="Enter Patient Name" class="form-control" required value="<?php echo $res['pname']; ?>"/> 
													
													</div>
												<label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="age" data-required="1" id="age"  placeholder="Enter Age" class="form-control" required value="<?php echo $res['age']; ?>"/> 
                                              </div>
											
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="gender" data-required="1" id="gender"   placeholder="Enter Gender" class="form-control" required value="<?php echo $res['gender']; ?>"/> 
													
													</div>
													<?php if($ptype!='general'){ ?>
                                            <label class="control-label col-md-2">Doctor Name
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="dname"  id="dname" placeholder="Enter Doctor Name" class="form-control" value="<?php echo $res['dname']; ?>"/> </div>
                                            <?php }else{}?>
											
											</div>
													
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Mobile No
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile No" class="form-control" value="<?php echo $res['mobile']; ?>"/> </div>
                                           <label class="control-label col-md-2">Time
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="time" id="" placeholder="" class="form-control" value="<?php echo $res['time']; ?>" /> </div>
                                           
											
											</div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Category</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patcategory" data-required="1" id="patcategory" placeholder="Enter patcategory" class="form-control"  value="<?php echo $patient_category ?>"/> </div>
                                         
                                                
                                           
											
											</div>
											
											<?php }?>
											<?php if($ses=='admin'){ ?>
											<div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>						
	<?php }else{}?>
											<div class="form-group row">
											<div class="col-md-12">
											<table class=" full-width" id="table">
					                                        <thead>
					                                            <tr>
					                                            	<th></th>
					                   
																	 <th> Test Name </th>
					                                                <th> Amount </th>
														        </tr>
					                                        </thead>
					                                        <tbody>
															<?php 
															$yk="select * from bill1_proc where bno='$bno1' and mrno='$mrno'";
															$tu=$crud->getdata($yk);
															$i=1;
															foreach($tu as $key=>$t1){
															?>
															 <tr>
					                                            	<th>
					                                            	<?php if($ses=='admin'){ ?>    
					                                            	    
					                                            	    <a href="fdelete.php?id=<?php echo $t1['id'];?>"><i class="fa fa-trash-o "></i></a>
					                                            	    <?php }else{}?>
					                                            	    </th>
					                                            	
																	 <th> <input type="text" name="tname[]" value="<?php echo $t1['testname']; ?>"  id="tname" placeholder="" class="form-control col-md-4 tname<?php echo $i ?>" onChange="showHint(1)" onkeyup='callus(<?php echo $i ?>)' /> </th>
					                                                <th> <input type="text" <?php if($ses=='admin'){echo '';}else{ echo 'readonly';} ?> name="amount[]" value="<?php echo $t1['amount']; ?>" id="amount1" placeholder="" class="form-control col-md-4 txt" /> 
																	<input type="hidden" name="id1[]" value="<?php echo ($t1['id']); ?>" id="id1"  class="form-control col-md-4 " /> </th>
														        </tr>
															<?php $i++; }?>
														
															</tbody>
											</table>
											
											</div>
                                            </div>
                                            
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="tamount" <?php if($ses=='admin'){echo '';}else{ echo 'readonly';} ?> data-required="1" id="tamount"  value="<?php echo $tamount; ?>" placeholder="Enter Total Amount" class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Discount
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="discount" <?php if($ses=='admin'){echo '';}else{ echo 'readonly';} ?>  value="<?php echo $discount; ?>" id="discount" placeholder="Enter Discount" class="form-control txt1" /> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Net Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="namount"  id="namount" <?php if($ses=='admin'){echo '';}else{ echo 'readonly';} ?>  value="<?php echo $namount; ?>" placeholder="Enter Net Amount" class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Paid Amount
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pamount" <?php if($ses=='admin'){echo '';}else{ echo 'readonly';} ?>  id="pamount" placeholder="Enter Paid Amount" value="<?php echo $pamount; ?>" class="form-control txt2" /> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Balance Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="balamount" <?php if($ses=='admin'){echo '';}else{ echo 'readonly';} ?> id="balamount"  value="<?php echo $bamount; ?>" placeholder="Enter Balance Amount" class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Remarks
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="remarks"  id="remarks" placeholder="Enter Remarks" class="form-control" ><?php echo $remarks; ?></textarea> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Payment Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="paymenttype"  id="paymenttype" required class="form-control" required> 
													<option value="">Select Payment</option>
													<option value="cash" <?php if($paymenttype=="cash"){echo 'selected';} ?> >Cash</option>
													<option value="card"  <?php if($paymenttype=="card"){echo 'selected';} ?>>Card</option>
													<option value="Free"  <?php if($paymenttype=="Free"){echo 'selected';} ?>>Free</option>
													<option value="Credit"  <?php if($paymenttype=="Credit"){echo 'selected';} ?>>Credit</option>
													</select>
													</div>
                                           
                                           
                                                
											
											</div>
                                           
											
											
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    
													<button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="labbilllistk.php"><button type="button" class="btn btn-default">Cancel</button></a>
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

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTotal2();
});
$(".txt").each(function(){
$(this).keyup(function(){
calculateTotal2();
});
});


	   $(document).ready (function(){ 
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum()
;})
});


$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum1()
;})
});


$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum2()
;})
});



});
function callus(i)
{
    
    //autocomplete
    $(".tname"+i).autocomplete({
        source: "set19999.php",
        minLength: 1
    });  
   
	
}
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#tamount").val(sum.toFixed(2));
$("#namount").val(sum.toFixed(2));

var n=$("#namount").val();
var p=$("#pamount").val();
b=parseFloat(n)-parseFloat(p);
$("#balamount").val(b.toFixed(2))

;}


function calculateSum1(){
var sum1=0;
$(".txt1").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum1+=parseFloat(this.value)
;}});
$t=$("#tamount").val();

$d=$("#discount").val();
$n=parseFloat($t)-parseFloat($d);
$("#namount").val($n);
$("#balamount").val($n)

;}


var i=2;
$(".addmore").on('click',function(){
	
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
data +="<td><select name='tname[]'  id='tname"+i+"' data-row='"+i+"' style='width:300px;' class='form-control'  onChange='showHint("+i+")'><option value=''>Select Test Name</option>";
	<?php 
	$u=mysqli_query($link,"select * from procedure1") or die(mysqli_error($link));
	while($u1=mysqli_fetch_array($u)){
	?>
	data +="<option value='<?php echo $u1["name"]; ?>'><?php echo $u1["name"]; ?></option>";
	<?php }?>
	data +="</select></td>";
	data +="<td><input type='text' name='amount[]' id='amount"+i+"' readonly data-row='"+i+"' value='0' class='form-control col-md-4 txt' onkeyup='calculateSum()' /></td>";
												        
   
    data +="</tr>";
												   
	$('#table ').append(data).find('#table>tbody>tr:nth-child(2)');
	callus
	i++;
});


function calculateSum2(){
var sum2=0;
$(".txt2").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum2+=parseFloat(this.value)
;}});
//$("#tamount").val(sum.toFixed(2));
$ts=$("#namount").val();
$pm=$("#pamount").val();
$bm=parseFloat($ts)-parseFloat($pm);
$("#balamount").val($bm);

;}
	   </script>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>