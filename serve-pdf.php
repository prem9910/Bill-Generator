<?php
// serve-pdf.php

// Get the temporary file path from the query string
$tempFile = $_GET['file'];

// Check if the file exists
if (file_exists($tempFile)) {
    // Set the headers to force download
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="print-details.pdf"');

    // Output the PDF file
    readfile($tempFile);

    // Delete the temporary file
    unlink($tempFile);
} else {
    echo "File not found.";
}

?>