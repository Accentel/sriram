<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
<script>
function card_pop(str){
	
	window.open('view_in_patient_admit.php?id='+str+'','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes');
	
	
	}

</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Discharged Patient  List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Discharged Patient</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Discharged Patient List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">
                                                            <!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
                               
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
					                        <div class="col-md-12">
					                            <div class="card card-topline-red">
					                                <div class="card-head">
					                                    <header></header>
					                                    <div class="tools">
					                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
						                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
						                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
					                                    </div>
					                                </div>
					                                <div class="card-body ">
					                                    <div class="row">
					                                        <div class="col-md-3 col-sm-3 col-xs-3">
					                                            <div class="btn-group">
					                                                
					                                            </div>
					                                        </div>
															
															<div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group">
					                                               
																	<form name="frm" method="post" action="">
																<table align="center"><tr><td width="">Search By Mr No</td><td>
																
																 <input id=\"pname\" list=\"city1\" placeholder="MRNO" class="form-control" required name="mr_num"  >
<datalist id=\"city1\" >

<?php 
$sql="select distinct PAT_REGNO from ip_pat_admit where DIS_STATUS='DISCHARGED' ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[PAT_REGNO]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></td><td>
																
																	<input type="submit" name="submit" value="Search" class="btn btn-info"></td></tr></table>
																	</form>
					                                            </div>
																
					                                        </div>
															
					                                        
					                                        </div>
					                                    </div>
					                                    <div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>#</th>
					                                               <TH>UMR No.</TH><TH>PATIENT NO.</TH><TH>PATIENT NAME</TH><TH>AGE/SEX</TH><TH>BED NO.</TH><TH>ADMISSION DATE</TH>
																   <TH>ACTION</TH></tr>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php 
														
															
															if(isset($_POST['submit'])){
																if($ses=='admin'){
																$mr_num=$_POST['mr_num'];
																 $a="SELECT a.PAT_ID,a.PAT_NO,b.date,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a ,patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno 
															and d.id=a.DOC_CODE and a.PAT_REGNO='$mr_num' and DIS_STATUS='DISCHARGED' order by a.PAT_ID  desc";
																}else {
																 $a="SELECT a.PAT_ID,a.PAT_NO,b.date,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a ,patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno 
															and d.id=a.DOC_CODE and a.PAT_REGNO='$mr_num' and a.ADMIT_DATE between '$date1' and '$date' and DIS_STATUS='DISCHARGED'   order by a.PAT_ID  desc";
															}
																
																
																$sq=mysqli_query($link,$a);
															}else {
																if($ses=='admin'){
														//	$sq=mysqli_query($link,"SELECT a.PAT_ID,a.PAT_NO,b.date,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a ,patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno 
														//	and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged')   order by a.PAT_ID  desc");
														
														$sq=mysqli_query($link,"SELECT a.PAT_ID,a.PAT_NO,b.date,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a ,patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno 
														and d.id=a.DOC_CODE and DIS_STATUS='DISCHARGED'  order by a.PAT_ID  desc");
																} else {
															$sq=mysqli_query($link,"SELECT a.PAT_ID,a.PAT_NO,b.date,b.patientname,b.age,b.gender,a.ADMIT_DATE,d.dname1,a.BED_NO,a.pat_regno FROM ip_pat_admit as a ,patientregister as b,doct_infor as d where a.PAT_REGNO=b.registerno 
															and  a.ADMIT_DATE between '$date1' and '$date' and d.id=a.DOC_CODE and upper(a.dis_status) not like upper('discharged')   order by a.PAT_ID  desc");
																}
															
															}$i=1;
															$cnt=mysqli_num_rows($sq);
															while($res=mysqli_fetch_array($sq)){
															 $a = $res['PAT_NO'];
			  $h=$res['patientname'];
			  $adate = $res['ADMIT_DATE'];
			  $b=date("d-m-Y", strtotime($adate));
			  //$c=$res['doc_name'];
			  $d = $res['BED_NO'];
			  $e = $res['pat_regno'];
			   $age = $res['age'];
			    $gender = $res['gender'];
				$PAT_ID=$res['PAT_ID'];
				$pat_regno=$res['pat_regno'];	
				  $sa2="SELECT * FROM `beds` where id='$d'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
 $bed=$r2['bedno'];
																?>
															
                                                           
																<tr class="odd gradeX">
                                                             <td style="text-align:center;"><?php echo $i;?></td>
																	<td><?php echo $e;?></td>
             <td><?php echo $a;?></td><td><?php echo $h;?></td><td><?php echo $age."/".$gender;?></td>
             <td><?php echo $bed;?></td><td><?php echo $b;?></td>
															
															
															
																		
																
																	<td>
																	
																		<a onclick="javascript:card_pop('<?php echo $a?>')">
																		<img src="../img/print.png"></a>
																	<?php if($ses=='admin'){ ?>	
																
															<?php }?>
																
																	</td>
																	
																
																</tr><?php $i++;}?>
																
															</tbody>
					                                    </table>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
                                    </div>
                                    
            <!-- end page content -->
            <!-- start chat sidebar -->
            
                        <!-- End Doctor Chat --> 
 						<!-- Start Setting Panel --> 
 						
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
	 