<?php
require 'config.php'; // Include your database connection
require 'qrlib.php'; // Include QRcode library

if (isset($_POST["submit"])) {
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $link = $_POST["link"];
    $amount = $_POST["amount"];
    $user_name = $f_name.$l_name ;

    $qr_data = "upi://pay?pa=".($link)."&pn=".($f_name)."%20".($l_name)."&mc=0000&tn=&am=".($amount)."&cu=INR&tn=";
    // Generate QR code and display it
    $qrCodeData = "Person: $user_name\nLink: $link";
    $qrCodeFileName = "qrcode/" . md5($qrCodeData) . ".png";
    QRcode::png($qr_data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);

    $query = "INSERT INTO users VALUES ('$user_name','$link')";
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>QR Code Generator</title>
</head>

<body>
    <div class="qr-container">
        <?php if (isset($_POST["submit"])) : ?>
            <h2>Generated QR Code:</h2>
            <div class="qr-code">
                <img src="<?php echo $qrCodeFileName; ?>" alt="QR Code">
            </div>
            <a class="download-button" href="<?php echo $qrCodeFileName; ?>" download>Download QR Code</a>
        <?php endif; ?>
    </div>
    <div class="popup" id="popup">
        <div class="content">
            <h1>Create Payment QR Code</h1>
            <form action="" method="post">
                <label for="f_name">First Name : </label>
                <input type="text" id="f_name" name="f_name"><br>
                <label for="l_name">Last Name : </label>
                <input type="text" name="l_name" id="l_name"><br>
                <label for="amount">Amount</label>
                <input placeholder="Desire Amount" type="tel" id="amount" name ="amount"><br>
                <label for="link">UPI ID :</label>
                <input type="text" id="link" name="link" required><br>
                <button type="submit" name="submit">Generate QR Code</button>
                <button><a class="a" href="index.php"> Go Back</a></button>
            </form>
        </div>
    </div>
</body>

</html>
<script src="script.js"></script>