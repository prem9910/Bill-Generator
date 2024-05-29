<?php 
include('security.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$email = $_GET['email'];
$sql_users = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($sql_users);

$sql_travel = mysqli_query($con,"SELECT * FROM travel_information WHERE email='$email'");
$travel = mysqli_fetch_assoc($sql_travel);

$sql_hotel = mysqli_query($con,"SELECT * FROM hoteldetails WHERE email='$email'");
$hotel = mysqli_fetch_assoc($sql_hotel);


// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('details_pdf.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('B4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
header('Content-Type: application/pdf');
// header('Content-Disposition: inline; filename="print-details.pdf"');

// Output the generated PDF to Browser
echo $dompdf->output();
