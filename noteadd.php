<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $user_id=$_POST['user_id'];
    $message=$_POST['message'];
    
    $sql="INSERT INTO notification(user_id,message) VALUES('$user_id','$message')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:notification.php');
        exit();
    }else{
        echo "Inserted fail";
      }
}

?>