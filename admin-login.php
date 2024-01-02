<?php
    include "./config.php";
    if(isset($_POST['Signin'])){
        $query = "SELECT * FROM admin WHERE name = '$_POST[AdminName]' AND password = '$_POST[AdminPassword]'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) == 1){
            session_start();
            $_SESSION['AdminLoginId'] = $_POST['AdminName'];
            header("location: index.php");
        }
        else{
            echo"<script>alert('Incorrect Password');</script>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body{
            background-color: #1c1c1e;
        }

        a {
            text-decoration: none;
        }

        div.container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: white;
            padding: 30px;
            box-shadow: 0 50px 50px -50px orange;
            width: 90%;
            max-width: 400px;
        }

        div.container div.myform {
            width: 270px;
        }

        div.container div.myform h2 {
            color: #1c1c1e;
            margin-bottom: 20px;
        }

        div.container div.myform input{
            border: none;
            outline: none;
            border-radius: 0;
            width: 90%;
            border-bottom: 2px solid orange;
            margin-bottom: 25px;
            padding: 7px 0;
            font-size: 14px;
        }

        div.container div.myform button {
            color: white;
            background-color: #1c1c1e;
            border: none;
            outline: none;
            border-radius: 2px;
            font-size: 14px;
            padding: 5px 12px;
            font-weight: 500;
        }

        div.container div.image img {
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            /* Adjust styles for smaller screens */
            div.container {
                width: 95%;
            }
        }
    </style>
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="myform">
            <form action="" method="post">
                <a href="./index.html"><h2>Admin Login</h2></a>
                <input type="text" placeholder="Admin Name" name="AdminName">
                <input type="password" placeholder="Password" name="AdminPassword">
                <button type="submit" name="Signin">Log In</button>
            </form>
        </div>
        <div class="image">
            <img src="./images/water.jpg" alt="pic" width="300px">
        </div>
    </div>
</body>
</html>