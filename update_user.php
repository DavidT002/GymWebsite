<?php
include "config.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];

    $query = "UPDATE members SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "User data updated successfully";
    } else {
        echo "Error updating user data: " . mysqli_error($con);
    }
}
?>
