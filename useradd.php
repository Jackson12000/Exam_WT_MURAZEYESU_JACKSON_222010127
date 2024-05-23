<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hashed_password = password_hash($passwordInput, PASSWORD_DEFAULT);
   
    $sql="INSERT INTO users(firstname, lastname, dob, email,username, password) VALUES('$firstname', '$lastname','$dob','$email','$username','$hashed_password')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:login.php');
        exit();
    }else{
        echo "Inserted fail";
      }
}

?>