<?php
session_start();
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']); // Clear the message after displaying it
}
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);
if (isset($_POST['login'])) {

    try {
        $auth->login($_POST['email'], $_POST['password']);
        header("location:../home.php");
    } catch (\Delight\Auth\InvalidEmailException $e) {
        die('Wrong email address');
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Wrong password');
    } catch (\Delight\Auth\EmailNotVerifiedException $e) {
        die('Email not verified');
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="login.css">
</head>

<body>
        <div class="content">
    <div class="wrapper">
        <div class="logo">
            <img src="ommm.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Welcome
        </div>
        <form method="POST" action="" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-user"></span>
                <input type="text" name="email" placeholder="Enter Your Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" placeholder="Enter Your Password">

            </div>
            <button class="btn mt-3" type="submit" name="login">Login</button>
            <div class="form-group d-flex">
                <a href="forgotpassword.php">Forgot Password ?</a>
            </div>
        </form>
        <p class="text-center">Not a Member? <a data-toggle="tab" href="register.php">Sign Up</a></p>
    </div>
    <div class="side-image">
            <img src="log.jpg">
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>