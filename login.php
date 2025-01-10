

<!--//require __DIR__ . '/vendor/autoload.php';
//require("database.php");
//$auth = new \Delight\Auth\Auth($db);
-->

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
    <link rel="stylesheet" href="./admin/css/login.css">
</head>
<body>

<div class="wrapper">
        <div class="logo">
            <img src="./admin/adminimages/om.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Login
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-user"></span>
                <input type="text" name="email" placeholder="Enter Your Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password"  placeholder="Enter Your Password">
            </div>
            <button class="btn mt-3" type="submit" name="login" >Login</button>
        </form>
    </div>
    <?php

function input_filter($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
 if(isset($_POST['login']))
 {

    $adminname=input_filter($_POST['adminname']);
    $adminpassword=input_filter($_POST['adminpassword']);

    $adminname=mysqli_real_escape_string($con,$adminname);
    $adminpassword=mysqli_real_escape_string($con,$adminpassword);

    $query="select * from `admin_login` where `admin_name`=? and `admin_password`=?";

   if($stmt= mysqli_prepare($con,$query))
   {
    mysqli_stmt_bind_param($stmt,"ss",$adminname,$adminpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt)==1)
    {
        session_start();
        $_SESSION['adminloginid']=$adminname;
        header("location:home.php");
    }else{
        echo"<script>alert('Incorrect password');</script>";
    }
    mysqli_stmt_close($stmt);
 }
 else{
    echo"<script>alert('SQL Query cannot be prepared');</script>";
 }
}
 ?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>