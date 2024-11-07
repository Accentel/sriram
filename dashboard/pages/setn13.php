<?php
include("../db/connection.php");
?>

<?php
date_default_timezone_set('Asia/Kolkata');
 $q=$_GET["q"];
 $q1=$_GET['q1'];
 $optype=$_GET['optype'];
  $a="select dname1,op_fee,ip_fee,ins_fee,op_fee1 from  doct_infor where dname1='$q'";
$sq=mysqli_query($link,$a);

while($row=mysqli_fetch_array($sq)){

 $rk=$row['dname1'];
  $op_fee=$row['op_fee'];
  $ip_fee=$row['ip_fee'];
  $ins_fee=$row['ins_fee'];
  $op_fee1=$row['op_fee1'];
}



$rest = substr("$rk", 0, 4); 
//echo substr('abcdef', 0, 4);  // abcd

 $date=date('Y-m-d');
   $sql="select * from patientregister where date='$date' and doctorname='$rk'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);
 $cnt=mysqli_num_rows($result)+1;


//while($row = mysql_fetch_array($result))
 // {
if($q1=='OP'){
   echo ":" ."$rest"."_".$cnt;
   
   $current_time = date('H:i a');
$sunrise = "9:01 am";
$sunset = "18:00 pm";
$date1 = DateTime::createFromFormat('H:i a', $current_time);
$date2 = DateTime::createFromFormat('H:i a', $sunrise);
$date3 = DateTime::createFromFormat('H:i a', $sunset);
/*if ($date1 > $date2 && $date1 < $date3)
{
    
   $op_fee2=$op_fee;
}
   else {
	   $op_fee2=$op_fee1;
   }
   */

if($optype=="General"){
    $op_fee2=$op_fee;
}else{
    $op_fee2=$op_fee1;
}






   echo ":" .$op_fee2;
    echo ":" .$op_fee2;
} else if($q1=='IP'){
	
	 echo ":" ."$rest"."_".$cnt;
   echo ":" .$ip_fee;
	 echo ":" .$ip_fee;
} else if($q1=='Insurance'){
	 echo ":" ."$rest"."_".$cnt;
   echo ":" .$ins_fee;
   echo ":" .$ins_fee;
}
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
 

?> 