<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('pdf/fpdf.php');
session_start();

require_once 'config.php';
$db = config::getConnexion();

// Retrieve prod m base b ID
$selected_ids = array_keys($_SESSION['cart']);
$sql = "SELECT ProductID, title, price, quantity FROM mycart WHERE ProductID IN (".implode(',', $selected_ids).")";

$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calcul tot pr
$total_price = 0;
foreach ($products as $product) {
    $total_price += $product['price'] * $_SESSION['cart'][$product['ProductID']];
}

//  new PDF objec
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','B',16);

// Add jaw

$pdf->Cell(0, 10, 'Made by ZeroWaste', 0, 1);
$pdf->Cell(0, 10, 'Invoice form checkout', 0, 1);

$pdf->Cell(60,10,'Product ID',1,0,'C');
$pdf->Cell(60,10,'Title',1,0,'C');
$pdf->Cell(30,10,'Price',1,0,'C');
$pdf->Cell(30,10,'Quantity',1,0,'C');
$pdf->Cell(100,10,'Total Price',1,1,'C');



foreach ($products as $product) {
    $pdf->Cell(60,10,$product['ProductID'],1,0,'C');
    $pdf->Cell(60,10,$product['title'],1,0,'C');
    $pdf->Cell(30,10,number_format($product['price'], 2),1,0,'C');
    $pdf->Cell(30,10,$_SESSION['cart'][$product['ProductID']],1,0,'C');
    $pdf->Cell(60,10,number_format($product['price'] * $_SESSION['cart'][$product['ProductID']], 2),1,0,'C');
    $pdf->Cell(0,10,'',0,1); // nakess
}

$pdf->Cell(60,10,'Total Price',1,0,'C');
$pdf->Cell(100,10,number_format($total_price, 2),1,1,'C');

$pdf->Cell(0, 10, 'signature', 0, 1);


$pdf->Output('invoice.pdf', 'D');
?>
<title>Zero Waste</title>