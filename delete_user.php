<?php
include "config.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $query = "DELETE FROM members WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }
}
?>
