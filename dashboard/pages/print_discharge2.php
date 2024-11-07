<?php 
include('../db/Crud.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	//	include("header.php");
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
    min-height: 40.7cm;
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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="finalbilllis1.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
            <table>
                <tr><td><img src="../img/raajtop.png" width="100%"/></td></tr>
            </table>
        <?php 
        ob_start();
$crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  final_bill_fin where  id='$bno'";
$t = $crud->getData($k);
foreach($t as $key=>$r){
$id1=$r['id'];
$mrno=$r['mrno'];
$patno=$r['patno'];
$pname=$r['pname'];
// $relation=$r['relation'];
$relation = isset($r['relation']) ? $r['relation'] : ''; // Set a default value if the key is not present
$age=$r['age'];
$sex=$r['sex'];
$admit1=$r['doa'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$r['dichargedate'];
$discharge=date('Y-m-d',strtotime($discharge1));
// $surgery1=$r['surgery'];
// $surgery=date('Y-m-d',strtotime($surgery1));
// $ward=$r['ward'];
$surgery1 = isset($r['surgery']) ? $r['surgery'] : null;
if ($surgery1 !== null) {
    $surgery = date('Y-m-d', strtotime($surgery1));
} else {
    $surgery = ''; // Or any default value you want to assign
}
$ward = isset($r['ward']) ? $r['ward'] : '';
$addr=$r['address'];
$doctor=$r['doctors'];

$bill=$r['bno'];
$bdate=$r['bdate'];
$mobile=$r['mobile'];
$tot_hosp_amnt=$r['tot_hosp_amnt'];
$hosp_paid_amnt=$r['hosp_paid_amnt'];
$hosp_bal_amnt=$r['hosp_bal_amnt'];
$tot_doct_amnt=$r['tot_doct_amnt'];
$tot_doct_paid=$r['tot_doct_paid'];
$tot_doct_bal=$r['tot_doct_bal'];
   $tot_lab_amnt=$r['tot_lab_amnt'];
   $lab_paid_amnt=$r['lab_paid_amnt'];
   $lab_bal_amnt=$r['lab_bal_amnt'];
  
 $tot_proc_amnt=$r['tot_proc_amnt'];
 $proc_paid_amnt=$r['proc_paid_amnt'];
 $proc_bal_amnt=$r['proc_bal_amnt'];
  $patientcategory= $r['patientcategory']; 
   
   $tot_pharma_amnt=$r['tot_pharma_amnt'];
   
   $pharma_paid=$r['pharma_paid'];
   $pharma_bal=$r['pharma_bal'];
   
      $total=$r['total'];
   $paid=$r['paid'];
   $due=$r['due'];
    $concession=$r['concession'];
   $namount=$r['namount'];  
   $npaid=$r['new_paid'];  
   $nbal=$r['new_bal'];  
   $btime=$r['btime'];
			}?>

<hr/>
        <table    border="0" width="100%"  cellspacing="10" style="font-size:16px;">
		       <!--<tr>
<td><strong>Bill No</strong>  : <?php echo $bill;  ?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><strong></strong>  </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><strong></strong>  <?php //echo $pname;  ?> </td>
</tr>-->
        <tr><td style="width:50%"><strong>Bill No</strong>  : <?php echo $bill;  ?>

<!--Pat No</strong> : <?php echo $patno;  ?>--> </td>
<td style="width:50%"><strong>Bill Date</strong>  : <?php echo $bdate." ".$btime;  ?></td>
</tr>
<tr><td style="width:50%"><strong>Umr No</strong>  : <?php echo $mrno;  ?>

<!--Pat No</strong> : <?php echo $patno;  ?>--> </td>
<td style="width:50%"><strong>IP No</strong>  : <?php echo $patno;  ?></td>
</tr>
<tr>
<td style="width:50%"><strong>Pt.Name</strong> : <?php echo $pname;  ?> </td>
<td><strong>Age/Gender </strong>: <?php  echo $age."/". $sex."&nbsp;&nbsp;";?></td>
</tr>
<tr>
<td><strong>Admit Date</strong>  : <?php echo $admit;  ?></td>
<td><strong>Discharge Date</strong>  : <?php echo $discharge;  ?></td>
</tr>
<tr>
<td><strong>Address</strong>  : <?php echo $addr;  ?></td>
<td><strong>Consult Dr. Name</strong>  : <?php echo $doctor;  ?></td>
</tr>
<tr>
<td><strong>Patient Category</strong>  : <?php echo $patientcategory;  ?></td>

</tr>
</table>
<hr/>
<h3 align="center">FINAL BILL DETAILS</h3>
 
                                                   <table  width="100%" cellpadding="5px"  border="0" width="100%" style="overflow: wrap" >
												   <tr>
												       <td><b>S No</b></td>
												   <td><b>Description</b></td>
												   <!-- <td><b>Remarks</b></td>-->
												   <td><b>Days</b></td>
												   <td><b>Charge</b></td>
												   <td><b>Amount</b></td>
												   </tr>
												   <?php 
												   
												   $crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  final_bill_genral where  id1='$bno' and days>=1";
$t = $crud->getData($k);
$i=1;
foreach($t as $key=>$y){
												   
												?>
												   <tr>
												   <td><?php echo $i;?></td>
												   <td>
												   <?php echo $y['desc1'];?>
												   
												  </td>
												 <!--  <td>
												   <?php echo $y['remarks'];?>
												   
												  </td>-->
												   <td> <?php echo $y['days'];?></td>
												   <td> <?php echo $y['charge'];?></td>
												   <td> <?php echo $y['amnt'];?></td>
												    
												   </tr>
												   <?php $i++; }?>
												   <tr><td colspan="6"><hr/></td></tr>
												   
												    <tr><td colspan="4" align="right"><b>Total Hospital Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $ths=$tot_hosp_amnt+$tot_doct_amnt ?></b></td> </tr>
													 <tr><td colspan="4" align="right"><b>Total Lab Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tot_lab_amnt ?></b></td> </tr>
													<tr><td colspan="4" align="right"><b>Total Procedure Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tot_proc_amnt ?></b></td> </tr>
													
										 <tr><td colspan="4" align="right"><b>Total Pharmacy Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tot_pharma_amnt ?></b></td> </tr>			
													<tr><td colspan="6"><hr/></td></tr>
													<tr><td colspan="4" align="right"><b>Total Amount(Including of service charges) </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $ths+$tot_lab_amnt+$tot_pharma_amnt+$tot_proc_amnt; ?></b></td> </tr>
													
													<tr><td colspan="4" align="right"><b>Advance Paid Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tpaid= $hosp_paid_amnt+$tot_doct_paid+$lab_paid_amnt+$pharma_paid+$proc_paid_amnt; ?></b></td> </tr>
													
                                                <tr><td colspan="6">

 <hr/></td></tr>
 <tr><td colspan="4" align="right"><b>Total Due Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tdue= $hosp_bal_amnt+$tot_doct_bal+$lab_bal_amnt+$pharma_bal+$proc_bal_amnt; ?></b></td> </tr>
													 
 <tr><td colspan="4" align="right"><b>Concession Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tcon= $concession; ?></b></td> </tr>
                                                <tr><td colspan="6">

 <hr/></td></tr>
 <tr><td colspan="4" align="right"><b>Net Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $namount; ?></b></td> </tr>
													<tr><td colspan="4" align="right"><b>Paid Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $npaid; ?></b></td> </tr>
													<tr><td colspan="4" align="right"><b>Bal Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $nbal; ?></b></td> </tr>
													                     <tr><td colspan="6">

 <hr/></td></tr>
                      <tr><td colspan="6">
                          
			    <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $npaid;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $rupee= $result . "Rupees  " ;
  date_default_timezone_set("Asia/Kolkata"); 
 ?> 

 <b>Amount in Words:<?php echo $rupee; ?></b></td></tr>
 <tr><td colspan="6"><hr/></td></tr>
												   </table>

		<div>Prepared By:<?php echo $r['user']; ?><br/>Printed Date:<?php echo date('d-m-Y h:i:s a'); ?></div>	
		<div style="text-align:right;">Authorised Signature</div>
	
        
       
		 
        
        
              
       
        
        </div> 
        </div>   
       
    </div>
    
</div>

</body>
</html>
<?php 
//include("footer.php");


}else
{
session_destroy();
session_unset();
header('Location:index.php');
}
?>