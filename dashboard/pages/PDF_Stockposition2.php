<?php
include("../db/connection.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Stock Position Report</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 


 
?>
<?php

$res=mysqli_query($link,"select * from  pharmacydetaisl");
while($row = mysqli_fetch_array($res)){
 $HOSP_NAME=$row[1];
$phrno=$row[2];
$ADDR=$row[6];         
$PHONE1=$row[7];   
$PHONE2=$row[8];         
$dlno =$row[3];          
$tin =$row[4]; 
 }

?>
<h1 align="center"><?php echo $HOSP_NAME; ?></h1>
<p align="center"><?php echo $ADDR; ?></p>
<hr/>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Stock Position Report List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Product Name.</b></td>
                             <td align="center"><b>Batch No</b></td>
                             <td align="center"><b>Ava Qty</b></td>
							<td align="center"><b>MRP</b></td>
                            <td align="center"><b>Amount</b></td>
                    	</tr>
                        <?php
						$qry=mysqli_query($link,"select * from phr_purinv_dtl where balance_qty > 0 order by PRODUCT_NAME ASC") or die(mysqli_error($link));
						if($qry){
						$i=0;
						$t=0;
					 	 while($res=mysqli_fetch_array($qry)){
							 $BATCH_NO = $res['BATCH_NO'];
							 $PRODUCT_NAME = $res['PRODUCT_NAME'];
							 $MRP=$res['each_mrp_rate'];
							 $balance_qty=$res['balance_qty'];
							 $m=$MRP*$balance_qty;
							 $t=$t+$m;
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             
                              <td align="center"><?php echo $PRODUCT_NAME ?></td>
							  <td align="center"><?php echo $BATCH_NO ?></td>
                            <td align="center"><?php echo $balance_qty ?></td>
                            <td align="center"><?php echo $MRP ?></td>
                             <td align="center"><?php echo $MRP*$balance_qty ?></td>
                             
                            
                           
                          
                           
                        
						</tr>
                       <?php } ?>
                       <tr><td colspan="5" align="right">Total Amount</td><td align="center"><?php echo $t;  ?></td></tr>
                       
                       
                       
                    <?php    }?>
					   
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>
