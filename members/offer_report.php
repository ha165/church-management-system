<?php
session_start();
require_once __DIR__ . "../../connection/connect.php";
require_once __DIR__ . "../../fpdf185/fpdf.php";
ob_clean();

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Offering Records');

$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'ID',1);
$pdf->Cell(30,10,'Name',1);
$pdf->Cell(40,10,'Transaction Code',1);
$pdf->cell(30,10,'Amount',1);
$pdf->Cell(30,10,'Mobile',1);
$pdf->Cell(40,10,'Date',1);

$pdf->Ln();

$stmt = $mysqli->prepare("SELECT * FROM offering INNER JOIN members ON offering.mobile = members.phonenumber WHERE mobile=?");
$stmt->bind_param("s", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

$pdf->SetFont('Arial','',12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20,10,$row['offerid'],1);
    $pdf->Cell(30,10,$row['firstname'],1);
    $pdf->Cell(40,10,$row['trcode'],1);
    $pdf->Cell(30,10,$row['amount'],1);
    $pdf->Cell(30,10,$row['mobile'],1);
    $pdf->Cell(40,10,$row['paytime'],1);
    $pdf->Ln();
}

$pdf->Output();
?>
