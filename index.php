<?php
require 'qrlib.php';

// URL to be encoded in the QR code
$link = "https://www.example.com";

// Path to store the generated QR code image
$qrCodeImagePath = 'qrcode/qr_code.png';

// Generate QR code
QRcode::png($link, $qrCodeImagePath, QR_ECLEVEL_L, 10);

// Display a message after generating the QR code
echo "QR code generated successfully.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate High Quality QR code</title>
</head>
<body>
<h1>QR Code Example</h1>
    <p>Scan the QR code below:</p>
    <img src="qrcode/qr_code.png" alt="QR Code">
</body>
</html>