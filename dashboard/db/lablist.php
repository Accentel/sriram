<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$date=date('Y-m-d');
$date1=date('Y-m-d', strtotime("-60 days"));
if($ses=='admin')

$query = "SELECT * FROM bill where status='' order by id desc limit 150";
else 
$query = "SELECT * FROM bill where bdate between '$date1' and '$date' and status='' order by id desc limit 150";

$result = $crud->getData($query);

?>