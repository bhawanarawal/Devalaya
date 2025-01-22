<?php
    $id = $_GET['id'];
    include('connection.php');

    
    $sql = "delete from lessons where id = ".$id;
    $res = $con->query($sql);
    
    if($res){
        header("Location: alllessons.php");
    }


?>