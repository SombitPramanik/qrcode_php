<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>QR Code Generator</title>
</head>

<body>
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Select an Option</h2>
            <select id="options">
                <option value="simple">Simple QR Code</option>
                <option value="payment">Custom Payment QR</option>
                <option value="custom">Fully Customizable Link</option>
            </select>
            <button id="submitOption">Generate</button>
        </div>
    </div>
</body>

</html>
<script src="/script.js"></script>