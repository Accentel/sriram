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
    <title>Pharmacy Summary Report</title>
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


<form name="frm" method="post" action="">
																<table align="center"><tr><td width="">Search </td><td>
																
																 <input id=\"pname\" list=\"city1\" placeholder="Product Name " class="form-control"  name="pname"  >
<datalist id=\"city1\" >

<?php 
$sql="select * from phr_purinv_dtl where balance_qty > 0 order by PRODUCT_NAME";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[PRODUCT_NAME]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></td>



<td>
																
																	<input type="submit" name="submit" value="Search" class="btn btn-info"></td></tr></table>
																	</form>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Stock Report</td>
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
                             <td align="center"><b>Total Purchase Qty</b></td>
                             <td align="center"><b>Total Sale Qty</b></td>
                             <td align="center"><b>Ava Qty</b></td>
						
                    	</tr>
                        <?php
                        
                        if(isset($_POST['submit'])){
                            
                            $pname=$_POST['pname'];
                            
                            
                        }
                        if($pname!=''){
                            $uy="select * from phr_purinv_dtl where PRODUCT_NAME='$pname' ";
                        }else{
                           $uy= "select * from phr_purinv_dtl where balance_qty > 0 order by PRODUCT_NAME ";
                        }
                        
						$qry=mysqli_query($link,$uy) or die(mysqli_error($link));
						if($qry){
						$i=0;
						$t=0;
					 	 while($res=mysqli_fetch_array($qry)){
							 $BATCH_NO = $res['BATCH_NO'];
							 $PRODUCT_NAME = $res['PRODUCT_NAME'];
							 $qry1=mysqli_query($link,"select t_qty from stock where product_name='$PRODUCT_NAME' and batch_no='$BATCH_NO' ") or die(mysqli_error($link));
						if($qry1){
						    while($res1=mysqli_fetch_array($qry1))
						    $tqty=$res1['t_qty'];
						}
							 $MRP=$res['each_mrp_rate'];
							 $balance_qty=$res['balance_qty'];
							 $m=$MRP*$balance_qty;
							 $
							 $t=$t+$m;
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             
                              <td align="center"><?php echo $PRODUCT_NAME ?></td>
							  <td align="center"><?php echo $BATCH_NO ?></td>
							   <td align="center"><?php echo $tqty ?></td>
							    <td align="center"><?php echo $tqty-$balance_qty; ?></td>
                            <td align="center"><?php echo $balance_qty ?></td>
                           
                             
                            
                           
                          
                           
                        
						</tr>
                       <?php } ?>
                       
                       
                       
                       
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
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="dashboard.php"><input type="button" value="Close" id="cls" class="butbg" /></a></td>
</tr>
        </table>
    </body>
</html>
