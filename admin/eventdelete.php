<?php
    $id = $_GET['id'];
    include('connection.php');

    
    $sql = "delete from events where id = ".$id;
    $res = $con->query($sql);
    
    if($res){
        header("Location: allevents.php");
    }


?>