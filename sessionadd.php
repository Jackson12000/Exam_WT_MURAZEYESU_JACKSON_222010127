<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $user_id=$_POST['user_id'];
    $session_type=$_POST['session_type'];
    
    $sql="INSERT INTO sessions(user_id,session_type) VALUES('$user_id','$session_type')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:session.php');
        exit();
    }else{
        echo "Inserted fail";
      }
}

?>