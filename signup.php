
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/barbell.png" />
    <title>Sign Up</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="containerr">
            <div class="row">
                <div class="cardss">
                    <a href="./index.html"><img src="./images/barbell.png" alt="" style="width: 55px; height:50px; float:left"></a>
                    <a class="singup">Join Us</a>
                    <div class="col-md-6 mb-3">
                        <div class="inputBox">
                            <input type="text" id="Fname" name="first_name" required>
                            <span>First Name</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="inputBox">
                            <input type="text" id="Lname" name="last_name" required>
                            <span>Last Name</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="inputBox1">
                            <input type="email" id="email" name="email" required="required">
                            <span class="user">Email</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="inputBox">
                            <input type="password" id="password" name="password" required>
                            <span>Password</span>
                            <i class="show-hide-icon fas fa-eye custom-eye" onclick="togglePasswordVisibility()"></i>
                        </div>
                    </div>
                    <button type="submit" class="enter" name="join" style="color: white;">Join Us</button>
                    <div class="already-have-account" style="color: orange; font-size: 16px;">
                        <p style="color: white;">Already have an account? <a href="./login.php" style="color: orange;">Login Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="./main.js"></script>
</body>
</html>

<?php
include 'config.php';

if(isset($_POST['join'])) {
     $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 

    // Check if the email already exists in the database
    $duplicate = mysqli_query($con, "SELECT * FROM members WHERE email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script>alert('User already exists!')</script>";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO members (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
        
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo 'MySQL Error: ' . mysqli_error($con);
        } else {
            echo '<script type="text/javascript"> alert("Registered successfully") </script>';
            header("Location: index.html");
        }
    }
}
?>