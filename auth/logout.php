<?php
session_start();

require '../vendor/autoload.php';

$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);

$auth->logout();
  
   session_destroy();
    header("location:../home.php"); 

?>
