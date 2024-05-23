<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $grade_level=$_POST['grade_level'];
    $subject_id=$_POST['subject_id'];
    $sql="INSERT INTO students(name,email,grade_level,subject_id) VALUES('$name','$email','$grade_level','$subject_id')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:student.php');
        exit();
    }else{
        echo "Inserted fail";
      }
}

?>