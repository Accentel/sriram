<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
include('../db/insert_labtest1.php');
include("header.php");?>
<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Lab Test  </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Lab Test  Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Add Lab Test </header>
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
                                        <div class="form-body">
										
										<div class="form-group row">
                                                <label class="control-label col-md-3">Department 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                   <select name="dept" id="dept" class="form-control ">
												   <option value="">Select Department</option>
												    <?php foreach($result as $key=>$res){?>
															<option value="<?php echo $res['id'] ?>"><?php echo $res['deptname']; ?></option>
															
														<?php }	?>
												   </select>
                                            </div>
                                            </div>
																			
										<div class="form-group row">
                                                <label class="control-label col-md-3">Test Name 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="tname" data-required="1" id="tname" placeholder="Enter Test Name" class="form-control " value="<?php if(isset($tname)){echo $tname;} ?>" required/>
													<input name="user" id="user" type="hidden"  class="form-control input-height" value="<?php echo $ses; ?>" /> 
													<span class="required"><?php if(isset($errortname)){echo $errortname;} ?></span>
                                            </div>
                                            </div>
																			
                                        <div class="form-group row">
                                                <label class="control-label col-md-3">OP Amount 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="amount" data-required="1" id="amount" placeholder="Enter Test Amount" class="form-control " value="<?php if(isset($amount)){echo $amount;} ?>" required/>
												<span class="required"><?php if(isset($erroramount)){echo $erroramount;} ?></span>
                                            </div>
                                            </div>
                                           <div class="form-group row">
                                                <label class="control-label col-md-3">IP Amount 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="iamount"  id="iamount" placeholder="Enter Test Insurance Amount" class="form-control " value="<?php if(isset($iamount)){echo $iamount;} ?>" required/>
													<span class="required"><?php if(isset($erroriamount)){echo $erroriamount;} ?></span>
                                            </div>
                                            </div>
										   
										   <div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>										
									<div class="form-group">
                                                <div class="control-label col-md-12" >
                                                   <table class="table" id="table">
												   <tr>
												   <th>Id</th>
												   <th>Heading</th>
												   <th>Title</th>
												    <th>Units</th>
												   <th>Normal Values</th>
												  
												   </tr>
												   <tbody>
												   
												   
												   </tbody>
												   </table>
                                                </div>
                                                												 
                                            </div>
									
										   
											<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                                    <a href="labtestdetails.php"><button type="button" class="btn btn-default">Cancel</button></a>
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
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
//calculateTotal2();
});
var i=1;
$(".addmore").on('click',function(){
	
	
	
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	 data +="<td><select name='heading[]' ><option value=''>Select</option><option value='c'>Heading</option></select></td>";
    data +="<td><input type='text'  name='title[]'   class='form-control' id='title"+i+"'></td>";
    data +="<td><input type='text' name='units[]' id='units' class='form-control'  /></td>";
	data +="<td><textarea name='description[]' id='description' class='form-control'  ></textarea></td>";
	data +="</tr>";
												   
	$('#table ').append(data).find('#table>tbody>tr:nth-child(2)');
	
	i++;
});
</script>
	   <script>
                CKEDITOR.replace( 'description', {
                height: 160
                } );
            </script>
	   <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>