
<?php
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['adminloginid']))
{
header("location:adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body{
            margin:0px;
        }
        .header{
            font-family:poppins;
            display:flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 60px;
            background-color:aqua;
        }
        .header button{
            background-color: aliceblue;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="header">
    <h1>Welcome <?php echo $_SESSION['adminloginid']?> !</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <button name="logout">Log Out</button>
    </form>
</div>
<?php
if(isset($_POST['logout']))
{
    session_destroy();
    header("location: adminlogin.php");
}
?>
</body>
</html>