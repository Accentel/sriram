<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<?php
		//include("header.php");
	?>
<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>


	</head>

	<body>

	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td colspan="2" style="border-bottom:1px solid #999999;padding-left: 20px;">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
		   <?php
				include("../db/connection.php");
				
				$sql = mysqli_query($link,"select * from organization");
				if($sql)
				{
					$row = mysqli_fetch_array($sql);
					
					$orgname = $row['orgname'];
					$orgaddr = $row['address'];
					$orgphone = $row['phone'];
					$orgmobile = $row['mobile'];
					
				}
		   ?>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFFFFF">
                   <?php /*?> <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php echo $orgaddr ?>,</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6">Ph : <?php echo $orgphone ?>,<?php echo $orgmobile ?></td>
                    </tr><?php */?>
                    
                    <!--<tr><tr><td colspan="6"  align="center"><img src="images/majestic_reghead.png"  ></td></tr>-->
					
					<div align="center"> 
                    <img src="../img/raajtop.png" height="100" width="100%" />
                     <!--<img src="images/logo print.png"  width="50%" height="" />--></div>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
        </table>
            </td>
        </tr>
	<?php
			//include("config.php");

			$pno = $_REQUEST['id'];
			
			$sql= mysqli_query($link,"select b.PAT_REGNO,b.PAT_NO,b.ADMIT_DATE,a.patientname,b.BED_NO,a.age,a.gender,a.ageext,a.address,b.AMOUNT,b.CONS_AMT,b.doc_code,
			b.Allot_BY,d.dname1,b.CONCESSION_TYPE ,b.CONCESSION_CARDNO,b.Auth_BY,b.mr_cost,a.pay_type,b.bill_num,b.package,b.adv_amnt,b.pkg_amount,b.tot,
			b.room_loc,b.room_type,b.room_no,b.room_rent
			from patientregister as a,
			ip_pat_admit as b,doct_infor as d where a.registerno=b.pat_regno and b.doc_code=d.id and b.pat_no='$pno'");
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$adate = date('d-m-Y',strtotime($row['ADMIT_DATE']));
				$patname = $row['patientname'];
				$bedno = $row['BED_NO'];
				$age = $row['age']." ".$row['ageext'];
				$gender = $row['gender'];
				$addr = $row['address'];
				$amt =$row['AMOUNT'];
				$consamt = $row['CONS_AMT'];
				$allotby = $row['Allot_BY'];
				$docname = $row['dname1'];
				$contype = $row['CONCESSION_TYPE'];
				$cardno = $row['CONCESSION_CARDNO'];
				$bill_num = $row['bill_num'];
				$authby = $row['Auth_BY'];
				$mrcost = $row['mr_cost'];
			   $package = $row['package'];
				$ptype = $row['pay_type'];
				$mrcost = $row['mr_cost'];
				$adv_amnt=$row['adv_amnt'];
				$pkg_amount=$row['pkg_amount'];
				$tot=$row['tot'];
				$room_loc=$row['room_loc'];
				$room_type=$row['room_type'];
				$room_no=$row['room_no'];
				$room_rent=$row['room_rent'];
				$doc_code=$row['doc_code']; 
				$mrno=$row['PAT_REGNO']; 
				$ptno=$row['PAT_NO']; 
				
				//$sql1 = mysql_query("select CONCE_NAME from concession_type where CONCE_CODE='$contype'");
				//if($sql1)
				//{
					//$row1=mysql_fetch_array($sql1);
					//$conname = $row1['CONCE_NAME'];
				//}
			}		
				
		?>
        
        
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
         
         <tr>
         
            <td width="20%"><div align="left"><b>Mr No : </b> </div></td>
			<td ><?php echo $mrno ?></td>
            <td width="20%"><div align="left"><b>PT No : </b></div></td>
			<td ><?php echo $ptno ?></td>
            </tr>
          <tr>
         
            <td width="20%"><div align="left"><b>Patient Name : </b> </div></td>
			<td ><?php echo $patname ?></td>
            <td width="20%"><div align="left"><b>Admit Date : </b></div></td>
			<td ><?php echo $adate ?></td>
            </tr>
          <tr>
           
            <td ><div align="left"><b>Age/ :</b> </div></td>
			<td><?php echo $age ?> </td>
           <td  ><div align="left"><b>Gender : </b></div></td>
          <td><?php echo $gender ?></td>
            </tr>
			
			
			 <tr>
           
            <td ><div align="left"><b>Room Location :</b> </div></td>
			<td><?php
 $sahhh="SELECT * FROM `locations` where id='$room_loc'";
$ssq=mysqli_query($link,$sahhh);
$r=mysqli_fetch_array($ssq);
 echo $lname=$r['lname'];
 
  $sa="SELECT * FROM `roomtype` where id='$room_type'";
$ssq1=mysqli_query($link,$sa);
$r1=mysqli_fetch_array($ssq1);
 $rtype=$r1['rtype'];
 $sa2="SELECT * FROM `rooms` where id='$room_no'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
 $roomno=$r2['roomno']; 
 
  $sa2="SELECT * FROM `beds` where id='$bedno'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
 $bed=$r2['bedno'];

 ?> </td>
           <td  ><div align="left"><b>Room Type : </b></div></td>
          <td><?php echo $rtype ?></td>
            </tr>
			<tr><td  ><div align="left"><b>Room No : </b></div></td>
          <td><?php echo $roomno ?></td>
			
			<td  ><div align="left"><b>Bed No: </b></div></td>
          <td><?php echo $bed ?></td>
            </tr>
			
			
		 
           
           <?php if($package!='Yes'){?>
			  <tr>
           
            <td><div align="left"><b>Doctor  Name : </b></div></td>
			<td>
			
			<?php  
$sq11=mysqli_query($link,"select * from doct_infor where id='$doc_code'");
$r1=mysqli_fetch_array($sq11);
echo $dname=$r1['dname1'];?></td>
           <?php /*?><td><div align="left"><b>Admit Fee : </b></div></td>
		   <td><?php echo $amt; ?></td><?php */?>
            
          </tr>
          
          <tr>
         
			 <td valign="middle" ><div align="left"><b>  </b></div></td>
			 <td></td>
             
             
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            <tr>
         
			 <td valign="middle" ></td>
			 <td></td>
             
            <!--  <td  ><div align="left"><b>Balance Amount : </b></div></td>
			<td><?php echo (($bal=$tot)-$consamt-$adv_amnt); ?>.00</td>-->
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            <?php } else {?>
             <tr>
           
            <td><div align="left"><b>Doctor  Name : </b></div></td>
			<td><?php echo $docname ?></td>
           <?php /*?><td><div align="left"><b>Admit Fee : </b></div></td>
		   <td><?php echo $amt; ?></td><?php */?>
            <td  ><div align="left"><b>Package Amount : </b></div></td>
			<td><?php echo ($pkg_amount); ?>.00</td>
          </tr>
          
          <tr>
         
			 <td valign="middle" ><div align="left"><b>  </b></div></td>
			 <td></td>
             
              <td  ><div align="left"><b>Paid Amount : </b></div></td>
			<td><?php echo $adv_amnt; ?></td>
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            <tr>
         
			 <td valign="middle" ><div align="left"><b>Alloted By : </b></div></td>
			 <td><?php echo $allotby ?></td>
             
              <!--<td  ><div align="left"><b>Balance Amount : </b></div></td>
			<td><?php echo ($bal=$pkg_amount-$adv_amnt); ?>.00</td>-->
             
            <?php /*?>  <td><div align="left"><b>M.R.Fee : </b> </div></td><td><?php echo $mrcost; ?></td><?php */?>
            </tr>
            
            
            
            <?php }?>
            
            
		<?php /*?>	
          <tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td><div align="left"><b>Conce.Fee : </b> </div></td>
			<td><?php echo $consamt; ?></td>
            </tr>
          <tr>
            <td class="label1" >&nbsp;</td>
			<td class="label1" ><u><span style="color:#FF9999"></span></u></td>
            <td  ><div align="left"><b>Total Fee : </b></div></td>
			<td><?php echo (($amt+$mrcost)-$consamt); ?>.00</td>
            </tr><?php */?>
			<tr height="20"></tr>
            
            
        </table></td>
      </tr>
      <tr><td align="center" style=" border-top: #000000 1px solid"></td></tr>
    </table>
	</tr>
	</td>
  </tr>
      <tr>
          <td  colspan="3" align="right"><b>SIGNATURE &nbsp;&nbsp;</b></td>
      </tr>
  <tr><td >&nbsp;</td></tr>
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
      </tr>
        </table>
		  

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>