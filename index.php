<?php
include "config.php";
session_start();
if(!isset($_SESSION['AdminLoginId'])){
  header("location: admin-login.php");
}
if(isset($_POST["logout"])){
    session_destroy();
    header("location: admin-login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body{
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url(./images/woman-s.jpg)no-repeat;
    }
  </style>

  <title>Admin</title>
</head>

<body>
<ul class="navbar-nav me-auto mb-2 mb-md-0">
  <nav class="navbar navbar-light justify-content-between fs-3 mb-5" style="background-color: orange; padding-right: 25px; padding-left: 25px;">
  <!-- <a href="./index.html" style="text-decoration: none; color: white; font-weight: 600; font-family: sans-serif">Welcome to Admin Panel - </a> -->
  <h2>Welcome to Admin Panel - <?php echo $_SESSION['AdminLoginId']?></h2>
  <li class="nav-item">
    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#pricingModal">Manage Pricing</a>
  </li>
  <form action="" method="post">
  <button name="logout">LOG OUT</button>
  </form>
  </nav>
</ul>
  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `members`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td>
              <a href="#" class="edit-btn link-dark" data-id="<?php echo $row["id"] ?>">
                <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
              </a>
              <a href="#" class="delete-btn link-dark" data-id="<?php echo $row["id"] ?>">
                <i class="fa-solid fa-trash fs-5"></i>
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editModalBody">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

   <!-- Pricing Modal -->
   <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pricingModalLabel">Manage Pricing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="pricingForm">
                      <div class="mb-3">
                          <label for="basicPrice" class="form-label">Basic Membership Price:</label>
                          <input type="text" class="form-control" id="basicPrice" name="basicPrice" value="19">
                      </div>
                      <div class="mb-3">
                          <label for="standardPrice" class="form-label">Standard Membership Price:</label>
                          <input type="text" class="form-control" id="standardPrice" name="standardPrice" value="39">
                      </div>
                      <div class="mb-3">
                          <label for="premiumPrice" class="form-label">Premium Membership Price:</label>
                          <input type="text" class="form-control" id="premiumPrice" name="premiumPrice" value="59">
                      </div>
                      <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="./jquery-3.7.1.min.js"></script>

  
<script>
  $(document).ready(function () {
    // Edit button click event
    $(".edit-btn").on("click", function (e) {
      e.preventDefault();
      var id = $(this).data("id");
      $.ajax({
        url: "get_user_data.php",
        method: "POST",
        data: { id: id },
        success: function (data) {
          $("#editModalBody").html(data);
          $("#editModal").modal("show");
        },
      });
    });

    // Update button click event in the edit modal
    $("#updateBtn").on("click", function (e) {
      e.preventDefault();
      $.ajax({
        url: "update_user.php",
        method: "POST",
        data: $("#editForm").serialize(),
        success: function (data) {
          window.location.reload();
        },
      });
    });

    // Delete button click event
    $(".delete-btn").on("click", function (e) {
      e.preventDefault();
      var id = $(this).data("id");

      if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
          url: "delete_user.php",
          method: "POST",
          data: { id: id },
          success: function (data) {
            window.location.reload();
          },
        });
      }
    });
  });

  //Update Prices

  $(document).ready(function () {
        // Save Changes button click event
        $("#saveChangesBtn").on("click", function () {
            var basicPrice = $("#basicPrice").val();
            var standardPrice = $("#standardPrice").val();
            var premiumPrice = $("#premiumPrice").val();

            $.ajax({
                url: "update_prices.php",
                method: "POST",
                data: {
                    basicPrice: basicPrice,
                    standardPrice: standardPrice,
                    premiumPrice: premiumPrice
                },
                success: function (data) {
                    alert("Prices updated successfully!");
                },
                error: function (xhr, status, error) {
                    // Handle error, e.g., display an error message
                    alert("Error updating prices. Please try again.");
                }
            });
        });
    });
</script>

</body>
</html>