<?php
include '../includes/header.php';
require_once __DIR__ . "../../connection/connect.php";
require_once __DIR__ . "../../fpdf185/fpdf.php";
ob_clean();

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Giving Records');

$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'ID',1);
$pdf->Cell(40,10,'Title',1);
$pdf->Cell(40,10,'Description',1);
$pdf->cell(30,10,'Venue',1);
$pdf->Cell(30,10,'Date',1);

$pdf->Ln();

$stmt = $mysqli->prepare("SELECT * FROM activity");
$stmt->execute();
$result = $stmt->get_result();

$pdf->SetFont('Arial','',12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20,10,$row['acvtivityid'],1);
    $pdf->Cell(40,10,$row['title'],1);
    $pdf->MultiCell(40,10,$row['description'],1);
    $pdf->Cell(30,10,$row['venue'],1);
    $pdf->Cell(30,10,$row['date'],1);
    $pdf->Ln();
}

$pdf->Output();
?>
