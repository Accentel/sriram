	<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	session_start();
	$ses= $_SESSION['user'] ;
	if($_SESSION['user'])
	{
		$ses=$_SESSION['user'];
	?><?php
	error_reporting(E_ALL);
ini_set('display_errors', 1);
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
							error_reporting(E_ALL);
							ini_set('display_errors', 1);
	$d=date('Y-m-d');					
	$a="SELECT * FROM `patientregister` where date='$d'  and pcancel=''";
						$sq=mysqli_query($link,$a);
						$r=mysqli_fetch_array($sq);
						$cnt=mysqli_num_rows($sq);?>
						
						<!-- start widget -->
						
						<form name="form" method="post">
						<input type="hidden" name="sname" id="fdate" value="<?php echo date('Y-m-d');?>"> 
						<div class="row">
							<div class="col-md-4 col-xs-12 col-sm-6">
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
						
						
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="analysis-box m-b-0 bg-danger">
									<h3 class="text-white box-title">
									<input type="submit" class="btn btn-info" value="InPatients" onclick="report2();">
								
								<i class="fa fa-caret-up"></i> <?php echo $ip;?></h3>
									
								</span></h3>
									<div id="sparkline12"><canvas style="display: inline-block; width: 367px; height: 70px; vertical-align: top;"></canvas></div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="analysis-box m-b-0 bg-blue">
									<h3 class="text-white box-title">
									<input type="submit" class="btn btn-info" value="Lab Bill" onclick="report1();">
									
									<i class="fa fa-caret-up"></i> <?php echo $lbc;?></span></h3>
									<div id="sparkline6"><canvas style="display: inline-block; width: 367px; height: 40px; vertical-align: top;"></canvas></div>
								</div>
							</div>
							</form>
							<!--
							<div class="col-md-3 col-xs-12 col-sm-6">
								<div class="analysis-box m-b-0 bg-success">
								<a href='salesentry_list.php'>  <h3 class="text-white box-title">Lab Bill <span class="pull-right"><i class="fa fa-caret-up"></i> <?php echo $lbc?></span></h3>
									<div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
									</a>
								</div>
							</div>
							
							
							<div class="col-md-3 col-xs-12 col-sm-6">
								<div class="analysis-box m-b-0 bg-blue">
									<h4 class="text-white box-title">Lab Bill <span class="pull-right"><i class="fa fa-caret-up"></i><?php echo $lbc?></span></h4>
									<div id="sparkline16" class="text-center"><canvas style="display: inline-block; width: 215px; height: 70px; vertical-align: top;"></canvas></div>
									
								</div>
							</div>-->
							
						</div>
						
						<?php
						
							$q="select ename from login where name1='$ses' ";
						$y=mysqli_query($link,$q) or die(mysqli_error($link));
							$y1=mysqli_fetch_array($y);
						$ename=$y1['ename'];
						
						// $q1="select a.deptname from employee c,empdept a  where c.department=a.id  and c.empcode='$ename' ";
						// $y2=mysqli_query($link,$q1) or die(mysqli_error($link));
						// $y11=mysqli_fetch_array($y2);
						// $dpt=$y11['deptname'];
						?>	
	<?php
	$d=date('Y-m-d');	

	//inpatient

	if($ses=='admin'){
					$a="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'In Patient' and amnt_desc IN ('In Patient','Patient Register Existing') and date(date1)='$d'  ";
	}else{
		$a="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and  `amnt_type` = 'In Patient' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'  ";
	}
						$sq=mysqli_query($link,$a);
						$r=mysqli_fetch_array($sq);
						$ip_convert=$r['amt'];
						
						//ip return amount
						if($ses=='admin'){
						
						$auy="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'IP Return Amount' and amnt_desc='IP Return Amount' and date(date1)='$d'  ";
						}else{
						$auy="SELECT sum(amount) as amt FROM `daily_amount` where  recv_by='$ses' and  `amnt_type` = 'IP Return Amount' and amnt_desc='IP Return Amount' and date(date1)='$d'  ";
						}
						$squy=mysqli_query($link,$auy);
						$ruy=mysqli_fetch_array($squy);
						$ip_return=$ruy['amt'];
		//advance collection
		if($ses=='admin'){
					$aamt="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Advance Collection' and date(date1)='$d'  ";
		}else{
			$aamt="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` = 'Advance Collection' and date(date1)='$d'  ";
		}
						$sqamt=mysqli_query($link,$aamt);
						$ramt=mysqli_fetch_array($sqamt);
						$adv=$ramt['amt'];	
		
		
		//patient register
		
						if($ses=='admin'){
				$a="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
						}else{
							$a="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc IN ('Patient Register','Patient Register Existing') and date(date1)='$d'   ";
						}
					
					
						$sq=mysqli_query($link,$a);
						$r=mysqli_fetch_array($sq);
						$amnt=$r['amt'];
						
				//patient cancellation
					if($ses=='admin'){
				$a1="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Patient Register' and amnt_desc='Patient Register Canceled' and date(date1)='$d'   ";
					}else{
						$a1="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` = 'Patient Register' and amnt_desc='Patient Register Canceled' and date(date1)='$d'   ";
					}
					
						$sq1=mysqli_query($link,$a1);
						$r1=mysqli_fetch_array($sq1);
						$opcamnt=$r1['amt'];
				
				
				
			//patient cancel	
						if($ses=='admin'){
			$labamount="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` = 'Patient Register Canceled' and amnt_desc='Patient Register Canceled'  ";
						}else{
							$labamount="SELECT sum(amount) as amt FROM `daily_amount` where  recv_by='$ses' and `amnt_type` = 'Patient Register Canceled' and amnt_desc='Patient Register Canceled'  ";
						}
						$sqlabb=mysqli_query($link,$labamount);
						$rlab=mysqli_fetch_array($sqlabb);
						$lab_amount=$rlab['amt'];	
						
							
						//lab due bill or labbill
						if($ses=='admin'){
						$a2="SELECT sum(amount) as amt FROM `daily_amount` where amnt_type IN('Lab Due Bill','Lab Bill') and  date(date1)='$d'  ";
						}else{
							$a2="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and amnt_type IN('Lab Due Bill','Lab Bill') and  date(date1)='$d'  ";
						}
						$sq2=mysqli_query($link,$a2);
						
						$r2=mysqli_fetch_array($sq2);
						$lab_amnt=$r2['amt'];
						//lab cancel amount
						if($ses=='admin'){
						$lca2="SELECT sum(amount) as amt FROM `daily_amount` where amnt_type IN('Lab Canceled') and  date(date1)='$d'  ";
						}else{
						
							$lca2="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and  amnt_type IN('Lab Canceled') and  date(date1)='$d'  ";
						}
					
						$lsq2=mysqli_query($link,$lca2);
						
						$lr2=mysqli_fetch_array($lsq2);
						$lab_camnt=$lr2['amt'];
		//procedure bill				
		if($ses=='admin'){
						$dea="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d' ";
		}else{
		$dea="SELECT sum(amount) as amt FROM `daily_amount` where  recv_by='$ses' and `amnt_type` IN ('Procedure Lab Bill','Procedure Due Bill') and date(date1)='$d' ";
			
		}
						$desq=mysqli_query($link,$dea);
						
						$derd=mysqli_fetch_array($desq);
						$deamt=$derd['amt'];
			//procedure bill canceled
			if($ses=='admin'){
						$pdea="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Procedure Lab Canceled') and date(date1)='$d' ";
			}else{
			
				$pdea="SELECT sum(amount) as amt FROM `daily_amount`  where recv_by='$ses' and  `amnt_type` IN ('Procedure Lab Canceled') and date(date1)='$d' ";
			}
						$pdesq=mysqli_query($link,$pdea);
						
						$pderd=mysqli_fetch_array($pdesq);
						$pdeamt=$pderd['amt'];
						
						//pharmacy
						if($ses=='admin'){
						$pr="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
						}else{
							$pr="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses'  and `amnt_type` IN ('Pharmacy') and date(date1)='$d' ";
						}
						$pr1=mysqli_query($link,$pr);
						
						$pr2=mysqli_fetch_array($pr1);
						$phr=$pr2['amt'];
			
						
						
						
						
						//final bill
						if($ses=='admin'){
							$fab="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Final Bill') and date(date1)='$d'  ";
						}else{
							$fab="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` IN ('Final Bill') and date(date1)='$d'  ";
						}
						$sqb=mysqli_query($link,$fab);
						$rb=mysqli_fetch_array($sqb);
						$final2=$rb['amt'];
						
						
							//insurance final  bill
						if($ses=='admin'){
							$fabi="SELECT sum(amount) as amt FROM `daily_amount` where `amnt_type` IN ('Final Bill Insurance','Insurance Due Bill') and date(date1)='$d'  ";
						}else{
							$fabi="SELECT sum(amount) as amt FROM `daily_amount` where recv_by='$ses' and `amnt_type` IN ('Final Bill Insurance','Insurance Due Bill') and date(date1)='$d'  ";
						}
						$sqbi=mysqli_query($link,$fabi);
						$rbi=mysqli_fetch_array($sqbi);
						$final21=$rbi['amt'];
						
						
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
									<th>Rec Amount</th>
									<th>Cancel Amount</th>
									<th>Total</th>
									</tr>
									<tr>
									<td>1</td>
									<td>Patient Registration</td>
									<td><?php if($amnt>=1){ echo $amnt; } else { echo  "0"; }?></td>
									<td>
										<?php 
										if($opcamnt>=1){ echo $opcamnt; } else { echo  "0"; }?>
										
									</td>
									
									<td>
										
										<?php echo $pramount=$amnt-$opcamnt; ?>
										
									</td>
									
									</tr>	
									<tr>
									<td>2</td>
									<td>In Patient Registration</td>
									<td>
									<?php if($ip_convert>=1){ echo $ip_convert; } else { echo  "0"; }?>
									</td>
									<td><?php if($ip_return>=1){ echo $ip_return; } else { echo  "0"; }?></td>
									<td> <?php echo $ip_convert-$ip_return;?></td>
									</tr>	

										<tr>
									<td>3</td>
									<td>Advance Amount</td>
									<td><?php if($adv>=1) { echo $adv; } else { echo  "0"; }?></td>
									<td>0</td>
									<td><?php echo $adv; ?></td>
									</tr>	
										<tr>
									<td>4</td>
									<td>Lab Amount</td>
									<td><?php if($lab_amnt>=1){  echo $lab_amnt; } else { echo  "0"; }?></td>
									<td><?php if($lab_camnt>=1){  echo $lab_camnt; } else { echo  "0"; }?></td>
									<td><?php echo $lab_amnt-$lab_camnt;?></td>
									</tr>		
	<tr>
									<td>5</td>
									<td>Procedure Amount</td>
									<td><?php if($deamt>=1){ echo $deamt; } else { echo  "0"; }?></td>
									<td><?php if($pdeamt>=1){ echo $pdeamt; } else { echo  "0"; }?></td>
									<td><?php echo $deamt-$pdeamt ?></td>
									</tr>	



	<tr>
									<td>6</td>
									<td>Final Bill Amount</td>
									<td><?php if($final2>=1) { echo $final2; } else { echo  "0"; }?></td>
									<td>0</td>
									<td><?php if($final2>=1) { echo $final2; } else { echo  "0"; }?></td>
									</tr>
									
								<tr>
									<td>7</td>
									<td>Insurance Final Bill Amount</td>
									<td><?php if($final21>=1) { echo $final21; } else { echo  "0"; }?></td>
									<td>0</td>
									<td><?php if($final21>=1) { echo $final21; } else { echo  "0"; }?></td>
									</tr>	  
									
									
									
									
	<tr>
									<td>8</td>
									<td>Pharmacy Amount</td>
									<td><?php if($phr>=1) { echo $phr; } else { echo  "0"; }?></td>
									<td>0</td>
									<td><?php if($phr>=1) { echo $phr; } else { echo  "0"; }?></td>
									</tr>
									
									

	<tr>
									<td>9</td>
									<td>Today Total Amount</td>
									<td><?php $tam= $amnt+$adv+$lab_amnt+$deamt+$final2+$final21+$ip_convert+$phr;
											if($tam>=1) { echo $tam;} else { echo  "0"; }

											?>
											</td>
											
											<td><?php echo $tcamt= $opcamnt+$lab_camnt+$pdeamt+$ip_return ?></td>
											<td><?php echo $tam-$tcamt; ?></td>
									</tr>									  
									</table>
									
									</div>
								</div>
							</div>
							
						</div>
						
						
						
						
						
						<!-- start new patient list -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div> <h3 style="color:orange;">Today Discharge Patients Count(<?php
								$td=date('Y-m-d');
								$ku=mysqli_query($link,"select * from ip_pat_admit where DIS_STATUS='DISCHARGED' and  Discharge_date='$td'") or die(mysqli_error($link));
								echo mysqli_num_rows($ku);
								
								?>)</h3></div>
								</div>
								</div>
						<!-- table format start  -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card card-box">
									<div class="card-head">
										<header>Beds Status <i class="material-icons" style="color:green;width:32px;height:32px;">hotel</i>Available Beds &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i>Reserved Beds</header>
										<div class="tools">
											<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
											<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
											<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
										</div>
									</div>
									<div class="card-body" id="bar-parent">
								<h3 style="color:blue">Total Reserved Beds Count  (<?php 
								$kk=mysqli_query($link,"select * from ip_pat_admit where DIS_STATUS='ADMITTED'") or die(mysqli_error($link));
								echo $kk1=mysqli_num_rows($kk)
								
								
								?>)</h3>					
									<?php 
									error_reporting(E_ALL);
									ini_set('display_errors', 1);
	include('../db/locations.php');

										foreach($result as $key=>$p){ $lid=$p['id'];?>
										<div><b><?php echo $p['lname']; ?></b></div>
										<?php 
										$r="select * from roomtype where ltype='$lid'";
										$result1 = $crud->getData($r);
										foreach($result1 as $key=>$p1){ 
										$rid=$p1['id'];?>
										<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $p1['rtype']; ?></b></div>
										<?php 
										$r2="select * from rooms where ltype='$lid' and rtype='$rid'";
										$result2 = $crud->getData($r2);?>
									<b style="color:blue">	Reserved Beds (<?php $mm=mysqli_query($link,"select * from ip_pat_admit where DIS_STATUS='ADMITTED' and room_loc='$lid' and room_type='$rid' ") or die(mysqli_error($link));
										echo mysqli_num_rows($mm);
										?>)</b>
										<?php foreach($result2 as $key=>$p2){ $romid=$p2['id'];?>
										<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $p2['roomno']; ?></div>
										
										<?php 
										$r3="select * from beds where ltype='$lid' and rtype='$rid' and roomno='$romid'";
										$result3 = $crud->getData($r3);
										foreach($result3 as $key=>$p3){ $bid=$p3['id'];?>
										<?php if($p3['status']=='out'){
										$bid=$p3['id'];
										$uu=mysqli_query($link,"select PAT_REGNO from ip_pat_admit where BED_NO='$bid' and DIS_STATUS='ADMITTED' ");
										$uty=mysqli_fetch_array($uu);
										$PAT_REGNO=$uty['PAT_REGNO'];
										$tyu="select * from patientregister where  registerno='$PAT_REGNO'";
										$TTT=mysqli_query($link,$tyu);
										$tt1=mysqli_fetch_array($TTT);
										$pname=$tt1['patientname'];
										
										
										
										?>
										&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip" title="<?php echo $p3['bedno']."&mrno=".$PAT_REGNO."&pname=".$pname; ?>"><i class="material-icons" style="color:red;width:32px;height:32px;">hotel</i></a>&nbsp;&nbsp;&nbsp; 
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
										error_reporting(E_ALL);
										ini_set('display_errors', 1);
						
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
		
			</div>
			
		<?php include("footer.php");?>
	
		
			<?php 

	}else

	{

	session_destroy();

	session_unset();

	header('Location:../../index.php');

	}

	?>