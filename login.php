<?php
include 'config.php';

if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($con, "SELECT * FROM members WHERE email = '$email'");
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        
        // Verify the password
        if(password_verify($password, $hashed_password)) {
            // echo '<script type="text/javascript"> alert("Login successful") </script>';
            header("Location: index.html");
        } else {
            echo '<script type="text/javascript"> alert("Incorrect password") </script>';
        }
    } else {
        echo '<script type="text/javascript"> alert("User not found") </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/barbell.png" />
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <div class="containerr">
            <div class="row">
                <div class="cardss">
                    <a href="./index.html"><img src="./images/barbell.png" alt="" style="width: 55px; height:50px; float:left"></a>
                    <a class="singup">Log In</a>
                    <div class="col-md-6 mb-3">
                        <div class="inputBox1">
                            <input type="text" id="email" name="email" required="required">
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
                    <button type="submit" name="login"
                    class="enter" style="color: white;">Log In</button>
                    <div class="already-have-account" style="color: orange;">
                        <p>Don't have an account? <a href="./signup.php" style="color: white;">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="./main.js"></script>
</body>
</html>

