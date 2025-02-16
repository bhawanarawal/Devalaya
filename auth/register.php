<?php
session_start();
include('../admin/connection.php'); 
require '../vendor/autoload.php';


$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);

if (isset($_POST["register"])) {
    try {
      
        $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username']);

        // Registration successful
        $_SESSION['success_message'] = 'You are signed up! Welcome to the platform.';

        header('Location: login.php');
       
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        echo '<div class="alert alert-danger">Invalid email address.</div>';
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        echo '<div class="alert alert-danger">Invalid password.</div>';
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        echo '<div class="alert alert-danger">User already exists.</div>';
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        echo '<div class="alert alert-danger">Too many requests. Please try again later.</div>';
    }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="login.css">

    <link rel="icon" href="Favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Register Form</title>
</head>

<body>

<div class="content">
<div class="wrapper">
        <div class="logo">
            <img src="ommm.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            SignUp
        </div>
        <form method="POST" action="#" method="POST" name="register" class="p-3 mt-3">
        <div class="form-field d-flex align-items-center">
                <span class="fas fa-user"></span>
                <input type="text" name="username" placeholder="Enter Your Full Name">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-envelope"></span>
                <input type="text" name="email" placeholder="Enter Your Email">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" placeholder="Enter Your Password">
               
            </div>
            <button class="btn mt-3" type="submit" name="register">Signup</button>
        </form>
    </div>
    <div class="side-image">
            <img src="log.jpg">
        </div>
</div>
</body>






</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>