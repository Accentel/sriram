<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])
{
 ?>
<?php include("header.php");?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Sales List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Sales List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Sales List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">
                                                            
                               
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
					                                        <div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group">
					                                                <a href="addsalesentry1.php" target="new" id="addRow" class="btn btn-info">
					                                                    Add New <i class="fa fa-plus"></i>
					                                                </a>
					                                            </div>
					                                        </div>
					                                        <div class="col-md-6 col-sm-6 col-xs-6">
					                                            <div class="btn-group pull-right">
					                                                <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
					                                                    <i class="fa fa-angle-down"></i>
					                                                </a>
					                                                <ul class="dropdown-menu pull-right">
					                                                    <li>
					                                                        <a href="javascript:;">
					                                                            <i class="fa fa-print"></i> Print </a>
					                                                    </li>
					                                                    <li>
					                                                        <a href="javascript:;">
					                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
					                                                    </li>
					                                                    <li>
					                                                        <a href="javascript:;">
					                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
					                                                    </li>
					                                                </ul>
					                                            </div>
					                                        </div>
					                                    </div>
					                                    <div class="table-scrollable">
                                      					   <table class="table table-hover table-checkable order-column full-width" id="example4">
					                                        <thead>
					                                            <tr>
					                                            	<th>#</th>
					                                                <th> Name/Mr.No </th>
					                                                <th> Customer Type</th>
					                                                <th> Sale Date  </th>
					                                           
					                                                <th> Total Amount </th>
                                                                    
					                                                
					                                                <th> Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                            
                                                            <?php 
															$date=date('Y-m-d');
															$date1=date('Y-m-d', strtotime("-60 days"));
															//$date1=date('Y-m-d', strtotime($date
															
															if($ses=='admin')
															$a="select distinct a.lr_no,a.cust_name,a.inv_no,a.total,a.sal_date,
															a.customer_type,a.final_amnt
				 from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no and a.customer_type!='h' and status='' order by a.LR_NO desc";
															
															else 
																 $a="select distinct a.lr_no,a.cust_name,a.inv_no,a.total,a.sal_date,
															a.customer_type,a.final_amnt
				 from phr_salent_mast as a,phr_salent_dtl as b where a.lr_no=b.lr_no and a.customer_type!='h' and a.SAL_DATE between '$date1' and '$date' and status='' order by a.LR_NO desc";
																$sq=mysqli_query($link,$a);
															
															$i=1;
															$cnt=mysqli_num_rows($sq);
															while($r=mysqli_fetch_array($sq)){
																
																?>
															
                                                            
																<tr class="odd gradeX">
                                                             
																	<td class="patient-img">
																			<?php echo $i?>
																	</td>
                                                           
																	<td><?php echo $c=$r['cust_name'];
$cust_type=$r['customer_type']; 
																	?> -
<?php 
if($cust_type=='p1'){
 $a="select * from patientregister where registerno='$c'";

$ssq=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq);
echo $patientname=$r1['patientname']; 
} else if($cust_type=='p') {
	
	  $a="select * from ip_pat_admit  where PAT_NO='$c'";

$ssq=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq);
 $PAT_REGNO=$r1['PAT_REGNO']; 
 $a1="select * from patientregister where registerno='$PAT_REGNO'";

$ssq1=mysqli_query($link,$a1);
$r2=mysqli_fetch_array($ssq1);
echo $patientname=$r2['patientname']; 
}?>

																	</td>
																	<td class="left">
                                                                   
                            <?php    $cust_type=$r['customer_type'];  if($cust_type=='c'){ echo "Customer";
				} else if($cust_type=='p1'){ echo "Out Patient"; }else if($cust_type=='p'){ echo "In Patient"; }?>
                                                                </td>
																	<td class="left"><?php echo date('d-m-Y',strtotime($r[4])) ?></td>
																
																	<td><?php echo $r['final_amnt'] ?></td>
																	
															<?php if($ses!='admin'){ ?>
															<td>
																	
                                                                        <a href="medbill.php?lr_id=<?php echo $r['lr_no']?>" target="new"><img src="../img/print.png"></a>
                                                                        
																		 
																		
																	</td>
															<?php  }else{?>
																	<td>
																	<a href="salesentry_view.php?id=<?php echo $r['lr_no']?>" class="btn btn-primary btn-xs"> 
																			<i class="fa fa-pencil"></i></a>
																		
																	<!--	<a href="view_purchase_invoice.php?id=<?php echo $r['lr_no']?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a>-->
                                                                        <a href="medbill.php?lr_id=<?php echo $r['lr_no']?>" target="new"><img src="../img/print.png"></a>
                                                                   	
																				<a href="due_salesbill.php?id=<?php echo ($r['lr_no']); ?>"  >
																			<img src="../img/income.png" />
																		</a>     
																		<a onclick="return confirm('Are you sure you want to delete this item?');" href="delete_sale.php?id=<?php echo $r['lr_no']?>">
																	
																		<button class="btn btn-danger btn-xs">	
																			<i class="fa fa-trash-o "></i>
																		 </button></a>
																		 
																		 	<a href="medpbill.php?lr_id=<?php echo $r['lr_no']?>" target="new"><img src="../img/print.png"></a>
																		<!--<a onclick="return confirm('Are you sure you want to delete this item?');" href="../modal/delete_doct.php?id=<?php echo $r['id']?>">
																	
																		<button class="btn btn-danger btn-xs">	
																			<i class="fa fa-trash-o "></i>
																		</button></a>-->
																	</td>
															<?php }?>
																	
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
	 