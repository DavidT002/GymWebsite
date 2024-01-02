<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $basicPrice = $_POST["basicPrice"];
    $standardPrice = $_POST["standardPrice"];
    $premiumPrice = $_POST["premiumPrice"];

    $updateQuery = "UPDATE pricing SET 
                    basic_price = '$basicPrice', 
                    standard_price = '$standardPrice', 
                    premium_price = '$premiumPrice' 
                    WHERE id = 1"; 

    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        echo "Prices updated successfully!";
    } else {
        echo "Error updating prices. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
