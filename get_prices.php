<?php
include "config.php";

$query = "SELECT * FROM pricing";
$result = mysqli_query($con, $query);

if ($result) {
    $prices = mysqli_fetch_assoc($result);
    echo "{$prices['basic_price']},{$prices['standard_price']},{$prices['premium_price']}";
} else {
    echo "Error fetching prices: " . mysqli_error($con);
}
?>
