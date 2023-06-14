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
$pdf->Cell(30,10,'Name',1);
$pdf->Cell(40,10,'Transaction Code',1);
$pdf->cell(30,10,'Amount',1);
$pdf->Cell(30,10,'Mobile',1);
$pdf->Cell(40,10,'Date',1);

$pdf->Ln();

$stmt = $mysqli->prepare("SELECT * FROM members");
$stmt->execute();
$result = $stmt->get_result();

$pdf->SetFont('Arial','',12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20,10,$row['kipawaid'],1);
    $pdf->Cell(30,10,$row['firstname'],1);
    $pdf->Cell(40,10,$row['trcode'],1);
    $pdf->Cell(30,10,$row['amount'],1);
    $pdf->Cell(30,10,$row['mobile'],1);
    $pdf->Cell(40,10,$row['paytime'],1);
    $pdf->Ln();
}

$pdf->Output();
?>
