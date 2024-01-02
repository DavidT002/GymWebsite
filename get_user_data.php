<?php
include "config.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $query = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    echo '<form id="editForm">
            <input type="hidden" name="id" value="' . $row["id"] . '">
            <label>First Name:</label>
            <input type="text" name="first_name" value="' . $row["first_name"] . '"><br>
            <label>Last Name:</label>
            <input type="text" name="last_name" value="' . $row["last_name"] . '"><br>
            <label>Email:</label>
            <input type="text" name="email" value="' . $row["email"] . '"><br>
            <button type="button" id="updateBtn">Update</button>
          </form>';
}
?>
