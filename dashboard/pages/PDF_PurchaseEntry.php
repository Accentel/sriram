<?php
require 'vendor/autoload.php';
include("../db/connection.php");

$start_dt = $_REQUEST['s_date'];
$end_dt = $_REQUEST['e_date'];

// Create a new instance of FPDF
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);

// Load data from the database
$sql = mysqli_query($link, "select * from pharmacydetaisl");
if ($sql) {
    $res = mysqli_fetch_array($sql);
    $orgname = $res['pharmacyname'];
    $addr = $res['address'];
    $phone = $res['phoneno'];
    $mob = $res['mobileno'];
}

$text = "Purchase Entry Report";

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, $orgname, 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 6, $addr, 0, 1, 'C');
$pdf->Cell(190, 6, 'Phone: ' . $phone, 0, 1, 'C');

$pdf->SetFont('Arial', '', 14);
$pdf->Cell(190, 10, '', 0, 1, 'C', FALSE);
$pdf->Cell(190, 6, $text, 0, 1, 'C', FALSE);
$pdf->Cell(190, 10, '', 0, 1, 'C', FALSE);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(46, 6, 'From Date : ', 0, 0, 'L', FALSE);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(46, 6, $start_dt, 0, 0, 'L', FALSE);
$pdf->Cell(26, 6, '', 0, 0, 'R', FALSE);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(46, 6, 'End Date : ', 0, 0, 'L', FALSE);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(26, 6, $end_dt, 0, 1, 'L', FALSE);
$pdf->Cell(156, 6, '', 0, 1, 'C', FALSE);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(15, 10, "ID", 1, 0, 'C');
$pdf->Cell(55, 10, "Pro. Name", 1, 0, 'C');
$pdf->Cell(40, 10, "Supp. Name", 1, 0, 'C');
$pdf->Cell(20, 10, "Exp. Dt", 1, 0, 'C');
$pdf->Cell(20, 10, "SQty", 1, 0, 'C');
$pdf->Cell(15, 10, "GST", 1, 0, 'C');
$pdf->Cell(25, 10, "Value", 1, 1, 'C');

$sdate = date('Y-m-d', strtotime($start_dt));
$edate = date('Y-m-d', strtotime($end_dt));
$x = "SELECT a.product_code, a.product_name, c.suppl_name, a.exp_date, a.s_qty, a.vat, a.value 
      FROM phr_purinv_dtl AS a, phr_purinv_mast AS b, phr_supplier_mast AS c 
      WHERE a.lr_no = b.lr_no AND b.suppl_code = c.suppl_code 
      AND a.currentdate BETWEEN '$sdate' AND '$edate' ";
$qry1 = mysqli_query($link, $x);

$pdf->SetFont('Arial', '', 12);
$count = 1;

while ($row = mysqli_fetch_array($qry1)) {
    $pdf->Cell(15, 10, $count, 1, 0, 'C');
    $pdf->Cell(55, 10, $row[1], 1, 0, 'L');
    $pdf->Cell(40, 10, $row[2], 1, 0, 'L');
    $pdf->Cell(20, 10, $row[3], 1, 0, 'C');
    $pdf->Cell(20, 10, $row[4], 1, 0, 'C');
    $pdf->Cell(15, 10, $row[5], 1, 0, 'C');
    $pdf->Cell(25, 10, $row[6], 1, 1, 'C');
    
    $tot2 = $row[6];
    $tot3 = ($tot3 + $tot2);
    $count++;
}

$tot1 = $tot3;

$pdf->Cell(190, 10, 'Total Price : ' . $tot1 . '0.0', 0, 1, 'C', FALSE);

if ($count == 0) {
    $pdf->SetFont('Arial', '', 14);
    $pdf->Cell(156, 10, '', 20, 1, 'L', FALSE);
    $pdf->Cell(46, 10, 'No Records', 0, 0, 'C', FALSE);
}

$pdf->Output();
?>
