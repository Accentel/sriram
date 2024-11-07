<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?><?php
include("../db/connection.php");
//include("header.php");?>
<?php include("header.php");?>


	<script type="text/javascript">
function report()
{
var s_date=document.form.fdate.value;
   		    window.open('Ch_SalesEntry.php?s_date='+s_date,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
	<script type="text/javascript">
function report1()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;
   		    window.open('labbill_report.php?fdate='+s_date+'&tdate='+s_date1,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
	<script type="text/javascript">
function report2()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;
   		    window.open('admit_patients.php?sdate='+s_date+'&edate='+s_date1,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
	<script type="text/javascript">
function report3()
{
var s_date=document.form.fdate.value;var s_date1=document.form.fdate.value;
   		    window.open('view_in_patient_admit8.php?s_date='+s_date+'&e_date='+s_date1,'abc','width=1020,height=600,toolbar=no,menubar=no,scrollbars=yes')
	
}
</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
			
			
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
				
					<?php
$d=date('Y-m-d');					
 $a="SELECT * FROM `patientregister` where date='$d' and pat_type='OP' and pcancel=''";
					$sq=mysqli_query($link,$a);
					$r=mysqli_fetch_array($sq);
					$cnt=mysqli_num_rows($sq);?>
					
                    <!-- start widget -->
					
					<form name="form" method="post">
					<input type="hidden" name="sname" id="fdate" value="<?php echo date('Y-m-d');?>"> 
					<div class="row">
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-purple">
	                           <!-- <a href='book_appointment.php'><h3 class="text-white box-title">New Appointments <span class="pull-right">(ToDay)
								<i class="fa fa-caret-up"></i> <?php echo $cnt?></span></h3>-->
								<h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" value="OUT Patients" onclick="report3();">
							 
							  <i class="fa fa-caret-up"></i> <?php echo $cnt;?></h3>
								
								
	                            <div id="sparkline7"><canvas style="display: inline-block; width: 267px; height: 70px; vertical-align: top;"></canvas> <br></div>
								</a>
	                        </div>
	                    </div>
						<?php
					
  $a="SELECT * FROM `ip_pat_admit`
 where DIS_STATUS='ADMITTED' and ADMIT_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$ip=mysqli_num_rows($sq);
						
					?>
						<?php
					
  $a="SELECT * FROM `phr_salent_mast` where  SAL_DATE='$d' ";
					$sq=mysqli_query($link,$a);
					$i=1;
				$phar=mysqli_num_rows($sq);
				
				$l="select * from bill where bdate='$d'";
				$lb=mysqli_query($link,$l);
				$lbc=mysqli_num_rows($lb);
				$d1="select * from daycarebill where bdate='$d'";
				$db=mysqli_query($link,$d1);
				$dbc=mysqli_num_rows($db);
				$p="select * from physiotherapybill where bdate='$d'";
				$pb=mysqli_query($link,$p);
				$pbc=mysqli_num_rows($pb);		
					?>
					
					
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-danger">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" value="InPatients" onclick="report2();">
							 
							  <i class="fa fa-caret-up"></i> <?php echo $ip;?></h3>
								
							</span></h3>
	                            <div id="sparkline12"><canvas style="display: inline-block; width: 367px; height: 70px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
						<div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-blue">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" value="Lab Bill" onclick="report1();">
								
								<i class="fa fa-caret-up"></i> <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: inline-block; width: 367px; height: 40px; vertical-align: top;"></canvas></div>
	                        </div>
	                    </div>
						</form>
					
	                    <div class="col-md-3 col-xs-12 col-sm-6">
	                        <div class="analysis-box m-b-0 bg-success">
	                           <h3 class="text-white box-title">
							     <input type="submit" class="btn btn-info" value="Pharmacy Today" onclick="report();">
							 
							  <i class="fa fa-caret-up"></i> <?php echo $phar?></h3>
	                            <div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
								
	                        </div>
	                    </div>
                	</div>
					
					<?php
					
						$q="select ename from login where name1='$ses' ";
					$y=mysqli_query($link,$q) or die(mysqli_error($link));
						$y1=mysqli_fetch_array($y);
					$ename=$y1['ename'];
					
					$q1="select a.deptname from employee c,empdept a  where c.department=a.id  and c.empcode='$ename' ";
					$y2=mysqli_query($link,$q1) or die(mysqli_error($link));
					$y11=mysqli_fetch_array($y2);
					$dpt=$y11['deptname'];
					
					
					?>
					
					
					      
<?php
$d=date('Y-m-d');	
//patient registation
  $a="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Patient Register'";
					$opsq=mysqli_query($link,$a);
					$opr=mysqli_fetch_array($opsq);
					//$cnt=mysqli_num_rows($sq);
					 $amnt=$opr['amnt'];
//lab amount
$la="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Lab Bill'";
					$lsq=mysqli_query($link,$la);
					$lr=mysqli_fetch_array($lsq);
					//$cnt=mysqli_num_rows($sq);
					 $labamnt=$lr['amnt'];
					 
		$lda="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Lab Due Bill'";
					$ldsq=mysqli_query($link,$lda);
					$ldr=mysqli_fetch_array($ldsq);
					//$cnt=mysqli_num_rows($sq);
					 $labdamnt=$ldr['amnt'];			
				$flab=$labamnt+$labdamnt;	
				
				
				//procedure lab amount
$pla="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Procedure Lab Bill'";
					$plsq=mysqli_query($link,$pla);
					$plr=mysqli_fetch_array($plsq);
					//$cnt=mysqli_num_rows($sq);
					 $plabamnt=$plr['amnt'];
					 
		$plda="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Procedure Due Bill'";
					$pldsq=mysqli_query($link,$plda);
					$pldr=mysqli_fetch_array($pldsq);
					//$cnt=mysqli_num_rows($sq);
					 $plabdamnt=$pldr['amnt'];			
				$fplab=$plabamnt+$plabdamnt;
				
				//Advance registation
  $aa="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Advance Collection'";
					$asq=mysqli_query($link,$aa);
					$ar=mysqli_fetch_array($asq);
					//$cnt=mysqli_num_rows($sq);
					 $aamnt=$ar['amnt'];
					 
					 //in patient registation
  $ia="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='In Patient'";
					$isq=mysqli_query($link,$ia);
					$ir=mysqli_fetch_array($isq);
					//$cnt=mysqli_num_rows($sq);
					 $iamnt=$ir['amnt'];
	//manual final bill amount
$mfa="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='MFinal Bill'";
					$mfsq=mysqli_query($link,$mfa);
					$mfr=mysqli_fetch_array($mfsq);
					//$cnt=mysqli_num_rows($sq);
					 $mfamnt=$mfr['amnt'];
					 
		$mfda="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='MFinal Due Bill'";
					$mfdsq=mysqli_query($link,$mfda);
					$mfdr=mysqli_fetch_array($mfdsq);
					//$cnt=mysqli_num_rows($sq);
					 $mfdamnt=$mfdr['amnt'];			
				$mflab=$mfamnt+$mfdamnt;	
					//daycare amount
					$dca="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Daycare Bill'";
					$dcsq=mysqli_query($link,$dca);
					$dcr=mysqli_fetch_array($dcsq);
					//$cnt=mysqli_num_rows($sq);
					 $dcamnt=$dcr['amnt'];
					 
		$dcdda="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Daycare Due Bill'";
					$dcdsq=mysqli_query($link,$dcdda);
					$dcdr=mysqli_fetch_array($dcdsq);
					//$cnt=mysqli_num_rows($sq);
					 $dcdamnt=$dcdr['amnt'];			
				$dcfab=$dcamnt+$dcdamnt;
				
				//Final Bill Amount
					$fba="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Final Bill'";
					$fbsq=mysqli_query($link,$fba);
					$fbr=mysqli_fetch_array($fbsq);
					//$cnt=mysqli_num_rows($sq);
					 $fbamnt=$fbr['amnt'];
					 
		//Pharmacy Bill Amount
					$phba="SELECT sum(amount) as amnt FROM `daily_amount` where date(date1)='$d' and amnt_type='Pharmacy'";
					$phsq=mysqli_query($link,$phba);
					$phsbr=mysqli_fetch_array($phsq);
					//$cnt=mysqli_num_rows($sq);
					 $phsamnt=$phsbr['amnt'];
					
					?>
				
                    <!-- start widget -->
					<div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card card-box">
                                <div class="card-head">
								<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Today Total Summary</header>
                                </div>
                                <div class="card-body" id="bar-parent">
												
								  <table class="table">
								  <tr>
								  <th>S No</th>
								  <th>Particulars</th>
								  <th>Amount</th>
								  </tr>
								  <tr>
								  <td>1</td>
								  <td>Patient Registration</td>
								   <td><?php if($amnt>=1){ echo $amnt; } else { echo  "0"; }?></td>
								    
								   
								 
								  
								  </tr>	

								  <tr>
								  <td>2</td>
								  <td>Op to IP Registration</td>
								   <td><?php if($iamnt>=1) { echo $iamnt; } else { echo  "0"; }?></td>
								   
								  </tr>	

									<tr>
								  <td>3</td>
								  <td>Advance Amount</td>
								   <td><?php if($aamnt>=1) { echo $aamnt; } else { echo  "0"; }?></td>
								   
								  </tr>	
									<tr>
								  <td>4</td>
								  <td>Lab Amount</td>
								   <td><?php if($flab>=1){  echo $flab; } else { echo  "0"; }?></td>
								   
								  </tr>		



								  <tr>
								  <td>5</td>
								  <td>Daycare Amount</td>
								  
								   <td><?php if($dcfab>=1){  echo $dcfab; } else { echo  "0"; }?></td>
								  
								  </tr>

<tr>
								  <td>6</td>
								  <td>Manual Final Bill Amount</td>
								  
								   <td><?php if($mflab>=1){  echo $mflab; } else { echo  "0"; }?></td>
								  
								  </tr>	
								  
								  <tr>
								  <td>7</td>
								  <td>Final Bill Amount</td>
								   <td><?php if($fbamnt>=1) { echo $fbamnt; } else { echo  "0"; }?></td>
								    
								  </tr>

<tr>
								  <td>8</td>
								  <td>Pharmacy Bill Amount</td>
								   <td><?php if($phsamnt>=1) { echo $phsamnt; } else { echo  "0"; }?></td>
								   
								  </tr>
								  

<tr>
								  <td>9</td>
								  <td>Today Total Amount</td>
								   <td><?php $tam= $amnt+$aamnt+$flab+$iamnt+$mflab+$dcfab+$fbamnt+$phsamnt-$sr_amtt;
										if($tam>=1) { echo $tam;} else { echo  "0"; }

										?></td>
										 
								  </tr>									  
								  </table>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
					
				
					
					
					
                     <!-- start new patient list -->
					 
					 		
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Beds Status <i class="material-icons" style="color:green;width:32px;height:32px;">hotel</i>Available Beds &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i>Reserved Beds</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body" id="bar-parent">
												
								  <?php 
include('../db/locations.php');

									foreach($result as $key=>$p){ $lid=$p['id'];?>
									 <div><b><?php echo $p['lname']; ?></b></div>
									 <?php 
									  $r="select * from roomtype where ltype='$lid'";
									 $result1 = $crud->getData($r);
									  foreach($result1 as $key=>$p1){ $rid=$p1['id'];?>
									  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $p1['rtype']; ?></b></div>
									  <?php 
									  $r2="select * from rooms where ltype='$lid' and rtype='$rid'";
									 $result2 = $crud->getData($r2);
									  foreach($result2 as $key=>$p2){ $romid=$p2['id'];?>
									  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $p2['roomno']; ?></div>
									  
									   <?php 
									  $r3="select * from beds where ltype='$lid' and rtype='$rid' and roomno='$romid'";
									 $result3 = $crud->getData($r3);
									  foreach($result3 as $key=>$p3){ $bid=$p3['id'];?>
									   <?php if($p3['status']=='out'){?>
									   &nbsp;&nbsp;&nbsp;<a href="#" title="<?php echo $p3['bedno']; ?>"><i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i></a>&nbsp;&nbsp;&nbsp; 
									   <?php }else{?>
									  &nbsp;&nbsp;&nbsp;<a href="#" title="<?php echo $p3['bedno']; ?>"><i class="material-icons" style="color:green;">hotel</i> </a>&nbsp;&nbsp;&nbsp;
									   <?php }?>
									  
									  <?php 
									  
									  }
									  }
											  
									  }
									  
									  }?>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- end new patient list -->
                     <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>ToDay Booking List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9">
                                    <div class="row">
									
                                       
	

									   <ul class="to-do-list ui-sortable" id="sortable-todo">
									   <marquee  behavior="scroll" direction="down" scrolldelay="150">  <?php
					
 $a="SELECT * FROM `patientregister` where date='$d' ";
//$a="SELECT * FROM `patientregister` order by reg_id desc limit 0,10 ";
					$sq=mysqli_query($link,$a);
					$i=1;
					while($r=mysqli_fetch_array($sq)){
						
					?>
									  
                                            <li class="clearfix">
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="None" id="todo-check1">
                                                    <label for="todo-check1"></label>
                                                </div>
                                               <a href='patientregister1.php?reg=<?php echo $r['reg_id'];?>'> <p class="todo-title"><?php echo $r['registerno'];?> - <?php echo $r['patientname'];?></a>
                                                </p></a>
                                                <div class="todo-actionlist pull-right clearfix">
                                                    <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                            </li>
					<?php }?></marquee>
                                        </ul>
                                    </div>
                                   <!-- <div class="box-footer">
					                <form action="#" method="post">
					                  <div class="input-group">
					                    <input type="text" name="message" placeholder="Enter your ToDo List" class="form-control">
					                    <span class="input-group-btn">
					                    <button type="submit" class="btn btn-warning btn-flat">Add</button>
					                    </span> </div>
					                </form>
					               </div>-->
                                </div>
                            </div>
                        </div>
						<div class="col-md-6 col-sm-12">
                             <div class="card card-box">
                                 <div class="card-head">
                                     <header>Doctors List</header>
                                 </div>
                                 <div class="card-body ">
                                 <div class="row">
								   <ul class="docListWindow">
								 <?php $sqq=mysqli_query($link,"select * from doct_infor order by id desc limit 0,8");
								 while($r1=mysqli_fetch_array($sqq)){
									 $gender=$r1['gender'];
									 ?>
								 
                                      
                                            <li>
                                                <div class="prog-avatar">
												<?php if($gender=='Female'){?>
                                                    <img src="../img/doc/doc1.jpg" alt="" width="40" height="40">
												<?php } else {?>
												     <img src="../img/doc/doc2.jpg" alt="" width="40" height="40">
												
												<?php }?>
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Dr.<?php echo $r1['dname1'];?></a> -(<?php echo $r1['desc1'];?>)
                                                    </div>
                                                        <div>
                                                           
                                                        </div>
                                                </div>
								 </li>
                                            <?php }?>
                                        </ul>
                                        <div class="text-center full-width">
                                            <a href="doctor.php">View all</a>
                                        </div>
                                    </div>
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
        <!--<script src="http://radixtouch.in/templates/admin/redstar/source/assets/assets/jquery.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/popper/popper.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/jquery.blockui.min.js" ></script>
    
  
	<script src="http://radixtouch.in/templates/admin/redstar/source/assets/jquery.slimscroll.js"></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/counterup/jquery.waypoints.min.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/counterup/jquery.counterup.min.js" ></script>

	<script src="http://radixtouch.in/templates/admin/redstar/source/assets/app.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/layout.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/theme-color.js" ></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/material/material.min.js"></script>

    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/Chart.bundle.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/utils.js" ></script>
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/home-data.js" ></script>
    
    <script src="http://radixtouch.in/templates/admin/redstar/source/assets/chart-js/home-data3.js" ></script>
     <script src="http://radixtouch.in/templates/admin/redstar/source/assets/sparkline/jquery.sparkline.js" ></script>
      <script src="http://radixtouch.in/templates/admin/redstar/source/assets/sparkline/sparkline-data.js" ></script>-->
    
	   	   <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>