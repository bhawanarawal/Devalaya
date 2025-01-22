<?php
    $id = $_GET['id'];
    include('connection.php');

    
    $sql = "delete from temple where id = ".$id;
    $res = $con->query($sql);
    
    if($res){
        header("Location: templesites.php");
    }


?>