<?php
require 'config.php'; // Include your database connection
require 'qrlib.php'; // Include QRcode library

if (isset($_POST["submit"])) {
    $user_name = $_POST["user_name"];
    $link = $_POST["link"];

    // Generate QR code and display it
    $qrCodeData = "Person: $user_name\nLink: $link";
    $qrCodeFileName = "qrcode/" . md5($qrCodeData) . ".png";
    QRcode::png($link, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);

    $query = "INSERT INTO users VALUES ('$user_name','$link')";
    mysqli_query($conn, $query);

    // header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <h1>Create Simple QR Code</h1>
            <form action="" method="post">
                <label for="user_name">Person's Name:</label>
                <input type="text" id="User_name" name="user_name" required><br>
                <label for="link">Link:</label>
                <input type="text" id="link" name="link" required><br>
                <button type="submit" name="submit">Generate QR Code</button>
                <button><a href="index.php"> go back</a></button>
            </form>
        </div>
    </div>

</body>

</html>
<script src="/script.js"></script>