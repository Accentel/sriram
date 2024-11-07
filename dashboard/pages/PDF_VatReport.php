<?php
require 'vendor/autoload.php';
include("../db/connection.php");

$start_dt = $_REQUEST['s_date'];
$end_dt = $_REQUEST['e_date'];
$report = $_REQUEST['ptype'];

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo and organization details
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'SRI RAM KAMAL ', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, '', 0, 1, 'C');
        $this->Cell(0, 10, 'Phone:', 0, 1, 'C');
        $this->Ln(10);

        // Report title and date range
        global $report, $start_dt, $end_dt;
        if ($report == "PI") {
            $title = "GST Report For Purchase Invoice";
        } elseif ($report == "PR") {
            $title = "GST Report For Purchase Returns";
        } elseif ($report == "SE") {
            $title = "GST Report For Sales Entry";
        } elseif ($report == "SR") {
            $title = "GST Report For Sales Returns";
        }
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, $title, 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'From: ' . $start_dt . ' To: ' . $end_dt, 0, 1, 'C');
        $this->Ln(10);

        // Table header
        if ($report == "PI" || $report == "PR") {
            $this->Cell(40, 10, 'Product Name', 1, 0, 'C');
            $this->Cell(40, 10, 'Supplier Name', 1, 0, 'C');
            $this->Cell(20, 10, 'Qty', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (5%)', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (12%)', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (18%)', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (28%)', 1, 1, 'C');
        } elseif ($report == "SE" || $report == "SR") {
            $this->Cell(40, 10, 'Product Name', 1, 0, 'C');
            $this->Cell(40, 10, 'Customer Name', 1, 0, 'C');
            $this->Cell(20, 10, 'Qty', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (5%)', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (12%)', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (18%)', 1, 0, 'C');
            $this->Cell(20, 10, 'GST (28%)', 1, 1, 'C');
        }
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Instantiation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Data retrieval and processing based on $report and date range
// SQL queries and table row population

$pdf->Output();
?>



