<?php 
include('../db/connection.php');
date_default_timezone_set("Asia/Kolkata");
session_start();
if($_SESSION['user'])
{
    //echo "hi";
$ses=$_SESSION['user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php
		
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
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding-top:0px;
	 padding-bottom: 1.5cm;
	  padding-left: 1.5cm;
	   padding-right: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:42px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}

</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="dischargesummarylist.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
       // echo "hi";
 //ob_start();
 $bno = $_REQUEST['id'];
 $k="select * from  discharge where  id='$bno'";
$t = mysqli_query($link,$k) or die(mysqli_error($link));
$r=mysqli_fetch_array($t);
$id1=$r['id'];
$mrno=$r['mrno'];
$patno=$r['patno'];
$pname=$r['pname'];
$relation=$r['relation'];
$age=$r['age'];
$sex=$r['sex'];
$admit1=$r['doa'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$r['dod'];
$discharge=date('Y-m-d',strtotime($discharge1));
$dop=$r['dop'];
$doctor=$r['doctor'];
$surgery=date('Y-m-d',strtotime($surgery1));
$addr=$r['addr'];
$cfindings=$r['cfindings'];
$diagsnosis=$r['diagsnosis'];
$treatsummary=$r['treatsummary'];
$investigations=$r['investigations'];
$course=$r['course'];
$condischarge=$r['condischarge'];
$tdischarge=$r['tdischarge'];
$complaints=$r['complaints'];
$user=$r['user'];

			?>
<div><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </div>

        <table    border="0"  width="100%" style="font-size:12px;" cellspacing="10">
		
		
		 <tr>
<td style="width:40%" align="left"><strong>Name</strong>  : <?php echo $pname;  ?></td>
<td style="width:20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td style="width:40%" ><strong>MR.No</strong> : <?php echo $mrno;  ?> </td>
</tr>

 <tr>
<td><strong>Age/Gender</strong>  : <?php  echo $age."/". $sex."&nbsp;&nbsp;";?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><strong>D.O.A</strong> : <?php echo date('d-m-Y',strtotime($admit));  ?> </td>
</tr>


 <tr>
<td><strong>Address</strong>  : <?php  echo $addr;?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><strong>D.O.D</strong> : <?php echo date('d-m-Y',strtotime($discharge));  ?> </td>
</tr>

<tr>
<td><strong>Doctor</strong>  : <?php  echo $doctor;?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><strong>DOOP</strong> : <?php echo date('d-m-Y',strtotime($dop));  ?> </td>
</tr>
<tr>

</tr>
</table>
<hr/>
<h3 align="center" >Discharge Summary</h3>
 <table width="100%" align="left">
       
        <tr>
        <td><b>DIAGNOSIS</b></td>
         </tr>
       <tr>
        <td><?php echo $diagsnosis ?></td>
       </tr>
      <tr>
        <td><b>Complaints</b></td>
     
        </tr>
		 <tr>
      
        <td><?php echo $complaints; ?></td>
        </tr>
		
		
		<tr>
        <td><b>Clinical Findings</b></td>
     
        </tr>
		 <tr>
      
        <td><?php echo $cfindings; ?></td>
        </tr>
		
		
		<tr>
        <td><b>Investigations</b></td>
     
        </tr>
		 <tr>
      
        <td><?php echo $investigations; ?></td>
        </tr>
		
		<tr>
        <td><b>Course in Hospital</b></td>
     
        </tr>
		 <tr>
      
        <td><?php echo $course; ?></td>
        </tr>
		
		<tr>
        <td><b>Condition at Discharge</b></td>
     
        </tr>
		 <tr>
      
        <td><?php echo $condischarge; ?></td>
        </tr>
		
		<tr>
        <td><b>Treatment advice at Discharge</b></td>
     
        </tr>
		 <tr>
      
        <td><?php echo $tdischarge; ?></td>
        </tr>
       </table>
       <div style="height:30px;"></div>
       <div>Prepared By:<?Php echo $user; ?><br/>Printed Date & Time:<?php echo date('d-m-Y h:i:s a'); ?></div>
   <div align="right"><b>Doctor's Signature<br/><?php echo $doctor ;?></b></div>
      
        
        </div> 
        </div>   
       
    </div>
    
</div>
<?php
    
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',20,20,20,20,20,20);
$mpdf->writeHTML($body);
$mpdf->Output('demo123check.pdf','F');
	
		print "<script>";
	print "self.location='demo123check.pdf';";
	print "</script>";
	
 
?>

</body>
</html>
<?php 

}else
{
session_destroy();
session_unset();
header('Location:index.php');
}
?>