window.addEventListener("load", function() {
    document.getElementById("popup").classList.add("active");
});

document.getElementById("submitOption").addEventListener("click", function() {
    var selectedOption = document.getElementById("options").value;
    if (selectedOption === "simple") {
        window.location.href = "simple_qr.php";
    } else if (selectedOption === "payment") {
        window.location.href = "payment_qr.php";
    } else if (selectedOption === "custom") {
        window.location.href = "full.php";
    }
});
