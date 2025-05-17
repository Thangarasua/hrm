<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
}

// Include TCPDF library
require_once('./tcpdf/tcpdf.php');
include('./includes/assets.php');
require_once "config.php";



$invoiceId = $_GET['id'];
$Pid = $_GET['pid'];

// Create a new TCPDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Your Company');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Payment Invoice');
$pdf->SetSubject('Payment Invoice');


error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch payment details from the database
$query = "SELECT * FROM `paymenthistory` WHERE `paymentid` = $Pid AND `id`=$invoiceId ";
$result = mysqli_query($link, $query);
ob_end_clean();

// Set some options for the PDF
$pdf->SetMargins(10, 1, 10);
$pdf->SetAutoPageBreak(true, 0);

// Add a page
$pdf->AddPage();
$html = file_get_contents("https://actecrm.com/pdf-files/invoice.php?id=$id");
// Write the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a download
if ($Pid == 0) {
	$pdf->Output($name . '-payment-invoice.pdf', 'D');
} else {
	$pdf->Output($name . '-payment-invoice.pdf', 'I');
}
